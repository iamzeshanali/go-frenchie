@extends('./layouts.app')

@section('content')

<div class="gf-breeder-profile-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="breeder-profile-image text-center">

                    <img src="{{ \Illuminate\Support\Facades\Auth::User()->profileImage ? asset_file_url(\Illuminate\Support\Facades\Auth::User()->profileImage): 'images/user.png'}}" alt="Breeder Profile Image" width="250px">
                </div>
            </div>
            <div class="breeder-profile-info col-md-8 d-flex flex-column align-items-start">
                <h2 class="gf-red" title="Kennel Name">{{\Illuminate\Support\Facades\Auth::User()->kennelName}}</h2>
                <a href="#"><i class="fas fa-map-marker-alt"></i>&nbsp;{{\Illuminate\Support\Facades\Auth::User()->address}}, {{\Illuminate\Support\Facades\Auth::User()->city}}, {{\Illuminate\Support\Facades\Auth::User()->state}},{{\Illuminate\Support\Facades\Auth::User()->zip}} </a>
                <a href="#"><i class="fas fa-globe" title="Website"></i>{{\Illuminate\Support\Facades\Auth::User()->website->asString()}}</a>
{{--                <span><i class="fas fa-ticket-alt"></i>RX-580</span>--}}
                <a href="tel:+3333378901" title="call"><i class="fas fa-phone-alt"></i>{{\Illuminate\Support\Facades\Auth::User()->phone}}</a>
                <a href="mailto:someone@example.com" title="Email"><i class="far fa-envelope"></i>{{\Illuminate\Support\Facades\Auth::User()->email->asString()}}</a>
                <a href="{{\Illuminate\Support\Facades\Auth::User()->fbAccountUrl->asString()}}" title="Facebook"><i class="fab fa-facebook-f"></i> /blackrok</a>
                <a href="{{\Illuminate\Support\Facades\Auth::User()->igAccountUrl->asString()}}" title="Instagram"><i class="fab fa-instagram"></i> /rockkennie</a>
            </div>
        </div>

        <div class="gf-breeder-profile-desceiption mt-lg-5">
            <div class="row align-items-center">
                <div class="col-md-8 text-justify">
                    <div class="row breeder-profile-name pb-0 mt-3">
                        <h2 class="gf-red" title="Breeder Name">{{\Illuminate\Support\Facades\Auth::User()->firstName}} {{\Illuminate\Support\Facades\Auth::User()->lastName}}</h2>
                    </div>
                    <p class="breeder-profile-about">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{\Illuminate\Support\Facades\Auth::User()->logo ? asset_file_url(\Illuminate\Support\Facades\Auth::User()->logo): '/images/kennel-logo.png'}}" alt="Kennel Logo" title="Kennel Logo" width="350">
                </div>

            </div>
        </div>

    </div>



    <div class="container my-lg-5">
        <div class="text-center my-3">
            <h2 class="gf-red">Breeder Resources</h2>
        </div>

        <div>
            <h3 class="gf-dark">Breeder Resources</h3>
        </div>

        <div class="breeder-profile-resources">
            <div class="row breeder-resources-cards">
                <?php $allResources = app('App\Http\Controllers\BreederSuppliesController')->getCurrentBreederResources(); ?>
                @foreach($allResources as $resource)
                    <div class="col-md-4  p-3">
                        <div class="breeder-resources-card">
                            <div class="text-center mb-3">
                                <img src="{{$resource->logo ? asset_file_url($resource->logo) : '/images/resource-bag.png'}}" alt="Product Image" width="250" height="250">
                            </div>
                            <div class="product-card-info">
                                <h5>{{$resource->title}}</h5>
                                <p>{{$resource->decription}}</p>
                                <a href="{{$resource->websiteUrl->asString()}}"><i class="fas fa-link gf-blue"></i> &nbsp; {{$resource->websiteUrl->asString()}}</a>
                                <div class="price gf-red text-right"><span>${{$resource->price->getAmount()/100}}</span></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="gf-dark">Cannie Genetics</h3>
        </div>

        <div class="breeder-profile-resources">
            <div class="row breeder-resources-cards">
                <?php $allResources = app('App\Http\Controllers\CanineGeneticsController')->getCanineGenetics(); ?>
                @foreach($allResources as $resource)
                    <div class="col-md-4  p-3">
                        <div class="breeder-resources-card">
                            <div class="text-center mb-3">
                                <img src="{{$resource->logo ? asset_file_url($resource->logo) : '/images/resource-bag.png'}}" alt="Product Image" width="250" height="250">
                            </div>
                            <div class="product-card-info">
                                <h5>{{$resource->title}}</h5>
                                <p>{{$resource->decription}}</p>
                                <a href="{{$resource->websiteUrl->asString()}}"><i class="fas fa-link gf-blue"></i> &nbsp; {{$resource->websiteUrl->asString()}}</a>
                                <div class="price gf-red text-right"><span>${{$resource->price->getAmount()/100}}</span></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="gf-dark">Cannie Nutrition</h3>
        </div>

        <div class="breeder-profile-resources">
            <div class="row breeder-resources-cards">
                <?php $allResources = app('App\Http\Controllers\CanineNutritionController')->getCanineNutrition(); ?>
                @foreach($allResources as $resource)
                    <div class="col-md-4  p-3">
                        <div class="breeder-resources-card">
                            <div class="text-center mb-3">
                                <img src="{{$resource->logo ? asset_file_url($resource->logo) : '/images/resource-bag.png'}}" alt="Product Image" width="250" height="250">
                            </div>
                            <div class="product-card-info">
                                <h5>{{$resource->title}}</h5>
                                <p>{{$resource->decription}}</p>
                                <a href="{{$resource->websiteUrl->asString()}}"><i class="fas fa-link gf-blue"></i> &nbsp; {{$resource->websiteUrl->asString()}}</a>
                                <div class="price gf-red text-right"><span>${{$resource->price->getAmount()/100}}</span></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
