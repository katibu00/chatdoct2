<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BrevoAPIKey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ForgotPasswordController extends Controller
{

    public function index()
    {
        return view('auth.changepassword');
    }

    public function sendEmail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = 'https://chatdoct.com' . route('reset.password', ['token' => $token, 'email' => $request->email]);

        $body = "Hello!<br><br>" .
        "We've received a request to reset the password for your <b>ChatDoc</b> account associated with the email address: " . $request->email .
        ".<br><br>To reset your password, simply click on the button below:<br><br>" .
        "<a href='" . $action_link . "' style='display: inline-block; background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 5px;'>Reset Password</a><br><br>" .
        "If you didn't request a password reset, you can safely ignore this email.<br><br>" .
        "Thank you!<br>The ChatDoc Team";

        $this->sendResetPasswordLinkEmail($request->email, $body);
        
        return response()->json([
            'status' => 200,
            'message' => 'Password Reset Link Sent Successfully. Check your email.',
        ]);

    }

    public function resetForm(Request $request, $token = null)
    {
        return view('auth.reset_form')->with(['token'=>$token,'email'=>$request->email]);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password'=> 'required|min:6|confirmed',
            'password_confirmation'=>'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return response()->json([
                'status' => 400,
                'message' => 'Invalid Token',
            ]);
        }else{
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email'=>$request->password
            ])->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Password Reset Successfully',
            ]);
        }
    }


    private function sendResetPasswordLinkEmail($userEmail, $body)
    {
        $apiKey = BrevoAPIKey::first()->secret_key ?? '';

        $endpoint = 'https://api.brevo.com/v3/smtp/email';

        // Email data
        $senderName = 'ChatDoc';
        $senderEmail = 'support@chatdoct.com';
        $recipientEmail = $userEmail;
        $subject = 'Password Reset Request';

        // Modify the HTML content for booking notification to the doctor
        $htmlContent = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Password Reset Request</title>
            <style>
                /* Add your custom styles here */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f7f7f7;
                    margin: 0;
                    padding: 0;
                    line-height: 1.6;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
                .message {
                    margin-top: 30px;
                }
                .message p {
                    margin-bottom: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="message">
                    ' . $body . '
                   
                </div>
            </div>
        </body>
        </html>';

        // Prepare the data payload
        $data = [
            'sender' => [
                'name' => $senderName,
                'email' => $senderEmail,
            ],
            'to' => [
                [
                    'email' => $recipientEmail,
                ],
            ],
            'subject' => $subject,
            'htmlContent' => $htmlContent,
        ];

        // Send the HTTP request
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $apiKey,
            'content-type' => 'application/json',
        ])->post($endpoint, $data);

       
    }

}
