@extends('layouts.app')

@section('content')

    @php
        $now = \Carbon\Carbon::now();
    @endphp

    <div class="profile-tabs">

        @include('layouts.flash-messages')
        <div class="row">
            <div class="col" style="max-width: 200px;">
                <div class="nav flex-column nav-pills" role="tablist">
                    <a class="nav-link active" data-toggle="pill" id="about-tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                    <a class="nav-link" data-toggle="pill" id="photo-tab" href="#photo" role="tab" aria-controls="photo" aria-selected="false">Photo</a>

                    @if(auth()->user()->role == 'Teacher')
                        <a class="nav-link" data-toggle="pill" id="description-tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                        <a class="nav-link" data-toggle="pill" id="video-tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video</a>
                        <a class="nav-link" data-toggle="pill" id="background-tab" href="#background" role="tab" aria-controls="background" aria-selected="false">Background</a>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <form action="{{route('about.update')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><b>First Name</b></label>
                                    <input type="text" class="form-control" value="{{auth()->user()->first_name}}" placeholder="Enter your first name" name="first_name" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label><b>Last Name</b></label>
                                    <input type="text" class="form-control" value="{{auth()->user()->last_name}}" placeholder="Enter your last name" name="last_name" />
                                </div>
                                @if(auth()->user()->role == 'Teacher')
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label><b>Languages Spoken</b></label>
                                            </div>
                                            <div class="col-md-5">
                                                <label><b>Lavel</b></label>
                                            </div>
                                        </div>
                                        @php
                                            $languageCount = 1;
                                            if(count($languagesSelected) > 1)
                                                $languageCount = count($languagesSelected)
                                        @endphp
                                        @for($i = 0; $i < $languageCount; $i++)
                                            <div class="row spoken-languages">
                                                <div class="form-group col-md-5">
                                                    <select class="custom-select" name="language_spoken[]">
                                                        <option disabled selected>Choose Language</option>
                                                        @foreach($languages as $key => $value)
                                                            <option value="{{$key}}" {{(isset($languagesSelected[$i]) && $languagesSelected[$i] == $key)? 'selected': ''}}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <select class="custom-select" name="language_spoken_lavel[]">
                                                        @foreach($languageLavels as $lavel)
                                                            <option value="{{$lavel}}" {{(isset($lavelSelected[$i]) && $lavelSelected[$i] == $lavel)? 'selected': ''}}>{{$lavel}}</option>
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
                                                <option value="{{$subject}}" {{in_array($subject, $subjectsSelected)? 'selected': ''}}>{{$subject}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label><b>Hourly Rate</b></label><br>
                                        <input type="number" name="hourly_rate"  value="{{auth()->user()->tutorInfo->hourly_rate}}" min="0" class="form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label><b>Country</b></label><br>
                                        <select
                                        class="custom-select"
                                        name="country"
                                        onchange="subjectChange()">
                                            @foreach($countries as $country)
                                                <option value="{{$country}}" {{$info->country == $country? 'selected': '' }}>{{$country}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><b>Phone Number</b></label>
                                        <input type="text" name="phone_number"  value="{{auth()->user()->tutorInfo->phone_number}}" class="form-control">
                                    </div>
                                @endif
                                <div class="form-group col-md-12">
                                    <label><b>Time Zone</b></label>
                                    <select
                                    class="custom-select"
                                    name="time_zone">
                                        @foreach($timezones as $timezone)
                                            <option value="{{$timezone}}" {{$user->time_zone == $timezone ? 'selected' : ''}}>{{$timezone}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                        <form action="{{route('photo.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div style="text-align: left;line-height: 35px;">
                                <span>Tutor with Friendly Profile Photo gets More Students than other tutors</span>
                                <ul>
                                    <li>Photo Should be centred and Clear</li>
                                    <li>Please Dont Use Heavy filters</li>
                                </ul>
                                <div>
                                    <img src="{{$profilePhoto}}" alt="">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label><b>Profile Photo:</b></label>
                                        <input type="file" name="profile_photo">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>


                    </div>
                    @if(auth()->user()->role == 'Teacher')
                        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <form action="{{route('description.update')}}" method="post">
                                {{csrf_field()}}
                                <div class="row" style="line-height: 35px;">
                                    <div class="form-group col-md-12">
                                        <span>Write your headline in English</span><br>
                                        <label><b>Headline</b></label>
                                        <input type="text" value="{{auth()->user()->tutorInfo->headline}}" class="form-control" placeholder="Write your headline" name="headline" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><b>About:</b></label>
                                        <textarea name="about" style="width:100%;">{{auth()->user()->tutorInfo->about}}</textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Update">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                            <form id="msform" action="{{route('video.update')}}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        @if($introVideo)
                                            {!! $introVideo !!}
                                            <hr>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        @include('partials.video-recorder')
                                    </div>
                                </div>

                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label><b>Youtube URL</b></label>
                                        <input type="text" class="form-control" value="{{auth()->user()->tutorInfo->youtube_url}}" placeholder="Youtube introduction video url" name="youtube_url">
                                    </div>
                                </div>
                                <span id="upload-progress" style="height: 20px; background-color:black; width: 0%;display: block"></span>
                                <button type="button" class="next action-button btn btn-primary" onclick="submitForm()">Submit</button>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="background" role="tabpanel" aria-labelledby="background-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Profile verification</h4>
                                    <form action="{{route('background.update-background', 'profile')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        @if(count($profile) > 0)

                                            <div class="fields">

                                                <div class="background-fields">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    @foreach($profile as $item)
                                                                        @if(isset($item->profile_photo) && !isset($item->verified))
                                                                            <strong>Your profile is in review</strong>
                                                                        @elseif(isset($item->profile_photo) && isset($certificate->verified))
                                                                            <strong>Your profile is verified</strong>
                                                                        @endif
                                                                    @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        @else
                                            <div class="form-gorup">
                                                <label>Become a verified tutor</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control" name="data[0][profile_photo]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <button class="btn btn-primary" type="submit">Upload Documents</button>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4>Teaching certification</h4>
                                    <form action="{{route('background.update-background', 'certificate')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="fields">
                                            @if(count($certification) > 0)
                                                @foreach($certification as $key => $certificate)
                                                    <div class="background-fields">
                                                        <div class="form-group">
                                                            <label>Certificate</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$certificate->certificate ?? ''}}" name="data[{{$key}}][certificate]">
                                                                </div>
                                                                <div class="col">
                                                                    <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$certificate->certificate ?? 'description'}}" name="data[{{$key}}][description]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Issued by</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$certificate->certificate ?? 'issued_by'}}" name="data[{{$key}}][issued_by]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Years of study</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <select name="data[{{$key}}][year_of_study_start]" id="" class="custom-select">
                                                                                @for($a = $now->year; $a > 1950; $a--)
                                                                                    <option
                                                                                        {{isset($certificate->year_of_study_start) && $certificate->year_of_study_start == $a ? 'selected': ''}}
                                                                                        value="{{$a}}">
                                                                                        {{$a}}
                                                                                    </option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>

                                                                        <span>-</span>

                                                                        <div class="col">
                                                                            <select name="data[{{$key}}][year_of_study_end]" id="" class="custom-select">
                                                                                @for($a = $now->year; $a > 1950; $a--)
                                                                                    <option
                                                                                        {{isset($certificate->year_of_study_end) && $certificate->year_of_study_end == $a ? 'selected': ''}}
                                                                                        value="{{$a}}">
                                                                                        {{$a}}
                                                                                    </option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Certificate Photo</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @if(isset($certificate->certificate_photo) && !isset($certificate->verified))
                                                                        <strong>Your certificate is not verified yet</strong>
                                                                    @elseif(isset($certificate->certificate_photo) && isset($certificate->verified))
                                                                        <strong>Your certificate is verified</strong>
                                                                    @else
                                                                        <input type="file" class="form-control" name="data[{{$key}}][certificate_photo]">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @else
                                                <div class="background-fields">
                                                    <div class="form-group">
                                                        <label>Certificate</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][certificate]">
                                                            </div>
                                                            <div class="col">
                                                                <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][description]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Issued by</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][issued_by]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Years of study</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <select name="data[0][year_of_study_start]" id="" class="custom-select">
                                                                            @for($a = $now->year; $a > 1950; $a--)
                                                                                <option>
                                                                                    {{$a}}
                                                                                </option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>

                                                                    <span>-</span>

                                                                    <div class="col">
                                                                        <select name="data[0][year_of_study_start]" id="" class="custom-select">
                                                                            @for($a = $now->year; $a > 1950; $a--)
                                                                                <option value="{{$a}}">{{$a}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Certificate Photo</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="file" class="form-control" name="data[0][certificate_photo]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                         <div class="form-group">
                                             <button class="btn btn-primary" type="submit">Save</button>
                                             <button class="btn btn-primary" type="button" onclick="addBackgroundFields(this, 'certificate')">Add New Certificate</button>
                                         </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4>Education</h4>
                                    <form action="{{route('background.update-background', 'education')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="fields">
                                            @if(count($education) > 0)
                                                @foreach($education as $key => $edu)
                                                    <div class="background-fields">
                                                        <div class="form-group">
                                                            <label>University</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$edu->university??''}}" name="data[{{$key}}][university]">
                                                                </div>
                                                                <div class="col">
                                                                    <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Degree</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$edu->degree??''}}" name="data[{{$key}}][degree]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Specialization</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$edu->specialization??''}}" name="data[{{$key}}][specialization]">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Years of study</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <select name="data[{{$key}}][year_of_study_start]" class="custom-select">
                                                                                @for($a = $now->year; $a > 1950; $a--)
                                                                                    <option
                                                                                        {{isset($certificate->year_of_study_start) && $certificate->year_of_study_start == $a ? 'selected': ''}}
                                                                                        value="{{$a}}">
                                                                                        {{$a}}
                                                                                    </option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>

                                                                        <span>-</span>

                                                                        <div class="col">
                                                                            <select name="data[{{$key}}][year_of_study_end]" class="custom-select">
                                                                                @for($a = $now->year; $a > 1950; $a--)
                                                                                    <option
                                                                                        {{isset($certificate->year_of_study_end) && $certificate->year_of_study_end == $a ? 'selected': ''}}
                                                                                        value="{{$a}}">
                                                                                        {{$a}}
                                                                                    </option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Diploma Photo</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @if(isset($edu->diploma_photo) && !isset($edu->verified))
                                                                        <strong>Your diploma is not verified yet</strong>
                                                                    @elseif(isset($edu->diploma_photo) && isset($edu->verified))
                                                                        <strong>Your diploma is verified</strong>
                                                                    @else
                                                                        <input type="file" class="form-control" name="data[{{$key}}][diploma_photo]">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @else
                                                <div class="background-fields">
                                                    <div class="form-group">
                                                        <label>University</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][university]">
                                                            </div>
                                                            <div class="col">
                                                                <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Degree</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][degree]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Specialization</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][specialization]">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Years of study</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <select name="data[0][year_of_study_start]" class="custom-select">
                                                                            @for($a = $now->year; $a > 1950; $a--)
                                                                                <option>
                                                                                    {{$a}}
                                                                                </option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>

                                                                    <span>-</span>

                                                                    <div class="col">
                                                                        <select name="data[0][year_of_study_end]" class="custom-select">
                                                                            @for($a = $now->year; $a > 1950; $a--)
                                                                                <option value="{{$a}}">{{$a}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Diploma Photo</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="file" class="form-control" name="data[0][diploma_photo]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-primary" type="button" onclick="addBackgroundFields(this, 'education')">Add New Education</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4>Experience</h4>
                                    <form action="{{route('background.update-background', 'experience')}}" method="post" >
                                        {{csrf_field()}}
                                        <div class="fields">
                                            @if(count($experience) > 0)
                                                @foreach($experience as $key => $exp)
                                                    <div class="background-fields">
                                                        <div class="form-group">
                                                            <label>Company</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$exp->company??''}}" name="data[{{$key}}][company]">
                                                                </div>
                                                                <div class="col">
                                                                    <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Position</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{$exp->position??''}}" name="data[{{$key}}][position]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Period of employment</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <select name="data[{{$key}}][period_of_employment_start]" class="custom-select">
                                                                                @for($a = $now->year; $a > 1950; $a--)
                                                                                    <option
                                                                                        {{isset($certificate->period_of_employment_start) && $certificate->period_of_employment_start == $a ? 'selected': ''}}
                                                                                        value="{{$a}}">
                                                                                        {{$a}}
                                                                                    </option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>

                                                                        <span>-</span>

                                                                        <div class="col">
                                                                            <select name="data[{{$key}}][period_of_employment_end]" id="" class="custom-select">
                                                                                @for($a = $now->year; $a > 1950; $a--)
                                                                                    <option
                                                                                        {{isset($certificate->period_of_employment_end) && $certificate->period_of_employment_end == $a ? 'selected': ''}}
                                                                                        value="{{$a}}">
                                                                                        {{$a}}
                                                                                    </option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @else
                                                <div class="background-fields">
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][company]">
                                                            </div>
                                                            <div class="col">
                                                                <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Position</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="data[0][position]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Period of employment</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <select name="data[0][period_of_employment_start]" id="" class="custom-select">
                                                                            @for($a = $now->year; $a > 1950; $a--)
                                                                                <option>
                                                                                    {{$a}}
                                                                                </option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>

                                                                    <span>-</span>

                                                                    <div class="col">
                                                                        <select name="data[0][period_of_employment_end]" id="" class="custom-select">
                                                                            @for($a = $now->year; $a > 1950; $a--)
                                                                                <option value="{{$a}}">{{$a}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <hr>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-primary" type="button" onclick="addBackgroundFields(this, 'experience')">Add New Experience</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="{{asset('js/video-recorder.js')}}" async></script>

    <script>

        var year = '{{$now->year}}'
        var certificateCount = parseInt('{{count($certification)}}') + 1
        var educationCount = parseInt('{{count($education)}}') + 1
        var experienceCount = parseInt('{{count($experience)}}') + 1

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

        function submitForm() {
            var data = new FormData($('#msform')[0])
            if(recordedBlobs){
                let file = new File(recordedBlobs, 'recorded-video.webm', {type: 'video/webm'})
                data.append('recorded_video', file)
            }
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
                    window.location.reload()
                },
                error: function (data) {
                },
            })
        }

        function getYearOptions() {
            var options = ''
            for(var a = year; a > 1950; a--){
                options += `
                    <option value="${a}">${a}</option>
                `
            }
            return options
        }

        function deleteBackgroundFields($this) {
            $($this).closest('.background-fields').remove()
        }

        function addBackgroundFields($this, type) {
            var content = ''
            if(type == 'certificate'){
                content = getCertificateFields(certificateCount)
                certificateCount++
            }
            if(type == 'education'){
                content = getEducationFields(educationCount)
                educationCount++
            }
            if(type == 'experience'){
                content = getExperienceFields(experienceCount)
                experienceCount++
            }
            $($this).closest('form').find('.fields').append(content)
        }

        function getCertificateFields(count) {
            return `
                <div class="background-fields">
                        <div class="form-group">
                            <label>Certificate</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="data[${count}][certificate]">
                                </div>
                                <div class="col">
                                    <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="data[${count}][description]">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Issued by</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="data[${count}][issued_by]">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Years of study</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">
                                            <select name="data[${count}][year_of_study_start]" class="custom-select">
                                                ${getYearOptions()}
                                            </select>
                                        </div>

                                        <span>-</span>

                                        <div class="col">
                                            <select name="data[${count}][year_of_study_end]" class="custom-select">
                                                ${getYearOptions()}
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Certificate Photo</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="data[${count}][certificate_photo]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
            `
        }

        function getEducationFields(count) {
            return `
                <div class="background-fields">
                    <div class="form-group">
                        <label>University</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="data[${count}][university]">
                            </div>
                            <div class="col">
                                <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Degree</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="data[${count}][degree]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Specialization</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="data[${count}][specialization]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Years of study</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col">
                                        <select name="data[${count}][year_of_study_start]" class="custom-select">
                                            ${getYearOptions()}
                                        </select>
                                    </div>

                                    <span>-</span>

                                    <div class="col">
                                        <select name="data[${count}][year_of_study_end]" class="custom-select">
                                            ${getYearOptions()}
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Diploma Photo</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="data[${count}][diploma_photo]">
                            </div>
                        </div>
                    </div>
                </div>
                    <hr>
            `
        }

        function getExperienceFields(count) {
            return `
                <div class="background-fields">
                    <div class="form-group">
                        <label>Company</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="data[${count}][company]">
                            </div>
                            <div class="col">
                                <i class="fa fa-trash text-danger" onclick="deleteBackgroundFields(this)"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="data[${count}][position]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Period of employment</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col">
                                        <select name="data[${count}][period_of_employment_start]" class="custom-select">
                                            ${getYearOptions()}
                                        </select>
                                    </div>

                                    <span>-</span>

                                    <div class="col">
                                        <select name="data[${count}][period_of_employment_end]" class="custom-select">
                                            ${getYearOptions()}
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <hr>
            `
        }



    </script>

    <style type="text/css">
        #msform video{
            max-width: 400px;
        }
    </style>
@endsection
