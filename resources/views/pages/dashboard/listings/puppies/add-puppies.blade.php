@extends('./layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row pb-0">
            <div class="btn-group btn-breadcrumb breadcrumb-info">
                <a href="{{route('dashboard')}}" class="btn btn-info visible-lg-block visible-md-block">Dashboard</a>
                <a href="#" class="btn btn-info visible-lg-block visible-md-block">Listings</a>
                <a href="{{route('showAllPuppies',1)}}" disabled class="btn btn-info visible-lg-block visible-md-block">Puppies</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <?php
        $blue = \App\Domain\Entities\Enums\BlueEnum::getAll();
        $chocolate = \App\Domain\Entities\Enums\ChocolateEnum::getAll();
        $agouti = \App\Domain\Entities\Enums\AgoutiEnum::getAll();
        $testableChocolate = \App\Domain\Entities\Enums\TestableChocolateEnum::getAll();
        $fluffy = \App\Domain\Entities\Enums\FluffyEnum::getAll();
        $emcir = \App\Domain\Entities\Enums\E_mcirEnum::getAll();
        $intensity = \App\Domain\Entities\Enums\IntensityEnum::getAll();
        $pied = \App\Domain\Entities\Enums\PiedEnum::getAll();
        $brindle = \App\Domain\Entities\Enums\BrindleEnum::getAll();
        $merle = \App\Domain\Entities\Enums\MerleEnum::getAll();
        ?>

{{--        @if(isset($puppy))--}}
{{--            <h2 class="page-title text-center mb-5">Edit PUPPY LISTING</h2>--}}
{{--        @else--}}
{{--            <h2 class="page-title text-center mb-5">CREATE PUPPY LISTING</h2>--}}
{{--        @endif--}}
        <div class="gf-dashboard-page-content row align-items-start">
            @include('components.gf-dashboard-menu-area')
            <div class="fbd-create-listing-content-area col-xl-10 col-lg-9">

                    <form method="post" action="{{isset($puppy) ? route('updateListing') : route('createListing')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                        @csrf
                        @if(isset($puppy))
                            @method('patch')
                            <input type="hidden" name="id" value="{{$puppy->getId()}}"  class="form-control" id="listing Title" placeholder="">
                        @endif
                        <input type="hidden" name="type" value="puppy"  class="form-control" id="listing Title" placeholder="">
                        <div class="row justify-content-center p-0">
                            <div class="col-md-8">
                                <h2 class="text-center mb-4 gf-red">{{isset($puppy) ? 'Update' : 'Add New'}} Puppy</h2>
                                <div class="col">
                                    <input type="text" name="title" value="{{isset($puppy) ? $puppy->title : ''}}"  class="gf-form-field" id="listing Title" placeholder="Puppy Name: *" required autofocus >
                                </div>

                                <div class="row align-items-center">
                                    <label for="listing-sex" class="col-sm-2 col-form-label">Gender: *</label>
                                    <div class="col-sm-4">
                                        <div class="form-check form-check-inline">
                                            @if(isset($puppy))
                                                <input class="form-check-input" type="radio" name="listing-sex" id="gf_puppy_male" value="male" {{$puppy->sex->getValue() ==  'male' ? 'checked' : ''}} >
                                            @else
                                                <input class="form-check-input" type="radio" name="listing-sex" id="gf_puppy_male" value="male">
                                            @endif

                                            <label class="form-check-label" for="gf_puppy_male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            @if(isset($puppy))
                                                <input class="form-check-input" type="radio" name="listing-sex" id="gf_puppy_male" value="male" {{$puppy->sex->getValue() ==  'female' ? 'checked' : ''}} >
                                            @else
                                                <input class="form-check-input" type="radio" name="listing-sex" id="gf_puppy_female" value="female">
                                            @endif
                                            <label class="form-check-label" for="gf_puppy_female">Female</label>
                                        </div>

                                    </div>

                                    <label for="listing-dob" class="col-sm-2 col-form-label">Sponsored</label>
                                    <div class="col-sm-4">
                                        @if(isset($puppy))
                                            <input type="checkbox" name="sponsored" class="form-control" autofocus style="width: 20px;" {{(bool)$puppy->isSponsored ==  1 ? 'checked' : ''}}>
                                        @else
                                            <input type="checkbox" name="sponsored" class="form-control" autofocus style="width: 20px;">
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="listing-dob" class="col-sm-2 col-form-label">Date of Birth: *</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="dob" value="{{ isset($puppy) ? date('Y-m-d',$puppy->dob->getTimestamp()) : ''}}" class="gf-form-field" required autofocus>
                                    </div>
                                    <label for="listing-dob" class="col-sm-2 col-form-label">Featured</label>
                                    <div class="col-sm-4">
                                        @if(isset($puppy))
                                            <input type="checkbox" name="featured" class="form-control" autofocus style="width: 20px;" {{(bool)$puppy->isFeatured ==  1 ? 'checked' : ''}}>
                                        @else
                                            <input type="checkbox" name="featured" class="form-control" autofocus style="width: 20px;">
                                        @endif
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <textarea class="gf-form-field h-auto" name="listing-description" id="listing-description" rows="7" placeholder="Description: *" required autofocus>{{ isset($puppy) ? $puppy->description->asString() : ''}}</textarea>
                                    </div>
                                </div>

                                <h4 class="col gf-red">DNA COLOR/COAT CHARACTERISTICS</h4>
                                <div class="row">
                                    <label for="listing-blue" class="col-sm-2 col-form-label ">Blue</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-blue" id="listing-blue" required autofocus>

                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->blue == null ? '': 'selected'}}>None</option>
                                                @foreach($blue as $b)
                                                    <option value="{{$b->getValue()}}" @if($puppy->blue != null){{$b->getValue() == $puppy->blue->getValue() ? 'selected': ''}}@endif>{{$b->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($blue as $b)
                                                    <option value="{{$b->getValue()}}" >{{$b->getValue()}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <label for="listing-choclote" class="col-sm-2 col-form-label">Chocolate</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-choclote" id="listing-choclote" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->chocolate == null ? '': 'selected'}}>None</option>
                                                @foreach($chocolate as $c)
                                                    <option value="{{$c->getValue()}}" @if($puppy->chocolate != null){{$c->getValue() == $puppy->chocolate->getValue() ? 'selected': ''}}@endif>{{$c->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($chocolate as $c)
                                                    <option value="{{$c->getValue()}}" >{{$c->getValue()}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="listing-agouti" class="col-sm-2 col-form-label">Agouti</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-agoutie" id="listing-agouti" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->agouti == null ? '': 'selected'}}>None</option>
                                                @foreach($agouti as $a)
                                                    <option value="{{$a->getValue()}}" @if($puppy->agouti != null){{$a->getValue() == $puppy->agouti->getValue() ? 'selected': ''}}@endif>{{$a->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($agouti as $a)
                                                    <option value="{{$a->getValue()}}" >{{$a->getValue()}}</option>
                                                @endforeach
                                            @endif


                                        </select>
                                    </div>
                                    <label for="listing-testable-chocolate" class="col-sm-2 col-form-label">Testable</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-testable" id="listing-testable" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->testableChocolate == null ? '': 'selected'}}>None</option>
                                                @foreach($testableChocolate as $t)
                                                    <option value="{{$t->getValue()}}" @if($puppy->testableChocolate != null){{$t->getValue() == $puppy->testableChocolate->getValue() ? 'selected': ''}}@endif>{{$t->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($testableChocolate as $t)
                                                    <option value="{{$t->getValue()}}" >{{$t->getValue()}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="listing-fluffy" class="col-sm-2 col-form-label">Fluffy</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-fluffy" id="listing-fluffy" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->fluffy == null ? '': 'selected'}}>None</option>
                                                @foreach($fluffy as $f)
                                                    <option value="{{$f->getValue()}}" @if($puppy->fluffy != null){{$f->getValue() == $puppy->fluffy->getValue() ? 'selected': ''}}@endif>{{$f->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($fluffy as $f)
                                                    <option value="{{$f->getValue()}}" >{{$f->getValue()}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <label for="listing-emcir" class="col-sm-2 col-form-label">E(MCIR)</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-emcir" id="listing-emcir" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->eMcir == null ? '': 'selected'}}>None</option>
                                                @foreach($emcir as $e)
                                                    <option value="{{$e->getValue()}}" @if($puppy->eMcir != null){{$e->getValue() == $puppy->eMcir->getValue() ? 'selected': ''}}@endif>{{$e->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($emcir as $e)
                                                    <option value="{{$e->getValue()}}" >{{$e->getValue()}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="listing-intensity" class="col-sm-2 col-form-label">Intensity</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-intensity" id="listing-intensity" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->intensity == null ? '': 'selected'}}>None</option>
                                                @foreach($intensity as $i)
                                                    <option value="{{$i->getValue()}}" @if($puppy->intensity != null){{$i->getValue() == $puppy->intensity->getValue() ? 'selected': ''}}@endif>{{$i->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($intensity as $i)
                                                    <option value="{{$i->getValue()}}" >{{$i->getValue()}}</option>
                                                @endforeach
                                            @endif


                                        </select>
                                    </div>
                                    <label for="listing-pied" class="col-sm-2 col-form-label">PIED</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-pied" id="listing-pied" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->pied == null ? '': 'selected'}}>None</option>
                                                @foreach($pied as $pi)
                                                    <option value="{{$pi->getValue()}}" @if($puppy->pied != null){{$pi->getValue() == $puppy->pied->getValue() ? 'selected': ''}}@endif>{{$pi->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($pied as $p)
                                                    <option value="{{$p->getValue()}}" >{{$p->getValue()}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="listing-brindle" class="col-sm-2 col-form-label">BRINDLE</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-brindle" id="listing-brindle" required autofocus>

                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->brindle == null ? '': 'selected'}}>None</option>
                                                @foreach($brindle as $br)
                                                    <option value="{{$br->getValue()}}" @if($puppy->brindle != null){{$br->getValue() == $puppy->brindle->getValue() ? 'selected': ''}}@endif>
                                                        {{$br->getValue()}}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($brindle as $br)
                                                    <option value="{{$br->getValue()}}" >{{$br->getValue()}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <label for="listing-merle" class="col-sm-2 col-form-label">MERLE</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="listing-merle" id="listing-merle" required autofocus>
                                            @if(isset($puppy))
                                                <option value="none" {{$puppy->merle == null ? '': 'selected'}}>None</option>
                                                @foreach($merle as $m)
                                                    <option value="{{$m->getValue()}}" @if($puppy->merle != null){{$m->getValue() == $puppy->merle->getValue() ? 'selected': ''}}@endif>{{$m->getValue()}}</option>
                                                @endforeach
                                            @else
                                                <option value="none" selected>None</option>
                                                @foreach($merle as $m)
                                                    <option value="{{$m->getValue()}}" >{{$m->getValue()}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>


                                <div class="row gf-add-listing-image">
                                    <div class="col-md-6 m-auto gf-mw-fit">
                                        @if(isset($puppy))
                                            <img src="{{$puppy->photo1 !=null ? asset_file_url($puppy->photo1) : '/images/placeholder.gif'}}" id="preview-image" class="img-thumbnail my-3" width="350px">
                                        @else
                                            <img src="/images/placeholder.gif" id="preview-image" class="img-thumbnail my-3" width="350px">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <input type="file" name="photo1" class="image_one" accept="image/*">
                                            <div class="input-group my-3 flex-nowrap">
                                                @if(isset($puppy) && ($puppy->photo1 != null))
                                                    @foreach(explode('/',asset_file_url($puppy->photo1)) as $img1)
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
                                                @if(isset($puppy) && ($puppy->photo2 != null))
                                                    @foreach(explode('/',asset_file_url($puppy->photo2)) as $img2)
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
                                                @if(isset($puppy) && ($puppy->photo3 != null))
                                                    @foreach(explode('/',asset_file_url($puppy->photo3)) as $img3)
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
                                                @if(isset($puppy) && ($puppy->photo4 != null))
                                                    @foreach(explode('/',asset_file_url($puppy->photo4)) as $img4)
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
                                                @if(isset($puppy) && ($puppy->photo5 != null))
                                                    @foreach(explode('/',asset_file_url($puppy->photo5)) as $img5)
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
                                <button type="submit" class="gf-btn-dark px-5">{{isset($puppy) ? 'Update' : 'Add New'}} Listing</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>

    </div>
@endsection

