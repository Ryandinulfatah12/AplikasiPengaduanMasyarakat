@extends('layouts.main')
@section('title','Detail Pengaduan')
@push('css')
<style>
	.show img{
		width: 300px;
		-webkit-background-size: cover;
		background-size: cover;
	}
</style>
@endpush
@section('content')

<section class="mt-3">
	<div class="col-md-12 animated fadeInDown show">
		<!-- Card -->
	    <div class="card card-cascade narrower">

	      <div class="view view-cascade gradient-card-header info-color">
	        <h4 class="mb-0 font-weight-500">Detail Pengaduan</h4>
	      </div>

	      <div class="card-body text-center px-4 mb-3">
	        <div class="list-group list-panel mx-auto">
	          <strong><p class="list-group-item d-flex justify-content-between dark-grey-text">NIK	: {{$show->nik}}</p></strong>
	          <strong><p class="list-group-item d-flex justify-content-between dark-grey-text">Pengadu	: {{$show->fullname}}</p></strong>
	          <strong><p class="list-group-item d-flex justify-content-between dark-grey-text">Nomor Telepon	: {{$show->telp}}</p></strong>
	          <strong><p class="list-group-item d-flex justify-content-between dark-grey-text">Pada	: {{date('d F Y - H:i', strtotime($show->created_at))}}</p><strong>
	          <p class="list-group-item d-flex justify-content-between dark-grey-text">
	          	<?php 
          			if ($show['status'] == 'pending') {
          				echo "<span class='badge badge-warning text-secondary'>Pending</span>";
          			} else if($show['status'] == 'ditanggapi') {
          				echo "<span class='badge badge-success text-secondary'>Sudah Ditanggapi</span>";
          			} else {
          				echo "<span class='badge badge-danger text-secondary'>Ditolak</span>";
          			}
          			
          		 ?>
	          </p>

	        </div>
			

			<div class="col-md-12 mt-5 animated fadeInUp show">
				<!-- Card -->
		        <div class="card mb-5">

		          <div class="row">
		          	<div class="col-md-5">
		                  <img src="{{url('storage/gambar/'.$show->foto)}}" class="card-img-top pt-5 pb-5"
		                    alt="Lampiran Anda">
		          	</div>
		          	<div class="col-md-7">
		          		<!-- Card content -->
				          <div class="card-body">
				              <div class="media-body">
				                <h5 class="mt-0"><strong>Isi Laporan</strong></h5>
				                <p>{{$show->isi_laporan}}.</p>
				              </div>
				          </div>
		          	</div>
		          </div>

		        </div>
		        <!-- Card -->
			</div>

			<div class="col animated fadeInLeft show">
				<!-- Card -->
		        <div class="card mb-5">

		          <!-- Card content -->
		          @foreach($show2 as $s)
		          <h5 class="badge badge-success">Ditanggapi Oleh	: {{$s->fullname}}</h5>
		          <div class="card-body">
		              <div class="media-body">
		                <h5 class="mt-0"><strong>Isi Tanggapan</strong></h5>
		                <p>{{$s->isi_tanggapan}}.</p>
		              </div>
		          </div>
		          @endforeach

		        </div>
		        <!-- Card -->
			</div>

	      </div>

	    </div>
	    <!-- Card -->
	    <a href="{{route('data.pengaduan')}}" class="btn btn-danger btn-block">Kembali</a>
	</div>

</section>

@endsection