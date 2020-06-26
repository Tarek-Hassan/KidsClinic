@extends('admin.index')
@section('title','schedule')
@section('section_title','schedule')
@section('content')

<div class="container my-3">
    <a href="{{route('schedule.create')}}" class="edit btn btn-primary btn-sm mb-3">Add Schedule Time </a>
    <a href="{{route('calender.index')}}" class="edit btn btn-warning btn-sm mb-3 float-right">Show In  <i class="nav-icon far fa-calendar-alt"></i> </a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id.</th>
                <th>Title</th>
                <th>Start Time</th>
                <th>End Time</th>
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
            ajax: "{{ route('schedule.index') }}",
            columns: [
                  
              {
                    data: 'id',
                    name: 'id'
                },
              {
                    data: 'title',
                    name: 'title'
                },
              {
                    data: 'start',
                    name: 'start'
                },
              {
                    data: 'end',
                    name: 'end'
                },
                // {
                //     data: 'avatar',
                //     name: 'avatar',
                //     //render:function(data){ return "<img width='50px' height='50px' src='/storage/"+ data + "' />";}
                //     render:function(data){ return "<img width='50px' height='50px' src='"+ data + "' />";}

                // },
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
            deleteForm.action = '/admin/schedule/' + id; // assign action 
        });
    });

</script>

@endsection 