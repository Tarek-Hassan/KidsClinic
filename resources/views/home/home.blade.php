@extends('home.index')
@section('title','home')
@section('css')
<link rel="stylesheet" href="{{asset('home')}}/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('home')}}/css/animate.css">
<link rel="stylesheet" href="{{asset('home')}}/css/owl.carousel.css">
<link rel="stylesheet" href="{{asset('home')}}/css/owl.theme.default.min.css">
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('home')}}/css/tooplate-style.css">
@endsection
{{-- stat NavBar --}}
{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-info navbar-fixed-top">
    <a class="navbar-brand" href="#"><i class="fas fa-baby "></i> Kids Clinic.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-2 mr-auto">
            <li class="nav-item active">
                <a class="nav-link " href="#top">Home </a>
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
                <a class="nav-link " href="/#news">News</a>
            </li>
        </ul>
    @if (Auth::user()->role !=0)
        <button class="btn btn-warning my-2 my-sm-0"><a href="/admin"><img src="https://img.icons8.com/fluent/30/000000/dashboard.png"/>DashBoard</a></button>
    @endif
    @if (Auth::user()->role ==0)
        <button class="btn btn-warning my-2 my-sm-0"><a href="{{route('invoice')}}"><img src="https://img.icons8.com/officel/30/000000/treatment-plan.png"/>Patient Info.</a></button>
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
</nav> --}}
{{-- End NavBar --}}
@section('content')


<!-- ABOUT -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Your <i class="fa fa-h-square"></i>ealth
                        Center</h2>
                    <div class="wow fadeInUp" data-wow-delay="0.8s">
                        <p>Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi
                            vitae velit volutpat venenatis.</p>
                        <p>Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut
                            placerat, diam a tempus vehicula.</p>
                    </div>
                    <figure class="profile wow fadeInUp" data-wow-delay="1s">
                        <img src="{{asset('home')}}/images/author-image.jpg" class="img-responsive" alt="">
                        <figcaption>
                            <h3>Dr. Neil Jackson</h3>
                            <p>General Principal</p>
                        </figcaption>
                    </figure>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- TEAM -->
<section id="team" data-stellar-background-ratio="1">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="about-info">
                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">Our Doctors</h1>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                    <img src="{{asset('home')}}/images/team-image1.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Nate Baston</h3>
                        <p>General Principal</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-020-0120</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">general@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-linkedin-square"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <img src="{{asset('home')}}/images/team-image2.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Jason Stewart</h3>
                        <p>Pregnancy</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-070-0170</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">pregnancy@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                            <li><a href="#" class="fa fa-flickr"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <img src="{{asset('home')}}/images/team-image3.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Miasha Nakahara</h3>
                        <p>Cardiology</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-040-0140</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">cardio@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- NEWS -->
<section id="news" data-stellar-background-ratio="2.5">
    {{-- <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <!-- SECTION TITLE -->
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Latest News</h2>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <a href="news-detail.html">
                        <img src="{{asset('home')}}/images/news-image1.jpg" class="img-responsive" alt="">
    </a>
    <div class="news-info">
        <span>March 08, 2018</span>
        <h3><a href="news-detail.html">About Amazing Technology</a></h3>
        <p>Maecenas risus neque, placerat volutpat tempor ut, vehicula et felis.</p>
        <div class="author">
            <img src="{{asset('home')}}/images/author-image.jpg" class="img-responsive" alt="">
            <div class="author-info">
                <h5>Jeremie Carlson</h5>
                <p>CEO / Founder</p>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <!-- NEWS THUMB -->
        <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
            <a href="news-detail.html">
                <img src="{{asset('home')}}/images/news-image2.jpg" class="img-responsive" alt="">
            </a>
            <div class="news-info">
                <span>February 20, 2018</span>
                <h3><a href="news-detail.html">Introducing a new healing process</a></h3>
                <p>Fusce vel sem finibus, rhoncus massa non, aliquam velit. Nam et est ligula.</p>
                <div class="author">
                    <img src="{{asset('home')}}/images/author-image.jpg" class="img-responsive" alt="">
                    <div class="author-info">
                        <h5>Jason Stewart</h5>
                        <p>General Director</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <!-- NEWS THUMB -->
        <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
            <a href="news-detail.html">
                <img src="{{asset('home')}}/images/news-image3.jpg" class="img-responsive" alt="">
            </a>
            <div class="news-info">
                <span>January 27, 2018</span>
                <h3><a href="news-detail.html">Review Annual Medical Research</a></h3>
                <p>Vivamus non nulla semper diam cursus maximus. Pellentesque dignissim.</p>
                <div class="author">
                    <img src="{{asset('home')}}/images/author-image.jpg" class="img-responsive" alt="">
                    <div class="author-info">
                        <h5>Andrio Abero</h5>
                        <p>Online Advertising</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div> --}}
</section>


<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
    {{-- <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <img src="{{asset('home')}}/images/appointment-image.jpg" class="img-responsive" alt="">
    </div>

    <div class="col-md-6 col-sm-6">
        <!-- CONTACT FORM HERE -->
        <form id="appointment-form" role="form" method="post" action="#">

            <!-- SECTION TITLE -->
            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                <h2>Make an appointment</h2>
            </div>

            <div class="wow fadeInUp" data-wow-delay="0.8s">
                <div class="col-md-6 col-sm-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="date">Select Date</label>
                    <input type="date" name="date" value="" class="form-control">
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="select">Select Department</label>
                    <select class="form-control">
                        <option>General Health</option>
                        <option>Cardiology</option>
                        <option>Dental</option>
                        <option>Medical Research</option>
                    </select>
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="telephone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                    <label for="Message">Additional Message</label>
                    <textarea class="form-control" rows="5" id="message" name="message"
                        placeholder="Message"></textarea>
                    <button type="submit" class="form-control" id="cf-submit" name="submit">Submit
                        Button</button>
                </div>
            </div>
        </form>
    </div>

    </div>
    </div> --}}
</section>

<!-- GOOGLE MAP -->
<section id="google-map">
    <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1753793.385280749!2d30.3435506!3d30.84809860000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1592743146489!5m2!1sen!2seg"
        width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>


<!-- FOOTER -->
<footer data-stellar-background-ratio="5">
    <div class="container">
        <div class="row my-3">

            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                    <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit
                        consequat ultricies.</p>

                    <div class="contact-info">
                        <p><i class="fa fa-phone"></i> 010-070-0170</p>
                        <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">

            </div>

            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <div class="opening-hours">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                        <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                        <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                        <p>Sunday <span>Closed</span></p>
                    </div>

                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>




        </div>
    </div>

</footer>
</body>
@endsection
@section('script')
<script src="{{asset('home')}}/js/jquery.js"></script>
<script src="{{asset('home')}}/js/bootstrap.min.js"></script>
<script src="{{asset('home')}}/js/jquery.sticky.js"></script>
<script src="{{asset('home')}}/js/jquery.stellar.min.js"></script>
<script src="{{asset('home')}}/js/wow.min.js"></script>
<script src="{{asset('home')}}/js/smoothscroll.js"></script>
<script src="{{asset('home')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('home')}}/js/custom.js"></script>
@endsection
