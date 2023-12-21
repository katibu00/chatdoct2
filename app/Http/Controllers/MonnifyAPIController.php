<?php

namespace App\Http\Controllers;

use App\Models\MonnifyAPI;
use App\Models\MonnifyTransfer;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class MonnifyAPIController extends Controller
{
    public function index()
    {
        $data['monnifyKeys'] = MonnifyAPI::find(1);
        return view('admin.monnify_settings', $data);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'secret_key' => 'required',
            'public_key' => 'required',
            'contract_code' => 'required',
        ]);

        // Check if the record already exists
        $monnifyKeys = MonnifyAPI::first();

        if ($monnifyKeys) {
            // Record already exists, update the existing record
            $monnifyKeys->update($validatedData);
        } else {
            // Record does not exist, create a new record
            MonnifyAPI::create($validatedData);
        }

        // Redirect or show a success message
        // For example:
        return redirect()->route('monnify.api')->with('success', 'MOnnify API settings saved successfully.');
    }

    public function getTransfers(Request $request)
    {
        $payload = $request->all();
        $paymentSourceInformation = $payload['eventData']['paymentSourceInformation'][0];
        $amountPaid = $paymentSourceInformation['amountPaid'];
        $customerEmail = $payload['eventData']['customer']['email'];
        $charges = Charges::select('funding_charges_amount')->first()->funding_charges_amount;

        $user = User::where('email', $customerEmail)->first();

        if ($user) {
            // Retrieve the user's wallet
            $wallet = Wallet::where('user_id', $user->id)->first();

            if ($wallet) {
                $wallet->balance += ($payload['eventData']['settlementAmount'] - $charges);
                $wallet->save();

                MonnifyTransfer::create([
                    'transaction_reference' => $payload['eventData']['transactionReference'],
                    'payment_reference' => $payload['eventData']['paymentReference'],
                    'paid_on' => $payload['eventData']['paidOn'],
                    'payment_source_information' => json_encode($paymentSourceInformation),
                    'destination_account_information' => json_encode($payload['eventData']['destinationAccountInformation']),
                    'amount_paid' => $amountPaid,
                    'settlement_amount' => $payload['eventData']['settlementAmount'],
                    'payment_status' => $payload['eventData']['paymentStatus'],
                    'customer_name' => $payload['eventData']['customer']['name'],
                    'customer_email' => $customerEmail,
                ]);

                return response('Webhook received', 200);
            }
        }

        return response('Reserved account or wallet not found', 404);
    }


}
