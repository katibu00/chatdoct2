@extends('layouts.master')
@section('PageTitle', 'Doctor Application Form')

@section('content')



    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Doctor Application Form</h3>
                    </div>
                </div>
             
                <div id="kt_account_profile_details" class="collapse show">
                    <form class="form" action="{{ route('doctor.apply') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body border-top p-9">

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Profile Picture</label>
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url(/assets/media/avatars/blank.png)">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: @if (Auth::user()->picture == 'default.png') url(/uploads/default.png) @else url(/uploads/avatar/{{ Auth::user()->picture }}) @endif">
                                        </div>
                                      
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change image">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        
                                        </label>
                                       
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                       
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                   
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" name="first_name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="First name" value="{{ Auth::user()->first_name }}" />
                                            @error('first_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" name="middle_name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Middle name" value="{{ Auth::user()->middle_name }}" />
                                        </div>
                                        <!--end::Col-->
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" name="last_name"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Last name" value="{{ Auth::user()->last_name }}" />
                                            @error('last_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                           
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Rank</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Phone number must be active"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select Rank" name="rank">
                                        <option value=""></option>
                                        <option value="Professor">Professor</option>
                                        <option value="Consultant">Consultant</option>
                                        <option value="Resident Doctor">Resident Doctor</option>
                                        <option value="Medical Officer">Medical Officer</option>
                                    </select>
                                    @error('rank')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Speciality</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple
                                        data-hide-search="false" data-placeholder="Select Specialities" name="speciality[]">
                                        <option value=""></option>
                                        <option value="General Practitioner">General Practitioner</option>
                                        <option value="General Surgery">General Surgery</option>
                                        <option value="Dermotology">Dermotology</option>
                                        <option value="Immunology">Immunology</option>
                                        <option value="Radiology">Radiology</option>
                                        <option value="Family Medicine">Family Medicine</option>
                                        <option value="Internal Medicine">Internal Medicine</option>
                                        <option value="Neurology">Neurology</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Obstetrics">Obstetrics</option>
                                        <option value="Gynacology">Gynacology</option>
                                        <option value="Opthalmology">Opthalmology</option>
                                        <option value="Haematology">Haematology</option>
                                        <option value="Paediatrics">Paediatrics</option>
                                        <option value="Psychiatrics">Psychiatrics</option>
                                        <option value="Rheumatology">Rheumatology</option>
                                        <option value="Oncology">Oncology</option>
                                        <option value="Urology">Urology</option>
                                        <option value="Radiology">Radiology</option>
                                        <option value="Endocrinolgy">Endocrinolgy</option>
                                        <option value="Orthopaedics">Orthopaedics</option>
                                        <option value="Plastic Surgery">Plastic Surgery</option>
                                        <option value="Gastroenterology">Gastroenterology</option>
                                        <option value="Dental Surgery">Dental Surgery</option>
                                        <option value="Maxillofacial surgery">Maxillofacial surgery</option>
                                        <option value="ENT">ENT</option>
                                        <option value="Nephrology">Nephrology</option>

                                    </select>
                                    @error('speciality')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                           
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Contact Phone</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Phone number must be active"></i>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone"
                                        class="form-control form-control-lg form-control-solid" placeholder="Phone number"
                                        value="{{ Auth::user()->phone }}" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                           
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Years of Experience</label>
                               
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="experience"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Years of Experience" value="" />
                                    @error('experience')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Languages</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" multiple
                                        data-hide-search="false" data-placeholder="Select languages" name="languages[]">
                                        <option value=""></option>
                                        <option value="English">English</option>
                                        <option value="Pidgin">Pidgin</option>
                                        <option value="Hausa">Hausa</option>
                                        <option value="Yoruba">Yoruba</option>
                                        <option value="Igbo">Igbo</option>
                                        <option value="Fulfulde">Fulfulde</option>
                                        <option value="Tiv">Tiv</option>
                                        <option value="Kanuri">Kanuri</option>
                                        <option value="Ibibio">Ibibio</option>
                                    </select>
                                    @error('languages')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Practice License/Certificate
                                    of Registration</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url(/assets/media/avatars/blank.png)">
                                        <div class="image-input-wrapper w-125px h-150px"
                                            style="background-image: url(/no-image.jpg)"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change image">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="certificate" accept=".png, .jpg, .jpeg" />
                                        </label>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>

                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    @error('certificate')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Folio Number</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="folio"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Enter your Folio Number" value="{{ old('folio') }}" />
                                    @error('folio')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Sex</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="sex" class="form-select form-select-solid form-select-lg">
                                        <option value=""></option>
                                        <option data-bs-offset="-39600" value="Male"
                                            {{ Auth::user()->sex == 'Male' ? 'Selected' : '' }}>Male</option>
                                        <option data-bs-offset="-39600" value="Female"
                                            {{ Auth::user()->sex == 'Female' ? 'Selected' : '' }}>Female</option>
                                    </select>
                                    @error('sex')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Address</label>
                                <div class="col-lg-8 fv-row">
                                    <textarea name="address" class="form-control form-control-lg form-control-solid">{{ Auth::user()->address }}</textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">State and LGA</label>
                              
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 fv-row">
                                            <select onchange="toggleLGA(this);" name="state" id="state"
                                                class="form-select form-select-solid" data-placeholder="Select State"
                                                data-control="select2">
                                                <option value="" selected="selected">- Select State-</option>
                                                <option value="Abia" @if (@$user->state == 'Abia') selected @endif>
                                                    Abia</option>
                                                <option value="Adamawa" @if (@$user->state == 'Adamawa') selected @endif>
                                                    Adamawa</option>
                                                <option value="AkwaIbom" @if (@$user->state == 'AkwaIbom') selected @endif>
                                                    AkwaIbom</option>
                                                <option value="Anambra" @if (@$user->state == 'Anambra') selected @endif>
                                                    Anambra</option>
                                                <option value="Bauchi" @if (@$user->state == 'Bauchi') selected @endif>
                                                    Bauchi</option>
                                                <option value="Bayelsa" @if (@$user->state == 'Bayelsa') selected @endif>
                                                    Bayelsa</option>
                                                <option value="Benue" @if (@$user->state == 'Benue') selected @endif>
                                                    Benue</option>
                                                <option value="Borno" @if (@$user->state == 'Borno') selected @endif>
                                                    Borno</option>
                                                <option value="Cross River"
                                                    @if (@$user->state == 'Cross River') selected @endif>Cross River</option>
                                                <option value="Delta" @if (@$user->state == 'Delta') selected @endif>
                                                    Delta</option>
                                                <option value="Ebonyi" @if (@$user->state == 'Ebonyi') selected @endif>
                                                    Ebonyi</option>
                                                <option value="Edo" @if (@$user->state == 'Edo') selected @endif>
                                                    Edo</option>
                                                <option value="Ekiti" @if (@$user->state == 'Ekiti') selected @endif>
                                                    Ekiti</option>
                                                <option value="Enugu" @if (@$user->state == 'Enugu') selected @endif>
                                                    Enugu</option>
                                                <option value="FCT" @if (@$user->state == 'FCT') selected @endif>
                                                    FCT</option>
                                                <option value="Gombe" @if (@$user->state == 'Gombe') selected @endif>
                                                    Gombe</option>
                                                <option value="Imo" @if (@$user->state == 'Imo') selected @endif>
                                                    Imo</option>
                                                <option value="Jigawa" @if (@$user->state == 'Jigawa') selected @endif>
                                                    Jigawa</option>
                                                <option value="Kaduna" @if (@$user->state == 'Kaduna') selected @endif>
                                                    Kaduna</option>
                                                <option value="Kano" @if (@$user->state == 'Kano') selected @endif>
                                                    Kano</option>
                                                <option value="Katsina"
                                                    @if (@$user->state == 'Katsina') selected @endif>Katsina</option>
                                                <option value="Kebbi" @if (@$user->state == 'Kebbi') selected @endif>
                                                    Kebbi</option>
                                                <option value="Kogi" @if (@$user->state == 'Kogi') selected @endif>
                                                    Kogi</option>
                                                <option value="Kwara" @if (@$user->state == 'Kwara') selected @endif>
                                                    Kwara</option>
                                                <option value="Lagos" @if (@$user->state == 'Lagos') selected @endif>
                                                    Lagos</option>
                                                <option value="Nasarawa"
                                                    @if (@$user->state == 'Nasarawa') selected @endif>Nasarawa</option>
                                                <option value="Niger" @if (@$user->state == 'Niger') selected @endif>
                                                    Niger</option>
                                                <option value="Ogun" @if (@$user->state == 'Ogun') selected @endif>
                                                    Ogun</option>
                                                <option value="Ondo" @if (@$user->state == 'Ondo') selected @endif>
                                                    Ondo</option>
                                                <option value="Osun" @if (@$user->state == 'Osun') selected @endif>
                                                    Osun</option>
                                                <option value="Oyo" @if (@$user->state == 'Oyo') selected @endif>
                                                    Oyo</option>
                                                <option value="Plateau"
                                                    @if (@$user->state == 'Plateau') selected @endif>Plateau</option>
                                                <option value="Rivers" @if (@$user->state == 'Rivers') selected @endif>
                                                    Rivers</option>
                                                <option value="Sokoto" @if (@$user->state == 'Sokoto') selected @endif>
                                                    Sokoto</option>
                                                <option value="Taraba" @if (@$user->state == 'Taraba') selected @endif>
                                                    Taraba</option>
                                                <option value="Yobe" @if (@$user->state == 'Yobe') selected @endif>
                                                    Yobe</option>
                                                <option
                                                    value="Zamfara @if (@$user->state == 'Zamfara') selected @endif">
                                                    Zamfara</option>
                                            </select>
                                            @error('state')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6 fv-row mt-3">
                                            <select name="lga" id="lga"
                                                class="form-select form-select-solid select-lga" data-placeholder="LGA"
                                                data-control="select2">
                                                @if (@$user->lga != null)
                                                    <option value="{{ $user->lga }}" selected>{{ $user->lga }}
                                                    </option>
                                                @endif
                                            </select>
                                            @error('lga')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>

                                    </div>
                                </div>
                            </div>
                         
                        </div>
                       
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')


    <script src="/assets/js/custom/account/settings/profile-details.js"></script>
    <script src="/assets/js/custom/account/settings/deactivate-account.js"></script>
    <script src="/lga/lga2.min.js"></script>

@endsection
