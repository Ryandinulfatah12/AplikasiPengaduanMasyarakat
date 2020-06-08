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
              <div class="text-center bg-primary p-4 rounded hoverable">
                <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-3 wow fadeInDown" data-wow-delay="0.3s"><strong>Pengaduan Masyarakat</strong></h1>
                <hr class="hr-light mt-4 wow fadeInDown" data-wow-delay="0.4s">
                <h5 class="text-uppercase mb-5 white-text wow fadeInDown" data-wow-delay="0.4s"><strong>Selamat Datang {{Auth::user()->fullname}}</strong></h5>
                <a href="{{route('buat.pengaduan')}}" class="btn btn-outline-white hoverable wow fadeInDown" data-wow-delay="0.4s">Buat Pengaduan Baru</a>
                <a class="btn btn-outline-white hoverable wow fadeInDown" data-toggle="modal" data-target="#centralModalFluidSuccessDemo" data-wow-delay="0.4s">About me</a>
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
            <div class="view overlay zoom z-depth-1">
              <img src="{{url('storage/gambar/'.$rw->foto)}}" class="img-fluid" alt="First sample image">
              <div class="mask flex-center rgba-indigo-strong">
                <p class="white-text">Lampiran Foto</p>
              </div>
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
            <p>{!! $rw->isi_laporan !!}</p>
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

  @push('modal')
  <div class="modal fade" id="centralModalFluidSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fluid modal-notify modal-success" role="document">
    <!-- Content -->
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <p class="heading lead">Modal Success</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam
            blanditiis ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat.
            Esse ratione fuga, enim, ab officiis totam.
          </p>
        </div>
        <ul class="list-group z-depth-0">
          <li class="list-group-item justify-content-between">
            Cras justo odio
            <span class="badge badge-primary badge-pill">14</span>
          </li>
          <li class="list-group-item justify-content-between">
            Dapibus ac facilisis in
            <span class="badge badge-primary badge-pill">2</span>
          </li>
          <li class="list-group-item justify-content-between">
            Morbi leo risus
            <span class="badge badge-primary badge-pill">1</span>
          </li>
          <li class="list-group-item justify-content-between">
            Cras justo odio
            <span class="badge badge-primary badge-pill">14</span>
          </li>
          <li class="list-group-item justify-content-between">
            Dapibus ac facilisis in
            <span class="badge badge-primary badge-pill">2</span>
          </li>
          <li class="list-group-item justify-content-between">
            Morbi leo risus
            <span class="badge badge-primary badge-pill">1</span>
          </li>
        </ul>
      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <a type="button" class="btn btn-success">Get it now <i class="far fa-gem ml-1"></i></a>
        <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
      </div>
    </div>
    <!-- Content -->
  </div>
</div>   
  @endpush