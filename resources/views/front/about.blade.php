@extends('front.layouts.master')
@section('PageTitle','About Us')
@section('content')

<div class="container" style="margin-top: 120px;">
  <div class="row align-items-center">
    <div class="col-lg-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Our <span>Vision</span>.</h4>
          <p class="card-text">To have a Pan-African healthy and well-informed societies at every stage of development</p>
        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Our <span>Mission</span>.</h4>
          <p class="card-text">To deliver qualitative healthcare services virtually beyond geographical, cost, and language barriers to underserviced communities</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row align-items-stretch container">
    <div class="col-md-5 col-padding min-vh-75" style="background: url('/uploads/banner/doctor_team.jpg') center center no-repeat; background-size: cover;"></div>

    <div class="col-md-7 col-padding">
      <div>
        <div class="heading-block">
          <span class="before-heading color">CEO &amp; Co-Founder</span>
          <h3>Dr. Mustapha Abubakar</h3>
        </div>
        <div class="row col-mb-50">
          <div class="col-lg-12">
            <p>Chatdoc is a cutting-edge telemedicine platform that offers patients an easy and convenient way to connect with qualified medical doctors through chat, phone call, and video call. With a focus on patient care and privacy, Chatdoc provides a secure and encrypted platform for medical consultations.</p>
            <p>The Chatdoc website is designed to be user-friendly and intuitive, allowing patients to easily book appointments with their preferred doctor, fill out the pre-consultation form, and upload any relevant test results or images. The website also provides a secure payment portal for patients to pay for their consultation fees.</p>
            <p>In addition to online consultations, Chatdoc also provides patients with access to its triage centers where they can have their vital signs checked for free using digital devices. This data can be transmitted directly to the medical doctor through the Chatdoc website, improving the quality of care and enabling more accurate diagnoses.</p>
            <p>The Chatdoc website also features a notification system, which informs both doctors and patients whenever an appointment is booked or confirmed. This helps to ensure that everyone is on the same page and that appointments run smoothly.</p>
            <p>Overall, the Chatdoc website is an innovative platform that provides patients with the ability to access quality medical care from the comfort of their own homes. With its user-friendly interface, secure payment options, and state-of-the-art triage centers, Chatdoc is poised to revolutionize the way people access healthcare services.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
