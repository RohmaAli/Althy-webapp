<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Althy Admin Portal</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.ico')}}">
    <!-- DataTables -->
    <link href="{{URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{URL::asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Navigation Bar-->
    <div class="wrapper-page">
       @yield('content')
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
    <script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{URL::asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{URL::asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{URL::asset('assets/pages/datatables.init.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{URL::asset('assets/js/waves.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- google maps api -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCz28tqD4fCIznGDZu5_NL9Vl7lDZZn5lw"></script>
    <!-- Gmaps file --><script src="{{URL::asset('plugins/gmaps/gmaps.min.js')}}"></script>
    <!-- demo codes --><script src="{{URL::asset('assets/pages/gmaps.js')}}"></script><!-- App js -->
    <!-- App js -->
    <script src="{{URL::asset('assets/js/app.js')}}"></script>
    <script>
    function showPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
</body>
</html>
