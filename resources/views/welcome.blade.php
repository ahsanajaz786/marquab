@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">

                <div class="card-body mt-4 login">
                    <div class="row col">
                        <h2 class="card-heading">Teach Online with Marqab </h2>
                    </div>
                    <div class="row col mt-2">
                        <h6 class="card-descrption">
                            Register now to share your knowledge and earn mony online from the comfort of your home

                        </h6>
                    </div>
                    <div class="row col mt-4" style="margin:0">

                        <button type="button" class="btn btn-primary btn-lg btn-block btn-google">
                            <img src="{{asset('images/google.svg')}}" style="width:35px" /> Sign Up with Google
                        </button>
                        <button type="button" class="btn btn-primary btn-lg btn-block btn-fb">
                            <img src="{{asset('images/fb-btn.svg')}}" style="width:35px" />
                            Sign Up with Facebook
                        </button>

                    </div>
                    <div class="line">
                        <hr>

                    </div>


                    <form method="POST" >
                        @csrf
                        <div class="row col form-group login-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" placeholder="@xyz" id="email" type="email" class="form-control input-login  " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        </div>



                        <div class="row col form-group mt-4  login-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" placeholder="**********" id="password" type="password" class="form-control input-login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                        </div>




                        <div class="row col mt-2" style="margin:0">

                            <button type="button" class="btn btn-primary btn-lg btn-block btn-login"> Create My Acccount
                            </button>


                        </div>
                        <div class="row col mt-2">
                            <h4 class="card-trems">
                                By clicking Sign up with, you agree to our Terms of <u>Service</u> and
                                <br><u> Peivacy Policy</u>
                            </h4>
                        </div>




                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row banner">

        <div class="row">
            <div class="col-sm-4" style="margin-top: 10% !important;height:200px ">
                <h1 class="font-weight-bold" style="font-size: 2.3125rem !important">Earn weekly upto $600</h1>
                <h1 class="" style="font-size: 2.3125rem !important">with Marqab</h1>

                <p style="font-size: 1.5rem !important;color:#686868 !important;width:90%">
                    Earn a full-time income on our plateform used by the world-s best online teachers to reach millions of students worlidwide


                    <p>
                        <button type="button" class="btn btn-primary btn-lg btn-learn-more">Learn More

            </div>
            <div class="col-sm-8 ">
                <img src="{{asset('images/home-img.png')}}" />
            </div>
        </div>
    </div>
</div>
<div class="mt-5 teach-us ">
    <div class="row heading">
        Why teach with Us?

    </div>
    <div class="row mt-2 teach-row">

        <div class="col-sm-3 service">

            <div>
                <img src="{{asset('images/011-money.svg')}}" />
            </div>
            <h4 class="mt-2 title">Your Own Hourly Rate</h4>
            <div class="mt-2">
                <p class="discrption">You can set and change your hourly rate at any time
                    <p>

            </div>




        </div>
        <div class="col-sm-3 service">

            <div>
                <img src="{{asset('images/secure.svg')}}" />
            </div>
            <h4 class="mt-2 title">Secure Paymnets</h4>
            <div class="mt-2">
                <p class="discrption">You can set and change your hourly rate at any time
                    <p>

            </div>




        </div>
        <div class="col-sm-3 service">

            <div>
                <img src="{{asset('images/007-calendar.svg')}}" />
            </div>
            <h4 class="mt-2 title">Calender for Lessons</h4>
            <div class="mt-2">
                <p class="discrption">Set work hours and manage lessons in your personal Marqab Calender

                    <p>

            </div>




        </div>
        <div class="col-sm-3 service">

            <div>
                <img src="{{asset('images/clock.svg')}}" />
            </div>
            <h4 class="mt-2 title">Flexibility</h4>
            <div class="mt-2">
                <p class="discrption">Decide your own work hours when and how many lessons to teach

                    <p>

            </div>




        </div>

    </div>
</div>

