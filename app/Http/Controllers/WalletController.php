<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\PaystackAPI;
use App\Models\ReservedAccount;
use App\Models\User;





class WalletController extends Controller
{
    public function index(){

        $reservedAccount = ReservedAccount::where('user_id', auth()->user()->id)->first();

        $accounts = [];
    
        if ($reservedAccount) {
            $accounts = json_decode($reservedAccount->accounts, true);
        }

        return view('finance.wallet', compact('accounts'));
    }

    public function paystackIndex()
    {

        $publicKey = PaystackAPI::first()->public_key ?? '';
        return view('finance.paystack', compact('publicKey'));
    }




public function creditWallet(Request $request)
{
    $reference = $request->input('reference');
    $url = 'https://api.paystack.co/transaction/verify/' . $reference;
    
    $secretKey = PaystackAPI::first()->secret_key ?? '';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer '. $secretKey
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response);

    if ($result->status && $result->data->status == 'success') {
        // Credit the customer's wallet here
        $user = User::find($result->data->metadata->user_id);
        $user->balance += $result->data->amount / 100; // Convert from kobo to naira
        $user->save();

        return response()->json(['success' => 'Wallet has been credited.']);
    } else {
        return response()->json(['error' => 'Transaction was not successful.']);
    }
}


}
