@extends('layouts.app')
@section('head')

    <link rel="stylesheet" href="{{asset('chat/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('chat/css/style.css')}}">
@endsection
@section('content')

    <div class="conversation">
        @include('partials.peoplelist')
        <div class="chat">
            <div class="chat-header clearfix">
                @if(isset($user))
                    <img src="{{@$user->avatar}}" alt="avatar" />
                @endif
                <div class="chat-about">
                    @if(isset($user))
                        <div class="chat-with">{{'Chat with ' . @$user->name}}</div>
                    @else
                        <div class="chat-with">No Thread Selected</div>
                    @endif
                </div>
                <i class="fa fa-star"></i>
            </div> <!-- end chat-header -->

            <div class="chat-history">
                <ul id="talkMessages">

                    @foreach($messages as $message)
                        @if($message->sender->id == auth()->user()->id)
                            <li class="clearfix" id="message-{{$message->id}}">
                                <div class="message-data align-right">
                                    <span class="message-data-time" >{{$message->humans_time}} ago</span> &nbsp; &nbsp;
                                    <span class="message-data-name" >{{$message->sender->name}}</span>
                                </div>
                                <div class="message other-message float-right">
                                    {{$message->message}}
                                </div>
                            </li>
                        @else

                            <li id="message-{{$message->id}}">
                                <div class="message-data">
                                    <span class="message-data-name"> {{$message->sender->name}}</span>
                                    <span class="message-data-time">{{$message->humans_time}} ago</span>
                                </div>
                                <div class="message my-message">
                                    {{$message->toHtmlString()}}
                                </div>
                            </li>
                        @endif
                    @endforeach


                </ul>

            </div> <!-- end chat-history -->

            <div class="chat-message clearfix">
                <form action="" method="post" id="talkSendMessage">
                    <textarea name="message-data" id="message-data" placeholder ="Type your message" rows="3"></textarea>
                    <input type="hidden" name="_id" id="id" value="{{@request()->route('id')}}">
                    <button type="submit">Send</button>
                </form>

            </div> <!-- end chat-message -->

        </div>
    </div>

@endsection

@section('footer')

    <script>
        var __baseUrl = "{{url('/')}}"
    </script>



    <script src="{{asset('chat/js/talk.js')}}"></script>

    <script>
   
        var show = function(data) {
            alert(data.sender.name + " - '" + data.message + "'");
        }

        var msgshow = function(data) {
            var html = '<li id="message-' + data.id + '">' +
                '<div class="message-data">' +
                '<span class="message-data-name"> <a href="#" class="talkDeleteMessage" data-message-id="' + data.id + '" title="Delete Messag"><i class="fa fa-close" style="margin-right: 3px;"></i></a>' + data.sender.first_name+ ' '+data.sender.last_name + '</span>' +
                '<span class="message-data-time">1 Second ago</span>' +
                '</div>' +
                '<div class="message my-message">' +
                data.message +
                '</div>' +
                '</li>';

            $('#talkMessages').append(html);

            var objDiv = $('.chat-history');
            objDiv.scrollTo(objDiv.height());
        }

    </script>
    {!! talk_live(['user'=>["id"=>auth()->user()->id, 'callback'=>['msgshow']]]) !!}
@endsection
