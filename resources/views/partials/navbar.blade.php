<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        @yield('breadcrumbs')
    </ul>

    <!-- Right navbar links -->
    @if (auth()->check())
        <ul class="navbar-nav ml-auto">
            <!-- User Status Dropdown Menu -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown">
                        {{ auth()->user()->nama }}
                        <img src="{{ auth()->user()->foto ? asset('storage/' . auth()->user()->foto) : asset('img/avatar.png') }}"
                        width="30"
                        height="30"
                        class="d-inline-block align-top img-circle"
                        >
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{ route('profile.show', auth()->user()->id) }}" class="dropdown-item dropdown-footer">PROFILE</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('LOGOUT') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    @endif
</nav>
<!-- /.navbar -->
