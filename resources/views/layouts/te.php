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

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    

    <style>
        .navbar{
            margin-bottom: 0px;
        }
        .content-wrapper{
            padding:30px;
        }
        .navbar .navbar-nav li > a .badge{
            margin: 6px;
        }
    </style>
    @yield('head')

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
       
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
              
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    {{--<li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>--}}
                    @if(Auth::check())
                        @if(auth()->user()->role == 'Teacher')
                            <li>
                                <a href="{{route('calendar.index')}}"> <i class="menu-icon fa fa-calendar"></i>Calendar</a>
                            </li>
                            <li>
                                <a href="{{route('tutor.availability')}}"> <i class="menu-icon fa fa-dashboard"></i>Availability </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('profile.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Profile </a>
                        </li>
                        <li>
                            <a href="{{route('settings.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Settings </a>
                        </li>
                        <li>
                            <a href="{{route('find-tutor.index')}}"> <i class="menu-icon fa fa-calendar"></i>Find Tutor</a>
                        </li>
                        <li>
                            <a href="{{route('messages.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Messages </a>
                        </li>
                        <li>
                            <a href="{{route('lesson.index')}}"> <i class="menu-icon fa fa-dashboard"></i>My Lessons </a>
                        </li>
                        <li>
                        <h5 style="color:#c8c9ce !important;font-size: 14px">Tags</h5>
                       
                      
                      <li>
                        <h5 style="color: #c8c9ce !important;font-size: 12px;margin-top: 9px;">
                        <i class="fa fa-circle" style="color:#94bf16;font-size:12px"></i> First lesson</h5>
                      
                      </li>
                      <li>
                      <h5 style="color: #c8c9ce !important;font-size: 12px;margin-top:9px">  
                       <i class="fa fa-circle" style="color:#3bb3bd;font-size:12px"></i> Regular lesson</h5>
                      
                      </li>
                      <li>
                      <h5 style="color: #c8c9ce !important;font-size: 12px;margin-top: 9px;">   <i class="fa fa-check-circle " style="color:black;font-size: 12px"></i> Confirmed by student</h5>
                     
                      </li>
                      <li>
                        <h5 style="color: #c8c9ce !important;font-size: 12px;margin-top: 9px;">   
                         <i class="fa fa-check-circle  " style="color:#ccc;font-size:12px"></i> Not confirmed by student</h5>
                      
                      </li>



                    @endif
                    {{--<h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Icons</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>--}}
                    
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
            </button>
            
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::check())

                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span>{{ __('Credit: ') }}{{auth()->user()->credits->credit}}$</span></a>
                            </li>
                            {{-- Notifications --}}

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('notifications.index')}}">
                                    <span class="badge badge-danger" id="noti">{{auth()->user()->unreadNotifications->count()}}</span>
                                    <span class="fa fa-bell"></span>
                                </a>
                            </li>

                            {{--<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('notifications.index')}}"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="badge badge-danger" id="noti">{{auth()->user()->unreadNotifications->count()}}</span>
                                    <span class="fa fa-bell"></span>
                                </a>
                            </li>--}}
                        @endif
                    <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('footer')
</body>
</html>
