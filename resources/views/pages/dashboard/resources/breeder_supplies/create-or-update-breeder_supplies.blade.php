@extends('./layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row pb-0">
            <div class="btn-group btn-breadcrumb breadcrumb-info">
                <a href="{{route('dashboard')}}" class="btn btn-info visible-lg-block visible-md-block">Dashboard</a>
                <a href="#" class="btn btn-info visible-lg-block visible-md-block">Resources</a>
                <a href="{{route('showAllBreederSupplies',1)}}" disabled class="btn btn-info visible-lg-block visible-md-block">Breeder Supplies</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="gf-dashboard-page-content row align-items-start">
            @include('components.gf-dashboard-menu-area')
            <div class="fbd-create-listing-content-area col-xl-10 col-lg-9">

                <form method="post" action="{{isset($supply) ? route('updateBreederSupplies') : route('createBreederSupplies')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                    @csrf
                    @if(isset($supply))
                        @method('patch')
                        <input type="hidden" name="slug" value="{{$supply->slug}}"  class="form-control" id="listing Title" placeholder="">
                    @endif
                    <input type="hidden" name="type" value="stud"  class="form-control" id="listing Title" placeholder="">
                    <div class="row justify-content-center p-0">
                        <div class="col-md-8">
                            <h2 class="text-center mb-4 gf-red">{{isset($supply) ? 'Update' : 'Add New'}} Breeder Supply</h2>
                            <div class="col">
                                <input type="text" name="title" value="{{isset($supply) ? $supply->title : ''}}"  class="gf-form-field" id="listing Title" placeholder="Supply Name: *" required autofocus >
                            </div>

                            <div class="row align-items-center">
                                <label for="listing-dob" class="col-sm-2 col-form-label">Web Url</label>
                                <div class="col-sm-4">
                                        <input type="url" name="web_url" value="{{isset($supply) ? $supply->websiteUrl->asString() : ''}}" class="gf-form-field" required autofocus>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <label for="listing-dob" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-4">
                                        <input type="number" name="price" value="{{isset($supply) ? $supply->price->getAmount()/100 : ''}}" class="gf-form-field" required autofocus>
                                </div>

                                <label for="listing-dob" class="col-sm-2 col-form-label">Coupon</label>
                                <div class="col-sm-4">
                                        <input type="text" name="coupon" value="{{isset($supply) ? $supply->couponCode : ''}}" class="gf-form-field" required autofocus>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <textarea class="gf-form-field h-auto" name="description" id="listing-description" rows="7" placeholder="Description: *" required autofocus>{{ isset($supply) ? $supply->decription->asString() : ''}}</textarea>
                                </div>
                            </div>


                            <div class="row gf-add-listing-image">
                                <div class="col-md-6 m-auto gf-mw-fit">
                                    @if(isset($supply))
                                        <img src="{{$supply->logo !=null ? asset_file_url($supply->logo) : '/images/placeholder.gif'}}" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @else
                                        <img src="/images/placeholder.gif" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <input type="file" name="logo" class="image_one" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            @if(isset($supply) && ($supply->logo != null))
                                                @foreach(explode('/',asset_file_url($supply->logo)) as $img1)
                                                @endforeach
                                                <input type="hidden" name="photo1_name" value="{{public_path($img1)}}">
                                                <input type="text"  value="{{$img1}}"  class="gf-form-field mb-0 @error('image_one') is-invalid @enderror" disabled placeholder="Upload Supply Image" id="main_image" required autofocus>
                                            @else
                                                <input type="text" class="gf-form-field mb-0 @error('image_one') is-invalid @enderror" disabled placeholder="Upload Supply Image" id="main_image" required autofocus>
                                            @endif
                                            <div class="">
                                                <button type="button" class="browse gf-btn-dark">Browse</button>
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

                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="gf-btn-dark px-5">{{isset($supply) ? 'Update' : 'Add New'}} Supply</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

