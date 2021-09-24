@extends('layouts.app')

@section('content')
<div class="gf-breeder-reg-wrapper">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="/images/homepage/gf-subscribe-image.png" width="800" height="695" alt="image not found">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            {{ __('Breeder Registeration Form') }}
                        </h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('createBreeder') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                @if (\Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ \Session::get('error') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row mb-0">

                                {{--FIRST NAME--}}
                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="gf-form-field @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('First Name') }}">

                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{--LAST NAME--}}
                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="gf-form-field @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="name" autofocus placeholder="{{ __('Last Name') }}">

                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--USERNAME--}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="username" type="text" class="gf-form-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="{{ __('Username') }}">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{--EMAIL--}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="email" type="email" class="gf-form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{--PASSWORD--}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="password" type="password" class="gf-form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{--CONFIRM-PASSWORD--}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="password-confirm" type="password" class="gf-form-field" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                </div>
                            </div>
                            {{--PHONE-NUMBER--}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="phone-number" type="tel" class="gf-form-field" name="phone-number" required autocomplete="phone-number" placeholder="{{ __('Phone') }}">
                                </div>
                            </div>
                            {{--  ADDRESS  --}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="address" type="text" class="gf-form-field @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="{{ __('Street Address') }}">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">

                                {{--  ZIP  --}}
                                <div class="col-md-6">
                                    <input id="zip" type="text" class="gf-form-field @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus placeholder="{{ __('Zip') }}">

                                    @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{--  STATE  --}}
                                <div class="col-md-6">
                                    <input id="state" type="text" class="gf-form-field @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus placeholder="{{ __('State') }}">

                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--  CITY  --}}
                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="city" type="text" class="gf-form-field @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="{{ __('City') }}">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--KENNEL-NAME--}}
                            <div class="form-group row mb-0">
                                <div class="col">
                                    <input id="kennel-name" type="text" class="gf-form-field" name="kennel-name" required autocomplete="kennel-name" placeholder="{{ __('Kennel Name') }}">
                                </div>
                            </div>
                            {{--FACEBOOK-URL--}}
                            <div class="form-group row mb-0">
                                <label for="b-facebook" class="col-md-1 col-form-label text-center"><i class="fab fa-facebook-f"></i></label>
                                <div class="col">
                                    <input id="b-facebook" type="url" class="gf-form-field" name="b-facebook" required autocomplete="b-facebook">
                                </div>
                            </div>
                            {{--INSTAGRAM-URL--}}
                            <div class="form-group row mb-0">
                                <label for="b-instagram" class="col-md-1 col-form-label text-center"><i class="fab fa-instagram"></i></label>
                                <div class="col">
                                    <input id="b-instagram" type="url" class="gf-form-field" name="b-instagram" required autocomplete="b-instagram">
                                </div>
                            </div>
                            {{--WEBSITE-URL--}}
                            <div class="form-group row mb-0">
                                <label for="b-website" class="col-md-1 col-form-label text-center"><i class="fas fa-globe"></i></label>
                                <div class="col">
                                    <input id="b-website" type="url" class="gf-form-field" name="b-website" required autocomplete="b-instagram">
                                </div>
                            </div>
                            {{--KENNEL LOGO--}}
                            <div class="form-group row mb-0">
                                <label for="b-logo" class="col-md-4 col-form-label">{{ __('Kennel Logo') }}</label>
                                <div class="col">
                                    <input id="b-logo" type="file" class="gf-form-field border-0 p-0 rounded-0"  name="b-logo">
                                </div>
                            </div>
                            {{--SUBMIT--}}
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
