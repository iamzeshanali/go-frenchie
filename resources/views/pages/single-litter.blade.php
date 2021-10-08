@extends('./layouts.app')

@section('content')


    <div class="single-listing-wrapper container">

        <div class="row">
            <div class="btn-group btn-breadcrumb breadcrumb-info">
                @if(request()->routeIs('showSingleLitter'))
                    <a href="{{route('dashboard')}}" class="btn btn-info visible-lg-block visible-md-block">Dashboard</a>
                    <a href="{{route('showAllLitters',1)}}" class="btn btn-info visible-lg-block visible-md-block">Litters</a>
                    <a href="" class="btn btn-info visible-lg-block visible-md-block">Single Litter</a>
                @else
                    <a href="{{route('showLitters')}}" class="btn btn-info visible-lg-block visible-md-block">Litters</a>
                    <a href="" class="btn btn-info visible-lg-block visible-md-block">Single Litter</a>
                @endif
            </div>
        </div>


        <div class="row py-2">
            <div class="col-md-6">
                <h2 class="fbd-single-listing-title gf-red">{{$litter->title}}</h2>
            </div>
            <div class="col-md-6">
                <div class="fbd-single-listing-social text-right mb-3">
                    <x-like-sponsored-litters slug="{{$litter->slug}}"></x-like-sponsored-litters>
                </div>
            </div>
        </div>
        <div class="row mb-5 fbd-single-listing-info">
            <div class="col-md-6 px-5">
                <div class="fbd-single-listing-img p-3 mb-3">
                    @if($litter->photo1)<img src="{{ asset_file_url($litter->photo1)}}" alt="">@endif
                    @if($litter->photo2)<img src="{{ asset_file_url($litter->photo2)}}" alt="">@endif
                    @if($litter->photo3)<img src="{{ asset_file_url($litter->photo3)}}" alt="">@endif
                    @if($litter->photo4)<img src="{{ asset_file_url($litter->photo4)}}" alt="">@endif
                    @if($litter->photo5)<img src="{{ asset_file_url($litter->photo5)}}" alt="">@endif
                </div>
                <div class="fbd-single-listing-thumbs mb-3">
                    @if($litter->photo1)<img src="{{ asset_file_url($litter->photo1)}}" alt="">@endif
                    @if($litter->photo2)<img src="{{ asset_file_url($litter->photo2)}}" alt="">@endif
                    @if($litter->photo3)<img src="{{ asset_file_url($litter->photo3)}}" alt="">@endif
                    @if($litter->photo4)<img src="{{ asset_file_url($litter->photo4)}}" alt="">@endif
                    @if($litter->photo5)<img src="{{ asset_file_url($litter->photo5)}}" alt="">@endif
                </div>

            </div>
            <div class="col-md-6">
                <a class="breeder-name" href="" title="Breeder Name">
                    <h3>{{ucfirst($litter->breeder->username)}}</h3>
                </a>
                <span class="kennel-name" title="Kennel Name">{{ucfirst($litter->breeder->kennelName)}}</span>
                <hr>
                <div>
                    <a class="contactNo mb-2" href="tel:+15016727186" title="Phone"><i class="fa fa-phone-alt"></i>&emsp; {{$litter->breeder->phone}}</a><br>
                    <a class="email mb-2" href="" title="Email"><i class="fa fa-envelope"></i>&emsp;{{$litter->breeder->email->asString()}}</a><br>
                    <a class="website" href="" title="Website"><i class="fas fa-globe"></i>&emsp; {{$litter->breeder->website->asString()}}</a>
                    <div class="fbd-single-listing-features">
                        <i class="fa fa-calendar-alt"></i> &emsp; <span title="Date of Birth">{{date('Y-m-d',$litter->expectedDob->getTimestamp())}}</span><br>
                    </div>
                    <div class="fbd-single-listing-features">
                        <i class="fa fa-dna"></i> &emsp; <span title="DAM">{{$litter->dam}}</span><br>
                    </div>
                    <div class="fbd-single-listing-features">
                        <i class="fa fa-dna"></i> &emsp; <span title="SIRE">{{$litter->sire}}</span><br>
                    </div>
                </div>
                <hr>
                <div class="row my-4 fbd-single-listing-contact-social justify-content-around">
                    <a class="mx-4" href="{{$litter->breeder->fbAccountUrl->asString()}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-4" href="{$litter->breeder->igAccountUrl->asString()}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a class="mx-4" href="{{$litter->breeder->website->asString()}}" title="Share"><i class="fas fa-share-square"></i></a>
                </div>


            </div>

        </div>


        <div class="fbd-single-listing-description row my-4 mx-4">
            <div class="col-md-6">
                <h2 class="gf-red">Description</h2>
                <p>{{$litter->description->asString()}}}</p>
            </div>
            <div class="col-md-6">

                <div class="fbd-single-listing-contactForm">
                    <form action="{{route('contactBreederMail')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            @if(\Illuminate\Support\Facades\Session::get('status'))
                                <div class="alert alert-success"> <p>Mail Sent</p> </div>
                            @endif
                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ \Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="card">

                            <div class="card-header text-center">
                                <h3 class="gf-red">
                                    Contact With Breeder
                                </h3>
                            </div>

                            <div class="card-body px-3 pb-3 pt-0">
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <input type="text" class="gf-form-field" id="name" name="name" placeholder="Name" required>
                                        <input type="hidden" class="form-control" value="{{$litter->getId()}}" name="listing" placeholder="Name *">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <input type="email" class="gf-form-field" id="email" name="email" placeholder="Email *" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <input type="text" class="gf-form-field" id="subject" name="subject" placeholder="Subject *" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <textarea class="gf-form-field" style="height: 100%;" name="message" placeholder="Message *" rows="6" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Send Message" class="gf-btn-dark py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>



    <script type="text/javascript">
        function addOrRemoveToFavourite($slug, $email, $type){
            // console.log($slug, $email, $type);

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
    <script>
        $('.fbd-single-listing-img').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            arrows: true,
            focusOnSelect: true,
            asNavFor: '.fbd-single-listing-thumbs'
        });
        $('.fbd-single-listing-thumbs').slick({
            slidesToShow: 3,
            centerMode: true,
            centerPadding: '30px',
            slidesToScroll: 1,
            asNavFor: '.fbd-single-listing-img',
            focusOnSelect: true,
            arrows: false
        });
    </script>

@endsection
