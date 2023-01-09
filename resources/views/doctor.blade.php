@extends('layouts.master')
@section('PageTitle','Doctor Home')
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
      	<!--begin::Row-->
          <div class="row g-5 g-xl-8">
           
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 1-->
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Header-->
                        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bolder fs-3">Patients</h3>
                                <div class="ms-1">
                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-primary border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('doctor.patients') }}" class="menu-link px-3">Go to My Patients</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Balance-->
                            <div class="d-flex text-center flex-column text-white pt-8">
                                <span class="fw-bold fs-7">Active Patients</span>
                                <span class="fw-bolder fs-2x pt-1">{{ $active }}</span>
                            </div>
                            <!--end::Balance-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Items-->
                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <i class="fa fa-bullet"></i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Active</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ $active }}</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Pending</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ $pending }}</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="black" />
                                                <path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Completed</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">12</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
                                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Total</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">125</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 1-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 1-->
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Header-->
                        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-danger">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bolder fs-3">Earnings</h3>
                                <div class="ms-1">
                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-danger border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Request Withdrawal</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Balance-->
                            <div class="d-flex text-center flex-column text-white pt-8">
                                <span class="fw-bold fs-7">Wallet Balance</span>
                                <span class="fw-bolder fs-2x pt-1">&#8358;{{ number_format(auth()->user()->balance )}}</span>
                            </div>
                            <!--end::Balance-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Items-->
                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="black" />
                                                <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Today's</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">58</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">This Month's</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">458</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="black" />
                                                <path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Total Withdrawals</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">585</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
                                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Balance</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bolder fs-5 text-gray-800 pe-1">70m</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Item-->
                        </div>
                    </div>
                </div>
                <!--end::Mixed Widget 1-->
            </div>
            <!--end::Col-->
           
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 1-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Header-->
                        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-success">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bolder fs-3">My Schedules</h3>
                                <div class="ms-1">
                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-success border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                       
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('doctors.schedules') }}" class="menu-link px-3">Go to My Schedules</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Balance-->
                            <div class="d-flex text-center flex-column text-white pt-8">
                                <span class="fw-bolder fs-2x fs-7">Today</span>
                                @php
                                    $blocks = explode(',', $today_schedules); 
                                @endphp
                                <span class=" pt-1 fw-bold fs-7">
                                    @foreach ($blocks as $block)
                                        {{$block}},
                                    @endforeach
                                </span>
                            </div>
                            <!--end::Balance-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Items-->
                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="black" />
                                                <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Mon</a>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">Evening, Noon, Night, Morning</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Description-->
                            </div>
                            <div class="d-flex align-items-center mb-6">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <!--begin::Title-->
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Wed</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">Evening, Noon, Night, Morning</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-6">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="black" />
                                                <path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="black" />
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Fri</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">Evening, Noon, Night, Morning</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px w-40px me-5">
                                    <span class="symbol-label bg-lighten">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
                                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap w-100">
                                    <div class="mb-1 pe-3 flex-grow-1">
                                        <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Sun</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-gray-400 fw-bold fs-7 pe-1">Evening, Noon, Night, Morning</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Tables Widget 10-->
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">My Recent Bookings</span>
                </h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                        </div>
                        <div class="separator mb-3 opacity-75"></div>
                        <div class="menu-item px-3">
                            <a href="{{ route('doctor.patients') }}" class="menu-link px-3">Go to My Patients</a>
                        </div>              
                    </div>
                   
                </div>
            </div>
          
            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="border-0">
                                <th class="p-0">Patient</th>
                                <th class="p-0">Book Type</th>
                                <th class="p-0">Pre-Con. Form</th>
                                <th class="p-0">Prescription</th>
                                <th class="p-0">Appointed Time</th>
                                {{-- <th class="p-0 text-end"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($patients as $key => $patient)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img @if ($patient['patient']['picture'] == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $patient['patient']['picture'] }}" @endif
                                            alt=""/>
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $patient->patient->first_name.' '.$patient->patient->middle_name.' '.$patient->patient->last_name }}</a>
                                            <a href="#" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                            <span class="text-dark">Phone</span>: {{ $patient['patient']['phone'] }}</a>
                                        </div>
                                        <!--end::Name-->
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $patient->book_type }}</a>
                                </td>
                                <td class="text-muted fw-bold">{!! $patient->pre_consultation == 1 ? ' <span class="badge badge-light-success">Pre-Consultation Filled</span>': ' <span class="badge badge-light-danger">Pre-Consultation Not Filled</span>'!!}</td>
                                <td>
                                    {!! $patient->prescription == 1 ? ' <span class="badge badge-light-success">Prescribed</span>': ' <span class="badge badge-light-danger">Not Prescribed</span>'!!}
                                </td>
                                <td>
                                    {!! $patient->time != null ?  \Carbon\Carbon::createFromFormat('H:i:s', @$patient->time)->format('h:i A') : ' <span class="badge badge-light-danger">Exact Time Not Appointed</span>'!!}
                                </td>
                                {{-- <td class="text-end">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                </td> --}}
                            </tr> 
                          @empty
                             <tr>
                                
                            </tr> 
                          @endforelse
                          
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Tables Widget 10-->

    </div>
</div>
@endsection

@section('js2')
<script src="/assets/js/custom/widgets.js"></script>
<script src="/assets/js/custom/apps/chat/chat.js"></script>
<script src="/assets/js/custom/modals/create-app.js"></script>
<script src="/assets/js/custom/modals/upgrade-plan.js"></script>
@endsection