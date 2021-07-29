@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Breeder Register') }}</div>

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
                        {{--FIRST NAME--}}
                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--LAST NAME--}}
                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="name" autofocus>

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--USERNAME--}}
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--EMAIL--}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--PASSWORD--}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--CONFIRM-PASSWORD--}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{--PHONE-NUMBER--}}
                        <div class="form-group row">
                            <label for="phone-number" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone-number" type="tel" class="form-control" name="phone-number" required autocomplete="phone-number">
                            </div>
                        </div>
                        {{--  ADDRESS  --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  ZIP  --}}
                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip') }}</label>

                            <div class="col-md-6">
                                <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus>

                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  STATE  --}}
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  CITY  --}}
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--KENNEL-NAME--}}
                        <div class="form-group row">
                            <label for="kennel-name" class="col-md-4 col-form-label text-md-right">{{ __('Kennel Name') }}</label>
                            <div class="col-md-6">
                                <input id="kennel-name" type="text" class="form-control" name="kennel-name" required autocomplete="kennel-name">
                            </div>
                        </div>
                        {{--FACEBOOK-URL--}}
                        <div class="form-group row">
                            <label for="b-facebook" class="col-md-4 col-form-label text-md-right"><i class="fab fa-facebook-f"></i></label>
                            <div class="col-md-6">
                                <input id="b-facebook" type="url" class="form-control" name="b-facebook" required autocomplete="b-facebook">
                            </div>
                        </div>
                        {{--INSTAGRAM-URL--}}
                        <div class="form-group row">
                            <label for="b-instagram" class="col-md-4 col-form-label text-md-right"><i class="fab fa-instagram"></i></label>
                            <div class="col-md-6">
                                <input id="b-instagram" type="url" class="form-control" name="b-instagram" required autocomplete="b-instagram">
                            </div>
                        </div>
                        {{--WEBSITE-URL--}}
                        <div class="form-group row">
                            <label for="b-website" class="col-md-4 col-form-label text-md-right"><i class="fas fa-globe"></i></label>
                            <div class="col-md-6">
                                <input id="b-website" type="url" class="form-control" name="b-website" required autocomplete="b-instagram">
                            </div>
                        </div>
                        {{--KENNEL LOGO--}}
                        <div class="form-group row">
                            <label for="b-logo" class="col-md-4 col-form-label text-md-right">{{ __('Kennel Logo') }}</label>
                            <div class="col-md-6">
                                <input id="b-logo" type="file" class="form-control border-0 px-0"  name="b-logo">
                            </div>
                        </div>
                        {{--SUBMIT--}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-fbd">
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
