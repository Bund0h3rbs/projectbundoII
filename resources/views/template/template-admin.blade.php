<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/logo-mini.svg')}}" />
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shoping.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">


        <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>

        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{asset('js/admin.js')}}"></script>

        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    </head>
  <style>
    .table-head{
        width: 100%;
        font-family: inherit;
    }
    .table-head th{
        text-align: center;
    }
    .table-head th{
        padding:10px;
        font-size:0.9em;
    }

    .table-head td{
        padding:0.4em;
    }
    .loader{
            position:fixed;
            top:0;
            bottom:0;
            left:0;
            right:0;
            width:100%;
            height:100%;
            background: rgba(255, 253, 253, 0.6);
            padding:20% 10% 0% 45%;
            z-index:999999;
        }
    .img_load{
        width:20%;
    }
    @media only screen and (max-width: 600px) {
        .loader{
            padding:30% 20% 0% 35%;
        }
        .img_load{
            width:50%;
        }
    }
 </style>
<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
          {{-- <div class="preloader flex-column justify-content-center align-items-center">
              <img class="animation__shake" src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
          </div> --}}

          <nav class="main-header navbar navbar-expand  navbar-dark bg-primary">
              @include('template.adm-header')
          </nav>

          <aside class="main-sidebar sidebar-light-primary elevation-4">
              <!-- Brand Logo -->
              <a href="{{url('home')}}" class="brand-link bg-primary">
                {{-- <img src="{{ asset('img/favicon.png')}}" alt="VIEHS" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">&nbsp; Administrator</span>
              </a>
              <div class="sidebar">
                  @include('template.adm-menus-left')
              </div>
          </aside>
          <div class="content-wrapper">
              <div class="content-header text-sm">
                  <div class="container-fluid ">
                    <div class="row mb-2">
                      <div class="col-sm-6 ">
                        <h4 class="m-0 ">{{$title_header ?? null}}</h4>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                          <li class="breadcrumb-item active">{{ Route::currentRouteName() }}</li>
                        </ol>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                  <hr>
              </div>


              <section class="content">
                  <div class="container-fluid">
                    @yield('content')
                  </div>
              </section>
          </div>
          @include('template.adm-side-profile')
          {{-- Footer --}}
          <footer class="main-footer text-sm">
              <strong>Copyright &copy; 2021 <a href="javascript:;">VIEHS</a>.</strong>
              All rights reserved.
              <div class="float-right d-none d-sm-inline-block">
                <b>Ver</b> 1.0
              </div>
          </footer>


    </div>
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
</body>
</html>
