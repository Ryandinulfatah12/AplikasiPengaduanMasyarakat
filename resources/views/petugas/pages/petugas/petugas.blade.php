@extends('layouts.main')
@section('title','Data Petugas')
@section('content')

<section>
  <h3>Data Petugas</h3>

  <div class="col-md-12 animated fadeInDown">
    <a href="{{route('petugas.tambah')}}" class="btn btn-primary btn-rounded">Tambah Data</a>
    <div class="card">
        <div class="card-body">
          <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>No Telepon</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($petugas as $pt)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pt->fullname}}</td>
                <td>{{$pt->username}}</td>
                <td>{{$pt->telp}}</td>
                <td>{{$pt->level}}</td>
                <td>
                  <a href="{{route('petugas.edit',['id' => $pt->id])}}" class="btn btn-success btn-sm">Edit</a>
                  <button class="btn btn-danger btn-sm btn-trash" data-id="{{ $pt->id }}" type="button">Hapus</button>
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
        <form id="form-delete" action="{{ route('data.petugas') }}" method="post" >
          @method('delete')
          @csrf
          <input type="hidden" name="id" id="input-id">
        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-outline-danger waves-effect" type="button" data-dismiss="modal">Cancel</button>
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