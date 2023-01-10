@php
    $user = Auth::user();
@endphp
@extends('layouts.master')
@section('PageTitle','My Schedules')
@section('content')

	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">

            @if(auth()->user()->chat_rate == null || auth()->user()->video_rate  == null || auth()->user()->about  == null || auth()->user()->phone == null || auth()->user()->address == null)
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                        </svg>
                    </span>
                    <div class="d-flex flex-stack flex-grow-1">
                        <div class="fw-bold">
                            <h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
                            <div class="fs-6 text-gray-700">Your profile is not complete. 
                            <a href="{{ route('doctors.profile.settings')}}" class="fw-bolder" >Update Profile</a>.</div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">My Schedules</h3>
                    </div>
                </div>
               
                <div id="kt_account_profile_details" class="collapse show">
                    <form class="form" action="{{route('doctors.schedules')}}" method="post">
                        @csrf
                        <div class="card-body border-top p-9">
     
                            <!--Mondays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Mondays</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i> --}}
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Mondays Schedules" name="mondays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$mondays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$mondays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$mondays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$mondays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                            </div>


                            <!--Tuesday-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Tuedays</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Tuesdays Schedules" name="tuesdays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$tuesdays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$tuesdays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$tuesdays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$tuesdays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--Wednesdays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Wednesdays</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Wednesdays Schedules" name="wednesdays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$wednesdays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$wednesdays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$wednesdays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$wednesdays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--Thursdays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Thursdays</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Thursdays Schedules" name="thursdays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$thursdays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$thursdays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$thursdays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$thursdays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                                <!--end::Col-->
                            </div>

                            <!--Fridays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Fridays</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Fridays Schedules" name="fridays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$fridays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$fridays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$fridays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$fridays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                            </div>


                            <!--Saturdays-->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Saturdays</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Saturdays Schedules" name="saturdays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$saturdays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$saturdays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$saturdays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$saturdays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                                <!--end::Col-->
                            </div>

                            <!--Sundays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Sundays</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Sundays Schedules" name="sundays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$sundays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$sundays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$sundays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$sundays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                                <!--end::Col-->
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

@endsection
