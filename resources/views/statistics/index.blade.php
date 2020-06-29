@extends('admin.index')
@section('title','Statistics')
{{-- @section('section_title','Statistics') --}}
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid ">




        <!-- PIE CHART -->
        <div class="card card-info my-3">
            <div class="card-header">
                <h3 class="card-title">​
                    @if(Auth::user()->role=='1')
                    Top Patient visits
                    @endif
                    @if(Auth::user()->role=='2')
                    Top Doctor visits
                    @endif
                </h3>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="pieChart_order"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

        </div>
        <!-- /.card -->
        @if(Auth::user()->role=='1')
        <!-- PIE CHART -->
        <div class="card card-warning my-3">
            <div class="card-header">
                <h3 class="card-title">​ Top Age vists </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="pieChart_age"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

        </div>
        <!-- /.card -->
        @endif
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('script')

<script>
    $(function () {
        //-------------
        //- PIE CHART-pieChart_TO 
        // -top10 patient visits -> tothe doctor
        // -top10 doctor visits -> tothe Admin 
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var count = < ? php echo json_encode($count) ? > ;
        var name = < ? php echo json_encode($name) ? > ;
        var pieChartCanvas = $('#pieChart_order').get(0).getContext('2d')
        var pieData = {
            labels: name,
            datasets: [{
                data: count,
                backgroundColor: ['#f39c12', '#00c0ef', '#f56954', '#00a65a', '#3c8dbc', '#9932CC',
                    '#E9967A', '#A52A2A', '#DEB887', '#BDB76B',
                ],
            }]
        };
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
        //-------------
        //- PIE CHART-pieChart_TO 
        // -top10 Age visits -> tothe doctor
        // 
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var count = < ? php echo json_encode($countAge) ? > ;
        var name = < ? php echo json_encode($age) ? > ;
        var pieChartCanvas = $('#pieChart_age').get(0).getContext('2d')
        var pieData = {
            labels: name,
            datasets: [{
                data: count,
                backgroundColor: ['#f56954', '#A52A2A', '#DEB887', '#BDB76B', ],
            }]
        };
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })




    })

</script>
@endsection
