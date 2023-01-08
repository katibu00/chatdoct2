<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\NewChatMessage;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function userlist()
    {
    
        // $users = User::latest()->where('id','!=',auth()->user()->id)->get();
        if(Auth::user()->role == 'patient'){
            $users = Booking::with('book')->where('patient_id',Auth::user()->id)->where('status',1)->get();
        }else{
            $users = Booking::with('patient')->where('doctor_id',Auth::user()->id)->where('status',1)->get();
        }
        // $users = Booking::with('book')->where('patient_id',Auth::user()->id)->where('status',1)->get();
        if(\Request::ajax()){
           return response()->json($users,200);
        }
        return abort(404);

    }

     public function user_message($id=null){

        if(!\Request::ajax()){
            return  abort(404);
        }

        $user = User::findOrFail($id);

        // $check = Booking::where('patient_id',Auth::user()->id)->where('doctor_id',2)->where('status',1)->where('pre_consultation',0)->first();
        // if($check){
        //     Toastr::error('Please Fill out Pre-Consultation Form', 'Not Allowed');
        //     return redirect()->back();
        // }

        
         $messages = Message::with('user')->where(function($q) use($id){
             $q->where('from',auth()->user()->id);
             $q->where('to',$id);
         })->orWhere(function($q) use($id){
            $q->where('from',$id);
            $q->where('to',auth()->user()->id);
         })->get();

         return response()->json([

            'messages' => $messages,
            'user' => $user,
        ]);
     }

     public function send_message(Request $request){
         $messages = Message::create([
             'message' => $request->message,
             'from' => auth()->user()->id,
             'to' => $request->user_id,
         ]);
         broadcast(new NewChatMessage($messages))->toOthers();
         return response()->json($messages, 201);
     }
}
