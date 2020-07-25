@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('chat/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('chat/css/style.css')}}">
@endsection
@section('content')
    <div class="all-threads" style="height:300px">
        @include('partials.peoplelist')
    </div>
@endsection
@section('footer')
    <script src="{{asset('chat/js/talk.js')}}"></script>
@endsection
