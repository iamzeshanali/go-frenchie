@extends('./layouts.app')

@section('content')

    <div class="container-fluid">
        @if(isset($supply))
            @foreach(explode('/',asset_file_url($supply->logo)) as $img)
            @endforeach
            <h2 class="page-title text-center mb-5">Edit Breeder Resources</h2>
        @else
            <h2 class="page-title text-center mb-5">Add Breeder Resources</h2>
        @endif
            <div class="page-content">
                @include('components.breader-dashboard-menu-area')
                <div class="fbd-create-listing-content-area p-3 mb-3 rounded">


                    @if(isset($supply))

                        <form method="post" action="{{route('updateBreederSupplies')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="slug" value="{{$supply->slug}}"  class="form-control" id="listing Title" placeholder="">
                            <div class="row">
                                <div class="col-2"></div>

                                <div class="col-4 text-right">
                                    @if(empty($supply->logo))
                                        <img src="/images/placeholder.gif" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @else
                                        <img src="{{asset_file_url($supply->logo)}}" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @endif

                                </div>

                                <div class="col-4">
                                    <div>
                                        <input type="file" name="logo" value="{{$img}}" class="image_one" accept="image/*">
                                        <div class="input-group my-3">
                                            <input type="hidden" name="logo_name" value="{{public_path($img)}}">
                                            <input type="text"  class="form-control @error('image_one') is-invalid @enderror" @if(!(empty(\Illuminate\Support\Facades\Auth::user()->logo))) value="{{$img}}" @endif disabled placeholder="Upload Logo Image" id="main_image" required autofocus>
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary btn-fbd">Browse</button>
                                            </div>
                                            @error('image_one')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="listing-title" class="col-sm-2 col-form-label text-right">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title"  value="{{$supply->title}}" class="form-control" id="listing Title" placeholder="" required autofocus>
                                </div>
                            </div>

                            <div class="row my-3">
                                <label for="listing-description" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="listing-description" cols="50" rows="5" required autofocus>
                                        {{$supply->decription}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="web_url" class="col-sm-2 col-form-label text-right">Website URL</label>
                                <div class="col-sm-8">
                                    <input type="url" name="web_url" value="{{$supply->websiteUrl->asString()}}"  class="form-control"  id="listing Title" placeholder="" required autofocus>
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="price" class="col-sm-2 col-form-label text-right">Price</label>
                                <div class="col-sm-3">
                                    <input type="number" name="price" value="{{$supply->price->getAmount()/100}}"  class="form-control" required autofocus>
                                </div>
                                <label for="coupon" class="col-sm-2 col-form-label text-right" >Coupon Code</label>
                                <div class="col-sm-3">
                                    <input type="text" name="coupon" value="{{$supply->couponCode}}"  class="form-control" required autofocus>
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class=" btn btn-primary btn-fbd px-5">Update Listing</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="post" action="{{route('createBreederSupplies')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                            @csrf
                            <input type="hidden" name="type" value="puppy"  class="form-control" id="listing Title" placeholder="">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-4 text-right">
                                    @if(empty(\Illuminate\Support\Facades\Auth::user()->logo))
                                        <img src="/images/placeholder.gif" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @else
                                        <img src="{{asset_file_url(\Illuminate\Support\Facades\Auth::user()->logo)}}" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @endif

                                </div>
                                @foreach(explode('/',asset_file_url(\Illuminate\Support\Facades\Auth::user()->logo)) as $img)
                                @endforeach
                                <div class="col-4">
                                    <div>
                                        <input type="file" name="logo" class="image_one" accept="image/*">
                                        <div class="input-group my-3">
                                            <input type="hidden" name="logo_name" value="{{public_path($img)}}">
                                            <input type="text" class="form-control @error('image_one') is-invalid @enderror" @if(!(empty(\Illuminate\Support\Facades\Auth::user()->logo))) value="{{asset_file_url(\Illuminate\Support\Facades\Auth::user()->logo)}}" @endif disabled placeholder="Upload Logo Image" id="main_image" required autofocus>
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary btn-fbd">Browse</button>
                                            </div>
                                            @error('image_one')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="listing-title" class="col-sm-2 col-form-label text-right">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title"  class="form-control" id="listing Title" placeholder="" required autofocus>
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="listing-description" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="listing-description" cols="50" rows="5" required autofocus>
                                    </textarea>
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="listing-title" class="col-sm-2 col-form-label text-right">Website URL</label>
                                <div class="col-sm-8">
                                    <input type="url" name="web_url"  class="form-control" id="listing Title" placeholder="" required autofocus>
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="listing-sex" class="col-sm-2 col-form-label text-right">Price</label>
                                <div class="col-sm-3">
                                    <input type="number" name="price" class="form-control" required autofocus>
                                </div>
                                <label for="listing-dob" class="col-sm-2 col-form-label text-right" >Coupon Code</label>
                                <div class="col-sm-3">
                                    <input type="text" name="coupon" class="form-control" required autofocus>
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class=" btn btn-primary btn-fbd px-5">Add Listing</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
                @include('components/adds-area')
            </div>

    </div>
@endsection
