@extends('./layouts.app')

@section('content')


<div class="mt-5 container bg-white rounded p-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-4">
            <div class="breeder-profile-image text-center">
                <img src="{{asset_file_url($kennel->profileImage)}}" alt="Breeder Profile Image" width="200px">
            </div>
        </div>
        <div class="breeder-profile-info col-md-8 d-flex flex-column">
            <h4 title="Kennel Name"><i class="fa fa-igloo"></i>{{$kennel->kennelName}}</h4>
            <a href="#"><i class="fas fa-map-marker-alt"></i>&nbsp;{{$kennel->address}}, {{$kennel->city}}, {{$kennel->state}}</a>
            <a href="#"><i class="fas fa-globe" title="Website"></i>{{$kennel->website->asString()}}</a>
            <span><i class="fas fa-ticket-alt"></i>{{$kennel->zip}}</span>
        </div>
    </div>

    <div class="breeder-profile-name mb-3">
        <h4 title="Breeder Name">{{$kennel->firstName}} {{$kennel->lastName}}</h4>
    </div>

    <div class="row breeder-profile-contact mb-5">
        <div class="col-md-4">
            <a href="tel:+3333378901" title="call"><i class="fas fa-phone-alt"></i>{{$kennel->phone}}</a> <br>
            <a href="mailto:someone@example.com" title="Email"><i class="far fa-envelope"></i>{{$kennel->email->asString()}}</a>
        </div>
        <div class="col-md-4">
            <a href="{{$kennel->fbAccountUrl->asString()}}" title="Facebook"><i class="fab fa-facebook-f"></i> /blackrok</a> <br>
            <a href="{{$kennel->igAccountUrl->asString()}}" title="Instagram"><i class="fab fa-instagram"></i> /rockkennie</a>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3 text-center">
            <img src="{{asset_file_url($kennel->logo)}}" alt="Kennel Logo" title="Kennel Logo" width="100px">
        </div>
        <div class="col-md-9 text-justify">
            <p class="breeder-profile-about">
                 Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
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
            @foreach($breederSupplies as $bs)
                <div class="col-md-4 breeder-resources-card bg-white p-4 rounded">
                    <div class="text-center mb-3">
                        <img src="{{asset_file_url($bs->logo)}}" alt="Product Image" width="100px">
                    </div>
                    <div class="product-card-info">
                        <h5>{{$bs->title}}</h5>
                        <p>{{$bs->decription}}</p>
                        <a href="{{$bs->websiteUrl->asString()}}"><i class="fas fa-link"></i> &nbsp; {{$bs->websiteUrl->asString()}}</a>
                        <div class="price float-right"><span>${{$bs->price->asString()}}</span></div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<div class="text-center my-3">
    <h2>Canine Genetics</h2>
</div>

<div class="container mb-5">
    <div class="breeder-profile-resources">
        <div class="row breeder-resources-cards">
            @foreach($canineGenetics as $cg)
                <div class="col-md-4 breeder-resources-card bg-white p-4 rounded">
                    <div class="text-center mb-3">
                        <img src="{{asset_file_url($cg->logo)}}" alt="Product Image" width="100px">
                    </div>
                    <div class="product-card-info">
                        <h5>{{$cg->title}}</h5>
                        <p>{{$cg->decription}}</p>
                        <a href="{{$cg->websiteUrl->asString()}}"><i class="fas fa-link"></i> &nbsp; {{$cg->websiteUrl->asString()}}</a>
                        <div class="price float-right"><span>${{$cg->price->asString()}}</span></div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<div class="text-center my-3">
    <h2>Canine Nutrition</h2>
</div>

<div class="container mb-5">
    <div class="breeder-profile-resources">
        <div class="row breeder-resources-cards">
            @foreach($canineNutrition as $cn)
                <div class="col-md-4 breeder-resources-card bg-white p-4 rounded">
                    <div class="text-center mb-3">
                        <img src="{{asset_file_url($cn->logo)}}" alt="Product Image" width="100px">
                    </div>
                    <div class="product-card-info">
                        <h5>{{$cn->title}}</h5>
                        <p>{{$cn->decription}}</p>
                        <a href="{{$cn->websiteUrl->asString()}}"><i class="fas fa-link"></i> &nbsp; {{$cn->websiteUrl->asString()}}</a>
                        <div class="price float-right"><span>${{$cn->price->asString()}}</span></div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>


@endsection
