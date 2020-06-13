@extends('admin.index')
@section('title','Patients')
@section('section_title','Patient')
@section('content')
<div class="container my-3">
<div class="card text-white bg-info mb-3">
  <h5 class="card-header">Patient Info.</h5>
  <div class="card-body">
  <span  id="patient_id"   value="{{$patient->id}}"></span>
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
    <p class="card-text"><strong class="mr-2">doctor_id:-</strong>{{$patient->user->name}}</p>
     <a href="{{route('visits.create',$patient->id)}}" class="edit btn btn-warning btn-sm mb-3">new Visit</a>
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
                <!-- <th width="100px">Action</th> -->
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!---------------------startForm  ------------------------------------>
<!-- alret form to confirm delete  -->
<div class="modal model-danger fade" id="delete" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content confirmModal">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form method="post" action="" id="formdelete">
                <div class="modal-body">

                    @csrf
                    @method('delete')
                    <div>
                        <div class="box-body">
                            <p class="text-center">Are u sure want to delete?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">No, cancel</button>
                    <button type="submit" class="btn btn-success">Yes,
                        Delete</button>
                </div>
            </form>
            <!--  -->


        </div>
    </div>
</div>
<!---------------------end form  ------------------------------------>
</body>
@endsection
@section('script')
<script type="text/javascript">
        var x=$('#patient_id').attr('value');
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/patients/'+x,
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
                //  {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false,
                //     searchable: false
                // },
            ]
        });
        $(document).on("click", ".del", function () {
            var id = $(this).data('id');
            var deleteForm = document.getElementById("formdelete") // get form 
            deleteForm.action = '/admin/vistis/' + id; // assign action 
        });
    });

</script>

@endsection 