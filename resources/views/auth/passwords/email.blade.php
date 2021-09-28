@extends('layouts.app')

@section('content')
<div class="wrapper gf-email-password-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="/images/homepage/gf-subscribe-image.png" width="400" height="340" alt="image not found">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="gf-red">
                            {{ __('Recover Password') }}
                        </h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row mb-0">

                                <div class="col">
                                    <input id="email" type="email" class="gf-form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col">
                                    <button type="submit" class="col gf-btn-dark">
                                        {{ __('Send Reset Link') }}
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
