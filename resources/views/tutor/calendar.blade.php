@extends('layouts.app')
@section('head')
<style>      
    .fc-time-grid .fc-slats td{
       
        border-bottom:0px  solid #ddd !important;

    }
    .fc .fc-axis {
        border:0 !important;
        
    }
    .fc-time-grid .fc-slats .fc-minor td {
    border-top-style: solid !important; 
}
.fc-time-grid .fc-slats td{
    height:2.5rem !important;
}
.fc-event .fc-content{
    padding:0 !important
}
.fc-button-primary{
    background: white !important;
   
    border-color: #ddd !important;
    color: #ddd !important;
    margin-left: 10px !important;
    margin-right: 10px !important;
}
.fc-left h2{
    
    vertical-align: middle !important;
    margin-bottom: 0px !important;
}
input.search {
	padding-left:40px;
	background-repeat: no-repeat;
    background-position-y: 5px;
    background-size:30px;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAASCAYAAABb0P4QAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADbSURBVDhP5ZI9C4MwEIb7//+BEDgICA6C4OQgBJy6dRIEB6EgCNkEJ4e3iT2oHzH9wHbpAwfyJvfkJDnhYH4kHDVKlSAigSAQoCiBKjVGXvaxFXZnxBQYkSlBICII+22K4jM63rbHSthCSdsskVX9Y6KxR5XJSSpVy6GbpbBKp6aw0BzM0ShCe1iKihMXC6EuQtMQwukzPFu3fFd4+C+/cimUNxy6WQkNnmdzL3NYPfDmLVuhZf2wZYz80qDkKX1St3CXAfVMqq4cz3hTaGEpmctxDPmB0M/fCYEbAwZYyVKYcroAAAAASUVORK5CYII=);
}
.btns{
    height:40px!important;
    font-size:12px;
    font-weight:normal;
}
.btn-light{
    border:1px solid #41BBAC !important;
    background:white  !important;

    color:#41BBAC !important;
    margin:0 !important;
    padding:5px;
}
.btn-light:hover{
    border:1px solid #41BBAC !important;
    background:white  !important;

    color:#41BBAC !important;
    margin:0 !important;
    padding:5px;
}
</style>

<link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />

