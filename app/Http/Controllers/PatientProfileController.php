<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Facades\File as File;
use Illuminate\Support\Facades\Validator;

class PatientProfileController extends Controller
{
    public function index(){
        return view('profile.patient');
    }
    public function settings(){
        return view('profile.settings_patient');
    }
    
    public function update(Request $request){
       
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'phone' => 'required|max:191',
            'age' => 'required|max:191',
            'sex' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

       

        $user = User::FindorFail(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->sex = $request->sex;
        $user->address = $request->address;
    

        if ($request->file('image') != null) {

        $destination = 'uploads/avatar/'.$user->picture; 
        
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/avatar', $filename);
        $user->picture = $filename;
    }

    $user->update();

    return response()->json([
        'status'=>200,
        'message'=>'rofile has been Updated sucessfully'
    ]);

    }
}
