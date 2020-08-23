@extends('layouts.front')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">

                <div class="card-body mt-2 login">
                    <div class="row col">
                        <h2 class="card-heading">Login </h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row col form-group login-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" placeholder="@xyz" id="email" type="email" class="form-control input-login  " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        </div>



                        <div class="row col form-group mt-2  login-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" placeholder="**********" id="password" type="password" class="form-control input-login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                        </div>




                        <div class="row col mt-2" style="margin:0">

                            <button type="submit" class="btn btn-primary btn-lg btn-block btn-login"> Login
                            </button>


                        </div>
                        
                    </form>
                    <div class="line">
                        <hr>

                    </div>
                   
                    <div class="row col mt-2" style="margin:0">

                        <button type="button" class="btn btn-primary btn-lg btn-block btn-google">
                            <img src="{{asset('images/google.svg')}}" style="width:35px" /> Sign Up with Google
                        </button>
                        <button type="button" class="btn btn-primary btn-lg btn-block btn-fb">
                            <img src="{{asset('images/fb-btn.svg')}}" style="width:35px" />
                            Sign Up with Facebook
                        </button>

                    </div>
                   


                 

                </div>
            </div>
        </div>
    </div>
    
    </div>
    <div class="footer " style="margin-top:50px">
        <div class="row footer-row">
            <div class="col-md-4">
                <p class="title">Marqab</p>
                <p class="desc">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta.
                </p>
            </div>
            <div class="col-md-2 about">
                <h2 class="list-title">About Us

                </h2>
                <ul class="list-group list">
                    <li class="list-group-item"><a href="">Help</a></li>
                    <li class="list-group-item"> <a href="">How to Work</a></li>
                    <li class="list-group-item"><a href="">Scholarship</a></li>
                    <li class="list-group-item"><a href="">Education partners</a></li>
                    <li class="list-group-item"><a href="">We are hiring!</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h2 class="list-title">Learn

                </h2>
                <ul class="list-group list">
                    <li class="list-group-item"><a href="">Learn</a></li>
                    <li class="list-group-item"> <a href="">Questions and Answers</a></li>
                    <li class="list-group-item"><a href="">Find a private tutor</a></li>
                    <li class="list-group-item"><a href="">Affiliate program</a></li>
                    <li class="list-group-item"><a href="">Referral program!</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h2 class="list-title">Job opportunities

                </h2>
                <ul class="list-group list">
                    <li class="list-group-item"><a href="">Become a tutor</a></li>
                    <li class="list-group-item"> <a href="">Tutoring jobs</a></li>
                   
                </ul>
            </div>
            <div class="col-md-2">
                <h2 class="list-title">Follow Us

                </h2>
                <div class="row social-link">
                <img class="img" src="{{asset('images/fb.svg')}}"  />
                <img class="img" src="{{asset('images/tw.svg')}}"  />
                <img class="img" src="{{asset('images/ld.svg')}}"  />
                <img  class="img" src="{{asset('images/ig.svg')}}"  />
                </div>
            </div>

        </div>
    </div>
    <div class="footer-copy">
        <div class="row">
            <div class="col">
           <p> © 2020 Marqab .All Rights Reserved. </p>

            </div>
            <div class="col">
                <p class="pull-right">Privacy Policy    |     Terms and Conditions</p>
            </div>
        </div>

    </div>
@endsection
