<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('control')}}/media/img/logo/logo2.png" alt="erfa Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KIDS Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/storage/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
                {{-- <img src="{{ Storage::url("{{Auth::user()->avatar") }}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="/admin/users/{{Auth::id()}}/edit" class="d-block">{{Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ">
                    <a href="{{url('admin/patients')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Patients

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/visits')}}" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Visists
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/schedule')}}" class="nav-link">

                        <i class="nav-icon far fa-calendar-alt"></i>

                        <p>
                            Schedule
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/statistics')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Statistics
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/articles')}}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Articles
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                 @if(Auth::user()->role == '2')
                    <a href="{{url('admin/users')}}" class="nav-link">
                 @else
                    <a href="{{url('admin/users/create')}}" class="nav-link">
                 @endif
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>

                </li>
                {{-- to Only Admin --}}
                @if(Auth::user()->role == '2')
                <li class="nav-item">
                    <a href="{{url('admin/about')}}" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            About US
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/setting')}}" class="nav-link">

                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <!-- <i class="nav-icon fas fa-portal-exit"></i> -->
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
