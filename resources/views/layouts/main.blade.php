<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title') | Pengaduan</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="{{url('material/css/all.css')}}">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('material/css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{url('material/css/mdb.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('material/css/addons/datatables.min.css')}}">

  <!-- Your custom styles (optional) -->
    @stack('css')
</head>

<body class="fixed-sn white-skin">

  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    @include('layouts.sidebar')
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    @include('layouts.nav')
    <!-- Navbar -->

  </header>
  <!-- Main Navigation -->

  <!-- Main layout -->
  <main>

    <div class="container-fluid">
      @yield('content')
    </div>

  </main>
  <!-- Main layout -->

  <!-- Footer -->
  @include('layouts.footer')
  <!-- Footer -->
  
  @stack('modal')


  <!-- SCRIPTS -->
  <script src="{{url('material/js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')
  <!-- JQuery -->
  <script src="{{url('material/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{url('material/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{url('material/js/bootstrap.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{url('material/js/mdb.min.js')}}"></script>
  <!-- Initializations -->
  <script type="text/javascript" src="{{url('material/js/addons/datatables.min.js')}}"></script>

  @stack('js')
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    $('#dt-material-checkbox').dataTable({

      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'os',
        selector: 'td:first-child'
      }
    });

    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').removeClass(
      'custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox_wrapper .dataTables_filterr').find(
      'label').remove();

  </script>

</body>

</html>
