<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class DepositAlertController extends Controller
{
    public function index()
    {
        $data['deposits'] = Payment::latest()->take(30)->get();
        return view('admin.deposit_alert', $data);
    }

}
