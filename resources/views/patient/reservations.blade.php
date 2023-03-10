@extends('layouts.master')
@section('PageTitle', 'My Reservations')

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
                        <form action="{{ route('doctors.index') }}" method="post">
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row g-6 g-xl-9">
                @foreach ($doctors as $key => $doctor)
                    <div class="col-md-6 col-xl-4">
                        <div class="card d-n4one" id="kt_widget_5">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center mb-5">
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <div class="symbol symbol-45px me-5">
                                            <img @if ($doctor['book']['picture'] == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $doctor['book']['picture'] }}" @endif
                                                alt=""  />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('doctors.details', $doctor['book']['number']) }}" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Dr.
                                                {{ $doctor['book']['first_name'] }} {{ $doctor['book']['middle_name'] }}
                                                {{ $doctor['book']['last_name'] }}</a>
                                            <span class="text-gray-400 fw-bold">Booked
                                                {{ $doctor->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="my-0">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                    viewBox="0 0 24 24">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5"
                                                            rx="1" fill="#000000" />
                                                        <rect x="14" y="5" width="5" height="5"
                                                            rx="1" fill="#000000" opacity="0.3" />
                                                        <rect x="5" y="14" width="5" height="5"
                                                            rx="1" fill="#000000" opacity="0.3" />
                                                        <rect x="14" y="14" width="5" height="5"
                                                            rx="1" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                                            data-kt-menu="true">
                                            <div class="separator mb-3 opacity-75"></div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 cancel_booking"
                                                    data-bs-toggle="modal" data-bs-target="#cancel_booking_modal"
                                                    data-booking_id="{{ $doctor->id }}"
                                                    data-doctor_name="Dr. {{ $doctor['book']['first_name'] . ' ' . $doctor['book']['middle_name'] . ' ' . $doctor['book']['last_name'] }}">Cancel
                                                    Booking</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 adjust_time" data-bs-toggle="modal"
                                                    data-bs-target="#adjust_time_modal"
                                                    data-booking_id="{{ $doctor->id }}"
                                                    data-doctor_name="Dr. {{ $doctor['book']['first_name'] . ' ' . $doctor['book']['middle_name'] . ' ' . $doctor['book']['last_name'] }}">Adjust
                                                    Time</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 change_booking" data-bs-toggle="modal"
                                                    data-bs-target="#change_booking_modal"
                                                    data-booking_id="{{ $doctor->id }}"
                                                    data-doctor_name="Dr. {{ $doctor['book']['first_name'] . ' ' . $doctor['book']['middle_name'] . ' ' . $doctor['book']['last_name'] }}">Change booking Type</a>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap mb-5">
                                    <div class="row">
                                       
                                     <div class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                         <div class="d-flex align-items-center mb-">
                                             <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Pre-consultation Form</span>
                                                @if ($doctor->pre_consultation == 1)                                         
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                     <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                                     <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                                                 </svg>
                                                </span>
                                                 @else
                                                 <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                @endif
                                         </div>
                                     </div>
                                
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                         <div class="d-flex align-items-center mb-">
                                             <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Prescription</span>
                                            
                                                @if ($doctor->prescription == 1) 
                                                <span class="svg-icon svg-icon-1 svg-icon-success">                                            
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                     <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                                     <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                                                 </svg>
                                                </span>
                                                 @else
                                                 <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                                        <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black" />
                                                        <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black" />
                                                    </svg>
                                                </span>
                                                @endif
                                         </div>
                                     </div>
                            
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                         <div class="d-flex align-items-center mb-">
                                             <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Booking Type</span>
                                             <span class="svg-icon svg-icon-1 svg-icon-success">
                                                @if ($doctor->book_type == 'chat')                                             
                                                <span class="badge badge-light fw-bolder me-auto px-4 py-3">Chat</span>
                                                 @else
                                                 <span class="badge badge-light fw-bolder me-auto px-4 py-3">Video</span>
                                                @endif
                                             </span>
                                         </div>
                                     </div>
                                    
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                         <div class="d-flex align-items-center mb-">
                                             <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Time Block</span>
                                             <span class="svg-icon svg-icon-1 svg-icon-success">
                                               
                                                 <span class="badge badge-light fw-bolder me-auto px-4 py-3">{{ $doctor->time_slot }}</span>
                                                
                                             </span>
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


                                     @if($doctor->time !== null)
                                    <!--begin::Due-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                         <div class="d-flex align-items-center mb-">
                                             <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Exact Time</span>
                                             <span class="svg-icon svg-icon-1 svg-icon-success">
                                                 <span class="badge badge-light fw-bolder me-auto px-4 py-3">{{ \Carbon\Carbon::createFromFormat('H:i:s', @$doctor->time)->format('h:i A') }}</span>
                                             </span>
                                             <!--end::Svg Icon-->
                                         </div>
                                     </div>
                                     <!--end::Due-->
                                    @endif
                                    </div>
                                </div>
                                <div class="separator mb-4"></div>
                                <!--end::Separator-->

                                <div class="symbol-group symbol-hover mb-3">
                                    <div class="" data-bs-toggle="tooltip" title="Fill out the pre-consultation">
                                        <a class="btn btn-sm  btn-bg-info btn-active-color-info text-white doctor"
                                            data-bs-toggle="modal" data-bs-target="#form"
                                            data-id="{{ $doctor->id }}">Fill Form</a>
                                    </div>
                                    @if ($doctor->book_type == 'chat')
                                     @if($doctor->time !== null)
                                        <div class="ml-1" data-bs-toggle="tooltip" title="Open chat with the doctor">
                                            <a href="{{ route('chats') }}"
                                                class="btn btn-sm  btn-bg-light btn-active-color-primary">Chat</a>
                                        </div>
                                        @endif
                                    @else
                                        <div class="ml-1" data-bs-toggle="tooltip"
                                            title="View and copy the video conference link sent by the doctor">
                                            <a class="btn btn-sm  btn-bg-primary mx-1 btn-active-color-secondary text-white doctor"
                                                data-bs-toggle="modal" data-bs-target="#link{{ $key }}"
                                                data-id="{{ $doctor->id }}">Link</a>
                                        </div>
                                    @endif
                                    @if ($doctor->prescription == 1)
                                        <div class="" data-bs-toggle="tooltip"
                                            title="Download the prescription form issued by the doctor">
                                            <a class="btn btn-sm  btn-bg-success  btn-active-color-secondary text-white doctor"
                                                href="{{ route('download', $doctor->id) }}">Download</a>
                                        </div>
                                    @endif

                                </div>

                            </div>
                            <!--end::Body-->
                        </div>
                    </div>

                    <div class="modal fade" id="link{{ $key }}" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Form-->

                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_new_address_header">
                                    <!--begin::Modal title-->
                                    <h2>Video Chat Link from Dr. {{ $doctor['book']['first_name'] }}
                                        {{ $doctor['book']['middle_name'] }} {{ $doctor['book']['last_name'] }}</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
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
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll"
                                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                        data-kt-scroll-wrappers="#kt_modal_new_address_scroll"
                                        data-kt-scroll-offset="300px">



                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-12 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Link</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea name="link" class="form-control form-control-lg form-control-solid" readonly>{{ $doctor->link == '' ? 'Link Not yet Sent.' : $doctor->link }}</textarea>

                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->



                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">OK</button>
                                    <!--end::Button-->

                                </div>
                                <!--end::Modal footer-->

                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!--begin::Modal - -->
        <div class="modal fade" id="form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <form class="form" action="{{ route('reservations') }}" id="kt_modal_new_address_form"
                        method="post">
                        @csrf
                        <div class="modal-header" id="kt_modal_new_address_header">
                            <h2>Pre-Consultation Form</h2>
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
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                <div class="mb-15 fv-row">
                                    <div class="d-flex flex-stack">
                                        <div class="fw-bold me-5">
                                            <label class="fs-6">Patient</label>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <input class="h-20px w-20px mx-2" type="radio"
                                                    onclick="javascript:personCheck();" name="person" value="self"
                                                    id="myself" checked="checked" />
                                                <span class="form-check-label fw-bold">Myself</span>
                                            </label>
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="h-20px w-20px ml-1" type="radio"
                                                    onclick="javascript:personCheck();" name="person" value="someone"
                                                    id="someone" />
                                                <span class="form-check-label fw-bold mx-2">Someone</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row mb-5" id="issomeone1" style="display: none;">
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Person Name</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="name" id="name" />
                                    </div>
                                </div>
                               
                                <div class="row mb-5" id="issomeone2" style="display: none;">
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Person Age</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="age" id="age" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Person Sex</label>
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-hide-search="true" id="se" data-placeholder="Select gender"
                                            name="sex">
                                            <option value=""></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-5">
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Complains</label>
                                        <textarea name="complain" id="complain" class="form-control form-control-lg form-control-solid"></textarea>
                                        <input type="hidden" name="get_id" id="get_id" />
                                    </div>
                                </div>
                               
                                <div class="row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Vital Signs (if available)</label>
                                    <div class="col-md-4 fv-row">
                                        <label class="fw-bold mb-2">Body Temperature (&deg;C)</label>
                                        <input type="number" step="0.01" class="form-control form-control-solid"
                                            placeholder="" name="temperature" id="temperature" />
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="fw-bold mb-2">Pulse rate (B/min)</label>
                                        <input type="number" step="0.01" class="form-control form-control-solid"
                                            placeholder="" name="pulse" id="pulse" />
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="fw-bold mb-2">Blood Pressure (mmHg)</label>
                                        <input type="text" step="0.01" class="form-control form-control-solid"
                                            placeholder="" name="bp" id="bp" />
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="fw-bold mb-2">Respiratory rate (C/min)</label>
                                        <input type="number" step="0.01" class="form-control form-control-solid"
                                            placeholder="" name="respiratory" id="respiratory" />
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="fw-bold mb-2">Blood Sugar (mmol/L)</label>
                                        <input type="number" step="0.01" class="form-control form-control-solid"
                                            placeholder="" name="sugar" id="sugar" />
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="fw-bold mb-2">Weight (Kg)</label>
                                        <input type="number" step="0.01" class="form-control form-control-solid"
                                            placeholder="" name="weight" id="weight" />
                                    </div>
                                </div>
                              
                                <div class="row mb-5">
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Medical History</label>
                                        <textarea name="history" id="history" class="form-control form-control-lg form-control-solid"></textarea>
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
                </div>
            </div>
        </div>
        <!--end::Modal - New Faculty-->

        <!--begin::change booking type Modal -->
        <div class="modal fade" id="change_booking_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="">
                        <h2 class="modal_title"></h2>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">

                        <div class="col-md-6 fv-row">
                            <select id="book_type" class="form-select form-select-solid mb-3" data-control="select2"
                                data-hide-search="true" data-placeholder="Book Type...">
                                <option></option>
                                <option value="video">Video</option>
                                <option value="chat">Chat</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Dismiss</button>
                        <button type="button" class="btn btn-primary me-3 change_book_btn">Continue</button>
                    </div>
                </div>
            </div>
        </div>
        <!--begin::change time slot Modal -->
        <div class="modal fade" id="adjust_time_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="">
                        <h2 class="modal_title"></h2>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">

                        <div class="col-md-6 fv-row">
                            <select name="time_slot" id="time_slot" class="form-select form-select-solid mb-3" data-control="select2"
                                data-hide-search="true" data-placeholder="Time Slot...">
                                <option></option>
                                <option value="Morning">Morning (6AM - 11:59PM)</option>
                                <option value="Noon">Afternoon (12PM - 5:59PM)</option>
                                <option value="Evening">Evening (6PM - 11:59PM)</option>
                                <option value="Night">Night (12AM - 5:59AM)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Dismiss</button>
                        <button type="button" class="btn btn-primary me-3 adjust_btn">Continue</button>
                    </div>
                </div>
            </div>
        </div>

        <!--begin::cancel booking Modal -->
        <div class="modal fade" id="cancel_booking_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header" id="">
                        <h2 class="modal_title"></h2>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <p class="text-muted">By Cancelling This booking, You will all progress regarding this booking. You
                            will not be able to reverse this action. Your Funds will be refunded. </p>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="button" class="btn btn-danger me-3 cancel_btn">Continue</button>
                        <button type="reset" data-bs-dismiss="modal" class="btn btn-success me-3">Dismiss</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end::Post-->
    <input type="hidden" id="hold_booking_id" />

@endsection

@section('js2')



    <script>
        function personCheck() {

            if (document.getElementById('myself').checked) {
                document.getElementById('issomeone1').style.display = 'none';
                document.getElementById('issomeone2').style.display = 'none';
            }
            if (document.getElementById('someone').checked) {
                document.getElementById('issomeone1').style.display = '';
                document.getElementById('issomeone2').style.display = '';
            }

        }
    </script>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.doctor').click(function() {
                const id = $(this).attr('data-id');

                $.ajax({
                    url: 'get-data',
                    type: 'GET',
                    data: {
                        "id": id
                    },
                    success: function(data) {

                        if (data.person === 'self') {
                            $('#myself').attr('checked', true);
                            $('#someone').attr('checked', false);
                            document.getElementById('issomeone1').style.display = 'none';
                            document.getElementById('issomeone2').style.display = 'none';
                        }
                        if (data.person === 'someone') {
                            $('#someone').attr('checked', true);
                            document.getElementById('issomeone1').style.display = '';
                            document.getElementById('issomeone2').style.display = '';
                        }
                        $('#sex option[value="Male"]').attr("selected", "selected");

                        $('#get_id').val(data.id);
                        $('#name').val(data.name);
                        $('#age').val(data.age);
                        $('#sex').val(data.sex);
                        $('#complain').val(data.complain);
                        $('#temperature').val(data.temperature);
                        $('#pulse').val(data.pulse);
                        $('#bp').val(data.bp);
                        $('#respiratory').val(data.respiratory);
                        $('#sugar').val(data.sugar);
                        $('#weight').val(data.weight);
                        $('#history').val(data.history);

                    }
                })
            });
        });
    </script>

    <script>
        $(document).on('click', '.cancel_booking', function() {

            let booking_id = $(this).data('booking_id');
            let doctor_name = $(this).data('doctor_name');
            $('#hold_booking_id').val(booking_id);
            $('.modal_title').html('Cancel your Booking with ' + doctor_name);

        });
        $(document).on('click', '.adjust_time', function() {

            let booking_id = $(this).data('booking_id');
            let doctor_name = $(this).data('doctor_name');
            $('#hold_booking_id').val(booking_id);
            $('.modal_title').html('Adjust time slot for your booking with ' + doctor_name + '?');

        });
        $(document).on('click', '.change_booking', function() {

            let booking_id = $(this).data('booking_id');
            let doctor_name = $(this).data('doctor_name');
            $('#hold_booking_id').val(booking_id);
            $('.modal_title').html('Change booking type with ' + doctor_name + '?');

        });
    </script>


    <script>
        $(document).ready(function() {
            $(document).on("click", ".change_book_btn", function(e) {
                e.preventDefault();
                var data = {
                    booking_id: $("#hold_booking_id").val(),
                    book_type: $("#book_type").val(),

                };

                spinner =
                    '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"></div><span class="indicator-label"> &nbsp;Cancelling . . .</span>';
                $(".change_book_btn").html(spinner);
                $(".change_book_btn").attr("disabled", true);

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('booking.change_book') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {


                        if (response.status == 400) {

                            $('.change_book_btn').text("Continue");
                            $('.change_book_btn').attr("disabled", false);
                            $('#change_booking_modal').modal('hide');
                            Command: toastr["error"](response.message)
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }

                        }
                        if (response.status == 200) {

                            $('.change_book_btn').text("Continue");
                            $('.change_book_btn').attr("disabled", false);
                            $('#change_booking_modal').modal('hide');
                            Command: toastr["success"](response.message)
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            window.location.replace('{{ route('reservations') }}');
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 419) {
                            Command: toastr["error"](
                                "Session expired. please login again."
                            );
                            toastr.options = {
                                closeButton: false,
                                debug: false,
                                newestOnTop: false,
                                progressBar: false,
                                positionClass: "toast-top-right",
                                preventDuplicates: false,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                timeOut: "5000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                            };

                            setTimeout(() => {
                                window.location.replace('{{ route('login') }}');
                            }, 2000);
                        }
                    },
                });
            });
            $(document).on("click", ".adjust_btn", function(e) {
                e.preventDefault();
                var data = {
                    booking_id: $("#hold_booking_id").val(),
                    time_slot: $("#time_slot").val(),

                };

                spinner =
                    '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"></div><span class="indicator-label"> &nbsp;Cancelling . . .</span>';
                $(".adjust_btn").html(spinner);
                $(".adjust_btn").attr("disabled", true);

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('booking.adjust') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {


                        if (response.status == 400) {

                            $('.adjust_btn').text("Continue");
                            $('.adjust_btn').attr("disabled", false);
                            // $('#cancel_booking_modal').modal('hide');
                            Command: toastr["error"](response.message)
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }

                        }
                        if (response.status == 200) {

                            $('.adjust_btn').text("Continue");
                            $('.adjust_btn').attr("disabled", false);
                            $('#adjust_time_modal').modal('hide');
                            Command: toastr["success"](response.message)
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            window.location.replace('{{ route('reservations') }}');
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 419) {
                            Command: toastr["error"](
                                "Session expired. please login again."
                            );
                            toastr.options = {
                                closeButton: false,
                                debug: false,
                                newestOnTop: false,
                                progressBar: false,
                                positionClass: "toast-top-right",
                                preventDuplicates: false,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                timeOut: "5000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                            };

                            setTimeout(() => {
                                window.location.replace('{{ route('login') }}');
                            }, 2000);
                        }
                    },
                });
            });
            $(document).on("click", ".cancel_btn", function(e) {
                e.preventDefault();
                var data = {
                    booking_id: $("#hold_booking_id").val(),

                };

                spinner =
                    '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"></div><span class="indicator-label"> &nbsp;Cancelling . . .</span>';
                $(".cancel_btn").html(spinner);
                $(".cancel_btn").attr("disabled", true);

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('booking.cancel') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {

                        if (response.status == 200) {
                            $('.cancel_btn').text("Continue");
                            $('.cancel_btn').attr("disabled", false);
                            $('.cancel_booking_modal').modal('hide');
                            Command: toastr["success"](response.message)
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            window.location.replace('{{ route('reservations') }}');
                        }
                        if (response.status == 400) {
                            $('.cancel_btn').text("Continue");
                            $('.cancel_btn').attr("disabled", false);
                            $('.cancel_booking_modal').modal('hide');
                            Command: toastr["error"](response.message)
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 419) {
                            Command: toastr["error"](
                                "Session expired. please login again."
                            );
                            toastr.options = {
                                closeButton: false,
                                debug: false,
                                newestOnTop: false,
                                progressBar: false,
                                positionClass: "toast-top-right",
                                preventDuplicates: false,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                timeOut: "5000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                            };

                            setTimeout(() => {
                                window.location.replace('{{ route('login') }}');
                            }, 2000);
                        }
                    },
                });
            });
        });
    </script>
@endsection
