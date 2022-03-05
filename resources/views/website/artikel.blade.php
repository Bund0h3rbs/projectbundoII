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
            @if($artikel_new)
                @foreach ($artikel_new as $new)
                @php
                    $filename = isset($new->fileimage) ? $new->fileimage : null;
                    $description = isset($new->description) ? htmlspecialchars_decode($new->description) : null;
                    if($filename){
                        $path = asset('img/artikel/'.$filename);
                    }else{
                        $path = asset('img/bundo.png');
                    }
                @endphp
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{$path}}" class="img-fluid" style="border-radius:10px;" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <h3>{{$new->name ?? null}}</h3>
                        <span style="font-size:12px"> Jakarta, 02 Feb 2022 -
                            <b class="text-success">{{$new->personal->name ?? null}}</b>
                        </span>
                        <p style="text-align:justify; font-size:0.9em" class="pt-2">
                            {!! substr($description,0,200) !!} ..
                        </p>
                        <a href="{{url('artikel/detail/'.$new->id)}}" ><span class="text-danger" style="font-size:0.8em"> Selengkapnya ..</span></a>
                        <br>
                    </div>
                </div>
                <hr>
                @endforeach

            @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        Kategori
                    </div>
                </div>
            </div>
            @endif

          <h4>Artikel Terpopuler</h4>
          <div class="row" hidden>
              <div class="col-lg-4">
                Satu
              </div>
              <div class="col-lg-4">
                Dua
              </div>
              <div class="col-lg-4">
                Tiga
              </div>
          </div>
          </div>
          <div class="col-lg-4">
            <div class="section-title pb-0">
              <h4>Artikel Lainnya</h4>
            </div>
            @if($artikel_right->count() > 0)
            <ul style="font-size:14px">
                @foreach ($artikel_right as $right)
                    <li><a href="{{url('artikel/detail/'.$right->id)}}" >{{$right->name ?? null}}</a></li>
                @endforeach
            </ul>
            @else
            <div class="col-lg-12">-</div>
            @endif
            <p></p>
            @if($artikel_category)
            <div class="section-title pb-0">
                <h4>Artikel Lainnya</h4>
            </div>
            <ul>
                @foreach ($artikel_category as $cat)
                <li>{{$cat->name ?? null}}</li>
                @endforeach
            </u>
            @endif
          </div>
        </div>
      </div>
    </section>
</main>
@endsection
