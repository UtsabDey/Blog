<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') - BlogSite</title>

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/datatable.css') }}">

    {{-- Font Awesome --}}
    <script src="{{ asset('backend/fontawesome/v6.1.0/all.js') }}"></script>

    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="{{ asset('backend/toastr/toastr.css') }}">
</head>

<body class="sb-nav-fixed">
    @include('admin.layouts.navbar')

    <div id="layoutSidenav">
        @include('admin.layouts.sidebar')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>

    {{-- jQuery --}}

    {{-- Bootstrap JS --}}
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Main JS --}}
    <script src="{{ asset('backend/js/scripts.js') }}"></script>

    <script src="{{ asset('backend/js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/js/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('backend/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/js/datatables-simple-demo.js') }}"></script>

    {{-- Toastr JS --}}
    <script src="{{ asset('backend/toastr/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
