@extends('./layouts.app')

@section('content')

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

        @if(isset($puppy))
            <h2 class="page-title text-center mb-5">Edit PUPPY LISTING</h2>
        @else
            <h2 class="page-title text-center mb-5">CREATE PUPPY LISTING</h2>
        @endif
        <div class="page-content">
            @include('components.breader-dashboard-menu-area')
            <div class="fbd-create-listing-content-area p-3 mb-3 rounded">
                @if(isset($puppy))
                <form method="post" action="{{route('updateListing')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$puppy->getId()}}"  class="form-control" id="listing Title" placeholder="">
                    <input type="hidden" name="type" value="puppy"  class="form-control" id="listing Title" placeholder="">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4 text-right">
                            <img src="{{asset_file_url($puppy->photo1)}}" id="preview-image" class="img-thumbnail my-3" width="350px">
                        </div>
                        <div class="col-4">
                            @foreach(explode('/',asset_file_url($puppy->photo1)) as $img1)
                            @endforeach
                            @foreach(explode('/',asset_file_url($puppy->photo2)) as $img2)
                            @endforeach
                            @foreach(explode('/',asset_file_url($puppy->photo3)) as $img3)
                            @endforeach
                            @foreach(explode('/',asset_file_url($puppy->photo4)) as $img4)
                            @endforeach
                            @foreach(explode('/',asset_file_url($puppy->photo5)) as $img5)
                            @endforeach
                            <div>
                                <input type="file" name="photo1" class="image_one" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="hidden" name="photo1_name" value="{{public_path($img1)}}">
                                    <input type="text" class="form-control" value="{{$img1}}" disabled placeholder="Upload Main Image" id="main_image" required autofocus>
                                    <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary btn-fbd">Browse</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="file" name="photo2"  class="image_two" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="hidden" name="photo2_name" value="{{public_path($img2)}}">
                                    <input type="text" class="form-control" value="{{$img2}}" disabled placeholder="Upload Image" id="image_two" required autofocus>
                                    <div class="input-group-append">
                                        <button type="button" class="browse2 btn btn-primary btn-fbd">Browse</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="file" name="photo3"  class="image_three" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="hidden" name="photo3_name" value="{{public_path($img3)}}">
                                    <input type="text" class="form-control" value="{{$img3}}" disabled placeholder="Upload Image" id="image_three" required autofocus>
                                    <div class="input-group-append">
                                        <button type="button" class="browse3 btn btn-primary btn-fbd">Browse</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="file" name="photo4"  class="image_four" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="hidden" name="photo4_name" value="{{public_path($img4)}}">
                                    <input type="text" class="form-control" value="{{$img4}}" disabled placeholder="Upload Image" id="image_four" required autofocus>
                                    <div class="input-group-append">
                                        <button type="button" class="browse4 btn btn-primary btn-fbd">Browse</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="file" name="photo5"  class="image_five" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="hidden" name="photo5_name" value="{{public_path($img5)}}">
                                    <input type="text" class="form-control" value="{{$img5}}" disabled placeholder="Upload Image" id="image_five" required autofocus>
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
                            <input type="text" name="title" value="{{$puppy->title}}"  class="form-control" id="listing Title" placeholder="" required autofocus>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="listing-description" class="col-sm-2 col-form-label text-right">Description</label>
                        <div class="col-sm-8">
                        <textarea class="form-control" name="listing-description" id="listing-description" cols="50" rows="5" required autofocus>
                           {{$puppy->decription}}
                        </textarea>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="listing-sex" class="col-sm-2 col-form-label text-right">Sex</label>
                        <div class="col-sm-3">
                            <?php
                                $sex = \App\Domain\Entities\Enums\ListingsSexEnum::getAll();
                            ?>
                            <select class="form-control" name="listing-sex" id="listing-sex" required autofocus>
                                @foreach($sex as $s)
                                    <option value="{{$s->getValue()}}" @if($puppy->sex->getValue() == $s->getValue()) selected @endif>{{ ucfirst($s->getValue())}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="listing-dob" class="col-sm-2 col-form-label text-right" >Date of Birth</label>
                        <div class="col-sm-3">
                            <input type="date" name="dob" value="{{ date('Y-m-d',$puppy->dob->getTimestamp())}}" class="form-control" required autofocus>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="listing-dob" class="col-sm-2 col-form-label text-right">Sponsored</label>
                        <div class="col-sm-3">
                            <input type="checkbox" name="sponsored" @if((bool)$puppy->isSponsored == 1) checked @endif  class="form-control" autofocus style="width: 20px;">
                        </div>
                    </div>
                    <h5 class="text-center my-4">DNA COLOR/COAT CHARACTERISTICS</h5>
                    <div class="row my-3">

                        <label for="listing-blue" class="col-sm-2 col-form-label text-right">Blue</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-blue" id="listing-blue" required autofocus>
                                @if($puppy->blue == null)
                                    <option value="none" selected>None</option>
                                    @foreach($blue as $b)
                                    <option value="{{$b->getValue()}}">{{$b->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($blue as $b)
                                        <option value="{{$b->getValue()}}" @if($b->getValue() == $puppy->blue->getValue()) selected @endif>{{$b->getValue()}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <label for="listing-choclote" class="col-sm-2 col-form-label text-right">Chocolate</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-choclote" id="listing-choclote" required autofocus>
                                @if($puppy->chocolate == null)
                                    <option value="none" selected>None</option>
                                    @foreach($chocolate as $c)
                                        <option value="{{$c->getValue()}}">{{$c->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($chocolate as $c)
                                        <option value="{{$c->getValue()}}" @if($puppy->chocolate->getValue() == $c->getValue()) selected @endif>{{$c->getValue()}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="listing-agouti" class="col-sm-2 col-form-label text-right">Agouti</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-agoutie" id="listing-agouti" required autofocus>
                                @if($puppy->agouti == null)
                                    <option value="none" selected>None</option>
                                    @foreach($agouti as $a)
                                        <option value="{{$a->getValue()}}">{{$a->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($agouti as $a)
                                        <option value="{{$a->getValue()}}" @if($puppy->agouti->getValue() == $a->getValue()) selected @endif>{{$a->getValue()}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <label for="listing-testable-chocolate" class="col-sm-2 col-form-label text-right">Testable</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-testable" id="listing-testable" required autofocus>
                                @if($puppy->testableChocolate == null)
                                    <option value="none" selected>None</option>
                                    @foreach($testableChocolate as $t)
                                        <option value="{{$t->getValue()}}">{{$t->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($testableChocolate as $t)
                                        <option value="{{$t->getValue()}}" @if($puppy->testableChocolate->getValue() == $t->getValue()) selected @endif>{{$t->getValue()}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="listing-fluffy" class="col-sm-2 col-form-label text-right">Fluffy</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-fluffy" id="listing-fluffy" required autofocus>
                                @if($puppy->fluffy == null)
                                    <option value="none" selected>None</option>
                                    @foreach($fluffy as $f)
                                        <option value="{{$f->getValue()}}">{{$f->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($fluffy as $f)
                                        <option value="{{$f->getValue()}}" @if($puppy->fluffy->getValue() == $f->getValue()) selected @endif>{{$f->getValue()}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <label for="listing-emcir" class="col-sm-2 col-form-label text-right">E(MCIR)</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-emcir" id="listing-emcir" required autofocus>
                                @if($puppy->eMcir == null)
                                    <option value="none" selected>None</option>
                                    @foreach($emcir as $e)
                                        <option value="{{$e->getValue()}}">{{$e->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($emcir as $e)
                                        <option value="{{$e->getValue()}}" @if($puppy->eMcir->getValue() == $e->getValue()) selected @endif>{{$e->getValue()}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="listing-intensity" class="col-sm-2 col-form-label text-right">Intensity</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-intensity" id="listing-intensity" required autofocus>
                                @if($puppy->intensity == null)
                                    <option value="none" selected>None</option>
                                    @foreach($intensity as $i)
                                        <option value="{{$i->getValue()}}">{{$i->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($intensity as $i)
                                        <option value="{{$i->getValue()}}" @if($puppy->intensity->getValue() == $i->getValue()) selected @endif>{{$i->getValue()}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <label for="listing-pied" class="col-sm-2 col-form-label text-right">PIED</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-pied" id="listing-pied" required autofocus>
                                @if($puppy->pied == null)
                                    <option value="none" selected>None</option>
                                    @foreach($pied as $p)
                                        <option value="{{$p->getValue()}}">{{$p->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($pied as $p)
                                        <option value="{{$p->getValue()}}" @if($puppy->pied->getValue() == $p->getValue()) selected @endif>{{$p->getValue()}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="listing-brindle" class="col-sm-2 col-form-label text-right">BRINDLE</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-brindle" id="listing-brindle" required autofocus>
                                @if($puppy->brindle == null)
                                    <option value="none" selected>None</option>
                                    @foreach($brindle as $br)
                                        <option value="{{$br->getValue()}}">{{$br->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($brindle as $br)
                                        <option value="{{$br->getValue()}}" @if($puppy->brindle->getValue() == $br->getValue()) selected @endif>{{$br->getValue()}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <label for="listing-merle" class="col-sm-2 col-form-label text-right">MERLE</label>
                        <div class="col-md-3">
                            <select class="form-control" name="listing-merle" id="listing-merle" required autofocus>
                                @if($puppy->merle == null)
                                    <option value="none" selected>None</option>
                                    @foreach($merle as $m)
                                        <option value="{{$m->getValue()}}">{{$m->getValue()}}</option>
                                    @endforeach
                                @else
                                    <option value="none">None</option>
                                    @foreach($merle as $m)
                                        <option value="{{$m->getValue()}}" @if($puppy->merle->getValue() == $m->getValue()) selected @endif>{{$m->getValue()}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                        <div class="row my-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class=" btn btn-primary btn-fbd px-5">Update Listing</button>
                            </div>
                        </div>
                </form>
                    @else
                    <form method="post" action="{{route('createListing')}}" enctype="multipart/form-data" id="create-listing-form mx-5">
                        @csrf
                        <input type="hidden" name="type" value="puppy"  class="form-control" id="listing Title" placeholder="">
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
                            <label for="listing-sex" class="col-sm-2 col-form-label text-right">Sex</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="listing-sex" id="listing-sex" required autofocus>
                                        <option value="male" >Male</option>
                                        <option value="female">Female</option>
                                </select>
                            </div>
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right" >Date of Birth</label>
                            <div class="col-sm-3">
                                <input type="date" name="dob" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-dob" class="col-sm-2 col-form-label text-right">Sponsored</label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="sponsored" class="form-control" autofocus style="width: 20px;">
                            </div>
                        </div>
                        <h5 class="text-center my-4">DNA COLOR/COAT CHARACTERISTICS</h5>
                        <div class="row my-3">
                            <label for="listing-blue" class="col-sm-2 col-form-label text-right">Blue</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-blue" id="listing-blue" required autofocus>
                                        <option value="none" selected>None</option>
                                        @foreach($blue as $b)
                                            <option value="{{$b->getValue()}}" >{{$b->getValue()}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <label for="listing-choclote" class="col-sm-2 col-form-label text-right">Chocolate</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-choclote" id="listing-choclote" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($chocolate as $c)
                                        <option value="{{$c->getValue()}}" >{{$c->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-agouti" class="col-sm-2 col-form-label text-right">Agouti</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-agoutie" id="listing-agouti" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($agouti as $a)
                                        <option value="{{$a->getValue()}}" >{{$a->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="listing-testable-chocolate" class="col-sm-2 col-form-label text-right">Testable</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-testable" id="listing-testable" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($testableChocolate as $t)
                                        <option value="{{$t->getValue()}}" >{{$t->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-fluffy" class="col-sm-2 col-form-label text-right">Fluffy</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-fluffy" id="listing-fluffy" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($fluffy as $f)
                                        <option value="{{$f->getValue()}}" >{{$f->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="listing-emcir" class="col-sm-2 col-form-label text-right">E(MCIR)</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-emcir" id="listing-emcir" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($emcir as $e)
                                        <option value="{{$e->getValue()}}" >{{$e->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-intensity" class="col-sm-2 col-form-label text-right">Intensity</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-intensity" id="listing-intensity" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($intensity as $i)
                                        <option value="{{$i->getValue()}}" >{{$i->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="listing-pied" class="col-sm-2 col-form-label text-right">PIED</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-pied" id="listing-pied" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($pied as $p)
                                        <option value="{{$p->getValue()}}" >{{$p->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="listing-brindle" class="col-sm-2 col-form-label text-right">BRINDLE</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-brindle" id="listing-brindle" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($brindle as $br)
                                        <option value="{{$br->getValue()}}" >{{$br->getValue()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="listing-merle" class="col-sm-2 col-form-label text-right">MERLE</label>
                            <div class="col-md-3">
                                <select class="form-control" name="listing-merle" id="listing-merle" required autofocus>
                                    <option value="none" selected>None</option>
                                    @foreach($merle as $m)
                                        <option value="{{$m->getValue()}}" >{{$m->getValue()}}</option>
                                    @endforeach
                                </select>
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
