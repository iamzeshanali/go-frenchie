@extends('./layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="gf-dashboard-page-content row align-items-start">
            @include('components.gf-dashboard-menu-area')
            <div class="fbd-create-listing-content-area col-xl-10 col-lg-9">

                <form method="post" action="{{isset($litter) ? route('updateLitter') : route('createLitter')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                    @csrf
                    @if(isset($litter))
                        @method('patch')
                        <input type="hidden" name="id" value="{{$litter->getId()}}"  class="form-control" id="listing Title" placeholder="">
                    @endif
                    <input type="hidden" name="type" value="stud"  class="form-control" id="listing Title" placeholder="">
                    <div class="row justify-content-center p-0">
                        <div class="col-md-8">
                            {{--SET FORM TITLE--}}
                            <h2 class="text-center mb-4 gf-red">{{isset($litter) ? 'Update' : 'Add New'}} Litter</h2>
                            {{--TITLE--}}
                            <div class="col">
                                <input type="text" name="title" value="{{isset($litter) ? $litter->title : ''}}"  class="gf-form-field" id="listing Title" placeholder="Title: *" required autofocus >
                            </div>
                            {{--SEX--}}
                            {{--DAM--}}

                            {{--SIRE--}}
                            <div class="row align-items-center">
                                <label for="listing-sex" class="col-sm-2 col-form-label">Dam</label>
                                <div class="col-sm-4">
                                        <input type="text" name="dam" value="{{isset($litter) ? $litter->dam : ''}}"  class="gf-form-field" id="listing Title" placeholder="Dam: *" required autofocus >
                                </div>
                                {{--SPONSORED--}}
                                <label for="listing-dob" class="col-sm-2 col-form-label">Sire</label>
                                <div class="col-sm-4">
                                    <input type="text" name="sire" value="{{isset($litter) ? $litter->sire : ''}}"  class="gf-form-field" id="listing Title" placeholder="Sire: *" required autofocus >
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <label for="listing-dob" class="col-sm-2 col-form-label">Featured</label>
                                <div class="col-sm-4">
                                    @if(isset($puppy))
                                        <input type="checkbox" name="featured" class="form-control" autofocus style="width: 20px;" {{(bool)$litter->isFeatured ==  1 ? 'checked' : ''}}>
                                    @else
                                        <input type="checkbox" name="featured" class="form-control" autofocus style="width: 20px;">
                                    @endif
                                </div>

                                <label for="listing-dob" class="col-sm-2 col-form-label">Sponsored</label>
                                <div class="col-sm-4">
                                    @if(isset($puppy))
                                        <input type="checkbox" name="sponsored" class="form-control" autofocus style="width: 20px;" {{(bool)$litter->isSponsored ==  1 ? 'checked' : ''}}>
                                    @else
                                        <input type="checkbox" name="sponsored" class="form-control" autofocus style="width: 20px;">
                                    @endif
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <label for="listing-sex" class="col-sm-2 col-form-label">Expected DOB</label>
                                <div class="col-sm-4">
                                    <input type="date" name="dob" value="{{ isset($litter) ? date('Y-m-d',$litter->expectedDob->getTimestamp()) : ''}}" class="gf-form-field" required autofocus>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <textarea class="gf-form-field h-auto" name="listing-description" id="listing-description" rows="7" placeholder="Description: *" required autofocus>{{ isset($litter) ? $litter->description->asString() : ''}}</textarea>
                                </div>
                            </div>
                            <div class="row gf-add-listing-image">
                                <div class="col-md-6 m-auto gf-mw-fit">
                                    @if(isset($litter))
                                        <img src="{{$litter->photo1 !=null ? asset_file_url($litter->photo1) : '/images/placeholder.gif'}}" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @else
                                        <img src="/images/placeholder.gif" id="preview-image" class="img-thumbnail my-3" width="350px">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <input type="file" name="photo1" class="image_one" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            @if(isset($litter) && ($litter->photo1 != null))
                                                @foreach(explode('/',asset_file_url($litter->photo1)) as $img1)
                                                @endforeach
                                                <input type="hidden" name="photo1_name" value="{{public_path($img1)}}">
                                                <input type="text"  value="{{$img1}}"  class="gf-form-field mb-0 @error('image_one') is-invalid @enderror" disabled placeholder="Upload Main Image" id="main_image" required autofocus>
                                            @else
                                                <input type="text" class="gf-form-field mb-0 @error('image_one') is-invalid @enderror" disabled placeholder="Upload Main Image" id="main_image" required autofocus>
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
                                    <div>
                                        <input type="file" name="photo2" class="image_two" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            @if(isset($litter) && ($litter->photo2 != null))
                                                @foreach(explode('/',asset_file_url($litter->photo2)) as $img2)
                                                @endforeach
                                                <input type="hidden" name="photo2_name" value="{{public_path($img2)}}">
                                                <input type="text"  value="{{$img2}}"  class="gf-form-field mb-0 @error('image_two') is-invalid @enderror" disabled placeholder="Upload Main Image" id="image_two" required autofocus>
                                            @else
                                                <input type="text" class="gf-form-field mb-0" disabled placeholder="Upload Image" id="image_two" required autofocus>
                                            @endif
                                            <div class="">
                                                <button type="button" class="browse2 gf-btn-dark">Browse</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="file" name="photo3" class="image_three" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            @if(isset($litter) && ($litter->photo3 != null))
                                                @foreach(explode('/',asset_file_url($litter->photo3)) as $img3)
                                                @endforeach
                                                <input type="hidden" name="photo3_name" value="{{public_path($img3)}}">
                                                <input type="text"  value="{{$img3}}"  class="gf-form-field mb-0 @error('image_three') is-invalid @enderror" disabled placeholder="Upload Main Image" id="image_three" required autofocus>
                                            @else
                                                <input type="text" class="gf-form-field mb-0" disabled placeholder="Upload Image" id="image_three" required autofocus>
                                            @endif
                                            <div class="">
                                                <button type="button" class="browse3 gf-btn-dark">Browse</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="file" name="photo4" class="image_four" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            @if(isset($litter) && ($litter->photo4 != null))
                                                @foreach(explode('/',asset_file_url($litter->photo4)) as $img4)
                                                @endforeach
                                                <input type="hidden" name="photo4_name" value="{{public_path($img4)}}">
                                                <input type="text"  value="{{$img4}}"  class="gf-form-field mb-0 @error('image_four') is-invalid @enderror" disabled placeholder="Upload Main Image" id="image_four" required autofocus>
                                            @else
                                                <input type="text" class="gf-form-field mb-0" disabled placeholder="Upload Image" id="image_four" required autofocus>
                                            @endif
                                            <div class="">
                                                <button type="button" class="browse4 gf-btn-dark">Browse</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="file" name="photo5" class="image_five" accept="image/*">
                                        <div class="input-group my-3 flex-nowrap">
                                            @if(isset($litter) && ($litter->photo5 != null))
                                                @foreach(explode('/',asset_file_url($litter->photo5)) as $img5)
                                                @endforeach
                                                <input type="hidden" name="photo5_name" value="{{public_path($img5)}}">
                                                <input type="text"  value="{{$img5}}"  class="gf-form-field mb-0 @error('image_five') is-invalid @enderror" disabled placeholder="Upload Main Image" id="image_five" required autofocus>
                                            @else
                                                <input type="text" class="gf-form-field mb-0" disabled placeholder="Upload Image" id="image_five" required autofocus>
                                            @endif
                                            <div class="">
                                                <button type="button" class="browse5 gf-btn-dark">Browse</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="gf-btn-dark px-5">{{isset($litter) ? 'Update' : 'Add New'}} Listing</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

