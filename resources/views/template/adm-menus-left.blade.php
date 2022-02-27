<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('/img/favicon.png')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{Auth::user()->name ?? null}}</a>
    </div>
</div>

<nav class="mt-2 text-sm">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      {!! \App\Libs\Appmenus::instance()->getMenu() !!}
      <!--<li class="nav-header">-</li>-->
      <li class="nav-header"></li>
      <li class="nav-header">Bundoherbs &copy;{{ date('Y')}} </li>

      {{-- <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Pengaturan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <div class="ml-2">
                <a href="{{url('usr_adm')}}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Pengguna</p>
                </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="ml-2">
            <a href="{{url('usr_hakakses')}}" class="nav-link">
               <i class="fas fa-user-lock nav-icon"></i>
              <p>Hak Akses</p>
            </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{url('lokasi')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Wilayah Administratif</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Master Produk
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('type_brg')}}" class="nav-link">
              <i class="far fa-copy nav-icon"></i>
              <p>Type Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('daftar_brg')}}" class="nav-link">
              <i class="far fa-copy nav-icon"></i>
              <p>Daftar Barang</p>
            </a>
          </li>

        </ul>
      </li> --}}
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Vendor / Klien
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('type_brg')}}" class="nav-link">
              <i class="far fa-copy nav-icon"></i>
              <p>Type Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('klien_list')}}" class="nav-link">
              <i class="far fa-copy nav-icon"></i>
              <p>Daftar Klien</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Inventory Management
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('type_brg')}}" class="nav-link">
              <i class="fas fa-external-link nav-icon"></i>
              <p>Transaksi Penjualan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('type_brg')}}" class="nav-link">
                      <i class="far fa-envelope nav-icon"></i>
                      <p>Pesananan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('type_brg')}}" class="nav-link">
                      <i class="far fa-clock nav-icon"></i>
                      <p>Riwayat Pesananan</p>
                    </a>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-internal-link nav-icon"></i>
              <p>Transaksi Klien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('type_brg')}}" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Pengadaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('type_brg')}}" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Riwayat Pengadaan</p>
                    </a>
                </li>
            </ul>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-th"></i>
          <p> Lain - Lain</p>
        </a>
      </li>
    </ul>
</nav>
