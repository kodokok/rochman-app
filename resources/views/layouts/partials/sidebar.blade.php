<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('app') }}" class="brand-link">
        <img src="{{ asset('img/brand.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ROCHMAN-APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('app') }}" class="nav-link {{ active(['/']) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('monitoring.index') }}" class="nav-link {{ active(['monitoring.*']) }}">
                        <i class="nav-icon fas fa-binoculars"></i>
                        <p>Monitoring</p>
                    </a>
                </li>
                <li class="nav-header">APPLICATION</li>
                <li class="nav-item">
                    <a href="{{ route('auditplan.index') }}" class="nav-link {{ active(['auditplan.*']) }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Audit Plan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('temuanaudit.index') }}" class="nav-link {{ active(['temuanaudit.*']) }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Temuan Audit</p>
                    </a>
                </li>
                @hasanyrole('admin')
                <li class="nav-header">DATA</li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ active(['user.*']) }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ active(['roles.*']) }}">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kompetensi.index') }}" class="nav-link {{ active(['kompetensi.*']) }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Kompetensi Auditor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('departements.index') }}" class="nav-link {{ active(['departements.*']) }}">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>Departements</p>
                    </a>
                </li>
                @endhasanyrole

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
