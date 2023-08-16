<?php

namespace App\Http\Controllers;

use App\Models\SMSSettings;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function index()
    {
        $data['smsSettings'] = SMSSettings::find(1);
        return view('admin.sms_settings', $data);
    }



    public function update(Request $request)
    {
        $request->validate([
            'api_token' => 'required',
            'sender_id' => 'required',
        ]);

        $smsSettings = SmsSettings::firstOrNew(['id' => 1]);

        $smsSettings->api_token = $request->input('api_token');
        $smsSettings->sender_id = $request->input('sender_id');

        $smsSettings->save();

        Toastr::success('SMS settings saved successfully.');
        return redirect()->route('sms.api.index');
    }

}
