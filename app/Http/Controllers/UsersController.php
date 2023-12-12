<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class UsersController extends Controller
{
  
    public function applicationsIndex(){
        $data['users'] = User::where('role','doctor')->where('status',0)->latest()->get();
        return view('users.applications',$data);
    }

    public function ApproveRequest($id){
     
        $user = User::findorFail($id);
        $user->status = 1;
        $user->update();

        Toastr::success('The user has been Approved as Doctor sucessfully', 'Done');
        return redirect()->back();
    }

    public function doctorsIndex(){
        $data['users'] = User::where('role','doctor')->where('status','!=',0)->latest()->get();
        return view('users.doctors',$data);
    }

    public function patientsIndex(){
        $data['users'] = User::where('role','patient')->latest()->get();
        return view('users.patients',$data);
    }

    public function adminsIndex(){
        $data['users'] = User::where('role','admin')->latest()->get();
        return view('users.admins',$data);
    }

    public function featureDoctors($id){
        
        $user = User::find($id);
        $featured = $user->featured;
        if($featured == 0){
            $user->featured = 1;
            $message = 'Featured';
        }
        if($featured == 1){
            $user->featured = 0;
            $message = 'Unfeatured';
        }
        $user->update();

        Toastr::success('The Doctor has been '.$message.' sucessfully', 'Done');
        return redirect()->back();
    }

    public function doctorsDelete(Request $request){
        $data = User::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'User Deleted Successfully'
            ]);
        };
    }

    public function doctorsReject(Request $request){
        $data = User::find($request->id);
        $data->role = 'patient';
        $data->status = 1;
        if($data->update()){
            return response()->json([
                'status' => 200,
                'message' => 'User is Rejected Successfully'
            ]);
        };
    }

    public function doctorsSuspend(Request $request){
        $data = User::find($request->id);
        if($data->status == 5){
            $data->status = 1;
            $message = 'Unsuspended';
        }else
        {
            $data->featured = 0;
            $data->status = 5;
            $message = 'Suspended';
        }
       
        if($data->update()){
            return response()->json([
                'status' => 200,
                'message' => 'User was '.$message.' Successfully'
            ]);
        };
    }

}
