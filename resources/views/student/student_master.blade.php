<!DOCTYPE html>
<html lang="en">

@if (!Auth::check())
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

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/lib/adminlte/css/adminlte.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('backend/lib/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/lib/adminlte/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Yearpicker -->
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/jquery.min.js')}}"></script>
    <link rel='stylesheet' href="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.css')}}" />
    <script src="{{asset ('backend/lib/adminlte/plugins/yearpicker/yearpicker.js')}}"></script>

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/adminlte/plugins/toastr/toastr.css')}}">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Own libraries --}}
    @yield('head')

    @yield('style_custom')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('backend/img/school/itdelicias.png')}}" alt="SSELogo" height="80"
                width="60">
        </div>

        <!-- Navbar -->
        @include('student.body.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('student.body.side_bar')

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
                    @yield('student_content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        @include('student.body.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/lib/adminlte/plugins/jquery/jquery.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/lib/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/lib/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

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

    {{-- Own scripts --}}
    @yield('scripts')
</body>

</html>