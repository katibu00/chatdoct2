<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\ReservedAccount;
use App\Models\SMSSettings;
use App\Models\User;
use App\Notifications\BookingNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\AdminEarning;
use App\Models\Preferences;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $phone_rate = auth()->user()->phone_rate;
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
                if($today->book_type == 'phone'){
                    $data['today_total']+=$phone_rate;
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
                if($month->book_type == 'phone'){
                    $data['month_total']+=$phone_rate;
                };
        };
       
     
        $data['patients'] = Booking::with(['patient','book'])->where('doctor_id', $user_id)->whereIn('status',[0,1])->orderBy('id','desc')->get();
        return view('doctor',$data);
    }
    
    public function patient()
    {
        $user_id = auth()->user()->id;
        $data['recent'] = Booking::where('patient_id', $user_id)->orderBy('created_at', 'desc')->get();
        $data['users'] = User::where('role','doctor')->where('status',1)->where('featured',1)->get();
        $data['user'] = User::where('id',Auth::user()->id)->first();
        $data['payments'] = Payment::where('user_id',$user_id)->latest()->get()->take(4);

        $query = ReservedAccount::where('user_id', $user_id)->first();

        if ($query) {
            $data['accounts'] = json_decode($query->accounts, true);
        } else {
            $data['accounts'] = [];
        }
       
       

        return view('patient',$data);
    }








public function admin()
{
    // Previous 30 days date for user registrations
    $start_date_users = Carbon::now()->subDays(30);

    // Count user registrations within the last 30 days
    $userRegistrations = User::where('created_at', '>=', $start_date_users)
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('d M');
        });

    // Extract date labels and user counts
    $userRegistrationLabels = $userRegistrations->keys();
    $userRegistrationCounts = $userRegistrations->values()->map->count();

    // Previous 7 days date for admin earnings
    $start_date_earnings = Carbon::now()->subDays(7);

    // Get admin earnings within the last 7 days
    $adminEarningsLast7Days = AdminEarning::where('created_at', '>=', $start_date_earnings)->sum('amount');

    // Get total admin earnings
    $totalAdminEarnings = AdminEarning::sum('amount');

    // Get preferences for commission rate
    $preferences = Preferences::find(1);
    $commissionRate = $preferences->commission;

    // Other data
    $patients = User::where('role', 'patient')->count();
    $doctors = User::where('role', 'doctor')->count();
    $admins = User::where('role', 'admin')->count();
    $balance = User::sum('balance');
    $commision = $commissionRate;


    $endDate = now(); // Today's date
    $startDate = now()->subDays(14); // 15 days ago

    $dates = [];
    $userCounts = [];

    for ($date = $startDate; $date <= $endDate; $date->addDay()) {
        $day = $date->format('Y-m-d');
        $count = User::whereDate('created_at', $day)->count();

        $dates[] = $day;
        $userCounts[] = $count;
    }

    // Convert dates to JSON for use in JavaScript
    $datesJson = json_encode($dates);
    $userCountsJson = json_encode($userCounts);

    $totalBookings = Booking::count();
    $completedBookings = Booking::where('status', 2)->count();
    $cancelledBookings = Booking::where('status', 3)->count();
    $unattendedBookings = Booking::where('status', 0)->count();
    $activeBookings = Booking::where('status', 1)->count();




    return view('admin', compact(
        'patients',
        'doctors',
        'admins',
        'balance',
        'userRegistrationLabels',
        'userRegistrationCounts',
        'adminEarningsLast7Days',
        'datesJson',
        'userCountsJson',
        'totalAdminEarnings',
        'commision',
        'totalBookings',
        'completedBookings',
        'cancelledBookings',
        'unattendedBookings',
        'activeBookings'
    ));
}



}
