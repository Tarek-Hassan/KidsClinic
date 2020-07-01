@extends('home.index')
@section('title','API')
@section('section_title','API Info.')
@section('content')
<div class="container my-3">
    <div class="card mb-3">
        <div class="col-12 mt-2">
            <h4>
                <a href="{{route('home')}}">

                    <i class="fas fa-baby fa-2x"></i> API
                    <small class="float-right">Date: {{now()}}</small>
                </a>
            </h4>
        </div>
        <div class="card-body">
            <span id="patient_id" value="{{$patient->id}}"></span>
            <p class="card-text"><strong class="mr-2">Name:-</strong> {{$patient->name}}</p>
            <p class="card-text"><strong class="mr-2">Age:-</strong>{{$patient->age}}</p>
            <p class="card-text"><strong class="mr-2">Number:-</strong>{{$patient->number}}</p>
            <p class="card-text"><strong class="mr-2">Blood Type:-</strong>{{$patient->bloodType()}}</p>
            <p class="card-text"><strong class="mr-2">Birth Type:-</strong>{{$patient->birthType()}}</p>
            <h5 class="card-title mr-5"><strong class="mr-2">DaD Job:-</strong>{{$patient->dad_job}}</h5>
            <h5 class="card-title mr-5"><strong class="mr-2">MuM Job:-</strong>{{$patient->mum_job}}</h5>
            <h5 class="card-title mr-5"><strong class="mr-2">phone:-</strong>{{$patient->phone}}</h5>
            <h5 class="card-title mr-5"><strong class="mr-2">address:-</strong>{{$patient->address}}</h5>
            <p class="card-text"><strong class="mr-2">notes:-</strong>{{$patient->notes}}</p>
            <p class="card-text"><strong class="mr-2">doctor Name:-</strong>{{$patient->user->name}}</p>
            <div class="row no-print">
                <div class="col-12">
                    <button onclick="window.print()" class="btn btn-warning"><i class="fas fa-print"></i>
                        Print</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>

                <th>Id.</th>
                <th>Date</th>
                <th>Patient Name</th>
                <th>Temp.</th>
                <th>Weight</th>
                <th>Length</th>
                <th>Head Circum.</th>
                <th>Notes</th>
                <th>Dr.Name</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

</body>
@endsection
@section('script')
<script type="text/javascript">
    var x = $('#patient_id').attr('value');
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/invoice',
            columns: [

                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'patient_id',
                    name: 'patient_id'
                },

                {
                    data: 'temp',
                    name: 'temp'
                },
                {
                    data: 'weight',
                    name: 'weight'
                },
                {
                    data: 'length',
                    name: 'length'
                },
                {
                    data: 'head_circ',
                    name: 'head_circ'
                },

                {
                    data: 'notes',
                    name: 'notes'
                },
                {
                    data: 'doctor_id',
                    name: 'doctor_id'
                },

            ]
        });

    });

</script>

@endsection
