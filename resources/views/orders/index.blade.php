@extends('admin.index')
@section('title','Orders')
@section('section_title','Orders')
@section('content')

<div class="container my-3">
    <a href="{{route('orders.create')}}" class="edit btn btn-primary btn-sm mb-3">Add Order</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id.</th>
                <th>Product</th>
                <th>price</th>
                <th>qty</th>
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
            ajax: "{{ route('orders.index') }}",
            columns: [
              {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'product',
                    name: 'product',

                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'qty',
                    name: 'qty',
                    
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
            deleteForm.action = '/admin/orders/' + id; // assign action 
        });
    });

</script>
@endsection 