</div>
<div class="row mt-5 faculty-title" style="">
    <div class="col-sm-6">
        <h3 style="font-weight: bold;"> What Our Teachers</h3>
        <span style="font-size: 25px;">Are Saying</span>

    </div>
    <div class="col-sm-6">
        <div style="font-size: 50px;" class="pull-right">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev">
            <img  src="{{asset('images/back.svg')}}" />
            </a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next">
            
            <img src="{{asset('images/forwardpx.svg')}}"  />
            </a>


        </div>
    </div>
</div>
<div class="row faculty-message mt-5">
    <div class="col-md-4">
        <div class=" shadow-lg p-3 mb-5 bg-white rounded" style="">
            <div class="contant" style=" ">
                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</h5>
                <div class="row">
                    <div class="col-sm-3"> <img src="{{asset('images/user.jpg')}}" class="rounded-circle" style="width:60px" />
                    </div>
                    <div class="col-sm-9 " style="margin-left: -30px;">
                        <h3> Katherine Smith</h3>
                        <p style="margin-top: -5px;">Lecturer- English Literature</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="shadow-lg p-3 mb-5 bg-white rounded" style="">
            <div class="contant" style=" ">
                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</h5>
                <div class="row">
                    <div class="col-sm-3"> <img src="{{asset('images/user.jpg')}}" class="rounded-circle" style="width:60px" />
                    </div>
                    <div class="col-sm-9 " style="margin-left: -30px;">
                        <h3 class="font-weight-bold"> Katherine Smith</h3>
                        <p style="margin-top: -5px;">Lecturer- English Literature</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" shadow-lg p-3 mb-5 bg-white rounded" style="">
            <div class="contant" style=" ">
                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</h5>
                <div class="row">
                    <div class="col-sm-3"> <img src="{{asset('images/user.jpg')}}" class="rounded-circle" style="width:60px" />
                    </div>
                    <div class="col-sm-9 " style="margin-left: -30px;">
                        <h3 class="font-weight-bold"> Katherine Smith</h3>
                        <p style="margin-top: -5px;">Lecturer- English Literature</p>
                    </div>
                </div>

            </div>
        </div>
    </div>





</div>
<div class="row" style="margin-left: 9%;">
    <button class="btn btn-primary" style="width: 130px;">See All</button>
</div>
<div class="row  center frequently-q" style="">
    <h1>Frequently Answered Questions</h1>
</div>
<div class="row center questions" >
    <ul class="nav nav-tabs tab-custom" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Teaching</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Applicaton</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Payment</a>
        </li>
    </ul>
