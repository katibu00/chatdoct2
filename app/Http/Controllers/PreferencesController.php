<?php

namespace App\Http\Controllers;

use App\Models\Preferences;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PreferencesController extends Controller
{
    public function index()
    {
        $data['preferences'] = Preferences::find(1);
        return view('admin.preferences', $data);
    }
    public function store(Request $request)
    {
        $preferences = Preferences::firstOrNew(['id' => 1]);
        $preferences->commission = $request->input('commission');
        $preferences->welcome_bonus = $request->input('welcome_bonus');
        $preferences->sms_doctor_booked = $request->has('sms_doctor_when_booked');
        $preferences->sms_patient_appointed = $request->has('sms_patient_appointed_time');
        $preferences->sms_patient_completed = $request->has('sms_patient_booking_completed');
        $preferences->sms_doctor_credited = $request->has('sms_doctor_when_credited');
        $preferences->save();
    
        Toastr::success('Preferences successfully updated', 'Done');
        return redirect()->route('preferences.index');
    }
    
    
}
