@extends('admin.index')
@section('title','Profile')
@section('section_title','Profile')
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
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                    {{--   if( strpos( $row->avatar, 'images' ) !== false) {
                                return "/storage/$row->avatar";
                            }
                            else{
                                return $row->avatar;
                            } --}}
                        @csrf
                        @method('put')
                        <div class="card-body">
                             <div class="form-group">
                                <img width='50px' class="profile-user-img img-fluid img-circle" style="float:right;" height='50px' src="{{ strpos( $user->avatar, 'images' ) ? "$user->avatar" : "/storage/$user->avatar" }}">
                                <label for="exampleInputaddress">_Image</label>
                                <input type="hidden" value="{{$user->avatar}}" name="oldimg">
                                <input type="file" name="profile" class="form-control" id="exampleInputaddress"
                                    placeholder="Upload Image">
                            </div> 

                            <div class="form-group">
                                <label for="exampleInputaddress">Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">Email</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control"
                                    id="exampleInputemail" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                Role
                                <select class="custom-select" name="role">
                                    <option value="0" {{ $user->role=='0' ? 'selected' : '' }}> User </option>
                                    <option value="1" {{ $user->role=='1' ? 'selected' : '' }}> Doctor </option>
                                    <option value="2" {{ $user->role=='2' ? 'selected' : '' }}> Admin </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMobile">Mobile</label>
                                <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control"
                                    id="exampleInputMobile" placeholder="Enter Mobile">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputnational">National ID</label>
                                <input type="text" name="national_id" value="{{$user->national_id}}"
                                    class="form-control" id="exampleInputnational" placeholder="Enter National_ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputpassword">Password</label>
                                <input type="password" name="password" value="{{$user->password}}" class="form-control"
                                    id="exampleInputpassword" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputpassword_confirmation">password_confirmation</label>
                                <input type="password" name="password_confirmation" value="{{$user->password}}" class="form-control"
                                    id="exampleInputpassword_confirmation" placeholder="Confirm Password">
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
