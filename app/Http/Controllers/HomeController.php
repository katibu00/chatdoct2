<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        $data['patients'] = User::where('role','patient')->get()->count();
        $data['doctors'] = User::where('role','doctor')->get()->count();
        $data['admins'] = User::where('role','admin')->get()->count();
        $data['balance'] = User::sum('balance');
        return view('admin',$data);
    }
    public function doctor()
    {

        $user_id = auth()->user()->id;
        $data['pending'] = Booking::where('doctor_id', $user_id)->where('status',0)->get()->count();
        $data['active'] = Booking::where('doctor_id', $user_id)->where('status',1)->get()->count();

        $day = strtolower(date('l')) . 's';

        $data['today_schedules'] = User::select($day)->where('id',$user_id)->first()->$day;
       
     
        $data['patients'] = Booking::with(['patient','book'])->where('doctor_id', $user_id)->where('status',0)->orWhere('status', 1)->orderBy('id','desc')->get();
        return view('doctor',$data);
    }
    public function patient()
    {


        $data['recent'] = Booking::where('patient_id', Auth::user()->id)->get();
        $data['users'] = User::where('role','doctor')->where('status',1)->where('featured',1)->get();
        $data['user'] = User::where('id',Auth::user()->id)->first();
        // $data['balance'] = User::sum('balance');
        return view('patient',$data);
    }
}
