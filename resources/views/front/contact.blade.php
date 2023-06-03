@extends('front.layouts.master')
@section('PageTitle','Contact Us')
@section('content')

<div class="container" style="margin-top: 120px;">
  <div class="row">
    <div class="col-lg-6">
      <h3>Contact Information</h3>
      <p>Feel free to get in touch with us using the contact details below:</p>
      <ul class="contact-info">
        <li><i class="fa fa-map-marker"></i> No. 15 Gubi Dam Junction, Maiduguri Road, Bauchi, Bauchi State.</li>
        <li><i class="fa fa-envelope"></i> support@chatdoct.com</li>
        <li><i class="fa fa-phone"></i> +234 806 178 9101, +234 809 697 8454</li>
        <li><i class="fa fa-clock"></i> Mon - Fri: 9:00 AM - 5:00 PM</li>
      </ul>
    </div>
    <div class="col-lg-6">
      <h3>Contact Form</h3>
      <form action="#" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Send Message</button>
      </form>
    </div>
  </div>
</div>

<style>
  .contact-info {
    list-style-type: none;
    padding-left: 0;
    margin-top: 20px;
  }

  .contact-info li {
    margin-bottom: 10px;
  }

  .contact-info i {
    margin-right: 10px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  textarea.form-control {
    resize: vertical;
  }

  button[type="submit"] {
    background-color: #007bff;
    color: #fff;
  }

  button[type="submit"]:hover {
    background-color: #0069d9;
    color: #fff;
  }
</style>

@endsection
