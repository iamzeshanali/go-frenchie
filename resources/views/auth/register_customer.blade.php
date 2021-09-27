@extends('layouts.app')

@section('content')
<div class="gf-customer-reg-wrapper">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="/images/homepage/gf-subscribe-image.png" width="800" height="695" alt="image not found">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            {{ __('Customer Registration Form') }}
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ \Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('createCustomer') }}">
                            @csrf
                            {{--  FIRST NAME  --}}
                            <div class="form-group row mb-0">
{{--                                <label for="firstName" class=" col-form-label text-md-right">{{ __('First Name') }}</label>--}}

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="gf-form-field @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First Name">

                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            {{--  LAST NAME  --}}

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="gf-form-field @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="name" autofocus placeholder="Last Name">

                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            {{--  USERNAME  --}}
                            <div class="form-group row mb-0">
{{--                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>--}}

                                <div class="col">
                                    <input id="username" type="text" class="gf-form-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--  EMAIL-ADDRESS  --}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="email" type="email" class="gf-form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--  PHONE  --}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="phone" type="text" class="gf-form-field @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--  ADDRESS  --}}
{{--                            <div class="form-group row mb-0">--}}

{{--                                <div class="col">--}}
{{--                                    <input id="address" type="text" class="gf-form-field @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Street Address">--}}

{{--                                    @error('address')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            {{--  ZIP  --}}
{{--                            <div class="form-group row mb-0">--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="zip" type="text" class="gf-form-field @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus placeholder="{{ __('Zip') }}">--}}

{{--                                    @error('zip')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                                --}}{{--  STATE  --}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="state" type="text" class="gf-form-field @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus placeholder="{{ __('State') }}">--}}

{{--                                    @error('state')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{--  CITY  --}}
{{--                            <div class="form-group row mb-0">--}}

{{--                                <div class="col">--}}
{{--                                    <input id="city" type="text" class="gf-form-field @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="{{ __('City') }}">--}}

{{--                                    @error('city')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            {{--  PASSWORD  --}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="password" type="password" class="gf-form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--  CONFIRM-PASSWORD  --}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="password-confirm" type="password" class="gf-form-field" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            {{--  SUBMIT  --}}
                            <div class="form-group row mb-0">
                                <button type="submit" class="col gf-btn-dark">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
