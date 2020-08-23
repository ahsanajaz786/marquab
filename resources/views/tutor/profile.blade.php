@extends('layouts.registration')

@section('content')

<div class="about1">
    <section id="about">
        <div class="row">
            <span class="about-heading">Lets Get Started</span>

        </div>
        <div class="row">
            <div class="about-descrption">
                Make an attractive profile so that you can get most students. Tutors with Up to date Profile get
                more
                students than other tutors on Marqab
            </div>
        </div>
        <form>

            <div class="row">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control custom-input" id="name" aria-describedby="name"
                            placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control custom-input" id="lastname" aria-describedby="lastname"
                            placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="country">Country of origin</label>
                        <select class="form-control custom-input" id="country" aria-describedby="country">
                            <option>Select your Country</option>
                            @foreach ($countries as $con)
                            <option>{{$con}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="subject">Subject Taught</label>
                        <select class="form-control custom-input" id="subject" aria-describedby="subject">
                            <option>Select your Subject</option>

                            @foreach ($subjects as $sub)
                            <option>{{$sub}}</option>
                            @endforeach


                        </select></div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="language">Languages Spoken</label>
                        <select class="form-control custom-input" id="language" aria-describedby="language">
                            <option>Select your Language</option>
                            @foreach ($languages as $lan)
                            <option>{{$lan}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="lastname">Level</label>
                        <select class="form-control custom-input" id="languagelevel" aria-describedby="language">
                            <option>Select your Lavel</option>
                            @foreach ($languageLavels as $level)
                            <option>{{$level}}</option>
                            @endforeach

                        </select></div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="phone">Phone Number (Optional)</label>
                        <input type="text" class="form-control custom-input" id="phone" aria-describedby="phone"
                            placeholder="0000-0000000">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  custom-col">
                        <label for="rate">Hourly Rate</label>
                        <input type="text" class="form-control custom-input" id="rate" aria-describedby="rate"
                            placeholder="$">
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
                <div class="custom-col w-100">

                    <div class="form-group">
                        <label for="title">Add a title to your profile. It will appear on "Find Tutors"
                            page.</label>
                        <input type="text" class="form-control custom-input" id="title" aria-describedby="title"
                            placeholder="Fine Arts Teacher">
                    </div>
                </div>

            </div>
            <div class="row mt-2">
                <span class="professional-title">Overview</span>

            </div>
            <div class="row">
                <div class="custom-col w-100">

                    <div class="form-group">
                        <label for="desc">Add a brief description to show your expertise. This will help people find
                            a teacher which best matches them.</label>
                        <textarea class="form-control  custom-input" id="desc" placeholder="Write here..."
                            rows="6"></textarea>
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
                <div class="custom-col" style="width: 100%">

                    <div class="form-group">
                        <label for="title">Add a title to your profile. It will appear on "Find Tutors"
                            page.</label>
                        <div class="form-group has-search">
                            <span class="fa fa-globe form-control-feedback"> </span>
                            <select type="text" class="form-control custom-input input-time-zone" placeholder="Search">
                                @foreach ($timezones as $time)
                                <option>{{$time}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-2">
                <span class="professional-title">Set your Availability</span>

            </div>
            <div class="row">
                <div class="custom-col">

                    <div class="form-group">
                        <label for="desc">Availability shows your potential working hours. Students can book lessons
                            at these times.</label>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="container availability">

                    <ul id="availability-tabs" class="nav nav-tabs">
                        <li>
                            <a data-toggle="tab" class="active" href="#availability-monday">+ Monday</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#availability-tuesday">+ Tuesday</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#availability-wednesday">+ Wednesday</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#availability-thursday">+ Thursday</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#availability-friday">+ Friday</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#availability-saturday">+ Saturday</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#availability-sunday">+ Sunday</a>
                        </li>
                    </ul>

                    <div id="availability-tab-content" class="tab-content">
                        <div id="availability-monday" class="tab-pane active">

                            <div class="row   availability-time">

                                <label>From</label>


                                <input class="form-control from-hour" value="12">

                                <span>:</span>
                                <input class="form-control from-minutes" value="00">
                                <select class="form-control input from-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>

                                <label>To</label>
                                <input class="form-control  to-hour" value="12">
                                <span>:</span>
                                <input class="form-control to-minutes" value="00">
                                <select class="form-control input to-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <button class="btn btn-add" type="button" onclick="addTag('#availability-monday')">
                                    Add
                                </button>
                            </div>

                            <div class="tags">
                            </div>
                        </div>
                        <div id="availability-tuesday" class="tab-pane">

                            <div class="row   availability-time">

                                <label>From</label>


                                <input class="form-control from-hour" value="12">

                                <span>:</span>
                                <input class="form-control from-minutes" value="00">
                                <select class="form-control input from-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>

                                <label>To</label>
                                <input class="form-control  to-hour" value="12">
                                <span>:</span>
                                <input class="form-control to-minutes" value="00">
                                <select class="form-control input to-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <button class="btn btn-add" type="button" onclick="addTag('#availability-tuesday')">
                                    Add
                                </button>
                            </div>
                            <div class="tags"></div>
                        </div>
                        <div id="availability-wednesday" class="tab-pane">
                            <div class="row   availability-time">

                                <label>From</label>


                                <input class="form-control from-hour" value="12">

                                <span>:</span>
                                <input class="form-control from-minutes" value="00">
                                <select class="form-control input from-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>

                                <label>To</label>
                                <input class="form-control  to-hour" value="12">
                                <span>:</span>
                                <input class="form-control to-minutes" value="00">
                                <select class="form-control input to-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <button class="btn btn-add" type="button" onclick="addTag('#availability-wednesday')">
                                    Add
                                </button>
                            </div>
                            <div class="tags"></div>
                        </div>
                        <div id="availability-thursday" class="tab-pane">
                            <div class="row   availability-time">

                                <label>From</label>


                                <input class="form-control from-hour" value="12">

                                <span>:</span>
                                <input class="form-control from-minutes" value="00">
                                <select class="form-control input from-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>

                                <label>To</label>
                                <input class="form-control  to-hour" value="12">
                                <span>:</span>
                                <input class="form-control to-minutes" value="00">
                                <select class="form-control input to-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <button class="btn btn-add" type="button" onclick="addTag('#availability-thursday')">
                                    Add
                                </button>
                            </div>
                            <div class="tags"></div>
                        </div>
                        <div id="availability-friday" class="tab-pane">
                            <div class="row   availability-time">

                                <label>From</label>


                                <input class="form-control from-hour" value="12">

                                <span>:</span>
                                <input class="form-control from-minutes" value="00">
                                <select class="form-control input from-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>

                                <label>To</label>
                                <input class="form-control  to-hour" value="12">
                                <span>:</span>
                                <input class="form-control to-minutes" value="00">
                                <select class="form-control input to-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <button class="btn btn-add" type="button" onclick="addTag('#availability-friday')"> Add
                                </button>
                            </div>
                            <div class="tags"></div>
                        </div>
                        <div id="availability-saturday" class="tab-pane">
                            <div class="row   availability-time">

                                <label>From</label>


                                <input class="form-control from-hour" value="12">

                                <span>:</span>
                                <input class="form-control from-minutes" value="00">
                                <select class="form-control input from-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>

                                <label>To</label>
                                <input class="form-control  to-hour" value="12">
                                <span>:</span>
                                <input class="form-control to-minutes" value="00">
                                <select class="form-control input to-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <button class="btn btn-add" type="button" onclick="addTag('#availability-saturday')">
                                    Add
                                </button>
                            </div>
                            <div class="tags"></div>
                        </div>
                        <div id="availability-sunday" class="tab-pane">
                            <div class="row   availability-time">

                                <label>From</label>


                                <input class="form-control from-hour" value="12">

                                <span>:</span>
                                <input class="form-control from-minutes" value="00">
                                <select class="form-control input from-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>

                                <label>To</label>
                                <input class="form-control  to-hour" value="12">
                                <span>:</span>
                                <input class="form-control to-minutes" value="00">
                                <select class="form-control input to-am-pm">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                                <button class="btn btn-add" type="button" onclick="addTag('#availability-sunday')"> Add
                                </button>
                            </div>
                            <div class="tags"></div>
                        </div>
                    </div>


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
        <div class="row mt-2 file-select">

            <div class="col-md-2 p-0">
                <div id="profile-photo-upload">
                    <div class="image-upload-container">
                        <div class="image-upload">
                            <img class="image-icon" src="{{asset('images/picture.png')}}" />
                            Drop your image here or
                            <input id="profile-pic-click-upload" type="file" style="display: none;"
                                accept="image/png, image/jpeg" />
                            <label for="profile-pic-click-upload" style="color: #41BBAC;cursor: pointer">Browse</label>
                        </div>
                    </div>
                </div>
                <div id="profile-photo-message" class="file-details"></div>
            </div>

            <div class="col-md-3 image-size-desc">
                JPG or PNG format
                Maximum 5 MB file
            </div>
            <div class="col-md-7">
                <div class="pull-right mt-2">
                    <h6>Tips for an amazing photo</h6>
                    <ul class="list-group list">
                        <li class="list-group-item"><img src="{{asset('images/check.svg')}}" />Photo Should be
                            Centered
                        </li>
                        <li class="list-group-item"><img src="{{asset('images/check.svg')}}" />Avoid to Use heavy
                            Filters
                        </li>
                        <li class="list-group-item"><img src="{{asset('images/check.svg')}}" />No Personal Contact or
                            Logo on the photo
                        </li>

                    </ul>
                </div>
                <div>
                </div>

            </div>
        </div>
        <form>

            <div class="row mt-3">
                <span class="professional-title">Upload Your Introduction Video</span>

            </div>
            <div class="row">
                <div class="custom-col" style="width:100%;">

                    <div class="form-group">
                        <label for="desc" style="width:71%">Upload a video to show your students your teachings
                            style and skills. This will increase chances of your hiring.</label>
                    </div>
                </div>

            </div>
            <div class="row file-select">
                <div id="profile-video-upload">
                    <div class="video-upload-container">
                        <div class="image-upload">
                            <img class="image-icon" src="{{asset('images/video-icon.svg')}}" />
                            Drop your video here or
                            <input id="profile-video-click-upload"  type="file" accept="video/*"
                                style="display: none;" />
                            <label for="profile-video-click-upload"  
                                style="color: #41BBAC;cursor: pointer">Browse</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="profile-video-message" class="file-details"></div>
            </div>
            <div class="row py-3" style="color: #a7a7a7; font-size: 12px;">
                OR
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="video_url" class="form-control custom-input "
                        placeholder="Have a pre recorded video? Insert link here" />
                </div>
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
            <span class="professional-title">Please upload your documents in the respective fields and get
                verified.</span>

        </div>
        <div id="cerficates">
            <div class="row mt-2">
                <span class="professional-title">Teaching Certification</span>

            </div>

            <form id="certificate-1">

                <div class="row mt-2">
                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">Certificate</label>
                            <div class="form-group has-search">
                                <input class="form-control custom-input certificate-t-1"  placeholder="Certificate" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">Issued by</label>
                            <div class="form-group has-search">
                                <input class="form-control custom-input issuedby-1" placeholder="Issued by" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">Description</label>
                            <div class="form-group has-search">
                                <textarea class="form-control custom-input desc-1" row="10"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">Years of Study</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select class="form-control custom-input start-year-1">
                                            <option>2020</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mt-2">

                                        -
                                    </div>
                                    <div class="col-md-5">

                                        <select class="form-control custom-input end-year-1">
                                            <option>2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
        <div class="row">
            <a href="#" type="button" class="add-certificate"> <i class="fa fa-plus-circle mr-2"
                    aria-hidden="true"></i>Add another Certificate</a></div>
        <div class="row">
            <div class="certificate-bage">
                <span>Get a "Certificate Verifed" badge</span>
                <p>Upload your certificate to increase the credibility of your profile</p>
                <label for="files" class="btn">Upload</label>
                <small class="formate-desc">JPG or PNG formate maximum size of 20MB</small>
                <input id="files" style="visibility:hidden;" type="file">

            </div>
            


        </div>
        <div class="row mt-4">
            <button id="saveCertificate" class="btn btn-primary">Save</button>

        </div>

        <div id="eduction">
            <div class="row mt-4">
                <span class="professional-title">Eduction</span>

            </div>

            <form id="Eduction-1">

                <div class="row mt-2">
                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">University</label>
                            <div class="form-group has-search">
                                <input class="form-control custom-input uni-1" placeholder="University" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">Degree</label>
                            <div class="form-group has-search">
                                <input class="form-control custom-input deg-1" placeholder="Degree" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">Specialization</label>
                            <div class="form-group has-search">
                                <input class="form-control custom-input spe-1" placeholder="Specialization" />

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 custom-col">

                        <div class="form-group">
                            <label for="title">Years of Study</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select class="form-control custom-input esyear-1">
                                            <option>2020</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mt-2">

                                        -
                                    </div>
                                    <div class="col-md-5">

                                        <select class="form-control custom-input eeyear-1">
                                            <option>2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="certificate-bage">
                <span>Get a "Certificate Verifed" badge</span>
                <p>Upload your certificate to increase the credibility of your profile</p>
                <label for="edu-1" class="btn">Upload</label>
                <small class="formate-desc">JPG or PNG formate maximum size of 20MB</small>
                <input id="edu-1" id="d-upload" style="visibility:hidden;" onchange="loadFile(event)" type="file">
                <p id="edu-1-label"></p>

            </div>


                </div>


            </form>
        </div>

        <div class="row">
            <a href="#" type="button" class="add-eduction"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>Add
                another Eduction</a></div>
                <div class="row mt-4">
            <button id="saveEduc" class="btn btn-primary">Save</button>

        </div>        
        <div id="experience">
            <div class="row mt-4">
                <span class="professional-title">Experience</span>

            </div>
            <form id="exp-1">
                <div class="row mt-2">
                    <div class="col-md-6 custom-col">
                        <div class="form-group">
                            <label for="title">Company</label>
                            <div class="form-group has-search">
                                <input class="form-control custom-input com-1" placeholder="Company" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 custom-col">
                        <div class="form-group">
                            <label for="title">Postion</label>
                            <div class="form-group has-search">
                                <input class="form-control custom-input pos-1" placeholder="Position" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 custom-col">
                        <div class="form-group">
                            <label for="title">Period of Employment</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select class="form-control custom-input per-1">
                                            <option>2020</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mt-2 syear">

                                        -
                                    </div>
                                    <div class="col-md-5">

                                        <select class="form-control custom-input eyear">
                                            <option>2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
        <div class="row">
            <a href="#" type="button" class="add-experience"> <i class="fa fa-plus-circle mr-2"
                    aria-hidden="true"></i>Add another Job Experience</a></div>
        <div class="row mt-4">
            <button id="saveExperience" class="btn btn-primary">Save</button>

        </div>



    </section>

</div>


</section>
</div>


<div class="row  btn-bottom">
    <div class="col btn">

        <button id="continue-btn" class="btn-primary pull-right btn-con" data-section="descrption">
            Continue
        </button>
        <button id="back" class="btn-primary pull-right btn-back" data-section="about">
            Back
        </button>
    </div>

</div>
</div>




</div>


@endsection
@section('script')

<script src="{{asset('js/drag-and-drop.js')}}"></script>
<script>
var step = 1
var certificate = 1
var edu = 1
var exp = 1
$(document).ready(function() {

    console.log(step)

    $.ajax({
        type: 'get',
        url: '/loadPersonalInfo',
        data: {},
        success: function(data) {
            console.log(data)
            if (data.user != null) {
                $('#name').val(data.user.first_name)
                $('#lastname').val(data.user.last_name)
                $(".input-time-zone").val(data.user.time_zone).change();


            }
            if (data.tutor != null) {

                $("#languagelevel").val(data.tutor.language_spoken_lavel).change();
                $("#language").val(data.tutor.language_spoken).change();
                $("#subject").val(data.tutor.subject_taught).change();
                $("#country").val(data.tutor.country).change();
                $('#rate').val(data.tutor.hourly_rate)
                $('#phone').val(data.tutor.phone_number)
                $('#title').val(data.tutor.headline),
                    $('#desc').val(data.tutor.about)

            }
        },
        error: (error) => {
            console.log('res error', error)
        }
    })
    getUserAvailability()
})

$('#d-upload').change(function(e)
{
    console.log('ssd e ed',e)
})


$('.btn-con').click(function() {

    if (step == 1)

    {

        $('#name').removeClass("is-invalid")
        $('#lastname').removeClass("is-invalid")
        $('#country').removeClass("is-invalid")
        $('#subject').removeClass("is-invalid")
        $('#language').removeClass("is-invalid")
        $('#languagelevel').removeClass("is-invalid")
        $('#phone').removeClass("is-invalid")
        $('#rate').removeClass("is-invalid")


        console.log($('#country').val())
        if ($('#name').val() == '' || $('#lastname').val() == '' || $('#country').val() ==
            'Select your Country' || $('#subject').val() == 'Select your Subject' || $('#language')
            .val() == 'Select your Language' || $('#languagelevel').val() == 'Select your Level' ||
            $('#phone').val() == '' || $('#rate').val() == '' || parseInt($('#rate').val()) < 1 ||
            parseInt($('#rate').val()) > 150) {
            if ($('#name').val() == '') {

                $('#name').addClass('is-invalid')
                $('#name').attr('placeholder', 'Please Enter your Name');
            }

            if ($('#lastname').val() == '') {
                $('#lastname').addClass('is-invalid')
                $('#lastname').attr('placeholder', 'Please Enter your Last Name');
            }

            if ($('#country').val() == 'Select your Country') {
                $('#country').addClass('is-invalid')
                $('#country').attr('placeholder', 'Please Select Country');
            }

            if ($('#subject').val() == 'Select your Subject') {
                $('#subject').addClass('is-invalid')
                $('#subject').attr('placeholder', 'Please Select Subject');
            }


            if ($('#languagelevel').val() == 'Select your Lavel') {
                $('#languagelevel').addClass('is-invalid')
                $('#languagelevel').attr('placeholder', 'Please Select Language Level ');
            }

            if ($('#language').val() == 'Select your Language') {
                $('#language').addClass('is-invalid')
                $('#nalanguageme').attr('placeholder', 'Please Select Language');
            }

            if ($('#phone').val() == '') {
                $('#phone').addClass('is-invalid')
                $('#phone').attr('placeholder', 'Please Enter Phone');
            }

            if ($('#rate').val() == '' || parseInt($('#rate').val()) < 1 || parseInt($('#rate')
                    .val()) > 150) {

                $('#rate').addClass('is-invalid')
                $('#rate').attr('placeholder', 'Please Enter your Rete');
                console.log(parseInt($('#rate').val()))
                if (parseInt($('#rate').val()) < 1 || parseInt($('#rate').val()) > 150) {
                    $('#rate').val('')
                    $('#rate').attr('placeholder', 'Rate must be grater then 0 or less then 150$');
                }
                return
            }

            return

        }
        const temp = $(this).data('section')
        console.log(temp)
        $.ajax({
            type: 'post',
            url: '/updatePersonalInfo',
            data: {
                first_name: $('#name').val(),
                last_name: $('#lastname').val(),
                language_spoken_lavel: $('#languagelevel').val(),
                language_spoken: $('#language').val(),
                subject_taught: $('#subject').val(),
                hourly_rate: $('#rate').val(),
                phone_number: $('#phone').val(),
                country: $('#country').val(),
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(data)
                step = 2
                changeSection(temp)
            },
            error: (error) => {
                console.log('res error', error)
            }
        })



    } else if (step == 2) {
        console.log('yesy')
        if ($('#title').val() == '' || $('#desc').val() == '') {
            if ($('#title').val() == '') {
                $('#title').addClass('is-invalid')
                $('#title').attr('placeholder', 'Please Enter Title');

            }
            if ($('#desc').val() == '') {
                $('#desc').addClass('is-invalid')
                $('#desc').attr('placeholder', 'Please Enter Title');

            }
            return
        }
        console.log('seconf')

        $.ajax({
            type: 'post',
            url: '/updateUserDescrtion',
            data: {
                title: $('#title').val(),
                desc: $('#desc').val(),
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                changeSection('availability')

                console.log(data)

                step = 3
            },
            error: (error) => {
                console.log('res error', error)
            }
        })

    } else if (step == 3) {
        console.log($('.input-time-zone').val())

        $.ajax({
            type: 'post',
            url: '/updateTimeZone',
            data: {
                time_zone: $('.input-time-zone').val(),

                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                changeSection('Profile-image')
                console.log(data)
                step = 4
            },
            error: (error) => {
                console.log('res error', error)
            }
        })
    } else if (step == 4) {


        var img = $('#profile-pic-click-upload')[0].files[0]
        var video = $('#profile-video-click-upload')[0].files[0]
        if (img == undefined || video == undefined) {
            if (img == undefined) {
                $('.image-upload-container').css({
                    "border-color": "red",
                    "border-weight": "2px",
                    "border-style": "dashed "
                });
                $('.image-size-desc').css({
                    "color": "red"
                })

            }
            if (video == undefined) {
                console.log('www')
                $('.video-upload-container').css({
                    "border-color": "red",
                    "border-weight": "2px",
                    "border-style": "dashed "
                });
                $('.profile-video-message').css({
                    "color": "red"
                })


            }
            return

        }
        console.log("ddd", img.size / 1048576)
        //console.log("ddd",video.size/1048576)
        var i_size = (img.size / 1048576)
        var v_size = (video.size / 1048576)
        if (i_size > 4 || v_size > 20) {
            if (i_size > 4) {
                console.log('www')
                $('.image-upload-container').css({
                    "border-color": "red",
                    "border-weight": "2px",
                    "border-style": "dashed "
                });
                $('.image-size-desc').css({
                    "color": "red"
                })

            }
            if (v_size > 10) {
                console.log('www')
                $('.video-upload-container').css({
                    "border-color": "red",
                    "border-weight": "2px",
                    "border-style": "dashed "
                });
                $('.profile-video-message').css({
                    "color": "red"
                })

            }
            return
        }
        var fd = new FormData();
        fd.append('img', $('#profile-pic-click-upload')[0].files[0])
        fd.append('video', $('#profile-video-click-upload')[0].files[0])
        fd.append('url', $('#video_url').val())
        fd.append('_token', '{{csrf_token()}}')
        $.ajax({
            type: 'post',
            url: '/Uploads',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data)
                //step=2
                // changeSection(temp)
            },
            error: (error) => {
                console.log('res error', error)
            }
        })


    }
})
$('#saveExperience').click(function(){
    for(i=1;i<=exp;i++)
    {
     var com=$('.com-'+i).val()
     var pos=$('.pos-'+i).val() 
     
     var syear=$('.esyear-'+i).val() 
     var eyear=$('.eeyear-'+i).val() 
   
     console.log("exo-",i,com,pos,syear,eyear)
    }

})
$("#saveCertificate").click(function(){
    for(i=1;i<=certificate;i++)
    {
     var cer=$('.certificate-t-'+i).val()
     var issedby=$('.issuedby-'+i).val() 
     
     var desc=$('.desc-'+i).val() 
     var syear=$('.start-year-'+i).val() 
     var eyear=$('.end-year-'+i).val() 
     console.log("cer-",i,cer,issedby,desc,syear,eyear)
    }
})
$('#saveEduc').click(function(){
    for(i=1;i<=edu;i++)
    {
     var uni=$('.uni-'+i).val()
     var deg=$('.deg-'+i).val() 
     
     var spe=$('.spe-'+i).val() 
     var syear=$('.syear-'+i).val() 
     var eyear=$('.eyear-'+i).val() 
     console.log("cer-",uni,deg,spe,syear,eyear)
    }
})
$('.add-experience').click(function() {
    exp++
    $('#experience').append(`<form id="exp-${exp}">
            <div class="row mt-2">
                 <div class="col-md-6 custom-col">
                      <div class="form-group">
                            <label for="title">Company</label>
                            <div class="form-group has-search">
                               <input class="form-control custom-input com-${exp}" placeholder="Company" />
                           </div>
                      </div>
                </div>
            <div class="col-md-6 custom-col">
                <div class="form-group">
                    <label for="title">Postion</label>
                    <div class="form-group has-search">
                        <input class="form-control custom-input pos-${exp}" placeholder="Position" />
                    </div>
                </div>
            </div>
           </div>
           <div class="row mt-2">
                <div class="col-md-6 custom-col">
                <div class="form-group">
            <label for="title">Period of Employment</label>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5">
                        <select class="form-control custom-input esyear-${exp}">
                            <option>2020</option>
                        </select>
                    </div>
                    <div class="col-md-2 mt-2">

                        -
                    </div>
                    <div class="col-md-5">

                        <select class="form-control custom-input eeyear-${exp}">
                            <option>2020</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</form>  `)
})
$(".add-eduction").click(function() {
    edu++;
    $('#eduction').append(`
        <form id="Eduction-${edu}">

            <div class="row mt-2">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">University</label>
                        <div class="form-group has-search">
                            <input class="form-control custom-input uni-${edu}" placeholder="University" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Degree</label>
                        <div class="form-group has-search">
                            <input class="form-control custom-input deg-${edu}" placeholder="Degree" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Specialization</label>
                        <div class="form-group has-search">
                           <input class="form-control custom-input spe-${edu}" placeholder="Specialization" />

                           </div>
                    </div>
                </div>

                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Years of Study</label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <select class="form-control custom-input syear-${edu}">
                                        <option>2020</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-2">

                                    -
                                </div>
                                <div class="col-md-5">

                                    <select class="form-control custom-input eyear-${edu}">
                                        <option>2020</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
           <div class="certificate-bage">
           <span>Get a "Certificate Verifed" badge</span>
                <p>Upload your certificate to increase the credibility of your profile</p>
                <label for="edu-${edu}" class="btn">Upload</label>
                <small class="formate-desc">JPG or PNG formate maximum size of 20MB</small>
                <input id="edu-${edu}" style="visibility:hidden;" type="file"> </div>
                <p id="edu-${edu}-label"  style="visibility:hidden;"></p>


    </div>


        </form>`)

})
$('.add-certificate').click(function() {
    console.log('ee')
    certificate++
    $("#cerficates").append(`<div class="row mt-2">
            <span class="professional-title">Teaching Certification</span>

        </div>

        <form id="certificate-${certificate}">

            <div class="row mt-2">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Certificate</label>
                        <div class="form-group has-search">
                            <input class="form-control custom-input certificate-t-${certificate}" placeholder="Certificate" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Issued by</label>
                        <div class="form-group has-search">
                            <input class="form-control custom-input issuedby-${certificate}" placeholder="Issued by" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Description</label>
                        <div class="form-group has-search">
                            <textarea class="form-control custom-input desc-${certificate}" row="10" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 custom-col">

                    <div class="form-group">
                        <label for="title">Years of Study</label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <select class="form-control custom-input start-year-${certificate}">
                                        <option>2020</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-2">

                                    -
                                </div>
                                <div class="col-md-5">

                                    <select class="form-control custom-input end-year-${certificate}">
                                        <option>2020</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </form>`)
})
$('.about1 > section').hide();
changeSection('about')
$('.registration-sidebr a').click(function(event) {
    event.preventDefault();
    changeSection($(this).data('section'))
})

toggleTab('#availability-monday')
$("#availability-tabs a").click(function(e) {
    e.preventDefault()
    $('#availability-tabs a').removeClass('active')
    $(this).addClass('active')
    toggleTab(e.target.getAttribute('href'))
})
$('.tags').on('click', '.tag i', function(e) {
    removeTag(e.target.parentElement)
})


var selectedProfile = {} // global selected files
var selectedVideos = {} // global selected files

var fileSelect = document.getElementById('profile-pic-click-upload'),
    fileDrag = document.getElementById('profile-photo-upload'),
    messageBody = document.getElementById('profile-photo-message'),
    limit = 10

var fileSelect2 = document.getElementById('profile-video-click-upload'),
    fileDrag2 = document.getElementById('profile-video-upload'),
    messageBody2 = document.getElementById('profile-video-message')

fileDragHandler(fileDrag, fileSelect, messageBody, "selectedProfile", limit)
fileDragHandler(fileDrag2, fileSelect2, messageBody2, "selectedVideos", limit)

function loadFile(e){
    var e=e.target

    console.log(e.id)
    $('#'+e.id+'-label').empty()
    $('#'+e.id+'-label').append(($(e)[0].files[0].name));
   
}
async function addTag(parentId) {
    var parent = $(parentId),
        time = {}
    time.fromHours = parent.find('.from-hour').val()
    time.fromMinutes = parent.find('.from-minutes').val()
    time.fromAMPM = parent.find('.from-am-pm').val()
    time.toHours = parent.find('.to-hour').val()
    time.toMinutes = parent.find('.to-minutes').val()
    time.toAMPM = parent.find('.to-am-pm').val()
    var v = parent.find('.tags').first()
    var day
    time.to = time.fromHours + ':' + time.fromMinutes + ' ' + time.fromAMPM
    time.from = time.toHours + ':' + time.toMinutes + ' ' + time.toAMPM

    if (v.prevObject.selector == '#availability-monday .tags') {
        day = 'monday'
    } else if (v.prevObject.selector == '#availability-tuesday .tags') {
        day = 'tuesday'
    } else if (v.prevObject.selector == '#availability-wednesday .tags') {
        day = 'wednesday'

    } else if (v.prevObject.selector == '#availability-thursday .tags') {
        day = 'thursday'

    } else if (v.prevObject.selector == '#availability-friday .tags') {
        day = 'friday'
    } else if (v.prevObject.selector == '#availability-saturday .tags') {
        day = 'saturday'

    } else if (v.prevObject.selector == '#availability-sunday .tags') {
        day = 'sunday'

    }
    console.log("ss", v, day)
    await $.ajax({
        type: 'post',
        url: '/availability',
        data: {
            day: day,
            start: time.fromHours + ':' + time.fromMinutes + ' ' + time.fromAMPM,
            end: time.toHours + ':' + time.toMinutes + ' ' + time.toAMPM,
            _token: '{{csrf_token()}}'
        },
        success: function(data) {
            console.log(data)
            step = 3
            time.id = data.success
            parent.find('.tags').first().append(getTagContent(time))
        },
        error: (error) => {
            console.log('res error', error)
        }
    })


    console.log(v.prevObject.selector)
}

function getTagContent(time) {
    return `
                <div id=${time.id} class="tag">
                    <span>${time.to} to ${time.from}</span>
                    <i class="fa fa-times"></i>
                </div>
            `
}

function getUserAvailability() {
    $.ajax({
        type: 'get',
        url: '/availability',
        data: {
            _token: '{{csrf_token()}}'
        },
        success: function(data) {
            console.log(data.success)
            for (var v = 0; v < data.success.length; v++) {
                console.log('ov', data.success[v].start_time)
                var time = {}
                time.id = data.success[v].id
                time.to = data.success[v].start_time
                time.from = data.success[v].end_time
                console.log(`#availability-${data.success[v].day} .tags`)
                //`#availability-${data.success[v].day} .tags`.append("<p>edeeee</p>")
                //  $('.tags').append($(`#availability-${data.success[v].day}`).append(getTagContent(time)))
                $(`#availability-${data.success[v].day}`).find('.tags').first().append(getTagContent(time))


            }


        },
        error: (error) => {
            console.log('res error', error)
        }
    })
}

function removeTag(tag) {
    console.log(tag.id)
    $.ajax({
        type: 'delete',
        url: '/availability/' + tag.id,
        data: {
            _token: '{{csrf_token()}}'
        },
        success: function(data) {


        },
        error: (error) => {
            console.log('res error', error)
        }
    })
    $(tag).remove()
}

function toggleTab(id) {
    $('#availability-tab-content .tab-pane').removeClass('active')
    $(id).addClass('active')
}

function changeSection(id) {
    addPrevNextButtonActions(id)
    $('.about1 > section').hide();
    $(`#${id}`).show()
}

function addPrevNextButtonActions(id) {
    var continueBtn = $('#con')
    var backBtn = $('#back')
    if (id == 'about')
        backBtn.hide()
    else
        backBtn.show()

    if (id == 'profile-Verification')
        continueBtn.hide()
    else
        continueBtn.show()

    var prevId = $(`#${id}`).prev().attr('id')
    var nextId = $(`#${id}`).next().attr('id')
    if (prevId)
        backBtn.data('section', prevId)
    if (nextId)
        continueBtn.data('section', nextId)
}
</script>
@endsection