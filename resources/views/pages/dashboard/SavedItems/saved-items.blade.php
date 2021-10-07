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
                            @if(empty($savedListings))
                                <div class="fbd-standard-listing p-3">
                                    <div class="fbd-standard-card rounded row p-3">
                                        <p class="text-center">No Sponsored Listings</p>
                                    </div>
                                </div>
                            @else
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
                                                                    if(($saved->listings->slug == $sponsoredPuppy->listings->slug)){
                                                                        $matched = true;
                                                                        break;
                                                                    }else{
                                                                        $matched = false;
                                                                    }

                                                                }
                                                            }
                                                            ?>
                                                            @if($matched == false)
                                                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredPuppy->listings->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredPuppy->listings->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                                                            @else
                                                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #be202e;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredPuppy->listings->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredPuppy->listings->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
                                                            @endif

                                                        @else
                                                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredPuppy->listings->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredPuppy->listings->slug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
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

                                                                        <input type="hidden" name="slug" value="{{$sponsoredPuppy->listings->slug}}">
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

                                                                        <input type="hidden" name="slug" value="{{$sponsoredPuppy->listings->slug}}">
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
                                                    <a href="{{$sponsoredPuppy->customer->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="{{$sponsoredPuppy->customer->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                                    <a href="{{$sponsoredPuppy->customer->website->asString()}}"><i class="fas fa-globe"></i></a>
                                                    <a href="#"><i class="fas fa-share-square"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endif
                            {{--Litters--}}

                            <?php
                            $allSavedLitters = app(\App\Http\Controllers\SavedItemsController::class)->getAllLitters();
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
                                                @if(Auth::user())
                                                    <?php
                                                    $allSavedLitters = app('App\Http\Controllers\SavedItemsController')->getAllLitters();
//                                                                                                dd($allSavedLitters);
                                                    ?>

                                                    @if(count($allSavedLitters) > 0)
                                                        <?php
                                                        foreach ($allSavedLitters as $saved) {
                                                            if ($saved->customer->username == \Illuminate\Support\Facades\Auth::user()->username)
                                                            {
                                                                if(($saved->litters->slug == $savedLitter->litters->slug)){
                                                                    $matched = true;
                                                                    break;
                                                                }else{
                                                                    $matched = false;
                                                                }

                                                            }
                                                        }
                                                        ?>
                                                        @if($matched == false)
                                                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$savedLitter->litters->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$savedLitter->litters->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                        @else
                                                            <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #be202e;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$savedLitter->litters->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$savedLitter->litters->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                        @endif

                                                    @else
                                                        <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$savedLitter->litters->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$savedLitter->litters->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
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

                                                                    <input type="hidden" name="slug" value="{{$savedLitter->litters->slug}}">
                                                                    <input type="hidden" name="type" value="litters">

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

                                                                    <input type="hidden" name="slug" value="{{$savedLitter->litters->slug}}">
                                                                    <input type="hidden" name="type" value="litters">
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
                                                <a target="_blank" href="{{$savedLitter->customer->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                                <a target="_blank" href="{{$savedLitter->customer->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                                <a target="_blank" href="{{$savedLitter->customer->website->asString()}}"><i class="fas fa-globe"></i></a>
                                                <a target="_blank" href="#"><i class="fas fa-share-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

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
