@extends('layouts.main')
@section('title','Masyarakat')
@section('content')

<section>
	<h1>Dashboard Masyarakat</h1>
	<a href="{{route('buat.pengaduan')}}" class="btn btn-primary btn-block">Buat Pengaduan Baru</a>
</section>

@endsection