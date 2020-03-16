<div id="slide-out" class="side-nav sn-bg-4 fixed">
  <ul class="custom-scrollbar">

    <!-- Logo -->
    <li class="logo-sn waves-effect py-3">
      <div class="text-center">
        <a href="#" class="pl-0"><img src="{{url('material/img/logo.jpg')}}" width="100"></a>
      </div>
    </li>

    <hr>

    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">
        @if(!Auth::user()->level == 'admin' || !Auth::user()->level == 'petugas')
        <li>
          <a href="{{route('masyarakat.dashboard')}}" class="waves-effect">Dashboard</a>
        </li>
        @endif
        
         @if(Auth::user()->level == 'admin' || Auth::user()->level == 'petugas')
         <li>
          <a href="{{route('petugas.home')}}" class="waves-effect">Dashboard Petugas</a>
        </li>
        <li>
          <a class="collapsible-header waves-effect arrow-r">Data Master<i class="fas fa-angle-down rotate-icon"></i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="{{route('data.petugas')}}" class="waves-effect">Data Petugas</a>
              </li>
              <li>
                <a href="{{route('data.mas')}}" class="waves-effect">Data Masyarakat</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="{{route('verifikasi')}}" class="waves-effect">Entri Verifikasi</a>
        </li>
        <li>
          <a href="{{route('data.pengaduan')}}" class="waves-effect">Laporan Pengaduan</a>
        </li>
        @endif

      </ul>
    </li>
    <!-- Side navigation links -->

  </ul>

  <div class="sidenav-bg mask-strong"></div>

</div>