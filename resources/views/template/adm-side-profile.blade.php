<aside class="control-sidebar control-sidebar-light text-sm">
  <div class="p-3 control-sidebar-content">
     <h5>Profile</h5>
     <div class="card-primary card-outline p-0">
        <div class="card-body box-profile p-1">
            <br>
            <div class="user-block mb-3">
                <img class="img-circle img-bordered-sm" src="{{asset('img/favicon.png')}}" alt="user image">
                <span class="username">
                <a href="#">{{Auth::user()->name ?? null}}</a>
                </span>
                <span class="description">Software Engineer</span>
            </div>

            <div class="clearfix"></div>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item p-0">
                    <a href="#" class="nav-link" style="color:#000">
                        <i class="fas fa-cog"></i> <span >Pengaturan Profile</span>
                    </a>
                </li>
                {{-- <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
                </li> --}}
            </ul>

            <a class="btn btn-info btn-block"  href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <b><i class="fas fa-power-off"></i> Logout</b>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
         </div>
         <!-- /.card-body -->
     </div>
  </div>
 </aside>
