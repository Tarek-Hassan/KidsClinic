@extends('admin.index')
@section('title','Patients')
@section('section_title','Patients')
@section('content')
<div class="container my-3">
    <a href="{{route('patients.create')}}" class="edit btn btn-primary btn-sm mb-3">Add Patient</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>

                <th>Id.</th>
                {{-- <th>Avatar</th> --}}
                <th>Name</th>
                <th>Date</th>
                <th>Age</th>
                <th>Blood Type</th>
                <th>Birth Type</th>
                <th>Number</th>
                <th>Notes</th>
                <th>Dr.Name</th>
                <th width="100px">Action</th>
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
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('patients.index') }}",
            columns: [

              {
                    data: 'id',
                    name: 'id'
                },
                // {
                //     data: 'avatar',
                //     name: 'avatar',
                //     //render:function(data){ return "<img width='50px' height='50px' src='/storage/"+ data + "' />";}
                //     render:function(data){ return "<img width='50px' height='50px' src='"+ data + "' />";}

                // },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'age',
                    name: 'age'
                },
                {
                    data: 'blood_type',
                    name: 'blood_type'
                },
                {
                    data: 'birth_type',
                    name: 'birth_type'
                },
                {
                    data: 'number',
                    name: 'number'
                },
                {
                    data: 'notes',
                    name: 'notes'
                },
                {
                    data: 'doctor_id',
                    name: 'doctor_id'
                },
                 {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $(document).on("click", ".del", function () {
            var id = $(this).data('id');
            var deleteForm = document.getElementById("formdelete") // get form 
            deleteForm.action = '/admin/patients/' + id; // assign action 
        });
    });
</script>
@endsection 