<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
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
        $user->chat_rate = $request->chat_rate;
        $user->video_rate = $request->video_rate;
        $user->phone_rate = $request->phone_rate;
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

        $data['doctors'] = Booking::with(['patient','book'])->where('doctor_id', auth()->user()->id)->whereIn('status',[0,1])->orderBy('id','desc')->get();
        return view('doctor.reservations', $data);
    }
    public function sortPatients(Request $request)
    {

       if($request->status == 'all')
       {
           $data['doctors'] = Booking::with(['patient','book'])->where('doctor_id', auth()->user()->id)->get();
        }else
        {
            $data['doctors'] = Booking::with(['patient','book'])->where('doctor_id', auth()->user()->id)->where('status', $request->status)->get();
        }

        if( $data['doctors']->count() < 1)
        {
            Toastr::warning('No data Found.', 'Not Found');
            return redirect()->back();
        }

        return view('doctor.reservations', $data);
    }
    

    public function markComplete($id)
    {
   
       $booking = Booking::where('id',$id)->first();

       if(auth()->user()->role != 'admin')
       {
            if($booking->doctor_id != auth()->user()->id)
            {
            Toastr::error('Booking Not for you.', 'Error');
            return redirect()->back();
            }
       }
       
       if($booking){
        $booking->status = 2;
        $booking->update();
        $patient = User::find($booking->patient_id);
        $patient->notify(new PatientCompletionNotification($booking));

        Toastr::success('Booking Marked Completed Successfully.', 'Done');
        return redirect()->route('doctor.patients');

       }

       Toastr::error('Booking Not found.', 'Error');
       return redirect()->back();
    }
    
    public function appointTime(Request $request)
    {
        // dd($request->all());

        $booking = Booking::where('id',$request->get_id)->first();

        if($booking)
        {
            $booking->status = 1;
            $booking->time = $request->time;
            $booking->update();

            $patient = User::find($booking->patient_id);
            $time = $request->time;
            $patient->notify(new PatientTimeNotification($booking, $time));
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

}
