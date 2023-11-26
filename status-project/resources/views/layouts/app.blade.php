<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- DataTable CSS -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/autofill/2.6.0/css/autoFill.bootstrap5.min.css" rel="stylesheet">
    @stack('css')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('show.dashboard')}}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('show.neue.seite.form')}}">{{ __('Neue Seite') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>        
        {{-- <div class="container py-4">
            <div class="row">
                @auth
                <!-- Sidebar -->
                <div class="col-md-2 d-md-block sidebar sidebar-dark" style="background-color: black;">
                    <div class="sidebar-sticky">
                        <!-- Sidebar content goes here -->
                        <ul class="nav flex-column mb-2">
                            <!-- App Name -->
                            <li class="nav-item">
                                <a class="nav-link active py-3" aria-current="page" href="#">
                                    <i class="fs-4 bi bi-house"></i>
                                    <span class="ms-1 d-none d-sm-inline">Home</span>
                                </a>
                            </li>
                            <!-- Add more sidebar items as needed -->
                        </ul>
                        <!-- User Info -->
                        <li class="nav-item d-flex align-items-center">
                            <img src="{{ asset('images/users/user-place-holder.jpg') }}" alt="User Image"
                                class="img-fluid rounded-circle mx-3" style="width: 50px; height: 50px;">
                            <span class="text-light">{{ Auth::user()->name }}</span>
                        </li>
                        <!-- Sidebar Links -->
                        <ul class="nav flex-column mb-2">
                            <!-- Add more sidebar items as needed -->
                            <li class="nav-item">
                                <a class="nav-link py-3" href="#">
                                    <i class="fs-4 bi bi-table"></i>
                                    <span class="ms-1 d-none d-sm-inline">Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3" href="#">
                                    <i class="fs-4 bi bi-bootstrap"></i>
                                    <span class="ms-1 d-none d-sm-inline">Bootstrap</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3" href="#">
                                    <i class="fs-4 bi bi-grid"></i>
                                    <span class="ms-1 d-none d-sm-inline">Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3" href="#">
                                    <i class="fs-4 bi bi-people"></i>
                                    <span class="ms-1 d-none d-sm-inline">Customers</span>
                                </a>
                            </li>
                        </ul>
                        <hr class="mb-3">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                    class="rounded-circle">
                                <span class="ms-1 d-none d-sm-inline">loser</span>
                            </a>
                            <ul class="dropdown-menu text-small shadow">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Test</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endauth --}}
                <!-- Main Content -->
                {{-- <div class="col-md-10"> --}}
                    <main class="py-4">
                        @yield('content')
                    </main>
                {{-- </div>
            </div>
        </div> --}}
    </div>

    <!-- Yajra Scripts -->
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" charset="utf8" type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/German.json"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/autofill/2.6.0/js/dataTables.autoFill.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/autofill/2.6.0/js/autoFill.bootstrap5.min.js"></script>
    @stack('scripts')
</body>

</html>
