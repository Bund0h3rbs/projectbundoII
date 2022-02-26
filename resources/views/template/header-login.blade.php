<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ Route::currentRouteName() }}</title>

       {{-- Laravel Mix - CSS File --}}

       {{-- <link rel="stylesheet" href="{{ mix('css/pegawai.css') }}"> --}}
       <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css')}}">
       <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">


<style>
    .divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}
.h-custom {
  height: calc(100% - 73px);
}
@media (max-width: 450px) {
  .h-custom {
    height: 100%;
  }
}
</style>
<script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
    <body>
        @yield('content')
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/pegawai.js') }}"></script> --}}
    </body>
</html>
