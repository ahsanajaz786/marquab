@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time_zone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Select Time Zone') }}</label>

                                <div class="col-md-6">
                                    <select name="time_zone" class="form-control">
                                        <option value="Asia/Almaty">Asia/Almaty</option>
                                        <option value="Asia/Dhaka">Asia/Dhaka</option>
                                        <option value="Asia/Riyadh">Asia/Riyadh</option>
                                        <option value="Asia/Karachi">Asia/Karachi</option>
                                        <option value="Asia/Famagusta">Asia/Famagusta</option>
                                    </select>

                                    @error('time_zone')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time_zone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror"
                                           name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time_zone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Skype Id') }}</label>

                                <div class="col-md-6">
                                    <input id="skype_id" type="text" class="form-control @error('skype_id') is-invalid @enderror"
                                           name="skype_id" value="{{ old('skype_id') }}" required autocomplete="skype_id" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
