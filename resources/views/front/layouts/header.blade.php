@php
$route = Route::current()->getName();
@endphp

<header id="header" class="header-size-sm" data-sticky-shrink="false">
    <div class="container">
        <div class="header-row">

            <!-- Logo
============================================= -->
            <div id="logo" class="ms-auto ms-lg-0 me-lg-auto">
                <a href="{{ route('homepage') }}" class="standard-logo"><img
                        src="/uploads/logo.png" alt="Chatdoct Logo"></a>
                <a href="{{ route('homepage') }}" class="retina-logo"><img
                        src="/uploads/logo.png" alt="Chatdoct Logo"></a>
            </div><!-- #logo end -->

            <div class="header-misc d-none d-lg-flex">

                <ul class="header-extras">
                    <li>
                        <i class="i-plain icon-call m-0"></i>
                        <div class="he-text">
                            Call Us
                            <span>(234) 806 178 9101</span>
                        </div>
                    </li>
                    <li>
                        <i class="i-plain icon-line2-envelope m-0"></i>
                        <div class="he-text">
                            Email Us
                            <span>support@chatdoct.com</span>
                        </div>
                    </li>
                    <li>
                        <i class="i-plain icon-line-clock m-0"></i>
                        <div class="he-text">
                            We'are Open
                            <span>24/7/365</span>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>

    <div id="header-wrap">
        <div class="container">
            <div
                class="header-row justify-content-between flex-row-reverse flex-lg-row justify-content-lg-center">

                <div class="header-misc">

                    <!-- Top Search
============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="/front/#" id="top-search-trigger"><i class="icon-line-search"></i><i
                                class="icon-line-cross"></i></a>
                    </div><!-- #top-search end -->

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                        </path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                        </path>
                    </svg>
                </div>

                <!-- Primary Navigation
============================================= -->
                <nav class="primary-menu with-arrows">

                    <ul class="menu-container">
                        <li class="menu-item {{ $route == 'homepage'? 'current': ''}}"><a class="menu-link"
                                href="{{route('homepage')}}">
                                <div>Home</div>
                            </a></li>
                       

                            <li class="menu-item mega-menu {{ $route == 'speciality'? 'current': ''}}">
                                <a class="menu-link" href="#"><div>Departments</div></a>
                                <div class="mega-menu-content mega-menu-style-2">
                                    <div class="container">
                                        <div class="row">
                                            <ul class="sub-menu-container mega-menu-column col">
                                                <li class="menu-item mega-menu-title">
                                                    <a class="menu-link" href="#"><div>Specialities</div></a>
                                                    <ul class="sub-menu-container">
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=covid-19') }}"><div>Covid-19 Specialist</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=general_practitioner') }}"><div>General Practitioner</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=internal_medicine') }}"><div>Internal Medicine</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=family_medicine') }}"><div>Family medicine</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=paediatrics') }}"><div>Paediatrics</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=gynecology') }}"><div>Gynecology</div></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="sub-menu-container mega-menu-column col">
                                                <li class="menu-item mega-menu-title">
                                                    <a class="menu-link" href="#"><div>Specialities</div></a>
                                                    <ul class="sub-menu-container">
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=bbstetrics') }}"><div>Obstetrics</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=orthopaedics') }}"><div>Orthopaedics</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=urology') }}"><div>Urology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=psychiatry') }}"><div>Psychiatry</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=endocrinology') }}"><div>Endocrinology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=cardiology') }}"><div>Cardiology</div></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="sub-menu-container mega-menu-column col">
                                                <li class="menu-item mega-menu-title">
                                                    <a class="menu-link" href="#"><div>Specialities</div></a>
                                                    <ul class="sub-menu-container">
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=ophthalmology') }}"><div>Ophthalmology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=neurology') }}"><div>Neurology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=nephrology') }}"><div>Nephrology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=oncology') }}"><div>Oncology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=dermatology') }}"><div>Dermatology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=immunology') }}"><div>Immunology</div></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="sub-menu-container mega-menu-column col">
                                                <li class="menu-item mega-menu-title">
                                                    <a class="menu-link" href="#"><div>Specialities</div></a>
                                                    <ul class="sub-menu-container">
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=radiology') }}"><div>Radiology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=haematology') }}"><div>Haematology</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=general_surgery') }}"><div>General Surgery</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=plastic_surgery') }}"><div>Plastic Surgery</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=ent') }}"><div>ENT (Ear, Nose, Throat)</div></a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a class="menu-link" href="{{ route('speciality','speciality=maxillofacial_surgery') }}"><div>Maxillofacial Surgery</div></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                      
                                        </div>
                                    </div>
                                </div>
                            </li>


                        <li class="menu-item {{ $route == 'about'? 'current': ''}}"><a class="menu-link"
                                href="{{route('about')}}">
                                <div>About Us</div>
                            </a></li>
                        
                        <li class="menu-item {{ $route == 'contact'? 'current': ''}}"><a class="menu-link"
                                href="{{route('contact')}}">
                                <div>Contact</div>
                            </a></li>
                    </ul>

                </nav><!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value=""
                        placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->