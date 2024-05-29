<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\EscrowTransaction;
use App\Models\Prescription;
use App\Models\User;
use App\Models\WithdrawalRequest;
use App\Notifications\AdminWithdrawalRequestNotification;
use App\Notifications\PatientCompletionNotification;
use App\Notifications\PatientPrescriptionNotification;
use App\Notifications\PatientTimeNotification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as File;
use App\Models\BrevoAPIKey;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class DoctorController extends Controller
{
    public function SchedulesIndex()
    {
        $data['mondays'] = explode(',', Auth::user()->mondays);
        $data['tuesdays'] = explode(',', Auth::user()->tuesdays);
        $data['wednesdays'] = explode(',', Auth::user()->wednesdays);
        $data['thursdays'] = explode(',', Auth::user()->thursdays);
        $data['fridays'] = explode(',', Auth::user()->fridays);
        $data['saturdays'] = explode(',', Auth::user()->saturdays);
        $data['sundays'] = explode(',', Auth::user()->sundays);
        return view('profile.doctor_schedules', $data);
    }
    public function SettingsIndex()
    {
        return view('profile.settings_doctor', ['user' => auth()->user()]);
    }

    public function SettingsStore(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'last_name' => 'required|string|max:255',
            'chat_rate' => 'required|integer',
            'video_rate' => 'required|integer',
            'account_number' => 'required|digits:10',
            'account_name' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'phone_rate' => 'required|integer',
            'about' => ['required', 'string', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 30) {
                    $fail('The '.$attribute.' must not be more than 30 words.');
                }
            }],
        ]);

        $user = User::FindorFail(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->chat_rate = $request->chat_rate ?? 0;
        $user->video_rate = $request->video_rate ?? 0;
        $user->phone_rate = $request->phone_rate ?? 0;        
        $user->age = $request->age;
        $user->sex = $request->sex;
        $user->address = $request->address;
        $user->about = $request->about;
        $user->account_name = $request->account_name;
        $user->bank_name = $request->bank_name;
        $user->account_number = $request->account_number;

        if ($request->file('image') != null) {

            $destination = 'uploads/avatar/' . $user->picture;

            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/avatar', $filename);
            $user->picture = $filename;
        }

        $user->update();

        Toastr::success('Profile has been Updated sucessfully', 'Done');
        return redirect()->back();
    }

    public function SchedulesStore(Request $request)
    {

        $id = Auth::user()->id;
        $user = User::FindorFail($id);

        //mondays
        if ($request->mondays == '') {
            $user->mondays = '';
        } else {
            $user->mondays = implode(',', $request->mondays);
        }
        //tuesdays
        if ($request->tuesdays == '') {
            $user->tuesdays = '';
        } else {
            $user->tuesdays = implode(',', $request->tuesdays);
        }
        //wednesdays
        if ($request->wednesdays == '') {
            $user->wednesdays = '';
        } else {
            $user->wednesdays = implode(',', $request->wednesdays);
        }
        //thursdays
        if ($request->thursdays == '') {
            $user->thursdays = '';
        } else {
            $user->thursdays = implode(',', $request->thursdays);
        }
        //fridays
        if ($request->fridays == '') {
            $user->fridays = '';
        } else {
            $user->fridays = implode(',', $request->fridays);
        }
        //saturdays
        if ($request->saturdays == '') {
            $user->saturdays = '';
        } else {
            $user->saturdays = implode(',', $request->saturdays);
        }
        //sundays
        if ($request->sundays == '') {
            $user->sundays = '';
        } else {
            $user->sundays = implode(',', $request->sundays);
        }

        $user->update();

        Toastr::success('Your Schedules has been set sucessfully', 'Done');
        return redirect()->back();
    }

    public function MyPatients()
    {

        $data['doctors'] = Booking::with(['patient','book'])->where('doctor_id', auth()->user()->id)->whereIn('status',[0,1,2])->orderBy('id','desc')->get();
        return view('doctor.reservations', $data);
    }
    public function sortPatients(Request $request)
    {
        $status = $request->query('status', 'all');
    
        $statusMapping = [
            'all' => 'all',
            'initiated' => 1,
            'uninitiated' => 0,
            'completed' => 2
        ];
    
        $numericStatus = $statusMapping[$status] ?? 'all';
    
        if ($numericStatus == 'all') {
            $data['doctors'] = Booking::with(['patient', 'book'])->where('doctor_id', auth()->user()->id)->get();
        } else {
            $data['doctors'] = Booking::with(['patient', 'book'])->where('doctor_id', auth()->user()->id)->where('status', $numericStatus)->get();
        }
    
        if ($data['doctors']->count() < 1) {
            Toastr::warning('No data found.', 'Not Found');
            return redirect()->back();
        }
    
        return view('doctor.reservations', $data);
    }
    
    
    

    public function markComplete($id)
    {
        $booking = Booking::where('id', $id)->first();

        if (!$booking) {
            Toastr::error('Booking Not found.', 'Error');
            return redirect()->back();
        }

        if (auth()->user()->role != 'admin') {
            if ($booking->doctor_id != auth()->user()->id) {
                Toastr::error('Booking Not for you.', 'Error');
                return redirect()->back();
            }
        }

        // Check if the booking is already marked as complete
        if ($booking->status == 2) {
            Toastr::warning('Booking is already marked as complete.', 'Warning');
            return redirect()->back();
        }

        // Mark the booking as complete
        $booking->status = 2;
        $booking->update();

        $patient = User::find($booking->patient_id);
        $doctor = User::find($booking->doctor_id);
        $patient->notify(new PatientCompletionNotification($booking));

        $escrow = EscrowTransaction::where('booking_id', $booking->id)
            ->where('doctor_id', $booking->doctor_id)
            ->where('patient_id', $booking->patient_id)
            ->first();

        $escrow->completed = true;
        $escrow->save();

        $doctor->balance += $escrow->amount;
        $doctor->total_earning += $escrow->amount;
        $doctor->update();

        $this->sendBookingCompletionEmailToPatient($patient->email, $patient->first_name.' '.$patient->last_name);

        Toastr::success('Booking Marked Completed Successfully.', 'Done');
        return redirect()->route('doctor.patients');
    }

    
    public function appointTime(Request $request)
    {
        $booking = Booking::where('id',$request->get_id)->first();
        $patient = User::find($booking->patient_id);
        $doctor = User::find($booking->doctor_id);

        if($booking)
        {
            $booking->status = 1;
            $booking->time = $request->time;
            $booking->update();
            $time = $request->time;
            $patient->notify(new PatientTimeNotification($booking, $time));  
            $this->sendScheduledConsultationEmail($patient->first_name.' '.$patient->last_name, $patient->email,$doctor->first_name.' '.$doctor->last_name,$request->time);
            Toastr::success('Time Appointed Successfully.', 'Done');
            return redirect()->route('doctor.patients');
        }

        Toastr::error('Booking Not found.', 'Error');
        return redirect()->back();
    }

    public function Chat()
    {

        return view('test2');
    }

    public function link(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'link' => 'required|max:255',
        ]);
    
        // If validation fails, return back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $link = Booking::findorFail($request->get_id);
        $link->link = $request->link;
        $link->update();

        Toastr::success('Link sent sucessfully', 'Done');
        return redirect()->back();
    }

    public function prescription(Request $request)
    {

        $check = Prescription::where('booking_id', $request->get_id)->first();
        if ($check) {
            Toastr::error('Prescription has Already been sent', 'Not Allowed');
            return redirect()->back();
        }

        $nameCount = count($request->name);
        if ($nameCount != null) {
            for ($i = 0; $i < $nameCount; $i++) {
                $prescription = new Prescription();
                $prescription->booking_id = $request->get_id;
                $prescription->name = $request->name[$i];
                $prescription->save();
            }
        }

        $book = Booking::findorFail($request->get_id);
        $book->prescription = 1;
        $book->update();

        $patient = User::find($book->patient_id);
        $patient->notify(new PatientPrescriptionNotification($book));

        $this->sendPrescriptionNotificationToPatient($patient->email, $patient->first_name.' '.$patient->last_name);

        Toastr::success('Prescription Sent sucessfully', 'Done');
        return redirect()->back();
    }

    
    public function WalletIndex()
    {
        $data['payments'] = WithdrawalRequest::where('doctor_id', auth()->user()->id)->get();
        return view('doctor.wallet', $data);
    }
    
    public function withdrawalRequest(Request $request)
    {
        $check = WithdrawalRequest::where('doctor_id', auth()->user()->id)
                                    ->whereNotIn('status', ['approved', 'rejected'])
                                    ->first();
            if ($check) {
            Toastr::error('Wait until Previous Request has been resolved before submitting a new one.', 'Not Allowed');
            return redirect()->back();
        }

       if($request->amount > auth()->user()->balance)
       {
        Toastr::error('The amount Requested has Exceeded your Available Balance', 'Balance Exceeded');
        return redirect()->back();
       }
       $payment = new WithdrawalRequest();
       $payment->amount = $request->amount;
       $payment->doctor_id = auth()->user()->id;
       $payment->status = 'pending';
       $payment->save();

       $admins = User::where('role','admin')->get();
       $doctor = User::select('first_name','last_name','middle_name')->where('id', auth()->user()->id)->first();

       foreach($admins as $admin)
       {
            $admin->notify(new AdminWithdrawalRequestNotification($doctor));
       }

       Toastr::success('Your Withdrawal Request has been Submiteed Successfully');
       return redirect()->back();
    }

    private function sendScheduledConsultationEmail($patientName, $patientEmail, $doctorName, $consultationTime)
    {
        $apiKey = BrevoAPIKey::first()->secret_key ?? '';

        $endpoint = 'https://api.brevo.com/v3/smtp/email';

        // Email data
        $senderName = 'ChatDoc';
        $senderEmail = 'support@chatdoct.com';
        $recipientName = $patientName;
        $recipientEmail = $patientEmail;
        $subject = 'Scheduled Consultation';

        // Modify the HTML content for scheduled consultation
        $htmlContent = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Scheduled Consultation</title>
            <style>
                /* Add your custom styles here */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f7f7f7;
                    margin: 0;
                    padding: 0;
                    line-height: 1.6;
                    color: #333;
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
                    margin-bottom: 20px;
                }
                .message {
                    margin-top: 30px;
                }
                .message p {
                    margin-bottom: 20px;
                }
                .message p.title {
                    font-size: 20px;
                    font-weight: bold;
                    margin-bottom: 10px;
                }
                .message p.details {
                    font-size: 16px;
                    margin-bottom: 5px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="logo">
                    <img src="https://chatdoct.com/uploads/logo.jpg" alt="ChatDoc Logo">
                </div>
                <div class="message">
                    <p class="title">Scheduled Consultation Details</p>
                    <p>Hello ' . $recipientName . ',</p>
                    <p>We are pleased to inform you that your consultation with Dr. ' . $doctorName . ' has been scheduled.</p>
                    <p class="details">Consultation Date & Time: ' . $consultationTime . '</p>
                    <p class="details">Location: Virtual Meeting (Details will be provided)</p>
                    <p class="details">Please ensure that you are available at the scheduled time and have a stable internet connection.</p>
                    <p>If you have any questions or need to reschedule, feel free to contact us.</p>
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
            echo "Scheduled consultation email sent to $recipientEmail!";
        } else {
            // Failed to send email
            echo "Failed to send scheduled consultation email to $recipientEmail. Error: " . $response->status();
        }
    }


    private function sendBookingCompletionEmailToPatient($patientEmail, $patientName)
    {
        $apiKey = BrevoAPIKey::first()->secret_key ?? '';

        $endpoint = 'https://api.brevo.com/v3/smtp/email';

        // Email data
        $senderName = 'ChatDoc';
        $senderEmail = 'support@chatdoct.com';
        $recipientName = $patientName;
        $recipientEmail = $patientEmail;
        $subject = 'Booking Marked as Completed';

        // Modify the HTML content for booking completion email to the patient
        $htmlContent = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Booking Marked as Completed</title>
            <style>
                /* Add your custom styles here */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f7f7f7;
                    margin: 0;
                    padding: 0;
                    line-height: 1.6;
                    color: #333;
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
                    margin-bottom: 20px;
                }
                .message {
                    margin-top: 30px;
                }
                .message p {
                    margin-bottom: 20px;
                }
                .message p.title {
                    font-size: 20px;
                    font-weight: bold;
                    margin-bottom: 10px;
                }
                .message p.details {
                    font-size: 16px;
                    margin-bottom: 5px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="logo">
                    <img src="https://chatdoct.com/uploads/logo.jpg" alt="ChatDoc Logo">
                </div>
                <div class="message">
                    <p class="title">Booking Marked as Completed</p>
                    <p>Hello ' . $recipientName . ',</p>
                    <p>We are writing to inform you that your booking has been marked as completed by the doctor.</p>
                    <p>If you have any feedback or questions regarding your consultation, feel free to reach out to us.</p>
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
            echo "Booking completion email sent to $recipientEmail!";
        } else {
            // Failed to send email
            echo "Failed to send booking completion email to $recipientEmail. Error: " . $response->status();
        }
    }

    private function sendPrescriptionNotificationToPatient($patientEmail, $patientName)
    {
        $apiKey = BrevoAPIKey::first()->secret_key ?? '';

        $endpoint = 'https://api.brevo.com/v3/smtp/email';

        // Email data
        $senderName = 'ChatDoc';
        $senderEmail = 'support@chatdoct.com';
        $recipientName = $patientName;
        $recipientEmail = $patientEmail;
        $subject = 'Prescription Updated';

        // Modify the HTML content for prescription notification email to the patient
        $htmlContent = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Prescription Updated</title>
            <style>
                /* Add your custom styles here */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f7f7f7;
                    margin: 0;
                    padding: 0;
                    line-height: 1.6;
                    color: #333;
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
                    margin-bottom: 20px;
                }
                .message {
                    margin-top: 30px;
                }
                .message p {
                    margin-bottom: 20px;
                }
                .message p.title {
                    font-size: 20px;
                    font-weight: bold;
                    margin-bottom: 10px;
                }
                .message p.details {
                    font-size: 16px;
                    margin-bottom: 5px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="logo">
                    <img src="https://chatdoct.com/uploads/logo.jpg" alt="ChatDoc Logo">
                </div>
                <div class="message">
                    <p class="title">Prescription Updated</p>
                    <p>Hello ' . $recipientName . ',</p>
                    <p>We are writing to inform you that your prescription has been updated by the doctor.</p>
                    <p>Please review the prescription details in your account.</p>
                    <p>If you have any questions or concerns, feel free to contact us.</p>
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
            echo "Prescription notification email sent to $recipientEmail!";
        } else {
            // Failed to send email
            echo "Failed to send prescription notification email to $recipientEmail. Error: " . $response->status();
        }
    }



}
