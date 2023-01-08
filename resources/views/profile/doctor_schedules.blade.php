@php
    $user = Auth::user();
@endphp
@extends('layouts.master')
@section('PageTitle','My Schedules')
@section('content')

	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img @if($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$user->picture}}" @endif  alt="image" />
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Dr. {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                                <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Doctor</a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->@if($user->role == 'doctor')D{{""}}@elseif($user->role == 'patient')P{{""}}@elseif($user->role == 'pending')X{{""}}@elseif($user->role == 'admin')A{{""}}@endif{{$user->number}}</a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{$user->email}}</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
            
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$user->balance}}" data-kt-countup-prefix="&#x20A6;">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Wallet Balance</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">                                               
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="5">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Active Bookings</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <div class="d-flex overflow-auto h-55px">
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6" href="{{route('doctors.profile.settings')}}">Profile Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6 active" href="{{route('doctors.schedules')}}">My Schedules</a>
                            </li>
                        </ul>
                    </div>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">My Schedules</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form class="form" action="{{route('doctors.schedules')}}" method="post">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
     
                            <!--Mondays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Mondays</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Mondays Schedules" name="mondays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$mondays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$mondays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$mondays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$mondays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->


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
                            <!--end::Input group-->

                            <!--Fridays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Fridays</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple data-hide-search="false" data-placeholder="Fridays Schedules" name="fridays[]">
                                        <option value=""></option>
                                        <option value="Morning" @if(in_array("Morning",$fridays)) selected @endif>Morning</option>
                                        <option value="Noon" @if(in_array("Noon",$fridays)) selected @endif>Noon</option>
                                        <option value="Evening" @if(in_array("Evening",$fridays)) selected @endif>Evening</option>
                                        <option value="Night" @if(in_array("Night",$fridays)) selected @endif>Night</option>
                                    </select>                                  
                                    </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->


                            <!--Saturdays-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Saturdays</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
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
                            <!--end::Input group-->

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
                            <!--end::Input group-->

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection
