<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 >
        <!-- <a href="index.html">BizLand<span>.</span></a> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html"c>
        <img src="{{ asset('img/bundo.png') }}" alt="" width="130px"></a>
      </h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{url('')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{url('artikel')}}">Artikel</a></li>
          <li><a class="nav-link scrollto" href="{{url('produk')}}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{url('join_us')}}">Join Us</a></li>
          <li><a class="nav-link scrollto" href="{{url('about')}}">About</a></li>
          <li><a class="nav-link scrollto" href="{{url('contact_me')}}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>
