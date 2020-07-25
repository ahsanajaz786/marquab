@extends('layouts.app')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel='stylesheet' type='text/css' href="{{asset('libs/css/jquery-ui-1.8.11.custom.css')}}" />
<link rel='stylesheet' type='text/css' href="{{asset('jquery.weekcalendar.css')}}" /> --}}
@endsection

@section('content')
<div id="calendar"></div>
@endsection

@section('footer')
<script type='text/javascript' src="{{URL::asset('libs/jquery-1.4.4.min.js')}}"></script>
<script type='text/javascript' src='libs/jquery-ui-1.8.11.custom.min.js'></script>
<script type='text/javascript' src="{{URL::asset('libs/date.js')}}"></script>
<script type='text/javascript' src="{{URL::asset('jquery.weekcalendar.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.27/moment-timezone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.27/moment-timezone-with-data-1970-2030.js">
</script>

<script type='text/javascript'>
  var uid;
  var eventData = {
  events :'/events'
  };

     $(document).ready(function() {
 const days = {
              0: 'Sunday',
              1: 'Monday',
              2: 'Tuesday',
              3: 'Wednesday',
              4: 'Thursday',
              5: 'Friday',
              6: 'Satureday',
              }
              $('#calendar').weekCalendar({
              newEventText:"",
              // timezone: 'P',
              // dateFormat:"D",
              // minDate:'2019-12-15',
              // maxDate:'2019-12-21',
              getHeaderDate:true,
              allowCalEventOverlap: false,
              buttons :true,
              // data:'/events',
                data: function(start, end, callback) {
                //  var newYork = ;
                // moment.tz.add("Asia/Kabul")
                //  var newYork =
                //   var dec = moment("2014-12-01T12:00:00Z");
                $.getJSON("/events", {
                start: start.getTime(),
                end: end.getTime(),
                }, function(result) {
                callback(result);
                });
                },
              //   date: new Date(2019, 2, 28),
                timeslotsPerHour: 2,
                height: function($calendar){
                  return $(window).height() - $('h1').outerHeight() - $('.description').outerHeight();
                },
                eventRender : function(calEvent, $event) {
                  if (calEvent.end.getTime() < new Date().getTime()) {
                    $event.css('backgroundColor', '#aaa');
                    $event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
                  }
                },

  //Add New Event
              eventNew: function(calEvent, $event) {
                const dayIndex = calEvent.start.getDay()
                const dayName = days[dayIndex]
                var start =calEvent.start.toISOString()
                var end =calEvent.end.toISOString()
                var cofir=confirm('Are you sure?');
           if(cofir){
                $.ajax({
                   type:'POST',
                   url:"{{ route('ajaxRequest.post') }}",
                   data:{start:start, end:end,day:dayName,_token: '{{csrf_token()}}'},
                   success:function(data){
                $('#calendar').weekCalendar('refresh');
                      console.log(data);
                      this.uid=data.id;
                   }
                });
           }else{
             $('#calendar').weekCalendar('refresh');
           }
        },
//Update Event On Dragging
        eventDrop: function(calEvent, $event) {
            update(calEvent);
        },

// Update Event On Resizing
        eventResize: function(calEvent, $event) {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
           update(calEvent);
        },

//DELETE Event
        eventClick: function(calEvent, $event) {
          var cofir=confirm('Are you sure?');
           if(cofir){
            $.ajax({
                    type:'get',
                    url:"{{ route('ajaxRequest.delete') }}",
                    data:{id:calEvent.id},
                    success:function(data){
                    console.log('deleted');
              $('#calendar').weekCalendar('refresh');
                    }
                    });
           }
        },
            });
// Update Function
            function update(calEvent){
              const dayIndex = calEvent.start.getDay()
                    const dayName = days[dayIndex]
                    var start =calEvent.start.toISOString()
                    var end =calEvent.end.toISOString()
                    var cofir=confirm('Are you sure?');
             if(cofir){
          $.ajax({
                  type:'POST',
                  url:"{{ route('ajaxRequest.update') }}",
                  data:{start:start, end:end,day:dayName,id:calEvent.id,_token: '{{csrf_token()}}'},
                  success:function(data){
                  $('#calendar').weekCalendar('refresh');
                  console.log(data);
                  }
         });
           }else{
                $('#calendar').weekCalendar('refresh');
           }
                 }
          });

</script>
@endsection
