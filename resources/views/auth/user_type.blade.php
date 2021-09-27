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
                            <div class="col-md-6">
                                <a href="{{ route('registercustomer') }}" class="d-inline-block">
                                    <img src="/images/gf-customer-icon.png" width="150" height="221" alt="Image not found">
                                    <br>
                                    {{ __('CUSTOMER') }}
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('registerbreeder') }}" type="button" class="d-inline-block">
                                    <img src="/images/gf-breeder-icon.png" width="150" height="221" alt="Image not found">
                                    <br>
                                    {{ __('BREEDER') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
