 <!-- Header -->
 <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('homepage') }}">
          <img src="/uploads/logo.png" alt="Chatdoc Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link " href="{{ route('homepage') }}">Home</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#services">Departments</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ route('services') }}">Services</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
          </ul>
          <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        </div>
      </nav>
    </div>
  </header>
