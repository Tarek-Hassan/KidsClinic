@include('admin.header')
<nav class="navbar navbar-expand-lg navbar-dark bg-info navbar-fixed-top">
    <a class="navbar-brand" href="/"><i class="fas fa-baby "></i> Kids Clinic.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-2 mr-auto">
            <li class="nav-item active">
                <a class="nav-link " href="/#top">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/#google-map">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/#about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/#team">Doctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('articles')}}">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('api')}}">API</a>
            </li>
        </ul>
        @if (Auth::user()->role !=0)
        <button class="btn btn-warning my-2 my-sm-0"><a href="/admin"><img
                    src="https://img.icons8.com/fluent/30/000000/dashboard.png" />DashBoard</a></button>
        @endif
        @if (Auth::user()->role ==0)
        <button class="btn btn-warning my-2 my-sm-0"><a href="{{route('invoice')}}"><img
                    src="https://img.icons8.com/officel/30/000000/treatment-plan.png" />Patient Info.</a></button>
        @endif
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> @yield('section_title')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row card">

                        @yield('content')
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
            <div class="col-md-2 col-sm-2 text-align-center " style="float:right">
                <div class="angle-up-btn ">
                    <a href="#top" class="smoothScroll wow fadeInUp bg-info" data-wow-delay="1.2s"><i
                            class="fa fa-angle-up"></i></a>
                    {{-- chat --}}

                    {{-- <div class="card card-prirary cardutline direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>
                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">3</span>

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                                    data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                {{-- @foreach($msgs as $msg) --}}

                                {{-- @if (Auth::id() != $msg->from) 
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">qasasa</span>
                                        <span
                                            class="direct-chat-timestamp float-right">{{ date('d M y, h:i a', strtotime(now())) }}</span>
                                    </div>
                                    {{-- @else 
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">saxscds</span>
                                            <span
                                                class="direct-chat-timestamp float-left">{{ date('d M y, h:i a', strtotime(now())) }}</span>
                                        </div>

                                        {{-- @endif 
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img"
                                            src="{{asset('control')}}/media/img/misc/avatar.png"
                                            alt="Message User Image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            asasdasdasddas
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                    {{-- @endforeach 
                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">

                                <!-- <form > -->
                                <!-- <div class="input-group">
                               <input type="text" name="message" placeholder="Type Message ..." class="form-control message" >
                               <span class="input-group-append">
                                        <button class="btn btn-primary btn-submit">Send</button>
                                </span>
                            </div> -->
                                <div class="input-group"></div>
                                <div class="input-text">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                        class="form-control submit">

                                </div>
                                <!-- </form > -->

                            </div>
                            <!-- /.card-footer-->
                        </div>

                        <!--/.direct-chat -->
                    </div> --}}
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    </div>


    <!-- Main Footer -->
    </div>
    <!-- ./wrapper -->
    @include('admin.footer')
