@extends('admin.index')
@section('title','Articles')
@section('section_title','Create Article')
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
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputaddress">Image</label>
                                <input type="file" name="profile" class="form-control" id="exampleInputarea"
                                    placeholder="Enter Image">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputtitle"
                                    placeholder="Enter Your title">
                            </div>

                                             <div class="form-group">
                                <label for="exampleFormControlTextarea1">Body</label>
                                <textarea class="textarea" id="exampleFormControlTextarea1" name="body"
                                    rows="3"></textarea>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
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
