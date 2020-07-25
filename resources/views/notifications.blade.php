@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.flash-messages')
    @if(count($lessonScheduleNotifications) > 0)
        <div class="card">
            <div class="card-header">
                <h3>Lesson Schedule Notifications</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Message</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessonScheduleNotifications as $notification)
                            <tr>
                                <td>{{$notification->data['message']}}</td>
                                <td>{{$notification->data['user_name']}}</td>
                                <td>{{$notification->data['subject'] ?? ''}}</td>
                                <td>{{\Carbon\Carbon::parse($notification->data['from'],'UTC')->setTimezone(auth()->user()->time_zone)}}</td>
                                <td>{{\Carbon\Carbon::parse($notification->data['to'],'UTC')->setTimezone(auth()->user()->time_zone)}}</td>
                                <td>{{$notification->data['status']}}</td>
                                <td>
                                    @if($notification->data['type'] && $notification->data['type'] == 'priceChanged')
                                        <form action="{{route('notifications.price-change.post')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="notification_id" value="{{$notification->id}}">
                                            <input type="submit" class="btn btn-primary" name="confirm" value="Confirm">
                                            <input type="submit" class="btn btn-primary" name="decline" value="Decline">
                                        </form>
                                    @elseif($notification->data['status'] == 'Confirmed' || $notification->data['status'] == 'Decline')
                                        <form action="{{route('notifications.lesson-schedule.post')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="notification_id" value="{{$notification->id}}">
                                            <input type="submit" class="btn btn-primary" name="mark_as_read" value="Mark as Read">
                                        </form>
                                    @else
                                        <form action="{{route('notifications.lesson-schedule.post')}}" method="POST">
                                            <input type="hidden" name="user_id" value="{{$notification->data['user_id']}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="notification_id" value="{{$notification->id}}">
                                            <input type="submit" class="btn btn-primary" name="decline" value="Decline">
                                            <input type="submit" class="btn btn-primary" name="confirm" value="Confirm">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h3>Lesson Schedule Notifications</h3>
            </div>
            <div class="card-body text-center">
                No Notification Found
            </div>
        </div>
    @endif

</div>
@endsection
