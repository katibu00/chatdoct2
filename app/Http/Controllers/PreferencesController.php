<?php

namespace App\Http\Controllers;

use App\Models\BrevoAPIKey;
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


    public function brevoIndex()
    {
        $data['paystackKeys'] = BrevoAPIKey::find(1);
        return view('admin.brevo_settings', $data);
    }

    public function brevoStore(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'secret_key' => 'required',
        ]);

        // Check if the record already exists
        $monnifyKeys = BrevoAPIKey::first();

        if ($monnifyKeys) {
            // Record already exists, update the existing record
            $monnifyKeys->update($validatedData);
        } else {
            // Record does not exist, create a new record
            BrevoAPIKey::create($validatedData);
        }

        // Redirect or show a success message
        // For example:
        return redirect()->route('brevo.api')->with('success', 'Brevo API settings saved successfully.');
    }
    
    
}
