<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $setting = App\Models\Setting::find(1)
    @endphp
    @if ($setting)
        <link rel="shortcut icon" href="{{ asset('images/setting/' . $setting->favicon) }}" type="image/x-icon">
    @endif

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">

    <meta name="author" content="Utsab Dey">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">

    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="{{ asset('backend/toastr/toastr.css') }}">
</head>

<body>
    <div id="app">
        @include('layouts.navbar')

        <main class="">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('backend/js/owl.carousel.min.js') }}"></script>

    {{-- Toastr JS --}}
    <script src="{{ asset('backend/toastr/toastr.min.js') }}"></script>

    @yield('scripts')

    <script>
        $('.category-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>

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
