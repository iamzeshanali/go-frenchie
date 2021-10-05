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

                            <div class="form-group row mb-0 p-0">

                                {{--FIRST NAME--}}
                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="gf-form-field @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('First Name *') }}">

                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{--LAST NAME--}}
                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="gf-form-field @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="name" autofocus placeholder="{{ __('Last Name *') }}">

                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--USERNAME--}}
                            {{--<div class="form-group row mb-0">

                                <div class="col">
                                    <input id="username" type="text" class="gf-form-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="{{ __('Username') }}">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>--}}
                            {{--EMAIL--}}
                            <div class="form-group row mb-0 p-0">
                                <div class="col">
                                    <input id="email" type="email" onchange="checkForEmail(value)" class="gf-form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email *') }}">
                                </div>
                            </div>

                            <span id="email-error" class="invalid-feedback d-none col" style="margin-top: -14px;" role="alert">
                                <strong>{{ __('Email Already Exists') }}</strong>
                            </span>
                            {{--PASSWORD--}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col input-group flex-nowrap">
                                    <input id="register-password" type="password" class="gf-form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password *') }}">
                                    <span class="input-group-btn">
                                        <button onclick="showPassword('register-password')" class="btn btn-default reveal mt-1" type="button"><i class="fas fa-eye"></i></button>
                                    </span>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{--CONFIRM-PASSWORD--}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col input-group flex-nowrap">
                                    <input id="password-confirm" type="password" class="gf-form-field" onchange="checkForPassword(value)" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password *') }}">
                                    <span class="input-group-btn">
                                        <button onclick="showPassword('password-confirm')" class="btn btn-default reveal mt-1" type="button"><i class="fas fa-eye"></i></button>
                                    </span>

                                </div>
                            </div>
                            <span id="password-error" class="invalid-feedback d-none col" style="margin-top: -14px;" role="alert">
                                <strong>{{ __('The password confirmation does not match.') }}</strong>
                            </span>
                            {{--PHONE-NUMBER--}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col">
                                    <input id="phone-number" type="tel" class="gf-form-field" name="phone-number" required autocomplete="phone-number" placeholder="{{ __('Phone *') }}">
                                </div>
                            </div>
                            {{--  ADDRESS  --}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col">
                                    <input id="address" type="text" class="gf-form-field @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="{{ __('Street Address *') }}">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 p-0">

                                {{--  ZIP  --}}
                                <div class="col-md-6">
                                    <input id="zip" type="text" class="gf-form-field @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus placeholder="{{ __('Zip *') }}">

                                    @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{--  STATE  --}}
                                <div class="col-md-6">
                                    <input id="state" type="text" class="gf-form-field @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus placeholder="{{ __('State *') }}">

                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--  CITY  --}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col">
                                    <input id="city" type="text" class="gf-form-field @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="{{ __('City *') }}">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--KENNEL-NAME--}}
                            <div class="form-group row mb-0 p-0">
                                <div class="col">
                                    <input id="kennel-name" type="text" class="gf-form-field" name="kennel-name" required autocomplete="kennel-name" placeholder="{{ __('Kennel Name *') }}">
                                </div>
                            </div>
                            {{--FACEBOOK-URL--}}
                            <div class="form-group row mb-0 p-0">
                                <div class="col">
                                    <div class="input-group mb-0 flex-nowrap">
                                        <label for="b-facebook" class="col-2 gf-form-field-inline-icon text-center gf-bg-red border-0"><i class="fab fa-facebook-f text-white"></i></label>
                                        <input id="b-facebook" type="url" class="col gf-form-field gf-form-field-inline-right" name="b-facebook" autocomplete="b-facebook" placeholder="http://facebook.com/username">
                                    </div>
                                </div>
                            </div>
                            {{--INSTAGRAM-URL--}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col">
                                    <div class="input-group mb-0 flex-nowrap">
                                        <label for="b-instagram" class="col-2 text-center gf-form-field-inline-icon gf-bg-red border-0"><i class="fab fa-instagram text-white"></i></label>
                                        <input id="b-instagram" type="url" class="gf-form-field gf-form-field-inline-right" name="b-instagram" autocomplete="b-instagram" placeholder="https://www.instagram.com/username">
                                    </div>
                                </div>


                            </div>
                            {{--WEBSITE-URL--}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col">
                                    <div class="input-group mb-0 flex-nowrap">
                                        <label for="b-website" class="col-2 text-center gf-form-field-inline-icon gf-bg-red border-0"><i class="fas fa-globe text-white"></i></label>
                                        <input id="b-website" type="url" class="gf-form-field gf-form-field-inline-right" name="b-website" autocomplete="b-instagram" placeholder="https://www.web.com/">
                                    </div>
                                </div>
                            </div>
                            {{--KENNEL LOGO--}}
{{--                            <div class="form-group row mb-0">--}}
{{--                                <label for="b-logo" class="col-md-4 col-form-label">{{ __('Kennel Logo') }}</label>--}}
{{--                                <div class="col">--}}
{{--                                    <label for=""> Enter your file--}}
{{--                                        <input id="b-logo" type="file" class="gf-form-field border-0 p-0 rounded"  name="b-logo">--}}
{{--                                    </label>--}}

{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row gf-breeder-reg-kennel-logo p-0">
                                <input type="file" class="register-breeder-logo" name="b-logo"  accept="image/*">
                                <div class="col input-group flex-nowrap">
                                    <input id="register-breeder-logo" type="text" class="gf-form-field" required disabled placeholder="Kennel Logo" >
                                    <div class="">
                                        <button type="button" class="browse-b-register-logo gf-btn-dark gf-form-field-inline-btn">Browse</button>
                                    </div>
                                </div>
                            </div>
                            {{--SUBMIT--}}
                            <div class="form-group row col mb-0 p-0">
                                <div class="col">
                                    <button type="submit" id="btn-submit" class="col gf-btn-dark">
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
</div>
@endsection
<script type="text/javascript">
    checkForEmail = (value) => {
        $.ajax({
            type:'POST',
            url: '{{route('checkForExistingUser')}}',
            data: {
                email:value,
            },
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(data){
                if(data.success == '200'){
                    // console.log(data.success);
                    $("#email-error").addClass('d-block');
                    $("#btn-submit").attr("disabled", true);
                }else if (data.success == '404'){
                    // console.log(data.success);
                    $("#email-error").removeClass('d-block');
                    $("#email-error").addClass('d-none');
                    $("#btn-submit").attr("disabled", false);
                }
            },
        });
    }
    checkForPassword = (value) => {
        // console.log(value);
        let password = document.querySelector('#register-password');
        let submit = document.querySelector('#btn-submit');

        if (password.value === value){
            $(submit).attr('disabled', false);
            $("#password-error").removeClass('d-block');
            $("#password-error").addClass('d-none');
        }
        else{
            $(submit).attr('disabled', true);
            $('#password-error').removeClass('d-none');
            $('#password-error').addClass('d-block');
        }
    }
</script>
