@extends('layouts.main')
@section('title','Edit Petugas')
@section('content')
<div class="col-md-7 mx-auto mt-3 animated fadeInLeft">
  <!--Form with header -->
  <div class="card">

    <div class="card-body">
      <!--Header -->
      <div class="form-header blue accent-1">
        <h3><i class="fas fa-envelope"></i> Edit Data Petugas</h3>
      </div>
      <!--Body -->
      <form action="{{route('petugas.edit',['id'=>$petugas->id])}}" method="POST">
        @csrf
        <div class="modal-body mb-0">
          <div class="md-form form-sm">
            <i class="fas fa-user prefix"></i>
            <input type="text" name="fullname" id="form19" class="form-control form-control-sm {{$errors->has('fullname')?'is-invalid':''}}" value="{{old('fullname',$petugas->fullname)}}">
            <label for="form19">Nama Lengkap</label>
            @if($errors->has('fullname'))
            <div class="invalid-feedback">
              {{$errors->first('fullname')}}
            </div>
            @endif
          </div>

          <div class="md-form form-sm">
            <i class="fas fa-user prefix"></i>
            <input type="text" name="username" id="form19" class="form-control form-control-sm {{$errors->has('username')?'is-invalid':''}}" value="{{old('username',$petugas->username)}}">
            <label for="form19">Username</label>
            @if($errors->has('username'))
            <div class="invalid-feedback">
              {{$errors->first('username')}}
            </div>
            @endif
          </div>

          <div class="md-form form-sm">
            <i class="fas fa-key prefix"></i>
            <input type="password" name="password" id="form20" class="form-control form-control-sm {{$errors->has('password')?'is-invalid':''}}">
            <label for="form20">Password</label>
            @if($errors->has('password'))
            <div class="invalid-feedback">
              {{$errors->first('password')}}
            </div>
            @endif
            <small class="text-muted">Kosongkan Bila Password Tidak Diubah.</small>
          </div>

          <div class="md-form form-sm">
            <i class="fas fa-key prefix"></i>
            <input type="password" name="repassword" id="form20" class="form-control form-control-sm {{$errors->has('repassword')?'is-invalid':''}}">
            <label for="form20">Re Password</label>
            @if($errors->has('repassword'))
            <div class="invalid-feedback">
              {{$errors->first('repassword')}}
            </div>
            @endif
          </div>

          <div class="md-form form-sm">
            <?php 
              $val = old('level',$petugas->level);
             ?>
            <select name="level" class="mdb-select md-form" required>
              <option value="" disabled {{ $val==""?'selected':'' }}>-- Pilih Level --</option>
              <option value="admin" {{ $val=="admin"?'selected':'' }}>Admin</option>
              <option value="petugas" {{ $val=="petugas"?'selected':'' }}>Petugas</option>
            </select>
          </div>

          <div class="md-form form-sm">
            <i class="fas fa-phone prefix"></i>
            <input type="number" name="telp" id="form21" class="form-control form-control-sm {{$errors->has('telp')?'is-invalid':''}}" value="{{old('telp',$petugas->telp)}}">
            <label for="form21">No Telepon</label>
            @if($errors->has('telp'))
            <div class="invalid-feedback">
              {{$errors->first('telp')}}
            </div>
            @endif
          </div>

          <div class="text-center mt-1-half">
            <button type="submit" class="btn btn-success btn-block btn-rounded mb-2">Simpan Perubahan</button>
            <a href="{{route('data.petugas')}}" class="btn btn-danger btn-block btn-rounded">Kembali</a>
          </div>

        </div>
      </form>

    </div>

  </div>
<!--Form with header -->
</div>

@endsection