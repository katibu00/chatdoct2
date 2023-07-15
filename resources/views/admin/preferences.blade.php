@extends('layouts.master')

@section('PageTitle', 'Preferences')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">System Preferences</h3>
                    </div>
                </div>
                <div id="kt_account_profile_details" class="collapse show">
                    <form class="form" action="{{ route('preferences.index') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body border-top p-9">
                            <!-- Commission Charged -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">Commission Charged (%)</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Commission Charged in percentage"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="commission"
                                        class="form-control form-control-lg form-control-solid" max="100"
                                        placeholder="Commission Charged" value="{{ @$preferences->commission }}" />
                                    @error('commission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Welcome Bonus -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">Welcome Bonus</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Put zero if there is no any promotion"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="welcome_bonus"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Welcome Bonus" value="{{ @$preferences->welcome_bonus }}" />
                                    @error('welcome_bonus')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- SMS Settings -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span>SMS Settings</span>
                                </label>
                                <div class="col-lg-8">
                                    <!-- SMS Doctor When Booked -->
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="sms_doctor_when_booked"
                                            name="sms_doctor_when_booked" @if (@$preferences->sms_doctor_booked) checked @endif>
                                        <label class="form-check-label" for="sms_doctor_when_booked">
                                            SMS Doctor When Booked
                                        </label>
                                    </div>
                                    <!-- SMS Patient When Appointed Time -->
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="sms_patient_appointed_time"
                                            name="sms_patient_appointed_time" @if (@$preferences->sms_patient_appointed) checked @endif>
                                        <label class="form-check-label" for="sms_patient_appointed_time">
                                            SMS Patient When Appointed Time
                                        </label>
                                    </div>
                                    <!-- SMS Patient When Booking Completed -->
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="sms_patient_booking_completed"
                                            name="sms_patient_booking_completed" @if (@$preferences->sms_patient_completed) checked @endif>
                                        <label class="form-check-label" for="sms_patient_booking_completed">
                                            SMS Patient When Booking Completed
                                        </label>
                                    </div>
                                    <!-- SMS Doctor When Credited -->
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="sms_doctor_when_credited"
                                            name="sms_doctor_when_credited" @if (@$preferences->sms_doctor_credited) checked @endif>
                                        <label class="form-check-label" for="sms_doctor_when_credited">
                                            SMS Doctor When Credited
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary">Update Preferences</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->
@endsection
