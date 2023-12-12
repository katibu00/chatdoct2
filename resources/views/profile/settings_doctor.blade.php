@extends('layouts.master')
@section('PageTitle','Settings')
@section('content')
@php
    $user = Auth::user();
@endphp

	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                </div>
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                  
                    <form class="form" action="{{route('doctors.profile.settings')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="card-body border-top p-9">
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Profile Picture</label>
                               
                               
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(/assets/media/avatars/blank.png)">
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: @if($user->picture == 'default.png') url(/uploads/default.png) @else url(/uploads/avatar/{{$user->picture}}) @endif" ></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        </label>
                                       
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        
                                    </div>
                                    
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                               
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                               
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                       
                                        <div class="col-lg-6 mb-3 fv-row">
                                            <input type="text" name="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="{{ old('first_name', $user->first_name) }}" />
                                            @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
               
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="last_name" class="form-control form-control-lg form-control-solid mb-3" placeholder="Last name" value="{{ old('last_name', $user->last_name) }}" />
                                            @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                </div>
                               
                            </div>
                            
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Chat Rate</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="chat_rate" class="form-control form-control-lg form-control-solid" placeholder="Chat Rate" value="{{ old('chat_rate', $user->chat_rate) }}" />
                                    @error('chat_rate')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                            </div>
                            
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Video Call Rate</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="video_rate" class="form-control form-control-lg form-control-solid" placeholder="Video Call rate" value="{{ old('video_rate', $user->video_rate) }}" />
                                    @error('video_rate')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Phone Call Rate</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="phone_rate" class="form-control form-control-lg form-control-solid" placeholder="Phone Call rate" value="{{ old('phone_rate', $user->phone_rate) }}" />
                                    @error('phone_rate')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">About (50 words max)</label>
                                <div class="col-lg-8 fv-row">
                                 <textarea name="about" class="form-control form-control-lg form-control-solid">{{ old('about', $user->about) }}</textarea>
                                 @error('about')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
                            </div>

                           
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Contact Phone</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{ old('phone', $user->phone) }}" />
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Age</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="age" class="form-control form-control-lg form-control-solid" placeholder="Enter your Age" value="{{ old('age', $user->age) }}" />
                                </div>
                            </div> 
                       
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Sex</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="sex" aria-label="Select Sex" data-control="select2" data-placeholder="Select sex.." class="form-select form-select-solid form-select-lg">
                                        <option value=""></option>
                                        <option data-bs-offset="-39600" value="Male" {{ old('sex', $user->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option data-bs-offset="-39600" value="Female" {{ old('sex', $user->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>                             
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Address</label>
                                <div class="col-lg-8 fv-row">
                                 <textarea name="address" class="form-control form-control-lg form-control-solid">{{ old('address', $user->address) }}</textarea>
                                 @error('address')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Account Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="account_name" class="form-control form-control-lg form-control-solid" placeholder="Enter your Account Name" value="{{ old('account_name', $user->account_name) }}" />
                                    @error('account_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Bank</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="bank_name" aria-label="Select Bank" data-control="select2" data-placeholder="Select your bank.." class="form-select form-select-solid form-select-lg">
                                        <option value=""></option>
                                        <option data-bs-offset="-39600" value="Access Bank" {{ old('bank_name', $user->bank_name) == 'Access Bank' ? 'selected' : '' }}>Access Bank</option>
                                        <option data-bs-offset="-39600" value="Citibank Nigeria" {{ old('bank_name', $user->bank_name) == 'Citibank Nigeria' ? 'selected' : '' }}>Citibank Nigeria</option>
                                        <option data-bs-offset="-39600" value="Diamond Bank" {{ old('bank_name', $user->bank_name) == 'Diamond Bank' ? 'selected' : '' }}>Diamond Bank</option>
                                        <option data-bs-offset="-39600" value="Ecobank Nigeria" {{ old('bank_name', $user->bank_name) == 'Ecobank Nigeria' ? 'selected' : '' }}>Ecobank Nigeria</option>
                                        <option data-bs-offset="-39600" value="Fidelity Bank" {{ old('bank_name', $user->bank_name) == 'Fidelity Bank' ? 'selected' : '' }}>Fidelity Bank</option>
                                        <option data-bs-offset="-39600" value="First Bank of Nigeria" {{ old('bank_name', $user->bank_name) == 'First Bank of Nigeria' ? 'selected' : '' }}>First Bank of Nigeria</option>
                                        <option data-bs-offset="-39600" value="First City Monument Bank (FCMB)" {{ old('bank_name', $user->bank_name) == 'First City Monument Bank (FCMB)' ? 'selected' : '' }}>First City Monument Bank (FCMB)</option>
                                        <option data-bs-offset="-39600" value="Guaranty Trust Bank" {{ old('bank_name', $user->bank_name) == 'Guaranty Trust Bank' ? 'selected' : '' }}>Guaranty Trust Bank</option>
                                        <option data-bs-offset="-39600" value="Heritage Bank" {{ old('bank_name', $user->bank_name) == 'Heritage Bank' ? 'selected' : '' }}>Heritage Bank</option>
                                        <option data-bs-offset="-39600" value="Keystone Bank" {{ old('bank_name', $user->bank_name) == 'Keystone Bank' ? 'selected' : '' }}>Keystone Bank</option>
                                        <option data-bs-offset="-39600" value="Kuda Microfinance Bank" {{ old('bank_name', $user->bank_name) == 'Kuda Microfinance Bank' ? 'selected' : '' }}>Kuda Microfinance Bank</option>
                                        <option data-bs-offset="-39600" value="Opay Digital Services" {{ old('bank_name', $user->bank_name) == 'Opay Digital Services' ? 'selected' : '' }}>Opay Digital Services</option>
                                        <option data-bs-offset="-39600" value="Polaris Bank" {{ old('bank_name', $user->bank_name) == 'Polaris Bank' ? 'selected' : '' }}>Polaris Bank</option>
                                        <option data-bs-offset="-39600" value="Stanbic IBTC Bank" {{ old('bank_name', $user->bank_name) == 'Stanbic IBTC Bank' ? 'selected' : '' }}>Stanbic IBTC Bank</option>
                                        <option data-bs-offset="-39600" value="Standard Chartered Bank" {{ old('bank_name', $user->bank_name) == 'Standard Chartered Bank' ? 'selected' : '' }}>Standard Chartered Bank</option>
                                        <option data-bs-offset="-39600" value="Sterling Bank" {{ old('bank_name', $user->bank_name) == 'Sterling Bank' ? 'selected' : '' }}>Sterling Bank</option>
                                        <option data-bs-offset="-39600" value="Union Bank of Nigeria" {{ old('bank_name', $user->bank_name) == 'Union Bank of Nigeria' ? 'selected' : '' }}>Union Bank of Nigeria</option>
                                        <option data-bs-offset="-39600" value="United Bank for Africa (UBA)" {{ old('bank_name', $user->bank_name) == 'United Bank for Africa (UBA)' ? 'selected' : '' }}>United Bank for Africa (UBA)</option>
                                        <option data-bs-offset="-39600" value="Unity Bank" {{ old('bank_name', $user->bank_name) == 'Unity Bank' ? 'selected' : '' }}>Unity Bank</option>
                                        <option data-bs-offset="-39600" value="Wema Bank" {{ old('bank_name', $user->bank_name) == 'Wema Bank' ? 'selected' : '' }}>Wema Bank</option>
                                    </select>
                                    
                                    @error('bank_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                                               
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Account Number</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="account_number" class="form-control form-control-lg form-control-solid" placeholder="Enter your Account Number" value="{{ old('account_number', $user->account_number) }}" />
                                    @error('account_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 

                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>          
        </div>
    </div>
    <!--end::Post-->

@endsection
