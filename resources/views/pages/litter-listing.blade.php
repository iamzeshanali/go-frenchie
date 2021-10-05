@extends('./layouts.app')
@section('title', 'Litters')
@section('content')



    {{--Homepage Banner Section--}}
    <div class="wrapper gf-resources-banner-wrapper d-flex justify-content-center">
        <div class="container row align-items-center">
            <div class="gf-resources-banner-text col-md-6">
                <h1>
                    <span style="color:#be202e;">Inborn Litters</span><br>
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
                        @foreach($sponsoredLitters as $key=>$standardPuppy)
                            <div  class="fbd-sponsured-listings py-3">
                                <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                    <div class="col-lg-3 p-0 m-auto">
                                        <div class="fbd-sp-listing-img">
                                            <img src="{{$standardPuppy->photo1 ? asset_file_url($standardPuppy->photo1): '/images/notfound/gf-not-found.png'}}" width="250" height="250" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                        <div onclick="singlePuppy('{{$standardPuppy->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                            <h4 class="fbd-sp-list-title d-inline">{{$standardPuppy->title}}</h4>
                                            <p>{{$standardPuppy->description->asString()}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-venus"></i>
                                                <span>{{$standardPuppy->dam}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-mars"></i>
                                                <span>{{$standardPuppy->sire}}</span>
                                            </div>
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$standardPuppy->breeder->phone}}</span>
                                            </div>
                                            <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$standardPuppy->expectedDob->getTimestamp())}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">
                                                <i class="fa fa-envelope"></i>
                                                <span>{{$standardPuppy->breeder->email->asString()}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$standardPuppy->breeder->kennelName}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                        <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
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
                                                            if(($saved->listings->slug == $standardPuppy->slug)){
                                                                $matched = true;
                                                                break;
                                                            }else{
                                                                $matched = false;
                                                            }

                                                        }
                                                    }
                                                    ?>
                                                    @if($matched == false)
                                                        <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                    @else
                                                        <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                    @endif

                                                @else
                                                    <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                @endif
                                            @else
                                                <a href="#LoginModal" class="gf-listing-card-like-icon delete" data-toggle="modal"><i style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon fas fa-heart float-right"></i></a>
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

                                                                <input type="hidden" name="slug" value="{{$standardPuppy->slug}}">
                                                                <input type="hidden" name="type" value="listing">

                                                                {{--  EMAIL-ADDRESS  --}}
                                                                <div class="form-group row">
                                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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

                                                                <input type="hidden" name="slug" value="{{$standardPuppy->slug}}">
                                                                <input type="hidden" name="type" value="listing">
                                                                {{--  USERNAME  --}}
                                                                <div class="form-group row">
                                                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

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
                                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                                            <a target="_blank" href="{{$standardPuppy->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a target="_blank" href="{{$standardPuppy->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a target="_blank" href="{{$standardPuppy->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
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
                        @foreach($standardLitters as $key=>$standardPuppy)
                            <div  class="fbd-sponsured-listings py-3">
                                <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                    <div class="col-lg-3 p-0 m-auto">
                                        <div class="fbd-sp-listing-img">
                                            <img src="{{$standardPuppy->photo1 ? asset_file_url($standardPuppy->photo1): '/images/notfound/gf-not-found.png'}}" width="250" height="250" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                        <div onclick="singlePuppy('{{$standardPuppy->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                            <h4 class="fbd-sp-list-title d-inline">{{$standardPuppy->title}}</h4>
                                            <p>{{$standardPuppy->description->asString()}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-venus"></i>
                                                <span>{{$standardPuppy->dam}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-mars"></i>
                                                <span>{{$standardPuppy->sire}}</span>
                                            </div>
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$standardPuppy->breeder->phone}}</span>
                                            </div>
                                            <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$standardPuppy->expectedDob->getTimestamp())}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">
                                                <i class="fa fa-envelope"></i>
                                                <span>{{$standardPuppy->breeder->email->asString()}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$standardPuppy->breeder->kennelName}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                        <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
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
                                                            if(($saved->listings->slug == $standardPuppy->slug)){
                                                                $matched = true;
                                                                break;
                                                            }else{
                                                                $matched = false;
                                                            }

                                                        }
                                                    }
                                                    ?>
                                                    @if($matched == false)
                                                        <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                    @else
                                                        <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                    @endif

                                                @else
                                                    <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                @endif
                                            @else
                                                <a href="#LoginModal" class="gf-listing-card-like-icon delete" data-toggle="modal"><i style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon fas fa-heart float-right"></i></a>
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

                                                                <input type="hidden" name="slug" value="{{$standardPuppy->slug}}">
                                                                <input type="hidden" name="type" value="listing">

                                                                {{--  EMAIL-ADDRESS  --}}
                                                                <div class="form-group row">
                                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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

                                                                <input type="hidden" name="slug" value="{{$standardPuppy->slug}}">
                                                                <input type="hidden" name="type" value="listing">
                                                                {{--  USERNAME  --}}
                                                                <div class="form-group row">
                                                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

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
                                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                                            <a target="_blank" href="{{$standardPuppy->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a target="_blank" href="{{$standardPuppy->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a target="_blank" href="{{$standardPuppy->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
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
        function closeModal() {
            $('#loaderModalCenter').on('shown.bs.modal', function(e) {
                $("#loaderModalCenter").modal("hide");
            });
        }

        function singlePuppy($slug) {
            // console.log($slug);
            window.location = "{{\Illuminate\Support\Facades\URL::to('show-litter')}}/"+$slug;
        }


    </script>
@endsection
