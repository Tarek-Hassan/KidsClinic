@extends('admin.index')
@section('title','Patient')
@section('section_title','Patient')
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
                        <h3 class="card-title">Edit patient</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('patients.update',$patient->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputaddress">Name</label>
                                <input type="text" name="name" value="{{$patient->name}}" class="form-control"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                            <div class="row mb-3">
                                <div class="col input-group">
                                    <input type="number" class="form-control" value="{{$patient->age}}" id="age"
                                        autofocus placeholder="Enter Age" name="age">
                                </div>
                                <div class="col input-group">
                                    <input type="number" class="form-control" value="{{$patient->number}}" id="number"
                                        type="text" autofocus placeholder="Enter his Number" name="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">DaD Job</label>
                                <input type="text" name="dad_job" value="{{$patient->dad_job}}" class="form-control"
                                    id="exampleInputdad_job" placeholder="Enter Your DaD Job">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">Mum Job</label>
                                <input type="text" name="mum_job" value="{{$patient->mum_job}}" class="form-control"
                                    id="exampleInputmum_job" placeholder="Enter Your Mum Job">
                            </div>
                            <div class="form-group">
                                Blood Type
                                <select class="custom-select" name="blood_type">
                                    <option value="0" {{ $patient->blood_type=='0' ? 'selected' : '' }}>O+</option>
                                    <option value="1" {{ $patient->blood_type=='1' ? 'selected' : '' }}>O-</option>
                                    <option value="2" {{ $patient->blood_type=='2' ? 'selected' : '' }}>A+</option>
                                    <option value="3" {{ $patient->blood_type=='3' ? 'selected' : '' }}>A-</option>
                                    <option value="4" {{ $patient->blood_type=='4' ? 'selected' : '' }}>B+</option>
                                    <option value="5" {{ $patient->blood_type=='5' ? 'selected' : '' }}>B-</option>

                                    <option value="6" {{ $patient->blood_type=='6' ? 'selected' : '' }}>AB+</option>
                                    <option value="7" {{ $patient->blood_type=='7' ? 'selected' : '' }}>AB-</option>


                                </select>
                            </div>
                            <div class="form-group">
                                Birth Type
                                <select class="custom-select" name="birth_type">


                                    <option value="0" {{ $patient->birth_type=='0' ? 'selected' : '' }}>Natural
                                        childbirth</option>
                                    <option value="1" {{ $patient->birth_type=='1' ? 'selected' : '' }}>Caesarean
                                        delivery</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">Phone</label>
                                <input type="number" name="phone" value="{{$patient->phone}}" maxlength="14"
                                    class="form-control" id="exampleInputphone" placeholder="Enter phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputaddress">Address</label>
                                <input type="text" name="address" value="{{$patient->address}}" class="form-control"
                                    id="exampleInputAddress" placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Notes</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
                                    rows="3">{{$patient->notes}}"</textarea>
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
