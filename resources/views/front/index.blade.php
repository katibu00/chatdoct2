@extends('front.layouts.master')
@section('PageTitle', 'Home')
@section('content')

@include('front.layouts.slider')

<section id="content">
    <div class="content-wrap">

        <div class="promo promo-light promo-full bottommargin-lg header-stick border-top-0 p-5">
            <div class="container clearfix">
                <div class="row align-items-center">
                    <div class="col-12 col-lg">
                        <h3>Try Chatdoct <span>Conveniently</span> and experience medical care like no other</h3>
                        {{-- <span>get discount <em>0 NGN/booking</em> afterwards. No Ads, No Gimmicks and No SPAM. Just
                            Real Content.</span> --}}
                    </div>
                    <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                        <a href="{{ route('register') }}" class="button button-large button-circle m-0">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>




        <div class="container clearfix">
            <div class="row justify-content-center mw-lg mx-auto gutter-20">

                <div class="col-md-6 text-center">
                    <h3 class="h3 fw-bold mb-3">CONSULT ACROSS <span>TOP</span> SPECIALTIES</h3>
                    <p class="text-larger text-muted">Consult online with top doctors across specialities from the comfort of your room.</p>
                </div>

                <div class="w-100 mt-4"></div>

                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=covid-19') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/covid-19.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Covid-19 Specialist</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=general_practitioner') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/general.png">
                            </div>
                            <div class="fbox-content">
                                <h3>General Practitioner</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=internal_medicine') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/Gastroenterologists.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Internal Medicine</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=family_medicine') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/sexologist.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Family medicine</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=paediatrics') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/pediatrition.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Paediatrics</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=gynecology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/gynecologist.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Gynecology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=obstetrics') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/gynecologist.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Obstetrics</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=orthopaedics') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/orthopedic.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Orthopaedics</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=urology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/urologist.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Urology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=psychiatry') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/psychiatrist.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Psychiatry</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=endocrinology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/Gastroenterologists.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Endocrinology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=cardiology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/cardiologist.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Cardiology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=ophthalmology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/ophthalmologists.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Ophthalmology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=neurology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/neuro.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Neurology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=nephrology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/homeopathy.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Nephrology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=oncology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/diabetologist.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Oncology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=dermatology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/dermatology.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Dermatology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=immunology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/immunology.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Immunology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=radiology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/radiology.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Radiology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=haematology') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/haematology.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Haematology</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=general_surgery') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/general_surgery.png">
                            </div>
                            <div class="fbox-content">
                                <h3>General Surgery</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=plastic_surgery') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/plastic_surgery.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Plastic Surgery</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=ent') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/ent.png">
                            </div>
                            <div class="fbox-content">
                                <h3>ENT</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('speciality','speciality=maxillofacial_surgery') }}">
                        <div class="feature-box fbox-center fbox-plain px-3 py-3 rounded-3 bg-light border mx-0">
                            <div class="fbox-icon mb-2">
                                <img src="/front/images/maxillofacial_surgery.png">
                            </div>
                            <div class="fbox-content">
                                <h3>Maxillofacial Surgery</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>



        <section id="content clearfix">
            <div class="content-wrap pb-0">
                <div class="container clearfix">
                    <div class="heading-block center border-bottom-0">
                        <h3>Meet our Team of Specialists<span>.</span></h3>
                        <span>We make sure that your Life is in Good Hands.</span>
                    </div>

                    <div id="oc-products" class="owl-carousel products-carousel carousel-widget"
                        data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3"
                        data-items-lg="4">


                        @foreach ($doctors as $user)
                        <div class="oc-item">
                            <div class="product">
                                <!-- Card -->
                                <div class="card shadow-sm">
                                    <a href="{{route('doctors.details',$user->number)}}"> <img  @if($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$user->picture}}" @endif
                                        class="card-img-top" alt="Doctor Image" ></a>
                                    <div class="card-body">
                                        <span
                                            class="badge bg-info text-dark mb-2 fw-normal px-2 py-1">{{$user->rank}}</span>
                                        <a href="{{route('doctors.details',$user->number)}}"><h4 class="mb-2">Dr. {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</h4></a>
                                        
                                        <div class="row g-0 mb-2 clearfix car-features">

                                            @php
                                                $datas = $user->languages; 
                                                $data = explode(',', $datas); 
                                            @endphp
                                        
                                            <div class="col-6 mb-2"><i class="icon-language mx-1"></i>
                                                @foreach ($data as $dat)
                                                 {{$dat}}@if(!$loop->last),@endif
                                                @endforeach
                                            </div>
                                            <div class="col-6 mb-2"><i class="icon-chat-2 mx-1"></i>&#x20A6;{{number_format($user->chat_rate,0)}}
                                            </div>
                                            <div class="col-6"><i class="icon-video1 mx-1"></i>&#x20A6;{{number_format($user->video_rate,0)}}
                                            </div>
                                            <div class="col-6"><i class="icon-business-time"></i>{{$user->experience}}+
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="card-footer d-flex justify-content-between align-items-center bg-white py-3">
                                        <div></div>
                                        <a href="{{route('doctors.details',$user->number)}}" class="button button-green rounded-pill m-0">See Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- #content end -->

        <div id="faq_section"></div>
        <div class="section m-0 mb-0 mt-3 parallax" style="padding: 100px 0; background-color:rgb(61,128,228);"
            data-0-top="background-color:rgb(61,128,228);" data-center-bottom="background-color:rgb(0,0,0);">
            <div class="container">
                <div class="row justify-content-center dark topmargin">
                   
                    <div class="col-md-7">
                        <h2 class="text-center text-white mb-5 mt-4 fw-semibold">Frequently Asked Questions
                        </h2>
                        <div class="toggle-wrap">
                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        HOW DO I SPEAK WITH MEDICAL DOCTOR?
                                    </div>
                                </div>
                                <div class="toggle-content">Simply signup, set up your profile, fund your wallet, choose a doctor, Select type of service (chat or video) and book available time slot. When it is time, your doctor will be available for chatting or send you a video link for video consultation as the case may be. </div>
                            </div>

                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        ARE YOUR DOCTORS REAL?
                                    </div>
                                </div>
                                <div class="toggle-content">Yes, our doctors are MDCN (Medical and Dental Council of Nigeria) certified, And are verified by our management team.</div>
                            </div>

                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        I DON’T HAVE A SMARTPHONE, HOW CAN I SPAEK A DOCTOR?
                                    </div>
                                </div>
                                <div class="toggle-content">Kindly visit ChatDoc Telehealth Centre, Our partner clinics or pharmaceutical stores nearest to you.</div>
                            </div>

                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        I FIND IT DIFFICULT TO EXPLAIN MY SYMPTOMS IN ENGLISH, WHAT SHOULD I DO?
                                    </div>
                                </div>
                                <div class="toggle-content">Chatdoc provides care beyond language barrier. Local languages of our doctors are indicated, kindly go through the platform and search for doctor who can speak your language.</div>
                            </div>

                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        HOW MUCH IS THE CONSULTATION FEE?
                                    </div>
                                </div>
                                <div class="toggle-content">It varies, depending on the specialty and experience of the doctor. But generally ranges between 500 to 5000 Naira</div>
                            </div>

                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        WHAT WILL HAPPEN IF THE DOCTOR I BOOKED IS NOT AVAILABLE AS SCHEDULED?
                                    </div>
                                </div>
                                <div class="toggle-content">Patiently wait for about 30 minutes after which booking will be cancelled and you will be refunded.</div>
                            </div>

                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        WHAT IF THE DOCTOR I BOOKED DID NOT SEND ME PRESCRIPTON, CAN I GET REFUND?
                                    </div>
                                </div>
                                <div class="toggle-content">No, please note that our doctors charge you for consultation not prescription. He may refer you appropriately or give you some medical advice.</div>
                            </div>

                            <div class="toggle">
                                <div class="toggle-header">
                                    <div class="toggle-icon">
                                        <i class="toggle-closed icon-angle-right1"></i>
                                        <i class="toggle-open icon-angle-down1"></i>
                                    </div>
                                    <div class="toggle-title">
                                        CAN OTHER PATIENTS READ OUR CHATS WITH THE DOCTOR?
                                    </div>
                                </div>
                                <div class="toggle-content">No, we respect your confidentiality as a patient. Our chat system is end-to-end encrypted. Admins can read your chats to ensure great delivery. Your doctor can write clinical note about your health condition which will be visible to the next doctor you are going to see, to serve as a guide.</div>
                            </div>
                        </div>
                        <h5 class="mt-4 text-center fw-normal text-white-50 mb-0">Didn't find what you were
                            after? <a href="#" class="text-white"><u>Visit the FAQ Page</u></a></h5>
                    </div>
                    <div class="col-md-4">
                        <h2 class="text-center text-white mb-5 mt-4 fw-semibold">How It Works
                        <iframe width="420" height="315"
                        src="https://youtu.be/akgq7hK2mgE">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- #content end -->
@endsection