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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/reg_style.css')}}">



    <style>

    </style>
    @yield('head')

</head>

<body class="about-page">
    <!-- Left Panel -->

    <div class="registration-sidebr">
        <div class="content">
            <ul class="list-group step">
                <li class="list-group-item">
                    <div class="rounded-circle number icon">1</div><a href="#about-section">About</a>
                </li>
                <li class="list-group-item">
                    <div class="rounded-circle number icon">2</div><a href="#description-section">Description</a>
                </li>
                <li class="list-group-item">
                    <div class="rounded-circle number icon">3</div><a href="#availability-section">Availability</a>
                </li>
                <li class="list-group-item">
                    <div class="rounded-circle number icon">4</div><a href="#photo-section">Photo/Video</a>
                </li>
                <li class="list-group-item">
                    <div class="rounded-circle number icon">5</div><a href="#verification-section">Verification</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Right panel -->

    <div class="content-wrapper right-panel">

        <div class="col-md-11">
            @yield('content')

        </div>
    </div>
    
    
    @yield('script')
</body>

</html>