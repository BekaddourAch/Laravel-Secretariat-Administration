<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
     .layout-fixed .brand-link {
        width: 200px !important;
    }
    .main-sidebar, .main-sidebar::before { 
        width: 200px !important;
    }
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
	 
	margin-left: 200px !important;
}
    </style>
    {{-- HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH layouts/head.blade.php HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH --}}
    @include('layouts.head')
    {{-- HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ URL::asset('/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}



        {{-- NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN  layouts/main-header.blade.php   NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN --}}
        @include('layouts.main-header')
        {{-- NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN --}}

        {{-- sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss  layouts/main-sidebar.blade.php sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss --}}
        <!-- Main Sidebar Container -->
        @include('layouts.main-sidebar')

        {{-- sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss --}}




        {{-- oooooooooooooooooooooooooooooooooooooooooooooooooooooooooo             the PAGE             ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo --}}
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('page-header')
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->
            {{-- ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo --}}

            {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}

            <!-- Main content -->
            @yield('content')

            <!-- /.content-wrapper -->

            {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}} 





            {{-- ---------------------------------------------------------------  layouts/footer.blade.php ---------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
            @include('layouts.footer')
            {{-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}



            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        @include('layouts.scripts')
</body>

</html>
