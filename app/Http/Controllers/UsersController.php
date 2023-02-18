<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class UsersController extends Controller
{
    public function applicationsIndex(){
        $data['users'] = User::where('role','pending')->where('status',0)->get();
        return view('users.applications',$data);
    }

    public function ApproveRequest($id){
     
        $user = User::findorFail($id);
        $user->role = 'doctor';
        $user->status = 1;
        $user->update();

        Toastr::success('The user has been Approved as Doctor sucessfully', 'Done');
        return redirect()->back();
    }

    public function doctorsIndex(){
        $data['users'] = User::where('role','doctor')->where('status',1)->get();
        return view('users.doctors',$data);
    }
    public function patientsIndex(){
        $data['users'] = User::where('role','patient')->get();
        return view('users.patients',$data);
    }
    public function adminsIndex(){
        $data['users'] = User::where('role','admin')->get();
        return view('users.admins',$data);
    }

    public function featureDoctors($id){
        
        $user = User::find($id);
        $featured = $user->featured;
        if($featured == 0){
            $user->featured = 1;
        }
        if($featured == 1){
            $user->featured = 0;
        }
        $user->update();

        Toastr::success('The Doctor has been Featured sucessfully', 'Done');
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

}
