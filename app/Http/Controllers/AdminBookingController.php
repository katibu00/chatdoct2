<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {

        $data['bookings'] = Booking::with(['patient', 'book', 'doctor'])->whereIn('status', [0, 1])->orderBy('id', 'desc')->get();
        return view('bookings.index', $data);
    }

    public function delete($id)
    {
        if (auth()->user()->role != 'admin') {
            Toastr::error('Not authorized.', 'Error');
            return redirect()->back();
        }

        $booking = Booking::where('id', $id)->first();
        if ($booking->delete()) {
            Toastr::success('Booking Deleted Successfully.', 'Done');
            return redirect()->route('admin.booking.index');
        }

        Toastr::error('Booking Not found.', 'Error');
        return redirect()->back();
    }

    public function sortBookings(Request $request)
    {

       if($request->status == 'all')
       {
        $data['bookings'] = Booking::with(['patient', 'book', 'doctor'])->whereIn('status', [0, 1])->orderBy('id', 'desc')->get();
        }else
        {
            $data['bookings'] = Booking::with(['patient', 'book', 'doctor'])->where('status', $request->status)->get();
        }

        if( $data['bookings']->count() < 1)
        {
            Toastr::warning('No data Found.', 'Not Found');
            return redirect()->back();
        }

        return view('bookings.index', $data);
    }
}
