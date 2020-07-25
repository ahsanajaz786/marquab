@extends('layouts.app')
@section('head')

    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />

    <script src="{{asset('js/fullcalendar.js')}}"></script>

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
        .tutor .col {
            max-width: 150px;
            padding: 0;
        }
        .card{
            border: none;
        }
        .card-header{
            background-color: transparent;
        }
        .info-cards{
            padding: 20px;
        }
        .tutor{
           background-color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="container">

        <div class="addLessonPopup">
            <i class="fa fa-times" onclick="hideModal()"></i>
            <div id="time-range">
                <span class="text-info schedule-date"></span>
                <p>
                    Time: <span class="slider-time">9:00 AM</span> - <span class="slider-time2">5:00 PM</span>
                </p>

                <div class="sliders_step1">
                    <div id="slider-range"></div>
                </div>

            </div>

            <div class="form-group">
                <label for="subjects">Select Subject</label>
                <select name="subjects" id="subjects" class="custom-select">
                    <option disabled selected value="">Subjects</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject}}">{{$subject}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="lesson_type">Select Lesson Type</label>
                <select name="lesson_type" id="lesson_type" class="custom-select">
                    <option selected value="trail_lesson">Trail Lesson</option>
                    <option value="regular_lesson">Regular Lesson</option>
                </select>
            </div>
            <button class="btn btn-primary" id="schedule-lesson" onclick="scheduleLesson()">Book Lesson</button>
        </div>
        <div class="tutor">
            <div class="tutor-card">
                <div class="row">
                    <div class="col">
                        <img src="{{$info->profile_photo? asset('/images/users/'.$user->id.'/'.$info->profile_photo) : asset('/images/avatar/user.png')}}" />
                    </div>
                    <div class="col-md-10">
                        <div class="name">
                            <a href="">{{$user->name}}</a><span  class="text-muted"> from {{$user->tutorInfo->country}}</span>
                        </div>
                        <div class="name">
                            <b class="text-muted">{{$info->headline}}</b>
                        </div>
                        <div class="subjects">
                            <b>Teaches </b><span>{{implode(' , ',json_decode($info->subject_taught))}}</span>
                        </div>
                        <div class="speaks">
                            <b>Speaks </b><span class="text-muted">{{implode(' , ',json_decode($info->language_spoken))}}</span>
                        </div>
                        <div class="rate">
                            <b>Per Hour </b><span class="text-muted">$ {{$info->hourly_rate}}</span>
                        </div>
                        <div class="details">
                            <b>0 lessons. </b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-cards">
                <div class="card">
                    <div class="card-header">
                        <h3>About the tutor</h3>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <p>
                                {{$info->about}}
                            </p>
                        </div>
                    </div>
                </div>
                @if($video)
                    <div class="card">
                        <div class="card-header">
                            <h3>Intro Video</h3>
                        </div>
                        <div class="card-body">
                            {!! $video !!}
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Schedule</h3>
                    </div>
                    <div class="card-body" id="book-lesson">
                        <div class="alert alert-secondary">Choose the time for your first lesson. The timings are displayed in your local timezone.</div>
                        <div id="trail-schedule-calendar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script>
        var isLoggedIn = '{{auth()->check()}}'
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('trail-schedule-calendar');
            var dayOfWeeks = {'09':0, '10':1, '11': 2, '12': 3, '13': 4, '14': 5, '15': 6}
            var calendarOptions = {
                plugins: [dayGridPlugin, momentPlugin, timeGridPlugin, interactionPlugin],
                header: {
                    left: 'prev,next title',
                    center: '',
                    right: ''
                },
                allDaySlot: false,
                editable: true,
                timeFormat: 'H:mm',
                defaultView: 'timeGridWeek',
                columnHeaderFormat: 'ddd D',
                height: 'auto',
                slotLabelFormat: [
                    'D d',
                    'H:mm'
                ],
                eventClick: function(info) {
                    let dialog = document.getElementsByClassName('addLessonPopup')[0]
                    dialog.style.left = info.jsEvent.pageX +'px'
                    dialog.style.top = info.jsEvent.pageY +'px'
                    dialog.style.display = 'block'
                    setTime(info)
                },
                events: [
                    @if(auth()->check())
                        @foreach($available as $event)
                            @php
                                $start = $event->start->format('H:i');
                                $end = $event->end->format('H:i');
                                $startDay = $event->start->format('d')
                            @endphp
                            {
                                groupId: 'available',
                                startTime: '{{$start}}',
                                endTime: '{{$end < $start ? '24:00': $end}}',
                                @foreach($dayOfWeeks as $key => $day)
                                    @if($startDay == $key)
                                        daysOfWeek: [ '{{$day}}' ],
                                    @endif
                                @endforeach
                            },
                        @endforeach
                    @else
                        @foreach($available as $event)
                            {
                                groupId: 'available',
                                startTime: moment.utc('{{$event->start}}').local().format('H:mm'),
                                endTime: moment.utc('{{$event->end}}').local().format('H:mm') == '0:00' ? '24:00': moment.utc('{{$event->end}}').local().format('H:mm'),
                                daysOfWeek: [ dayOfWeeks[moment.utc('{{$event->start}}').local().format('DD')] || 0 ],
                            },
                        @endforeach
                    @endif
                ],
                eventRender: function({event, el}) {
                    $(el).find('.fc-content').first().html(`
                        <span>${moment(event.start).format('H:mm')} - ${moment(event.end).format('H:mm') == '0:00'? '24:00' :moment(event.end).format('H:mm')}</span>
                    `)
                }
            }
            calendar = new Calendar(calendarEl, calendarOptions);

            calendar.render();
        });

        $(document).ready(function(){
            // Read value on page load
            $("#result b").html($("#customRange").val());

            $("#customRange").change(function(){
                $("#result b").html($(this).val());
            });

        });

        let SelectedTime = []
        let startDate = ''
        let endDate = ''
        function hideModal() {
            let popup = document.getElementsByClassName('addLessonPopup')[0]
            popup.style.display = 'none'
            // popup = document.getElementsByClassName('deletePopup')[0]
            // popup.style.display = 'none'
            // selectedDate = []
        }

        function scheduleLesson() {
            if(!isLoggedIn){
                alert('Login to schedule lesson')
                return;
            }
            let subject = $('#subjects').val()
            let lessonType = $('#lesson_type').val()
            let route = "{{ route('find-tutor.trial.store',$user->id) }}"
            if(lessonType == 'regular_lesson'){
                route = "{{ route('find-tutor.regular.store',$user->id) }}"
            }
            if(!subject){
                alert('Please select any subject')
                return
            }
            if(SelectedTime[1] == 1440)
                SelectedTime[1] -= 1
            let start  = moment(startDate).startOf('day').add(SelectedTime[0], 'minutes').format('DD-MM-YYYY H:mm')
            let end  = moment(startDate).startOf('day').add(SelectedTime[1], 'minutes').format('DD-MM-YYYY H:mm')

            $.ajax({
                type:'POST',
                url: route,
                data:{
                    type: 'Trail Lesson',
                    subject: subject,
                    start: start,
                    end: end,
                    _token: '{{csrf_token()}}'
                },
                success:function(data){
                    hideModal()
                    if(data.error)
                        alert('error: '+data.error)
                    else
                        alert('Done! Lesson will be schedule after confirmation')
                },
                error: (error) => { console.log('res error', error)}
            })

        }

        function setTime(info) {
            if(info.event.start < moment()){
                startDate = moment(info.event.start).add(7, 'd')
                endDate = moment(info.event.end).add(7, 'd')
            }else{
                startDate = moment(info.event.start)
                endDate = moment(info.event.end)
            }
            $('.schedule-date').text('Date: '+startDate.format('DD-MM-YYYY'))
            let start = info.event.start.getHours() * 60 + info.event.start.getMinutes()
            let end = info.event.end.getHours() * 60 + info.event.end.getMinutes()
            if(end == 0)
                end = 24 * 60
            calcTime({values: [start, start + 60]})
            $("#slider-range").slider({
                range: true,
                min: start,
                max: end,
                step: 30,
                values: [start, start + 60],
                slide: function (e, ui) {
                    calcTime(ui)
                }
            });
        }
        function calcTime(ui) {
            SelectedTime = [ui.values[0],ui.values[1]]
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);
            if (hours1.length == 1) hours1 = '0' + hours1;
            if (minutes1.length == 1) minutes1 = '0' + minutes1;
            if (minutes1 == 0) minutes1 = '00';
            if (hours1 >= 12) {
                if (hours1 == 12) {
                    hours1 = hours1;
                    minutes1 = minutes1 + " PM";
                } else {
                    hours1 = hours1 - 12;
                    minutes1 = minutes1 + " PM";
                }
            } else {
                hours1 = hours1;
                minutes1 = minutes1 + " AM";
            }
            if (hours1 == 0) {
                hours1 = 12;
                minutes1 = minutes1;
            }



            $('.slider-time').html(hours1 + ':' + minutes1);

            var hours2 = Math.floor(ui.values[1] / 60);
            var minutes2 = ui.values[1] - (hours2 * 60);

            if (hours2.length == 1) hours2 = '0' + hours2;
            if (minutes2.length == 1) minutes2 = '0' + minutes2;
            if (minutes2 == 0) minutes2 = '00';
            if (hours2 >= 12) {
                if (hours2 == 12) {
                    hours2 = hours2;
                    minutes2 = minutes2 + " PM";
                } else if (hours2 == 24) {
                    hours2 = 11;
                    minutes2 = "59 PM";
                } else {
                    hours2 = hours2 - 12;
                    minutes2 = minutes2 + " PM";
                }
            } else {
                hours2 = hours2;
                minutes2 = minutes2 + " AM";
            }

            $('.slider-time2').html(hours2 + ':' + minutes2);
        }
    </script>

    <style>

        #time-range p {
            font-family:"Arial", sans-serif;
            font-size:14px;
            color:#333;
        }
        .ui-slider-horizontal {
            height: 8px;
            background: #D7D7D7;
            border: 1px solid #BABABA;
            box-shadow: 0 1px 0 #FFF, 0 1px 0 #CFCFCF inset;
            clear: both;
            margin: 8px 0;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            -ms-border-radius: 6px;
            -o-border-radius: 6px;
            border-radius: 6px;
        }
        .ui-slider {
            position: relative;
            text-align: left;
        }
        .ui-slider-horizontal .ui-slider-range {
            top: -1px;
            height: 100%;
        }
        .ui-slider .ui-slider-range {
            position: absolute;
            z-index: 1;
            height: 8px;
            font-size: .7em;
            display: block;
            border: 1px solid #5BA8E1;
            box-shadow: 0 1px 0 #AAD6F6 inset;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            -khtml-border-radius: 6px;
            border-radius: 6px;
            background: #81B8F3;
            background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
            background-size: 100%;
            background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #A0D4F5), color-stop(100%, #81B8F3));
            background-image: -webkit-linear-gradient(top, #A0D4F5, #81B8F3);
            background-image: -moz-linear-gradient(top, #A0D4F5, #81B8F3);
            background-image: -o-linear-gradient(top, #A0D4F5, #81B8F3);
            background-image: linear-gradient(top, #A0D4F5, #81B8F3);
        }
        .ui-slider .ui-slider-handle {
            border-radius: 50%;
            background: #F9FBFA;
            background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
            background-size: 100%;
            background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #C7CED6), color-stop(100%, #F9FBFA));
            background-image: -webkit-linear-gradient(top, #C7CED6, #F9FBFA);
            background-image: -moz-linear-gradient(top, #C7CED6, #F9FBFA);
            background-image: -o-linear-gradient(top, #C7CED6, #F9FBFA);
            background-image: linear-gradient(top, #C7CED6, #F9FBFA);
            width: 22px;
            height: 22px;
            -webkit-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
            -moz-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
            box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
            -webkit-transition: box-shadow .3s;
            -moz-transition: box-shadow .3s;
            -o-transition: box-shadow .3s;
            transition: box-shadow .3s;
        }
        .ui-slider .ui-slider-handle {
            position: absolute;
            z-index: 2;
            width: 22px;
            height: 22px;
            cursor: default;
            border: none;
            cursor: pointer;
        }
        .ui-slider .ui-slider-handle:after {
            content:"";
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            top: 50%;
            margin-top: -4px;
            left: 50%;
            margin-left: -4px;
            background: #30A2D2;
            -webkit-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
            -moz-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 white;
            box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
        }
        .ui-slider-horizontal .ui-slider-handle {
            top: -.5em;
            margin-left: -.6em;
        }
        .ui-slider a:focus {
            outline:none;
        }
        #slider-range {
            width: 100%;
            margin: 0 auto;
        }
        #time-range {
            margin: 30px 0px;
        }

    </style>
@endsection
