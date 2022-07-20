<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - SB Admin</title>

    {{-- DataTable --}}
    <link rel="stylesheet" href="{{ asset('backend/datatable.css') }}">

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}">
</head>

<body class="sb-nav-fixed">

    @include('admin.layouts.navbar')

    <div id="layoutSidenav">
        @include('admin.layouts.sidebar')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
        </div>
        @include('admin.layouts.footer')
    </div>

    {{-- Font-Awesome --}}
    <script src="{{ asset('backend/fontawesome/v6.1.0/all.js') }}"></script>
    
    {{-- Main JS --}}
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/js/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('backend/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