<script src="{{asset('js/fullcalendar.js')}}"></script>
<script>
    let selectedDate = []
    let calendar = null
    let deleteEventInfo = null

    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');
        calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, momentPlugin, timeGridPlugin, interactionPlugin],
            header: {
                left: 'prev,title,next ',
                center: '',
                right: ''
            },
            firstDay: 1,
            allDaySlot: false,
            selectMirror: true,
            timeFormat: 'H:mm',
            defaultView: 'timeGridWeek',
            columnHeaderFormat: 'dddd',
            height: 'auto',
            slotLabelFormat: [

                'D d',
                'H:mm'
            ],
            selectable: true,
            select: function(arg) {
                hideModal()
                selectedDate = [arg.start, arg.end]
                let dialog = document.getElementsByClassName('addLessonPopup')[0]
                dialog.style.left = arg.jsEvent.pageX - 100 + 'px'
                dialog.style.top = arg.jsEvent.pageY - 100 + 'px'
                dialog.style.display = 'block'
            },
            eventClick: function(info) {
                hideModal()

                console.log('event click', info)
                var date = new Date(info.event.start);
                console.log(moment(date).format('YYYY-MM-DD'))
                var now = new Date()
                var eventDate = new Date(info.event.start)
                console.log(now == eventDate)
                if ('{{auth()->user()->role}}' == 'Student' && now > eventDate) {

                    console.log('yesy')
                    $('#date').attr('readonly', true);
                    $('#startime').attr('readonly', true);
                    $('#endtime').attr('readonly', true);
                    $('#btns').empty()


                } else {
                    $('#date').attr('readonly', false);
                    $('#startime').attr('readonly', false);
                    $('#endtime').attr('readonly', false);
                    $('#btns').empty()
                    $('#btns').append(
                        `<div class="row"> <div class="col-md-5"></div> 
                <div class="col-md-4" style="padding-left: 9px;">
            <button class="btn btn-primary" type="button" id="cancelClassBtn" >Cancel Class</button>
                </div>
                <div class="col-md-3" style="    margin-left: -2px">

            <button class="btn btn-primary" type="submit" id="saveBtn">Save</button>
                </div>
                </div>`)

                }
                if (info.event.extendedProps.status == 'cancel') {
                    $('#cancelClassBtn').hide()


                } else {
                    $('#cancelClassBtn').show()
                }

                $('#date').val(moment(date).format('YYYY-MM-DD'));
                $('#event_id').val(info.event.id)
                $('#startime').val(moment(date).format('hh:mm:ss'))
                var date = new Date(info.event.end);
                console.log(date)
                var currentDate = date.toISOString().slice(0, 10);
                var currentTime = moment(date).format('hh:mm:ss');
                console.log(currentTime)
                $('#endtime').val(currentTime)
                let dialog = document.getElementsByClassName('deletePopup')[0]
                var mins=0
                if(info.jsEvent.pageX>600)
                {
                    mins=300  
                }
                dialog.style.left = info.jsEvent.pageX-mins+ 'px'
                dialog.style.top = info.jsEvent.pageY+10 + 'px'
                dialog.style.display = 'block'
                deleteEventInfo = info
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                
                @foreach($events as $event) {
                    
                    id: '{{$event->id}}',
                    student_id: '{{$event->student_id}}',
                    student_name: '{{$event->student_id? $event->student->name?? '': ''}}',
                    status: '{{$event->status}}',
                    type: '{{$event->type}}',
                    title: '{{$event->title}}',
                    comment: '{{$event->comment}}',
                    start: '{{$event->start}}',
                    end: '{{$event->end}}'
                },
                @endforeach
            ],
            eventRender: function({
                event,
                el
            }) {
                if (event.extendedProps.type == 'Time Off') {
                    console.log(event.extendedProps)
                    $(el).find('.fc-content').first().html(`
                            <span><b>Time off </b>${moment(event.start).format('H:mm')} - ${moment(event.end).format('H:mm')}</span><br>
                            <div class="title">
                                <span><b>Title:</b></span><br>
                                ${event.title}
                            </div>
                            <div class="comment">
                                <span><b>Comment:</b></span><br>
                                ${event.extendedProps.comment}
                            </div>
                        `)

                } else if (event.extendedProps.type) {

                    $(el).find('.fc-content').first().attr('title', 'Status: ' + event.extendedProps.status)
                    var color='';
                    let studentName = ''
                    if (event.extendedProps.status)
                        var v = ''

                    if (event.extendedProps.status == 'Not Confirmed') {
                        color='#EEF7FF'
                        console.log('q')
                        v = '<i class="fa fa-check-circle " style="color:#ccc;font-size:15px;"></i>'

                    } else if (event.extendedProps.status == 'cancel') {
                        color='#EEF7FF'
                        console.log('p')
                        v = '<i class="fa fa-ban" aria-hidden="true" style="color:#ccc;font-size:15px;"></i>'

                    } else {
                        color='#EEF7FF'
                        console.log('12')
                        v = '<i class="fa fa-check-circle  " style="color:#ccc;font-size:15px;" ></i>'

                    }

                  $(el)[0].style.setProperty('background', color, 'important');
                  $(el)[0].style.setProperty('border-color', '#2198FF', 'important');
                 
                    console.log("", $(el))
                    studentName = `<span>${event.extendedProps.student_name}</span><br>`
                    $(el).find('.fc-content').first().html(`
                          <div><div style='height:10px;background:rgba(33 ,152 ,255,0.5);'></div> 
                          <div style='padding-top:5px;;padding-left:10px'>
                          <div class="status">${v}  ${studentName}</div></div>
                           <span style='padding:5px;padding-left:25px'>${moment(event.start).format('H:mm')} - ${moment(event.end).format('H:mm')}</span><br>
                           
                          
                            </div>
                        `)
                }
            }
        });
        calendar.render();
    });

    function hideModal() {
        let popup = document.getElementsByClassName('addLessonPopup')[0]
        popup.style.display = 'none'
        popup = document.getElementsByClassName('deletePopup')[0]
        popup.style.display = 'none'
        selectedDate = []
    }

    function deleteEvent() {
        console.log($('#date').val())
        return
        if (deleteEventInfo) {
            $.ajax({
                type: 'delete',
                url: "{{ route('calendar.destroy','') }}/" + deleteEventInfo.event.id,
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    if (data.success)
                        deleteEventInfo.event.remove()
                    hideModal()
                },
                error: (error) => {
                    console.log('res error', error)
                    hideModal()
                }
            })
        }
        fun
    }



    function scheduleLesson() {
        if (selectedDate.length > 0) {
            let selectedStudent = document.getElementById('students')
            let selectedLesson = document.getElementById('lessons')
            if (!selectedStudent.value) {
                alert('Please select any student')
            } else if (!selectedLesson.value) {
                alert('Please select any lesson')
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('calendar.store') }}",
                    data: {
                        student_id: selectedStudent.value,
                        subject: selectedLesson.value,
                        type: 'Schedule',
                        start: selectedDate[0].toLocaleString(),
                        end: selectedDate[1].toLocaleString(),
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {
                        calendar.addEvent({
                            id: data.id,
                            start: selectedDate[0],
                            subject: selectedLesson.value,
                            student_id: data.student_id,
                            student_name: data.student_name,
                            status: data.status,
                            type: data.type,
                            end: selectedDate[1]
                        })
                       
                        hideModal()
                       
                    },
                    error: (error) => {
                        console.log('res error', error)
                    }
                })

            }
        } else {
            alert('Please close modal and select date')
        }
    }


    function scheduleTimeOff() {
        if (selectedDate.length > 0) {
            let title = document.querySelector('input[name="time_of_title"]')
            let comment = document.querySelector('textarea[name="time_of_comment"]')
            if (!comment.value || !title.value) {
                alert('Please fill all fields')
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('calendar.store') }}",
                    data: {
                        type: 'Time Off',
                        title: title.value,
                        comment: comment.value,
                        start: selectedDate[0].toLocaleString(),
                        end: selectedDate[1].toLocaleString(),
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {
                        calendar.addEvent({
                            id: data.id,
                            start: selectedDate[0],
                            title: data.title,
                            comment: data.comment,
                            type: data.type,
                            end: selectedDate[1],
                        })
                        hideModal()
                       
                    },
                    error: (error) => {
                        console.log('res error', error);
                        hideModal()
                       
                    }
                })

            }
        } else {
            alert('Please close modal and select date')
        }
    }
