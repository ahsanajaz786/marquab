@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/chat.css')}}" />
@endsection
@section('content')
    <div class="chat-wrapper">
        <div class="container">
            <h3>Chat with {{$user->name}}</h3>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="mesgs">
                        <div class="msg_history">
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" placeholder="Type a message"/>
                                <button class="msg_send_btn" type="button" onclick="sendMessage()">
                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        let userId = '{{$user->id}}'
        let chatSelector = $('.msg_history')
        let profilePic = '{{$profilePic}}'
        let isSending = false
        let pageNo = 1
        let html = ``
        $(document).ready(function () {
            getMessages()
        })
       
      
        
      
        function sendMessage() {
            if(isSending)
                return
            isSending = true
            let message = $('.write_msg')
            $.ajax({
                url: '{{route('messages.send.post','')}}/'+userId,
                method: 'POST',
                data: {'_token': '{{csrf_token()}}', 'message': message.val(), 'user_id': userId},
                success: function (response) {
                    message.val('')
                    appendOutgoing(response.message)
                    isSending = false
                },
                error: (err) => alert(err.error)
            })
        }
        function getMessages() {

            $.ajax({
                url: '{{route('messages.get','')}}/'+userId+'/'+pageNo,
                method: 'GET',
                success: function (response) {
                    let objLength = response.messages.length - 1
                    if(objLength < 0)
                        return
                    let val = {}
                    html = ''
                    for(let index = objLength; index >= 0 ; index--){
                        val = response.messages[index]
                        if(val.is_sender == 0){
                            appendIncomming(val)
                        }else{
                            appendOutgoing(val)
                        }
                    }
                    appendHtmlToBody()
                    pageNo++
                },
                error: (err) => alert(err.error)
            })
        }
        function appendIncomming(val) {
            html += `<div class="incoming_msg">
                            <div class="incoming_msg_img">
                                <img src="${profilePic}" alt="Pic">
                            </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>${val.body}</p>
                                    <span class="time_date">${val.created_at}</span>
                                </div>
                            </div>
                        </div>`
        }
        function appendOutgoing(val) {
            html += `<div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>${val.body}</p>
                                <span class="time_date">${val.created_at}</span>
                            </div>
                        </div>`
        }
        function appendHtmlToBody() {
            if(html != ''){
                if(pageNo > 1)
                    chatSelector.prepend(html)
                else
                    chatSelector.append(html)
            }
        }
    </script>
@endsection
