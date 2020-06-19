<!DOCTYPE html>
<html>

<head>
    <title>schedule</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('control')}}/dist/css/adminlte.min.css">
    <script src="{{asset('control')}}/plugins/chart/Chart.min.js"></script>
    <!-- jQuery -->
    <script src="{{asset('control')}}/plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{asset('control')}}/dist/js/adminlte.js"></script>
    <script src="{{asset('control')}}/dist/js/pages/dashboard3.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('control')}}/dist/css/fontsgoogleapis.css" rel="stylesheet">
    <script src="{{asset('control')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('control')}}/dist/js/demo.js"></script>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<!--  -->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.navbar')
        <!-- /.navbar -->
        @include('admin.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Create schedule</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row card">

                        <div class="card-body">
                            <a href="{{route('schedule.create')}}" class="edit btn btn-primary btn-sm mb-3">Add
                                schedule</a>

                        </div>
                        <!-- /input-group -->

                        <div class="response  mx-3 "></div>
                        <div id='calendar'></div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</body>
<script>
    $(document).ready(function () {
        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: 'calender',
            displayEventTime: true,
            editable: true,
            eventRender: function (event, element, view) {
            },
            selectable: true,
            selectHelper: true,
            // select: function (start, end, allDay) {
            //     var date = new Date()
            //     var d = date.getDate(),
            //         m = date.getMonth(),
            //         y = date.getFullYear()

            //     var title = prompt('Event Title:');
            //     if (title) {
            //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            //         var end = new Date(y, m, d + 2, 19, 0);
            //         var color = $(".eventColor").attr('value');
            //         console.log(color);


            //         $.ajax({

            //             url: 'calender/store',
            //             data: 'title=' + title + '&start=' + start + '&end=' + end +
            //                 '&color=' + color,
            //             type: "POST",
            //             success: function (data) {
            //                 displayMessage("Added Successfully");
            //             },
            //             error: function (jqXhr, textStatus,
            //                 errorMessage) { // error callback 
            //                 $('p').append('Error: ' + errorMessage);
            //             }
            //         });
            //         calendar.fullCalendar('renderEvent', {
            //                 title: title,
            //                 start: start,
            //                 color: color,
            //                 end: end,
            //                 allDay: allDay
            //             },
            //             true
            //         );
            //     }
            //     calendar.fullCalendar('unselect');
            // },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: 'calender/update',
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end +
                        '&id=' + event.id,
                    type: "POST",
                    success: function (response) {
                        displayMessage("Updated Successfully");
                    }
                });
            },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: 'calender/delete',
                        data: "&id=" + event.id,
                        success: function (response) {
                            if (parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            }
        });
    });

    function displayMessage(message) {
        console.log(message);
        $(".response").addClass("alert alert-success");
        $(".response").html("" + message + "");
        setInterval(function () {
            $(".success").fadeOut();
        }, 1000);
    }

</script>

</html>
