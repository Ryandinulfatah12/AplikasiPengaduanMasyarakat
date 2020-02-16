<?php 
  $adu = App\Pengaduan::where('status','pending')->get();
 ?>
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

  <!-- SideNav slide-out button -->
  <div class="float-left">
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
  </div>

  <!-- Breadcrumb -->
  <div class="breadcrumb-dn mr-auto">
    <p>Pengaduan Masyarakat</p>
  </div>

  <div class="d-flex change-mode">
    <!-- Navbar links -->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
      @if(Auth::user()->level == 'admin' || Auth::user()->level == 'petugas')
      <li class="nav-item">
        <a class="nav-link waves-effect" href="{{route('verifikasi')}}"><i class="fas fa-envelope"></i> <span class="badge badge-warning">{{$adu->count()}}</span> <span
            class="clearfix d-none d-sm-inline-block">Pengaduan Datang</span></a>
      </li>
      @endif
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{Auth::user()->fullname}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">My account</a>
          <a class="dropdown-item" href="{{route('logout')}}">Log Out</a>
        </div>
      </li>

    </ul>

</nav>