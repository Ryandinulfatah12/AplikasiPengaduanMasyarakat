<div id="slide-out" class="side-nav sn-bg-4 fixed">
  <ul class="custom-scrollbar">

    <!-- Logo -->
    <li class="logo-sn waves-effect py-3">
      <div class="text-center">
        <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
      </div>
    </li>

    <!-- Search Form -->
    <li>
      <form class="search-form" role="search">
        <div class="md-form mt-0 waves-light">
          <input type="text" class="form-control py-2" placeholder="Search">
        </div>
      </form>
    </li>

    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">

        <li>
          <i class="w-fa fas fa-tachometer-alt"></i> <a href="{{route('petugas.home')}}" class="waves-effect">Dashboard</a>
        </li>
        
         @if(Auth::user()->level == 'admin' || Auth::user()->level == 'petugas')
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