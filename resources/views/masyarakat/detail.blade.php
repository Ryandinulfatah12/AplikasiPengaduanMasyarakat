@extends('layouts.main')
@section('title','Detail Pengaduan')

@section('content')

<section class="mt-3">
	<div class="col-md-12 animated fadeInDown">
		<div class="card card-cascade wider card-transparent">
          <div class="view view-cascade gradient-card-header peach-gradient">
            <h2 class="card-header-title mb-2">Detail Pengaduan</h2>
            <p class=""><i class="fas fa-calendar"></i> Detail Data Pengaduan</p>
          </div>
          <div class="card-body card-body-cascade ext-center">
			
			<div class="row">
				<div class="col-md-6">
					<!-- Card -->
		             <div class="card">

		                <!-- Card image -->
		                <div class="view">
		                  <img src="{{url('storage/gambar/'.$show->foto)}}" class="card-img-top"
		                    alt="Lampiran Anda">
		                  
		                  <a class="img-responsive" href="{{url('storage/gambar/'.$show->foto)}}" data-lightbox="1" data-title="Bukti/Lampiran Foto">
		                    <div class="mask"></div>
		                  </a>
		                </div>

		                <!-- Card content -->
		                <div class="card-body">
		                  <!-- Title -->
		                  <h5 class="card-title">Isi Pengaduan <span class="badge badge-light">Dari : {{$show->fullname}}</span></h5>
		                  <hr>
		                  <!-- Text -->
		                  <p>{{$show->isi_laporan}}
		                  </p>
		                </div>

		             </div>
		             <!-- Card -->
				</div>
				<div class="col-md-6">
					<div class="card">
		                <!-- Card content -->
		                <div class="card-body">
		                  <!-- Title -->
		                  @foreach($show2 as $sh)
		                  <h5 class="card-title">Tanggapan <span class="badge badge-light">Dari : {{$sh->fullname}}</span></h5>
		                  <hr>
		                  <p>{{$sh->isi_tanggapan}}
		                  </p>
		                  @endforeach
		                </div>

		             </div>
		             <!-- Card -->
					<a href="{{route('masyarakat.dashboard')}}" class="btn btn-danger btn-block">Kembali</a>
				</div>
			</div>
          </div>
          <!-- Card content -->

        </div>
		
	</div>
</section>

@endsection