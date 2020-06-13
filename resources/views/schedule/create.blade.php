@extends('admin.index')
@section('title','Patients')
@section('section_title','Create Patient')
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
                        <h3 class="card-title">Create Patient</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{route('patients.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputaddress">name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputname"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="row mb-3">
                                <div class="col input-group">
                                    <input type="number" class="form-control" id="age" autofocus placeholder="Enter Age"
                                        name="age">
                                </div>
                                <div class="col input-group">
                                    <input type="number" class="form-control" id="number" type="text" autofocus
                                        placeholder="Enter his Number" name="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">DaD Job</label>
                                <input type="text" name="dad_job" class="form-control" id="exampleInputdad_job"
                                    placeholder="Enter Your DaD Job">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">Mum Job</label>
                                <input type="text" name="mum_job" class="form-control" id="exampleInputmum_job"
                                    placeholder="Enter Your Mum Job">
                            </div>


                            <div class="form-group">
                                Blood Type
                                <select class="custom-select" name="blood_type">
                                    <option value="0">O+</option>

                                    <option value="1">O-</option>
                                    <option value="2">A+</option>
                                    <option value="3">A-</option>
                                    <option value="4">B+</option>
                                    <option value="5">B-</option>

                                    <option value="6">AB+</option>
                                    <option value="7">AB-</option>


                                </select>
                            </div>
                            <div class="form-group">
                                Birth Type
                                <select class="custom-select" name="birth_type">


                                    <option value="0">Natural childbirth</option>
                                    <option value="1">Caesarean delivery</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">Phone</label>
                                <input type="number" name="phone" maxlength="14" class="form-control"
                                    id="exampleInputPhone" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputAddress"
                                    placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Notes</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
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
