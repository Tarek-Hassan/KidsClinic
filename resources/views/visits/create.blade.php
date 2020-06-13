@extends('admin.index')
@section('title','Visits')
@section('section_title','Create Visits')
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
                        <h3 class="card-title">Create Visits</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{route('patients.visits.store',$patient->id)}}" enctype="multipart/form-data">
                    {{-- <form method="POST" action="{{route('patients.visits.store',2)}}" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="card-body">

                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputaddress">temperature</label>
                                    <input type="number" class="form-control" id="temp" autofocus placeholder="Enter temp"
                                        name="temp">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="exampleInputaddress">weight</label>
                                    <input type="number" class="form-control" id="weight" type="text" autofocus
                                        placeholder="Enter  weight" name="weight">
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                <label for="exampleInputaddress">length</label>
                                    <input type="number" class="form-control" id="length" autofocus placeholder="Enter length"
                                        name="length">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="exampleInputaddress">Head Circum</label>
                                    <input type="number" class="form-control" id="head_circ" type="text" autofocus
                                        placeholder="Enter Head Circum" name="head_circ">
                                </div>
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
