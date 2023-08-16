@extends('layouts.master')

@section('PageTitle', 'SMS Settings')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#sms_settings" aria-expanded="true" aria-controls="sms_settings">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">SMS Settings</h3>
                    </div>
                </div>
                <div id="sms_settings" class="collapse show">
                    <form class="form" action="{{ route('sms.api.index') }}" method="post">
                        @csrf
                        <div class="card-body border-top p-9">
                           
                            <!-- API Token -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    API Token
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="api_token"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="API Token" value="{{ @$smsSettings->api_token }}" />
                                    @error('api_token')
                                        <span class="text-danger">{{ @$message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Sender ID -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    Sender ID
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sender_id"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Sender ID" value="{{ @$smsSettings->sender_id }}" />
                                    @error('sender_id')
                                        <span class="text-danger">{{ @$message }}</span>
                                    @enderror
                                </div>
                            </div>
                 
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->
@endsection
