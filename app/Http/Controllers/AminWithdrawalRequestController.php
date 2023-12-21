<?php

namespace App\Http\Controllers;

use App\Models\AdminEarning;
use App\Models\Preferences;
use App\Models\User;
use App\Models\WithdrawalRequest;
use App\Notifications\DoctorApproveWithdrawalNotification;
use App\Notifications\DoctorRejectWithdrawalNotification;
use Illuminate\Http\Request;

class AminWithdrawalRequestController extends Controller
{
    public function index()
    {
        $data['requests'] = WithdrawalRequest::where('status', 'pending')->latest()->get();
        return view('admin.withdrawal_request', $data);
    }

    public function approve(Request $request)
    {
        $data = WithdrawalRequest::find($request->id);
        $data->status = 'approved';
    
        $preferences = Preferences::find(1);
        $commissionRate = $preferences->commission;
    
        $commissionCharged = $data->amount * ($commissionRate / 100);
    
        if ($data->update()) {
            $doctor = User::find($data->doctor_id);
            $doctor->balance -= $data->amount;
            $doctor->update();
    
            $doctor->notify(new DoctorApproveWithdrawalNotification($data));
    
            $adminEarning = new AdminEarning();
            $adminEarning->withdrawal_request_id = $data->id;
            $adminEarning->admin_id = auth()->user()->id; 
            $adminEarning->amount = $commissionCharged;
            $adminEarning->save();
    
            return response()->json([
                'status' => 200,
                'message' => 'Application is Approved Successfully'
            ]);
        }
    }
    

    public function reject(Request $request){
        $data = WithdrawalRequest::find($request->id);
        $data->status = 'rejected';
        if($data->update()){

            $doctor = User::find($data->doctor_id);
            $doctor->notify(new DoctorRejectWithdrawalNotification($data));

            return response()->json([
                'status' => 200,
                'message' => 'Application is Rejected Successfully'
            ]);
        };
    }
}
