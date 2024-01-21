<?php

namespace App\Http\Controllers;

use App\Models\PaystackAPI;
use Illuminate\Http\Request;

class PaystackAPIController extends Controller
{
    public function index()
    {
        $data['paystackKeys'] = PaystackAPI::find(1);
        return view('admin.paystack_settings', $data);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'secret_key' => 'required',
            'public_key' => 'required',
        ]);

        // Check if the record already exists
        $monnifyKeys = PaystackAPI::first();

        if ($monnifyKeys) {
            // Record already exists, update the existing record
            $monnifyKeys->update($validatedData);
        } else {
            // Record does not exist, create a new record
            PaystackAPI::create($validatedData);
        }

        // Redirect or show a success message
        // For example:
        return redirect()->route('paystack.api')->with('success', 'Paystack API settings saved successfully.');
    }
}
