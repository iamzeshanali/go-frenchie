@extends('./layouts.app')

@section('content')


    <div class="single-litters-wrapper container">

    </div>

    <div class="container">
{{--        <div class="breadcrumbs row align-items-center mb-2">--}}
{{--            <a href="" title="Dashboard"><i class="fas fa-tachometer-alt"></i>&emsp; Dashboard</a> &emsp;--}}
{{--            <i class="fas fa-angle-right"></i> &emsp;--}}
{{--            <a href="" title="View Listing">View Listing</a> &emsp;--}}
{{--        </div>--}}
        <div class="row mb-3">
            <div class="col-md-6">
                <h2 class="fbd-single-listing-title">{{$litter->title}}</h2>
            </div>
            <div class="col-md-6">
{{--                <div class="fbd-single-listing-social text-right mb-3">--}}
{{--                    @if(Auth::user())--}}
{{--                        <?php--}}
{{--                        $allSavedListings = app('App\Http\Controllers\SavedItemsController')->getAllLitters();--}}
{{--                        //                                            dd($allSavedListings);--}}
{{--                        ?>--}}
{{--                        @if(count($allSavedListings) > 0)--}}
{{--                            <?php--}}
{{--                            foreach ($allSavedListings as $saved) {--}}
{{--                                if ($saved->customer->username == \Illuminate\Support\Facades\Auth::user()->username)--}}
{{--                                {--}}
{{--                                    if(($saved->litters->slug == $litter->slug)){--}}
{{--                                        $matched = true;--}}
{{--                                        break;--}}
{{--                                    }else{--}}
{{--                                        $matched = false;--}}
{{--                                    }--}}

{{--                                }--}}
{{--                            }--}}
{{--                            ?>--}}
{{--                            @if($matched == false)--}}
{{--                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$litter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$litter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>--}}
{{--                            @else--}}
{{--                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$litter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$litter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>--}}
{{--                            @endif--}}

{{--                        @else--}}
{{--                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$litter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$litter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <a href="#LoginModal" class="delete" data-toggle="modal"><i style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon fas fa-heart float-right"></i></a>--}}
{{--                    @endif--}}
{{--                    <div id="LoginModal" class="modal fade">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h4 class="modal-title">Register Yourself</h4>--}}
{{--                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
{{--                                </div>--}}
{{--                                @if (\Session::has('error'))--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        {{ \Session::get('error') }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <form method="POST" action="{{ route('addToFavouriteWithUserLogin') }}">--}}
{{--                                    @csrf--}}
{{--                                    <div class="modal-body">--}}

{{--                                        <input type="hidden" name="slug" value="{{$litter->slug}}">--}}
{{--                                        <input type="hidden" name="type" value="litters">--}}

{{--                                        --}}{{--  EMAIL-ADDRESS  --}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                                @error('email')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                                            <strong>{{ $message }}</strong>--}}
{{--                                                                        </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        --}}{{--  PASSWORD  --}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                                @error('password')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                                            <strong>{{ $message }}</strong>--}}
{{--                                                                        </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">--}}
{{--                                        <a href="#deleteListingModal" class="delete" data-toggle="modal"><input type="button" class="btn btn-danger" data-dismiss="modal" value="Register"></a>--}}
{{--                                        <button type="submit" class="btn btn-danger btn-fbd">--}}
{{--                                            {{ __('Login') }}--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div id="deleteListingModal" class="modal fade">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h4 class="modal-title">Register Yourself</h4>--}}
{{--                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
{{--                                </div>--}}
{{--                                <form method="POST" action="{{ route('addToFavouriteWithUserRegister') }}">--}}
{{--                                    @csrf--}}
{{--                                    <div class="modal-body">--}}

{{--                                        <input type="hidden" name="slug" value="{{$litter->slug}}">--}}
{{--                                        <input type="hidden" name="type" value="litters">--}}
{{--                                        --}}{{--  USERNAME  --}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>--}}

{{--                                                @error('username')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                                            <strong>{{ $message }}</strong>--}}
{{--                                                                        </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        --}}{{--  EMAIL-ADDRESS  --}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                                @error('email')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                                            <strong>{{ $message }}</strong>--}}
{{--                                                                        </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        --}}{{--  PASSWORD  --}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                                @error('password')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                                            <strong>{{ $message }}</strong>--}}
{{--                                                                        </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        --}}{{--  CONFIRM-PASSWORD  --}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">--}}
{{--                                        <button type="submit" class="btn btn-danger btn-fbd">--}}
{{--                                            {{ __('Register') }}--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="row mb-5 fbd-single-listing-info">
            <div class="col-md-5 px-5">
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
            <div class="col-md-3">
                <a class="breeder-name" href="" title="Breeder Name">{{$litter->breeder->username}}</a><br>
                <span class="kennel-name" title="Kennel Name">{{$litter->breeder->kennelName}}</span>
                <hr>
                <div>
                    <a class="contactNo mb-2" href="tel:+15016727186" title="Phone"><i class="fa fa-phone-alt"></i>&emsp; {{$litter->breeder->phone}}</a><br>
                    <a class="email mb-2" href="" title="Email"><i class="fa fa-envelope"></i>&emsp; {{$litter->breeder->email->asString()}}</a><br>
                    <a class="website" href="" title="Website"><i class="fas fa-globe"></i>&emsp; {{$litter->breeder->website->asString()}}</a>
                    <div class="fbd-single-listing-features">
                        <i class="fa fa-calendar-alt"></i> &emsp; <span title="Date of Birth">{{date('Y-m-d',$litter->expectedDob->getTimestamp())}}</span><br>
                    </div>
                </div>

                <div class="row my-5 fbd-single-listing-contact-social">
                    <a class="mx-4" href="{{$litter->breeder->fbAccountUrl->asString()}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-4" href="{{$litter->breeder->igAccountUrl->asString()}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a class="mx-4" href="{{$litter->breeder->website->asString()}}" title="Share"><i class="fas fa-globe"></i></a>
                </div>


            </div>
            <div class="col-md-4">

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
                        <div class="card rounded">
                            <!-- <div class="card-header p-0">
                                <div class="p-2 d-flex justify-content-between align-items-center">
                                    <a class="breeder-name" href="" title="Breeder Name">
                                        <h4 class="display-inline"> Breeder Name</h4>
                                    </a>
                                    <div class="mb-2 text-right">
                                        <i class="fa fa-phone-alt"></i><a class="contactNo pl-2" href="tel:+15016727186" title="Phone">+1 (501) 672-7186</a>
                                    </div>
                                </div>
                                <div class="px-2 d-flex justify-content-between align-items-center pb-2">
                                    <a href="" title="Breeder Address">1602 Silver Street, Ashland, NE 68003</a>
                                    <div class="float-right fbd-single-listing-contact-social">
                                        <a class="ml-3" href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a class="ml-3" href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                        <a class="ml-3" href="#" title="Website"><i class="fas fa-globe"></i></a>
                                        <a class="ml-3" href="#" title="Share"><i class="fas fa-share-square"></i></a>
                                    </div>
                                </div>
                            </div> -->

                            <div class="card-body p-3">
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                        <input type="hidden" class="form-control" value="{{$litter->getId()}}" name="listing" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment"></i></div>
                                        </div>
                                        <textarea class="form-control" name="message" placeholder="Message" rows="6" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Send Message" class="btn btn-primary btn-fbd btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>


        <div class="fbd-single-listing-description row my-4 mx-4">
            <h4>Description</h4>
            <p class="ml-2">
                {{$litter->description->asString()}}
            </p>
            <div class="col-sm-3 my-auto pl-5 text-left">
                <i class="fa fa-dna"></i> &emsp;<span><b>Expected DOB</b></span>
                <p> &emsp; &emsp;{{date('Y-m-d',$litter->expectedDob->getTimestamp())}}</p>
            </div>
            <div class="col-sm-3 my-auto pl-5 text-left">
                <i class="fa fa-dna"></i> &emsp;<span><b>DAM</b></span>
                <p> &emsp; &emsp;{{$litter->dam}}</p>
            </div>
            <div class="col-sm-3 my-auto pl-5 text-left">
                <i class="fa fa-dna"></i> &emsp;<span><b>SIRE</b></span>
                <p> &emsp; &emsp;{{$litter->sire}}</p>
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
                        $(className).css("color","#8b77fc");
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
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.fbd-single-listing-img',
            focusOnSelect: true,
            arrows: false
        });
    </script>

@endsection
