@extends('./layouts.app')
@section('title', 'Litters')
@section('content')

    <div class="container">

        <h2 class="page-title text-center">Litters Page</h2>
        <div class="page-description text-justify mb-5 rounded">
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
            </p>
        </div>

    </div>
    <div class="container-fluid">
        <div class="page-content d-lg-flex ">

            @include('components/adds-area')

            <div class="fbd-content-area mb-3 rounded">

                <div id="primary-listing-data" class="fbd-listing-area p-3 rounded">

                    <p class="listing-count">0-5 out of {{count($sponsoredLitters)}} listings</p>
                    <span class="listing-type">SPONSORED LITTERS</span>
                    @if(empty($sponsoredLitters))
                        <div class="fbd-standard-listing p-3">
                            <div class="fbd-standard-card rounded row p-3">
                                <p class="text-center">No Sponsored Litters</p>
                            </div>
                        </div>
                    @else
                        @foreach($sponsoredLitters as $key=>$sponsoredLitter)

                            <div  class="fbd-sponsured-listings p-3">
                                <div class="fbd-sponsured-card rounded row align-items-center p-3">
                                    <div class="col-lg-3">
                                        <div class="fbd-sp-listing-img">
                                            <img src="{{asset_file_url($sponsoredLitter->photo1)}}" alt="">
                                            <!-- <span class="fbd-sp-listing-liked"><i class="far fa-heart"></i></span> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 pl-5">

                                        @if(Auth::user())
                                            <?php
                                            $allSavedListings = app('App\Http\Controllers\SavedItemsController')->getAllLitters();
                                            //                                            dd($allSavedListings);
                                            ?>

                                            @if(count($allSavedListings) > 0)
                                                <?php
                                                foreach ($allSavedListings as $saved) {
                                                    if ($saved->customer->username == \Illuminate\Support\Facades\Auth::user()->username)
                                                    {
                                                        if(($saved->litters->slug == $sponsoredLitter->slug)){
                                                            $matched = true;
                                                            break;
                                                        }else{
                                                            $matched = false;
                                                        }

                                                    }
                                                }
                                                ?>
                                                @if($matched == false)
                                                    <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredLitter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredLitter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                @else
                                                    <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredLitter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredLitter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                @endif

                                            @else
                                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$sponsoredLitter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$sponsoredLitter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
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

                                                                <input type="hidden" name="slug" value="{{$sponsoredLitter->slug}}">
                                                                <input type="hidden" name="type" value="litters">

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

                                                                <input type="hidden" name="slug" value="{{$sponsoredLitter->slug}}">
                                                                <input type="hidden" name="type" value="litters">
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
                                        <div onclick="singleList('{{$sponsoredLitter->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description mb-3">
                                            <h5 class="fbd-sp-list-title d-inline">{{$sponsoredLitter->title}}</h5>
                                            <p>{{$sponsoredLitter->decription}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
                                            <div class="col-xl-4 fbd-sp-list-detail-second mb-2">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$sponsoredLitter->expectedDob->getTimestamp())}}</span>
                                            </div>

                                        </div>
                                        <div class="fbd-sp-list-kennel row">
                                            <div class="col-xl-8 fbd-sp-list-kennel-first mb-2">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$sponsoredLitter->sire}}</span>
                                            </div>
                                            <div class="col-xl-4 mb-2">
                                                <i class="fa fa-venus-mars"></i>
                                                <span>{{$sponsoredLitter->dam}}</span>
                                            </div>
                                            <div class="col-xl-8 fbd-sp-list-kennel-second mb-2">
                                                <i class="fa fa-envelope"></i>
                                                <span>{{$sponsoredLitter->breeder->email->asString()}}</span>
                                            </div>
                                            <div class="col-xl-4 mb-2">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$sponsoredLitter->breeder->phone}}</span>
                                            </div>
                                        </div>
                                        <div class="fbd-sp-list-social text-right">
                                            <a href="{{$sponsoredLitter->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a href="{{$sponsoredLitter->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a href="{{$sponsoredLitter->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                                            <a href="#"><i class="fas fa-share-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif

                    <span class="listing-type">STANDARD LITTERS</span>

                    @if(empty($standardLitters))
                        <div class="fbd-standard-listing p-3">
                            <div class="fbd-standard-card rounded row p-3">
                                <p class="text-center">No Sponsored Litters</p>
                            </div>
                        </div>
                    @else
                        @foreach($standardLitters as $key=>$standardLitter)

                            <div  class="fbd-sponsured-listings p-3">
                                <div class="fbd-sponsured-card rounded row align-items-center p-3">
                                    <div class="col-lg-3">
                                        <div class="fbd-sp-listing-img">
                                            <img src="{{asset_file_url($standardLitter->photo1)}}" alt="">
                                            <!-- <span class="fbd-sp-listing-liked"><i class="far fa-heart"></i></span> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 pl-5">

                                        @if(Auth::user())
                                            <?php
                                            $allSavedListings = app('App\Http\Controllers\SavedItemsController')->getAllLitters();
                                            //                                            dd($allSavedListings);
                                            ?>
                                            @if(count($allSavedListings) > 0)
                                                <?php
                                                foreach ($allSavedListings as $saved) {
                                                    if ($saved->customer->username == \Illuminate\Support\Facades\Auth::user()->username)
                                                    {
                                                        if(($saved->litters->slug == $standardLitter->slug)){
                                                            $matched = true;
                                                            break;
                                                        }else{
                                                            $matched = false;
                                                        }

                                                    }
                                                }
                                                ?>
                                                @if($matched == false)
                                                    <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardLitter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardLitter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                @else
                                                    <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #8b77fc;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardLitter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardLitter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
                                                @endif

                                            @else
                                                <a  class="delete" data-toggle="modal"><i id="likedIcon" style="color: #c4bfbf;font-size: 24px;cursor: pointer;" class="fbd-liked-icon-{{$standardLitter->slug}} fas fa-heart float-right" onclick="addOrRemoveToFavourite('{{$standardLitter->slug}}', '{{Auth::user()->email->asString()}}', 'litters')"></i></a>
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

                                                            <input type="hidden" name="slug" value="{{$standardLitter->slug}}">
                                                            <input type="hidden" name="type" value="litters">

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

                                                            <input type="hidden" name="slug" value="{{$standardLitter->slug}}">
                                                            <input type="hidden" name="type" value="litters">
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
                                        <div onclick="singleList('{{$standardLitter->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description mb-3">
                                            <h5 class="fbd-sp-list-title d-inline">{{$standardLitter->title}}</h5>
                                            <p>{{$standardLitter->decription}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
                                            <div class="col-xl-4 fbd-sp-list-detail-second mb-2">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$standardLitter->expectedDob->getTimestamp())}}</span>
                                            </div>

                                        </div>
                                        <div class="fbd-sp-list-kennel row">
                                            <div class="col-xl-8 fbd-sp-list-kennel-first mb-2">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$standardLitter->sire}}</span>
                                            </div>
                                            <div class="col-xl-4 mb-2">
                                                <i class="fa fa-venus-mars"></i>
                                                <span>{{$standardLitter->dam}}</span>
                                            </div>
                                            <div class="col-xl-8 fbd-sp-list-kennel-second mb-2">
                                                <i class="fa fa-envelope"></i>
                                                <span>{{$standardLitter->breeder->email->asString()}}</span>
                                            </div>
                                            <div class="col-xl-4 mb-2">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$standardLitter->breeder->phone}}</span>
                                            </div>
                                        </div>
                                        <div class="fbd-sp-list-social text-right">
                                            <a href="{{$standardLitter->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a href="{{$standardLitter->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a href="{{$standardLitter->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                                            <a href="#"><i class="fas fa-share-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif

                </div>

                <div id="secondary-listing-data" class="fbd-listing-area p-3 rounded">
                </div>

            </div>
            @include('components/adds-area')
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

        function singleList($slug) {
            // console.log($slug);
            window.location = "http://frenchbulldog.test/show-litter/"+$slug;
        }
    </script>
@endsection
