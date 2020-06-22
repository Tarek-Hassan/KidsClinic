@extends('admin.index')
@section('title','Article')
@section('section_title','Article')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 my-3">
                <!-- jquery validation -->
                <div class="card card-primary">
                    @include('admin.error')
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <!-- Post -->

                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="/storage/{{$article->user->avatar}}" alt="user image">
                                        <span class="username">
                                            <a href="#">{{$article->user->name}}</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">{{$article->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    {{-- <div class="card mb-3" style="max-width: 540px;"> --}}
                                        <div class="row  my-3">
                                            <div class="col-md-4">
                                                <img  src="/storage/{{$article->image}}" class="card-img" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$article->title}}</h5>
                                                    <p class="card-text">{{$article->body}}</p>
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
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection
