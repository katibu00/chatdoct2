@extends('layouts.master')
@section('PageTitle', 'Bookings')

@section('css')
    <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card-toolbar">
                <!--begin::Toolbar-->
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
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <form action="{{ route('admin.booking.sort') }}" method="post">
                            @csrf
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <!--begin::Label-->
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
                                        data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Close</button>
                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                        data-kt-customer-table-filter="filter">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row g-6 g-xl-9">

                @forelse ($bookings as $key => $booking)
                    <div class="col-md-6 col-xl-4">
                        <div class="card d-n4one" id="kt_widget_5">
                            <!--begin::Body-->
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center mb-5">
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <div class="symbol symbol-45px me-5">
                                            <div class="symbol-group symbol-hover mb-3">
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                                    <img alt="Pic"  @if (@$booking['doctor']['picture'] == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ @$booking['patient']['picture'] }}" @endif/>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michelle Swanston">
                                                    <img alt="Pic" @if (@$booking['patient']['picture'] == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ @$booking['patient']['picture'] }}" @endif />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Dr. {{ @$booking['doctor']['first_name'].' '.@$booking['doctor']['last_name'] }}</a>
                                            <a href="#" class="text-gray-700 text-hover-primary fs-6 fw-baolder">{{ @$booking['patient']['first_name'].' '.@$booking['patient']['last_name'] }}</a>
                                            <span class="text-gray-400 fw-bold">Booked {{ $booking->created_at->diffForHumans() }}</span>
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
                                                        <rect x="14" y="14" width="5"
                                                            height="5" rx="1" fill="#000000"
                                                            opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                                            data-kt-menu="true">
                                            <div class="separator mb-3 opacity-75"></div>

                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                    data-bs-toggle="modal" data-bs-target="#form{{ $key }}"
                                                    data-id="{{ $booking->id }}">Pre-consultation Form</a>
                                            </div>


                                            @if ($booking->book_type == 'chat')
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('doctor.chat') }}" class="menu-link" style="pointer-events: {{ $booking->status == 1? '':'none'}}">Go to Chat</a>
                                                </div>
                                            @else
                                                <div class="menu-item px-3">
                                                    <a class="menu-link" data-bs-toggle="modal"
                                                        data-bs-target="#link{{ $key }}"
                                                        data-id="{{ $booking->id }}">Send Link</a>
                                                </div>
                                            @endif

                                           
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 appoint_time"
                                                    data-bs-toggle="modal" data-bs-target="#appoint_time"
                                                    data-id="{{ $booking->id }}"
                                                    data-name="{{ @$booking['patient']['first_name'] }} {{ @$booking['patient']['middle_name'] }} {{ @$booking['patient']['last_name'] }}">Appoint Time</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 subs"
                                                    data-bs-toggle="modal" data-bs-target="#subscription"
                                                    data-id="{{ $booking->id }}"
                                                    data-name="{{ @$booking['patient']['first_name'] }} {{ @$booking['patient']['middle_name'] }} {{ @$booking['patient']['last_name'] }}">Send Prescription</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="tel:{{ @$doctor['patient']['phone'] }}" class="menu-link px-3 ">Call Patient</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('doctor.patients.complete',$booking->id)}}" class="menu-link px-3 ">Mark Completed</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.booking.delete',$booking->id)}}" class="menu-link px-3 ">Delete</a>
                                            </div>


                                        </div>
                                        <!--end::Menu 2-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Header-->

                                <div class="d-flex flex-wrap mb-5">
                                    <div class="row">

                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Time Slot</span>
                                               

                                                    <span
                                                        class="badge badge-light fw-bolder me-auto px-4 py-3">{{ $booking->time_slot }}</span>

                                              
                                                <!--end::Svg Icon-->
                                            </div>
                                        </div>
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Pre-consultation
                                                    Form</span>
                                                @if ($booking->pre_consultation == 1)
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
                                                <!--end::Svg Icon-->
                                            </div>
                                        </div>
                    
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Status</span>
                                                    @if($booking->status == 0)
                                                    <span class="badge badge-danger fw-bolder me-auto px-4 py-3">Awaiting Time Appointment</span>
                                                    @elseif($booking->status == 1)
                                                    <span class="badge badge-success fw-bolder me-auto px-4 py-3">Active</span>
                                                    @elseif($booking->status == 2)
                                                    <span class="badge badge-info fw-bolder me-auto px-4 py-3">completed</span>
                                                    @endif
                                                
                                            </div>
                                        </div>
                      
                                      @if($booking->status == 1)
                                        @if(@$booking->time)
                                            <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Exact Time</span>
                                                
                                                <span class="badge badge-light-info fw-bolder me-auto px-4 py-3">{{ \Carbon\Carbon::createFromFormat('H:i:s', @$booking->time)->format('h:i A') }}</span>
                                                
                                                
                                            </div>
                                        </div>
                                        @endif
                                      @endif

                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span
                                                    class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Prescription</span>

                                                @if ($booking->prescription == 1)
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
                                                <!--end::Svg Icon-->
                                            </div>
                                        </div>
                                        <!--end::Due-->

                                        <!--begin::Due-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-5  me-3 mb-3">
                                            <div class="d-flex align-items-center mb-">
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Booking
                                                    Type</span>
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    @if ($booking->book_type == 'chat')
                                                        <span
                                                            class="badge badge-light fw-bolder me-auto px-4 py-3">Chat</span>
                                                    @endif
                                                    @if($booking->book_type == 'video')
                                                        <span
                                                            class="badge badge-light fw-bolder me-auto px-4 py-3">Video Call</span>
                                                    @endif
                                                    @if($booking->book_type == 'phone')
                                                        <span
                                                            class="badge badge-light fw-bolder me-auto px-4 py-3">Phone Call</span>
                                                    @endif
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                        </div>
                                        <!--end::Due-->
                                        

                                    </div>
                                </div>



                            </div>
                            <!--end::Body-->
                        </div>
                    </div>

                    <div class="modal fade" id="form{{ $key }}" tabindex="-1" aria-hidden="true">
                      
                        <div class="modal-dialog mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
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
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                    <!--begin::Heading-->
                                    <div class="text-center mb-13">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Pre-consultation Form</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">
                                            {{ @$booking['patient']['first_name'] }}
                                            {{ @$booking['patient']['middle_name'] }}
                                            {{ @$booking['patient']['last_name'] }}
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Users-->
                                    <div class="mb-15">
                                        <!--begin::List-->
                                        <div class="mh-375px scroll-y me-n7 pe-7">





                                            <!--begin::User-->
                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <img @if (@$booking['patient']['picture'] == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ @$booking['patient']['picture'] }}" @endif
                                                            alt="" class="w-25" />


                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::User-->

                                            <!--begin::User-->
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
                                                                @if ($booking->person == 'self')
                                                                    self
                                                                @else
                                                                    {{ $booking->name }}
                                                                @endif
                                                            </span></a>
                                                        <!--end::Name-->

                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--begin::User-->
                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a class="d-flex align-items-center fs-5 fw-bolder ">Age:&nbsp;
                                                            &nbsp;

                                                            <span class="text-dark text-hover-primary">
                                                                @if ($booking->person == 'self')
                                                                    {{ @$booking['patient']['age'] }}
                                                                @else
                                                                    {{ $booking->age }}
                                                                @endif
                                                            </span></a>
                                                        <!--end::Name-->

                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div
                                                class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a class="d-flex align-items-center fs-5 fw-bolder ">Sex:&nbsp;
                                                            &nbsp;

                                                            <span class="text-dark text-hover-primary">
                                                                @if ($booking->person == 'self')
                                                                    {{ @$booking['patient']['sex'] }}
                                                                @else
                                                                    {{ $booking->sex }}
                                                                @endif
                                                            </span></a>
                                                        <!--end::Name-->

                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::User-->



                                            <!--begin::User-->
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
                                                                {{ $booking->complain }}</span></a>
                                                        <!--end::Name-->

                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::User-->
                                            @if ($booking->temperature != null)
                                                <!--begin::User-->
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
                                                                    {{ $booking->temperature }}&deg;C</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($booking->pulse != null)
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
                                                                    {{ $booking->pulse }}B/min</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($booking->bp != null)
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
                                                                    {{ $booking->bp }}mmHg</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($booking->respiratory != null)
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
                                                                    {{ $booking->respiratory }}C/min</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($booking->sugar != null)
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
                                                                    {{ $booking->sugar }}mmol/L</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($booking->weight != null)
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
                                                                    {{ $booking->weight }}Kg</span></a>
                                                            <!--end::Name-->

                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                            @endif
                                            @if ($booking->history != null)
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
                                                                    {{ $booking->history }}</span></a>
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
                                        <h2>Send Video Chat Link to {{ @$booking['patient']['first_name'] }}
                                            {{ @$booking['patient']['middle_name'] }}
                                            {{ @$booking['patient']['last_name'] }}</h2>
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
                                                    <textarea name="link" class="form-control form-control-lg form-control-solid">{{ $booking->link }}</textarea>
                                                    <input type="hidden" name="get_id" value="{{ $booking->id }}" />
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
