
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login</title>
   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="{{url('material/css/all.css')}}">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('material/css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{url('material/css/mdb.min.css')}}">
  <!-- Your custom styles (optional) -->
  <style>
    html,
    body,
    header,
    .view {
      height: 100%;
    }
    @media (min-width: 560px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view  {
        height: 650px;
      }
    }
  </style>
</head>

<body class="login-page">
    <!-- Intro Section -->
    <section class="view intro-2">
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

              <!-- Form with header -->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">

                  <!-- Header -->
                  <div class="form-header purple-gradient">
                    <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Pengaduan Masyarakat</h3>
                  </div>
                  
                  @if(session('info') == 1)
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Ada Kesalahan!</strong> Username atau Password tidak Terdaftar, harap di check kembali.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  <!-- Body -->
                  <form action="{{route('kirimlogin')}}" method="post">
                    @csrf
                      <div class="md-form">
                        <i class="fas fa-user prefix white-text"></i>
                        <input id="email" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                        <label for="orangeForm-name">Username</label>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="md-form">
                        <i class="fas fa-lock prefix white-text"></i>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <label for="orangeForm-pass">Password</label>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn purple-gradient btn-lg">Login</button>
                      </div>
                    </form>
                </div>
              </div>
              <!-- Form with header -->
            <a href="{{route('register')}}" class="text-white">Belum Punya Akun?</a>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Intro Section -->

    <!-- SCRIPTS -->
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
