<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function index()
    {
        return view('auth.changepassword');
    }

    public function sendEmail(Request $request)
    {
        //   return $request->all();

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

        $action_link = route('reset.password',['token' => $token, 'email' => $request->email]);
        $body = "We have received a request to reset your password for <b> Chatdoct </b> account associated with ".$request->email.
        " . You can reset your password by clicking the link below";

        Mail::send('mails.reset_password', ['action_link' => $action_link, 'body'=>$body], function($message) use ($request){
            $message->from('noreply@chatdoct.com','ChatDoct');
            $message->to($request->email,'ChatDoct Account')->subject('Reset Password');
        });

        return response()->json([
            'status' => 200,
            'message' => 'Password Reset Link Sent Successfully',
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
}
