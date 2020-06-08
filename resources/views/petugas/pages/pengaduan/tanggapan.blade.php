@extends('layouts.main')
@section('title','Buat Tanggapan')
@section('content')

<section class="mt-3">
	<div class="col-md-12 animated fadeInDown">
		<div class="card card-cascade wider card-transparent">
          <div class="view view-cascade gradient-card-header peach-gradient">
            <h2 class="card-header-title mb-2">Buat Tanggapan Baru</h2>
            <p class=""><i class="fas fa-calendar"></i> Silahkan Tulis Tanggapan Anda</p>
          </div>
          <div class="card-body card-body-cascade ext-center">
          	@if(session('info') == 1)
          	<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Terkirim!</h4>
			  <p>Tanggapan Anda Berhasil Dikirimkan.</p>
			  <hr>
			  <a href="{{route('clear.tanggapan',['id' =>$entri->id])}}" class="btn btn-success btn-block">Bersihkan Tanggapan</a>
			</div>
			@endif
			
			<div class="row">
				<div class="col-md-7">
					<!-- Card -->
		             <div class="card">

		                <!-- Card image -->
		                <div class="view overlay zoom z-depth-1">
							<img src="{{url('storage/gambar/'.$entri->foto)}}" class="img-fluid" alt="First sample image">
							<div class="mask flex-center rgba-indigo-strong">
							  <p class="white-text">Lampiran Foto</p>
							</div>
						</div>

		                <!-- Card content -->
		                <div class="card-body">
		                  <!-- Title -->
		                  <h4 class="card-title">Isi Pengaduan</h4>
		                  <!-- Text -->
		                  <p class="card-text">{!! $entri->isi_laporan !!}
		                  </p>
		                </div>

		             </div>
		             <!-- Card -->
				</div>
				<div class="col-md-5">
					<div class="card">
						<div class="card-header bg-primary">
							<h5 class="card-title text-white">Tuliskan Tanggapan Anda</h5>
						</div>
						<div class="card-body">
							<form action="{{route('kirim.tanggapan')}}" method="POST">
								@csrf
								<input type="hidden" name="pengaduan_id" value="{{$entri->id}}">
								<input type="hidden" name="petugas_id" value="{{Auth::user()->id}}">
								<div class="md-form">
						            <textarea name="isi_tanggapan" id="textarea-char-counter" class="md-textarea form-control" rows="3" length="300" required></textarea>
						            
					            </div>
					            <button type="submit" class="btn btn-primary btn-block" >Kirim Tanggapan</button>
					            <a href="{{route('verifikasi')}}" class="btn btn-danger btn-block">Kembali</a>
							</form>

						</div>
					</div>
				</div>
			</div>
          </div>
          <!-- Card content -->

        </div>
		
	</div>
</section>

@endsection

@push('js')
<script src="{{url('material/js/vendor/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
	tinymce.init({
		selector:'textarea',
		menubar: false,
		inline_styles: true
	});
</script>
@endpush