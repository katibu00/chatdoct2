<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
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
        $data['completed'] = Booking::where('doctor_id', $user_id)->where('status',2)->get()->count();
        $day = strtolower(date('l')) . 's';
        $data['today_schedules'] = User::select($day)->where('id',$user_id)->first()->$day;

       
        $chat_rate = auth()->user()->chat_rate;
        $video_rate = auth()->user()->video_rate;
        $data['today_total'] = 0;
        $data['month_total'] = 0;


        $todays = Booking::select('book_type')->where('doctor_id',$user_id)->whereDate('created_at', Carbon::today())->get();
        foreach($todays as $today){
                if($today->book_type == 'chat'){
                    $data['today_total']+=$chat_rate;
                };
                if($today->book_type == 'video'){
                    $data['today_total']+=$video_rate;
                };
        };
        $months = Booking::select('book_type')->where('doctor_id',$user_id)->whereMonth('created_at',  Carbon::now()->month)->get();
        foreach($months as $month){
                if($month->book_type == 'chat'){
                    $data['month_total']+=$chat_rate;
                };
                if($month->book_type == 'video'){
                    $data['month_total']+=$video_rate;
                };
        };
       
     
        $data['patients'] = Booking::with(['patient','book'])->where('doctor_id', $user_id)->whereIn('status',[0,1])->orderBy('id','desc')->get();
        return view('doctor',$data);
    }
    public function patient()
    {
        $user_id = auth()->user()->id;
        $data['recent'] = Booking::where('patient_id', $user_id)->get();
        $data['users'] = User::where('role','doctor')->where('status',1)->where('featured',1)->get();
        $data['user'] = User::where('id',Auth::user()->id)->first();
        $data['payments'] = Payment::where('user_id',$user_id)->latest()->get()->take(4);
        return view('patient',$data);
    }
}
