<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register</title>
  <!-- Font Awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="{{url('material/css/all.css')}}">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('material/css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{url('material/css/mdb.min.css')}}">
  <style>
    html,
    body,
    header,
    .view {
      height: 100%;
    }
    @media (min-width: 851px) and (max-width: 1440px) {
      html,
      body,
      header,
      .view {
        height: 850px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }
    @media (min-width: 451px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1200px;
      }
    }
    @media (max-width: 450px) {
      html,
      body,
      header,
      .view {
        height: 1400px;
      }
    }
  </style>
</head>

<body class="register-page">

  <!-- Main Navigation -->
  <header>

    <!-- Intro Section -->
    <section class="view intro-2">
      <div class="mask rgba-gradient">
        <div class="container h-100 d-flex justify-content-center align-items-center">

          <!-- Grid row -->
          <div class="row pt-5">

            <!-- Grid column -->
            <div class="col-md-12">

              <div class="card">
                <div class="card-body">

                  <h2 class="font-weight-bold my-4 text-center mb-5 mt-4 font-weight-bold">
                    <strong>REGISTER</strong>
                  </h2>
                  <hr>
                  @if(session('info') == 'register')
                  <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Berhasil!</h4>
                    <p>Anda Telah Berhasil Daftar Sebagai Masyarakat, Silahkan login untuk melanjutkan.</p>
                    <hr>
                    <a href="{{route('login')}}" class="btn btn-success btn-sm">Login</a>
                  </div>
                  @endif

                  <!-- Grid row -->
                  <div class="row mt-5">

                    <!-- Grid column -->
                    <div class="col-md-6 ml-lg-5 ml-md-3">

                      <!-- Grid row -->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-university indigo-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">
                            <strong>Apa itu Pengaduan?</strong>
                          </h4>
                          <p class="">Pengaduan adalah pemberitahuan yang disertai permintaan oleh pihak yang berkepentingan kepada petugas yang berwenang untuk menindak menurut Hukum, terhadap seseorang yang telah melakukan Tindak Pidana Aduan yang Merugikan.</p>
                        </div>
                      </div>
                      <!-- Grid row -->

                      <!-- Grid row -->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-desktop deep-purple-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">
                            <strong>Tentang Aplikasi</strong>
                          </h4>
                          <p class="">Aplikasi ini merupakan aplikasi yang dapat mengelola pendataan pengaduan dari masyarakat, selain dibuat sesimple mungkin, aplikasi ini juga lumayan dapat bekerja dengan baik untuk dibilang sebuah <i>Aplikasi Pengaduan Masyarakat</i>.</p>
                        </div>
                      </div>
                      <!-- Grid row -->

                      <!-- Grid row -->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="far fa-user-bill-alt purple-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">
                            <strong>Tentang Pembuat</strong>
                          </h4>
                          <p class="">Seorang siswa yang senang belajar hal baru, dan juga ingin selalu bisa bermanfaat bagi orang lain.</p>
                        </div>
                      </div>
                      <!-- Grid row -->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5">
                      <form action="{{route('post.register')}}" method="post">
                        @csrf
                        <div class="md-form">
                          <i class="fas fa-user prefix"></i>
                          <input type="number" name="nik" value="{{old('nik')}}" id="orangeForm-name" class="form-control {{$errors->has('nik')?'is-invalid':''}}">
                          <label for="orangeForm-name">NIK</label>
                          @if($errors->has('nik'))
                          <div class="invalid-feedback">
                            {{$errors->first('nik')}}
                          </div>
                          @endif
                        </div>

                        <div class="md-form">
                          <i class="fas fa-user prefix"></i>
                          <input type="text" name="fullname" value="{{old('fullname')}}" id="orangeForm-name" class="form-control {{$errors->has('fullname')?'is-invalid':''}}">
                          <label for="orangeForm-name">Nama Lengkap</label>
                          @if($errors->has('fullname'))
                          <div class="invalid-feedback">
                            {{$errors->first('fullname')}}
                          </div>
                          @endif
                        </div>

                        <div class="md-form">
                          <i class="fas fa-user prefix"></i>
                          <input type="text" name="username" value="{{old('username')}}" id="orangeForm-name" class="form-control {{$errors->has('username')?'is-invalid':''}}">
                          <label for="orangeForm-name">Username</label>
                          @if($errors->has('username'))
                          <div class="invalid-feedback">
                            {{$errors->first('username')}}
                          </div>
                          @endif
                        </div>

                        <div class="md-form">
                          <i class="fas fa-phone prefix"></i>
                          <input type="number" name="telp" value="{{old('telp')}}" id="orangeForm-name" class="form-control {{$errors->has('telp')?'is-invalid':''}}">
                          <label for="orangeForm-name">Nomor Telepon</label>
                          @if($errors->has('telp'))
                          <div class="invalid-feedback">
                            {{$errors->first('telp')}}
                          </div>
                          @endif
                        </div>

                        <div class="md-form">
                          <i class="fas fa-lock prefix"></i>
                          <input type="password" name="password" id="orangeForm-pass" class="form-control {{$errors->has('password')?'is-invalid':''}}">
                          <label for="orangeForm-pass">Password</label>
                        </div>
                          @if($errors->has('password'))
                          <div class="invalid-feedback">
                            {{$errors->first('password')}}
                          </div>
                          @endif

                        <div class="md-form">
                          <i class="fas fa-lock prefix"></i>
                          <input type="password" name="repassword" id="orangeForm-pass" class="form-control {{$errors->has('repassword')?'is-invalid':''}}">
                          <label for="orangeForm-pass">Re Password</label>
                          @if($errors->has('repassword'))
                          <div class="invalid-feedback">
                            {{$errors->first('repassword')}}
                          </div>
                          @endif
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-indigo btn-rounded mt-5">Daftar</button>
                          <a href="{{route('login')}}" class="btn btn-peach btn-rounded mt-5">Sudah Punya Akun?</a>
                        </div>
                      </form>
                      <!-- Body -->
                      

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
              </div>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
      </div>
    </section>
    <!-- Intro Section -->

  </header>
  <!-- Main Navigation -->

  <!--  SCRIPTS  -->
  <!-- JQuery -->
  <script src="{{url('material/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{url('material/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{url('material/js/bootstrap.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{url('material/js/mdb.min.js')}}"></script>
  <!-- Initializations -->

  <!-- Custom scripts -->
  <script>

    new WOW().init();

  </script>
  
</body>

</html>
