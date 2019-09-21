<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Status Dropdown Menu -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" href="#">
                {{ auth()->user()->name }}
                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('img/avatar.png') }}"
                    width="30"
                    height="30"
                    class="d-inline-block align-top img-circle"
                    alt="User Image">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title font-weight-bold">
                                {{ auth()->user()->email }}
                                <span class="float-right text-sm text-muted"><i class="fas fa-info"></i></span>
                            </h3>
                            <p class="text-sm">Welcome</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('users.profile', auth()->user()) }}" class="dropdown-item dropdown-footer">PROFILE</a>
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
</nav>
<!-- /.navbar -->
