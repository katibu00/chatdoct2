@extends('front.layouts.master')
@section('PageTitle','Our Services')

@section('content')

<div class="container" style="margin-top: 120px;">
  <h2>Our Services</h2>
  <p>We offer a wide range of healthcare services to meet your needs. Explore our services below:</p>

  <div class="row my-3">
    <div class="col-md-3">
      <div class="service-card">
        <i class="fas fa-video"></i>
        <h3>Telemedicine</h3>
        <p>Speak with a medical doctor through video call, chat, and phone call from the comfort of your home.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="service-card">
        <i class="fas fa-heartbeat"></i>
        <h3>Vital Signs Check</h3>
        <p>Visit our patients’ triage center and get free vital signs check, such as blood pressure, weight, and more.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="service-card">
        <i class="fas fa-flask"></i>
        <h3>Lab Services</h3>
        <p>Get screening tests for malaria, hepatitis, HIV, blood sugar, and more.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="service-card">
        <i class="fas fa-home"></i>
        <h3>Doctor Home Visit</h3>
        <p>Request a physical doctor consultation from the comfort of your home.</p>
      </div>
    </div>
  </div>
</div>

<style>
  h2 {
    text-align: center;
    margin-bottom: 30px;
  }

  p {
    text-align: center;
  }

  .row {
    margin-bottom: 30px;
  }

  .service-card {
    text-align: center;
    padding: 20px;
    background-color: #f8f8f8;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  }

  .service-card i {
    font-size: 48px;
    color: #3e64ff;
    margin-bottom: 15px;
  }

  .service-card h3 {
    margin-bottom: 10px;
  }

  .service-card p {
    font-size: 14px;
    line-height: 1.5;
  }
</style>

@endsection
