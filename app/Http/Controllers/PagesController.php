<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return view('front.about');
    }

    public function doctors(){
        return view('front.doctors');
    }

    public function contact(){
        return view('front.contact');
    }

    public function speciality(){

        $speciality = $_GET['speciality'];
        $data['doctors'] = User::where('role','doctor')->where('speciality','LIKE','%'.$speciality.'%')->paginate(2);
       return view('front.speciality',$data);
    }
}
