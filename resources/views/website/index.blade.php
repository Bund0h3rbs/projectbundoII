@extends('template.website')

@section('content')
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1 class="text-white">Welcome to <span >Bundo Herbs</span></h1>
      <h2 class="text-white">Jasa Penyedia Hasil Bumi Indonesia<br>
      Terbaik Dan Terpercaya</h2>
      <div class="d-flex">
        <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
        <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
      </div>
    </div>
  </section>

  <main id="main">
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">All in One</a></h4>
              <p class="description">Kami menyediakan pengiriman dalam kuantitas yang beragam</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Kualitas</a></h4>
              <p class="description">Kami telah melakukan memastikan kualitas produk sebelum dilakukan pengiriman</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Faster</a></h4>
              <p class="description">Pengiriman Cepat dengan biaya kirim yang bersaing</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Ekport</a></h4>
              <p class="description">Pengiriman ke luar negeri, mudah dan cepat</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3><span>Bundo Herbs</span></h3>

        </div>
        <div class="col-lg-12 text-center">
          <p class="fst-italic">
            "Kami senantiasa memberikan pelayanan terbaik dengan barang jaminan kualitas, kepuasan anda prioritas kami"
          </p>
        </div>
      </div>
    </section>
  </main>
@endsection
