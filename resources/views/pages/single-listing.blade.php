@extends('./layouts.app')

@section('content')


<div class="container">
    <div class="breadcrumbs row align-items-center mb-2">
        <a href="" title="Dashboard"><i class="fas fa-tachometer-alt"></i>&emsp; Dashboard</a> &emsp;
        <i class="fas fa-angle-right"></i> &emsp;
        <a href="" title="View Listing">View Listing</a> &emsp;
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2 class="fbd-single-listing-title">{{$puppy->title}}</h2>
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
                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$puppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$puppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                        @else
                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$puppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$puppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                        @endif

                    @else
                        <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$puppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$puppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                    @endif
                @else
                    <a href="#LoginModal" class="delete" data-toggle="modal"><i style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon fas fa-heart float-right"></i></a>
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
        <div class="col-md-5 px-5">
            <div class="fbd-single-listing-img mb-3">
                <img src="{{asset_file_url($puppy->photo1)}}" alt="">
                <img src="{{asset_file_url($puppy->photo2)}}" alt="">
                <img src="{{asset_file_url($puppy->photo3)}}" alt="">
                <img src="{{asset_file_url($puppy->photo4)}}" alt="">
                <img src="{{asset_file_url($puppy->photo5)}}" alt="">
            </div>
            <div class="fbd-single-listing-thumbs mb-3">
                <img src="{{asset_file_url($puppy->photo1)}}" alt="">
                <img src="{{asset_file_url($puppy->photo2)}}" alt="">
                <img src="{{asset_file_url($puppy->photo3)}}" alt="">
                <img src="{{asset_file_url($puppy->photo4)}}" alt="">
                <img src="{{asset_file_url($puppy->photo5)}}" alt="">
            </div>

        </div>
        <div class="col-md-3">
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

            <div class="row my-4 fbd-single-listing-contact-social justify-content-between">
                <a class="mx-4" href="{{$puppy->breeder->fbAccountUrl->asString()}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-4" href="{$puppy->breeder->igAccountUrl->asString()}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a class="mx-4" href="#" title="Share"><i class="fas fa-share-square"></i></a>
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
                    <div class="card">

                        <div class="card-body p-3">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <input type="hidden" class="form-control" value="{{$puppy->getId()}}" name="listing" placeholder="Name">
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
                                <input type="submit" value="Send Message" class="gf-btn-dark py-2">
                            </div>
                        </div>

                    </div>
                </form>
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
        <h4>Description</h4>
        <p class="ml-2">
            {{$puppy->decription}}
        </p>

    </div>


    <div class="fbd-single-listing-description row my-4 mx-4">
        <h4>DNA Characteristics</h4>

    </div>
    <div class="fbd-single-listing-dna row">

        @if(!empty($puppy->blue))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Blue</b></span>
            <p> &emsp; &emsp;{{$puppy->blue->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>d/d</td>
                    </tr>
                    <tr>
                        <td>D/d</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @if(!empty($puppy->chocolate))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Chocolate</b></span>
            <p> &emsp; &emsp;{{$puppy->chocolate->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>co/co</td>
                    </tr>
                    <tr>
                        <td>Co/co</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if(!empty($puppy->testableChocolate))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>TestableChocolate</b></span>
            <p> &emsp; &emsp;{{$puppy->testableChocolate->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>b/b</td>
                    </tr>
                    <tr>
                        <td>B/b</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @if(!empty($puppy->fluffy))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Fluffy</b></span>
            <p> &emsp; &emsp;{{$puppy->fluffy->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>l/l</td>
                    </tr>
                    <tr>
                        <td>L/l</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if(!empty($puppy->intensity))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Intensity</b></span>
            <p> &emsp; &emsp;{{$puppy->intensity->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>i/i</td>
                    </tr>
                    <tr>
                        <td>I/i</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @if(!empty($puppy->pied))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Pied</b></span>
            <p> &emsp; &emsp;{{$puppy->pied->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>s/s</td>
                    </tr>
                    <tr>
                        <td>s/N</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if(!empty($puppy->brindle))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Brindle</b></span>
            <p> &emsp; &emsp;{{$puppy->brindle->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>{{ucfirst('yes')}}</td>
                    </tr>
                    <tr>
                        <td>{{ucfirst('no')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @if(!empty($puppy->merle))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Merle</b></span>
            <p> &emsp; &emsp;{{$puppy->merle->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>{{ucfirst('yes')}}</td>
                    </tr>
                    <tr>
                        <td>{{ucfirst('no')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @if(!empty($puppy->agouti))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>Agouti</b></span>
            <p> &emsp; &emsp;{{$puppy->agouti->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>(a,a)</td>
                    </tr>
                    <tr>
                        <td>(ay,a)</td>
                    </tr>
                    <tr>
                        <td>(ay,at)</td>
                    </tr>
                    <tr>
                        <td>(ay,ay)</td>
                    </tr>
                    <tr>
                        <td>(at,a)</td>
                    </tr>
                    <tr>
                        <td>(at,at)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @if(!empty($puppy->eMcir))
        <div class="col-sm-3 my-auto pl-5 text-left">
            <i class="fa fa-dna"></i> &emsp;<span><b>EMcir</b></span>
            <p> &emsp; &emsp;{{$puppy->eMcir->getValue()}}</p>
        </div>
        <div class=" col-sm-3">
            <table class="table bg-white text-center">
                <tbody>
                    <tr>
                        <td>(EM,EM)</td>
                    </tr>
                    <tr>
                        <td>(EM,E)</td>
                    </tr>
                    <tr>
                        <td>(EM,e)</td>
                    </tr>
                    <tr>
                        <td>(E,E)</td>
                    </tr>
                    <tr>
                        <td>(E,e)</td>
                    </tr>
                    <tr>
                        <td>(e,e)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
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
                    $(className).css("color","var(--gray)");
                }
                if(data.success == '300'){
                    // console.log(data.success);
                    var className = ".fbd-liked-icon"+"-"+$slug;
                    $(className).css("color","var(--red)");
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
