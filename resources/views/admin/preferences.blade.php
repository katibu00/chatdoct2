@extends('layouts.master')
@section('PageTitle','Preferences')
@section('content')


	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">System Preferences</h3>
                    </div>
                </div>
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form class="form" action="{{route('preferences.index')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body border-top p-9">
                            
                           
                            
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">Commission Charged (%)</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Commission Charged in percentage"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="commission" class="form-control form-control-lg form-control-solid" max="100" placeholder="Commission Charged" value="{{ @$preferences->commission }}" />
                                    @error('chat_rate')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">Welcome Bonus</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Put zero if there is no any promotion"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="welcome_bonus" class="form-control form-control-lg form-control-solid" placeholder="Welcome Bonus" value="{{ @$preferences->welcome_bonus }}" />
                                    @error('chat_rate')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
