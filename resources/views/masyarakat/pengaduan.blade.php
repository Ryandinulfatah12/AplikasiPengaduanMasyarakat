@extends('layouts.main')
@section('title','Tulis Pengaduan Baru')
@section('content')

<section>
	<div class="col-md-12 animated fadeInUp">
		<div class="card card-cascade wider card-transparent">
          <div class="view view-cascade gradient-card-header blue-gradient">
            <h2 class="card-header-title mb-2">Tulis Pengaduan Baru</h2>
            <p class=""><i class="fas fa-calendar"></i> Silahkan Tulis topik Pengaduan anda</p>
          </div>
          <div class="card-body card-body-cascade ext-center">
			<form method="POST" action="{{route('post.pengaduan')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="masyarakat_id" value="{{Auth::user()->id}}">
			    <div class="md-form">
                  <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left">
                      <span>Choose file</span>
                      <input type="file" name="foto"
						class="form-control {{ $errors->has('foto')?'is-invalid':'' }} "
						accept="image/*" 
						value="{{ old('foto') }}"
						>
                    </div>
                    <div class="file-path-wrapper">
                      <input type="file" id="iGambar" name="foto">
                    </div>
                  </div>
                </div>
				      
			    <input type="hidden" name="status" value="pending">

			    <div class="md-form">
		            <textarea name="isi_laporan" id="textarea-char-counter" class="md-textarea form-control" rows="3" length="300"></textarea>
		            <label for="textarea-char-counter">Isi Pengaduan Anda</label>
	            </div>
	            <button class="btn btn-primary btn-block">Kirim Pengaduan</button>
		    </form>
          </div>
          <!-- Card content -->

        </div>
		
	</div>


</section>

@endsection
@push('js')
<script type="text/javascript">
	function filePreview(input) {
		if(input.files && input.files[0]) {}
			var reader = new FileReader();
			reader.onload = function(e){
				$('#iGambar + img').remove();
				$('#iGambar').after('<img src="'+e.target.result+'" width="100" />');
			}
			reader.readAsDataURL(input.files[0]);
	}
	$(function() {
		$('#iGambar').change(function(){
			filePreview(this);
		})
	})
</script>
@endpush