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
                            <div class="form-group row mb-0 p-0">
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
                            {{--<div class="form-group row mb-0">
--}}{{--                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>--}}{{--

                                <div class="col">
                                    <input id="username" type="text" class="gf-form-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>--}}
                            {{--  EMAIL-ADDRESS  --}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col">
                                    <input id="email" type="email" onblur="checkForEmail(value)" class="gf-form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                    <span id="email-error" class="invalid-feedback d-none" role="alert">
                                        <strong>{{  __('Email Already Exists') }}</strong>
                                    </span>

                                </div>
                            </div>
                            {{--  PHONE  --}}
                            <div class="form-group row mb-0 p-0">

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
                            <div class="form-group row mb-0 p-0">

                                <div class="col input-group flex-nowrap">
                                    <input id="register-password" type="password" class="gf-form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
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
                            {{--  CONFIRM-PASSWORD  --}}
                            <div class="form-group row mb-0 p-0">

                                <div class="col input-group flex-nowrap">
                                    <input id="password-confirm" type="password" class="gf-form-field" onchange="checkForPassword(value)" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    <span class="input-group-btn">
                                        <button onclick="showPassword('password-confirm')" class="btn btn-default reveal mt-1" type="button"><i class="fas fa-eye"></i></button>
                                    </span>
                                </div>
                            </div>
                            <span id="password-error" class="invalid-feedback d-none col" style="margin-top: -14px;" role="alert">
                                <strong>{{ __('The password confirmation does not match.') }}</strong>
                            </span>

                            {{--  SUBMIT  --}}
                            <div class="form-group row mb-0 p-0">
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
    function checkForEmail(value){
        console.log(value);
        $.ajax({
            type:'POST',
            url: '{{route('checkForExistingUser')}}',
            data: {
                email:value,
            },
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(data){
                if(data.success == '200'){
                    console.log(data.success);
                    $("#email-error").addClass('d-block');
                    $("#btn-submit").attr("disabled", true);
                }else if (data.success == '404'){
                    console.log(data.success);
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
