<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BrevoAPIKey;
use App\Models\EscrowTransaction;
use App\Models\Prescription;
use App\Models\SMSSettings;
use App\Models\User;
use App\Notifications\DoctorBookingNotification;
use App\Notifications\DoctorCancellationNotification;
use App\Notifications\PatientBookingNotification;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PatientController extends Controller
{
    public function DoctorsIndex()
    {
        $data['users'] = User::where('role', 'doctor')->where('status', 1)->paginate(10);
        return view('patient.doctors', $data);
    }

    public function DoctorsDetails($id)
    {

        if (Auth::guest()) {

            return view('auth.login', compact('id'));
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

        $data['user'] = User::where('id', $id)->first();
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
        $patient_id = auth()->user()->id;
        $balance = auth()->user()->balance;
        $doctor = User::where('id', $request->doctor_id)->first();
        $chat = $doctor->chat_rate;
        $video = $doctor->video_rate;
        $phone = $doctor->phone_rate;

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
        if ($request->book_type == 'phone') {
            if ($balance < $phone) {
                Toastr::error('Your balance is too low for this transaction. Please fund your wallet and try again.', 'Balance not Enough');
                return redirect()->back();
            }
        }

        $check = Booking::where('doctor_id', $request->doctor_id)
        ->where('patient_id', $patient_id)
        ->whereIn('status', [0, 1])
        ->first();
    
        if ($check) {
            Toastr::error('You already have booked this doctor', 'Not Allowed');
            return redirect()->back();
        }

        $book = new Booking();
        $book->patient_id = $patient_id;
        $book->doctor_id = $request->doctor_id;
        $book->time_slot = $request->time_slot;
        $book->book_type = $request->book_type;
        $book->preferred_language = $request->preferred_language;
        $book->status = 0;
        $book->save();

        $patient = User::findorFail($patient_id);
        if ($request->book_type == 'chat') {
            $patient->balance = $patient->balance - $chat;
          
            $escrow = new EscrowTransaction();
            $escrow->booking_id = $book->id;
            $escrow->patient_id = $patient_id;
            $escrow->doctor_id = $request->doctor_id;
            $escrow->amount = $chat; 
            $escrow->save();

        }
        if ($request->book_type == 'video') {
            $patient->balance = $patient->balance - $video;
            
            $escrow = new EscrowTransaction();
            $escrow->booking_id = $book->id;
            $escrow->patient_id = $patient_id;
            $escrow->doctor_id = $request->doctor_id;
            $escrow->amount = $video; 
            $escrow->save();

        }
        if ($request->book_type == 'phone') {
            $patient->balance = $patient->balance - $phone;

            $escrow = new EscrowTransaction();
            $escrow->booking_id = $book->id;
            $escrow->patient_id = $patient_id;
            $escrow->doctor_id = $request->doctor_id;
            $escrow->amount = $phone; 
            $escrow->save();
           
        }
        $patient->update();
        $patient->notify(new PatientBookingNotification($book));
        $doctor->notify(new DoctorBookingNotification($book));
        $this->patientBookingConfirmationEmail($patient->first_name.' '.$patient->last_name, $patient->email, $doctor->first_name.' '.$doctor->last_name,$request->book_type, now());
        $this->DoctorBookingNotificationEmail($doctor->first_name.' '.$doctor->last_name, $doctor->email, $patient->first_name.' '.$patient->last_name, $request->book_type, now());

        $doctorMessage = 'You have been booked by '.$patient->first_name.' '.$patient->last_name.' via '.$request->book_type;
        $patientMessage = 'You have booked Dr. '.$doctor->first_name.' '.$doctor->last_name.' via '.$request->book_type;


        // $this->sendSMS($patient->phone,$patientMessage);
        // $this->sendSMS($doctor->phone,$doctorMessage);
        
        Toastr::success('Your Booking has been made sucessfully', 'Done');
        $data['users'] = User::where('role', 'doctor')->where('status', 1)->get();
        return redirect()->route('reservations');
    }

    public function MyReservations()
    {

        $data['doctors'] = Booking::where('patient_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('patient.reservations', $data);
    }

    public function GetData(Request $request)
    {
        return Booking::with('patient')->findOrFail($request->id);
    }


    public function PreFormSave(Request $request)
    {
        $validated = $request->validate([
            'person' => 'nullable|string',
            'name' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'sex' => 'nullable|string|max:10',
            'complain' => 'nullable|string',
            'temperature' => 'nullable|numeric',
            'pulse' => 'nullable|numeric',
            'bp' => 'nullable|string|max:20',
            'respiratory' => 'nullable|numeric',
            'sugar' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'history' => 'nullable|string',
            'attachment1' => 'nullable|file|mimes:jpg,jpeg,png|max:1048', 
            'attachment2' => 'nullable|file|mimes:jpg,jpeg,png|max:1048', 
        ]);

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

        if ($request->hasFile('attachment1')) {
            $attachment1 = $request->file('attachment1');
            $attachment1Path = 'uploads/' . time() . '_attachment1_' . $attachment1->getClientOriginalName();
            $attachment1->move(public_path('uploads'), $attachment1Path);
            $book->attachment1 = $attachment1Path;
        }

        if ($request->hasFile('attachment2')) {
            $attachment2 = $request->file('attachment2');
            $attachment2Path = 'uploads/' . time() . '_attachment2_' . $attachment2->getClientOriginalName();
            $attachment2->move(public_path('uploads'), $attachment2Path);
            $book->attachment2 = $attachment2Path;
        }

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
        $user->total_earning -= $topay-$initial;
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
        $doctor = User::select('chat_rate', 'video_rate','phone_rate','id')->where('id', $booking->doctor_id)->first();

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
        if ($booking->book_type == 'phone') {
            $user = User::find(auth()->user()->id);
            $user->balance = $user->balance + $doctor->phone_rate;
            $user->update();
        }

        $escrow = EscrowTransaction::where('booking_id',$booking->id)->where('doctor_id',$booking->doctor_id)->where('patient_id',$booking->patient_id)->first();
        $escrow->completed = true;
        $escrow->save();

        $doctor->notify(new DoctorCancellationNotification($booking));

        $booking->status = 3;
        $booking->save();

        return response()->json([
            'status' => 200,
            'message' => 'Booking Cancelled Successfully',
        ]);

    }


    public function sortBookings(Request $request)
    {
        $user_id = auth()->user()->id;
        
        $statusMapping = [
            'initiated' => 1,
            'uninitiated' => 0,
            'completed' => 2,
            'cancelled' => 3,
            'all' => 'all'
        ];
        
        $status = $statusMapping[$request->status] ?? 'all';

        if ($status === 'all') {
            $doctors = Booking::with(['patient','book'])->where('patient_id', $user_id)->get();
        } else {
            $doctors = Booking::with(['patient','book'])
                              ->where('patient_id', $user_id)
                              ->where('status', $status)
                              ->get();
        }

        if ($doctors->count() < 1) {
            Toastr::warning('No data Found.', 'Not Found');
            return redirect()->back();
        }

        return view('patient.reservations', ['doctors' => $doctors]);
    }

    private function sendSMS($to, $message)
    {
        $settings = SMSSettings::first();
    
        if (!$settings) {
            return ['error' => 'SMS settings not found in the database'];
        }
    
        $apiToken = $settings->api_token;
        $senderId = $settings->sender_id;
    
        $url = 'https://app.smartsmssolutions.com/io/api/client/v1/sms/';
        $data = array(
            'token' => $apiToken,
            'sender' => $senderId,
            'to' => $to,
            'message' => $message,
            'type' => '0',
            'routing' => '3',
            'ref_id' => 'unique-ref-id',
            'simserver_token' => 'simserver-token',
            'dlr_timeout' => 'dlr-timeout'
        );
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
        ));
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
        curl_close($curl);
    
        $responseData = json_decode($response, true);
    
        return [
            'http_code' => $httpCode,
            'response' => $responseData
        ];
    }


    private function patientBookingConfirmationEmail($name, $email, $doctorName, $bookingType, $bookingTime)
    {
        $apiKey = BrevoAPIKey::first()->secret_key ?? '';
        $endpoint = 'https://api.brevo.com/v3/smtp/email';

        // Email data
        $senderName = 'ChatDoc';
        $senderEmail = 'support@chatdoct.com';
        $recipientName = $name;
        $recipientEmail = $email;
        $subject = 'Booking Confirmation';

        // HTML content for the email
        $htmlContent = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Booking Confirmation</title>
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
                .logo img {
                    max-width: 150px;
                    height: auto;
                }
                .social-media {
                    margin-top: 20px;
                }
                .social-media a {
                    display: inline-block;
                    margin-right: 10px;
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
                <div class="logo">
                    <img src="https://chatdoct.com/uploads/logo.jpg" alt="ChatDoc Logo">
                </div>
                <div class="message">
                    <p>Hello ' . $recipientName . ',</p>
                    <p>Your booking with ' . $doctorName . ' has been confirmed.</p>
                    <p>Booking Type: ' . $bookingType . '</p>
                    <p>Booked at: ' . $bookingTime . '</p>
                    <p>Please not that your Doctor will Schedule a time for your consultation. Thank you for choosing ChatDoc!</p>
                    <p>Best regards,<br>Your ChatDoc Team</p>
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
                    'name' => $recipientName,
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

        // Check if the request was successful
        if ($response->successful()) {
            // Email sent successfully
            echo "Booking confirmation email sent to $recipientEmail!";
        } else {
            // Failed to send email
            echo "Failed to send booking confirmation email to $recipientEmail. Error: " . $response->status();
        }
    }



    private function DoctorBookingNotificationEmail($doctorName, $doctorEmail, $patientName, $bookingType, $bookingTime)
    {
        $apiKey = BrevoAPIKey::first()->secret_key ?? '';

        $endpoint = 'https://api.brevo.com/v3/smtp/email';

        // Email data
        $senderName = 'ChatDoc';
        $senderEmail = 'support@chatdoct.com';
        $recipientName = $doctorName;
        $recipientEmail = $doctorEmail;
        $subject = 'New Booking Notification';

        // Modify the HTML content for booking notification to the doctor
        $htmlContent = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>New Booking Notification</title>
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
                    <p>Hello Dr. ' . $recipientName . ',</p>
                    <p>You have a new booking from patient ' . $patientName . '.</p>
                    <p>Booking Type: ' . $bookingType . '</p>
                    <p>Booked at: ' . $bookingTime . '</p>
                    <p>Please review and confirm the booking as soon as possible.</p>
                    <p>Best regards,<br>Your ChatDoc Team</p>
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
                    'name' => $recipientName,
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

        // Check if the request was successful
        if ($response->successful()) {
            // Email sent successfully
            echo "Booking notification email sent to Dr. $recipientName!";
        } else {
            // Failed to send email
            echo "Failed to send booking notification email to Dr. $recipientName. Error: " . $response->status();
        }
    }


    


}


