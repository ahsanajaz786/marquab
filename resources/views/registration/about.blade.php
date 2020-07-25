@extends('layouts.registration')

@section('content')

<div class="about1">
    <section id="about">
        <div class="row">
            <span class="about-heading">Lets Get Started</span>

        </div>
        <div class="row">
            <div class="about-descrption">
                Make an attractive profile so that you can get most students. Tutors with Up to date Profile get more
                students than other tutors on Marqab
            </div>
        </div>
        <form>

            <div class="row">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control custom-input" id="name" aria-describedby="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control custom-input" id="lastname" aria-describedby="lastname" placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="country">Country of origin</label>
                        <select class="form-control custom-input" id="country" aria-describedby="country">
                            <option>Select your Country</option>
                            <option>Pakistan</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="subject">Subject Taught</label>
                        <select class="form-control custom-input" id="subject" aria-describedby="subject">
                            <option>Select your Subject</option>
                            <option>Englist</option>

                        </select> </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="language">Languages Spoken</label>
                        <select class="form-control custom-input" id="language" aria-describedby="language">
                            <option>Select your Language</option>
                            <option>Englist</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="lastname">Level</label>
                        <select class="form-control custom-input" id="language" aria-describedby="language">
                            <option>Select your Lavel</option>
                            <option>Netive</option>

                        </select> </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="phone">Phone Number (Optional)</label>
                        <input type="text" class="form-control custom-input" id="phone" aria-describedby="phone" placeholder="0000-0000000">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="rate">Hourly Rate</label>
                        <input type="text" class="form-control custom-input" id="rate" aria-describedby="rate" placeholder="$">
                    </div>
                </div>
            </div>

        </form>

    </section>
    <section id="descrption">
        <div class="row">
            <span class="about-heading">Profile Description</span>

        </div>
        <div class="row">
            <div class="about-descrption">
                Do you want to master Maths with the best professionals from all over the world?
            </div>
        </div>
        <div class="row mt-2">
            <span class="professional-title">Professional Title</span>

        </div>
        <form>

            <div class="row mt-2">
                <div class="col-md-12 custom-col">

                    <div class="form-group">
                        <label for="title">Add a title to your profile. It will appear on "Find Tutors" page.</label>
                        <input type="text" class="form-control custom-input" id="title" aria-describedby="title" placeholder="Fine Arts Teacher">
                    </div>
                </div>

            </div>
            <div class="row mt-2">
                <span class="professional-title">Overview</span>

            </div>
            <div class="row">
                <div class="col-md-12 custom-col">

                    <div class="form-group">
                        <label for="desc">Add a brief description to show your expertise. This will help people find a teacher which best matches them.</label>
                        <textarea class="form-control  custom-input" id="desc" placeholder="Write here..." rows="6"></textarea>
                    </div>
                </div>

            </div>


        </form>

    </section>
    <section id="availability">
        <div class="row">
            <span class="about-heading">Availability</span>

        </div>
        <div class="row">
            <div class="about-descrption">
                A correct timezone is essential to coordinate lessons with international students
            </div>
        </div>
        <div class="row mt-2">
            <span class="professional-title">Choose your timezone</span>

        </div>
        <form>

            <div class="row mt-2">
                <div class="col-md-12 custom-col">

                    <div class="form-group">
                        <label for="title">Add a title to your profile. It will appear on "Find Tutors" page.</label>
                        <div class="form-group has-search">
                            <span class="fa fa-globe form-control-feedback"> </span>
                            <select type="text" class="form-control custom-input input-time-zone " placeholder="Search">
                                <option>11:04 (GMT + 5) - Asia, Karachi</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-2">
                <span class="professional-title">Set your Availability</span>

            </div>
            <div class="row">
                <div class="col-md-12 custom-col">

                    <div class="form-group">
                        <label for="desc">Availability shows your potential working hours. Students can book lessons at these times.</label>
                    </div>
                </div>

            </div>

            <div class="container availability">
                <div class="day-custom">

                    <button class="btn btn-weekday mon">+<span>Monday</span></button>

                    <button class="btn btn-weekday  active-day ">+<span>Tuesday</span></button>

                    <button class="btn btn-weekday ">+<span>Wednesday</span></button>
                    <button class="btn btn-weekday ">+<span>Thursday</span></button>
                    <button class="btn btn-weekday ">+<span>Friday</span></button>
                    <button class="btn btn-weekday ">+<span>Saturday</span></button>
                    <button class="btn btn-weekday mon">+<span>Sunday</span></button>


                </div>

                <div class="row   availability-time">


                    <label>From</label>


                    <input class="form-control" value="12">

                    <span>:</span>
                    <input class="form-control" value="00">
                    <select class="form-control input">
                        <option>AM</option>
                        <option>PM</option>
                    </select>

                    <label>To</label>
                    <input class="form-control " value="12">
                    <span>:</span>
                    <input class="form-control " value="00">
                    <select class="form-control input">
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                    <button class="btn btn-add"> Add</button>
                </div>


            </div>






        </form>


    </section>
    <section id="Profile-image">
        <div class="row">
            <span class="about-heading">Profile photo/video</span>

        </div>
        <div class="row">
            <div class="about-descrption">
                Tutor Who looks Friendly gets more students than other tutors.
            </div>
        </div>
        <div class="row mt-2">
            <span class="professional-title">Upload Photo</span>
        </div>
        <div class="row mt-2">

            <div class="col-md-3">

                <div class="image-upload-container">
                    <div class="image-upload">
                        <img class="image-icon" src="{{asset('images/picture.png')}}" />
                        Drop your image here
                        or <span> Browse </span>
                    </div>

                </div>
            </div>
            <div class="col-md-2 image-size-desc">
                JPG or PNG format
                Maximum 5 MB file
            </div>
            <div class="col-md-7">
                <div class="pull-right mt-2">
                    <h6>Tips for an amazing photo</h6>
                    <ul class="list-group list">
                        <li class="list-group-item"><img src="{{asset('images/check.svg')}}" />Photo Should be Centered</li>
                        <li class="list-group-item"><img src="{{asset('images/check.svg')}}" />Avoid to Use heavy Filters</li>
                        <li class="list-group-item"><img src="{{asset('images/check.svg')}}" />No Personal Contact or Logo on the photo</li>

                    </ul>
                </div>
                <div>
                </div>

            </div>
            <form>

                <div class="row mt-2">
                    <span class="professional-title">Upload Your Introduction Video</span>

                </div>
                <div class="row">
                    <div class="col-md-12 custom-col">

                        <div class="form-group">
                            <label for="desc"  style="width:71%">Upload a video to show your students your teachings style and skills. This will increase chances of your hiring.</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                <div class="video-upload-container">
                    <div class="image-upload">
                        <img class="image-icon" src="{{asset('images/video-icon.svg')}}" />
                        Drop your image here
                        or <span> Browse </span>
                    </div>

                </div>
                </div>
                <div class="row">
                    OR
                </div>
                <div class="row">
                    <input type="text" class="form-control custom-input link" placeholder="Have a pre recorded video? Insert link here"/>
                </div>


            </form>

    </section>
    <section id="profile-Verification">
        <div class="row">
            <span class="about-heading">Profile Verification</span>

        </div>
        <div class="row">
            <div class="about-descrption">
              Become a Verified Tutor
            </div>
        </div>
        <div class="row mt-2">
            <span class="professional-title">Please upload your documents in the respective fields and get verified.</span>

        </div>
        <div class="row mt-2">
            <span class="professional-title">Teaching Certification</span>

        </div>
        <form>
        
            <div class="row mt-2">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Certificate</label>
                        <div class="form-group has-search">
                            <input class="form-control custom-input" placeholder="Certificate"/>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Issued by</label>
                        <div class="form-group has-search">
                            <input class="form-control custom-input" placeholder="Issued by"/>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row mt-2">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Description</label>
                        <div class="form-group has-search">
                            <textarea class="form-control custom-input" row="5" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                
             <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Years of Study</label>
                        <div class="form-group">
                        <div class="row">
                           <div class="col-md-5">
                            <select class="form-control custom-input">
                            <option>2020</option>
                            </select>
                            </div>
                            <div class="col-md-2 mt-2">
                           
                            -
                            </div>
                            <div class="col-md-5">
                           
                            <select class="form-control custom-input">
                            <option>2020</option>
                            </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
           
           


            </div>






        </form>


    </section>
</div>


<div class="row  btn-bottom">
    <div class="col btn">

        <button id="con" class="btn-primary pull-right btn-con">
            Continue
        </button>
        <button id="back" class="btn-primary pull-right btn-back">
            Back
        </button>
    </div>

</div>
</div>




</div>


@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#con').click(function() {
            $('#descrption').show()
            $('#about').hide()

        })
        $('#back').click(function() {

            $('#about').show()
            $('#descrption').hide()

        })
        $('#descrption').hide()
        //$('#about').hide()
        $('#availability').hide()
        $('#Profile-image').hide()
        $('#profile-Verification').hide()


    })
</script>
@endsection