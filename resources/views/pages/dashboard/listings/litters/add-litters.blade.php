@extends('./layouts.app')

@section('content')

    <div class="container-fluid">


        @if(isset($litter))
            <h2 class="page-title text-center mb-5">Edit Litter LISTING</h2>
        @else
            <h2 class="page-title text-center mb-5">CREATE Litter LISTING</h2>
        @endif
        <div class="page-content">
            @include('components.gf-dashboard-menu-area')
            <div class="fbd-create-listing-content-area p-3 mb-3 rounded">
                @if(isset($litter))
                    <form method="post" action="{{route('updateLitter')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{$litter->getId()}}"  class="form-control" id="listing Title" placeholder="">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-4 text-right">
                                <img src="{{asset_file_url($litter->photo1)}}" id="preview-image" class="img-thumbnail my-3" width="350px">
                            </div>
                            <div class="col-4">
                                @foreach(explode('/',asset_file_url($litter->photo1)) as $img1)
                                @endforeach
                                @foreach(explode('/',asset_file_url($litter->photo2)) as $img2)
                                @endforeach
                                @foreach(explode('/',asset_file_url($litter->photo3)) as $img3)
                                @endforeach
                                @foreach(explode('/',asset_file_url($litter->photo4)) as $img4)
                                @endforeach
                                @foreach(explode('/',asset_file_url($litter->photo5)) as $img5)
                                @endforeach
                                <div>
                                    <input type="file" name="photo1" class="image_one" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="hidden" name="photo1_name" value="{{public_path($img1)}}">
                                        <input type="text" class="form-control @error('image_one') is-invalid @enderror" value="{{$img1}}" disabled placeholder="Upload Main Image" id="main_image" required autofocus>
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
                                <div>
                                    <input type="file" name="photo2" class="image_two" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="hidden" name="photo2_name" value="{{public_path($img2)}}">
                                        <input type="text" class="form-control @error('image_two') is-invalid @enderror" value="{{$img2}}" disabled placeholder="Upload Image" id="image_two" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse2 btn btn-primary btn-fbd">Browse</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="file" name="photo3" class="image_three" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="hidden" name="photo3_name" value="{{public_path($img3)}}">
                                        <input type="text" class="form-control @error('image_three') is-invalid @enderror" value="{{$img3}}" disabled placeholder="Upload Image" id="image_three" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse3 btn btn-primary btn-fbd">Browse</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="file" name="photo4" class="image_four" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="hidden" name="photo4_name" value="{{public_path($img4)}}">
                                        <input type="text" class="form-control @error('image_four') is-invalid @enderror" value="{{$img4}}" disabled placeholder="Upload Image" id="image_four" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse4 btn btn-primary btn-fbd">Browse</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="file" name="photo5" class="image_five" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="hidden" name="photo5_name" value="{{public_path($img5)}}">
                                        <input type="text" class="form-control @error('image_five') is-invalid @enderror" value="{{$img5}}" disabled placeholder="Upload Image" id="image_five" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse5 btn btn-primary btn-fbd">Browse</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-title" class="col-sm-2 col-form-label text-right">Title</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" value="{{$litter->title}}"  class="form-control" id="listing Title" placeholder="" required autofocus>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-description" class="col-sm-2 col-form-label text-right">Description</label>
                            <div class="col-sm-8">
                        <textarea class="form-control" name="listing-description" id="listing-description" cols="50" rows="5" required autofocus>
                            {{$litter->decription}}
                        </textarea>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right">Sponsored</label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="sponsored" @if((bool)$litter->isSponsored == 1) checked @endif class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right" >Expected Date of Birth</label>
                            <div class="col-sm-3">
                                <input type="date" name="dob" value="{{ date('Y-m-d',$litter->expectedDob->getTimestamp())}}" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-sex" class="col-sm-2 col-form-label text-right">DAM</label>
                            <div class="col-sm-3">
                                <input type="text" name="dam" value="{{$litter->title}}" class="form-control" id="listing Title" placeholder="" required autofocus>
                            </div>
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right" >SIRE</label>
                            <div class="col-sm-3">
                                <input type="text" name="sire" value="{{$litter->title}}" class="form-control" id="listing Title" placeholder="" required autofocus>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class=" btn btn-primary btn-fbd px-5">Update Listing</button>
                            </div>
                        </div>
                    </form>
                @else
                    <form method="post" action="{{route('createLitter')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                        @csrf
                        <input type="hidden" name="type" value="stud"  class="form-control" id="listing Title" placeholder="">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-4 text-right">
                                <img src="/images/placeholder.gif" id="preview-image" class="img-thumbnail my-3" width="350px">
                            </div>
                            <div class="col-4">
                                <div>
                                    <input type="file" name="photo1" class="image_one" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control @error('image_one') is-invalid @enderror" disabled placeholder="Upload Main Image" id="main_image" required autofocus>
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
                                <div>
                                    <input type="file" name="photo2" class="image_two" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" disabled placeholder="Upload Image" id="image_two" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse2 btn btn-primary btn-fbd">Browse</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="file" name="photo3" class="image_three" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" disabled placeholder="Upload Image" id="image_three" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse3 btn btn-primary btn-fbd">Browse</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="file" name="photo4" class="image_four" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" disabled placeholder="Upload Image" id="image_four" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse4 btn btn-primary btn-fbd">Browse</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="file" name="photo5" class="image_five" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" disabled placeholder="Upload Image" id="image_five" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="browse5 btn btn-primary btn-fbd">Browse</button>
                                        </div>
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
                        <textarea class="form-control" name="listing-description" id="listing-description" cols="50" rows="5" required autofocus>
                        </textarea>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right">Sponsored</label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="sponsored" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right" >Expected Date of Birth</label>
                            <div class="col-sm-3">
                                <input type="date" name="dob" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-sex" class="col-sm-2 col-form-label text-right">DAM</label>
                            <div class="col-sm-3">
                                <input type="text" name="dam"  class="form-control" id="listing Title" placeholder="" required autofocus>
                            </div>
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right" >SIRE</label>
                            <div class="col-sm-3">
                                <input type="text" name="sire"  class="form-control" id="listing Title" placeholder="" required autofocus>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class=" btn btn-primary btn-fbd px-5">Add Litter</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
            @include('components/adds-area')
        </div>

    </div>
@endsection
