<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Facades\File as File;
use Illuminate\Support\Facades\Auth;

class DoctorApplicationController extends Controller
{
    public function index(){
        return view('doctor.application');
    }

    public function save(Request $request){
      

        $this->validate($request, [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
             'rank' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'certificate' => 'required',
            'folio' => 'required',
            'speciality' => 'required',
            'languages' => 'required',
            'experience' => 'required',
        ]);

        if(auth()->user()->picture == 'default.png')
        {
            $this->validate($request, [
                'image' => 'required|file',
            ]);
        }

        $id = Auth::user()->id;

        $user = User::FindorFail($id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
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

    $user->role = "pending";
    $user->speciality = implode(',', $request->speciality);
    $user->folio = $request->folio;
    $user->rank = $request->rank;
    $user->experience = $request->experience;
    $user->languages = implode(',', $request->languages);
    $user->state = $request->state;
    $user->lga = $request->lga;

    if ($request->file('certificate') != null) {

        $destination = 'uploads/certificates/'.$user->certificate; 
        
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $file = $request->file('certificate');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '2.' . $extension;
        $file->move('uploads/certificates', $filename);
        $user->certificate = $filename;
    }

    $user->update();

    Toastr::success('Your Application has been submitted sucessfully', 'Done');
    return redirect()->back();
    }

}
