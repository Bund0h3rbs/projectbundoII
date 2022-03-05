@extends('template.website')

@section('content')
<main id="main" data-aos="fade-up">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          {{-- <h3>Artikel Bundo Herbs</h3> --}}
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Artikel</li>
          </ol>
        </div>

      </div>
    </section>
    <section class="inner-page">
    <div class="container">
      <div class="row">
            @php
            $filename = isset($data->fileimage) ? $data->fileimage : null;

            if($filename){
                $path = asset('img/artikel/'.$filename);
            }else{
                $path = asset('img/bundo.png');
            }
        @endphp
        <div class="col-lg-8 content d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
            <h3>{{$data->name ?? null}}</h3>
            <span style="font-size:12px"> Jakarta, 02 Feb 2022 -
                <b class="text-success">{{$data->personal->name ?? null}}</b>
            </span>
            <p style="font-size:0.6em" class="pt-2">
                {!! $data->news ?? null !!}
            </p>
            <dt class="text-primary" style="font-size:0.8em">#artikel #{{$data->kategori->name ?? 'bundoherbs'}}</dt>
            <hr>
        </div>

        {{-- Bagian Kanan --}}
        <div class="col-lg-4">
            <div class="section-title pb-0">
              <h4>Artikel Lainnya</h4>
            </div>
            @if($artikel_next->count() > 0)
            <ul style="font-size:14px">
                @foreach ($artikel_next as $right)
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
    </section>
</div>
@endsection
