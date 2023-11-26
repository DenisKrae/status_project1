<!-- resources/views/partials/sidebar.blade.php -->

{{-- <nav id="sidebar">
    <div class="sidebar-header">
        <h3>Laravel</h3>
    </div>

    <ul class="list-unstyled components">
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        <!-- Add more menu items as needed -->
    </ul>
</nav> --}}

<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <!-- App Name -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <h5 class="text-light">Laravel Drupal</h5>
                </a>
            </li>

            <!-- User Info -->
            <li class="nav-item d-flex align-items-center">
                <img src="{{ asset('images/users/user-place-holder.jpg') }}" alt="User Image" class="img-fluid rounded-circle mx-3" style="width: 50px; height: 50px;">
                <span class="text-light">{{ Auth::user()->name }}</span>
            </li>
             <!-- Sidebar Links -->
             <li class="nav-item">
                <a class="nav-link active" href="#">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Link 1
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Link 2
                </a>
            </li>
            <!-- Add more sidebar items as needed -->
        </ul>
    </div>
</nav>