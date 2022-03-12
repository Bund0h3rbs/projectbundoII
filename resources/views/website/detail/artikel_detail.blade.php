@extends('template.website')

@section('content')
<style>
    .page_art_bottom{
        /* margin-top:-20px; */
        background: #f4f4f47c;
        padding:5px;
        /* position: fixed; */
        /* width: 28.33%; */
        /* border:0.8px solid rgba(189, 189, 189, 0.507);
        border-radius:5px; */
    }
    .page-img{
         width:80%;
         max-height: 200px;
         margin-left: 10px;
         margin-right: 10px;
    }
    .text-page{
        font-size:0.9em;
    }
</style>
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
            <div class="row">
            <div class="col-lg-12 breadcrumbs p-2 mb-2">
                <h5>Artikel Yang Terkait</h5>
            </div>
            <div class="clearfix"></div>
                <div class="col-lg-4 col-5 ">
                    @if($prev_artikel)
                    @php
                        $img_prev = asset('img/bundo.png');
                        if($prev_artikel->fileimage){
                            $img_prev = asset('img/artikel/'.$prev_artikel->fileimage);;
                        }
                    @endphp
                    <a href="{{url('artikel/detail/'.$prev_artikel->id)}}">
                    <div class="card-body p-0">
                        <img src="{{ $img_prev }}" class="page-img">
                        <div class="page_art_bottom text-sm">
                            <dt class="text-page">{{$prev_artikel->name ?? null}}</dt>
                            <span style="font-size:0.8em">{{$prev_artikel->publish_date}} -
                                <b class="text-success">{{$prev_artikel->personal->name ?? null}}</b>
                            </span>
                            {{-- <span class="product-light text-sm">Sebelumnya</span> --}}
                        </div>
                    </div>
                    </a>
                    @endif
                </div>

                <div class="col-lg-4 col-2"></div>
                <div class="col-lg-4 col-5">
                    @if($next_artikel)
                    @php
                        $img_next = asset('img/bundo.png');
                        if($next_artikel->fileimage){
                            $img_next = asset('img/artikel/'.$next_artikel->fileimage);;
                        }

                    @endphp
                     <a href="{{url('artikel/detail/'.$next_artikel->id)}}">
                    <div class="card-body p-0">
                        <img src="{{$img_next}}" class="page-img">
                        <div class="page_art_bottom text-sm">
                            <dt class="text-page">{{$next_artikel->name ?? null}}</dt>
                            <span style="font-size:0.8em">{{$next_artikel->publish_date}} -
                                <b class="text-success">{{$next_artikel->personal->name ?? null}}</b>
                            </span>
                            {{-- <span class="product-light text-sm">Selanjutnya</span> --}}
                        </div>
                    </div>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- Bagian Kanan --}}
        <div class="col-lg-4">
            <div class="section-title pb-0">
              <h5>Artikel Lainnya</h5>
              <hr>
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
            <div class="section-title p-0">
                <hr>
                <h5>Kategori Artikel</h5>
                <hr>
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
