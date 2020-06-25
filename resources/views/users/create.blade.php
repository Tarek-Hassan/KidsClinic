@extends('admin.index')
@section('title','Users')
@section('section_title','Create User')
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('control')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('control')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

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

                    <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputaddress">Image</label>
                                <input type="file" name="profile" class="form-control" id="exampleInputarea"
                                    placeholder="Enter Image">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputname"
                                    placeholder="Enter Your Name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputemail"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group  ">
                                <label>Patients</label>
                                <select class="form-control select2 mb-2" name="patient_id">
                                    @foreach($patients as $patient)
                                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if((Auth::user()->role) == '2')
                            <div class="form-group">
                                Role
                                <select class="custom-select" name="role">
                                    <option value="0">User</option>
                                    <option value="1">Doctor</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Bio.</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="bio"
                                    rows="3"></textarea>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="exampleInputaddress">Mobile</label>
                                <input type="number" name="mobile" maxlength="14" class="form-control"
                                    id="exampleInputMobile" placeholder="Enter Mobile">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">National ID</label>
                                <input type="number" name="national_id" maxlength="14" class="form-control"
                                    id="exampleInputnational" placeholder="Enter National_ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputpassword"
                                    placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">password_confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="exampleInputpasswordcon" placeholder="REpeat Your password">
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
<!-- Select2 -->
<script src="{{asset('control')}}/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

</script>

@endsection
