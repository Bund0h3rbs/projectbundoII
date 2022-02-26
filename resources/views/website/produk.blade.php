@extends('template.website')

@section('content')

<style>
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
</style>

<main id="main" data-aos="fade-up">
     <section class="breadcrumbs">
         <div class="container">

           <div class="d-flex justify-content-between align-items-center">
             <h2>Produk</h2>
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
             <div class="col-lg-12">
                 <!-- <div class="card"> -->
                     <!-- <div class="card-header">
                         <h5 class="text-title"><b> PRODUK TERLARIS</b></h5>
                     </div> -->
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
             </div>
         </div>
         </div>
       </section>
</main>
@endsection
