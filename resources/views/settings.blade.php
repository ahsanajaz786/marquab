@extends('layouts.app')

@section('head')
    <style>
        .notification-setting-wrapper .custom-control-label{
            padding-left: 30px;
            padding-bottom: 20px;
        }
        .notification-setting-wrapper .body{
            padding-top: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="row" style="max-width: 1000px; margin:auto;">
        <div class="col" style="max-width: 200px;">
            <div class="nav flex-column nav-pills" role="tablist" >
                <a class="nav-link active" data-toggle="pill" id="password-tab" href="#password" role="tab" aria-controls="password" aria-selected="true">Password</a>
                <a class="nav-link" data-toggle="pill" id="notifications-tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">Notifications</a>
                @if(auth()->user()->role == 'Student')
                    <a class="nav-link" data-toggle="pill" id="add-payment-paypal-tab" href="#add-payment-paypal" role="tab" aria-controls="add-payment-paypal" aria-selected="false">Add Paypal Payment</a>
                    <a class="nav-link" data-toggle="pill" id="add-payment-card-tab" href="#add-payment-card" role="tab" aria-controls="add-payment-card" aria-selected="false">Add Card Payment</a>
                @endif
                @if(auth()->user()->role == 'Teacher')
                    <a class="nav-link" data-toggle="pill" id="availabilty-settings-tab" href="#availabilty-settings" role="tab" aria-controls="availabilty-settings" aria-selected="false">Calendar Settings</a>
                @endif
            </div>
        </div>
        <div class="col">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="password" role="tabpanel" aria-labelledby="password-tab">
                    @include('layouts.flash-messages')
                    <form action="{{route('password-change.post')}}" method="post">
                        {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <span>Current password</span>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="current_password" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <span>New password</span>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <span>Confirm password</span>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                    <div class="card">
                        <div class="card-header">
                            <h2>Notification center</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{route('notification-settings.store')}}" method="post">
                                {{csrf_field()}}
                                <div class="notification-setting-wrapper">
                                    <h4>Email notifications</h4>
                                    <div class="body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="email_notifications[general_reminders]" {{isset($notifications->email_notifications->general_reminders)? 'checked':''}} id="general-reminders" class="custom-control-input">
                                            <label class="custom-control-label" for="general-reminders">
                                                <span>General reminders</span><br>
                                                <span class="text-muted">Notifications about pending requests, new lessons, reviews and payments.</span>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="email_notifications[tips_and_offers]" {{isset($notifications->email_notifications->tips_and_offers)? 'checked':''}} id="tips-and-offers" class="custom-control-input">
                                            <label class="custom-control-label" for="tips-and-offers">
                                                <span>Updates, tips and offers</span><br>
                                                <span class="text-muted">Stay connected with product updates, helpful tips and special offers.</span>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="email_notifications[preply_blog]" {{isset($notifications->email_notifications->preply_blog)? 'checked':''}} id="preply-blog" class="custom-control-input">
                                            <label class="custom-control-label" for="preply-blog">
                                                <span>Preply Blog</span><br>
                                                <span class="text-muted">Occasional newsletter with the latest posts.</span>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="email_notifications[qa_section]" {{isset($notifications->email_notifications->qa_section)? 'checked':''}} id="qa-section" class="custom-control-input">
                                            <label class="custom-control-label" for="qa-section">
                                                <span>QA section</span><br>
                                                <span class="text-muted">Notices about new questions and replies to your comments.</span>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="email_notifications[new_tutoring_opportunities]" {{isset($notifications->email_notifications->new_tutoring_opportunities)? 'checked':''}} id="New-tutoring-opportunities" class="custom-control-input">
                                            <label class="custom-control-label" for="New-tutoring-opportunities">
                                                <span>New tutoring opportunities</span><br>
                                                <span class="text-muted">Daily announcements of new student postings for your subjects.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-setting-wrapper">
                                    <h4>SMS notifications</h4>
                                    <div class="body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="sms_notifications[lessons_and_messages]" {{isset($notifications->sms_notifications->lessons_and_messages)? 'checked':''}} id="sms-lessons-and-messages" class="custom-control-input">
                                            <label class="custom-control-label" for="sms-lessons-and-messages">
                                                <span>Lessons and messages</span><br>
                                                <span class="text-muted">SMS alerts about new requests, trial lesson bookings and upcoming trial lessons.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-setting-wrapper">
                                    <h4>Marqab insights</h4>
                                    <div class="body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="insights[insights]" {{isset($notifications->insights->insights)? 'checked':''}} id="preply-insights" class="custom-control-input">
                                            <label class="custom-control-label" for="preply-insights">
                                                <span>Allow Preply team to contact me for product improvements</span><br>
                                                <span class="text-muted">Product improvements, research and beta testing</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if(auth()->user()->role == 'Student')
                    <div class="tab-pane fade" id="add-payment-paypal" role="tabpanel" aria-labelledby="add-payment-paypal-tab">
                        <div class="card">
                            <div class="card-header">
                                <h2>Add fund to your account</h2>
                            </div>
                            <div class="card-body">
                                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypalPay.post') !!}" >
                                        {{ csrf_field() }}
                                        <div class="row form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                            <div class="col-sm-3">
                                                <label for="amount" class="control-label">Amount</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                                                @if ($errors->has('amount'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-12" style="margin-top:10px;">
                                                <button type="submit" class="btn btn-primary">
                                                    Pay with Paypal
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="add-payment-card" role="tabpanel" aria-labelledby="add-payment-card-tab">
                        <div class="card">
                            <div class="card-header">
                                <h2>Add fund to your account</h2>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="card_name">Name</label>
                                                <input class="form-control" type="text" name="card_name" id="card_name" value="test user"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="card_amount">Amount</label>
                                                <input class="form-control" type="text" name="card_amount" id="card_amount" value="13"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="card_no">Card No</label>
                                                <input class="form-control" type="text" name="card_no" id="card_no" value="4000002500003155"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="card_exp_month">EXP Month</label>
                                                <input class="form-control" type="text" name="card_exp_month" id="card_exp_month" value="7"/>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="card_exp_year">EXP Year</label>
                                                <input class="form-control" type="text" name="card_exp_year" id="card_exp_year" value="2020"/>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="card_cvc">CVC</label>
                                                <input class="form-control" type="text" name="card_cvc" id="card_cvc" value="123"/>
                                            </div>
                                        </div>
                                        <br>
                                        <button onclick="onClick()" class="btn btn-primary"/>Submit</button>
                                    </div>
                                    <div id="iframe-payment"></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->role == 'Teacher')
                    <div class="tab-pane fade" id="availabilty-settings" role="tabpanel" aria-labelledby="availabilty-settings-tab">
                        <div class="card">
                            <div class="card-header">
                                <h2>Lesson booking settings</h2>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" id="payment-form" role="form"
                                      action="{{isset($availabiltySettings->id) ? route('tutor.availabilty-settings.update', $availabiltySettings->id): route('tutor.availabilty-settings.post')}}" >
                                    {{ csrf_field() }}
                                    {{ isset($availabiltySettings->id)? method_field('put'): '' }}
                                    <div class="row form-group{{ $errors->has('min_time_booking') ? ' has-error' : '' }}">
                                        <div class="col-sm-5">
                                            <strong>The minimum amount of time you wish to have between when a student books their first lesson and the lesson start time.</strong>
                                            <p>
                                                Tip: Most students like to schedule their first lesson within 2 days of the date they send the request on. If you wish to receive more students, please choose the minimum amount of time between these two dates. (This only applies to new students. Existing students may book a lesson with only 2 hours prior notice if your availability allows it).
                                            </p>
                                        </div>
                                        <div class="col-sm-7">
                                            @if(isset($availabiltySettings->id))
                                                <select name="min_time_booking" class="custom-select">
                                                    <option value="60" {{$availabiltySettings->min_time_booking == '60' ? 'selected': ''}}>At least 1 hour notice</option>
                                                    <option value="180" {{$availabiltySettings->min_time_booking == '180' ? 'selected': ''}}>At least 3 hour notice</option>
                                                    <option value="360" {{$availabiltySettings->min_time_booking == '360' ? 'selected': ''}}>At least 6 hour notice</option>
                                                    <option value="720" {{$availabiltySettings->min_time_booking == '720' ? 'selected': ''}}>At least 12 hour notice</option>
                                                    <option value="1440" {{$availabiltySettings->min_time_booking == '1440' ? 'selected': ''}}>At least 1 day notice</option>
                                                    <option value="2880" {{$availabiltySettings->min_time_booking == '2880' ? 'selected': ''}}>At least 2 day notice</option>
                                                </select>
                                            @else
                                                <select name="min_time_booking" class="custom-select">
                                                    <option value="60">At least 1 hour notice</option>
                                                    <option value="180">At least 3 hour notice</option>
                                                    <option value="360">At least 6 hour notice</option>
                                                    <option value="720">At least 12 hour notice</option>
                                                    <option value="1440">At least 1 day notice</option>
                                                    <option value="2880">At least 2 day notice</option>
                                                </select>
                                            @endif
                                            @if ($errors->has('min_time_booking'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('min_time_booking') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group{{ $errors->has('max_time_booking') ? ' has-error' : '' }}">
                                        <div class="col-sm-5">
                                            <strong>How far in advance can students book?</strong>
                                            <p>
                                                Tip: Tutors can keep their calendars available up to 2 months ahead.
                                            </p>
                                        </div>
                                        <div class="col-sm-7">

                                            @if(isset($availabiltySettings->id))

                                                <select name="max_time_booking" class="custom-select">
                                                    <option value="20160" {{$availabiltySettings->max_time_booking == '20160' ? 'selected': ''}}>2 weeks in advance</option>
                                                    <option value="30240" {{$availabiltySettings->max_time_booking == '30240' ? 'selected': ''}}>3 weeks in advance</option>
                                                    <option value="43800" {{$availabiltySettings->max_time_booking == '43800' ? 'selected': ''}}>1 month in advance</option>
                                                    <option value="87600" {{$availabiltySettings->max_time_booking == '87600' ? 'selected': ''}}>2 month in advance</option>
                                                </select>

                                            @else

                                                <select name="max_time_booking" class="custom-select">
                                                    <option value="20160">2 weeks in advance</option>
                                                    <option value="30240">3 weeks in advance</option>
                                                    <option value="43800">1 month in advance</option>
                                                    <option value="87600">2 month in advance</option>
                                                </select>

                                            @endif
                                            @if ($errors->has('max_time_booking'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('max_time_booking') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('js/jquery2.3.2.min.js')}}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey('{{env('STRIPE_PUBLIC_KEY')}}')
    </script>
    <script src="{{asset('js/stripe-methods.js')}}"></script>
    <script>
        function onClick() {
            var cardNumber = document.getElementById('card_no').value
            var expYear = document.getElementById('card_exp_year').value
            var expMonth = document.getElementById('card_exp_month').value
            var cvc = document.getElementById('card_cvc').value
            var amount = document.getElementById('card_amount').value
            if(!cardNumber || !expMonth || !cvc || !expYear || !amount){
                alert('Please fill all fields')
                return;
            }
            const paymentRequest = {
                cardNumber: cardNumber,
                expYear: expYear,
                expMonth: expMonth,
                cvc: cvc,
                currency: 'USD',
                amount: amount * 100,
                metadata: {
                    user_id: '{{auth()->user()->id}}',
                    status: 'pending'
                },
                nativeElement: document.querySelector('#iframe-payment')
            };
            paymentRequest.nativeElement.innerHTML = 'Loading... Please wait...';
            doPayment(paymentRequest).then((result) => {
                paymentRequest.nativeElement.innerHTML = 'Loading... Please wait...'
                $.ajax({
                    url: '{{route('settings.card-payment.post')}}',
                    method: 'POST',
                    data: {event_id: result.id,_token:'{{csrf_token()}}'},
                    success:function(response){
                        alert(response.message)
                        window.location.reload()
                    },
                    error:(error) => {
                        if(error.responseJSON){
                            alert(error.responseJSON.message)
                            window.location.reload()
                        }else{
                            alert('Ups, something wrong, sorry! :(')
                            window.location.reload()
                        }
                    }
                })
                //paymentRequest.nativeElement.innerHTML = 'Success!!!! Your details are correct!!! :)';
                //alert('Success: Token is: ' + result.id);
            }).catch((error) => {
                paymentRequest.nativeElement.innerHTML = 'Ups! We can\t validate your details...';
                alert('Ups, something wrong, sorry! :(');
            });
        }
    </script>
@endsection
