@extends('layouts.master')
@section('PageTitle', 'My Patients')

@section('css')
    <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-primary me-3 mb-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="black" />
                            </svg>
                        </span>
                        Filter
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter">
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <form action="{{ route('doctor.patients') }}" method="post">
                            @csrf
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                    <select class="form-select form-select-solid fw-bolder" data-kt-select2="false"
                                        data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-customer-table-filter="Status" data-dropdown-parent="#kt-toolbar-filter" name="status">
                                        <option value="all">All</option>
                                        <option value="1">Initiated</option>
                                        <option value="0">Uninitiated</option>
                                        <option value="2">Completed</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                        data-kt-customer-table-filter="filter">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add this code wherever you want to display the validation errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row g-6 g-xl-9">

                @forelse ($doctors as $key => $doctor)
                    <div class="col-md-6 col-xl-4">
                        <div class="card d-n4one" id="kt_widget_5">
                            <div class="card-body pb-0"> 

                                <div class="d-flex align-items-center mb-5">
                                    <div class="symbol symbol-30px me-3">
                                        <img @if ( @$doctor->patient->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ @$doctor->patient->picture }}" @endif alt=""  />
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="ttext-gray-800 text-hover-primary fs-8 fw-bolder">
                                            {{ @$doctor->patient->first_name }}
                                            {{  @$doctor->patient->middle_name }}
                                            {{  @$doctor->patient->last_name }}</a>
                                        <span class="text-gray-400 fs-9 fw-bold">Booked {{ $doctor->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="ms-auto">
                                        <button type="button" class="btn btn-sm btn-secondary btn-icon" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        
                                        
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#form{{ $key }}" data-id="{{ $doctor->id }}">
                                                    <i class="bi bi-file-earmark-text menu-icon"></i> Pre-consultation Form
                                                </a>
                                            </div>
                                        
                                            @if ($doctor->book_type == 'chat')
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('doctor.chat') }}" class="menu-link" style="pointer-events: {{ $doctor->status == 1 ? '':'none' }}">
                                                        <i class="bi bi-chat menu-icon"></i> Go to Chat
                                                    </a>
                                                </div>
                                            @else
                                                <div class="menu-item px-3">
                                                    <a class="menu-link" data-bs-toggle="modal" data-bs-target="#link{{ $key }}" data-id="{{ $doctor->id }}">
                                                        <i class="bi bi-envelope menu-icon"></i> Send Link
                                                    </a>
                                                </div>
                                            @endif
                                        
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 appoint_time" data-bs-toggle="modal" data-bs-target="#appoint_time" data-id="{{ $doctor->id }}" data-name="{{ @$doctor->patient->first_name.' '. @$doctor->patient->middle_name.' '. @$doctor->patient->last_name }}">
                                                    <i class="bi bi-clock-history menu-icon"></i> Appoint Time
                                                </a>
                                            </div>
                                        
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 subs" data-bs-toggle="modal" data-bs-target="#subscription" data-id="{{ $doctor->id }}" data-name="{{ @$doctor->patient->first_name.' '. @$doctor->patient->middle_name.' '. @$doctor->patient->last_name }}">
                                                    <i class="bi bi-file-earmark-check menu-icon"></i> Send Prescription
                                                </a>
                                            </div>
                                        
                                            <div class="menu-item px-3">
                                                <a href="tel:{{ @$doctor->patient->phone }}" class="menu-link px-3">
                                                    <i class="bi bi-telephone-outbound menu-icon"></i> Call Patient
                                                </a>
                                            </div>
                                        
                                            <div class="menu-item px-3">
                                                <a href="{{ route('doctor.patients.complete', $doctor->id) }}" class="menu-link px-3">
                                                    <i class="bi bi-check2 menu-icon"></i> Mark Completed
                                                </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                

                                <div class="d-flex flex-wrap mb-5">
                                    <div class="row">

                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Time Slot</span>
                                                    <span
                                                        class="badge badge-light fw-bolder me-auto px-4 py-3">{{ $doctor->time_slot }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Pre-consultation
                                                    Form</span>
                                                @if ($doctor->pre_consultation == 1)
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2"
                                                                width="20" height="20" rx="10"
                                                                fill="black" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2"
                                                                width="20" height="20" rx="10"
                                                                fill="black" />
                                                            <rect x="7" y="15.3137" width="12"
                                                                height="2" rx="1"
                                                                transform="rotate(-45 7 15.3137)" fill="black" />
                                                            <rect x="8.41422" y="7" width="12"
                                                                height="2" rx="1"
                                                                transform="rotate(45 8.41422 7)" fill="black" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                    
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Status</span>
                                                    @if($doctor->status == 0)
                                                    <span class="badge badge-danger fw-bolder me-auto px-4 py-3">Awaiting Time Appointment</span>
                                                    @elseif($doctor->status == 1)
                                                    <span class="badge badge-success fw-bolder me-auto px-4 py-3">Active</span>
                                                    @elseif($doctor->status == 2)
                                                    <span class="badge badge-info fw-bolder me-auto px-4 py-3">completed</span>
                                                    @endif
                                                
                                            </div>
                                        </div>
                      
                                      @if($doctor->status == 1)
                                        @if(@$doctor->time)
                                            <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Exact Time</span>
                                                <span class="badge badge-light-info fw-bolder me-auto px-4 py-3">{{ \Carbon\Carbon::createFromFormat('H:i:s', @$doctor->time)->format('h:i A') }}</span>
                                            </div>
                                        </div>
                                        @endif
                                      @endif

                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span
                                                    class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Prescription</span>

                                                @if ($doctor->prescription == 1)
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2"
                                                                width="20" height="20" rx="10"
                                                                fill="black" />
                                                            <path
                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2"
                                                                width="20" height="20" rx="10"
                                                                fill="black" />
                                                            <rect x="7" y="15.3137" width="12"
                                                                height="2" rx="1"
                                                                transform="rotate(-45 7 15.3137)" fill="black" />
                                                            <rect x="8.41422" y="7" width="12"
                                                                height="2" rx="1"
                                                                transform="rotate(45 8.41422 7)" fill="black" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                       
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Booking
                                                    Type</span>
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    @if ($doctor->book_type == 'chat')
                                                        <span
                                                            class="badge badge-light fw-bolder me-auto px-4 py-3">Chat</span>
                                                    @elseif ($doctor->book_type == 'phone')
                                                        <span
                                                            class="badge badge-light fw-bolder me-auto px-4 py-3">Phone Call</span>
                                                    @else
                                                        <span
                                                            class="badge badge-light fw-bolder me-auto px-4 py-3">Video</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        @if ($doctor->book_type == 'phone')
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Contact Number</span>
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        <span
                                                            class="badge badge-light fw-bolder me-auto px-4 py-3">{{ @$doctor['patient']['phone'] }}</span>
                                                </span>
                                            </div>
                                        </div>
                                        @endif
                                     
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="form{{ $key }}" tabindex="-1" aria-hidden="true">
                      
                        <div class="modal-dialog mw-650px">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                    height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                    fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2"
                                                    rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                               
                                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                    <div class="text-center mb-13">
                                        <h1 class="mb-3">Pre-consultation Form</h1>
                                        <div class="text-muted fw-bold fs-5">
                                            {{ @$doctor['patient']['first_name'] }}
                                            {{ @$doctor['patient']['middle_name'] }}
                                            {{ @$doctor['patient']['last_name'] }}
                                        </div>
                                    </div>
                                   
                                    <div class="mb-15">
                                        <div class="mh-375px scroll-y me-n7 pe-7">

                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-6">
                                                        <img @if (@$doctor->patient->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ @$doctor->patient->picture }}" @endif
                                                            alt="" class="w-25" />

                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a class="d-flex align-items-center fs-5 fw-bolder ">Patient:&nbsp;
                                                            &nbsp;

                                                            <span class="text-dark text-hover-primary">
                                                                @if ($doctor->person == 'self')
                                                                    self
                                                                @else
                                                                    {{ $doctor->name }}
                                                                @endif
                                                            </span></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-6">
                                                        <a class="d-flex align-items-center fs-5 fw-bolder ">Age:&nbsp;
                                                            &nbsp;

                                                            <span class="text-dark text-hover-primary">
                                                                @if ($doctor->person == 'self')
                                                                    {{ @$doctor->patient->age }}
                                                                @else
                                                                    {{ $doctor->age }}
                                                                @endif
                                                            </span></a>

                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-6">
                                                        <a class="d-flex align-items-center fs-5 fw-bolder ">Sex:&nbsp;
                                                            &nbsp;

                                                            <span class="text-dark text-hover-primary">
                                                                @if ($doctor->person == 'self')
                                                                    {{ @$doctor->patient->sex }}
                                                                @else
                                                                    {{ $doctor->sex }}
                                                                @endif
                                                            </span></a>
                                                      
                                                    </div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                          
                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a class="d-flex align-items-center fs-5 fw-bolder ">Complain:&nbsp;
                                                            &nbsp;

                                                            <span class="text-dark text-hover-primary">
                                                                {{ $doctor->complain }}</span></a>
                                                        <!--end::Name-->

                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::User-->
                                            @if ($doctor->temperature != null)
                                                <div
                                                    class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Details-->
                                                        <div class="ms-6">
                                                            <!--begin::Name-->
                                                            <a class="d-flex align-items-center fs-5 fw-bolder ">Temperature
                                                                :&nbsp; &nbsp;

                                                                <span class="text-dark text-hover-primary">
                                                                    {{ $doctor->temperature }}&deg;C</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($doctor->pulse != null)
                                                <!--begin::User-->
                                                <div
                                                    class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Details-->
                                                        <div class="ms-6">
                                                            <!--begin::Name-->
                                                            <a class="d-flex align-items-center fs-5 fw-bolder ">Pulse
                                                                Rate:&nbsp; &nbsp;

                                                                <span class="text-dark text-hover-primary">
                                                                    {{ $doctor->pulse }}B/min</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($doctor->bp != null)
                                                <!--begin::User-->
                                                <div
                                                    class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Details-->
                                                        <div class="ms-6">
                                                            <!--begin::Name-->
                                                            <a class="d-flex align-items-center fs-5 fw-bolder ">Blood
                                                                Pressure:&nbsp; &nbsp;

                                                                <span class="text-dark text-hover-primary">
                                                                    {{ $doctor->bp }}mmHg</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($doctor->respiratory != null)
                                                <!--begin::User-->
                                                <div
                                                    class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Details-->
                                                        <div class="ms-6">
                                                            <!--begin::Name-->
                                                            <a class="d-flex align-items-center fs-5 fw-bolder ">Respiratory
                                                                Rate:&nbsp; &nbsp;

                                                                <span class="text-dark text-hover-primary">
                                                                    {{ $doctor->respiratory }}C/min</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($doctor->sugar != null)
                                                <!--begin::User-->
                                                <div
                                                    class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Details-->
                                                        <div class="ms-6">
                                                            <!--begin::Name-->
                                                            <a class="d-flex align-items-center fs-5 fw-bolder ">Blood
                                                                Sugar:&nbsp; &nbsp;

                                                                <span class="text-dark text-hover-primary">
                                                                    {{ $doctor->sugar }}mmol/L</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($doctor->weight != null)
                                                <!--begin::User-->
                                                <div
                                                    class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Details-->
                                                        <div class="ms-6">
                                                            <!--begin::Name-->
                                                            <a class="d-flex align-items-center fs-5 fw-bolder ">Weight:&nbsp;
                                                                &nbsp;

                                                                <span class="text-dark text-hover-primary">
                                                                    {{ $doctor->weight }}Kg</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($doctor->history != null)
                                                <!--begin::User-->
                                                <div
                                                    class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Details-->
                                                        <div class="ms-6">
                                                            <!--begin::Name-->
                                                            <a class="d-flex align-items-center fs-5 fw-bolder ">Medical
                                                                History:&nbsp; &nbsp;

                                                                <span class="text-dark text-hover-primary">
                                                                    {{ $doctor->history }}</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif







                                        </div>
                                        <!--end::List-->
                                    </div>
                                    <!--end::Users-->
                                    <!--begin::Notice-->
                                    <div class="d-flex justify-content-between">
                                        <!--begin::Label-->
                                        <div class="fw-bold">
                                            <label class="fs-6">Carefully Review all Information</label>
                                            <div class="fs-7 text-muted">Review the pre-consultation form before chatting
                                                with the patient</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            {{-- <input class="form-check-input" type="checkbox" value="" checked="checked" />
                                    <span class="form-check-label fw-bold text-muted">Allowed</span> --}}
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                   
                    <div class="modal fade" id="link{{ $key }}" tabindex="-1" aria-hidden="true">
                      
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <div class="modal-content">
                                <form class="form" action="{{ route('link') }}" id="kt_modal_new_address_form"
                                    method="post">
                                    @csrf
                                    <div class="modal-header" id="kt_modal_new_address_header">
                                        <h2>Send Video Chat Link to {{ @$doctor['patient']['first_name'] }}
                                            {{ @$doctor['patient']['middle_name'] }}
                                            {{ @$doctor['patient']['last_name'] }}</h2>
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                        height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="black" />
                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                        rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-body py-10 px-lg-17">
                                        <!--begin::Scroll-->
                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll"
                                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll"
                                            data-kt-scroll-offset="300px">
                                            <div class="row mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-12 fv-row">
                                                    <label class="required fs-5 fw-bold mb-2">Link</label>
                                                    <textarea name="link" class="form-control form-control-lg form-control-solid">{{ $doctor->link }}</textarea>
                                                    <input type="hidden" name="get_id" value="{{ $doctor->id }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer flex-center">
                                        <button type="reset" data-bs-dismiss="modal"
                                            class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                        </button>
                                    </div>
                                    
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning" role="alert">You don't have any patients yet. When you do, they will be listed here.</div>
                @endforelse

            </div>
        </div>
    
        <div class="modal fade" id="appoint_time" tabindex="-1" aria-hidden="true">
          
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('doctor.patients.time') }}" id=""
                        method="post">
                        @csrf
                        <div class="modal-header" id="">
                            <h2>Appoint Time to <span class="pname"></span></h2>
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                            height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                            fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2"
                                            rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                <input type="hidden" name="get_id" id="get_id_time" />
                                <div class="row mb-5 add_item">
                                    <div class="col-md-12 fv-row my-2">
                                        <label class="required fs-5 fw-bold mb-2">Time</label>
                                        <input type="time" class="form-control form-control-solid"
                                            placeholder="Medicine" name="time" required>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                            <!--end::Button-->
                        </div>
                        
                    </form>
    
                </div>
            </div>
        </div>
        <div class="modal fade" id="subscription" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" action="{{ route('prescription') }}" id="kt_modal_new_address_form"
                        method="post">
                        @csrf
                        <div class="modal-header" id="kt_modal_new_address_header">
                            <!--begin::Modal title-->
                            <h2>Send prescription to <span id="pname"></span></h2>
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                            height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                            fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2"
                                            rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                <input type="hidden" name="get_id" id="get_id" />
                                <div class="row mb-5 add_item">
                                    <div class="col-md-9 fv-row my-2">
                                        <label class="required fs-5 fw-bold mb-2">Medicine</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Medicine" name="name[]" required>
                                    </div>

                                    <div class="form-group col-md-1 mx-1" style="padding-top: 35px;">
                                        <span class="btn btn-success btn-sm addeventmore"><i
                                                class="fa fa-plus-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                        </div>
                        
                    </form>
                    <!--end::Form-->

                    <div style="visibility: hidden;">
                        <div class="whole_extra_item_add" id="whole_extra_item_add">
                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                <div class="row">

                                    <div class="fv-row col-md-9 my-2">
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Medicine" name="name[]" required>
                                    </div>
                                    <div class="form-group col-md-3 " style="padding-top: 10px;">
                                        <span class="btn btn-success btn-sm addeventmore"><i
                                                class="fa fa-plus-circle"></i></span>
                                        <span class="btn btn-danger btn-sm removeeventmore"><i
                                                class="fa fa-minus-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
       

    </div>
    <!--end::Post-->

@endsection


@section('js')

    <script>
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++
            });
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.subs').click(function() {
                const id = $(this).attr('data-id');
                const name = $(this).attr('data-name');

                $('#get_id').val(id);
                $('#pname').html(name)
             
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.appoint_time').click(function() {
                const id = $(this).attr('data-id');
                const name = $(this).attr('data-name');

                $('#get_id_time').val(id);
                $('.pname').html(name)
             
            });
        });
    </script>
  
@endsection
