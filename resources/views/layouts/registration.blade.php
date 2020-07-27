<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/reg_style.css')}}">


    <style>

    </style>
    @yield('head')

</head>

<body class="about-page">
<!-- Left Panel -->
<div class="row">
    <div class="col" style="max-width: 30%">
        <div class="registration-sidebr">
            <div class="content-wrapper">
                <div class="content">
                    <ul class="list-group step">
                        <li class="list-group-item">
                            <div class="rounded-circle number icon">1</div>
                            <a href="javascript:void(0)" data-section="about">About</a>
                        </li>
                        <li class="list-group-item">
                            <div class="rounded-circle number icon">2</div>
                            <a href="javascript:void(0)" data-section="descrption">Description</a>
                        </li>
                        <li class="list-group-item">
                            <div class="rounded-circle number icon">3</div>
                            <a href="javascript:void(0)" data-section="availability">Availability</a>
                        </li>
                        <li class="list-group-item">
                            <div class="rounded-circle number icon">4</div>
                            <a href="javascript:void(0)" data-section="Profile-image">Photo/Video</a>
                        </li>
                        <li class="list-group-item">
                            <div class="rounded-circle number icon">5</div>
                            <a href="javascript:void(0)" data-section="profile-Verification">Verification</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="content-wrapper right-panel">

            @yield('content')

        </div>

    </div>
</div>

<!-- Right panel -->


@yield('script')
</body>

</html>
