@extends('admin.index')
@section('title','Appointment')
@section('section_title','Edit Appointment')
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
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form id="appointment-form" role="form" method="POST" action="{{route('appointments.update',$appointment->id)}}">
                        @csrf
                        @method('put')
                        <!-- SECTION TITLE -->
                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <div class="col-md-12 col-sm-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{$appointment->name}}" name="name" placeholder="Full Name">
                            </div>
                            <div class="row mx-1">
                                <div class="col-md-6 col-sm-6">
                                    <label for="date">Select Date</label>
                                    <input type="date" value="{{$appointment->time}}" name="time"  class="form-control">
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <label for="select">Select Department</label>
                                    <select class="form-control" name="dept">
                                        <option value="0" {{ $appointment->dept=='0' ? 'selected' : '' }}>General Health</option>
                                        <option value="1" {{ $appointment->dept=='1' ? 'selected' : '' }}>Cardiology</option>
                                        <option value="2"{{ $appointment->dept=='2' ? 'selected' : '' }}>Dental</option>
                                        <option value="3"{{ $appointment->dept=='3' ? 'selected' : '' }}>Medical Research</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="select">Check</label>
                                    <select class="form-control" name="checked">
                                        <option value="0" {{ $appointment->checked=='0' ? 'selected' : '' }}>Refuse</option>
                                        <option value="1" {{ $appointment->checked=='1' ? 'selected' : '' }}>Accepte</option>

                                    </select>
                                </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="telephone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" value="{{$appointment->phone}}" name="phone" placeholder="Phone">

                                <label for="Message">Additional Message</label>
                                <textarea class="form-control" rows="5" id="message" name="notes"
                                    placeholder="Message">{{$appointment->notes}}</textarea>
                                <button type="submit" class="form-control btn btn-info" id="cf-submit">Update</button>
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
