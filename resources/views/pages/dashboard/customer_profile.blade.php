@extends('./layouts.app')

@section('content')


    <div class="mt-5 container bg-white rounded p-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-4">
                <div class="breeder-profile-image text-center">
                    <img src="{{ \Illuminate\Support\Facades\Auth::User()->profileImage ? asset_file_url(\Illuminate\Support\Facades\Auth::User()->profileImage): '/images/user.png'}}" alt="Breeder Profile Image" width="200px">
                </div>
            </div>
            <div class="breeder-profile-info col-md-8 d-flex flex-column">
                <h4 title="Kennel Name"><i class="fa fa-igloo"></i>{{\Illuminate\Support\Facades\Auth::User()->firstName}} {{\Illuminate\Support\Facades\Auth::User()->lastName}}</h4>
                <h4 title="Kennel Name"><i class="fa fa-igloo"></i>{{\Illuminate\Support\Facades\Auth::User()->username}}</h4>
                <a href="tel:+3333378901" title="call"><i class="fas fa-phone-alt"></i> {{\Illuminate\Support\Facades\Auth::User()->phone}}</a>
                <a href="mailto:someone@example.com" title="Email"><i class="far fa-envelope"></i>{{\Illuminate\Support\Facades\Auth::User()->email->asString()}}</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i>&nbsp;{{\Illuminate\Support\Facades\Auth::User()->address}} </a>
                <a href="#"><i class="fas fa-globe"></i> {{\Illuminate\Support\Facades\Auth::User()->state}}</a>
                <a href="#"><i class="fas fa-globe"></i> {{\Illuminate\Support\Facades\Auth::User()->city}}, {{\Illuminate\Support\Facades\Auth::User()->zip}}</a>
                <span><i class="fas fa-ticket-alt"></i>RX-580</span>
            </div>
        </div>
    </div>
@endsection
