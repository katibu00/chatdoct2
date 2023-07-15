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
                    @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form class="form" action="{{ route('monnify.api') }}" method="post">
                        @csrf
                        <div class="card-body border-top p-9">
                            <!-- SMS API URL -->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    Secret Key
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="secret_key"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Secret Key" value="{{ @$monnifyKeys->secret_key }}" />
                                    @error('secret_key')
                                        <span class="text-danger">{{ @$message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    Public Key
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="public_key"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Public Key" value="{{ @$monnifyKeys->public_key }}" />
                                    @error('public_key')
                                        <span class="text-danger">{{ @$message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    Contract Code
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="contract_code"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Contract Code" value="{{ @$monnifyKeys->contract_code }}" />
                                    @error('contract_code')
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
