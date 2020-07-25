@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('layouts.flash-messages')
                <div class="card">
                    <h5 class="card-header">Active Lessons</h5>
                    <div class="card-body">
                        <table class="table table-hover">
                            @if(auth()->user()->role == 'Teacher')
                                <thead>
                                    <tr>
                                        <th>Students</th>
                                        <th>Schedule Date</th>
                                        <th>Duration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($schedules) > 0)
                                    @foreach($schedules as $schedule)
                                        <tr>
                                            <th>{{$schedule->student->name??''}}</th>
                                            <td>{{$schedule->start}}</td>
                                            <td>{{$schedule->start->diffInHours($schedule->end)? $schedule->start->diffInHours($schedule->end).' hour' : '30 minutes'}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" onclick="window.location.href = '{{route('message.read',$schedule->student->id??'')}}'" class="btn btn-outline-primary">Messages</button>
                                                    @if($schedule->status != 'Confirmed')
                                                        <button type="button" onclick="window.location.href = '{{route('lesson.reschedule.index',$schedule->id)}}'" class="btn btn-outline-primary">Reschedule</button>
                                                    @endif
                                                    @if($schedule->status != 'Completed')
                                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Price</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <form action="{{route('lesson.price-change.post', $schedule->id)}}" method="post" style="min-width: 300px">
                                                                {{csrf_field()}}
                                                                <div class="form-group" style="margin-bottom: 0px;padding: 0px 10px;">
                                                                    <input type="number" class="form-control" name="price" id="change_price" style="display: inline-block;width: 195px;">
                                                                    <input type="submit" value="Change" class="btn btn-primary">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No Record Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            @else
                                <thead>
                                    <tr>
                                        <th>Tutors</th>
                                        <th>Schedule Date</th>
                                        <th>Duration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($schedules) > 0)
                                    @foreach($schedules as $schedule)
                                        <tr>
                                            <th>{{$schedule->tutor->name}}</th>
                                            <td>{{$schedule->start}}</td>
                                            <td>{{$schedule->start->diffInHours($schedule->end)? $schedule->start->diffInHours($schedule->end).' hour' : '30 minutes'}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" onclick="window.location.href = '{{route('message.read',$schedule->tutor->id)}}'" class="btn btn-outline-primary">Messages</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No Record Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('head')
    <style>
        .dropdown-toggle::after {
            display: none;
        }
        /*.dropdown-toggle {*/
        /*    padding-right: 5px;*/
        /*    font-size: 18px;*/
        /*}*/
        .card-body{
            padding: 0px;
        }
        /*.table th:nth-child(4),.table td:nth-child(4){*/
        /*    text-align: right;*/
        /*    max-width: 120px;*/
        /*}*/
    </style>
@endsection
