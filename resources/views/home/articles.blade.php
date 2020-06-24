@extends('home.index')
@section('title','Articles')
@section('section_title','Dr. Articles')
@section('content')
<div class="container my-3">

    @foreach($articles as $article)
    <!-- Post -->

    <div class="post my-3">
        <div class="user-block">
            <img class="img-circle img-bordered-sm" src="/storage/{{$article->user->avatar}}" alt="user image">
            <span class="username">
                <a href="#">{{$article->user->name}}</a>

            </span>
            <span class="description">{{$article->created_at}}</span>
        </div>
        <!-- /.user-block -->
        {{-- <div class="card mb-3" style="max-width: 540px;"> --}}
        <div class="row  my-3">
        @if($article->image)
            <div class="col-md-4">
                <img src="/storage/{{$article->image}}" class="card-img" alt="...">
            </div>
        @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{!!$article->body!!}</p>
                </div>
            </div>
        </div>
        {{-- </div> --}}

        {{-- <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                            Share</a>
                                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                            Like</a>
                                        <span class="float-right">
                                            <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                            </a>
                                        </span>
                                    </p>

                                    <form class="form-horizontal">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Type a comment">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info">Send</button>
                                            </div>
                                        </div>
                                    </form> --}}
    </div>
    <!-- /.post -->

    @endforeach


</div>

</body>
@endsection
