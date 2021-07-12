@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select Your Type') }}</div>

                <div class="card-body">

                    <div class="row text-center justify-content-around">
                        <div class="mb-3">
                            <a href="{{ route('registercustomer') }}" type="button" class="btn btn-primary btn-fbd px-5">{{ __('Register as Customer') }}</a>
                        </div>
                    </div>
                    <div class="row text-center justify-content-around">
                        <div class="mb-3">
                            <a href="{{ route('registerbreeder') }}" type="button" class="btn btn-primary btn-fbd px-5">{{ __('Register as Breeder') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
