<?php

namespace App\Http\Controllers;

use App\Models\SMSSettings;
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
            'sms_api_url' => 'required',
            'api_token' => 'required',
            'sender_id' => 'required',
            'default_sms_type' => 'required|in:0,1',
            'default_routing' => 'required',
            'dlr_timeout' => 'required|integer',
        ]);

        $smsSettings = SmsSettings::firstOrNew(['id' => 1]);

        $smsSettings->sms_api_url = $request->input('sms_api_url');
        $smsSettings->api_token = $request->input('api_token');
        $smsSettings->sender_id = $request->input('sender_id');
        $smsSettings->default_sms_type = $request->input('default_sms_type');
        $smsSettings->default_routing = $request->input('default_routing');
        $smsSettings->dlr_timeout = $request->input('dlr_timeout');

        $smsSettings->save();

        return redirect()->route('sms_settings.edit')->with('success', 'SMS settings saved successfully.');
    }

}
