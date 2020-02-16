@extends('layouts.main')
@section('title','Entri Verifikasi')
@section('content')

<section class="mt-3">
	<h1>Entri Verifikasi Pengaduan</h1>
	<div class="col-md-12">
	    <div class="card">
	        <div class="card-body">
	          <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
	            <thead>
	              <tr>
	                <th>No</th>
	                <th>Dari</th>
	                <th>Tanggal Dibuat</th>
	                <th>Aksi</th>
	              </tr>
	            </thead>
	            <tbody>
	            	@foreach($entri as $en)
	              <tr>
	              	<td>{{$loop->iteration}}</td>
	              	<td>{{$en->fullname}}</td>
	              	<td>{{$en->created_at}}</td>
	              	<td>
	              		<a href="{{route('getEntri', ['id' => $en->id])}}" class="btn btn-success btn-sm">Tanggapi</a>
	              		<a href="{{route('tolak.entri', ['id' =>$en->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Tolak Pengaduan Ini?')">Tolak</a>
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