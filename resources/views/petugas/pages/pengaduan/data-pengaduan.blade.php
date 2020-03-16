@extends('layouts.main')
@section('title','Riwayat Data Pengaduan')
@section('content')

<section class="mt-3">
	<h1>Ikhtisar Data Pengaduan</h1>
	<div class="col-lg-12">
		<a href="{{route('pengaduan.pdf')}}" class="btn btn-danger">Export PDF</a>
	    <div class="card">
	        <div class="card-body">
	          <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
	            <thead>
	              <tr>
	                <th>No</th>
	                <th>Dari</th>
	                <th>NIK</th>
	                <th>Tanggal Dibuat</th>
	                <th>Status</th>
	                <th>Aksi</th>
	              </tr>
	            </thead>
	            <tbody>
	        	@foreach($pengaduan as $pd)
	              <tr>
	              	<td>{{$loop->iteration}}</td>
	              	<td>{{$pd->fullname}}</td>
	              	<td>{{$pd->nik}}</td>
	              	<td>{{date('d F Y H:i',strtotime($pd->created_at))}}</td>
	              	<td>
	              		<?php 
	              			if ($pd['status'] == 'pending') {
	              				echo "<span class='badge badge-warning text-secondary'>Pending</span>";
	              			} else if($pd['status'] == 'ditanggapi') {
	              				echo "<span class='badge badge-success text-secondary'>Sudah Ditanggapi</span>";
	              			} else {
	              				echo "<span class='badge badge-danger text-secondary'>Ditolak</span>";
	              			}
	              			
	              		 ?>
	              	</td>
	              	<td>
	              		@if($pd['status'] == 'ditanggapi')
	              		<a href="{{route('show.pengaduan',['id'=>$pd->id])}}" class="btn btn-success btn-sm">Detail</a>
	              		@else
	              		<a href="{{route('verifikasi')}}" class="btn btn-warning btn-sm">Belum Ditanggapi</a>
	              		@endif
	              	</td>
	              </tr>
	              @endforeach
	            </tbody>
	          </table>
	        </div>
	      </div>
	  </div>
</section>

@endsection