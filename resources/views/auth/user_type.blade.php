@extends('layouts.app')

@section('content')
<div class="wrapper gf-select-user-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            {{ __('Select User Type') }}
                        </h3>
                        <p class="text-center">
                            Select user type and start journey with us.
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row text-center justify-content-around">

                            <div class="col-sm-6">
                                <a href="{{ route('registerbreeder') }}" class="gf-btn-dark w-100">{{ __('BREEDER') }}</a>
{{--                                <a href="{{ route('registerbreeder') }}" type="button" class="d-inline-block gf-dark">--}}
{{--                                    <img src="/images/gf-breeder-icon.png" width="150" height="221" alt="Image not found">--}}
{{--                                    {{ __('BREEDER') }}--}}
{{--                                </a>--}}
                            </div>

                            <div class="col-sm-6">
                                <a href="{{ route('registercustomer') }}" class="gf-btn-dark w-100">{{ __('CUSTOMER') }}</a>
{{--                                <a href="{{ route('registercustomer') }}" class="d-inline-block gf-dark">--}}
{{--                                    <img src="/images/gf-customer-icon.png" width="150" height="221" alt="Image not found">--}}
{{--                                    {{ __('CUSTOMER') }}--}}
{{--                                </a>--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
