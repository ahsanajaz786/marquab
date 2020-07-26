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
                            <input type="text" class="form-control custom-input" id="lastname"
                                   aria-describedby="lastname" placeholder="Last Name">
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

                            </select></div>
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
                                <select type="text" class="form-control custom-input input-time-zone "
                                        placeholder="Search">
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
                                    <button class="btn btn-add" type="button"
                                            onclick="addTag('#availability-wednesday')"> Add
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
                                    <button class="btn btn-add" type="button"
                                            onclick="addTag('#availability-thursday')"> Add
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
                                    <button class="btn btn-add" type="button"
                                            onclick="addTag('#availability-friday')"> Add
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
                                    <button class="btn btn-add" type="button"
                                            onclick="addTag('#availability-saturday')"> Add
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
                                    <button class="btn btn-add" type="button"
                                            onclick="addTag('#availability-sunday')"> Add
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
                                <img class="image-icon" src="{{asset('images/picture.png')}}"/>
                                Drop your image here or
                                <input id="profile-pic-click-upload" type="file" style="display: none;"/>
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
                            <li class="list-group-item"><img src="{{asset('images/check.svg')}}"/>Photo Should be
                                Centered
                            </li>
                            <li class="list-group-item"><img src="{{asset('images/check.svg')}}"/>Avoid to Use heavy
                                Filters
                            </li>
                            <li class="list-group-item"><img src="{{asset('images/check.svg')}}"/>No Personal Contact or
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
                                <img class="image-icon" src="{{asset('images/video-icon.svg')}}"/>
                                Drop your video here or
                                <input id="profile-video-click-upload" type="file" style="display: none;"/>
                                <label for="profile-video-click-upload" style="color: #41BBAC;cursor: pointer">Browse</label>
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
                        <input type="text" class="form-control custom-input"
                               placeholder="Have a pre recorded video? Insert link here"/>
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
                <span
                    class="professional-title">Please upload your documents in the respective fields and get verified.</span>

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
                                <textarea class="form-control custom-input" row="5"
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


            </form>
        </section>

    </div>


    </section>
    </div>


    <div class="row  btn-bottom">
        <div class="col btn">

            <button id="con" class="btn-primary pull-right btn-con" data-section="descrption">
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
        $(document).ready(function () {
            $('.about1 > section').hide();
            changeSection('about')
            $('.registration-sidebr a').click(function (event) {
                event.preventDefault();
                changeSection($(this).data('section'))
            })
            $('.btn-bottom button').click(function () {
                changeSection($(this).data('section'))
            })
            toggleTab('#availability-monday')
            $("#availability-tabs a").click(function (e) {
                e.preventDefault()
                $('#availability-tabs a').removeClass('active')
                $(this).addClass('active')
                toggleTab(e.target.getAttribute('href'))
            })
            $('.tags').on('click', '.tag i', function (e) {
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


        })

        function addTag(parentId) {
            var parent = $(parentId), time = {}
            time.fromHours = parent.find('.from-hour').val()
            time.fromMinutes = parent.find('.from-minutes').val()
            time.fromAMPM = parent.find('.from-am-pm').val()
            time.toHours = parent.find('.to-hour').val()
            time.toMinutes = parent.find('.to-minutes').val()
            time.toAMPM = parent.find('.to-am-pm').val()
            parent.find('.tags').first().append(getTagContent(time))
        }

        function getTagContent(time) {
            return `
                <div class="tag">
                    <span>${time.fromHours}:${time.fromMinutes} ${time.fromAMPM} to ${time.toHours}:${time.toMinutes} ${time.toAMPM}</span>
                    <i class="fa fa-times"></i>
                </div>
            `
        }

        function removeTag(tag) {
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
