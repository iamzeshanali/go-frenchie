@extends('layouts.app')

@section('content')
<div class="wrapper gf-login-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="/images/homepage/gf-subscribe-image.png" width="800" height="695" alt="image not found">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            {{ __('Signin to GoFrenchie') }}
                        </h3>
                        <p class="text-center">
                            Enter your personal details and start journey with us.
                        </p>

                    </div>

                    <div class="col-md-12">
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                {{ \Session::get('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="fbd-login-form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>--}}

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="fbd-login-password form-group row">
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    <span class="input-group-btn">
                                    <button onclick="showPassword()" class="btn btn-default reveal" type="button"><i class="fas fa-eye"></i></button>
                                </span>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row align-items-center">
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right"></label>--}}

                                <div class="col-md-6 p-0">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="col-md-6 p-0 text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group mb-0">
                                <div class="">
                                    <button type="submit" class="gf-btn-dark">
                                        {{ __('LOGIN') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
