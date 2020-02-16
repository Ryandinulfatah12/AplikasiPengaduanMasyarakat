@extends('layouts.main')
@section('title','Data Masyarakat')
@section('content')

<section class="mx-auto">
  <h3>Data Semua Masyarakat</h3>

  <div class="col-md-12 animated fadeInDown">
    <a href="{{route('mas.tambah')}}" class="btn btn-primary btn-rounded">Tambah Data</a>
    <div class="card">
        <div class="card-body">
          <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>No Telepon</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($masyarakat as $mas)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$mas->nik}}</td>
                <td>{{$mas->fullname}}</td>
                <td>{{$mas->username}}</td>
                <td>{{$mas->telp}}</td>
                <td>
                  <a href="{{route('mas.edit',['id' => $mas->id])}}" class="btn btn-success btn-sm">Edit</a>
                  <button class="btn btn-danger btn-sm btn-trash" data-id="{{ $mas->id }}" type="button">Hapus</button>
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

@push('modal')
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h3 class="modal-title text-white">Hapus Data Ini?</h3>
        <button class="close" type="button" data-dismiss="modal">
          <span class="text-white">x</span>
        </button>
      </div>
      
      <div class="modal-body">
        Data Tidak Bisa Dikembalikan setelah Terhapus,Anda Yakin?
        <form id="form-delete" action="{{ route('data.mas') }}" method="post" >
          @method('delete')
          @csrf
          <input type="hidden" name="id" id="input-id">
        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-outline-danger waves-effec" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger btn-delete" type="button">Hapus</button>
      </div>

    </div>
  </div>
</div>
@endpush

@push('js')
<script>
  $(function () {
    $('.btn-trash').click(function () {
      id = $(this).attr('data-id');
      $('#input-id').val(id);
      $('#deleteModal').modal('show');
    });

    $('.btn-delete').click(function () {
      $('#form-delete').submit();
    });
  })
</script>
@endpush