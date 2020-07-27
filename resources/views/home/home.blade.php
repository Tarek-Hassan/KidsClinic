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

@section('content')

<!-- ABOUT -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    {!!$about->body!!}
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
            @foreach($doctors as $doctor)

            <div class="col-md-4 col-sm-6 mb-2">
                <div class="team-thumb wow fadeInUp img-center" data-wow-delay="0.2s">
                    <img src="/storage/{{$doctor->avatar}}" class="img-responsive img-fluid img-center" alt="">

                    <div class="team-info">
                        <h3>{{$doctor->name}}</h3>
                        <p>General Principal</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i>{{$doctor->mobile}}</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">{{$doctor->email}}</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- NEWS -->
<section id="news" data-stellar-background-ratio="2.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- SECTION TITLE -->

                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">

                    <h2>Latest Articles</h2>
                </div>
            </div>
            @foreach($articles as $article)
            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                    @if($article->image)
                    <a href="news-detail.html mr-1">
                        <img src="/storage/{{$article->image}}" class="img-responsive img-fluid img-center" alt="">
                    </a>
                    @endif
                    <div class="news-info">
                        @if($article->title)
                        <h3><a href="news-detail.html">{{$article->title}}</a></h3>
                        @endif
                        <p>{!!$article->body!!}</p>
                        <span class="float-right mt-1">{{$article->created_at->diffForHumans()}}</span>
                        <div class="author ">
                            <img src="/storage/{{$article->user->avatar}}" class="img-responsive" alt="">
                            <div class="author-info">
                                <h5>{{$article->user->name}}</h5>
                                <p>CEO / Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- MAKE AN APPOINTMENT -->
<section id="appointment" class="mb-3 mx-2" data-stellar-background-ratio="3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <img src="{{asset('home')}}/images/appointment-image.jpg" style="width:100%;" alt="">
            </div>
            <div class="col-lg-6 col-md-12 bg-info justify-center">
                <!-- CONTACT FORM HERE -->
                <form id="appointment-form" role="form" method="POST" action="{{route('appointments.store')}}">
                    @csrf
                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                        <h2>Make an appointment</h2>
                    </div>

                    <div class="wow fadeInUp" data-wow-delay="0.8s">
                        <div class="col-md-12 col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        </div>
                        <div class="row mx-1">
                            <div class="col-md-6 col-sm-6">
                                <label for="date">Select Date</label>
                                <input type="date" name="time" value="" class="form-control">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="select">Select Department</label>
                                <select class="form-control" name="dept">
                                    <option value="0">General Health</option>
                                    <option value="1">Cardiology</option>
                                    <option value="2">Dental</option>
                                    <option value="3">Medical Research</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label for="telephone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">

                            <label for="Message">Additional Message</label>
                            <textarea class="form-control" rows="5" id="message" name="notes"
                                placeholder="Message"></textarea>
                            <button type="submit" class="form-control btn btn-info" id="cf-submit">save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    {!!$setting->body!!}
                    <div class="contact-info">
                        <p><i class="fa fa-phone"></i> {{$setting->phone}}</p>
                        <p><i class="fa fa-envelope-o"></i> <a href="#">{{$setting->email}}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <div class="opening-hours">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                        {!!$setting->worktime!!}
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
