<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Bundo Herbs</title>
        <meta name="description" content="Herbal,Bundo, Jasa Penyedia, Rempah Rempah, Trend Import, Bahan Masak, Bahan Dapur, Bumbu Dapur, Nusantara, Hasil Bumi" />
		<meta name="keywords" content="Herbal,Bundo, Jasa Penyedia, Rempah Rempah, Trend Import, Bahan Masak, Bahan Dapur, Bumbu Dapur, Nusantara, Hasil Bumi" />

        <!-- Favicons -->
        <link href="{{ asset('img/favicon.png') }}" rel="icon">
        <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    </head>
    <style>
        .logo img{
          max-height: 140px;
        }
        #topbar{
          background:#0d9b54;
        }
        .text-ijo{
          color:#0d9b54;
        }
    </style>
<body>
    <section id="topbar" class="d-flex align-items-center bg-ijotuo">
        <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center">
              <a href="mailto:contact@bundoherbs.com">contact@bundoherbs.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 89 5xxxx xx</span></i>
          </div>
          <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://www.youtube.com" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
            <a href="https://www.facebook.com" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
          </div>
        </div>
    </section>
    @include('template.website-menus')
        @yield('content')
    @include('template.website-footer')
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js')}}"></script>

</body>
</html>