</script>
<style>
    .fc-time-grid .fc-event {
        overflow: hidden;
    }
</style>

@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
    <input class="search form-control">
    </div>
    <div class="col-md-4">
   
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary btns btn-light"> Set Up Availability</button>
        <button class="btn btn-primary btns"> <i class="fa fa-plus"></i> Schedule New LessonSet </button>
    </div>
</div>

<div id='calendar' class="mt-2"></div>
<div class="deletePopup">


    <form action="" method="post" id="saveReschedule">
        <div class="form-group">
            <div class="row">
                

                <div class='col-md-12'>

                    <input type='date' name="date" id="date" class="form-control date  mt-3" />
                    <i class="fa fa-times" onclick="hideModal()" style="margin-top: -55px;float: right;"></i>

                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-5">
                    <input type='time' id="startime" name="startTime" class="form-control time " />
                    <input type="hidden" id="event_id">
                </div>
                <div class="col-md-2">
                    To
                </div>

                <div class="col-md-5">
                    <input type='time' id="endtime" name="endTime" class="form-control time endtime" />
                </div>

            </div>
        </div>
        <div id="btns">

        </div>
</div>
</form>





</div>
<div class="addLessonPopup">
    <i class="fa fa-times" onclick="hideModal()"></i>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="add-lesson-tab" data-toggle="tab" href="#add-lesson" role="tab" aria-controls="add-lesson" aria-selected="true">Lesson</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="add-time-of-tab" data-toggle="tab" href="#add-time-of" role="tab" aria-controls="profile" aria-selected="false">Time off</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="add-lesson" role="tabpanel" aria-labelledby="add-lesson-tab">
            <div class="form-group">
                <label for="students">Select Student</label>
                <select name="student" id="students" class="custom-select">
                    @foreach($students as $key => $row)
                    @if($key)
                    <option value="{{$row[0]->student_id}}">{{$row[0]->student->name?? ''}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lessons">Select Lesson</label>
                <select name="lesson" id="lessons" class="custom-select">
                    @foreach($subjects as $lesson)
                    <option value="{{$lesson}}">{{$lesson->subject_taught}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id="schedule-lesson" onclick="scheduleLesson()">Schedule Lesson</button>
            </div>
        </div>
        <div class="tab-pane fade" id="add-time-of" role="tabpanel" aria-labelledby="add-time-of-tab">
            <div class="form-group">
                <label for="time-of-title">Title</label>
                <input id="time-of-title" type="text" name="time_of_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="time-of-title">Comment for students</label>
                <textarea name="time_of_comment" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" onclick="scheduleTimeOff()">Add time off</button>
            </div>
        </div>
    </div>
</div
@endsection
@section('footer')
<script>
    $(document).ready(function() {
    
        
        $('#saveReschedule').submit(function(e) {
            var date = $('#date').val()
            var sTime = $('#startime').val()
            var eTime = $('#endtime').val()
            var sDateTime = date + ' ' + sTime
            var eDateTime = date + ' ' + eTime
            console.log(eDateTime)
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "/updateSchedule",
                data: {
                    id: $('#event_id').val(),
                    start: sDateTime,
                    end: eDateTime,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {

                    location.reload();
                    hideModal()
                },
                error: (error) => {
                    console.log('res error', error)
                    hideModal()
                }



            })


        })
        $('#cancelClassBtn').click(function() {
            $.ajax({
                type: 'POST',
                url: "/cancelSchedule",
                data: {
                    id: $('#event_id').val(),
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    location.reload();
                    hideModal()
                },
                error: (error) => {
                    console.log('res error', error)
                    hideModal()
                }



            })
        })

    })
</script>

@endsection