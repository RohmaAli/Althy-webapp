<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Althy Admin Portal</title>
    <meta content="Admin Dashboard" name="description">
    <link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.ico')}}">
    <!-- DataTables -->
    <!-- Responsive datatable examples -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">

    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">
                <!-- Logo container-->
                <div class="logo"><a href="index.html" class="logo"><img src="{{URL::asset('assets/images/logo.png')}}" alt="" class="logo-small"> <img src="assets/images/logo.png" alt="" class="logo-large"></a></div>
                <!-- End Logo container-->

                <div class="menu-extras topbar-custom">
                  <ul class="float-right list-unstyled mb-0">
                     <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link" id="mobileToggle">
                           <div class="lines"><span></span> <span></span> <span></span></div>
                        </a>
                        <!-- End mobile menu toggle-->
                     </li>
                  </ul>
               </div>

        <!-- end menu-extras -->
        <div class="clearfix"></div>
        </div>
        <!-- end container -->
        </div>
        <!-- end topbar-main -->
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Welcome {{Auth::user()->name}}</h4>
                        <ol class="breadcrumb">
                        </ol>
                        <div class="state-information">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu"><a href="{{ route('adminPortal.home') }}"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                        <li class="has-submenu"><a href="{{ route('adminPortal.products') }}"><i class="ti-dashboard"></i> <span>Products</span></a></li>
                        <li class="has-submenu"><a href="{{route('logout')}}"><i class="ti-receipt"></i>Logout</a></li>
                    </ul>
                    <!-- End navigation menu -->
                </div>
                <!-- end navigation -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->
    <div class="wrapper">
        <div class="container-fluid">
               @yield('content')
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">© 2020 Althy </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
     <!-- jQuery  -->
    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{URL::asset('assets/js/waves.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Required datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>


    <script src="{{URL::asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{URL::asset('assets/js/waves.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- google maps api -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCz28tqD4fCIznGDZu5_NL9Vl7lDZZn5lw"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <!-- Gmaps file --><script src="{{URL::asset('plugins/gmaps/gmaps.min.js')}}"></script>
    <!-- App js -->

    <script src="{{URL::asset('assets/js/app.js')}}"></script>
    @yield('customJS')
    <script>
    $(document).ready( function () {


    $('table thead th').each( function () {
        var title = $(this).text();
        $(this).append( '<br/><input type="text" placeholder="Search '+title+'" />' );
    } );

    var table = $('table').DataTable({
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf'
      ],
      "aaSorting": [],
      "paging": false
  });
    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


    } );

    function showPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    </script>
</body>
</html>
