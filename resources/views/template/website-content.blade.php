@if(Request::is(['/*']))
  <div class="content">
  <br/>
      <div class="container  wd-lg-9">
          @yield('content')
      </div>
  </div>
@else
  <div class="content-header">
    <br>
      <div class="container wd-lg-9">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item "><a href="{{url('/')}}">
              <i class="fas fa-home text-orange"></i><span class="text-orange"> Home</span></a></li>
              <li class="breadcrumb-item"><a href="#"><span class="text-orange">Layout</span></a></li>
              <li class="breadcrumb-item active">{{ Route::currentRouteName() }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
      <div class="content">
      <div class="container  wd-lg-9">
          @yield('content')
      </div>
  </div>
@endif