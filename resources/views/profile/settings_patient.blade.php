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
                    <form class="form" id="update_profile_form" action="#"  enctype="multipart/form-data">
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <ul id="error_list"></ul>
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Profile Picture</label>
                              
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(/assets/media/avatars/blank.png)">
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: @if($user->picture == 'default.png') url(/uploads/default.png) @else url(/uploads/avatar/{{$user->picture}}) @endif" ></div>
                                 
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                         
                                        </label>
                                       
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                       
                                    </div>
                                  
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                                <!--end::Col-->
                            </div>
                          
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                              
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="{{$user->first_name}}" />
                                        </div>
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="last_name" class="form-control form-control-lg form-control-solid mb-3" placeholder="Last name" value="{{$user->last_name}}" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                            </div>
                           
                            @if(Auth::user()->role == 'doctor')
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Chat Rate</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                                </label>
                         
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="chat_rate" class="form-control form-control-lg form-control-solid" placeholder="Chat Rate" value="{{$user->chat_rate}}" />
                                </div>
                            </div>
                          
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Video Call Rate</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""></i>
                                </label>
                              
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="video_rate" class="form-control form-control-lg form-control-solid" placeholder="Video Call rate" value="{{$user->video_rate}}" />
                                </div>
                            </div>
                            @endif
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Contact Phone</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                                </label>
                          
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$user->phone}}" />
                                </div>
                            </div>
                           
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Age</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="age" class="form-control form-control-lg form-control-solid" placeholder="Enter your Age" value="{{$user->age}}" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Sex</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="sex" aria-label="Select Sex" data-control="select2" data-placeholder="Select sex.." class="form-select form-select-solid form-select-lg">
                                        <option value=""></option>
                                        <option data-bs-offset="-39600" value="Male" {{$user->sex == 'Male'?"Selected":""}}>Male</option>
                                        <option data-bs-offset="-39600" value="Female" {{$user->sex == 'Female'?"Selected":""}}>Female</option>
                                    </select>                                
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Address</label>
                                <div class="col-lg-8 fv-row">
                                 <textarea name="address" class="form-control form-control-lg form-control-solid">{{$user->address}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="submit_btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
    <!--end::Post-->

@endsection
@section('js')
@include('profile.update_profile_script')
@endsection