</div>
<div>
    <div class="row accordion-custom" style="">
        <div class="tab-content" id="myTabContent" style="width:100%">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="accordion md-accordion accordion-3 z-depth-1-half" id="accordionEx194" role="tablist" aria-multiselectable="true">
                    <div class="card  card-accordion" style="border-bottom: 1px solid #E6E5E5 !important;">
                        <div class="card-header" role="tab" id="heading4">
                            <a data-toggle="collapse" data-parent="#accordionEx194" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                <h6 class="">
                                    <span class="mt-4 accordion-heading"> How awesome accordion I am? </span><i style="margin-top: -7px" class="fa fa-angle-down rotate-icon fa-2x pull-right"></i>
                                </h6>
                            </a>
                        </div>
                        <div id="collapse4" class="collapse show" role="tabpanel" aria-labelledby="heading4" data-parent="#accordionEx194">
                            <div class="card-body pt-0 ">
                                <p class="accordion-desc"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                    wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                    3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card  card-accordion" style="border-bottom: 1px solid #E6E5E5 !important;">
                        <div class="card-header" role="tab" id="heading4">
                            <a data-toggle="collapse" href="#collapse2" aria-controls="collapse2">
                                <h6 class="">
                                    <span class="mt-4 accordion-heading"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore magna </span><i style="margin-top: -7px" class="fa fa-angle-down rotate-icon fa-2x pull-right"></i>
                                </h6>
                            </a>
                        </div>
                        <div id="collapse2" class="collapse" role="tabpane2" aria-labelledby="heading4" data-parent="#accordionEx194">
                            <div class="card-body pt-0 ">
                                <p class="accordion-desc"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                    wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                    3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.Accordion wrapper-->
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="accordion md-accordion accordion-3 z-depth-1-half" id="accordionEx194" role="tablist" aria-multiselectable="true">
                    <div class="card  card-accordion" style="border-bottom: 1px solid #E6E5E5 !important;">
                        <div class="card-header" role="tab" id="heading4">
                            <a data-toggle="collapse" data-parent="#accordionEx194" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                <h6 class="">
                                    <span class="mt-4 accordion-heading"> How awesome accordion I am? </span><i style="margin-top: -7px" class="fa fa-angle-down rotate-icon fa-2x pull-right"></i>
                                </h6>
                            </a>
                        </div>
                        <div id="collapse4" class="collapse show" role="tabpanel" aria-labelledby="heading4" data-parent="#accordionEx194">
                            <div class="card-body pt-0 ">
                                <p class="accordion-desc"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                    wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                    3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card  card-accordion" style="border-bottom: 1px solid #E6E5E5 !important;">
                        <div class="card-header" role="tab" id="heading4">
                            <a data-toggle="collapse" href="#collapse2" aria-controls="collapse2">
                                <h6 class="">
                                    <span class="mt-4 accordion-heading"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore magna </span><i style="margin-top: -7px" class="fa fa-angle-down rotate-icon fa-2x pull-right"></i>
                                </h6>
                            </a>
                        </div>
                        <div id="collapse2" class="collapse" role="tabpane2" aria-labelledby="heading4" data-parent="#accordionEx194">
                            <div class="card-body pt-0 ">
                                <p class="accordion-desc"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                    wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                    3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.Accordion wrapper-->

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="accordion md-accordion accordion-3 z-depth-1-half" id="accordionEx194" role="tablist" aria-multiselectable="true">
                    <div class="card  card-accordion" style="border-bottom: 1px solid #E6E5E5 !important;">
                        <div class="card-header" role="tab" id="heading4">
                            <a data-toggle="collapse" data-parent="#accordionEx194" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                <h6 class="">
                                    <span class="mt-4 accordion-heading"> How awesome accordion I am? </span><i style="margin-top: -7px" class="fa fa-angle-down rotate-icon fa-2x pull-right"></i>
                                </h6>
                            </a>
                        </div>
                        <div id="collapse4" class="collapse show" role="tabpanel" aria-labelledby="heading4" data-parent="#accordionEx194">
                            <div class="card-body pt-0 ">
                                <p class="accordion-desc"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                    wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                    3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card  card-accordion" style="border-bottom: 1px solid #E6E5E5 !important;">
                        <div class="card-header" role="tab" id="heading4">
                            <a data-toggle="collapse" href="#collapse2" aria-controls="collapse2">
                                <h6 class="">
                                    <span class="mt-4 accordion-heading"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore magna </span><i style="margin-top: -7px" class="fa fa-angle-down rotate-icon fa-2x pull-right"></i>
                                </h6>
                            </a>
                        </div>
                        <div id="collapse2" class="collapse" role="tabpane2" aria-labelledby="heading4" data-parent="#accordionEx194">
                            <div class="card-body pt-0 ">
                                <p class="accordion-desc"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                    wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                                    3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row join-banner">
        <span>
            <p>
                Join hundreds of online teachers making a difference every day
                using Marqab
            </p>

            <button class="btn btn-primary btn-join">Join Now</button>



        </span>

    </div>
    <div class="footer">
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
</div>

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function()
{
   $('.btn-login').click(function(){
       if($('#email').val()=='' || $('#password').val()==''){
        if($('#email').val()=='')
        $('#email').addClass('is-invalid')
        if( $('#password').val()=='')
        $('#password').addClass('is-invalid')
        return


       }
        
    $.ajax({
                type:'POST',
                url: '/registerTeacher',
                data:{
                    email: $('#email').val(),
                    password: $('#password').val(),
                    _token: '{{csrf_token()}}'
                },
                success:function(data){
                   
                    if(data.error)
                        alert('error: '+data.error)
                    else
                        alert('Done! Lesson will be schedule after confirmation')
                },
                error: (error) => { console.log('res error', error)}
            })
   })
})
</script>

@endsection
