<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                @php
                    $setting = App\Models\Setting::find(1);
                @endphp
                @if ($setting)
                    <img src="{{ asset('images/setting/' . $setting->logo) }}" width="100px" height="auto"
                        alt="Logo" />
                @endif
            </div>
            <div class="col-md-9">
                <div class="border text-center p-2">
                    <h5>Advertise here</h5>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container-fluid">
            <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}
                    @php
                        $categories = App\Models\Category::where('navbar_status', '0')
                            ->where('status', '0')
                            ->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('tutorial', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                    @if (Auth::check())
                        <li>
                            <a class="nav-link btn-danger float-end" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
