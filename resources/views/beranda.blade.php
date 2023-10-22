<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ExploreRoutes</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href=" {{ asset('slick/assets/css/bootstrap-5.0.0-beta1.min.css') }}" />
    <link rel="stylesheet" href=" {{ asset('slick/assets/css/LineIcons.2.0.css') }}"/>
    <link rel="stylesheet" href=" {{ asset('slick/assets/css/tiny-slider.css') }}"/>
    <link rel="stylesheet" href=" {{ asset('slick/assets/css/animate.css') }}"/>
    <link rel="stylesheet" href=" {{ asset('slick/assets/css/lindy-uikit.css') }}"/>
  </head>
  <body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ========================= preloader end ========================= -->

    <!-- ========================= hero-section-wrapper-5 start ========================= -->
    <section id="home" class="hero-section-wrapper-5">


      <!-- ========================= hero-5 start ========================= -->
      <div class="hero-section hero-style-5 img-bg" style="background-image: url(' {{ asset('slick/assets/img/hero/hero-5/sunset.jpg') }}')">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <div class="hero-content-wrapper">
                <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s">Hello Sahabat Explores!</h2>
                <p class="mb-30 wow fadeInUp" data-wow-delay=".4s">Untuk memanfaatkan semua layanan kami, cukup pilih 'Get Started' dan Anda akan segera memulai pengalaman yang luar biasa bersama kami.</p>
                <a href="/login" class="button radius-50 wow fadeInUp" data-wow-delay=".6s">Get Started <i class="lni lni-chevron-right"></i> </a>
              </div>
              <div class="container">
                <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
                  <p>Coppyright by Indi Rahmadani - 2023</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 align-self-end">
              <div class="hero-image wow fadeInUp" data-wow-delay=".5s">
                <img src=" {{ asset('slick/assets/img/hero/hero-5/travel.png') }}" alt=""> 
            </div>
        </div>
    </div>
</div>

      </div>
      <!-- ========================= hero-5 end ========================= -->

      
    </section>
    <!-- ========================= hero-section-wrapper-6 end ========================= -->

    {{-- <footer class="footer footer-style-4">
      <div class="container">
        <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
          <p>Coppyright by Indi Rahmadani - 2023</p>
        </div>
      </div>
    </footer> --}}
    <!-- ========================= JS here ========================= -->
    <script src=" {{ asset('slick/assets/js/bootstrap-5.0.0-beta1.min.js') }}"></script>
    <script src=" {{ asset('slick/assets/js/tiny-slider.js') }}"></script>
    <script src=" {{ asset('slick/assets/js/wow.min.js') }}"></script>
    <script src=" {{ asset('slick/assets/js/main.js') }}"></script>
  </body>
</html>
