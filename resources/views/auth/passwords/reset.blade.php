@extends('layouts.app')

@section('content')
<div class="wrapper gf-reset-password-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="/images/homepage/gf-subscribe-image.png" width="400" height="345" alt="image not found">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            {{ __('Reset Password') }}
                        </h3>
                    </div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">


                            <div class="form-group row mb-0">
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right"></label>--}}

                                <div class="col">
                                    <input id="password" type="password" class="gf-form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col">
                                    <input id="password-confirm" type="password" class="gf-form-field" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="col">
                                    <button type="submit" class="col gf-btn-dark">
                                        {{ __('Reset Password') }}
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
