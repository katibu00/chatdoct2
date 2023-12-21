<!DOCTYPE html>
@php
    $user = Auth::user();
@endphp
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../">
    <title>ChatDoc - @yield('PageTitle')</title>
    <meta name="description"
        content="Chatdoc is a social enterprise that helps underserviced communities in Nigeria to access qualitative healthcare virtually through Telemedicine." />
    <meta name="keywords" content="chatdoc, chat a doctor, doctor, chatting with a doctor, telemedicine, " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="ChatDoct" />
    <meta property="og:url" content="https://chatdoct.com" />
    <meta property="og:site_name" content="ChatDoct" />
    <link rel="canonical" href="https://chatdoct.com" />
    <link rel="shortcut icon" href="/uploads/logo.jpg" />
    <!--begin::Fonts-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <link href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href='/notify/toastr.min.css' rel='stylesheet' />
    @yield('css')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">
    <div class="d-flex flex-column flex-root" id="app2">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="#">
                        <img alt="Logo" src="/uploads/logo.jpg" class="h-25px logo" />
                    </a>
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.5"
                                    d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                    fill="black" />
                                <path
                                    d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                    fill="black" />
                            </svg>
                        </span>
                    </div>
                    <!--end::Aside toggler-->
                </div>
                <!--begin::Aside menu-->
                @include('layouts.sidebar')
                <!--end::Aside menu-->
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                id="kt_aside_mobile_toggle">
                                <span class="svg-icon svg-icon-2x mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="#" class="d-lg-none">
                            </a>
                        </div>




                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <div class="d-flex align-items-center" id="kt_header_nav">

                            </div>

                            <div class="d-flex align-items-stretch flex-shrink-0">
								
								
								<!--begin::Notifications-->
								<div class="d-flex align-items-center ms-1 ms-lg-3">
									<!--begin::Menu- wrapper-->
									<div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
										<span class="svg-icon svg-icon-1 position-relative">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"> <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
											 </svg>
											<span class="badge badge-primary position-absolute top-0 start-100 translate-middle p-1">{{ auth()->user()->notifications->count() }}</span>
										</span>
										<!--end::Svg Icon-->
									</div>
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">

										<!--begin::Tab content-->
										<div class="tab-contenta">
											<!--begin::Tab panel-->
											<div class="tab-paane fadae" id="kt_topbar_notifications_1" role="tabpaanel">
												<!--begin::Items-->
												<div class="scroll-y mh-325px my-5 px-8">
													
													@foreach (auth()->user()->notifications as $notification)
													<!--begin::Item-->
													<div class="d-flex flex-stack py-4">
														<!--begin::Section-->
														<div class="d-flex align-items-center">
															<!--begin::Title-->
															<div class="mb-0 me-2">
																<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">{{ @$notification->data['type'] }}</a>
																<div class="text-gray-400 fs-7">{{ $notification->data['data'] }}</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<span class="badge badge-light fs-8">{{ $notification->created_at->diffForHumans() }}</span>
														<!--end::Label-->
													</div>
													<!--end::Item-->
													@endforeach

												</div>
												<!--end::Items-->
												<!--begin::View more-->
												<div class="py-3 text-center border-top">
													<a href="../../demo1/dist/pages/user-profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">Mark all as Read
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
													<span class="svg-icon svg-icon-5">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
															<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon--></a>
												</div>
												<!--end::View more-->
											</div>
											<!--end::Tab panel-->
											
										</div>
										<!--end::Tab content-->
									</div>
									<!--end::Menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::Notifications-->


                                <div class="d-flex align-items-stretch flex-shrink-0">
                                    <div class="d-flex align-items-center ms-1 ms-lg-3"
                                        id="kt_header_user_menu_toggle">
                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <img @if (@$user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $user->picture }}" @endif
                                                alt="user" />
                                        </div>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        <img
                                                            @if ($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $user->picture }}" @endif />
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                                            {{ $user->first_name }} {{ $user->middle_name }}
                                                            {{ $user->last_name }}
                                                            <span
                                                                class="badge badge-light-primary fw-bolder fs-8 px-2 py-1 ms-2">&#x20A6;{{ number_format($user->balance, 0) }}</span>
                                                        </div>
                                                        <a href="#"
                                                            class="fw-bold text-muted text-hover-primary fs-7">
                                                            @if ($user->role == 'doctor')
                                                                D{{ '' }}
                                                            @elseif($user->role == 'patient')
                                                                P{{ '' }}
                                                            @elseif($user->role == 'pending')
                                                                X{{ '' }}
                                                            @elseif($user->role == 'admin')
                                                                A{{ '' }}
                                                            @endif{{ $user->number }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator my-2"></div>

                                            @if ($user->role == 'patient')
                                                {{-- <div class="menu-item px-5">
                                                    <a href="{{ route('doctor.apply') }}" class="menu-link px-5">
                                                        <span class="menu-text">Apply As Doctor</span>
                                                        <span class="menu-badge">
                                                        </span>
                                                    </a>
                                                </div> --}}
                                                <div class="menu-item px-5">
                                                    <a href="{{ route('wallet') }}" class="menu-link px-5">Fund
                                                        Account</a>
                                                </div>
                                                <div class="menu-item px-5 my-1">
                                                    <a href="{{ route('profile.settings', $user->id) }}"
                                                        class="menu-link px-5">Account Settings</a>
                                                </div>
                                            @endif
                                            @if ($user->role == 'doctor')
                                                <div class="menu-item px-5">
                                                    <a href="{{ route('doctors.schedules') }}"
                                                        class="menu-link px-5">My Schedules</a>
                                                </div>
                                                <div class="menu-item px-5 my-1">
                                                    <a href="{{ route('doctors.profile.settings') }}"
                                                        class="menu-link px-5">Account Settings</a>
                                                </div>
                                            @endif
                                            <div class="separator my-2"></div>
                                            <div class="menu-item px-5">
                                                <a class="menu-link px-5" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                    Sign Out
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2021©</span>
                            <a href="#" target="_blank" class="text-gray-800 text-hover-primary">ChatDoc Nig
                                Limited</a>
                        </div>
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="https://chatdoct.com/about-us" target="_blank"
                                    class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="tel:2348061789101" target="_blank" class="menu-link px-2">Support</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
            </div>
        </div>
        <!--end::Page-->
    </div>

    @yield('js2')

    @if (auth()->check())
        <script>
            var authuser = @JSON(auth()->user())
        </script>
    @endif
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.js"></script>
    <script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="/assets/js/custom/widgets.js"></script>
    <script src="/notify/toastr.min.js"></script>
    @yield('js')
    <!--end::Javascript-->


    {!! Toastr::message() !!}
</body>
<!--end::Body-->

</html>
