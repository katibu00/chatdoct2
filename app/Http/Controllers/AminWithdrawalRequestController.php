<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WithdrawalRequest;
use App\Notifications\DoctorApproveWithdrawalNotification;
use App\Notifications\DoctorRejectWithdrawalNotification;
use Illuminate\Http\Request;

class AminWithdrawalRequestController extends Controller
{
    public function index()
    {
        $data['requests'] = WithdrawalRequest::where('status','pending')->get();
        return view('admin.withdrawal_request', $data);
    }

    public function approve(Request $request){
        $data = WithdrawalRequest::find($request->id);
        $data->status = 'approved';
        if($data->update()){

            $doctor = User::find($data->doctor_id);
            $doctor->notify(new DoctorApproveWithdrawalNotification($data));

            return response()->json([
                'status' => 200,
                'message' => 'Application is Approved Successfully'
            ]);
        };
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
