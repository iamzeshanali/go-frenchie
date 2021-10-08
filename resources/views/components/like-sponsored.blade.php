
@if(Auth::user())
    <?php
    $allSavedListings = app('App\Http\Controllers\SavedItemsController')->getAllListings();
    $matched = false;
    //                                            dd($allSavedListings);
    ?>

    @if(count($allSavedListings) > 0)
        <?php
        foreach ($allSavedListings as $saved) {
            if ($saved->customer->username == \Illuminate\Support\Facades\Auth::user()->username)
            {
                if(($saved->listings->slug == $sponsoredSlug)){
                    $matched = true;
                    break;
                }else{
                    $matched = false;
                }

            }
        }
        ?>
        @if($matched == false)
            <a  class="gf-listing-card-like-icon delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredSlug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredSlug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
        @else
            <a  class="gf-listing-card-like-icon delete" data-toggle="modal"><i id="likedIcon" style="color: #be202e;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredSlug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredSlug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
        @endif

    @else
        <a  class="gf-listing-card-like-icon delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredSlug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredSlug}}', '{{Auth::user()->email->asString()}}', 'listings')"></i></a>
    @endif
@else
    <a href="#LoginModal" class="gf-listing-card-like-icon delete" data-toggle="modal"><i style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon fas fa-heart float-right"></i></a>
@endif
{{--{{$sponsoredSlug}}--}}
<div id="LoginModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h3 class="modal-title gf-red">Signin to GoFrenchie</h3>
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

                    <input type="hidden" name="slug" value="{{$sponsoredSlug}}">
                    <input type="hidden" name="type" value="listing">

                    {{--  EMAIL-ADDRESS  --}}
                    <div class="row">
                        <div class="col">
                            <input type="email" class="gf-form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                            @enderror
                        </div>
                    </div>
                    {{--  PASSWORD  --}}
                    <div class="row">
                        <div class="col input-group flex-nowrap">
                            <input id="login-password" type="password" class="gf-form-field m-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">
                            <span class="input-group-btn">
                                                                            <button onclick="showPassword('login-password')" class="btn btn-default reveal" type="button"><i class="fas fa-eye"></i></button>
                                                                        </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row modal-footer justify-content-around p-3">
                    {{--                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">--}}
                    <div class="col-6 m-0">
                        <a href="#deleteListingModal" class="delete" data-toggle="modal">
                            <input class="gf-btn-light w-100" type="button" data-dismiss="modal" value="Register">
                        </a>
                    </div>
                    <div class="col-6 m-0">
                        <button type="submit" class="gf-btn-dark w-100">
                            {{ __('Login') }}
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div id="deleteListingModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h3 class="modal-title gf-red">Register Yourself</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="POST" action="{{ route('addToFavouriteWithUserRegister') }}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="slug" value="{{$sponsoredSlug}}">
                    <input type="hidden" name="type" value="listing">
                    {{--  USERNAME  --}}
                    <div class="row">
                        <div class="col">
                            <input type="text" class="gf-form-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="{{ __('Username*') }}">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                            @enderror
                        </div>
                    </div>
                    {{--  EMAIL-ADDRESS  --}}
                    <div class="row">

                        <div class="col">
                            <input type="email" class="gf-form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email*') }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                            @enderror
                        </div>
                    </div>
                    {{--  PASSWORD  --}}
                    <div class="row">

                        <div class="col input-group flex-nowrap">
                            <input id="register-password" type="password" class="gf-form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password*') }}">
                            <span class="input-group-btn">
                                                                            <button onclick="showPassword('register-password')" class="btn btn-default reveal" type="button"><i class="fas fa-eye"></i></button>
                                                                        </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                            @enderror
                        </div>
                    </div>
                    {{--  CONFIRM-PASSWORD  --}}
                    <div class="row">

                        <div class="col input-group flex-nowrap">
                            <input id="register-confirm-password" type="password" class="gf-form-field m-0" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password*') }}">
                            <span class="input-group-btn">
                                                                            <button onclick="showPassword('register-confirm-password')" class="btn btn-default reveal" type="button"><i class="fas fa-eye"></i></button>
                                                                        </span>
                        </div>
                    </div>
                </div>
                <div class="row modal-footer justify-content-around p-3">
                    {{--                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">--}}
                    <button type="submit" class="gf-btn-dark w-100">
                        {{ __('Register') }}
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
