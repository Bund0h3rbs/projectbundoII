@extends('template.website')

@section('content')

<main id="main" data-aos="fade-up">
    <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <div class="section-title">
              <h3><span>About Us</span></h3>
            </div>
            <ol>
              <li><a href="../index.html">Home</a></li>
              <li>About Us</li>
            </ol>
          </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <img src="{{asset('img/produk/cengkeh.jpg')}}" class="img-fluid" style="border-radius:10px;" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <p>TENTANG KAMI</p>
            <h3>Bundo Herbs </h3>
            <p class="fst-italic">
                Bundo HERBS adalah sebuah perusahaan yang menjual hasil Bumi Indonesia, berawal dari sebuah mimpi dan harapan dan untuk memasarkan hasil dari para petani Indonesia.
            </p>
            <p class="fst-italic">
                Bundo HERBS terus berkolaborasi dengan para petani daerah agar para petani daerah mempunyai kesempatan menjual hasil pertanian ke luar Negeri. Bundo HERBS selalu selalu dan terus mendorong para petani daerah untuk menghasilkan hasil pertanian yang unggul dan berkualitas tinggi.
            </p>
          </div>
        </div>

      </div>
    </section>

    <section id="team" class="team section-bg p-1">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h3><span>#Bikinpetanisenang </span></h3>
          </div>
        </div>
    </section>

    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Team</h2>
            <h3>Our Hardworking <span>Team</span></h3>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img" >
                  <img src="{{asset('img/team/jp_kiri.png')}}" class="img-fluid" alt="">
                  <div class="social" hidden>
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Dt. Rajo Langit</h4>
                  <span>Chief Executive Officer</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="member">
                <div class="member-img">
                  <img src="{{asset('img/team/team-2.jpg')}}" class="img-fluid" alt="">
                  <div class="social" hidden>
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Etek Kadai</h4>
                  <span>Product Manager</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
              <div class="member">
                <div class="member-img">
                  <img src="{{asset('img/team/jas_pria_kanan.png')}}" class="img-fluid" alt="">
                  <div class="social" hidden>
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Sutan Rajo Ameh</h4>
                  <span>CTO</span>
                </div>
              </div>
            </div>

          </div>

        </div>
    </section>

      <!-- == Testimoni == -->
    <section id="testimonials" class="testimonials" >
      <div class="container" data-aos="zoom-in">
      <div class="section-title">
          <h2>Testimoni</h2>
          <h3><span>Kata Mereka Tentang Kami</span></h3>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Vie - HS</h3>
                <h4>-</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bundoherbs, membantu saya dalam memasarkan hasil pertanian, dengan lebih efisien dan terkini
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
                <div class="testimonial-item">
                  <h3>Uda Ari</h3>
                  <h4>Owner</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Dengan jasa bundoherbs, memudahkan kami dalam pengiriman hasil bumi kedalam dan luar negri.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
</main>
@endsection
