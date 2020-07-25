$(document).ready(function () {

    var objDiv = $('.chat-history');
    objDiv.animate({scrollTop: $('#talkMessages').height()})
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     var input = document.getElementById("message-data");
     input.addEventListener("keyup", function(e) {
       if (e.keyCode === 13) {
        $('#talkSendMessage').submit()
       }
     });

    $('#talkSendMessage').on('submit', function(e) {
        console.log(e)
        e.preventDefault();
        var url, request, tag, data;
        tag = $(this);
        
        url = __baseUrl + '/ajax/message/send';
        data = tag.serialize();

        request = $.ajax({
            method: "post",
            url: url,
            data: data
        });

        request.done(function (response) {
            if (response.status == 'success') {
                $('#talkMessages').append(response.html);
                tag[0].reset();

                var objDiv = $('.chat-history');
                objDiv.animate({scrollTop: $('#talkMessages').height()})
            }
        });

    });


    $('body').on('click', '.talkDeleteMessage', function (e) {
        e.preventDefault();
        var tag, url, id, request;

        tag = $(this);
        id = tag.data('message-id');
        url = __baseUrl + '/ajax/message/delete/' + id;

        if(!confirm('Do you want to delete this message?')) {
            return false;
        }

        request = $.ajax({
            method: "post",
            url: url,
            data: {"_method": "DELETE"}
        });

        request.done(function(response) {
           if (response.status == 'success') {
                $('#message-' + id).hide(500, function () {
                    $(this).remove();
                });
           }
        });
    })
});
