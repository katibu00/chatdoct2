@extends('front.layouts.master')
@section('PageTitle', 'Home')
@section('css')
<style>
      
  .card {
    border: none;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    border-radius: 10px;
  }
  

  
  .card a:hover {
    text-decoration: none;
  }
  .card-body {
    text-align: center;
    padding: 10px;
  }
  
  .card-img {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    overflow: hidden;
    margin-bottom: 5px;
    padding-top: 10px;
  }
  
  .card-img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }
  
  
  .card-title {
    font-size: 16px;
    font-weight: bold;
    margin-top: 1px;
  }
  
  .card-text {
    font-size: 14px;
    color: #888;
  }
  
</style>
@endsection
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
                                <div class="doctor-image" style="height: 200px; overflow: hidden;">
                                    <img @if ($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $user->picture }}" @endif
                                        alt="Doctor Image" style="object-fit: cover; width: 100%; height: 100%;">
                                </div>
                                <div class="doctor-info">
                                    <h5 class="doctor-name">Dr.
                                        {{ $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name }} </h5>
                                    <p class="doctor-about">
                                        {{ Illuminate\Support\Str::limit($user->about, 60, $end = '...') }}</p>
                                    <ul class="doctor-details">
                                        <li>
                                            <i class="fas fa-comments"></i>
                                            <span class="doctor-price">Chat Price:
                                                &#x20A6;{{ number_format($user->chat_rate, 0) }}</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-video"></i>
                                            <span class="doctor-price">Video Price:
                                                &#x20A6;{{ number_format($user->video_rate, 0) }}</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-phone"></i>
                                            <span class="doctor-price">Phone Call Price:
                                                &#x20A6;{{ number_format($user->phone_rate, 0) }}</span>
                                        </li>
                                        @php
                                            $datas = $user->languages;
                                            $data = explode(',', $datas);
                                        @endphp
                                        <li>
                                            <i class="fas fa-language"></i>
                                            <span class="doctor-languages">Languages Spoken: @foreach ($data as $dat)
                                                    {{ $dat }}@if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cta-buttons">
                                    <a href="{{route('doctors.details',$user->id)}}" class="btn view-profile-btn">See Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section id="register-section" style="background-color: #ffffff; padding: 40px 0;">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Join Chatdoc Today</h2>
                <p>Become a part of our community. Register as a doctor or a patient and experience convenient healthcare.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Register as a Doctor</h5>
                            <p class="card-text">Are you a qualified medical professional? Join our network of doctors and provide consultations online.</p>
                            <a href="{{ route('doctor.register') }}" class="btn btn-primary">Register as Doctor</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Register as a Patient</h5>
                            <p class="card-text">Looking for convenient and efficient healthcare? Register as a patient and connect with experienced doctors online.</p>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register as Patient</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="margin-top: 20px;">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a>.</p>
            </div>
        </div>
    </section>




    <section id="faq-section">
        <div class="container">
            <div class="section-heading text-center" style="padding-top: 20px;">
                <h2>Frequently Asked Questions (FAQ)</h2>
                <p>Find answers to commonly asked questions</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/akgq7hK2mgE" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 faq-content">
                    <h2>Frequently Asked Questions</h2>
                    <div class="faq-item">
                        <h3 class="faq-question">What is Chatdoc?</h3>
                        <p class="faq-answer">Chatdoc is a telemedicine platform that connects patients with qualified medical doctors through chat, phone call, and video call. Patients can also have their vital signs checked at a triage center and the data can be transmitted directly to the doctor for better diagnosis and care.
                        </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Is Chatdoc a substitute for in-person doctor visits?</h3>
                        <p class="faq-answer">While Chatdoc can provide convenient and efficient medical consultations, it is not meant to replace in-person visits completely. In certain cases, your doctor may advise an in-person visit for a physical examination.
                        </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Is Chatdoc secure and private?</h3>
                        <p class="faq-answer">Yes, Chatdoc takes patient privacy and security very seriously. All medical consultations and transmissions of data are encrypted and secure to protect patient information.
                        </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">How do I book a doctor appointment through Chatdoc?</h3>
                        <p class="faq-answer">Patients can book doctor appointments through the Chatdoc website or mobile app by selecting their preferred doctor and filling out the pre-consultation form.
                        </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">What types of payment does Chatdoc accept?</h3>
                        <p class="faq-answer">Chatdoc accepts a variety of payment methods, including credit cards and digital wallets, through its secure payment portal.
                        </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Can I have a video call or phone call with a doctor through Chatdoc?</h3>
                        <p class="faq-answer">Yes, in addition to chat, Chatdoc also offers video call and phone call consultations with medical doctors. </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Is there a fee for using Chatdoc's services?</h3>
                        <p class="faq-answer">Yes, there is a fee for medical consultations through Chatdoc. The fee varies based on the type of consultation and the doctor selected.
                        </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">Are the medical doctors on Chatdoc licensed and qualified?</h3>
                        <p class="faq-answer">Yes, all medical doctors on Chatdoc are licensed and qualified to provide medical care. Chatdoc carefully screens and verifies the credentials of all its doctors to ensure patient safety.
                        </p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">What types of medical doctors can I consult through Chatdoc?</h3>
                        <p class="faq-answer">You can consult with a variety of medical doctors including general practitioners, specialists, and others, based on your medical needs.
                        </p>
                    </div>
                    
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

    <section class="newsletter-section">
        <div class="container newsletter-container">
            <h2 class="section-title">Subscribe to Our Newsletter</h2>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

@endsection
