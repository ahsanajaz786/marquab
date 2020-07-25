@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h5 class="card-header">Reschedule</h5>
                    <div class="card-body">
                        @include('layouts.flash-messages')
                        <form action="{{route('lesson.reschedule.post', $id)}}" method="POST" id="reschedule-form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input class="form-control" type="date" name="schedule_date" id="date">
                            </div>
                            <div class="form-group">
                                <label for="start-time">Start Time</label>
                                <input class="form-control" type="time" name="start_time" step="1800" id="start-time">
                            </div>
                            <div class="form-group">
                                <label for="end-time">End Time</label>
                                <input class="form-control" type="time" name="end_time" step="1800" id="end-time">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="button" onclick="submitForm()">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        function submitForm(){
            var date = document.getElementById('date').value
            var start = document.getElementById('start-time').value
            var end = document.getElementById('end-time').value
            if(!date || !start || !end){
                alert('Please fill all fields')
            }else if(new Date() > new Date(date)){
                alert('Invalid Date')
            }else if(start.replace(':','.') >= end.replace(':','.')){
                alert('Invalid Time')
            }else{
                document.getElementById('reschedule-form').submit()
            }
        }
    </script>
@endsection
