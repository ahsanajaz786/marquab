<li class="clearfix" id="message-{{$message->id}}" >
                                <div class="message-data align-right" >
                                    <span class="message-data-time" >{{$message->humans_time}} ago</span> &nbsp; &nbsp;
                                </div>
                                <div class="message other-message float-right" style="background:#ddd">
                                    {{$message->message}}
                                </div>
                            </li>