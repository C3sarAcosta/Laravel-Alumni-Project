<!DOCTYPE html>
<html lang="en">

@if (!Auth::check())
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif

@if (Auth::user()->role != 'admin')
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif

@php
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
@endphp


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S.S.E | @yield('TopTitle')</title>
    <link rel="icon" href=" {{ asset ('backend/img/school/favicon.ico') }} ">

    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/lib/adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/lib/adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Yearpicker -->
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/jquery.min.js')}}"></script>
    <link rel='stylesheet' href="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.css')}}" />
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.js')}}"></script>

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/adminlte/plugins/toastr/toastr.css')}}">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/lib/adminlte/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/lib/adminlte/css/adminlte.min.css') }}">

    {{-- Own libraries --}}
    @yield('head')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('backend/img/school/itdelicias.png')}}" alt="SSELogo" height="80"
                width="60">
        </div>

        <!-- Navbar -->
        @include('admin.body.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.body.side_bar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 mb-3">
                            <h1 class="m-0">@yield('title_section')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('admin_content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        @include('admin.body.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/lib/adminlte/plugins/jquery/jquery.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/lib/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/lib/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('backend/lib/adminlte/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/lib/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- daterangepicker -->
    <script src="{{ asset('backend/lib/adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/lib/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
    </script>

    <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('backend/lib/adminlte/plugins/toastr/toastr.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('backend/lib/adminlte/js/adminlte.js') }}"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/lib/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/js/datatable_filter.js') }}"></script>

    <!-- Random Color  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.js"></script>

    <script>
        @if(Session::has('message'))
    		var type = "{{ Session::get('alert-type', 'info') }}";
    		switch(type){
    			case 'info':
    			toastr.info("{{ Session::get('message') }}");
    			break;
    
    			case 'success':
    			toastr.success("{{ Session::get('message') }}");
    			break;		
    
    			case 'warning':
    			toastr.warning("{{ Session::get('message') }}");
    			break;
    
    			case 'error':
    			toastr.error("{{ Session::get('message') }}");
    			break;								
    		}
    		@endif
    </script>
    
    <!-- General -->
    <script src="{{ asset('backend/js/general.js') }}"></script>

    <script type="text/javascript">
        $(document).on('click', '#help_admin', function(e){
            Swal.fire({
            title: '<strong>Asistente S.S.E</strong>',
            icon: 'info',
            html:
            '<p style="text-align:justify;">Hola administrador este es el asistente para apoyarte en este sistema. ' +
            'En los apartados de configuración podrás encontrar los datos para que los manipules, como son son los egresados '+
            'empresas, carreras, etc. En el apartado de reportes podrás revisar las respuestas de las encuestas tanto de empleadores como de egresados, '+
            'en el apartado de estadístcias podrás revisar todas las respuestas graficadas con forma de pastel.</p>',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            })
        });
    </script>

    {{-- Own scripts --}}
    @yield('scripts')
</body>

</html>