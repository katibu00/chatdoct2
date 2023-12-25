@extends('layouts.master')
@section('PageTitle','Wallet')
@section('content')

<div class="container-xxl mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Wallet Balance</h3>
                    </div>
                </div>
            
                <div id="kt_account_profile_details" class="collapse show">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="fw-bold">Current Balance: &#x20A6;{{number_format(Auth::user()->balance,0)}}</h4>
                            <a href="{{ route('wallet') }}" class="btn btn-primary btn-sm">Refresh Balance</a>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold">Add Funds to Your Account</h5>
                           

                            <div class="d-flex">
                                <a href="{{ route('pay_with_paystack') }}" class="btn btn-success me-3">Pay with Paystack</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Reserved Account Details -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Bank Transfer Details</h5>

                    @if(is_array($accounts) && count($accounts) > 0)
                    @foreach($accounts as $key => $account)
                    <div class="mb-3 {{ $loop->first ? 'border-top pt-3': '' }}">
                        <p class="mb-1">Account Name: {{ $account['accountName'] }}</p>
                        <p class="mb-1">Account Number: {{ $account['accountNumber'] }}</p>
                        <p class="mb-1">Bank Name: {{ $account['bankName'] }}</p>
                        {{-- <p class="mb-0">Charges: 5 per transfer</p> --}}
                    </div>
                </div>
                @endforeach
            @endif
                  
                    <p class="fw-bold mb-1">Transfer Instructions:</p>
                    <ul class="list-unstyled">
                        <li>1. Make a bank transfer using the provided account details.</li>
                        <li>2. Wait 5 - 10 minutes and refresh your wallet balance again.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
