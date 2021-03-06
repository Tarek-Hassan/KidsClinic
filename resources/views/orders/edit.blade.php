@extends('admin.index')
@section('title','Article')
@section('section_title','Article')
@section('css')
      <!-- summernote -->
  <link rel="stylesheet" href="{{asset('control')}}/plugins/summernote/summernote-bs4.css">
@endsection
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
                    <div class="card-header">
                        <h3 class="card-title">Edit Article</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('articles.update',$article->id)}}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <img width='50px' class="profile-user-img img-fluid img-circle" style="float:right;"
                                    height='50px' src="/storage/{{$article->image}}">
                                <label for="exampleInputaddress">_Image</label>
                                <input type="hidden" value="{{$article->image}}" name="oldimg">
                                <input type="file" name="profile" class="form-control" id="exampleInputaddress"
                                    placeholder="Upload Image">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">Tile</label>
                                <input type="text" name="title" value="{{$article->title}}" class="form-control"
                                    id="exampleInputtitle" placeholder="Enter title">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Body</label>
                                <textarea class="textarea" id="exampleFormControlTextarea1" name="body"
                                    rows="3">{{$article->body}}</textarea>
                            </div>
                        </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">

    </div>
    <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection
@section('script')
<!-- Summernote -->
<script src="{{asset('control')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
    
@endsection