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
                            <!-- SMS API URL -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    SMS API URL
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sms_api_url"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="SMS API URL" value="{{ @$smsSettings->sms_api_url }}" />
                                    @error('sms_api_url')
                                        <span class="text-danger">{{ @$message }}</span>
                                    @enderror
                                </div>
                            </div>
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
                            <!-- Default SMS Type -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    Default SMS Type
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select name="default_sms_type" class="form-control form-control-lg form-control-solid">
                                        <option value="0" @if (@$smsSettings->default_sms_type === 0) selected @endif>
                                            Transactional
                                        </option>
                                        <option value="1" @if (@$smsSettings->default_sms_type === 1) selected @endif>
                                            Promotional
                                        </option>
                                    </select>
                                    @error('default_sms_type')
                                        <span class="text-danger">{{ @$message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Default Routing -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    Default Routing
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="default_routing"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Default Routing" value="{{ @$smsSettings->default_routing }}" />
                                    @error('default_routing')
                                        <span class="text-danger">{{ @$message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- DLR Timeout -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    DLR Timeout
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="dlr_timeout"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="DLR Timeout" value="{{ @$smsSettings->dlr_timeout }}" />
                                    @error('dlr_timeout')
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
