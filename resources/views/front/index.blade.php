@extends('front.layouts.master')
@section('PageTitle', 'Home')
@section('content')


    @include('front.layouts.slider')


    <section id="departments">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Consult from Top Specialties</h2>
                <p>Expert Online Consultations with Leading Doctors in Various Specialties</p>
            </div>
            <div class="row">


                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=covid-19') }}">
                            <div class="card-img">
                                <img src="/front/images/covid-19.png" alt="Covid-19">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Covid-19 Specialist</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=general_practitioner') }}">
                            <div class="card-img">
                                <img src="/front/images/general.png" alt="General Practitioner">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">General Practitioner</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=internal_medicine') }}">
                            <div class="card-img">
                                <img src="/front/images/Gastroenterologists.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Internal Medicine</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=family_medicine') }}">
                            <div class="card-img">
                                <img src="/front/images/sexologist.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Family Medicine</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=paediatrics') }}">
                            <div class="card-img">
                                <img src="/front/images/pediatrition.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Paediatrics</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=gynecology') }}">
                            <div class="card-img">
                                <img src="/front/images/gynecologist.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Gynecology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=obstetrics') }}">
                            <div class="card-img">
                                <img src="/front/images/gynecologist.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Obstetrics</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=orthopaedics') }}">
                            <div class="card-img">
                                <img src="/front/images/orthopedic.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Orthopaedics</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=urology') }}">
                            <div class="card-img">
                                <img src="/front/images/urologist.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Urology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=psychiatry') }}">
                            <div class="card-img">
                                <img src="/front/images/psychiatrist.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Psychiatry</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=cardiology') }}">
                            <div class="card-img">
                                <img src="/front/images/cardiologist.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Cardiology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=ophthalmology') }}">
                            <div class="card-img">
                                <img src="/front/images/ophthalmologists.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Ophthalmology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=neurology') }}">
                            <div class="card-img">
                                <img src="/front/images/neuro.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Neurology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=nephrology') }}">
                            <div class="card-img">
                                <img src="/front/images/homeopathy.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Nephrology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=oncology') }}">
                            <div class="card-img">
                                <img src="/front/images/diabetologist.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Oncology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=dermatology') }}">
                            <div class="card-img">
                                <img src="/front/images/dermatology.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Dermatology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=immunology') }}">
                            <div class="card-img">
                                <img src="/front/images/immunology.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Immunology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=radiology') }}">
                            <div class="card-img">
                                <img src="/front/images/radiology.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Radiology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=haematology') }}">
                            <div class="card-img">
                                <img src="/front/images/haematology.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Haematology</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=general_surgery') }}">
                            <div class="card-img">
                                <img src="/front/images/general_surgery.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">General Surgery</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=plastic_surgery') }}">
                            <div class="card-img">
                                <img src="/front/images/plastic_surgery.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Plastic Surgery</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=ent') }}">
                            <div class="card-img">
                                <img src="/front/images/ent.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">ENT</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                    <div class="card">
                        <a href="{{ route('speciality', 'speciality=maxillofacial_surgery') }}">
                            <div class="card-img">
                                <img src="/front/images/maxillofacial_surgery.png" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Maxillofacial Surgery</h6>
                            </div>
                        </a>
                    </div>
                </div>






            </div>
        </div>
    </section>

    <section id="featured-doctors" style="background-color: #f9f9f9;">
        <div class="section-heading text-center" style="padding-top: 20px;">
            <h2>Featured Doctors</h2>
            <p>Experience Unparalleled Expertise with Our Featured Doctors</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="owl-carousel owl-theme">

                        @foreach ($doctors as $user)
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img @if($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$user->picture}}" @endif alt="Doctor Image">
                            </div>
                            <div class="doctor-info">
                                <h3 class="doctor-name">Dr. {{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }} </h3>
                                <p class="doctor-about">{{ $user->about }}</p>
                                <ul class="doctor-details">
                                    <li>
                                        <i class="fas fa-comments"></i>
                                        <span class="doctor-price">Chat Price: &#x20A6;{{number_format($user->chat_rate,0)}}</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-video"></i>
                                        <span class="doctor-price">Video Price: &#x20A6;{{number_format($user->video_rate,0)}}</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <span class="doctor-price">Phone Call Price: &#x20A6;{{number_format($user->phone_rate,0)}}</span>
                                    </li>
                                    @php
                                        $datas = $user->languages; 
                                        $data = explode(',', $datas); 
                                    @endphp
                                    <li>
                                        <i class="fas fa-language"></i>
                                        <span class="doctor-languages">Languages Spoken:  @foreach ($data as $dat)
                                            {{$dat}}@if(!$loop->last),@endif
                                           @endforeach</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="cta-buttons">
                                <a href="doctor_profile_url" class="btn view-profile-btn">View Profile</a>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </section>






    <section id="faq-section">
        <div class="container">
            <div class="section-heading text-center" style="padding-top: 20px;">
                <h2>Our Departments</h2>
                <p>Explore our diverse range of departments</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/your-video-id" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 faq-content">
                    <h2>Frequently Asked Questions</h2>
                    <div class="faq-item">
                        <h3 class="faq-question">Question 1?</h3>
                        <p class="faq-answer">Answer 1</p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Question 2?</h3>
                        <p class="faq-answer">Answer 2</p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Question 3?</h3>
                        <p class="faq-answer">Answer 3</p>
                    </div>
                    <!-- Add more FAQ items as needed -->
                </div>
            </div>
        </div>
    </section>



    <section class="services-section">
        <div class="container">
            <h2 class="section-title">OUR SERVICES</h2>
            <div class="services-wrapper">
                <div class="service">
                    <i class="fas fa-video service-icon"></i>
                    <h3 class="service-title">TELEMEDICINE</h3>
                    <p class="service-description">Speak with a medical doctor through video call, chat, and phone
                        from the comfort of your home.</p>
                </div>
                <div class="service">
                    <i class="fas fa-heartbeat service-icon"></i>
                    <h5 class="service-title">VITAL SIGNS</h5>
                    <p class="service-description">Visit our patients' triage centre and get free vital signs check
                        such as blood pressure, weight, and more.</p>
                </div>
                <div class="service">
                    <i class="fas fa-flask service-icon"></i>
                    <h3 class="service-title">LAB SERVICES</h3>
                    <p class="service-description">Get screening tests for malaria, hepatitis, HIV, blood sugar,
                        and more.</p>
                </div>
                <div class="service">
                    <i class="fas fa-home service-icon"></i>
                    <h3 class="service-title">HOME VISIT</h3>
                    <p class="service-description">Request for a physical doctor consultation from the comfort of
                        your home.</p>
                </div>
            </div>
        </div>
    </section>


@endsection
