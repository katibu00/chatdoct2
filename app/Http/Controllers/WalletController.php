<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\ReservedAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Paystack;




class WalletController extends Controller
{
    public function index(){

        $query = ReservedAccount::where('user_id', auth()->user()->id)->first();

        if ($query) {
            $data['accounts'] = json_decode($query->accounts, true);
        } else {
            $data['accounts'] = [];
        }
        return view('finance.wallet', $data);
    }
    public function paystackIndex(){


        return view('finance.paystack');
    }


    // public function redirectToGateway(Request $request)
    // {

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'amount' => 'required',
    //     ]);


    //     try {
    //         $paystack = new Paystack();

    //         $request->email = $request->email;
    //         $request->amount = $request->amount * 100;
    //         $request->reference = $paystack->genTranxRef();
    //         $request->key = config('paystack.secretKey');

    //         return $paystack->getAuthorizationUrl()->redirectNow();
    //     } catch (\Exception $e) {
    //         Toastr::error('Something went wrong. Please try again', 'warning');
    //         return redirect()->back();
    //     }
    // }


    public function redirectToGateway(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'required',
            'amount' => 'required',
        ]);
    
        try {
            $paystack = new Paystack();
    
            $request->merge([
                'email' => $request->input('email'),
                'amount' => $request->input('amount') * 100,
                'reference' => $paystack->genTranxRef(),
                'key' => config('paystack.secretKey'),
            ]);
    
            // Store necessary information in the session
            session(['payment_info' => [
                'user_id' => auth()->id(), // Store user_id
                'amount' => $request->amount,
                'reference' => $request->reference,
            ]]);
    
            return $paystack->getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong. Please try again', 'warning');
            return redirect()->back();
        }
    }
    


    // public function handleGatewayCallback()

    // {
    //     $paystack = new Paystack();
    //     $paymentDetails = $paystack->getPaymentData();

    //     if ($paymentDetails['data']['status'] == 'success') {

    //         $user_id = Auth::user()->id;
    //         $amount = $paymentDetails['data']['amount']/100;
    //         $payment = new Payment();
    //         $payment->user_id = $user_id;
    //         $payment->amount = $amount;
    //         $payment->ref = $paymentDetails['data']['reference'];
    //         $payment->save();
    //         $user = User::findorFail($user_id);
    //         $user->balance = $user->balance + $amount;
    //         $user->update();

    //         Toastr::success('Payment made Successfully', 'Done');
    //         return redirect()->route('patient.home');

    //     }
    // }



    public function handleGatewayCallback()
{
    $paystack = new Paystack();
    $paymentDetails = $paystack->getPaymentData();

    if ($paymentDetails['data']['status'] == 'success') {
        // Retrieve information from the session
        $paymentInfo = session('payment_info', []);

        if (!empty($paymentInfo)) {
            $user_id = $paymentInfo['user_id'];
            $amount = $paymentInfo['amount']/100;

            // Rest of your code remains unchanged
            $payment = new Payment();
            $payment->user_id = $user_id;
            $payment->amount = $amount;
            $payment->ref = $paymentDetails['data']['reference'];
            $payment->save();
            $user = User::findorFail($user_id);
            $user->balance = $user->balance + $amount;
            $user->update();

            Toastr::success('Payment made Successfully', 'Done');
            return redirect()->route('patient.home');

            // Clear the session after using the stored information
            session()->forget('payment_info');
        } else {
            Toastr::error('Payment information not found', 'Error');
        }
    }
}


}
