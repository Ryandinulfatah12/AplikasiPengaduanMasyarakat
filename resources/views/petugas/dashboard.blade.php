<?php 
	$petugas = App\Pengurus::all();
	$pengaduan = App\Pengaduan::all();
	$tanggapan = App\Tanggapan::all();
 ?>
@extends('layouts.main')
@section('title','Petugas')
@section('content')


<section>
	<h1>Halaman Petugas</h1>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4 animated fadeInDown">
			<!-- Card -->
		    <div class="card">

		      <!-- Card Data -->
		      <div class="row mt-3">

		        <div class="col-md-5 col-5 text-left pl-4">
		          <a type="button" class="btn-floating btn-lg primary-color accent-2 ml-4"><i class="fas fa-eye"
		              aria-hidden="true"></i></a>
		        </div>

		        <div class="col-md-7 col-7 text-right pr-5">
		          <h5 class="ml-4 mt-4 mb-2 font-weight-bold">4,567</h5>
		          <p class="font-small grey-text">Unique Visitor</p>
		        </div>

		      </div>
		      <!-- Card Data -->

		    </div>
		    <!-- Card --> 
		</div>

		<div class="col-xl-3 col-md-6 mb-4 animated fadeInUp">
			<!-- Card -->
		    <div class="card">

		      <!-- Card Data -->
		      <div class="row mt-3">

		        <div class="col-md-5 col-5 text-left pl-4">
		          <a type="button" class="btn-floating btn-lg blue accent-2 ml-4"><i class="fas fa-user"
		              aria-hidden="true"></i></a>
		        </div>

		        <div class="col-md-7 col-7 text-right pr-5">
		          <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{$petugas->count()}}</h5>
		          <p class="font-small grey-text">Data Petugas</p>
		        </div>

		      </div>
		      <!-- Card Data -->

		    </div>
		    <!-- Card --> 
		</div>

		<div class="col-xl-3 col-md-6 mb-4 animated fadeInDown">
			<!-- Card -->
		    <div class="card">

		      <!-- Card Data -->
		      <div class="row mt-3">

		        <div class="col-md-5 col-5 text-left pl-4">
		          <a type="button" class="btn-floating btn-lg red accent-2 ml-4"><i class="fas fa-database"
		              aria-hidden="true"></i></a>
		        </div>

		        <div class="col-md-7 col-7 text-right pr-5">
		          <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{$pengaduan->count()}}</h5>
		          <p class="font-small grey-text">Data Pengaduan</p>
		        </div>

		      </div>
		      <!-- Card Data -->

		    </div>
		    <!-- Card --> 
		</div>

		<div class="col-xl-3 col-md-6 mb-4 animated fadeInUp">
			<!-- Card -->
		    <div class="card">

		      <!-- Card Data -->
		      <div class="row mt-3">

		        <div class="col-md-5 col-5 text-left pl-4">
		          <a type="button" class="btn-floating btn-lg success-color accent-2 ml-4"><i class="fas fa-database"
		              aria-hidden="true"></i></a>
		        </div>

		        <div class="col-md-7 col-7 text-right pr-5">
		          <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{$tanggapan->count()}}</h5>
		          <p class="font-small grey-text">Data Tanggapan</p>
		        </div>

		      </div>
		      <!-- Card Data -->

		    </div>
		    <!-- Card --> 
		</div>
	</div>
	<div class="col-md-12 animated fadeInLeft">
		<!-- Card -->
        <div class="card card-cascade narrower">

          <!-- Card image -->
          <div class="view view-cascade gradient-card-header blue">
            <h5 class="mb-0">Pengaduan & Tanggapan</h5>
          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body card-body-cascade text-center">

            <canvas id="barChart" height="200px"></canvas>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->
	</div>
	



</section>
@endsection

@push('js')
<script>
var ctxB = document.getElementById("barChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
  type: 'bar',
  data: {
    labels: ["Pengaduan Diterima", "Pengaduan Ditolak"],
    datasets: [{
      label: 'Data Pengaduan',
      data: {!!json_encode($chart)!!},
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)'
      ],
      borderWidth: 1
    }]
  },
  optionss: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
@endpush