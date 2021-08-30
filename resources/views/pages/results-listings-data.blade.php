<p class="listing-count">Showing <b>{{count($sponsoredPuppies)}}</b> out of <b>5</b> listings</p>
<span class="listing-type">SPONSORED LISTINGS</span>
@if(empty($sponsoredPuppies))
    <div class="fbd-standard-listing p-3">
        <div class="fbd-standard-card rounded row p-3">
            <p class="text-center">No Sponsored Listings</p>
        </div>
    </div>
@else
    @foreach($sponsoredPuppies as $key=>$sponsoredPuppy)

        <div  class="fbd-sponsured-listings p-3">
            <div class="fbd-sponsured-card rounded row align-items-center p-3">
                <div class="col-lg-3">
                    <div class="fbd-sp-listing-img">
                        <img src="{{asset_file_url($sponsoredPuppy->photo1)}}" alt="">
                        <!-- <span class="fbd-sp-listing-liked"><i class="far fa-heart"></i></span> -->
                    </div>
                </div>
                <div class="col-lg-9 pl-5">

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
                                    if(($saved->listings->slug == $sponsoredPuppy->slug)){
                                        $matched = true;
                                        break;
                                    }else{
                                        $matched = false;
                                    }

                                }
                            }
                            ?>
                            @if($matched == false)
                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                            @else
                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                            @endif

                        @else
                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                        @endif
                    @else
                        <a href="#LoginModal1" class="delete" data-toggle="modal"><i style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon fas fa-heart float-right"></i></a>
                    @endif
                    <div id="LoginModal1" class="modal fade">
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

                                        <input type="hidden" name="slug" value="{{$sponsoredPuppy->slug}}">
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
                                        <a href="#deleteListingModal1" class="delete" data-toggle="modal"><input type="button" class="btn btn-danger" data-dismiss="modal" value="Register"></a>
                                        <button type="submit" class="btn btn-danger btn-fbd">
                                            {{ __('Login') }}
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="deleteListingModal1" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Register Yourself</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form method="POST" action="{{ route('addToFavouriteWithUserRegister') }}">
                                    @csrf
                                    <div class="modal-body">

                                        <input type="hidden" name="slug" value="{{$sponsoredPuppy->slug}}">
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
                    <div onclick="singlePuppy('{{$sponsoredPuppy->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description mb-3">
                        <h5 class="fbd-sp-list-title d-inline">{{$sponsoredPuppy->title}}</h5>
                        <p>{{$sponsoredPuppy->decription}}</p>
                    </div>
                    <div class="fbd-sp-list-detail row">
                        <div class="col-xl-4 fbd-sp-list-detail-second mb-2">
                            <i class="fa fa-calendar-alt"></i>
                            <span>{{date('Y-m-d',$sponsoredPuppy->dob->getTimestamp())}}</span>
                        </div>

                    </div>
                    <div class="fbd-sp-list-kennel row">
                        <div class="col-xl-8 fbd-sp-list-kennel-first mb-2">
                            <i class="fa fa-igloo"></i>
                            <span>{{$sponsoredPuppy->breeder->kennelName}}</span>
                        </div>
                        <div class="col-xl-4 mb-2">
                            <i class="fa fa-venus-mars"></i>
                            <span>{{$sponsoredPuppy->sex->getValue()}}</span>
                        </div>
                        <div class="col-xl-8 fbd-sp-list-kennel-second mb-2">
                            <i class="fa fa-envelope"></i>
                            <span>{{$sponsoredPuppy->breeder->email->asString()}}</span>
                        </div>
                        <div class="col-xl-4 mb-2">
                            <i class="fa fa-phone-alt"></i>
                            <span>{{$sponsoredPuppy->breeder->phone}}</span>
                        </div>
                    </div>
                    <div class="fbd-sp-list-social text-right">
                        <a href="{{$sponsoredPuppy->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$sponsoredPuppy->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                        <a href="{{$sponsoredPuppy->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                        <a href="#"><i class="fas fa-share-square"></i></a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endif
<p class="listing-count">Showing <b>{{count($standardPuppies)}}</b> out of <b>5</b> listings</p>
<span class="listing-type">STANDARD LISTINGS</span>

@if(empty($standardPuppies))
    <div class="fbd-standard-listing p-3">
        <div class="fbd-standard-card rounded row p-3">
            <p class="text-center">No Sponsored Listings</p>
        </div>
    </div>
@else
    @foreach($standardPuppies as $key=>$standardPuppy)

        <div  class="fbd-sponsured-listings p-3">
            <div class="fbd-sponsured-card rounded row align-items-center p-3">
                <div class="col-lg-3">
                    <div class="fbd-sp-listing-img">
                        <img src="{{asset_file_url($standardPuppy->photo1)}}" alt="">
                        <!-- <span class="fbd-sp-listing-liked"><i class="far fa-heart"></i></span> -->
                    </div>
                </div>
                <div class="col-lg-9 pl-5">

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
                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                            @else
                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                            @endif

                        @else
                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardPuppy->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardPuppy->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
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

                                        <input type="hidden" name="slug" value="{{$standardPuppy->slug}}">
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

                                        <input type="hidden" name="slug" value="{{$standardPuppy->slug}}">
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
                    <div onclick="singlePuppy('{{$standardPuppy->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description mb-3">
                        <h5 class="fbd-sp-list-title d-inline">{{$standardPuppy->title}}</h5>
                        <p>{{$standardPuppy->decription}}</p>
                    </div>
                    <div class="fbd-sp-list-detail row">
                        <div class="col-xl-4 fbd-sp-list-detail-second mb-2">
                            <i class="fa fa-calendar-alt"></i>
                            <span>{{date('Y-m-d',$standardPuppy->dob->getTimestamp())}}</span>
                        </div>

                    </div>
                    <div class="fbd-sp-list-kennel row">
                        <div class="col-xl-8 fbd-sp-list-kennel-first mb-2">
                            <i class="fa fa-igloo"></i>
                            <span>{{$standardPuppy->breeder->kennelName}}</span>
                        </div>
                        <div class="col-xl-4 mb-2">
                            <i class="fa fa-venus-mars"></i>
                            <span>{{$standardPuppy->sex->getValue()}}</span>
                        </div>
                        <div class="col-xl-8 fbd-sp-list-kennel-second mb-2">
                            <i class="fa fa-envelope"></i>
                            <span>{{$standardPuppy->breeder->email->asString()}}</span>
                        </div>
                        <div class="col-xl-4 mb-2">
                            <i class="fa fa-phone-alt"></i>
                            <span>{{$standardPuppy->breeder->phone}}</span>
                        </div>
                    </div>
                    <div class="fbd-sp-list-social text-right">
                        <a href="{{$standardPuppy->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$standardPuppy->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                        <a href="{{$standardPuppy->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                        <a href="#"><i class="fas fa-share-square"></i></a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endif
