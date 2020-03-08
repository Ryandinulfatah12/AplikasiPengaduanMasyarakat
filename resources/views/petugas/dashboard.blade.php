<?php 
	$mas = App\Masyarakat::all()->count();
	$ditanggapi = App\Pengaduan::where('status','ditanggapi')->count();
	$ditolak = App\Pengaduan::where('status','ditolak')->count();
	$pending = App\Pengaduan::where('status','pending')->count();
	$all = App\Pengaduan::all()->count();
	$alltanggapan = App\Tanggapan::all()->count();
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
		          <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{$mas}}</h5>
		          <p class="font-small grey-text">Data Masyarakat</p>
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
		      <div class="row">

		        <div class="col-md-5 col-5 text-left pl-4">
		          <a type="button" class="btn-floating btn-lg success-color accent-2 ml-4"><i class="fas fa-database"
		              aria-hidden="true"></i></a>
		        </div>

		        <div class="col-md-7 col-7 text-right pr-5">
		          <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{$ditanggapi}}</h5>
		          <p class="font-small grey-text">Pengaduan Ditanggapi</p>
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
		          <a type="button" class="btn-floating btn-lg danger-color accent-2 ml-4"><i class="fas fa-database"
		              aria-hidden="true"></i></a>
		        </div>

		        <div class="col-md-7 col-7 text-right pr-5">
		          <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{$ditolak}}</h5>
		          <p class="font-small grey-text">Pengaduan Ditolak</p>
		        </div>

		      </div>
		      <!-- Card Data -->

		    </div>
		    <!-- Card --> 
		</div>
	</div>
	<div class="col-md-12 animated fadeInLeft">
		<div class="row">

			<div class="col-md-7">
				<div class="card card-cascade narrower">
		          <div class="view view-cascade gradient-card-header blue">
		            <h5 class="mb-0">Pengaduan & Tanggapan</h5>
		          </div>
		          <div class="card-body card-body-cascade text-center">
		            <canvas id="myBarChart"></canvas>
		          </div>
		        </div>
			</div>

			<div class="col-md-5">
				<div class="card card-cascade narrower">
		          <div class="view view-cascade gradient-card-header blue">
		            <h5 class="mb-0">Grafik Pie</h5>
		          </div>
		          <div class="card-body card-body-cascade text-center">
		            <canvas id="myPieChart"></canvas>
		          </div>
		        </div>
			</div>
		</div>
        
	</div>


</section>
@endsection

@push('js')
<!-- PIE CHART -->
<?php 
	$data = "'$ditanggapi','$ditolak'";

	$bar = "'$all','$pending','$alltanggapan'";
 ?>
 <script type="text/javascript">
 	var data = [<?= $data ?>];
 	var bar = [<?= $bar ?>];
 </script>
 <!-- END PIE CHART -->

<script src="{{url('material/js/Chart.min.js')}}"></script>
<script src="{{url('material/js/chart-bar-demo.js')}}"></script>
<script src="{{url('material/js/chart-pie-demo.js')}}"></script>
@endpush