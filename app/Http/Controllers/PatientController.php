<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Prescription;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function DoctorsIndex()
    {
        $data['users'] = User::where('role', 'doctor')->where('status', 1)->paginate(10);
        return view('patient.doctors', $data);
    }

    public function DoctorsDetails($number)
    {

        if (Auth::guest()) {

            return view('auth.login', compact('number'));
        }

        $hour = date("H");
        $time = '';
        if ($hour >= "6" && $hour < "12") {
            $time = "Morning";
        } else
        if ($hour >= "12" && $hour < "18") {
            $time = "Noon";
        } else
        if ($hour >= "18" && $hour < "24") {
            $time = "Evening";
        } else
        if ($hour >= "1" && $time < "6") {
            $time = "Night";
        }
        $day = strtolower(date('l')) . 's';

        $data['user'] = User::where('number', $number)->first();
        $schedules = explode(',', $data['user']->$day);

        $data['availability'] = '';

        if (in_array($time, $schedules)) {
            $data['availability'] = 'yes';
        } else {
            $data['availability'] = 'no';
        }
        // dd($time);
        return view('patient.details', $data);
    }

    public function BookDoctor(Request $request)
    {
        $id = auth()->user()->id;
        $balance = auth()->user()->balance;
        $doctor = User::where('id', $request->doctor_id)->first();
        $chat = $doctor->chat_rate;
        $video = $doctor->video_rate;

        $day = strtolower(date('l')) . 's';
        $schedules = explode(',', $doctor->$day);

        if (!in_array($request->time_slot, $schedules)) {
            Toastr::error('Doctor Unavailable at that time slot. Please choose another time slot and try again', 'Doctor Not Available');
            return redirect()->back();
        }

        if ($request->book_type == 'chat') {
            if ($balance < $chat) {
                Toastr::error('Your balance is too low for this transaction. Please fund your wallet and try again.', 'Balance not Enough');
                return redirect()->back();
            }
        }
        if ($request->book_type == 'video') {
            if ($balance < $video) {
                Toastr::error('Your balance is too low for this transaction. Please fund your wallet and try again.', 'Balance not Enough');
                return redirect()->back();
            }
        }

        $check = Booking::where('doctor_id', $request->doctor_id)->where('patient_id', $id)->where('status', 1)->first();
        if ($check) {

            Toastr::error('You already have book this doctor', 'Not Allowed');
            return redirect()->back();
        }

        $book = new Booking();
        $book->patient_id = $id;
        $book->doctor_id = $request->doctor_id;
        $book->time_slot = $request->time_slot;
        $book->book_type = $request->book_type;
        $book->status = 0;
        $book->save();

        $patient = User::findorFail($id);
        if ($request->book_type == 'chat') {
            $patient->balance = $patient->balance - $chat;
        }
        if ($request->book_type == 'video') {
            $patient->balance = $patient->balance - $video;
        }
        $patient->update();

        Toastr::success('Your Booking has been made sucessfully', 'Done');

        $data['users'] = User::where('role', 'doctor')->where('status', 1)->get();
        return redirect()->route('reservations');
    }

    public function MyReservations()
    {

        $data['doctors'] = Booking::where('patient_id', Auth::user()->id)->whereIn('status',[0,1])->orderBy('id', 'desc')->get();
        return view('patient.reservations', $data);
    }

    public function GetData(Request $request)
    {
        return Booking::with('patient')->findOrFail($request->id);
    }

    public function PreFormSave(Request $request)
    {

        $book = Booking::findOrFail($request->get_id);
        $book->pre_consultation = 1;
        $book->person = $request->person;
        $book->name = $request->name;
        $book->age = $request->age;
        $book->sex = $request->sex;
        $book->complain = $request->complain;
        $book->temperature = $request->temperature;
        $book->pulse = $request->pulse;
        $book->bp = $request->bp;
        $book->respiratory = $request->respiratory;
        $book->sugar = $request->sugar;
        $book->history = $request->history;
        $book->weight = $request->weight;
        $book->update();

        Toastr::success('Pre-consultation Form filled successfully', 'Done');
        return redirect()->back();
    }

    public function download($id)
    {

        $book = $book = Booking::findOrFail($id);
        $medicines = Prescription::where('booking_id', $id)->get();
        $pdf = PDF::loadView('pdf.prescription', compact('book', 'medicines'));
        return $pdf->download('prescription_form.pdf');
    }

    public function changeBooking(Request $request)
    {
 
        $booking = Booking::find($request->booking_id);
        if ($booking->book_type == $request->book_type) {
            return response()->json([
                'status' => 400,
                'message' => 'No change Made. You are already on this book type.',
            ]);
        };
        $doctor = User::select('chat_rate', 'video_rate','phone_rate')->where('id', $booking->doctor_id)->first();
        $initial = 0;
        $topay = 0;
        if($booking->book_type == 'chat')
        {
            $initial = $doctor->chat_rate;
        }
        if($booking->book_type == 'video')
        {
            $initial = $doctor->video_rate;
        }
        if($booking->book_type == 'phone')
        {
            $initial = $doctor->phone_rate;
        }
        if($request->book_type == 'chat')
        {
            $topay = $doctor->chat_rate;
        }
        if($request->book_type == 'video')
        {
            $topay = $doctor->video_rate;
        }
        if($request->book_type == 'phone')
        {
            $topay = $doctor->phone_rate;
        }
        
        $user = User::find(auth()->user()->id);

        if($user->balance+$initial < $topay)
        {
            return response()->json([
                'status' => 400,
                'message' => 'Low Balance To perform this operation',
            ]);
        }

        $user->balance -= $topay-$initial;
        $user->update();
      

        $booking->book_type = $request->book_type;
        $booking->update();

        return response()->json([
            'status' => 200,
            'message' => 'Booking Type Changed Successfully',
        ]);

    }

    public function adjustBooking(Request $request)
    {
        // return $request->all();
        $booking = Booking::find($request->booking_id);
        $doctor = User::select('chat_rate', 'video_rate')->where('id', $booking->doctor_id)->first();

        $day = strtolower(date('l')) . 's';
        $doctor = User::where('id', $booking->doctor_id)->first();
        $schedules = explode(',', $doctor->$day);

        if (!in_array($request->time_slot, $schedules)) {
            return response()->json([
                'status' => 400,
                'message' => 'Doctor Unavailable at that time slot. Please choose another time slot and try again',
            ]);
        }

        $booking->time_slot = $request->time_slot;
        $booking->update();

        return response()->json([
            'status' => 200,
            'message' => 'Time slot adjusted Successfully',
        ]);

    }
    
    public function cancelBooking(Request $request)
    {
        $booking = Booking::find($request->booking_id);

        if ($booking->status == 1 || $booking->status == 2) {
            return response()->json([
                'status' => 400,
                'message' => 'Time period in which you can cancel booking has been elapsed.',
            ]);
        };
        $doctor = User::select('chat_rate', 'video_rate')->where('id', $booking->doctor_id)->first();

        if ($booking->book_type == 'video') {
            $user = User::find(auth()->user()->id);
            $user->balance = $user->balance + $doctor->video_rate;
            $user->update();
        }
        if ($booking->book_type == 'chat') {
            $user = User::find(auth()->user()->id);
            $user->balance = $user->balance + $doctor->chat_rate;
            $user->update();
        }
        $booking->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Booking Cancelled Successfully',
        ]);

    }


    public function sortBookings(Request $request)
    {
        $user_id = auth()->user()->id;
       if($request->status == 'all')
       {
           $data['doctors'] = Booking::with(['patient','book'])->where('patient_id', $user_id)->get();
        }else
        {
            $data['doctors'] = Booking::with(['patient','book'])->where('patient_id', $user_id)->where('status', $request->status)->get();
        }

        if( $data['doctors']->count() < 1)
        {
            Toastr::warning('No data Found.', 'Not Found');
            return redirect()->back();
        }

        return view('patient.reservations', $data);
    }

}
