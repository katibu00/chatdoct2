<!DOCTYPE html>
<html lang="eng">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="chatdoc" />
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
    <!-- Link of CSS files -->
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/flaticon.css">
    <link rel="stylesheet" href="/front/css/remixicon.css">
    <link rel="stylesheet" href="/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/front/css/odometer.min.css">
    <link rel="stylesheet" href="/front/css/fancybox.css">
    <!-- <link rel="stylesheet" href="assets/css/aos.css"> -->
    <link rel="stylesheet" href="/front/css/style.css">
    <link rel="stylesheet" href="/front/css/responsive.css">
    <link rel="stylesheet" href="/front/css/dark-theme.css">
    <title>@yield('PageTitle') | ChatDoct</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>

    <!--Preloader starts-->
    <div class="loader js-preloader">
        <div class="absCenter">
            <div class="loaderPill">
                <div class="loaderPill-anim">
                    <div class="loaderPill-anim-bounce">
                        <div class="loaderPill-anim-flop">
                            <div class="loaderPill-pill"></div>
                        </div>
                    </div>
                </div>
                <div class="loaderPill-floor">
                    <div class="loaderPill-floor-shadow"></div>
                </div>
            </div>
        </div>
    </div>
    <!--Preloader ends-->

    <!-- Theme Switcher Start -->
    <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div>
    <!-- Theme Switcher End -->

    <!-- Page Wrapper End -->
    <div class="page-wrapper">

        <!-- Header Section Start -->
        <header class="header-wrap style3">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="header-top-left">
                                <ul class="contact-info list-style">
                                    <li>
                                        <span><i class="ri-mail-fill"></i></span>
                                        <p>support@chatdoct.com</p>
                                    </li>
                                    <li>
                                        <span><i class="ri-phone-fill"></i></span>
                                        <a href="tel:2455921125">(+234) 806 178 9101</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="header-top-right">
                                {{-- <div class="select-lang">
                                        <i class="ri-earth-fill"></i>
                                        <div class="navbar-option-item navbar-language dropdown language-option">
                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="lang-name"></span>
                                            </button>
                                            <div class="dropdown-menu language-dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                                    <img src="/front/images/uk.png" alt="flag">
                                                    Eng
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <img src="/front/images/china.png" alt="flag">
                                                    简体中文
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <img src="/front/images/uae.png" alt="flag">
                                                    العربيّة
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                <ul class="social-profile list-style style1">
                                    <li>
                                        <a href="https://web.facebook.com/ChatDoc-Nigeria-102803225693104">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="header-bottom">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img class="logo-light" src="/front/images/logo.png" alt="logo">
                            <img class="logo-dark" src="/front/images/logo-white.png" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                            <div class="menu-close d-lg-none">
                                <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                            </div>
                            <ul class="navbar-nav ms-auto">

                                

                                <li class="nav-item">
                                    <a href="{{ route('homepage') }}" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link">New Home</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a href="appointment.html" class="nav-link btn style1">Book Appointment</a>
                                </li>
                            </ul>
                            <div class="other-options md-none">
                                <div class="option-item">
                                    <button class="searchbtn"><i class="ri-search-line"></i></button>
                                </div>
                                <div class="option-item">
                                    <a href="appointment.html" class="btn style1">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="search-area">
                        <input type="search" placeholder="Search Here..">
                        <button type="submit"><i class="ri-search-line"></i></button>
                    </div>
                    <div class="mobile-bar-wrap">
                        <button class="searchbtn d-lg-none"><i class="ri-search-line"></i></button>
                        <div class="mobile-menu d-lg-none">
                            <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Section End -->

        <!-- Hero Section Start -->
        <section class="hero-wrap style6">
            <div class="hero-slider-three owl-carousel">
                <div class="hero-slide-item bg-one bg-f">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="hero-content" data-speed="0.10" data-revert="true">
                                    <h1>Connect with Medical Experts Anywhere</h1>
                                    <p>Chat, Call, or Video Consultations for Personalized Healthcare from the Comfort
                                        of Home.</p>
                                    <div class="hero-btn">
                                        <a href="about.html" class="btn style1">Find Out More</a>
                                        <a class="play-video" data-fancybox href="https://youtu.be/akgq7hK2mgE">
                                            <span class="video-icon">
                                                <i class="ri-play-fill"></i>
                                            </span>
                                            <span> Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide-item bg-two bg-f">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="hero-content" data-speed="0.10" data-revert="true">
                                    <h1>Revolutionizing Healthcare Accessibility</h1>
                                    <p>Book Appointments, Share Test Results, and Receive Expert Medical Advice at Your
                                        Convenience.</p>
                                    <div class="hero-btn">
                                        <a href="about.html" class="btn style1">Find Out More</a>
                                        <a class="play-video" data-fancybox href="https://youtu.be/akgq7hK2mgE">
                                            <span class="video-icon">
                                                <i class="ri-play-fill"></i>
                                            </span>
                                            <span> Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide-item bg-three bg-f">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="hero-content" data-speed="0.10" data-revert="true">
                                    <h1>TPersonalized Care, Anytime, Anywhere</h1>
                                    <p>Enjoy User-Friendly Booking, Secure Payment, and Convenient Access to Top
                                        Doctors.</p>
                                    <div class="hero-btn">
                                        <a href="about.html" class="btn style1">Find Out More</a>
                                        <a class="play-video" data-fancybox href="https://youtu.be/akgq7hK2mgE">
                                            <span class="video-icon">
                                                <i class="ri-play-fill"></i>
                                            </span>
                                            <span> Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- About Section Start -->
        <section class="about-wrap style2 ptb-50 bg-athenas">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1" data-aos="fade-up"
                        data-aos-duration="1200" data-aos-delay="200">
                        <div class="section-title style1 text-center mb-40">
                            <span>CONSULT ACROSS <span>TOP</span> SPECIALTIES</span>
                            <h5>Consult online with top doctors across specialities from the comfort of your room.</h5>
                        </div>
                    </div>
                </div>

                <div class="row gx-5 align-items-center">
        

                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=covid-19') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/covid-19.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Covid-19 Specialist</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=general_practitioner') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/general.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>General Practitioner</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=internal_medicine') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/Gastroenterologists.png" width="50"
                                                height="50" alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Internal Medicine</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=family_medicine') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/sexologist.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Family medicine</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=paediatrics') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/pediatrition.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Paediatrics</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=gynecology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/gynecologist.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Gynecology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=obstetrics') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/gynecologist.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Obstetrics</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=orthopaedics') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/orthopedic.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Orthopaedics</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=urology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/urologist.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Urology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=psychiatry') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/psychiatrist.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Psychiatry</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=endocrinology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/Gastroenterologists.png" width="50"
                                                height="50" alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Endocrinology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=cardiology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/cardiologist.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Cardiology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=ophthalmology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/ophthalmologists.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Ophthalmology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=neurology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/neuro.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Neurology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=nephrology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/homeopathy.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Nephrology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=oncology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/diabetologist.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Oncology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=dermatology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/dermatology.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Dermatology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=immunology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/immunology.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Immunology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=radiology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/radiology.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Radiology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=haematology') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/haematology.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Haematology</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=general_surgery') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/general_surgery.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>General Surgery</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=plastic_surgery') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/plastic_surgery.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Plastic Surgery</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=ent') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/ent.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>ENT</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('speciality', 'speciality=maxillofacial_surgery') }}">
                                    <div class="testimonial-card px-3 py-3 rounded-3 bg-white border mx-0 text-center">
                                        <div class="mb-2">
                                            <img src="/front/icons/maxillofacial_surgery.png" width="50" height="50"
                                                alt="Covid-19 Icon">
                                        </div>
                                        <div class="fbox-content">
                                            <h6>Maxillofacial Surgery</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        {{-- </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- About Section End -->

        <!-- Promo Section Start -->
        <div class="promo-wrap style3 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                        <div class="promo-card style3">
                            <div class="promo-icon">
                                <i class="fas fa-video"></i>
                            </div>
                            <div class="promo-info">
                                <h3>TELEMEDICINE</h3>
                                <p>Speak with a doctor through video call, chat, and phone from the comfort of your home or office.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="promo-card style3">
                            <div class="promo-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="promo-info">
                                <h3>VITAL SIGNS</h3>
                                <p>Visit our triage center for free vital signs check-up, including blood pressure, weight, and more.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                        <div class="promo-card style3">
                            <div class="promo-icon">
                                <i class="fas fa-vial"></i>
                            </div>
                            <div class="promo-info">
                                <h3>LABORATORY</h3>
                                <p>Get screening tests for various diseases and conditions, including Malaria, Hepatitis, HIV, and more.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                        <div class="promo-card style3">
                            <div class="promo-icon">
                                <i class="fas fa-house-user"></i>
                            </div>
                            <div class="promo-info">
                                <h3>HOME VISIT</h3>
                                <p>Request a doctor consultation at your home or office for personalized care and convenience.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="cta-wrap pt-75">
                    <div class="row gx-5 align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="cta-content">
                                <div class="cta-logo">
                                    <img src="/front/images/cta-icon-2.png" alt="Image">
                                </div>
                                <div class="content-title style2">
                                    <h2>Join Our Health Community and Experience Seamless Care</h2>
                                    <p>Unlock the Benefits of Membership and Connect with a Diverse Network of Healthcare Professionals, Access Exclusive Resources, and Empower Yourself with Personalized Care Solutions for a Healthier Life Journey.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="cta-btn">
                                <a href="{{ route('register') }}" class="btn style2">Create an Account</a>
                                <a href="{{ route('login') }}" class="btn style8">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Promo Section End -->

        <!-- Service Section Start -->
        <section class="service-wrap style3 ptb-100 bg-athens">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1" data-aos="fade-up"
                        data-aos-duration="1200" data-aos-delay="200">
                        <div class="section-title style1 text-center mb-40">
                            <span>Our Services</span>
                            <h2>Think Hard &amp; Focus On The Patient's Well-Being</h2>
                        </div>
                    </div>
                </div>
                <div class="service-slider-one style2 owl-carousel">
                  
                    {{-- <div class="service-card style3" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="200">
                        <div class="service-img">
                            <img src="/front/images/service-12.jpg" alt="Image">
                            <span class="service-icon"><i class="flaticon-traumatology"></i></span>
                        </div>
                        <div class="service-info">
                            <h3><a href="service-details.html">Orthopedic Solution</a></h3>
                            <p>It is a long established fact that reader will content of page when looks layout.</p>
                            <a href="service-details.html" class="link style2">Explore More</a>
                        </div>
                    </div> --}}


                   
                    
                    <div class="service-card style3" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                        <div class="service-img">
                            <img src="/front/images/service-12.jpg" alt="Image">
                        </div>
                        <div class="service-info">
                            <h3><a href="service-details.html">Dr. John Doe</a></h3>
                            <p>
                                <strong><div class="icon-container"><div class="icon"><i class="flaticon-doctor"></i></div></div></strong>
                                <strong><div class="icon-container"><div class="icon"><i class="flaticon-video"></i></div></div></strong>
                                <strong><div class="icon-container"><div class="icon"><i class="flaticon-phone-call"></i></div></div></strong>
                                <strong><div class="icon-container"><div class="icon"><i class="flaticon-chat"></i></div></div></strong>
                                <strong><div class="icon-container"><div class="icon"><i class="flaticon-language"></i></div></div></strong>
                            </p>
                            <a href="service-details.html" class="link style2">See Profile</a>
                        </div>
                    </div>
                    
                    
                    

                   
                    
                </div>
            </div>
        </section>
        <!-- Service Section End -->

        <!-- Why Choose Us Section Start -->
        <section class="wh-wrap style3 pb-100 bg-chathamas">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-1 order-md-2 order-2" data-aos="fade-right"
                        data-aos-duration="1200" data-aos-delay="200">
                        <div class="wh-content">
                            <div class="content-title style2">
                                <span>Why Choose us</span>
                                <h2>Protect Your Health With Our Health Package</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste cupiditate sit
                                    debitis, aut, perferendis praesentium alias, asperiores similique veniam vitae
                                    veritatis.</p>
                            </div>
                            <div class="feature-item-wrap">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="ri-check-line"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>Mental Health Solution</h3>
                                        <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui
                                            praesent sapien pellen tesque .</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="ri-check-line"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>Rapid Improvement Patient</h3>
                                        <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui
                                            praesent sapien pellen tesque.</p>
                                    </div>
                                </div>
                            </div>
                            <a href="about.html" class="btn style1">Get More info</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-2 order-md-1 order-1" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="200">
                        <div class="wh-img-wrap">
                            <div class="wh-bg-3 bg-f"></div>
                            <div class="about-doctor-box">
                                <div class="doctor-img">
                                    <img src="/front/images/doctor-1.jpg" alt="Image">
                                </div>
                                <div class="doctor-info">
                                    <h5>Dr. Kate Winslet</h5>
                                    <span>Radiology</span>
                                </div>
                                <button type="button" class="btn">Select</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Why Choose Us Section End -->

        <!-- Team Section Start -->
        <section class="team-wrap ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xl-3 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2  col-md-10 offset-md-1"
                        data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="section-title style1 text-center mb-40">
                            <span>Our Team</span>
                            <h2>Meet Our Expert &amp; Experienced Team Members</h2>
                        </div>
                    </div>
                </div>
                <div class="team-slider-one style2 owl-carousel">
                    <div class="team-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <img src="/front/images/team-1.jpg" alt="Image">
                        <div class="team-info">
                            <h3>Dr. Fedrick Bonita</h3>
                            <span>Othopedic Surgeon</span>
                            <ul class="social-profile style2 list-style">
                                <li>
                                    <a target="_blank" href="https://facebook.com">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://instagram.com">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                        <img src="/front/images/team-2.jpg" alt="Image">
                        <div class="team-info">
                            <h3>Dr. Ken Moris</h3>
                            <span>Urology Efficient</span>
                            <ul class="social-profile style2 list-style">
                                <li>
                                    <a target="_blank" href="https://facebook.com">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://instagram.com">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                        <img src="/front/images/team-3.jpg" alt="Image">
                        <div class="team-info">
                            <h3>Dr. Luiz Frank</h3>
                            <span>Neurosurgery Efficient</span>
                            <ul class="social-profile style2 list-style">
                                <li>
                                    <a target="_blank" href="https://facebook.com">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://instagram.com">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                        <img src="/front/images/team-4.jpg" alt="Image">
                        <div class="team-info">
                            <h3>Dr. Selina Gomez</h3>
                            <span>Surgery Efficient </span>
                            <ul class="social-profile style2 list-style">
                                <li>
                                    <a target="_blank" href="https://facebook.com">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://instagram.com">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                        <img src="/front/images/team-5.jpg" alt="Image">
                        <div class="team-info">
                            <h3>Dr. Sarai Conn</h3>
                            <span>Senior Dentist</span>
                            <ul class="social-profile style2 list-style">
                                <li>
                                    <a target="_blank" href="https://facebook.com">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://instagram.com">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="700">
                        <img src="/front/images/team-6.jpg" alt="Image">
                        <div class="team-info">
                            <h3>Dr. Maureen Klein</h3>
                            <span>Othopedic Surgeon</span>
                            <ul class="social-profile style2 list-style">
                                <li>
                                    <a target="_blank" href="https://facebook.com">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://instagram.com">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Section End -->



        <!-- Appointment Section Start -->
        <section class="appointment-wrap style3 ptb-100 bg-athens">
            <div class="container">
                <div class="row align-items-center gx-5">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="promo-bg bg-f">
                            <a class="play-now" data-fancybox href="https://www.youtube.com/watch?v=UNSSuTSQI9I">
                                <i class="ri-play-fill"></i>
                                <span class="ripple"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="appointment-content">
                            <div class="content-title style1">
                                <span>Best Solutions</span>
                                <h2>Awesome Smart Health Can Make Your Life Easier</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste cupiditate sit
                                    debitis, aut, perferendis praesentium alias, asperiores similique veniam vitae
                                    veritatis.</p>
                            </div>
                            <ul class="content-feature-list list-style mb-0">
                                <li><i class="ri-checkbox-circle-line"></i>Top Professional Team</li>
                                <li><i class="ri-checkbox-circle-line"></i>World Class Dental Services</li>
                                <li><i class="ri-checkbox-circle-line"></i>Discount On Treatment Fees</li>
                                <li><i class="ri-checkbox-circle-line"></i>Multi-Functional Hospital</li>
                                <li><i class="ri-checkbox-circle-line"></i>20+ Years Of Experience</li>
                                <li><i class="ri-checkbox-circle-line"></i>Top Professional Specialist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Appointment Section End -->

        <!-- Testimonial Section Start -->
        <section class="testimonial-wrap pb-100 bg-athens">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1" data-aos="fade-up"
                        data-aos-duration="1200" data-aos-delay="200">
                        <div class="section-title style1 text-center mb-40">
                            <span>Testimonial</span>
                            <h2>The Main Reason For Your Choice Is Our Best Service </h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider-two style2 owl-carousel">
                    <div class="testimonial-card style3" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="200">
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="/front/images/client-1.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Jim Morison</h3>
                                    <span>Director, BAT</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card style3" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="300">
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="/front/images/client-2.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Alex Cruis</h3>
                                    <span>CEO, IBAC</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card style3" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="400">
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="/front/images/client-3.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Tom Haris</h3>
                                    <span>Engineer, Olleo</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card style3" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="500">
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="/front/images/client-4.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Harry Jackson</h3>
                                    <span>Enterpreneur</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card style3" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="600">
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="/front/images/client-5.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Chris Haris</h3>
                                    <span>MD, ITec</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Section End -->

        <!-- Pricing Section Start -->
        <section class="pricing-wrap pt-100 pb-75">
            <div class="container">
                <div class="section-title style1 text-center mb-40">
                    <span>Pricing Plan</span>
                    <h2>Our Simple &amp; Affordable Plan</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                        data-aos-delay="200">
                        <div class="pricing-card">
                            <div class="pricing-header">
                                <div class="pricing-header-left">
                                    <h5>Basic Plan</h5>
                                    <h2>$79<span>/Month</span></h2>
                                </div>
                                <div class="pricing-header-right">
                                    <i class="flaticon-home"></i>
                                </div>
                            </div>
                            <ul class="pricing-features list-style">
                                <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                                <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                                <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                                <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                                <li class="unchecked">X-rays<i class="ri-close-fill"></i></li>
                                <li class="unchecked">Cancer Treatment<i class="ri-close-fill"></i></li>
                            </ul>
                            <a href="login.html" class="btn style2">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                        data-aos-delay="300">
                        <div class="pricing-card">
                            <div class="pricing-header">
                                <div class="pricing-header-left">
                                    <h5>Standard Plan</h5>
                                    <h2>$89<span>/Month</span></h2>
                                </div>
                                <div class="pricing-header-right">
                                    <i class="flaticon-user-2"></i>
                                </div>
                            </div>
                            <ul class="pricing-features list-style">
                                <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                                <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                                <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                                <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                                <li class="checked">X-rays<i class="ri-check-line"></i></li>
                                <li class="unchecked">Cancer Treatment<i class="ri-close-fill"></i></li>
                            </ul>
                            <a href="login.html" class="btn style2">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                        data-aos-delay="400">
                        <div class="pricing-card">
                            <div class="pricing-header">
                                <div class="pricing-header-left">
                                    <h5>Premium Plan</h5>
                                    <h2>$99<span>/Month</span></h2>
                                </div>
                                <div class="pricing-header-right">
                                    <i class="flaticon-clipboard"></i>
                                </div>
                            </div>
                            <ul class="pricing-features list-style">
                                <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                                <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                                <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                                <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                                <li class="checked">X-rays<i class="ri-check-line"></i></li>
                                <li class="checked">Cancer Treatment<i class="ri-check-line"></i></li>
                            </ul>
                            <a href="login.html" class="btn style2">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Section End -->

        <!-- Partner Section Start -->
        <div class="container pb-100">
            <div class="partner-slider-one owl-carousel">
                <div class="partner-item">
                    <img src="/front/images/partner-7.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="/front/images/partner-8.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="/front/images/partner-9.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="/front/images/partner-10.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="/front/images/partner-11.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="/front/images/partner-12.png" alt="Image">
                </div>
            </div>
        </div>
        <!-- Partner Section End -->

        <!-- Blog Section Start -->
        <section class="blog-wrap pt-100 pb-75 bg-athens">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3  col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                        <div class="section-title style1 text-center mb-40">
                            <span>Our Blog</span>
                            <h2>Our Latest &amp; Most Popular Tips &amp; Tricks For You</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                        data-aos-delay="200">
                        <div class="blog-card style3">
                            <div class="blog-img">
                                <img src="/front/images/blog-2.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.html" class="blog-date"><span>25</span>Jun</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a>
                                    </li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.html">Telehealth Services Are Ready To Help
                                        Your Family </a></h3>
                                <a href="blog-details-right-sidebar.html" class="link style2">Read More<i
                                        class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                        data-aos-delay="300">
                        <div class="blog-card style3">
                            <div class="blog-img">
                                <img src="/front/images/blog-4.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.html" class="blog-date"><span>18</span> Jun</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a>
                                    </li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.html">10 Tips To Lead A Healthy And Happy
                                        Life</a></h3>
                                <a href="blog-details-right-sidebar.html" class="link style2">Read More<i
                                        class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                        data-aos-delay="400">
                        <div class="blog-card style3">
                            <div class="blog-img">
                                <img src="/front/images/blog-5.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.html" class="blog-date"><span>12</span>May</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a>
                                    </li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.html">The Day I'd Spent At Square Medical
                                        Center</a></h3>
                                <a href="blog-details-right-sidebar.html" class="link style2">Read More<i
                                        class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Section End -->

        <!-- Footer Section Start -->
        <footer class="footer-wrap">
            <div class="container">
                <div class="row pt-100 pb-75">
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
                        <div class="footer-widget">
                            <a href="index.html" class="footer-logo">
                                <img src="/front/images/logo-white.png" alt="Image">
                            </a>
                            <p class="comp-desc">
                                Lorem ipsum dolor sit amet consc tetur adicing elit. Dolor emque dicta molest enim
                                beatae ame consequ atur tempo pretium auctor nam.
                            </p>
                            <ul class="social-profile style1 list-style">
                                <li>
                                    <a href="https://facebook.com">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://instagram.com">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://linkedin.com">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Company</h3>
                            <ul class="footer-menu list-style">
                                <li>
                                    <a href="index.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="about.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="service-one.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Our Services
                                    </a>
                                </li>
                                <li>
                                    <a href="team.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Our Team
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Important</h3>
                            <ul class="footer-menu list-style">
                                <li>
                                    <a href="portfolio.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="appointment.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Appointment
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        FAQ
                                    </a>
                                </li>
                                <li>
                                    <a href="privacy-policy.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="terms-of-service.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Terms &amp; Conditions
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-5 col-md-6 col-sm-6 pe-xl-4">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Quick Link</h3>
                            <ul class="footer-menu list-style">
                                <li>
                                    <a href="about.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Why Choose Us
                                    </a>
                                </li>
                                <li>
                                    <a href="pricing-plan.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Pricing Plan
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-left-sidebar.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        News &amp; Articles
                                    </a>
                                </li>
                                <li>
                                    <a href="login.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Subscribe
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-7 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Official Info</h3>
                            <ul class="contact-info list-style">
                                <li>
                                    <i class="flaticon-map"></i>
                                    <h6>Location</h6>
                                    <p>2767 Sunrise Street, NY 1002, USA</p>
                                </li>
                                <li>
                                    <i class="flaticon-email-1"></i>
                                    <h6>Email</h6>
                                    <a href="/cdn-cgi/l/email-protection#9ef6fbf2f2f1deeafbf2f7b0fdf1f3"><span
                                            class="__cf_email__"
                                            data-cfemail="fa929f969695ba8e9f9693d4999597">[email&#160;protected]</span></a>
                                </li>
                                <li>
                                    <i class="flaticon-phone-call-1"></i>
                                    <h6>Phone</h6>
                                    <a href="tel:13454567877">+1-3454-5678-77</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <p class="copyright-text"><i class="ri-copyright-line"></i> <span>Teli</span>. All Rights Reserved By <a
                    href="https://hibotheme.com/">HiboTheme</a></p>
        </footer>
        <!-- Footer Section End -->

    </div>
    <!-- Page Wrapper End -->

    <!-- Back-to-top button Start -->
    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
    <!-- Back-to-top button End -->

    <!-- Link of JS files -->
    <script data-cfasync="false" src="/front/js/email-decode.min.js"></script>
    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/bootstrap.bundle.min.js"></script>
    <script src="/front/js/form-validator.min.js"></script>
    <script src="/front/js/contact-form-script.js"></script>
    <script src="/front/js/aos.js"></script>
    <script src="/front/js/owl.carousel.min.js"></script>
    <script src="/front/js/odometer.min.js"></script>
    <script src="/front/js/fancybox.js"></script>
    <script src="/front/js/jquery.appear.js"></script>
    <script src="/front/js/tweenmax.min.js"></script>
    <script src="/front/js/main.js"></script>
</body>

</html>
