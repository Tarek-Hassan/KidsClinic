@extends('admin.index')
@section('title','Setting')
@section('section_title','Setting')
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
                        <h3 class="card-title">Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('setting.update')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                                                    <div class="form-group">
                                <label for="exampleInputMobile">Mobile</label>
                                <input type="text" name="phone" value="{{$setting->phone}}" class="form-control"
                                    id="exampleInputMobile" placeholder="Enter Mobile">
                            </div>
                                                        <div class="form-group">
                                <label for="exampleInputaddress">Email</label>
                                <input type="text" name="email" value="{{$setting->email}}" class="form-control"
                                    id="exampleInputemail" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Body</label>
                                <textarea class="textarea" id="exampleFormControlTextarea1" name="body"
                                    >{{$setting->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Time Of Work</label>
                                <textarea class="textarea" id="exampleFormControlTextarea" name="worktime"
                                    >{{$setting->worktime}}</textarea>
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
