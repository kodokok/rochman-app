<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    @if (auth()->check())
        <ul class="navbar-nav ml-auto">
            <!-- User Status Dropdown Menu -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown">
                        {{ auth()->user()->nama }}
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
                                @if (auth()->check())
                                <h3 class="dropdown-item-title font-weight-bold">
                                    {{ auth()->user()->email }}
                                    <span class="float-right text-sm text-muted"><i class="fas fa-info"></i></span>
                                </h3>

                                <p class="text-sm">{{ auth()->user()->isOnline() ? 'Online': 'Offline' }}</p>
                                @endif
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.show', auth()->user()->id) }}" class="dropdown-item dropdown-footer">PROFILE</a>
                    <a href="{{ route('password.edit', auth()->user()->id) }}" class="dropdown-item dropdown-footer">CHANGE PASSWORD</a>
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
