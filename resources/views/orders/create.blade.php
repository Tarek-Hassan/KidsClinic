@extends('admin.index')
@section('title','Orders')
@section('section_title','Create Orders')
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
                        <h3 class="card-title">Create Order</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{route('orders.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body orderbody">
                            <div id="clonediv">
                                <div class="my-2">
                                    <div class="form-group">
                                        <label for="exampleInputaddress">Product Name</label>
                                        <input type="text" name="order[1][product]" class="form-control product" 
                                            placeholder="Enter Your product Name">
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group col">
                                            <label for="exampleInputaddress">Price</label>
                                            <input type="number" name="order[1][price]" class="form-control price"
                                                 placeholder="Enter Your Price">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleInputaddress">Qty</label>
                                            <input type="number" name="order[1][qty]" class="form-control qty"
                                                 placeholder="Enter Your Qty">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="float-right mr-2 my-2">
                                    <span  class="btn btn-warning add">Add</span>
                                </div>
                            </div>


                        </div>
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
<script>
    $(function () {
        let i = 1;
        $('.orderbody').on('click','.add',function () {
            i++;
            var div=$("#clonediv").clone();
            div.addClass("div"+i)
            div.find(".product").attr("name","order["+i+"][product]").val("");
            div.find(".price").attr("name","order["+i+"][price]").val("");
            div.find(".qty").attr("name","order["+i+"][qty]").val("");
            div.append(
                        "<div class='float-right mr-2 my-2'>"+
                            "<button id='"+i+"' class='btn btn-danger remove'>remove</button>"+
                        "</div> "
                        );
            $('.orderbody').append(div);  
            // $('.orderbody').append(  
            //             "<div class='my-2' id='row"+i+"'>"+
            //                 "<div class='form-group'>"+
            //                  " <label for='exampleInputaddress'>Product Name</label>"+
            //                    " <input type='text' name='product[]' class='form-control' id='exampleInputtitle' placeholder='Enter Your product Name'>"+
            //                 "</div>"+
            //                 "<div class='form-group row'>"+
            //                     "<div class='form-group col'>"+
            //                       "  <label for='exampleInputaddress'>Price</label>"+
            //                        " <input type='number' name='price[]' class='form-control' id='exampleInputtitle' placeholder='Enter Your Price'>"+
            //                     "</div>"+
            //                     "<div class='form-group col'>"+
            //                      "   <label for='exampleInputaddress'>Qty</label>"+
            //                       "  <input type='number' name='qty[]' class='form-control' id='exampleInputtitle' placeholder='Enter Your Qty'>"+
            //                     "</div>"+
            //                 "</div>"+
            //           "<div class='float-right mr-2 my-2'>"+
            //                 "<button id='"+i+"' class='btn btn-danger remove'>remove</button>"+
            //             "</div> "+
            //             "</div> <hr/>"
            //             );
            $('.orderbody').on('click','.remove',function () {
                $('.div'+this.id).remove();
            });

        });
    })

</script>

@endsection
