@extends('layouts.app')
@section('head')
    <style>
        .search-cards .item{
            width: 30%;
            display: inline-flex;
            border: 1px solid #e1e1e1;
            padding: 10px;
            flex-direction: column;
            background: #fff;
            min-height: 89px;
            align-items: center;
        }
        .search-cards .search-btn{
            display: inline-flex;
            align-items: center;
        }
        .search-cards input{
            width: 100%;
        }
        .tutor-card{
            background: #fff;
            padding: 10px;
        }
        .tutor-card .row{
            margin: 0px;
        }
        .tutors .col {
            max-width: 150px;
            padding: 0;
        }
        .tutors .tutor-card-row{
            margin-bottom: 30px;
            cursor: pointer;
        }
        .tutors .tutor-card-row:hover .tutor-card-info{
            display: block;
        }
        .tutors .tutor-card-info{
            display: none;
        }
        .tutors .tutor-card-info iframe,
        .tutors .tutor-card-info video{
            width: 100%;
            height: auto;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="search-cards">
            <form action="{{route('find-tutor.index')}}" method="get">
                <div class="item form-group">
                    <label for="tutor-teaches">Tutor Teaches</label>
                    <input type="text" name="tutor_teaches" class="form-control" id="tutor-teaches" value="{{isset($searchParams)? $searchParams['tutor_teaches']: ''}}">
                </div>
                <div class="item form-group">
                    <label for="customRange">Price Per Hour <span id="result"><b>1</b> $</span></label>
                    <input type="range" class="custom-range" name="price_per_hour" id="customRange" value="{{isset($searchParams)? $searchParams['price_per_hour']: 0}}" min="1" max="40">
                </div>
                <div class="item form-group">
                    <label for="tutor-available">Tutor is available</label>
                    <select name="tutor_available" class="custom-select">
                        <option value="any-time">Any time</option>
                        <option value="6-9">Morning 6-9</option>
                        <option value="9-12">Late Morning 9-12</option>
                        <option value="12-15">Afternoon 12-15</option>
                        <option value="15-18">Late Afternoon 15-18</option>
                        <option value="18-21">Evening 18-21</option>
                        <option value="21-24">Late Evening 21-24</option>
                        <option value="0-3">Night 0-3</option>
                        <option value="3-6">Late Night 3-6</option>
                    </select>
                </div>
                <div class="search-btn"><input type="submit" class="btn btn-primary" value="Search"></div>
            </form>
        </div>
        <div class="tutors">
            @if(count($users) > 0)
                @foreach($users as $user)
                    @php $info = $user->tutorInfo; @endphp
                    <div class="row tutor-card-row">
                        <div class="col-md-8">
                            <div class="tutor-card">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{asset('/images/users/'.$user->id.'/'.$info->profile_photo)}}" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="name">
                                            <a href="{{route('find-tutor.show',$user->id)}}">{{$user->name}}</a><span  class="text-muted"> from {{$user->tutorInfo->country}}</span>
                                        </div>
                                        <div class="subjects">
                                            <span>{{$searchParams['tutor_teaches']}} </span><span class="badge badge-info"> + {{count(json_decode($info->subject_taught))}}</span>
                                        </div>
                                        <div class="details">
                                            <b>0 active students. 0 lessons. </b><span>Speaks: {{implode(' , ',json_decode($info->language_spoken))}} </span>
                                        </div>
                                        <div class="description">
                                            <p>
                                                <b>{{$info->headline}}</b>
                                                - {{$info->about}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div><span>0</span></div>
                                                <div>
                                                    <span>review</span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div><span>$ {{$info->hourly_rate}}</span></div>
                                                <div>
                                                    <span>Per Hour</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <a class="btn btn-primary" href="{{route('find-tutor.show',$user->id)}}#book-lesson">Book lesson</a>
                                            </div>
                                            <div class="form-group">
                                                <a class="btn btn-primary" href="{{route('message.read', ['id'=>$user->id])}}">Send message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 tutor-card-info">
                            <div class="tutor-card">
                                {!! $user->video !!}<br>
                                <div class="availabilities"><br>
                                    <strong>Availabilities</strong><br><br>
                                    @foreach($user->availabilities as $date)
                                        <b>{{$date->start->format('D')}}: </b><span>{{$date->start->format('H:m').' - '.$date->end->format('H:m')}}</span><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>Record not found</h3>
            @endif
        </div>
    </div>
@endsection
@section('footer')
    <script>

        $(document).ready(function(){
            // Read value on page load
            $("#result b").html($("#customRange").val());

            $("#customRange").change(function(){
                $("#result b").html($(this).val());
            });
        });
    </script>
@endsection
