@extends('./layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="gf-dashboard-page-content row align-items-start">
            @include('components.gf-dashboard-menu-area')
            <div class="breader-account-settings col-xl-10 col-lg-9">
                <div class="container-fluid">
                    <form method="post" action="{{route('updateRegisteredUser')}}" enctype="multipart/form-data" id="update-user-form mx-5">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-center p-0">
                            <div class="col-md-8">
                                <h2 class="text-center mb-4 gf-red">Update Breeder Settings</h2>

<!--                                --><?php // dd(Auth::User());?>
                                <div class="form-group row mb-0 py-1">
                                    {{--First Name--}}
                                    <div class="col-md-6">
                                        <input type="text" name="firstName" value="{{Auth::User()->firstName}}"  class="gf-form-field" id="" placeholder="First Name: *" required autofocus >
                                    </div>

                                    {{--Last Name--}}
                                    <div class="col-md-6">
                                        <input type="text" name="lastName" value="{{Auth::User()->lastName}}"  class="gf-form-field" id="" placeholder="Last Name: *" required autofocus>
                                    </div>
                                </div>

                                {{--PHONE-NUMBER--}}
                                <div class="form-group row mb-0 py-1">

                                    <div class="col">
                                        <input id="phone-number" type="tel" class="gf-form-field" value="{{Auth::User()->phone}}" name="phone-number" required autocomplete="phone-number" placeholder="{{ __('Phone') }}">
                                    </div>
                                </div>

                                {{--STREET ADDRESS--}}
                                <div class="form-group row mb-0 py-1">

                                    <div class="col">
                                        <input id="address" type="text" class="gf-form-field" value="{{Auth::User()->address}}" name="address" required autocomplete="address" placeholder="{{ __('Street Address') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-0 py-1">

                                    {{--  ZIP  --}}
                                    <div class="col-md-6">
                                        <input id="zip" type="text" class="gf-form-field @error('zip') is-invalid @enderror" name="zip" value="{{Auth::User()->zip}}" required autocomplete="zip" autofocus placeholder="{{ __('Zip') }}">

                                        @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    {{--  STATE  --}}
                                    <div class="col-md-6">
                                        <input id="state" type="text" class="gf-form-field @error('state') is-invalid @enderror" name="state" value="{{Auth::User()->state}}" required autocomplete="state" autofocus placeholder="{{ __('State') }}">

                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--  CITY  --}}
                                <div class="form-group row mb-0 py-1">

                                    <div class="col">
                                        <input id="city" type="text" class="gf-form-field @error('city') is-invalid @enderror" name="city" value="{{Auth::User()->city}}" required autocomplete="city" autofocus placeholder="{{ __('City') }}">

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--KENNEL-NAME--}}
                                <div class="form-group row mb-0 py-1">
                                    <div class="col">
                                        <input id="kennel-name" type="text" class="gf-form-field" name="kennel-name" value="{{Auth::User()->kennelName}}" required autocomplete="kennel-name" placeholder="{{ __('Kennel Name') }}">
                                    </div>
                                </div>

                                {{--FACEBOOK-URL--}}
                                <div class="form-group row mb-0 py-1">
                                    <div class="col">
                                        <div class="input-group mb-0 flex-nowrap">
                                            <label for="b-facebook" class="col-1 text-center gf-form-field-inline-icon mb-0"><i class="fab fa-facebook-f gf-blue"></i></label>
                                            <input id="b-facebook" type="url" class="col gf-form-field gf-form-field-inline-right" value="{{Auth::User()->fbAccountUrl->asString()}}" name="b-facebook" autocomplete="b-facebook">
                                        </div>
                                    </div>
                                </div>


                                {{--INSTAGRAM-URL--}}

                                <div class="form-group row mb-0 py-1">
                                    <div class="col">
                                        <div class="input-group mb-0 flex-nowrap">
                                            <label for="b-instagram" class="col-1 text-center gf-form-field-inline-icon mb-0"><i class="fab fa-instagram gf-blue"></i></label>
                                            <input id="b-instagram" type="url" class="gf-form-field gf-form-field-inline-right" value="{{Auth::User()->igAccountUrl->asString()}}" name="b-instagram" autocomplete="b-instagram">
                                        </div>
                                    </div>
                                </div>

                                {{--WEBSITE-URL--}}

                                <div class="form-group row mb-0 py-1">
                                    <div class="col">
                                        <div class="input-group mb-0 flex-nowrap">
                                            <label for="b-website" class="col-1 text-center gf-form-field-inline-icon mb-0"><i class="fas fa-globe gf-blue"></i></label>
                                            <input id="b-website" type="url" class="gf-form-field gf-form-field-inline-right" value="{{Auth::User()->website->asString()}}" name="b-website" autocomplete="b-instagram">
                                        </div>
                                    </div>
                                </div>

                                {{--BREEDER PROFILE IMAGE--}}
                                <div class="row gf-breeder-profile-image align-items-center">
                                    <div class="col-md-6">
                                        <img src="{{Auth::User()->profileImage !=null ? asset_file_url(Auth::User()->profileImage) : '/images/notfound/gf-not-found.png'}}" id="preview-profile-image" class="img-thumbnail m-auto" width="200" height="200" alt="Profile image not found">


                                        <input type="file" name="photo1" class="breeder_logo" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            <input type="text" class="gf-form-field gf-form-field-inline-left mb-0 @error('image_one') is-invalid @enderror" disabled placeholder="Breeder Profile Image" id="breeder-logo" required autofocus>
                                            <div class="">
                                                <button type="button" class="browse-b-logo gf-btn-light gf-form-field-inline-btn">Browse</button>
                                            </div>
                                            @error('image_one')
                                            <span class="invalid-feedback" role="alert"></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <img src="{{Auth::User()->logo !=null ? asset_file_url(Auth::User()->logo) : '/images/notfound/gf-not-found.png'}}" id="preview-image" class="img-thumbnail m-auto" width="200" height="200" alt="Profile image not found">


                                        <input type="file" name="photo1" class="image_one" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            <input type="text" class="gf-form-field gf-form-field-inline-left mb-0 @error('image_one') is-invalid @enderror" disabled placeholder="Kennel Logo" id="main_image" required autofocus>
                                            <div class="">
                                                <button type="button" class="browse gf-btn-light gf-form-field-inline-btn">Browse</button>
                                            </div>
                                            @error('image_one')
                                            <span class="invalid-feedback" role="alert"></span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                {{--BREEDER KENNEL LOGO--}}

                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="gf-btn-dark px-5">Update Setting</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
