@extends('layouts.app')
@section('head')

@endsection
@section('content')
<h1>Pusher Test</h1>
<p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
</p>
@endsection
@section('footer')
    <script src="{{asset('js/jquery2.3.2.min.js')}}"></script>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('50990a33caa6e7793d9d', {
            cluster: "ap2",
            forceTLS: true
        });
        pusher.connection.bind('error', function(error) {
            console.log('connection error', error)
        });
        pusher.connection.bind('connected', function() {
            console.log('Realtime is go!');
        });

        var channel = pusher.subscribe('message-channel');
        channel.bind('message-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
@endsection
