@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@$user = Auth::user()->role;
@endphp	
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">ChatDoc</span>
                    </div>
                </div>

                @if($user == "admin")

                <div class="menu-item">
                    <a class="menu-link {{($route=='admin.home')?'active':''}}" href="{{route('admin.home')}}">
                        <span class="menu-bullet">
                            <span class="fa fa-home"></span>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{($prefix=='/users')?'show':''}} ">
                    <span class="menu-link">
                        <span class="menu-bullet">
                            <span class="fa fa-users"></span>
                        </span>
                        <span class="menu-title">Users</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{($route=='users.doctors.index')?'active':''}}" href="{{route('users.doctors.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Doctors</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{($route=='users.patients.index')?'active':''}}" href="{{route('users.patients.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Patients</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{($route=='users.admins.index')?'active':''}}" href="{{route('users.admins.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Admins</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{($route=='doctors.applications')?'active':''}}" href="{{route('doctors.applications')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                @php
                                   $number = App\Models\User::where('role','pending')->where('status',0)->get()->count();
                                @endphp
                                <span class="menu-title">Pending Approvals 	<span class="badge badge-light-primary fw-bolder fs-8 px-2 py-1 ms-2">{{$number}}</span></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-bullet">
                            <span class="fa fa-money-bill"></span>
                        </span>
                        <span class="menu-title">Account</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Deposit Alert</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Withdrawal Request</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Statement</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{($route=='admin.booking.index')?'active':''}}" href="{{route('admin.booking.index')}}">
                        <span class="menu-icon">
                            <span class="menu-bullet">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </span>
                        <span class="menu-title">Bookings</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="menu-bullet">
                                <span class="fa fa-cog"></span>
                            </span>
                        </span>
                        <span class="menu-title">Settings</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Preferences</span>
                            </a>
                        </div>
                
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{($route=='logs.index')?'active':''}}" href="{{route('logs.index')}}">
                        <span class="menu-icon">
                            <span class="menu-bullet">
                                <span class="fa fa-list"></span>
                            </span>
                        </span>
                        <span class="menu-title">Login Logs</span>
                    </a>
                </div>

                @endif

                @if($user == "pending")

                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">My Submission</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Request Cancelation</span>
                    </a>
                </div>

                @endif

                @if($user == "patient")

                <div class="menu-item">
                    <a class="menu-link {{($route=='patient.home')?'active':''}}" href="{{route('patient.home')}}">
                        <span class="menu-bullet">
                            <span class="fa fa-home"></span>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{($route=='doctors.index')?'active':''}} {{($route=='doctors.details')?'active':''}}" href="{{route('doctors.index')}}">
                        <span class="menu-bullet">
                            <span class="fa fa-stethoscope"></span>
                        </span>
                        <span class="menu-title">Doctors</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{($route=='reservations')?'active':''}}" href="{{route('reservations')}}">
                        <span class="menu-bullet">
                            <span class="fa fa-calendar"></span>
                        </span>
                        <span class="menu-title">My Bookings</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{($route=='wallet')?'active':''}}" href="{{route('wallet')}}">
                        <span class="menu-bullet">
                            <span class="fa fa-coins"></span>
                        </span>
                        <span class="menu-title">Wallet</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{($route=='profile.settings')?'active':''}}" href="{{route('profile.settings',auth()->user()->id)}}">
                        <span class="menu-bullet">
                            <span class="fa fa-user"></span>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>

                @endif


                @if($user == "doctor")

                <div class="menu-item">
                    <a class="menu-link {{($route=='doctor.home')?'active':''}}" href="{{route('doctor.home')}}">
                        <span class="menu-bullet">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{($route=='doctor.patients')?'active':''}}" href="{{route('doctor.patients')}}">
                        <span class="menu-bullet">
                            <i class="fa fa-users"></i>
                        </span>
                        <span class="menu-title">My Patients</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{($route=='doctors.schedules')?'active':''}}" href="{{route('doctors.schedules') }}">
                        <span class="menu-bullet">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="menu-title">My Schedules</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ ($route=='doctors.wallet')?'active':'' }}" href="{{ route('doctors.wallet') }}">
                        <span class="menu-bullet">
                            <i class="fa fa-wallet"></i>
                        </span>
                        <span class="menu-title">My Wallet</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ ($route=='doctors.profile.settings')?'active':'' }}" href="{{ route('doctors.profile.settings') }}">
                        <span class="menu-bullet">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="menu-title">My Profile</span>
                    </a>
                </div>


                @endif
             
            </div>
        </div>
    </div>
    <!--end::Aside menu-->
