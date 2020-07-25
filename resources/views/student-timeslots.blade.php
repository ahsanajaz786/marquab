@extends('layouts.app')
@section('head')

    <link rel="stylesheet" href="{{asset('css/fullcalendar/main.css')}}" />
    <script src="{{asset('js/fullcalendar/main.js')}}"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                defaultDate: '2020-05-01',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    // var title = prompt('Event Title:');
                    // if (title) {
                    //     calendar.addEvent({
                    //         title: title,
                    //         start: arg.start,
                    //         end: arg.end,
                    //         allDay: arg.allDay
                    //     })
                    // }
                    // calendar.unselect()
                },
                eventClick: function(info) {
                    // info.jsEvent.preventDefault(); // don't let the browser navigate
                    // info.event.remove()
                    // console.log(info);
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    @foreach($events as $event)
                    {
                        id: '{{$event->id}}',
                        title: '{{$event->title}}',
                        start: '{{$event->start}}',
                        end: '{{$event->end}}'
                    },
                    @endforeach
                ]
            });

            calendar.render();
        });

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
@endsection

@section('content')
    <div id='calendar'></div>
@endsection
@section('footer')

@endsection
