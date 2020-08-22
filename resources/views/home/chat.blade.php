        <div class="row">
            <div class="col">
                <ul class="list-unstyled">
                    @foreach($doctors as $doctor)
                    <li class="media user " id="{{$doctor->id}}">
                        {{-- @if($doctor->unread) --}}
                        <span class="badge badge-warning ">{{-- $doctor->unread --}}</span>
                        {{-- @endif --}}
                        @if($doctor->id != Auth::user()->id)

                        <img style="width:50px; hight:50;" src="/storage/{{$doctor->avatar}}" class="img-responsive"
                            alt="">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"> {{$doctor->name}}</h5>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
         
            <div class="chat">

            </div>

        </div>
        {{-- </div> --}}

        @section('script')
        <script src="https://js.pusher.com/6.0/pusher.min.js"></script>

        <script type="text/javascript">
                    var id={{Auth::id()}};
            var receiver_id='';
            // Enable pusher logging - don't include this in production
                        Pusher.logToConsole = true;

                    var pusher = new Pusher('1fe3c045c46b5508295a', {
                    cluster: 'eu'
                    });

                    var channel = pusher.subscribe('my-channel');
                    channel.bind('my-event', function(data) {
                        if ( id == data.from) {
                            $('#' + data.to).click();
                        } else if (id == data.to) {
                            $('#' + data.from).click();
                        }
                    });



            
            $(document).ready(function () {
                $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

                $('.user').click(function () {
                    receiver_id = $(this).attr('id');
                    $('.user').removeClass('alert alert-secondary');
                    $(this).addClass('alert alert-secondary');
                    $(".chat").empty();
                    $(".chat").append(
                        '<div class="col card card-prirary cardutline direct-chat direct-chat-primary">' +
                            '<div class="card-header">' +
                                '<h3 class="card-title">Direct Chat</h3>' +
                                    '<div class="card-tools">' +
                                        '<span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">3</span>' +
                                        '<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>' +
                                        '</button>' +
                                        '<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>' +
                                        '</button>' +
                                    '</div>' +
                            '</div>' +
                            '<div class="card-body">' +
                                '<div class="direct-chat-messages">' +
                                   

                          '</div>' +
                               
                            '</div>' +

                        '</div>' +
                        '<div class="card-footer">' +
                            

                                '<div class="input-text">' +
                                    '<input type="text" id="chat" name="message" placeholder="Type Message ..." class="form-control submit">' +
                                '</div>' +
                            

                        '</div>' +

                    '</div>' +
                '</div>'
                    );
                    $.ajax({
                        url: "/message",
                        type: "GET",
                        data: {
                            rec_id: $(this).attr("id"),
                        }
                    }).done(function (data) {
                        $.each(data.message, function (key, value) {
                            if( id == value.from){
                                $(".direct-chat-messages").append(
                                    '<div class="direct-chat-msg">' +
                                            '<div class="direct-chat-infos clearfix">' +
                                                '<span class="direct-chat-name float-left">{{ Auth::user()->name}}</span>' +
                                                '<span class="direct-chat-timestamp float-right">{{ date("d M y, h:i a", strtotime(now()))}}</span>' +
                                            '</div>' +
                                            '<img class="direct-chat-img" src="/storage/{{Auth::user()->avatar}}" alt="Message User Image">' +
                                            '<div class="direct-chat-text">' + value.body+'</div>' 
                                );
                            } else{
                                $(".direct-chat-messages").append(
                                    '<div class="direct-chat-msg right">' +
                                            '<div class="direct-chat-infos clearfix">' +
                                                '<span class="direct-chat-name float-right">'+data.name+'</span>' +
                                                '<span class="direct-chat-timestamp float-left">{{ date("d M y, h:i a", strtotime(now())) }}</span>' +
                                            '</div>' +
                                            '<img class="direct-chat-img" src="/storage/'+ data.avatar +'" alt="Message User Image">' +
                                            '<div class="direct-chat-text">' + value.body+'</div>' 
                                );
                            }



                        });
                    }).fail(function (data) {
                        console.log("fail");
                        console.log(data);
                    });

                  

                });

            });
            $(document).on('keyup', '.input-text input', function (e) {
               var message = $(this).val();
                
               // check if enter key is pressed and message is not null also receiver is selected
               if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    
                    $(this).val(''); 
                    $.ajax({
                        url: "/message",
                        method: "Post",
                        data: {
                            body:message,
                            to:receiver_id,
                        }
                    }).done(function (data) {
 
                       
                    }).fail(function (data) {
                        console.log("fail");
                        console.log(data);
                    });
               }
            });
             

        </script>
        @endsection
