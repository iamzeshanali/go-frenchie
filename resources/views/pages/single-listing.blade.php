@extends('./layouts.app')

@section('content')


<div class="single-listing-wrapper container">

{{--    <nav aria-label="breadcrumb">--}}
{{--        <ol class="breadcrumb">--}}
{{--            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>--}}
{{--            <li class="breadcrumb-item"><a href="#">Puppies</a></li>--}}
{{--            <li class="breadcrumb-item active" aria-current="page">Single Puppy</li>--}}
{{--        </ol>--}}
{{--    </nav>--}}

    <div class="row">
        <div class="btn-group btn-breadcrumb breadcrumb-info">
            <a href="#" class="btn btn-info visible-lg-block visible-md-block">Dashboard</a>
            <a href="#" class="btn btn-info visible-lg-block visible-md-block">Puppies</a>
            <a href="#" class="btn btn-info visible-lg-block visible-md-block">Single Puppy</a>
        </div>
    </div>


    <div class="row py-2">
        <div class="col-md-6">
            <h2 class="fbd-single-listing-title gf-red">{{$puppy->title}}</h2>
        </div>
        <div class="col-md-6">
            <div class="fbd-single-listing-social text-right mb-3">
                @if(Auth::user())
                    <?php
                    $allSavedListings = app('App\Http\Controllers\SavedItemsController')->getAllListings();
                    //                                            dd($allSavedListings);
                    ?>
                    @if(count($allSavedListings) > 0)
                        <?php
                        foreach ($allSavedListings as $saved) {
                            if ($saved->customer->username == \Illuminate\Support\Facades\Auth::user()->username)
                            {
                                if(($saved->listings->slug == $puppy->slug)){
                                    $matched = true;
                                    break;
                                }else{
                                    $matched = false;
                                }

                            }else{
                                $matched = false;
                            }
                        }
                        ?>
                        @if($matched == false)
                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #6E6F72;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$puppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$puppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                        @else
                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #BE202E;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$puppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$puppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                        @endif

                    @else
                        <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #6E6F72;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$puppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$puppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                    @endif
                @else
                    <a href="#LoginModal" class="delete" data-toggle="modal"><i style="color: #6E6F72;font-size: 24px;cursor: pointer;" class="fbd-liked-icon fas fa-heart float-right"></i></a>
                @endif
                <div id="LoginModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Register Yourself</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ \Session::get('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('addToFavouriteWithUserLogin') }}">
                                @csrf
                                <div class="modal-body">

                                    <input type="hidden" name="slug" value="{{$puppy->slug}}">
                                    <input type="hidden" name="type" value="listing">

                                    {{--  EMAIL-ADDRESS  --}}
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--  PASSWORD  --}}
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <a href="#deleteListingModal" class="delete" data-toggle="modal"><input type="button" class="btn btn-danger" data-dismiss="modal" value="Register"></a>
                                    <button type="submit" class="btn btn-danger btn-fbd">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="deleteListingModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Register Yourself</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <form method="POST" action="{{ route('addToFavouriteWithUserRegister') }}">
                                @csrf
                                <div class="modal-body">

                                    <input type="hidden" name="slug" value="{{$puppy->slug}}">
                                    <input type="hidden" name="type" value="listing">
                                    {{--  USERNAME  --}}
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--  EMAIL-ADDRESS  --}}
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--  PASSWORD  --}}
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--  CONFIRM-PASSWORD  --}}
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <button type="submit" class="btn btn-danger btn-fbd">
                                        {{ __('Register') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5 fbd-single-listing-info">
        <div class="col-md-6 px-5">
            <div class="fbd-single-listing-img p-3 mb-3">
                @if($puppy->photo1)<img src="{{ asset_file_url($puppy->photo1)}}" alt="">@endif
                @if($puppy->photo2)<img src="{{ asset_file_url($puppy->photo2)}}" alt="">@endif
                @if($puppy->photo3)<img src="{{ asset_file_url($puppy->photo3)}}" alt="">@endif
                @if($puppy->photo4)<img src="{{ asset_file_url($puppy->photo4)}}" alt="">@endif
                @if($puppy->photo5)<img src="{{ asset_file_url($puppy->photo5)}}" alt="">@endif
            </div>
            <div class="fbd-single-listing-thumbs mb-3">
                @if($puppy->photo1)<img src="{{ asset_file_url($puppy->photo1)}}" alt="">@endif
                @if($puppy->photo2)<img src="{{ asset_file_url($puppy->photo2)}}" alt="">@endif
                @if($puppy->photo3)<img src="{{ asset_file_url($puppy->photo3)}}" alt="">@endif
                @if($puppy->photo4)<img src="{{ asset_file_url($puppy->photo4)}}" alt="">@endif
                @if($puppy->photo5)<img src="{{ asset_file_url($puppy->photo5)}}" alt="">@endif
            </div>

        </div>
        <div class="col-md-6">
            <a class="breeder-name" href="" title="Breeder Name">
                <h3>{{ucfirst($puppy->breeder->username)}}</h3>
            </a>
            <span class="kennel-name" title="Kennel Name">{{ucfirst($puppy->breeder->kennelName)}}</span>
            <hr>
            <div>
                <a class="contactNo mb-2" href="tel:+15016727186" title="Phone"><i class="fa fa-phone-alt"></i>&emsp; {{$puppy->breeder->phone}}</a><br>
                <a class="email mb-2" href="" title="Email"><i class="fa fa-envelope"></i>&emsp;{{$puppy->breeder->email->asString()}}</a><br>
                <a class="website" href="" title="Website"><i class="fas fa-globe"></i>&emsp; {{$puppy->breeder->website->asString()}}</a>
                <div class="fbd-single-listing-features">
                    <i class="fa fa-venus-mars"></i> &emsp;<span title="Gender">{{ucfirst($puppy->sex->getValue())}}</span><br>
                    <i class="fa fa-calendar-alt"></i> &emsp; <span title="Date of Birth">{{date('Y-m-d',$puppy->dob->getTimestamp())}}</span><br>
                </div>
            </div>
            <hr>
            <div class="row my-4 fbd-single-listing-contact-social justify-content-around">
                <a class="mx-4" href="{{$puppy->breeder->fbAccountUrl->asString()}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-4" href="{$puppy->breeder->igAccountUrl->asString()}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a class="mx-4" href="#" title="Share"><i class="fas fa-share-square"></i></a>
            </div>


        </div>

    </div>

    <!-- <div class="fbd-single-listing-features row ml-4">
        <div class="col-md-5 p-2 mr-3">
            <i class="fa fa-venus-mars"></i> &emsp; &emsp; <span>{{ucfirst($puppy->sex->getValue())}}</span>
        </div>
        <div class="col-md-5 p-2 mr-3">
            <i class="fa fa-calendar-alt"></i> &emsp; &emsp; <span>{{date('Y-m-d',$puppy->dob->getTimestamp())}}</span>
        </div>
    </div> -->

    <div class="fbd-single-listing-description row my-4 mx-4">
        <div class="col-md-6">
            <h2 class="gf-red">Description</h2>
            <p>{{$puppy->description->asString()}}}</p>
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
                                    <input type="hidden" class="form-control" value="{{$puppy->getId()}}" name="listing" placeholder="Name *">
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


    <div class="fbd-single-listing-description row">
        <h2 class="gf-red">DNA Characteristics</h2>

    </div>

    <div class="gf-dna-table-wrapper">
        <table class="table table-bordered table-striped">
            @if(!empty($puppy->blue))
                <tr>
                    <td><span><b>Blue</b></span></td>
                    <td><span>{{$puppy->blue->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->chocolate))
                <tr>
                    <td><span><b>Chocolate</b></span></td>
                    <td><span>{{$puppy->chocolate->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->testableChocolate))
                <tr>
                    <td><span><b>TestableChocolate</b></span></td>
                    <td><span>{{$puppy->testableChocolate->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->fluffy))
                <tr>
                    <td><span><b>Fluffy</b></span></td>
                    <td><span>{{$puppy->fluffy->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->intensity))
                <tr>
                    <td><span><b>Intensity</b></span></td>
                    <td><span>{{$puppy->intensity->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->pied))
                <tr>
                    <td><span><b>Pied</b></span></td>
                    <td><span>{{$puppy->pied->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->brindle))
                <tr>
                    <td><span><b>Brindle</b></span></td>
                    <td><span>{{$puppy->brindle->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->merle))
                <tr>
                    <td><span><b>Merle</b></span></td>
                    <td><span>{{$puppy->merle->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->agouti))
                <tr>
                    <td><span><b>Agouti</b></span></td>
                    <td><span>{{$puppy->agouti->getValue()}}</span></td>
                </tr>
            @endif

            @if(!empty($puppy->eMcir))
                <tr>
                    <td><span><b>EMcir</b></span></td>
                    <td><span>{{$puppy->eMcir->getValue()}}</span></td>
                </tr>
            @endif


        </table>
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
                    $(className).css("color","#6E6F72");
                }
                if(data.success == '300'){
                    // console.log(data.success);
                    var className = ".fbd-liked-icon"+"-"+$slug;
                    $(className).css("color","#BE202E");
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
