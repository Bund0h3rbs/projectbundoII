@extends('template.website')

@section('content')



<main id="main" data-aos="fade-up">
     <section class="breadcrumbs">
         <div class="container">
           <div class="d-flex justify-content-between align-items-center">
             <h2>Produk</h2>
             <ol>
               <li><a href="{{'/'}}">Home</a></li>
               <li>produk</li>
             </ol>
           </div>
         </div>
       </section><!-- End Breadcrumbs -->

       <section class="inner-page">
         <div class="container">
            <div class="row">
                @if($produk_all->count()> 0)
                @foreach ($produk_all as $new)
                    @php
                        $filename = isset($new->fileimage) ? $new->fileimage : null;
                        $description = isset($new->description) ? htmlspecialchars_decode($new->description) : null;
                        if($filename){
                            $path = asset('img/produk/'.$filename);
                        }else{
                            $path = asset('img/bundo.png');
                        }
                    @endphp
                <div class="col-lg-2 col-6 p-1">
                    <a  href="{{url('produk/detail/'.$new->id)}}" class="card" style="border-radius:5px">
                        <div class="card-body">
                            <img src="{{$path}}" class="img-responsive product-img">
                            <div class="text-sm" >
                                <span class="product-light">{{$new->produk_ref->name ?? null}}</span>
                                <div class="product-title-ket">
                                    <h5 class="product-title">
                                        {{$new->name ?? null}}
                                    </h5>
                                </div>
                                <p class="text-judul">{{$new->description ?? null}}</p>
                                <span class="btn btn-success btn-sm text-sm">Detail Produk</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @else
                <div class="alert alert-danger">
                    <div class="row">
                        <div class="col-lg-1 col-3 text-center">
                            <i class="bi bi-exclamation-triangle" style="font-size:2em"></i>
                        </div>
                        <div class="col-lg-10 col-9">
                            Maaf Produk Belum Diupdate
                        </div>
                    </div>
                </div>
                @endif
            <div>

             {{-- <div class="row">
                     <div class="card-body">
                         <div class="row">
                         <div class="col-lg-3 col-6">
                             <a href="#" class="card">
                                 <div class="card-body">
                                     <img src="{{asset('img/produk/lengkuas.jpg')}}" class="img-responsive product-img">
                                     <div class="text-sm" >
                                         <span class="product-light">Lengkuas</span>
                                         <div class="product-title-ket">
                                             <h5 class="product-title">
                                                 Lengkuas
                                             </h5>
                                         </div>
                                         <p class="text-judul">Lengkuas Tipe Super</p>
                                         <span class="product-price">Rp 90.000</span>
                                         <span class="product-light">/Kg</span>
                                     </div>
                                 </div>
                             </a>
                         </div>
                         <div class="col-lg-3 col-6">
                             <a href="#" class="card">
                                 <div class="card-body">
                                     <img src="{{asset('img/produk/cengkeh.jpg')}}" class="img-responsive product-img">
                                     <div class="text-sm" >
                                         <span class="product-light">Cengkeh</span>
                                         <div class="product-title-ket">
                                             <h5 class="product-title">
                                                 Cengkeh Sumatera
                                             </h5>
                                         </div>
                                         <p class="text-judul">Cengkeh Kualitas Terbaik, tanpa ampas</p>
                                         <span class="product-price">Rp 150.000</span>
                                         <span class="product-light">/Kilo</span>
                                     </div>
                                 </div>
                             </a>
                         </div>
                         <div class="col-lg-3 col-6">
                             <a href="#" class="card">
                                 <div class="card-body">
                                     <img src="{{asset('img/produk/kunyit.jpg')}}" class="img-responsive product-img">
                                     <div class="text-sm" >
                                         <span class="product-light">Kunyit</span>
                                         <div class="product-title-ket">
                                             <h5 class="product-title">
                                             Kunyit
                                             </h5>
                                         </div>
                                         <p class="text-judul">=</p>
                                         <span class="product-price">Rp. 60.000</span>
                                         <span class="product-light">/Kg</span>
                                     </div>
                                 </div>
                             </a>
                         </div>
                         <div class="col-lg-3 col-6">
                             <a href="#" class="card">
                                 <div class="card-body">
                                     <img src="{{asset('img/produk/serai.jpg')}}" class="img-responsive product-img">
                                     <div class="text-sm" >
                                         <span class="product-light">Serai</span>
                                         <div class="product-title-ket">
                                             <h5 class="product-title">
                                                 Serai
                                             </h5>
                                         </div>
                                         <p class="text-judul">=</p>
                                         <span class="product-price">Rp 9.000</span>
                                         <span class="product-light">/Kg</span>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </div>
                     <!-- </div> -->
                 </div>
             </div> --}}
         </div>
       </section>
</main>
@endsection
