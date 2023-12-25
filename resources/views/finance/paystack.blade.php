@extends('layouts.master')
@section('PageTitle','Wallet')
@section('content')
@php
    $user = Auth::user();
@endphp

	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
          
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Pay Online</h3>
                    </div>
                </div>
             
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form class="form" action="{{route('pay')}}" method="post">
                       @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                          
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                             
                                <div class="col-lg-8">
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="{{$user->first_name}}" />
                                        </div>                        
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="last_name" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="{{$user->last_name}}" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Contact Phone</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                                </label>
                               
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$user->phone}}" />
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                           
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Email</span>
                                </label>
                             
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder="Enter your Age" value="{{$user->email}}" />
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                          
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Amount</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="amount" class="form-control form-control-lg form-control-solid" placeholder="Enter the amount"  />
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                            <input type="hidden" name="currency" value="NGN">
                   
            
             
                        </div>
                       
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Proceed to Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

@endsection
