@extends('layouts.main')
@section('title','Masyarakat')
<!-- Main Navigation -->
  <header>
    <!-- Intro Section -->
    <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('material/img/pengaduan3.png'); background-repeat: no-repeat; background-size: cover; background-position: center center; height: 100%;">
      <div class="mask rgba-black-light">
        <div class="container h-100 d-flex justify-content-center align-items-center">
          <div class="row pt-5 mt-3">
            <div class="col-md-12">
              <div class="text-center">
                <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-3 wow fadeInDown" data-wow-delay="0.3s"><strong>Pengaduan Masyarakat</strong></h1>
                <hr class="hr-light mt-4 wow fadeInDown" data-wow-delay="0.4s">
                <h5 class="text-uppercase mb-5 white-text wow fadeInDown" data-wow-delay="0.4s"><strong>Selamat Datang {{Auth::user()->fullname}}</strong></h5>
                <a href="{{route('buat.pengaduan')}}" class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">Buat Pengaduan Baru</a>
                <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">About me</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>
  <!-- Main Navigation -->

  <!-- Main layout -->
  <main>

    <div class="container">

      <!-- Section: Blog v.3 -->
      <section class="my-5 text-center text-lg-left wow fadeIn" data-wow-delay="0.3s">

        <!-- Section heading -->
        <h2 class="text-center my-5 h1">Riwayat Pengaduan Anda</h2>

        @if($riwayat->isEmpty())
        <h4 class="text-center">Belum ada Riwayat Pengaduan di Akun ini...</h4>  
        @else
        <!-- Grid row -->
        @foreach($riwayat as $rw)
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-4 mb-4">
            <!-- Featured image -->
            <div class="view overlay z-depth-1">
              <img src="{{url('storage/gambar/'.$rw->foto)}}" class="img-fluid" alt="First sample image">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-7 mb-4">
            <!-- Excerpt -->
            <a class="teal-text">
              <h6 class="pb-1"><strong> <?php 
              		if ($rw['status'] == 'pending') {
          				echo "<span class='badge badge-warning text-secondary'>Pending</span>";
          			} else if($rw['status'] == 'ditanggapi') {
          				echo "<span class='badge badge-success text-secondary'>Sudah Ditanggapi</span>";
          			} else {
          				echo "<span class='badge badge-danger text-secondary'>Ditolak</span>";
          			}
               ?> </strong></h6>
            </a>
            <h4 class="mb-4"><strong>Isi Laporan</strong></h4>
            <p>{{$rw->isi_laporan}}</p>
            <p>Pada : {{date('d F Y H:i', strtotime($rw->created_at))}}</p>

            @if($rw['status'] == 'ditanggapi')
            <a class="btn btn-primary btn-sm" href="{{route('detail.pengaduan2', ['id' => $rw->id])}}">Detail</a>
            @else
            <span class="badge badge-warning">Belum Ditanggapi</span>
            @endif

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <hr class="mb-5">
        @endforeach
        @endif


      </section>

    </div>

  </main>
  <!-- Main layout -->
