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
        .whatappicon {
            position: fixed;
            visibility: visible;
            /* opacity: 0; */
            right: 15px;
            bottom: 45px;
            z-index: 996;
            /* background: #0d9b54; */
            width: 40px;
            height: 40px;
            border-radius: 4px;
            transition: all .4s;
        }


        .whatappicon .tooltiptext {
        visibility: hidden;
        width: 120px;
        font-size:0.8em;
        background-color: #FFF;
        border:1px solid #0d9b54;
        color: black;
        text-align: center;
        border-radius: 6px;
        padding: 6px 3px;

        /* Position the tooltip */
        position: absolute;
        right:50px;
        bottom:15px;
        z-index: 1;
        }

        .whatappicon:hover .tooltiptext {
        visibility: visible;
        }


        .product-img{
         width:80%;
         max-height: 200px;
         margin-left: 10px;
         margin-right: 10px;
         padding-bottom: 10px;
        }

        .product-title{
          font-size:1.1em;
          font-weight: bold;
          color:rgb(236, 175, 43);
        }

        .product-price {
           font-size:0.9em;
           font-weight:bold;
           color:rgb(236, 175, 43);
        }
        .product-light {
           font-size:0.8em;
           font-weight:bold;
           color:rgb(153, 152, 149);
        }
        .text-judul{
          color:#000;
          font-size:13px;
        }
        .text-sm{
            font-size:0.8em;
        }

    </style>
<body>
    <section id="topbar" class="d-flex align-items-center bg-ijotuo">
        <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center">
              <a href="mailto:contact@bundoherbs.com">contact@bundoherbs.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><a href="https://api.whatsapp.com/send/?phone=628556591252&text=https://bundoherbs.com&app_absent=0" target="_blank"> <span>+628 556-591-252</span> </a></i>
          </div>
          <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://www.youtube.com/channel/UCzcmogKdfODbJNitJN-wSJQ" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
            <a href="https://web.facebook.com/bundoherbs" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/bundoherbs" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
          </div>
        </div>
    </section>

    @include('template.website-menus')
        @yield('content')
    @include('template.website-footer')
    <div id="preloader"></div>
    <a href="https://api.whatsapp.com/send/?phone=628556591252&text=https://bundoherbs.com&app_absent=0" class="whatappicon d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-whatsapp" style="font-size:3em"></i>
    <span class="tooltiptext">Chat VIA Whatapp</span></a>
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

    <script src="{{ asset('assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    {{-- <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script> --}}

    <!-- Template Main JS File -->
    {{-- <script type="text/javascript" src="{{ asset('js/send_contact.js')}}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/js/main.js')}}"></script>

</body>
</html>
