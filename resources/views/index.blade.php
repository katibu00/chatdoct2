@extends('layouts.app2')

@section('title', 'Page Title')

@section('content')
<main id="main">

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('img/slide/slide-4.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Consult a Doctor Anywhere, Anytime</h2>
              <p class="animate__animated animate__fadeInUp">Talk to a medical doctor via chat, call or video call 24/7 using your mobile phone, tablet or computer.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{ asset('img/slide/slide-6.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Convenience</h2>
              <p class="animate__animated animate__fadeInUp">You can talk to your doctor without leaving your home or room.</p>
              <!--<a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>-->
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{ asset('img/slide/slide-5.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Available</h2>
              <p class="animate__animated animate__fadeInUp">Our Services are Affordable, Flexible and Easily Accessible.</p>
              <a href="#why?" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->


<!-- ======= Featured Services Section ======= -->
<section id="contact" class="featured-services section-bg">
  <div class="container">

    <div class="row no-gutters">
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-mailbox"></i></div>
          <h4 class="title">Contact</h4>
          <p class="description">
            <span><i class="bi bi-phone"></i> (+234) 0808 060 7180</span> <br />
                            <span><i class="bi bi-envelope"></i> info@chatdoc.com.ng </span>
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-building"></i></div>
          <h4 class="title">Address</h4>
          <p class="description">
            No 15, Gubi Dam Junction along Maiduguri road, Bauchi, Nigeria.<br />
            <a href="https://goo.gl/maps/WnAuLdyfiyNaohwY7" target="_blank"><i class="bi bi-map-fill"></i> Open in Map</a></p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-clock-history"></i></div>
          <h4 class="title">Opening Hours</h4>
          <p class="description">
            <span><i class="bi bi-clock"></i> Available 24hrs</span> <br />
            <span> <i class="bi bi-calendar3"></i> 7 Days a Week</span>
          </p>
        </div>
      </div>
    </div>

  </div>
</section><!-- End Featured Services Section -->

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container">

    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        <h3>Search Doctor, Make an Appointment</h3>
        <p> Discover the best doctors, clinic & hospital in the city nearest to you.</p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <div class="form-group has-search">
          <span class="bi bi-search form-control-feedback"></span>
          <input type="text" class="form-control" placeholder="Search">
        </div>
      </div>
    </div>

  </div>
</section><!-- End Cta Section -->

<!-- ======= How it Works Section ======= -->
<section id="howitworks" class="services">
  <div class="container">

    <div class="section-title">
      <h2>How It Works</h2>
      <p>You can get started by following these simple steps</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box iconbox-green">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
            </svg>
            <i class="bx bx-user-plus"></i>
          </div>
          <h4><a href="">1. Sign-Up</a></h4>
          <p>Sign up and set up your profile</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box iconbox-green">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
            </svg>
            <i class="bx bx-lock-open"></i>
          </div>
          <h4><a href="">2. Login</a></h4>
          <p>Login to your account</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box iconbox-green">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
            </svg>
            <i class="bx bx-user-pin"></i>
          </div>
          <h4><a href="">3. Select Doctor</a></h4>
          <p>Select from the list of Doctors</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box iconbox-green">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
            </svg>
            <i class="bx bx-add-to-queue"></i>
          </div>
          <h4><a href="">4. Booking</a></h4>
          <p>Click on Booking and select a convenient time for you to see a doctor</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box iconbox-green">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
            </svg>
            <i class="bx bx-slideshow"></i>
          </div>
          <h4><a href="">5. Consultation</a></h4>
          <p>When it’s time for consultation login and your doctor will be available</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box iconbox-green">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
            </svg>
            <i class="bx bx-file"></i>
          </div>
          <h4><a href="">6. Prescription</a></h4>
          <p>Receive your prescription/medical advice/Referral Online and rate your doctor with 1-5 star at the end of consultation</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End How it Works Section -->


<!-- ======= Specialities Section ======= -->
<section id="specialities" class="specialities">
  <div class="container">

    <div class="section-title">
      <h2>Consult <span style="text-transform: lowercase;">from</span> Top Specialties</h2>
      <p>Consult Online with top doctors across top specialities with ease on your fingertips.</p>
    </div>

    <div class="row" id="specialities-flters">

      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-medical-sign-alt"></i> General practitioner</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-medicine"></i> Internal Medicine</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-medical-sign"></i> Family Medicine</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-children-care"></i> Paediatrics</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-woman-in-glasses"></i> Gynaecology</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-businesswoman"></i> Obstetrics</div>
        
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-surgeon"></i> General Surgery</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-bone"></i> Orthopaedics</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-labour"></i> Urology</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-brainstorming"></i> Psychiatry</div>
      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-heart-eyes"></i> Endocrinology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-heart-beat-alt"></i> Cardiology</div>

      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-eye"></i> Ophthalmology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-rolling-eyes"></i> Neurology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-bowling"></i> Nephrology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-chart-radar-graph"></i> Oncology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-listening"></i> ENT </div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-tooth"></i> Dental surgery</div>

      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-molecule"></i> Rheumatology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-beaker"></i> Haematology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-snow-flake"></i> Gastroenterology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-snow"></i> Dermatology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-radio-active"></i> Radiology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-heart-beat"></i> Immunology</div>

      <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-foot-print"></i> Pathology</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-surgeon-alt"></i> Plastic Surgery</div>
                <div class="col-lg-2 col-md-4 col-sm-6"><i class="icofont-look"></i> Others/ Specify</div>

    </div>


  </div>
</section><!-- End Specialities Section -->


<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h2>About Us</h2>
      <p>Chatdoc Nigeria is a telemedicine platform that aims to address unmet healthcare demands in Nigeria.</p>
    </div>

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="{{ asset('img/logo.jpeg') }}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h4>We Provide Medical Services You Can Trust!</h4>
        <ul>
          <li>ChatDoc is a telemedicine platform that helps underserved communities to access qualitative healthcare virtually through their mobile phones, Tablet or computer. </li>
          <li>Through ChatDoc <a href="https://www.chatdoc.com.ng">website</a> or application, patients can talk to qualified medical doctors or specialists via voice or video call and obtain drug prescription, medical advice, counseling or appropriate referral.</li>
          <li>We send 70% of the consultation fee to our Doctors and take the remaining 30% to cover for operational and marketing cost.</li>
          <li>We target low income/Rural communities, with the aim of  solving the problems of abnormal distribution of healthcare personnel between rural and urban areas due to the effect of Human Resource for Health (HRH) crises that affects many African counties including Nigeria.</li>
          <li>We are also working to make medical devices and diagnostic tools easily accessible and affordable to local clinics and dispensaries so as to increase healthcare accessibility and affordability to these communities.</li>
        </ul>
        <p>
          
        </p>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

 <!-- ======= Why ChatDoc Section ======= -->
 <section id="why?" class="about">
  <div class="container">

    <div class="section-title">
      <h2>Why ChatDoc?</h2>
      <p>These are some of the reasons why you should choose Chatdoc Nigeria.</p>
    </div>

    <div class="row">
      <!-- Slider main container -->
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
             <h3>Comfort and convenience</h3>
              <p>You can talk to your doctor without leaving your home or room. It saves you from the stress of driving and staying in a waiting room for hours to see a doctor.</p>
          </div>

          <div class="swiper-slide">
            <h3> Medical access to people in the underserved/rural areas</h3> 
            <p>Those people who are far away from a health facility can easily talk to a doctor in a minute before they get extremely sick.</p>
          </div>

          <div class="swiper-slide">
            <h3>lower Cost</h3> 
            <p>Telemedicine is relatively cheaper than in-person visit. It eliminates cost of transportation and feeding that patient may pay during in-person visit.</p>
          </div>
          <div class="swiper-slide">
            <h3> Reduces exposure to diseases</h3> 
            <p>Telemedicine reduces the risk of contracting communicable diseases such as Covid-19 by reducing contact between patients in the waiting room. Doctors are also protected.</p>
          </div>
          
          <div class="swiper-slide">
            <h3> Reduces anxiety</h3> 
            <p>Some people don’t like the hospital environment, or have some phobias. Telemedicine, helps them to access healthcare at comfort of their homes.</p>
          </div>
          <div class="swiper-slide">
            <h3> Increases practice revenue</h3> 
            <p>Doctors can earn more income by providing extra services via telemedicine after closing from regular work.</p>
          </div>
        </div>
        
      </div>

    </div>

  </div>
</section>


<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Featured Doctors</h2>
      <p>Meet some of Our Doctors</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <img src="{{ asset('img/team/team-1.jpg') }}" alt="">
          <a href="{{ route('showDoctor') }}"><h4 title="See Details">Dr. Mustapha Muhammad</h4></a>
          <span>Specialization</span> 
          <div class="social">
            <a href=""><i class="bi bi-camera-video"></i></a>
            <a href=""><i class="bi bi-telephone"></i></a>
            <a href=""><i class="bi bi-chat"></i></a>
            
          </div>
          
          <p>
            <a href="#"><button class="btn btn-outline-success btn-sm">Book Now</button></a> NGN 1000.0
            
          </p>

          <div class="social">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>

        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <img src="{{ asset('img/team/team-1.jpg') }}" alt="">
          <a href="{{ route('showDoctor') }}"><h4 title="See Details">Dr. Mustapha Muhammad</h4></a>
          <span>Specialization</span> 
          <div class="social">
            <a href=""><i class="bi bi-camera-video"></i></a>
            <a href=""><i class="bi bi-telephone"></i></a>
            <a href=""><i class="bi bi-chat"></i></a>
            
          </div>
          
          <p>
            <a href=""><button class="btn btn-outline-success btn-sm">Book Now</button></a> NGN 1000.0
            
          </p>

          <div class="social">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>

        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <img src="{{ asset('img/team/team-1.jpg') }}" alt="">
          <a href="{{ route('showDoctor') }}"><h4 title="See Details">Dr. Mustapha Muhammad</h4></a>
          <span>Specialization</span> 
          <div class="social">
            <a href=""><i class="bi bi-camera-video"></i></a>
            <a href=""><i class="bi bi-telephone"></i></a>
            <a href=""><i class="bi bi-chat"></i></a>
            
          </div>
          
          <p>
            <a href=""><button class="btn btn-outline-success btn-sm">Book Now</button></a> NGN 1000.0
            
          </p>

          <div class="social">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>

        </div>
      </div>
      <a href="{{ route('doctorsList') }}" style="text-align:right;">All Doctors <i class="bi bi-chevron-right"></i></a>
    </div>

   

  </div>
</section><!-- End Team Section -->

<!-- ======= Contact Section ======= -->
<section id="faq" class="faq">
  <div class="container">

    <div class="section-title">
      <h2>FAQs</h2>
      <p>Frequently Asked Questions</p>
    </div>

    <div class="row">
      <div class="col-lg-12">
        
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Q. How do I see doctor via ChatDoc?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Simply go to : www.chatdoc.com.ng. Sign-up and <a href="#">follow the steps</a></div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Q. What are your working hours?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Our services are accessible 24/7.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Q. Are your Doctors real?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, they are qualified and registered medical doctors that are verified by our medical team.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Q. What is the cost of consultation?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">The cost of consultation varies between doctors as displayed on their individual pages; however being a social enterprises that targets low- income/underserved communities, the price ranges between $2 -$10 or its equivalent in local currency.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                Q. Does ChatDoc services replace in-person hospital visit?
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">No, sometimes your doctor may refer you for in-person visit when necessary.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                Q. Can I get prescription via ChatDoc?
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, your doctor will send you prescription after the consultation.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                Q. What if the doctor did not prescribe any drug for me, can I get refund?
              </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">No, the fee is not for prescription alone. Your doctor may decide to educate/counsel you on your health condition or refer you when necessary.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                Q. How many times can I see doctor per day via ChatDoc
              </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">There is no limit to number of consultations if you pay for each.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingNine">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                Q. What if my doctor is not online when I wanted to speak to him?
              </button>
            </h2>
            <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Patiently wait for 10 minutes, if your doctor did not show-up, the booking will be cancelled.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTen">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
                Q. What if I did not show-up during time I booked?
              </button>
            </h2>
            <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Your doctor will wait for you for 10 minutes, after which the booking will be cancelled.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEleven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEleven" aria-expanded="false" aria-controls="flush-collapseEleven">
                Q. Can I see a Doctor instantly?
              </button>
            </h2>
            <div id="flush-collapseEleven" class="accordion-collapse collapse" aria-labelledby="flush-headingEleven" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, some doctors will be available for instant consultation. You can pay instantly and see them.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwelve">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwelve" aria-expanded="false" aria-controls="flush-collapseTwelve">
                Q. Can I get prescription for controlled drugs such as pentazocin via ChatDoc?
              </button>
            </h2>
            <div id="flush-collapseTwelve" class="accordion-collapse collapse" aria-labelledby="flush-headingTwelve" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">No, It is not allowed for our doctors to prescribe controlled drugs or immunization via ChatDoc.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThirteen">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThirteen" aria-expanded="false" aria-controls="flush-collapseThirteen">
                Q. What if my problem is surgical, can I see doctor via ChatDoc?
              </button>
            </h2>
            <div id="flush-collapseThirteen" class="accordion-collapse collapse" aria-labelledby="flush-headingThirteen" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, your doctor may educate/counsel you on your health condition or refer you appropriately for your surgical procedures.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFourteen">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFourteen" aria-expanded="false" aria-controls="flush-collapseFourteen">
                Q. As a medical doctor, how do I join chatdoc to start consulting patients?
              </button>
            </h2>
            <div id="flush-collapseFourteen" class="accordion-collapse collapse" aria-labelledby="flush-headingFourteen" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Simply go to www.chatdoc.com.ng, then sign-up as a doctor and follow the steps. Our medical team will verify your documents within 24 hours. Once verified, you can start consulting patients.</div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFifteen">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFifteen" aria-expanded="false" aria-controls="flush-collapseFifteen">
                Q. What if I cannot explain my symptoms in English?
              </button>
            </h2>
            <div id="flush-collapseFifteen" class="accordion-collapse collapse" aria-labelledby="flush-headingFifteen" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Simply Search the Doctor based on your local language, you can find doctor who can speak your language.</div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection