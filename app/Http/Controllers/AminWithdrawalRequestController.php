<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;

class AminWithdrawalRequestController extends Controller
{
    public function index()
    {
        $data['requests'] = WithdrawalRequest::where('status','pending')->get();
        return view('admin.withdrawal_request', $data);
    }
}
