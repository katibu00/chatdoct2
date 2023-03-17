@extends('layouts.master')
@section('PageTitle','Patient Dashboard')
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="row g-5 g-xl-8 mb-5">
            <div class="col-xl-4">
                <!--begin::List Widget 6-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">User Info</h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
                                <div class="menu-item px-3">
                                    <a href="{{ route('wallet')}}" class="menu-link px-3">Add Funds</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{ route('profile.settings',auth()->user()->id) }}" class="menu-link px-3">Go to Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                            <span class="svg-icon svg-icon-warning me-5">
                                <span class="svg-icon svg-icon-1">
                                    <i class="fa fa-user text-danger opacity-75"></i>
                                </span>
                            </span>
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Patient Number</a>
                            </div>
                            <span class="fw-bolder text-danger py-1">P{{$user->number}}</span>
                        </div>
                        <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                            <span class="svg-icon svg-icon-success me-5">
                                <span class="svg-icon svg-icon-1">
                                    <i class="fa fa-wallet text-success opacity-75"></i>
                                </span>
                            </span>
                      
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Wallet Balance</a>
                                <span class="text-muted fw-bold d-block"><a href="{{ route('wallet') }}">Add Funds</a></span>
                            </div>
                            <span class="fw-bolder {{ auth()->user()->balance > 999 ? 'text-success': 'text-danger'}} py-1">&#x20A6;{{number_format(Auth::user()->balance,0)}}</span>
                        </div>
                        <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                            <span class="svg-icon svg-icon-danger me-5">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                    </svg>
                                </span>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Active Bookings</a>
                            </div>
                            <span class="fw-bolder text-danger py-1">{{$recent->count()}}</span>
                        </div>
                        <div class="d-flex align-items-center bg-light-info rounded p-5">
                            <span class="svg-icon svg-icon-info me-5">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                    </svg>
                                </span>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Completed Bookings</a>
                            </div>
                            <span class="fw-bolder text-info py-1">-</span>
                            <!--end::Lable-->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4">
                <!--begin::List Widget 2-->
                <div class="card card-xl-stretch mb-xl-8">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Recent Bookings</h3>
                        <div class="card-toolbar">
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
                               
                                <div class="menu-item px-3">
                                    <a href="{{ route('reservations') }}" class="menu-link px-3">Go to Bookings</a>
                                </div>
                    
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        @forelse ($recent as $key => $booking)
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-7">
                            <div class="symbol symbol-50px me-5">
                                <img @if ($booking['book']['picture'] == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $booking['book']['picture'] }}" @endif class="" alt="" />
                            </div>
                            <div class="flex-grow-1">
                                <a href="{{ route('reservations') }}" class="text-dark fw-bolder text-hover-primary fs-6">Dr. {{$booking['book']['first_name']}} {{$booking['book']['last_name']}}</a>
                                <span class="text-muted d-block fw-bold">
                                    <span class="badge badge-light-info fs-7 fw-bolder">{{$booking->book_type}}</span>
                                    {!! $booking->pre_consultation == 1? '<span class="badge badge-light-success mb-1">form filled</span>' : '<span class="badge badge-light-danger mb-1">Form not filled</span>' !!}
                                    {!! $booking->prescription == 1? '<span class="badge badge-light-success mb-1">Prescribed</span>' : '<span class="badge badge-light-danger mb-1">Not Prescribed</span>' !!}

                                </span>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-warning" role="alert">You have no recent bookings. When you, they will show up here for quick reference.</div></td>
                        @endforelse
                    </div>
                </div>
                <!--end::List Widget 2-->
            </div>

            <div class="col-xl-4">
                <!--begin::List Widget 1-->
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark">Recent Transactions</span>
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
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484c4077f05">
                                <div class="menu-item px-3">
                                    <a href="{{ route('wallet')}}" class="menu-link px-3">Add Funds</a>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                      
                        @forelse ($payments as $key => $payment )
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <div class="symbol symbol-50px me-5">
                                    <span class="symbol-label">{{ $key+1 }}</span>
                                </div>
                                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">{{ $payment->created_at->diffForHumans() }}</a>
                                        {{-- <span class="text-muted fw-bold d-block fs-7">{{ $payment->ref }}</span> --}}
                                    </div>
                                    <span class="badge badge-light fw-bolder my-2">+&#8358;{{ number_format($payment->amount,0) }}</span>
                                </div>
                            </div>
                            <!--end::Item--> 
                        @empty
                            <div class="alert alert-warning" role="alert">No recent Transaction.</div>
                        @endforelse
                       
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 1-->
            </div>
        </div>
        <!--end::Row-->
        @if($users->count() > 0)
            <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
                <h3 class="fw-bolder ">Featured Doctors</h3>
                @php
                    $hour = date("H");
                    $time = '';
                    if ($hour >= "6" && $hour < "12") {
                        $time = "Morning";
                    } else
                    if ($hour >= "12" && $hour < "18") {
                        $time = "Noon";
                    } else
                    if ($hour >= "18" && $hour < "24") {
                        $time = "Evening";
                    } else
                    if ($hour >= "1" && $time < "6") {
                        $time = "Night";
                    }
                    $day = strtolower(date('l')) . 's';
                @endphp
                @foreach ($users as $user)
                @php
                    $schedules = explode(',', $user->$day);
                    $availability = '';
                    if (in_array($time, $schedules)) {
                        $availability = 'yes';
                    } else {
                        $availability = 'no';
                    }
                @endphp
                <div class="col-md-6 col-xxl-4">
                    <div class="card">
                        <div class="card-body d-flex flex-center flex-column p-9">
                            <div class="symbol symbol-65px symbol-circle mb-5">
                                <img @if($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$user->picture}}" @endif alt="{{$user->first_name}} {{$user->last_name}}" />
                                <div class="bg-{{$availability == 'yes'?'success':'danger'}} position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-white h-15px w-15px ms-n3 mt-n3"></div>
                            </div>
                            <a href="{{route('doctors.details',$user->number)}}" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Dr. {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</a>
                            <div class="badge badge-lg badge-light-primary d-inline mb-1">{{$user->rank}}</div>
                            <div class="d-flex flex-center align-items-center justify-content-center flex-wrap mb-2">
                                <div class="border border-dashed rounded d-flex min-w-25px py-1 px-2 mx-1 mb-1">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-2">
                                        <svg width="100" height="100" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.207 13.293L7.5 14a5.5 5.5 0 110-11h5a5.5 5.5 0 110 11s-1.807 2.169-4.193 2.818C7.887 16.933 7.449 17 7 17c.291-.389.488-.74.617-1.052C8.149 14.649 7.5 14 7.5 14c.707-.707.708-.707.708-.706h.001l.002.003.004.004.01.01a1.184 1.184 0 01.074.084c.039.047.085.108.134.183.097.15.206.36.284.626.114.386.154.855.047 1.394.717-.313 1.37-.765 1.895-1.201a10.266 10.266 0 001.013-.969l.05-.056.01-.012m0 0A1 1 0 0112.5 13a4.5 4.5 0 100-9h-5a4.5 4.5 0 000 9 1 1 0 01.707.293" clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                    <div class="fs-6 fw-bolder text-gray-700">&#x20A6;{{number_format($user->chat_rate,0)}}</div>
                                </div>
                                <div class="border border-dashed rounded d-flex min-w-25px py-1 px-2 mx-1 mb-1">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-2">
                                        <svg width="100" height="100" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.667 5.5c-.645 0-1.167.522-1.167 1.167v6.666c0 .645.522 1.167 1.167 1.167h6.666c.645 0 1.167-.522 1.167-1.167V6.667c0-.645-.522-1.167-1.167-1.167H4.667zM2.5 6.667C2.5 5.47 3.47 4.5 4.667 4.5h6.666c1.197 0 2.167.97 2.167 2.167v6.666c0 1.197-.97 2.167-2.167 2.167H4.667A2.167 2.167 0 012.5 13.333V6.667z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M13.25 7.65l2.768-1.605a.318.318 0 01.482.263v7.384c0 .228-.26.393-.482.264l-2.767-1.605-.502.865 2.767 1.605c.859.498 1.984-.095 1.984-1.129V6.308c0-1.033-1.125-1.626-1.984-1.128L12.75 6.785l.502.865z" clip-rule="evenodd"/>
                                            </svg>
                                    </span>
                                    <div class="fs-6 fw-bolder text-gray-700">&#x20A6;{{number_format($user->video_rate,0)}}</div>
                                </div>
                                <div class="border border-dashed rounded d-flex min-w-25px py-1 px-2 mx-1 mb-1">
                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1" height="1" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 20 20">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
                                          </svg>
                                    </span>
                                    <div class="fs-6 fw-bolder text-gray-700">&#x20A6;{{number_format($user->phone_rate,0)}}<br />  <span class="fw-bold text-gray-400"></span></div>
                                </div>
                            </div>
                            <a href="{{route('doctors.details',$user->number)}}" class="btn btn-sm btn-light-primary">
                            <!--end::Svg Icon-->View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
<!--end::Post-->
@endsection
