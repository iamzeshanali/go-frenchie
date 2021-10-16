@extends('./layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row pb-0">
            <div class="btn-group btn-breadcrumb breadcrumb-info">
                <a href="{{route('dashboard')}}" class="btn btn-info visible-lg-block visible-md-block">Dashboard</a>
                <a href="#" class="btn btn-info visible-lg-block visible-md-block">Liked Items</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
{{--        <h2 class="page-title text-center mb-5">Breader Dashboard</h2>--}}
        <div class="gf-dashboard-page-content row align-items-start {{Auth::User()->role->getValue()  == 'breeder' ? '' : 'justify-content-center'}}">
            @if(Auth::User()->role->getValue()  == 'breeder')
                @include('components.gf-dashboard-menu-area')
            @endif
            <div class="breader-dashboard-content {{Auth::User()->role->getValue()  == 'breeder' ? 'col-xl-10' : 'col-xl-9'}} col-lg-9">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Your Liked <b>Listings</b></h2>
                                    </div>
                                </div>
                            </div>

                            {{--Studs and Puppies--}}
                            @if(!empty($savedListings))
                                @foreach($savedListings as $key=>$sponsoredPuppy)

                                    <div  class="fbd-sponsured-listings py-3">
                                        <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                            <div class="col-lg-3 p-0 m-auto">
                                                <div class="fbd-sp-listing-img">
                                                    <img src="{{$sponsoredPuppy->listings->photo1 ? asset_file_url($sponsoredPuppy->listings->photo1): '/images/notfound/gf-not-found.png'}}" width="250" height="250" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                                <div onclick="singlePuppy('{{$sponsoredPuppy->listings->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                                    <h4 class="fbd-sp-list-title d-inline">{{$sponsoredPuppy->listings->title}}</h4>
                                                    <p>{{$sponsoredPuppy->listings->description->asString()}}</p>
                                                </div>
                                                <div class="fbd-sp-list-detail row">
                                                    <div class="col-xl-6 pl-0">
                                                        <i class="fa fa-phone-alt"></i>
                                                        <span>{{$sponsoredPuppy->listings->breeder->phone}}</span>
                                                    </div>
                                                    <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                        <i class="fa fa-calendar-alt"></i>
                                                        <span>{{date('Y-m-d',$sponsoredPuppy->listings->dob->getTimestamp())}}</span>
                                                    </div>
                                                    <div class="col-xl-3 pl-0">
                                                        <i class="fa fa-venus-mars"></i>
                                                        <span>{{$sponsoredPuppy->listings->sex->getValue()}}</span>
                                                    </div>
                                                    {{--                                        </div>--}}
                                                    {{--                                        <div class="fbd-sp-list-kennel row">--}}
                                                    <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">
                                                        <i class="fa fa-envelope"></i>
                                                        <span>{{$sponsoredPuppy->customer->email->asString()}}</span>
                                                    </div>
                                                    <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                        <i class="fa fa-igloo"></i>
                                                        <span>{{$sponsoredPuppy->customer->kennelName}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                                <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
                                                    <x-like-sponsored slug="{{$sponsoredPuppy->listings->slug}}"></x-like-sponsored>

                                                    <a href="{{ $sponsoredPuppy->customer->fbAccountUrl ? $sponsoredPuppy->customer->fbAccountUrl->asString() : '#'}}"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="{{ $sponsoredPuppy->customer->igAccountUrl ? $sponsoredPuppy->customer->igAccountUrl->asString() : '#'}}"><i class="fab fa-instagram"></i></a>
                                                    <a href="{{ $sponsoredPuppy->customer->website ? $sponsoredPuppy->customer->website->asString() : '#'}}"><i class="fas fa-globe"></i></a>
                                                    <a href="#"><i class="fas fa-share-square"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endif
                            {{--Litters--}}

                            <?php
                            $allSavedLitters = app(\App\Http\Controllers\SavedItemsController::class)->getAllLittersofCurrentUser();
//                            dd($allSavedLitters);
                            ?>
                            @foreach($allSavedLitters as $key=>$savedLitter)
                                <div  class="fbd-sponsured-listings py-3">
                                    <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                        <div class="col-lg-3 p-0 m-auto">
                                            <div class="fbd-sp-listing-img">
                                                <img src="{{$savedLitter->litters->photo1 ? asset_file_url($savedLitter->litters->photo1): '/images/notfound/gf-not-found.png'}}" width="250" height="250" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                            <div onclick="singleLitter('{{$savedLitter->litters->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                                <h4 class="fbd-sp-list-title d-inline">{{$savedLitter->litters->title}}</h4>
                                                <p>{{$savedLitter->litters->description->asString()}}</p>
                                            </div>
                                            <div class="fbd-sp-list-detail row">
                                                <div class="col-xl-6 pl-0">
                                                    <i class="fa fa-venus"></i>
                                                    <span>{{$savedLitter->litters->dam}}</span>
                                                </div>
                                                <div class="col-xl-6 fbd-sp-list-detail-second pl-0">
                                                    <i class="fa fa-mars"></i>
                                                    <span>{{$savedLitter->litters->sire}}</span>
                                                </div>
                                                <div class="col-xl-6 pl-0">
                                                    <i class="fa fa-phone-alt"></i>
                                                    <span>{{$savedLitter->customer->phone}}</span>
                                                </div>
                                                <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                    <i class="fa fa-calendar-alt"></i>
                                                    <span>{{date('Y-m-d',$savedLitter->litters->expectedDob->getTimestamp())}}</span>
                                                </div>
                                                <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">
                                                    <i class="fa fa-envelope"></i>
                                                    <span>{{$savedLitter->customer->email->asString()}}</span>
                                                </div>
                                                <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                    <i class="fa fa-igloo"></i>
                                                    <span>{{$savedLitter->customer->kennelName}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                            <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
                                                <x-like-sponsored-litters slug="{{$savedLitter->litters->slug}}"></x-like-sponsored-litters>

                                                <a href="{{ $savedLitter->customer->fbAccountUrl ? $savedLitter->customer->fbAccountUrl->asString() : '#'}}"><i class="fab fa-facebook-f"></i></a>
                                                <a href="{{ $savedLitter->customer->igAccountUrl ? $savedLitter->customer->igAccountUrl->asString() : '#'}}"><i class="fab fa-instagram"></i></a>
                                                <a href="{{ $savedLitter->customer->website ? $savedLitter->customer->website->asString() : '#'}}"><i class="fas fa-globe"></i></a>
                                                <a target="_blank" href="#"><i class="fas fa-share-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            @if(empty($savedListings) && empty($allSavedLitters))
                                <div class="fbd-standard-listing p-3">
                                    <div class="fbd-standard-card rounded row p-3">
                                        <p class="text-center">No Liked Listings</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

<script type="text/javascript">
    function singlePuppy($slug) {
        // console.log($slug);
        window.location = "{{\Illuminate\Support\Facades\URL::to('puppy-listing')}}/"+$slug;
    }

    function singleLitter($slug) {
        // console.log($slug);
        window.location = "{{\Illuminate\Support\Facades\URL::to('show-litter')}}/"+$slug;
    }

    function addOrRemoveToFavourite($slug, $email, $type){
        $.ajax({
            type:'POST',
            url: '{{route('addOrRemoveToFavourite')}}',
            data: {
                slug:$slug,
                email:$email,
                type:$type
            },
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(data){
                // console.log(data.success);
                if(data.success == '200'){
                    // console.log(data.success);
                    var className = ".fbd-liked-icon"+"-"+$slug;
                    $(className).css("color","#be202e");
                }
                if(data.success == '300'){
                    // console.log(data.success);
                    var className = ".fbd-liked-icon"+"-"+$slug;
                    $(className).css("color","#c4bfbf");
                }
            },

        });

    }
</script>
