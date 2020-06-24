<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('articles')}}" class="nav-link">Articles</a>
        </li>
    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell nav-icon mr-3"></i>
                @if(auth()->user()->unreadNotifications->count())
                <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}
                </span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('mark')}}"><span class="dropdown-item dropdown-header">
                        <i class="fas fa-envelope mr-2"></i>{{ auth()->user()->unreadNotifications->count() }}
                        MarkAllAsRead</span></a>

                </a>
                @foreach(auth()->user()->unreadNotifications as $notification)

                <div class="dropdown-divider"></div>


                <a href="#" class="dropdown-item bg-info">
                    {{ $notification->data['title'] }}
                    {{-- <small class="float-right text-muted text-sm ">{{ $notification->data['start'] }}</small> --}}
                </a>

                @endforeach
                @if( auth()->user()->unreadNotifications->count() < 7) @foreach(auth()->user()->readNotifications as
                    $read)
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        {{ $read->data['title'] }}
                        {{-- <span class="float-right text-muted text-sm">{{ $read->data['start'] }}</span> --}}
                    </a>
                    @endforeach
                    @endif
                    <div class="dropdown-divider"></div>
            </div>
        </li>

    </ul>
</nav>
