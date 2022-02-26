@extends('template.website')

@section('content')

<main id="main" data-aos="fade-up">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h3>Daftar Artikel</h3>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Page Kosong</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <hr>
            <div class="row">
              <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                <img src="{{asset('img/produk/kunyit.jpg')}}" class="img-fluid" style="border-radius:10px;" alt="">
              </div>
              <div class="col-lg-8 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3>Tanaman Kunyit </h3>
                <span style="font-size:12px"> Jakarta, 02 Feb 2022 - <b class="text-success">Administrator</b></span>
                <br>
                <p style="text-align:justify">
                Kunyit diketahui dapat mencegah penyakit jantung karena mengandung kurkumin yang mampu meningkatkan fungsi endotelium atau lapisan pembuluh darah. Selain itu, kunyit juga memiliki sifat antioksidan dan antiinflamasi yang berperan penting dalam mencegah penyakit jantung.
                </p>
                <p><span class="text-danger"> Berikutnya ..</span></p>
              </div>
            </div>
            <hr>
            <!--  Next Artikel -->
            <div class="row">
              <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                <img src="{{asset('img/produk/lengkuas.jpg')}}" class="img-fluid" style="border-radius:10px;" alt="">
              </div>
              <div class="col-lg-8 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3>Tanaman Lengkuas </h3>
                <span style="font-size:12px"> Jakarta, 02 Feb 2022 - <b class="text-success">Administrator</b></span>
                <br>
                <p style="text-align:justify">
                Lengkuas diketahui dapat mencegah penyakit jantung karena mengandung kurkumin yang mampu meningkatkan fungsi endotelium atau lapisan pembuluh darah. Selain itu, Lengkuas juga memiliki sifat antioksidan dan antiinflamasi yang berperan penting dalam mencegah penyakit jantung.
                </p>
                <p><span class="text-danger"> Berikutnya ..</span></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="section-title">
              <h4>Artikel Lainnya</h4>
            </div>
            <ul style="font-size:14px">
              <li>Komoditi Tanaman Cengkeh Di Indonesia</li>
              <li>Petani Indonesia di Era 4.0</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection
