@extends('layouts.app')
@section('head')

    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />

    <style>
        .deletePopup{
            max-width: 300px;
            background: #fff;
            padding: 10px;
            border-radius: 15px;
            position: absolute;
            z-index: 2;
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="deletePopup">
        <button class="btn btn-danger" onclick="deleteEvent()">Delete</button>
        <button class="btn btn-primary" onclick="hideModal()">Cancel</button>
    </div>
    <div id='calendar'></div>
@endsection
@section('footer')
    <script src="{{asset('js/fullcalendar.js')}}"></script>
    <script>
        let deleteEventInfo = null
        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl = document.getElementById('calendar');

            let calendar = new Calendar(calendarEl, {
                plugins: [ dayGridPlugin, momentPlugin, timeGridPlugin, interactionPlugin],
                header: {
                    left: '',
                    center: '',
                    right: ''
                },
                allDaySlot: false,
                height: 'auto',
                timeZone: 'local',
                defaultDate: '2020-02-15',
                columnFormat: 'ddd',
                defaultView: 'timeGridWeek',
                columnHeaderFormat: 'ddd',
                slotLabelFormat: [
                    'D d', // top level of text
                    'H:mm'        // lower level of text
                ],
                selectable: true,
                selectMirror: true,
                timeFormat: 'H:mm',
                select: function(arg) {
                    $.ajax({
                        type:'POST',
                        url:"{{ route('tutor.availability.post') }}",
                        data:{
                            start: arg.start.toLocaleString(),
                            end: arg.end.toLocaleString(),
                            _token: '{{csrf_token()}}'
                        },
                        success:function(data){
                            calendar.addEvent({
                                start: arg.start,
                                end: arg.end,
                                id: data.success.id
                            })
                        },
                        error: (error) => { console.log('res error', error)}
                    })
                    calendar.unselect()
                },
                eventClick: function(info) {
                    let dialog = document.getElementsByClassName('deletePopup')[0]
                    dialog.style.left = info.jsEvent.pageX +'px'
                    dialog.style.top = info.jsEvent.pageY +'px'
                    dialog.style.display = 'block'
                    deleteEventInfo = info
                },
                events: [
                        @foreach($events as $event)
                    {
                        id: '{{$event->id}}',
                        start: '{{$event->start}}',
                        end: '{{$event->end}}'
                    },
                    @endforeach
                ]
            });

            calendar.render();

        });

        function hideModal() {
            popup = document.getElementsByClassName('deletePopup')[0]
            popup.style.display = 'none'
            deleteEventInfo = null
        }

        function deleteEvent() {
            if(deleteEventInfo){
                $.ajax({
                    type:'delete',
                    url:"{{ route('tutor.availability.destroy','') }}/"+deleteEventInfo.event.id,
                    data:{
                        _token: '{{csrf_token()}}'
                    },
                    success:function(data){
                        if(data.success)
                            deleteEventInfo.event.remove()
                        hideModal()
                    },
                    error: (error) => {
                        console.log('res error', error)
                        hideModal()
                    }
                })
            }
        }
    </script>
@endsection
