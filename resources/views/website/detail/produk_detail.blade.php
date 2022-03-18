@extends('template.website')

@section('content')
<main id="main" data-aos="fade-up">
    <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            {{-- <h3>Artikel Bundo Herbs</h3> --}}
            <ol>
              <li><a href="{{'/'}}">Home</a></li>
              <li>Produk</li>
            </ol>
          </div>
        </div>
    </section>
    <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        @php
        $path = asset('img/bundo.png');
        if($data->fileimage){
            $path = asset('img/produk/'.$data->fileimage);
        }
        @endphp
        <div class="row">
            <div class="col-lg-4">
                <img src="{{$path}}" class="img-fluid" style="border-radius:10px;" alt="">
            </div>
            <div class="col-lg-8">
                <h4>{{$data->name ?? null}}</h4>
                <span class="text-sm">Tanggal Publish, {{$data->publish_date ?? null}} -
                    <b class="text-success">{{$new->personal->name ?? null}}</b>
                </span><hr>
                <p style="text-align:justify; font-size:0.9em" class="pt-2">
                    {{$data->description ?? null}}
                </p>
                <a href="https://api.whatsapp.com/send/?phone=628556591252&text=https://bundoherbs.com/produk/detail/{{$data->id}}" target="_blank">
                    <div class="col-lg-4">
                    <div class="btn btn-success btn-block text-white">
                        <i class="bi bi-cart2"></i>
                    <b class="text-sm"> Pesan Sekarang</b>
                    </div>
                    </div>
                </a>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="card mt-3 p-3">
        <div class="card-header">
            <h6 class="title">Spesifikasi Produk</h6>
        </div>
        <div class="card-body  text-sm">
            <div class="col-lg-12 ">
                <label class="col-lg-2">Bahan</label>
                <label class="col-lg-6">: {{ $data->bahan ?? '-' }}</label>
            </div>
            <div class="col-lg-12 ">
                <label class="col-lg-2">Kualitas :</label>
                <label class="col-lg-6">: {{ $data->kualitas ?? '-' }}</label>
            </div>
            <div class="col-lg-12 ">
                <label class="col-lg-2">Di Kirim Dari :</label>
                <label class="col-lg-6">: {{ $data->sendfrom ?? null }}</label>
            </div>
        </div>

        <br/>
        <div class="card-header">
            <h6 class="title">Deskripsi</h6>
        </div>
        <div class="card-body">
            {!! $data->news ?? null !!}
        </div>
      </div>
    </div>
    </div>
</main>
@endsection
