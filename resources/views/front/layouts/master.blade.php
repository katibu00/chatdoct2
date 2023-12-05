<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatdoc - Online Doctor Consultation</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="front_new/css/styles.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- JavaScript -->
    <script src="js/script.js"></script>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


</head>

<body>
    <div id="loader" class="loader">
        <h2 class="loader-text">Chatdoct</h2>
    </div>

    <div id="content" class="hidden">
        @include('front.layouts.header')
      

        @yield('content')



       


        <section class="newsletter-section">
            <div class="container newsletter-container">
                <h2 class="section-title">Subscribe to Our Newsletter</h2>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </section>






       @include('front.layouts.footer')
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        window.addEventListener('load', function() {
            var loader = document.getElementById('loader');
            var content = document.getElementById('content');

            // Hide the loader and display the content
            loader.classList.add('hidden');
            content.classList.remove('hidden');
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl.carousel/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 5,
                nav: true,
                dots: true,
                navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
                mouseDrag: true,
                touchDrag: true,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 40,
                        center: true,

                    },
                    768: {
                        items: 2,

                    },
                    992: {
                        items: 4,

                    }
                }
            });
            $(document).ready(function() {
                $('.faq-question').click(function() {
                    $(this).next('.faq-answer').slideToggle();
                });
            });
        });
    </script>






    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.hero-carousel').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: false,
                nav: false
            });
            $(document).ready(function() {
                $('.carousel').carousel({
                    interval: 3000, // Adjust the interval as needed (in milliseconds)
                    pause: false, // Set to true if you want the auto-scrolling to pause on hover
                    ride: 'carousel' // Enable the automatic cycling of the carousel
                });
            });
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>



</body>

</html>
