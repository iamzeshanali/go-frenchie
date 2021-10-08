@extends('./layouts.app')
@section('title', 'Litters')
@section('content')



    {{--Homepage Banner Section--}}
    <div class="wrapper gf-resources-banner-wrapper d-flex justify-content-center">
        <div class="container row align-items-center">
            <div class="gf-resources-banner-text col-md-6">
                <h1>
                    <span style="color:#be202e;">Upcoming Litters</span><br>
                    For Frenchie Lovers</h1>
            </div>
            <div class="col-md-6 text-center">
                <img src="/images/frenchie-reading-book.png" loading="lazy" width="800" height="431" alt="">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="page-content d-lg-flex align-items-start">
            {{--            Adds Area--}}
            <div class="gf-adds-area mb-3 col-xl-2">
                <img class="gf-side-add-image rounded" src="/images/ads/the-dog-house.jpg" alt="">
{{--                @include('components/adds-area')--}}
            </div>

            <div class="fbd-content-area mb-3 col-xl-8 col-lg-9">

                <div id="primary-listing-data" class="fbd-listing-area">

                    <p class="listing-count">Showing <b>{{count($sponsoredLitters)}}</b> listings</p>
                    <h3 class="listing-type">SPONSORED LITTERS</h3>
                    @if(empty($sponsoredLitters))
                        <div class="fbd-standard-listing p-3">
                            <div class="fbd-standard-card rounded row p-3">
                                <p class="text-center">No Sponsored Litters</p>
                            </div>
                        </div>
                    @else
                        @foreach($sponsoredLitters as $key=>$sponsoredLitter)
                            <div  class="fbd-sponsured-listings py-3">
                                <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                    <div class="col-lg-3 p-0 m-auto">
                                        <div class="fbd-sp-listing-img">
                                            <img src="{{$sponsoredLitter->photo1 ? asset_file_url($sponsoredLitter->photo1): '/images/notfound/gf-not-found.png'}}" width="250" height="250" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                        <div onclick="singlePuppy('{{$sponsoredLitter->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                            <h4 class="fbd-sp-list-title d-inline">{{$sponsoredLitter->title}}</h4>
                                            <p>{{$sponsoredLitter->description->asString()}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
{{--                                            <div class="col-xl-6 pl-0">--}}
{{--                                                <i class="fa fa-venus"></i>--}}
{{--                                                <span>{{$sponsoredLitter->dam}}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xl-6 fbd-sp-list-detail-second pl-0">--}}
{{--                                                <i class="fa fa-mars"></i>--}}
{{--                                                <span>{{$sponsoredLitter->sire}}</span>--}}
{{--                                            </div>--}}
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$sponsoredLitter->breeder->phone}}</span>
                                            </div>
                                            <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$sponsoredLitter->expectedDob->getTimestamp())}}</span>
                                            </div>
{{--                                            <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">--}}
{{--                                                <i class="fa fa-envelope"></i>--}}
{{--                                                <span>{{$sponsoredLitter->breeder->email->asString()}}</span>--}}
{{--                                            </div>--}}
                                            <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$sponsoredLitter->breeder->kennelName}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                        <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
                                                <x-like-sponsored-litters slug="{{$sponsoredLitter->slug}}"></x-like-sponsored-litters>
                                            <a target="_blank" href="{{$sponsoredLitter->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a target="_blank" href="{{$sponsoredLitter->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a target="_blank" href="{{$sponsoredLitter->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                                            <a target="_blank" href="#"><i class="fas fa-share-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif
                    <p class="listing-count">Showing <b>{{count($standardLitters)}}</b> listings</p>
                    <h3 class="listing-type my-3">STANDARD LISTINGS</h3>

                    @if(empty($standardLitters))
                        <div class="fbd-standard-listing p-3">
                            <div class="fbd-standard-card rounded row p-3">
                                <p class="text-center">No Standard Listings</p>
                            </div>
                        </div>
                    @else
                        @foreach($standardLitters as $key=>$standardLitter)
                            <div  class="fbd-sponsured-listings py-3">
                                <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                    <div class="col-lg-3 p-0 m-auto">
                                        <div class="fbd-sp-listing-img">
                                            <img src="{{$standardLitter->photo1 ? asset_file_url($standardLitter->photo1): '/images/notfound/gf-not-found.png'}}" width="250" height="250" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                        <div onclick="singlePuppy('{{$standardLitter->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                            <h4 class="fbd-sp-list-title d-inline">{{$standardLitter->title}}</h4>
                                            <p>{{$standardLitter->description->asString()}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
{{--                                            <div class="col-xl-6 pl-0">--}}
{{--                                                <i class="fa fa-venus"></i>--}}
{{--                                                <span>{{$standardLitter->dam}}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xl-6 fbd-sp-list-detail-second pl-0">--}}
{{--                                                <i class="fa fa-mars"></i>--}}
{{--                                                <span>{{$standardLitter->sire}}</span>--}}
{{--                                            </div>--}}
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$standardLitter->breeder->phone}}</span>
                                            </div>
                                            <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$standardLitter->expectedDob->getTimestamp())}}</span>
                                            </div>
{{--                                            <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">--}}
{{--                                                <i class="fa fa-envelope"></i>--}}
{{--                                                <span>{{$standardLitter->breeder->email->asString()}}</span>--}}
{{--                                            </div>--}}
                                            <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$standardLitter->breeder->kennelName}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                        <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
                                                <x-like-standard-litters slug="{{$standardLitter->slug}}"></x-like-standard-litters>
                                            <a target="_blank" href="{{$standardLitter->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a target="_blank" href="{{$standardLitter->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a target="_blank" href="{{$standardLitter->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                                            <a target="_blank" href="#"><i class="fas fa-share-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif

                </div>

                <div id="secondary-listing-data" class="fbd-listing-area rounded">
                </div>

            </div>

            {{--            Adds Area--}}
            <div class="gf-adds-area mb-3 col-xl-2">
                @include('components/adds-area')
            </div>
        </div>
    </div>


{{--Testimonials Slider--}}
@include('components.sections.gf-testimonials')


{{--Contact Section--}}
@include('components.sections.gf-contact-form')

    <script type="text/javascript">

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
        function closeModal() {
            $('#loaderModalCenter').on('shown.bs.modal', function(e) {
                $("#loaderModalCenter").modal("hide");
            });
        }

        function singlePuppy($slug) {
            // console.log($slug);
            window.open("{{\Illuminate\Support\Facades\URL::to('show-litter')}}/"+$slug, "_blank");
        }


    </script>
@endsection
