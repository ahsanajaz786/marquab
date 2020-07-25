<!DOCTYPE html>
<html>
<head>
	<title>Become a tutor | {{ config('app.name', 'Marqab')}}</title>
	<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/tutor/register.css')}}">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/video-recorder.css')}}">
</head>
<body>
	<!-- Multi step form -->
<section class="multi_step_form">
  <form id="msform" action="{{ route('tutor.post') }}" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="_method" value="post">
  	{{ csrf_field() }}
    <!-- Tittle -->
    <div class="tittle">
      <h2>Become a tutor</h2>
      <p>In order to become a tutor you must provide us the following information</p>
    </div>
    @include('layouts.flash-messages')
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">ABOUT</li>
        <li>Profile Photo</li>
        <li>Profile Description</li>
        <li>Video Introduction</li>
    </ul>
      <!-- fieldsets -->
      <div id="fields">
        <fieldset class="active">
          <h3>Signup on {{env('APP_NAME')}}</h3>

          <div class="form-row">
                <div class="form-group col-md-12">
                    <label><b>First Name</b></label>
                    <input type="text" class="form-control" placeholder="Enter your first name" name="first_name" />
                </div>
                <div class="form-group col-md-12">
                  <label><b>Last Name</b></label>
                  <input type="text" class="form-control" placeholder="Enter your last name" name="last_name" />
                </div>

              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-5">
                          <label><b>Languages Spoken</b></label>
                      </div>
                      <div class="col-md-5">
                          <label><b>Lavel</b></label>
                      </div>
                  </div>
                  @for($i = 0; $i < 4; $i++)
                      <div class="row spoken-languages">
                          <div class="form-group col-md-5">
                              <select class="custom-select" name="language_spoken[]">
                                  <option disabled selected>Choose Language</option>
                                  @foreach($languages as $key => $value)
                                      <option value="{{$key}}">{{$value}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group col-md-5">
                              <select class="custom-select" name="language_spoken_lavel[]">
                                  @foreach($languageLavels as $lavel)
                                      <option value="{{$lavel}}">{{$lavel}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-md-2">
                              <i class="fa fa-trash" onclick="deleteRow(this)"></i>
                          </div>
                      </div>
                  @endfor
              </div>
              <div class="form-group col-md-12">
                  <a href="javascript:void(0)" onclick="addNewLanguageRow()">Add new language</a>
              </div>
              <div class="form-group col-md-12">
                  <label><b>Subject Taught</b></label>
                  <select
                      id="subject-taught"
                      class="custom-select"
                      multiple="multiple"
                      size="4"
                      name="subject_taught[]"
                      onchange="subjectChange()">
                      @foreach($subjects as $subject)
                          <option value="{{$subject}}">{{$subject}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group col-12">
                  <label><b>Hourly Rate</b></label><br>
                  <input type="number" name="hourly_rate" min="0" class="form-control">
              </div>

              <div class="form-group col-md-12">
                  <label><b>Country</b></label><br>
                  <select
                      class="custom-select"
                      name="country"
                      onchange="subjectChange()">
                      @foreach($countries as $country)
                          <option value="{{$country}}">{{$country}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group col-md-12">
                  <label><b>Time Zone</b></label>
                  <select
                      class="custom-select"
                      name="time_zone">
                      <option value="Asia/Almaty">Asia/Almaty</option>
                      <option value="Asia/Dhaka">Asia/Dhaka</option>
                      <option value="Asia/Riyadh">Asia/Riyadh</option>
                      <option value="Asia/Karachi">Asia/Karachi</option>
                      <option value="Asia/Famagusta">Asia/Famagusta</option>
                  </select>
              </div>

                <div class="form-group col-md-12">
                  <label><b>Email</b></label>
                  <input type="text" name="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-group col-md-12">
                    <label><b>Password</b></label>
                  <input type="password" class="form-control" placeholder="Enter your password" name="password">
                </div>

          </div>
          <div class="done_text">
          </div>

            <button type="button" class="next action-button" onclick="changeField(2)">Continue</button>
        </fieldset>
        <fieldset>
            <div style="text-align: left;line-height: 35px;">
                <span>Tutor with Friendly Profile Photo gets More Students than other tutors</span>
                <ul>
                    <li>Photo Should be centred and Clear</li>
                    <li>Please Dont Use Heavy filters</li>
                </ul>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label><b>Profile Photo:</b></label>
                        <input type="file" name="profile_photo">
                    </div>
                </div>
            </div>
            <button type="button" class="action-button previous previous_button" onclick="changeField(1)">Back</button>
            <button type="button" class="next action-button" onclick="changeField(3)">Continue</button>
        </fieldset>
        <fieldset>
          <div class="row" style="line-height: 35px;">
              <div class="form-group col-md-12">
                  <span>Write your headline in English</span><br>
                  <label><b>Headline</b></label>
                  <input type="text" class="form-control" placeholder="Write your headline" name="headline" />
              </div>
              <div class="form-group col-md-12">
                  <label><b>About:</b></label>
                  <textarea name="about" style="width:100%;"></textarea>
              </div>
          </div>
            <button type="button" class="action-button previous previous_button" onclick="changeField(2)">Back</button>
            <button type="button" class="next action-button" onclick="changeField(4)">Continue</button>

        </fieldset>
        <fieldset>
            @include('partials.video-recorder')
            <div class="row">
                <div class="form-group col-md-12">
                    <label><b>Youtube URL</b></label>
                    <input type="text" class="form-control" placeholder="Youtube introduction video url" name="youtube_url">
                </div>
            </div>
            <span id="upload-progress" style="height: 20px; background-color:black; width: 0%;display: block"></span>
            <button type="button" class="action-button previous previous_button" onclick="changeField(3)">Back</button>
            <button type="button" class="next action-button" onclick="submitForm()">Submit</button>
        </fieldset>
      </div>
  </form>
</section>
<!-- End Multi step form -->

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script src="{{asset('js/video-recorder.js')}}" async></script>

<script>
    function addNewLanguageRow(){
        let html = `
                <div class="row spoken-languages">
                    <div class="form-group col-md-5">
                        <select class="custom-select" name="language_spoken[]">
                            <option disabled selected>Choose Language</option>
                            @foreach($languages as $key => $value)
                                <option value="{{$key}}" >{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <select class="custom-select" name="language_spoken[]">
                            <option value="Beginner">Beginner</option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="C2">C2</option>
                            <option value="Native">Native</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-trash" onclick="deleteRow(this)"></i>
                    </div>
                </div>
                `
        $('.spoken-languages').parent().append(html)
    }
    function deleteRow(ev) {
        if($('.spoken-languages').length < 2)
            return
        $(ev).closest('.spoken-languages').remove()

    }
    function subjectChange() {
        var selectedOptions = $('#subject-tought option:selected');
        if (selectedOptions.length >= 5) {

            var nonSelectedOptions = $('#subject-tought option').filter(function() {
                return !$(this).is(':selected');
            });

            nonSelectedOptions.each(function() {
                $(this).prop('disabled', true);
            });
        }else{
            $('#subject-tought option').each(function() {
                $(this).prop('disabled', false);
            });
        }
    }
    function changeField(fieldNumber = 1) {
        $('#fields fieldset.active').removeClass('active')
        $('#fields fieldset:nth-child('+fieldNumber+')').addClass('active')
        $('#progressbar li').removeClass('active')
        for(let index = 0; index < fieldNumber; index++){
            $('#progressbar li:nth-child('+(index + 1)+')').addClass('active')
        }
    }

    function submitForm() {
        var data = new FormData($('#msform')[0])
        console.log(...data);
        if(recordedBlobs){
            let file = new File(recordedBlobs, 'recorded-video.webm', {type: 'video/webm'})
            data.append('recorded_video', file)
        }
        console.log($('#msform').attr('action'))
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('#upload-progress').width(percentComplete+'%')
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: $('#msform').attr('action'),
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: data,
            success: function (data) {
                alert('Data Inserted')
                setTimeout(function () {
                    window.location.replace("{{route('login')}}")
                },2000)
            },
            error: function (data) {
            },
        })





    }



</script>

<style type="text/css">
	.form-control{
		height: calc(1.5em + .75rem + 2px) !important;
	}
    #fields fieldset{
        display: none;
    }
    #fields .active{
        display: block;
    }
</style>
</body>
</html>
