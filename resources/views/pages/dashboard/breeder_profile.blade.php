@extends('./layouts.app')

@section('content')

<div class="mt-5 container bg-white rounded p-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-4">
            <div class="breeder-profile-image text-center">

                <img src="{{ \Illuminate\Support\Facades\Auth::User()->profileImage ? asset_file_url(\Illuminate\Support\Facades\Auth::User()->profileImage): 'images/user.png'}}" alt="Breeder Profile Image" width="200px">
            </div>
        </div>
        <div class="breeder-profile-info col-md-8 d-flex flex-column">
            <h4 title="Kennel Name"><i class="fa fa-igloo"></i>{{\Illuminate\Support\Facades\Auth::User()->kennelName}}</h4>
            <a href="#"><i class="fas fa-map-marker-alt"></i>&nbsp;{{\Illuminate\Support\Facades\Auth::User()->address}}, {{\Illuminate\Support\Facades\Auth::User()->city}}, {{\Illuminate\Support\Facades\Auth::User()->state}},{{\Illuminate\Support\Facades\Auth::User()->zip}} </a>
            <a href="#"><i class="fas fa-globe" title="Website"></i>{{\Illuminate\Support\Facades\Auth::User()->website->asString()}}</a>
            <span><i class="fas fa-ticket-alt"></i>RX-580</span>
        </div>
    </div>

    <div class="breeder-profile-name mb-3">
        <h4 title="Breeder Name">{{\Illuminate\Support\Facades\Auth::User()->firstName}} {{\Illuminate\Support\Facades\Auth::User()->lastName}}</h4>
    </div>

    <div class="row breeder-profile-contact mb-5">
        <div class="col-md-4">
            <a href="tel:+3333378901" title="call"><i class="fas fa-phone-alt"></i>{{\Illuminate\Support\Facades\Auth::User()->phone}}</a> <br>
            <a href="mailto:someone@example.com" title="Email"><i class="far fa-envelope"></i>{{\Illuminate\Support\Facades\Auth::User()->email->asString()}}</a>
        </div>
        <div class="col-md-4">
            <a href="{{\Illuminate\Support\Facades\Auth::User()->fbAccountUrl->asString()}}" title="Facebook"><i class="fab fa-facebook-f"></i> /blackrok</a> <br>
            <a href="{{\Illuminate\Support\Facades\Auth::User()->igAccountUrl->asString()}}" title="Instagram"><i class="fab fa-instagram"></i> /rockkennie</a>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3 text-center">
                <img src="{{\Illuminate\Support\Facades\Auth::User()->logo ? asset_file_url(\Illuminate\Support\Facades\Auth::User()->logo): '/images/kennel-logo.png'}}" alt="Kennel Logo" title="Kennel Logo" width="100px">
        </div>
        <div class="col-md-9 text-justify">
            <p class="breeder-profile-about">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            </p>
        </div>
    </div>

</div>

<div class="text-center my-3">
    <h2>Breeder Resources</h2>
</div>

<div class="container mb-5">
    <div class="breeder-profile-resources">
        <div class="row breeder-resources-cards">
            <?php $allResources = app('App\Http\Controllers\BreederSuppliesController')->getCurrentBreederResources(); ?>
                @foreach($allResources as $resource)
                    <div class="col-md-4 breeder-resources-card bg-white p-4 rounded">
                        <div class="text-center mb-3">
                            <img src="{{$resource->logo ? asset_file_url($resource->logo) : '/images/resource-bag.png'}}" alt="Product Image" width="100px">
                        </div>
                        <div class="product-card-info">

                            <h5>{{$resource->title}}</h5>
                            <p>{{$resource->decription}}</p>
                            <a href="{{$resource->websiteUrl->asString()}}"><i class="fas fa-link"></i> &nbsp; {{$resource->websiteUrl->asString()}}</a>
                            <div class="price float-right"><span>${{$resource->price->getAmount()/100}}</span></div>
                        </div>
                    </div>
                @endforeach
        </div>

    </div>
</div>
@endsection
