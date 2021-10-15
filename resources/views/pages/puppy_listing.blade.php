@extends('./layouts.app')
@section('title', 'Puppies')
@section('content')
    @if(session('code') == '300')
    <x-registered-success></x-registered-success>
    @endif
    {{--Homepage Banner Section--}}
    <div class="wrapper gf-resources-banner-wrapper d-flex justify-content-center">
        <div class="container row align-items-center">
            <div class="gf-resources-banner-text col-md-6">
                <h1>
                    <span style="color:#be202e;">Friendly Puppy</span><br>
                    For Frenchie Lovers</h1>
            </div>
            <div class="col-md-6 text-center">
                <img src="/images/frenchie-reading-book.png" loading="lazy" width="800" height="431" alt="">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="page-content d-lg-flex align-items-start">
            {{--Filter area--}}
            <div class="fbd-filter-area p-0 pb-1 mb-3 col-xl-2 col-lg-3">
                <div id="accordion">
                    <!-- Your Search -->
{{--                    @if($data != null)--}}
{{--                        <div class="card p-3 mb-4 rounded">--}}
{{--                            <div class="card-header p-0 border-0 d-flex flex-wrap align-items-center justify-content-between" id="filterLocation">--}}
{{--                                <span class="heading mb-0">Your Search</span>--}}
{{--                                <span class="results-number" title="Total Results"> Results</span>--}}
{{--                            </div>--}}
{{--                            <div id="collapseSearch" class="collapse mt-3 show" aria-labelledby="filterLocation" data-parent="">--}}
{{--                                <div class="card-body">--}}
{{--                                    <!-- <button type="button" class="close" aria-label="Close"> Puppies <span aria-hidden="true">&times;</span></button> -->--}}
{{--                                    <ul class="tags-list" id="primary-recent-search">--}}
{{--                                        <li> {{$data['dnaColor']}} <small>{{$data['dnaCoat']}} </small> <span aria-hidden="true" title="close" onclick="cancelRecentSearch('{{$data['dnaColor']}}', '{{$data['dnaCoat']}}')">&times;</span></li>--}}
{{--                                    </ul>--}}
{{--                                    <div id="secondary-recent-search">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @else--}}

{{--                        <div id="secondary-recent-search">--}}

{{--                        </div>--}}
{{--                    @endif--}}
                <!-- Location -->
                    <div class="card p-3 mb-4 rounded">

                        <div class="card-header bg-transparent p-0 border-0" id="filterLocation">
                            <h5 class="mb-0">
                                <button class="btn btn-collapse p-0 d-block text-left " data-toggle="collapse" data-target="#collapseLocation" aria-expanded="true" aria-controls="collapseLocation">
                                    Location
                                </button>
                            </h5>
                        </div>
                        <div id="collapseLocation" class="collapse mt-3 show" aria-labelledby="filterLocation" data-parent="">
                            <div class="card-body">

                                @if(!empty($data))

                                    <select class="form-control form-select filterDistance" name="filterDistance" id="distance" aria-label="Default select example">
                                        <option value="10" {{$data['distance'] === '10' ? 'selected' : ''}}>10 Miles </option>
                                        <option value="25" {{$data['distance'] === '25' ? 'selected' : ''}}>25 Miles </option>
                                        <option value="50" {{$data['distance'] === '50' ? 'selected' : ''}}>50 Miles </option>
                                        <option value="75" {{$data['distance'] === '75' ? 'selected' : ''}}>75 Miles </option>
                                        <option value="100" {{$data['distance'] === '100' ? 'selected' : ''}}>100 Miles </option>
                                        <option value="200" {{$data['distance'] === '200' ? 'selected' : ''}}>200 Miles </option>
                                        <option value="300" {{$data['distance'] === '300' ? 'selected' : ''}}>300 Miles </option>
                                        <option value="400" {{$data['distance'] === '400' ? 'selected' : ''}}>400 Miles </option>
                                        <option value="500" {{$data['distance'] === '500' ? 'selected' : ''}}>500 Miles </option>
                                        <option value="10" selected>Any Distance</option>
                                    </select>
                                    <input type="zip" style="background-color: hsla(34, 82%, 78%, 0.2);;" class="form-control" value="{{$data['zip']}}" name="zipSection" id="zipSection" aria-describedby="zipHelp" placeholder="Zip Code">
                                    <button type="submit" class="btn btn-primary btn-sm  btn-fbd">Search</button>
                                @else
                                    <select class="form-control form-select filterDistance" name="filterDistance" id="distance" aria-label="Default select example">
                                        <option value="10">10 Miles </option>
                                        <option value="25">25 Miles </option>
                                        <option value="50">50 Miles </option>
                                        <option value="75">75 Miles </option>
                                        <option value="100">100 Miles </option>
                                        <option value="200">200 Miles </option>
                                        <option value="300">300 Miles </option>
                                        <option value="400">400 Miles </option>
                                        <option value="500">500 Miles </option>
                                        <option selected value="10">Any Distance</option>
                                    </select>
                                    <input type="zip" style="background-color:transparent;" class="form-control" name="zipSectionSecond" id="zipSectionSecond" aria-describedby="zipHelp" placeholder="Zip Code">
                                    <button type="submit" class="gf-btn-dark" onClick="searchByZipDistance()" style="margin-top: 18px;"><i class="far fa-compass"></i> Search</button>
                                @endif


                            </div>
                        </div>
                    </div>

                    <!-- DNA Colors -->
                    <div class="card border-top p-3 rounded">
                        <div class="card-header bg-transparent p-0 border-0 " id="filterA">
                            <h5 class="mb-0">
                                <button class="btn btn-collapse p-0 d-block collapsed text-left" data-toggle="collapse" data-target="#collapseA" aria-expanded="false" aria-controls="collapseA">
                                    DNA Colors
                                </button>
                            </h5>
                        </div>
                        <div id="collapseA" class="collapse mt-3" aria-labelledby="filterA" data-parent="">
                            <div class="card-body">
                                @csrf
                                @if(!empty($data) && count($data['allListings']) > 0)
                                    {{-- Blue --}}
                                    <form>
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseBlue' class="{{ $data['dnaColor'] === 'Blue' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Blue' ? 'checked':''}} id="filterBlue" name="Parentfilter" value="blue">
                                        <label for="filterBlue"> Blue</label><br>
                                        <div id="collapseBlue" class="collapse pl-4 {{ $data['dnaColor'] === 'Blue' ? 'show':''}}">
                                            <input type="checkbox" id="filterABlue2copy" name="blue" onchange="(findValue())" value="2copies(d/d)" {{ $data['dnaCoat'] === '2copies(d/d)' ? 'checked': ''}}>
                                            <label for="filterABlue2copy"> 2 copies(d/d) </label><br>
                                            <input type="checkbox" id="filterABlue1copy" name="blue" onchange="(findValue())" value="1copy(D/d)" {{ $data['dnaCoat'] === '1copy(D/d)' ? 'checked': ''}}>
                                            <label for="filterABlue1copy"> 1 copy(D/d) </label><br>
                                            <input type="checkbox" id="filterABlueDd" name="blue" onchange="(findValue())" value="doesnotcarry" {{ ($data['dnaCoat'] === 'doesnotcarry' && $data['dnaColor'] === 'Blue') ? 'checked': ''}}>
                                            <label for="filterABlueDd"> Does not carry </label><br>
                                            <input type="checkbox" id="filterABlueUnknown" name="blue" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Blue') ? 'checked': ''}}>
                                            <label for="filterABlueUnknown"> Unknown </label><br>
                                        </div>
                                        {{-- Chocolate --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseChocolate' class="{{ $data['dnaColor'] === 'Chocolate' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Chocolate' ? 'checked':''}} id="filterChocolate" name="Parentfilter" value="chocolate">
                                        <label for="filterChocolate"> Cocoa</label><br>
                                        <div id="collapseChocolate" class="collapse pl-4 {{ $data['dnaColor'] === 'Chocolate' ? 'show':''}}">
                                            <input type="checkbox" id="chocolate2copy" name="chocolate" onchange="(findValue())" value="2copies(co/co)" {{ $data['dnaCoat'] === '2copies(co/co)' ? 'checked': ''}}>
                                            <label for="chocolate2copy"> 2 copies(co/co) </label><br>
                                            <input type="checkbox" id="chocolate1copy" name="chocolate" onchange="(findValue())" value="1copy(Co/co)" {{ $data['dnaCoat'] === '1copy(Co/co)' ? 'checked': ''}}>
                                            <label for="chocolate1copy"> 1 copy(Co/co) </label><br>
                                            <input type="checkbox" id="chocolateDd" name="chocolate" onchange="(findValue())" value="doesnotcarry" {{ ($data['dnaCoat'] === 'doesnotcarry' && $data['dnaColor'] === 'Chocolate')  ? 'checked': ''}}>
                                            <label for="chocolateDd"> Does not carry </label><br>
                                            <input type="checkbox" id="chocolateUnknown" name="chocolate" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Chocolate') ? 'checked': ''}}>
                                            <label for="chocolateUnknown"> Unknown </label><br>
                                        </div>

                                        {{-- Testable Chocolate --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseTestable' class="{{ $data['dnaColor'] === 'Testable_Chocolate' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Testable_Chocolate' ? 'checked':''}} id="filterTestable" name="Parentfilter" value="testable">
                                        <label for="filterTestable"> Testable Chocolate/Rojo</label><br>
                                        <div id="collapseTestable" class="collapse pl-4 {{ $data['dnaColor'] === 'Testable_Chocolate' ? 'show':''}}">
                                            <input type="checkbox" id="filterTestableChocolate2copy" name="testable" onchange="(findValue())" value="2copies(b/b)" {{ $data['dnaCoat'] === '2copies(b/b)' ? 'checked': ''}}>
                                            <label for="filterTestableChocolate2copy"> 2 copies(b/b) </label><br>
                                            <input type="checkbox" id="filterTestableChocolate1copy" name="testable" onchange="(findValue())" value="1copy(B/b)" {{ $data['dnaCoat'] === '1copy(B/b)' ? 'checked': ''}}>
                                            <label for="filterTestableChocolate1copy"> 1 copy(B/b) </label><br>
                                            <input type="checkbox" id="filterTestableChocolateDd" name="testable" onchange="(findValue())" value="doesnotcarry" {{ ($data['dnaCoat'] === 'doesnotcarry' && $data['dnaColor'] === 'Testable_Chocolate')  ? 'checked': ''}}>
                                            <label for="filterTestableChocolateDd"> Does not carry </label><br>
                                            <input type="checkbox" id="filterTestableChocolateUnknown" name="testable" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Testable_Chocolate') ? 'checked': ''}}>
                                            <label for="filterTestableChocolateUnknown"> Unknown </label><br>
                                        </div>

                                        {{-- Fluffy --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseFluffy' class="{{ $data['dnaColor'] === 'Fluffy' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Fluffy' ? 'checked':''}} id="filterFluffy" name="Parentfilter" value="fluffy">
                                        <label for="filterFluffy"> Fluffy</label><br>
                                        <div id="collapseFluffy" class="collapse pl-4 {{ $data['dnaColor'] === 'Fluffy' ? 'show':''}}">
                                            <input type="checkbox" id="filterAfluffy2copy" name="fluffy" onchange="(findValue())" value="2copies(l/l)" {{ $data['dnaCoat'] === '2copies(l/l)' ? 'checked': ''}}>
                                            <label for="filterAfluffy2copy"> 2 copies(l/l) </label><br>
                                            <input type="checkbox" id="filterAfluffy1copy" name="fluffy" onchange="(findValue())" value="1copy(L/l)" {{ $data['dnaCoat'] === '1copy(L/l)' ? 'checked': ''}}>
                                            <label for="filterAfluffy1copy"> 1 copy(L/l) </label><br>
                                            <input type="checkbox" id="filterAfluffyDd" name="fluffy" onchange="(findValue())" value="doesnotcarry" {{ ($data['dnaCoat'] === 'doesnotcarry' && $data['dnaColor'] === 'Fluffy') ? 'checked': ''}}>
                                            <label for="filterAfluffyDd"> Does not carry </label><br>
                                            <input type="checkbox" id="filterAfluffyUnknown" name="fluffy" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Fluffy') ? 'checked': ''}}>
                                            <label for="filterAfluffyUnknown"> Unknown </label><br>
                                        </div>

                                        {{-- Intensity --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseIntensity' class="{{ $data['dnaColor'] === 'Intensity' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Intensity' ? 'checked':''}} id="filterIntensity" name="Parentfilter" value="intensity">
                                        <label for="filterIntensity"> Intensity</label><br>
                                        <div id="collapseIntensity" class="collapse pl-4 {{ $data['dnaColor'] === 'Intensity' ? 'show':''}}">
                                            <input type="checkbox" id="filterAintensity2copy" name="intensity" onchange="(findValue())" value="2copies(i/i)" {{ $data['dnaCoat'] === '2copies(i/i)' ? 'checked': ''}}>
                                            <label for="filterAintensity2copy"> 2 copies(i/i) </label><br>
                                            <input type="checkbox" id="filterAintensity1copy" name="intensity" onchange="(findValue())" value="1copy(I/i)" {{ $data['dnaCoat'] === '1copy(I/i)' ? 'checked': ''}}>
                                            <label for="filterAintensity1copy"> 1 copy(I/i) </label><br>
                                            <input type="checkbox" id="filterAintensityDd" name="intensity" onchange="(findValue())" value="doesnotcarry" {{ ($data['dnaCoat'] === 'doesnotcarry' && $data['dnaColor'] === 'Intensity') ? 'checked': ''}}>
                                            <label for="filterAintensityDd"> Does not carry </label><br>
                                            <input type="checkbox" id="filterAintensityUnknown" name="intensity" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Intensity') ? 'checked': ''}}>
                                            <label for="filterAintensityUnknown"> Unknown </label><br>
                                        </div>

                                        {{-- Pied --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapsePied' class="{{ $data['dnaColor'] === 'Pied' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Pied' ? 'checked':''}} id="filterPied" name="Parentfilter" value="pied">
                                        <label for="filterPied"> Pied</label><br>
                                        <div id="collapsePied" class="collapse pl-4 {{ $data['dnaColor'] === 'Pied' ? 'show':''}}">
                                            <input type="checkbox" id="filterApied2copy" name="pied" onchange="(findValue())" value="2copies(s/s)" {{ $data['dnaCoat'] === '2copies(s/s)' ? 'checked': ''}}>
                                            <label for="filterApied2copy"> 2 copies(s/s) </label><br>
                                            <input type="checkbox" id="filterApied1copy" name="pied" onchange="(findValue())" value="1copy(s/N)" {{ $data['dnaCoat'] === '1copy(s/N)' ? 'checked': ''}}>
                                            <label for="filterApied1copy"> 1 copy(s/N) </label><br>
                                            <input type="checkbox" id="filterApiedDd" name="pied" onchange="(findValue())" value="doesnotcarry" {{ ($data['dnaCoat'] === 'doesnotcarry' && $data['dnaColor'] === 'Pied') ? 'checked': ''}}>
                                            <label for="filterApiedDd"> Does not carry </label><br>
                                            <input type="checkbox" id="filterApiedUnknown" name="pied" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Pied') ? 'checked': ''}}>
                                            <label for="filterApiedUnknown"> Unknown </label><br>
                                        </div>

                                        {{-- Merle --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseMerle' class="{{ $data['dnaColor'] === 'Merle' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Merle' ? 'checked':''}} id="filterMerle" name="Parentfilter" value="merle">
                                        <label for="filterMerle"> Merle</label><br>
                                        <div id="collapseMerle" class="collapse pl-4 {{ $data['dnaColor'] === 'Merle' ? 'show':''}}">
                                            <input type="checkbox" id="filterMerleYes" name="merle" onchange="(findValue())" value="yes" {{ ($data['dnaCoat'] === 'yes' && $data['dnaColor'] === 'Merle') ? 'checked': ''}}>
                                            <label for="filterMerleYes"> Yes </label><br>
                                            <input type="checkbox" id="filterMerleNo" name="merle" onchange="(findValue())" value="no" {{ ($data['dnaCoat'] === 'no' && $data['dnaColor'] === 'Merle') ? 'checked': ''}}>
                                            <label for="filterMerleNo"> No </label><br>
                                            <input type="checkbox" id="filterMerleUnknown" name="merle" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Merle') ? 'checked': ''}}>
                                            <label for="filterMerleUnknown"> Unknown </label><br>
                                        </div>

                                        {{-- Brindle --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseBrindle' class="{{ $data['dnaColor'] === 'Brindle' ? '':'collapsed'}}" {{ $data['dnaColor'] === 'Brindle' ? 'checked':''}} id="filterBrindle" name="Parentfilter" value="brindle">
                                        <label for="filterBrindle"> Brindle</label><br>
                                        <div id="collapseBrindle" class="collapse pl-4 {{ $data['dnaColor'] === 'Brindle' ? 'show':''}}">
                                            <input type="checkbox" id="filterBrindleYes" name="brindle" onchange="(findValue())" value="yes" {{ ($data['dnaCoat'] === 'yes' && $data['dnaColor'] === 'Brindle') ? 'checked': ''}}>
                                            <label for="filterBrindleYes"> Yes </label><br>
                                            <input type="checkbox" id="filterBrindleNo" name="brindle" onchange="(findValue())" value="no" {{ ($data['dnaCoat'] === 'no' && $data['dnaColor'] === 'Brindle') ? 'checked': ''}}>
                                            <label for="filterBrindleNo"> No </label><br>
                                            <input type="checkbox" id="filterBrindleUnknown" name="brindle" onchange="(findValue())" value="unknown" {{ ($data['dnaCoat'] === 'unknown' && $data['dnaColor'] === 'Brindle') ? 'checked': ''}}>
                                            <label for="filterBrindleUnknown"> Unknown </label><br>
                                        </div>

                                        {{-- Agouti --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseAgouti' id="filterAgouti" name="Parentfilter" value="agouti" checked>
                                        <label for="filterAgouti"> Agouti</label><br>
                                        <div id="collapseAgouti" class="collapse pl-4 show">
                                            <input type="checkbox" id="filterAgoutiAa" name="agouti" onchange="(findValue())" value="(a,a)" checked>
                                            <label for="filterAgoutiAa"> (a, a) </label><br>
                                            <input type="checkbox" id="filterAgoutiAya" name="agouti" onchange="(findValue())" value="(ay,a)" checked>
                                            <label for="filterAgoutiAya"> (ay, a) </label><br>
                                            <input type="checkbox" id="filterAgoutiAyat" name="agouti" onchange="(findValue())" value="(ay,at)" checked>
                                            <label for="filterAgoutiAyat"> (ay, at) </label><br>
                                            <input type="checkbox" id="filterAgoutiAyay" name="agouti" onchange="(findValue())" value="(ay,ay)" checked>
                                            <label for="filterAgoutiAyay"> (ay/ay) </label><br>
                                            <input type="checkbox" id="filterAgoutiAta" name="agouti" onchange="(findValue())" value="(at,a)" checked>
                                            <label for="filterAgoutiAta"> (at, a) </label><br>
                                            <input type="checkbox" id="filterAgoutiAtat" name="agouti" onchange="(findValue())" value="(at,at)" checked>
                                            <label for="filterAgoutiAtat"> (at, at) </label><br>
                                        </div>

                                        {{-- E(MCIR) --}}
                                        <input type="checkbox" data-toggle='collapse' data-target='#collapseEmcir' id="filterEmcir" name="Parentfilter" value="emcir" checked>
                                        <label for="filterEmcir"> E(MCIR)</label><br>
                                        <div id="collapseEmcir" class="collapse pl-4 show">
                                            <input type="checkbox" id="filterEmcirEmem" name="emcir" onchange="(findValue())" value="(Em,Em)" checked>
                                            <label for="filterEmcirEmem"> (Em, Em) </label><br>
                                            <input type="checkbox" id="filterEmcirEmE" name="emcir" onchange="(findValue())" value="(Em,E)" checked>
                                            <label for="filterEmcirEmE"> (Em, E) </label><br>
                                            <input type="checkbox" id="filterEmcirEme" name="emcir" onchange="(findValue())" value="(Em,e)" checked>
                                            <label for="filterEmcirEme"> (Em, e) </label><br>
                                            <input type="checkbox" id="filterEmcirEE" name="emcir" onchange="(findValue())" value="(E,E)" checked>
                                            <label for="filterEmcirEE"> (E, E) </label><br>
                                            <input type="checkbox" id="filterEmcirEe" name="emcir" onchange="(findValue())" value="(E,e)" checked>
                                            <label for="filterEmcirEe"> (E, e) </label><br>
                                            <input type="checkbox" id="filterEmciree" name="emcir" onchange="(findValue())" value="(e,e)" checked>
                                            <label for="filterEmciree"> (e, e) </label><br>
                                        </div>
                                    </form>
                                @else
                                    {{-- Blue --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseBlue' id="filterBlue" name="Parentfilter" value="blue" checked>
                                    <label for="filterBlue"> Blue</label><br>
                                    <div id="collapseBlue" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterABlue2copy" name="blue" onchange="(findValue())" value="2copies(d/d)" checked>
                                        <label for="filterABlue2copy"> 2 copies(d/d) </label><br>
                                        <input type="checkbox" id="filterABlue1copy" name="blue" onchange="(findValue())" value="1copy(D/d)" checked>
                                        <label for="filterABlue1copy"> 1 copy(D/d) </label><br>
                                        <input type="checkbox" id="filterABlueDd" name="blue" onchange="(findValue())" value="doesnotcarry" checked>
                                        <label for="filterABlueDd"> Does not carry </label><br>
                                        <input type="checkbox" id="filterABlueUnknown" name="blue" onchange="(findValue())" value="unknown" checked>
                                        <label for="filterABlueUnknown"> Unknown </label><br>
                                    </div>
                                    {{-- Chocolate --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseChocolate' id="filterChocolate" name="Parentfilter" value="chocolate" checked>
                                    <label for="filterChocolate"> Cocoa</label><br>
                                    <div id="collapseChocolate" class="collapse pl-4 show">
                                        <input type="checkbox" id="chocolate2copy" name="chocolate" onchange="(findValue())" value="2copies(co/co)" checked>
                                        <label for="chocolate2copy"> 2 copies(co/co) </label><br>
                                        <input type="checkbox" id="chocolate1copy" name="chocolate" onchange="(findValue())" value="1copy(Co/co)" checked>
                                        <label for="chocolate1copy"> 1 copy(Co/co) </label><br>
                                        <input type="checkbox" id="chocolateDd" name="chocolate" onchange="(findValue())" value="doesnotcarry" checked>
                                        <label for="chocolateDd"> Does not carry </label><br>
                                        <input type="checkbox" id="chocolateUnknown" name="chocolate" onchange="(findValue())" value="unknown" checked>
                                        <label for="chocolateUnknown"> Unknown </label><br>
                                    </div>

                                    {{-- Testable Chocolate --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseTestable' id="filterTestable" name="Parentfilter" value="testable" checked>
                                    <label for="filterTestable"> Testable Chocolate/Rojo</label><br>
                                    <div id="collapseTestable" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterTestableChocolate2copy" name="testable" onchange="(findValue())" value="2copies(b/b)" checked>
                                        <label for="filterTestableChocolate2copy"> 2 copies(b/b) </label><br>
                                        <input type="checkbox" id="filterTestableChocolate1copy" name="testable" onchange="(findValue())" value="1copy(B/b)" checked>
                                        <label for="filterTestableChocolate1copy"> 1 copy(B/b) </label><br>
                                        <input type="checkbox" id="filterTestableChocolateDd" name="testable" onchange="(findValue())" value="doesnotcarry" checked>
                                        <label for="filterTestableChocolateDd"> Does not carry </label><br>
                                        <input type="checkbox" id="filterTestableChocolateUnknown" name="testable" onchange="(findValue())" value="unknown" checked>
                                        <label for="filterTestableChocolateUnknown"> Unknown </label><br>
                                    </div>

                                    {{-- Fluffy --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseFluffy' id="filterFluffy" name="Parentfilter" value="fluffy" checked>
                                    <label for="filterFluffy"> Fluffy</label><br>
                                    <div id="collapseFluffy" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterAfluffy2copy" name="fluffy" onchange="(findValue())" value="2copies(l/l)" checked>
                                        <label for="filterAfluffy2copy"> 2 copies </label><br>
                                        <input type="checkbox" id="filterAfluffy1copy" name="fluffy" onchange="(findValue())" value="1copy(L/l)" checked>
                                        <label for="filterAfluffy1copy"> 1 copy </label><br>
                                        <input type="checkbox" id="filterAfluffyDd" name="fluffy" onchange="(findValue())" value="doesnotcarry" checked>
                                        <label for="filterAfluffyDd"> Does not carry </label><br>
                                        <input type="checkbox" id="filterAfluffyUnknown" name="fluffy" onchange="(findValue())" value="unknown" checked>
                                        <label for="filterAfluffyUnknown"> Unknown </label><br>
                                    </div>

                                    {{-- Intensity --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseIntensity' id="filterIntensity" name="Parentfilter" value="intensity" checked>
                                    <label for="filterIntensity"> Intensity</label><br>
                                    <div id="collapseIntensity" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterAintensity2copy" name="intensity" onchange="(findValue())" value="2copies(i/i)" checked>
                                        <label for="filterAintensity2copy"> 2 copies(i/i) </label><br>
                                        <input type="checkbox" id="filterAintensity1copy" name="intensity" onchange="(findValue())" value="1copy(I/i)" checked>
                                        <label for="filterAintensity1copy"> 1 copy(I/i) </label><br>
                                        <input type="checkbox" id="filterAintensityDd" name="intensity" onchange="(findValue())" value="doesnotcarry" checked>
                                        <label for="filterAintensityDd"> Does not carry </label><br>
                                        <input type="checkbox" id="filterAintensityUnknown" name="intensity" onchange="(findValue())" value="unknown" checked>
                                        <label for="filterAintensityUnknown"> Unknown </label><br>
                                    </div>

                                    {{-- Pied --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapsePied' id="filterPied" name="Parentfilter" value="pied" checked>
                                    <label for="filterPied"> Pied</label><br>
                                    <div id="collapsePied" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterApied2copy" name="pied" onchange="(findValue())" value="2copies(s/s)" checked>
                                        <label for="filterApied2copy"> 2 copies(s/s) </label><br>
                                        <input type="checkbox" id="filterApied1copy" name="pied" onchange="(findValue())" value="1copy(s/N)" checked>
                                        <label for="filterApied1copy"> 1 copy(S/s) </label><br>
                                        <input type="checkbox" id="filterApiedDd" name="pied" onchange="(findValue())" value="doesnotcarry" checked>
                                        <label for="filterApiedDd"> Does not carry </label><br>
                                        <input type="checkbox" id="filterApiedUnknown" name="pied" onchange="(findValue())" value="unknown" checked>
                                        <label for="filterApiedUnknown"> Unknown </label><br>
                                    </div>

                                    {{-- Merle --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseMerle' id="filterMerle" name="Parentfilter" value="merle" checked>
                                    <label for="filterMerle"> Merle</label><br>
                                    <div id="collapseMerle" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterMerleYes" name="merle" onchange="(findValue())" value="yes" checked>
                                        <label for="filterMerleYes"> Yes </label><br>
                                        <input type="checkbox" id="filterMerleNo" name="merle" onchange="(findValue())" value="no" checked>
                                        <label for="filterMerleNo"> No </label><br>
                                        <input type="checkbox" id="filterMerleUnknown" name="merle" onchange="(findValue())" value="unknown" checked>
                                        <label for="filterMerleUnknown"> Unknown </label><br>
                                    </div>

                                    {{-- Brindle --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseBrindle' id="filterBrindle" name="Parentfilter" value="brindle" checked>
                                    <label for="filterBrindle"> Brindle</label><br>
                                    <div id="collapseBrindle" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterBrindleYes" name="brindle" onchange="(findValue())" value="yes" checked>
                                        <label for="filterBrindleYes"> Yes </label><br>
                                        <input type="checkbox" id="filterBrindleNo" name="brindle" onchange="(findValue())" value="no" checked>
                                        <label for="filterBrindleNo"> No </label><br>
                                        <input type="checkbox" id="filterBrindleUnknown" name="brindle" onchange="(findValue())" value="unknown" checked>
                                        <label for="filterBrindleUnknown"> Unknown </label><br>
                                    </div>

                                    {{-- Agouti --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseAgouti' id="filterAgouti" name="Parentfilter" value="agouti" checked>
                                    <label for="filterAgouti"> Agouti</label><br>
                                    <div id="collapseAgouti" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterAgoutiAa" name="agouti" onchange="(findValue())" value="(a,a)" checked>
                                        <label for="filterAgoutiAa"> (a, a) </label><br>
                                        <input type="checkbox" id="filterAgoutiAya" name="agouti" onchange="(findValue())" value="(ay,a)" checked>
                                        <label for="filterAgoutiAya"> (ay, a) </label><br>
                                        <input type="checkbox" id="filterAgoutiAyat" name="agouti" onchange="(findValue())" value="(ay,at)" checked>
                                        <label for="filterAgoutiAyat"> (ay, at) </label><br>
                                        <input type="checkbox" id="filterAgoutiAyay" name="agouti" onchange="(findValue())" value="(ay,ay)" checked>
                                        <label for="filterAgoutiAyay"> (ay/ay) </label><br>
                                        <input type="checkbox" id="filterAgoutiAta" name="agouti" onchange="(findValue())" value="(at,a)" checked>
                                        <label for="filterAgoutiAta"> (at, a) </label><br>
                                        <input type="checkbox" id="filterAgoutiAtat" name="agouti" onchange="(findValue())" value="(at,at)" checked>
                                        <label for="filterAgoutiAtat"> (at, at) </label><br>
                                    </div>

                                    {{-- E(MCIR) --}}
                                    <input type="checkbox" data-toggle='collapse' data-target='#collapseEmcir' id="filterEmcir" name="Parentfilter" value="emcir" checked>
                                    <label for="filterEmcir"> E(MCIR)</label><br>
                                    <div id="collapseEmcir" class="collapse pl-4 show">
                                        <input type="checkbox" id="filterEmcirEmem" name="emcir" onchange="(findValue())" value="(Em,Em)" checked>
                                        <label for="filterEmcirEmem"> (Em, Em) </label><br>
                                        <input type="checkbox" id="filterEmcirEmE" name="emcir" onchange="(findValue())" value="(Em,E)" checked>
                                        <label for="filterEmcirEmE"> (Em, E) </label><br>
                                        <input type="checkbox" id="filterEmcirEme" name="emcir" onchange="(findValue())" value="(Em,e)" checked>
                                        <label for="filterEmcirEme"> (Em, e) </label><br>
                                        <input type="checkbox" id="filterEmcirEE" name="emcir" onchange="(findValue())" value="(E,E)" checked>
                                        <label for="filterEmcirEE"> (E, E) </label><br>
                                        <input type="checkbox" id="filterEmcirEe" name="emcir" onchange="(findValue())" value="(E,e)" checked>
                                        <label for="filterEmcirEe"> (E, e) </label><br>
                                        <input type="checkbox" id="filterEmciree" name="emcir" onchange="(findValue())" value="(e,e)" checked>
                                        <label for="filterEmciree"> (e, e) </label><br>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--End Filter area--}}

            <div class="fbd-content-area mb-3 col-xl-8 col-lg-9">

                <div id="primary-listing-data" class="fbd-listing-area">

                    <p class="listing-count">Showing <b>{{count($sponsoredPuppies)}}</b> listings</p>
                    <h3 class="listing-type">SPONSORED LISTINGS</h3>
                    @if(empty($sponsoredPuppies))
                        <div class="fbd-standard-listing p-3">
                            <div class="fbd-standard-card rounded row p-3">
                                <p class="text-center">No Sponsored Listings</p>
                            </div>
                        </div>
                    @else
                        @foreach($sponsoredPuppies as $key=>$sponsoredPuppy)

                            <div  class="fbd-sponsured-listings py-3">
                                <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                    <div class="col-lg-3 p-0 m-auto">
                                        <div class="fbd-sp-listing-img">
                                            @if($sponsoredPuppy->photo1)<img src="{{ asset_file_url($sponsoredPuppy->photo1)}}" width="250" height="250" alt="">@endif
                                            @if($sponsoredPuppy->photo2)<img src="{{ asset_file_url($sponsoredPuppy->photo2)}}" width="250" height="250" alt="">@endif
                                            @if($sponsoredPuppy->photo3)<img src="{{ asset_file_url($sponsoredPuppy->photo3)}}" width="250" height="250" alt="">@endif
                                            @if($sponsoredPuppy->photo4)<img src="{{ asset_file_url($sponsoredPuppy->photo4)}}" width="250" height="250" alt="">@endif
                                            @if($sponsoredPuppy->photo5)<img src="{{ asset_file_url($sponsoredPuppy->photo5)}}" width="250" height="250" alt="">@endif
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                        <div onclick="singlePuppy('{{$sponsoredPuppy->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                            <h4 class="fbd-sp-list-title d-inline">{{$sponsoredPuppy->title}}</h4>
                                            <p>{{$sponsoredPuppy->description->asString()}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$sponsoredPuppy->breeder->phone}}</span>
                                            </div>
                                            <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$sponsoredPuppy->dob->getTimestamp())}}</span>
                                            </div>
                                            <div class="col-xl-3 pl-0">
                                                <i class="fa fa-venus-mars"></i>
                                                <span>{{$sponsoredPuppy->sex->getValue()}}</span>
                                            </div>
                                            {{--                                        </div>--}}
                                            {{--                                        <div class="fbd-sp-list-kennel row">--}}
                                            <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">
                                                <i class="fa fa-envelope"></i>
                                                <span>{{$sponsoredPuppy->breeder->email->asString()}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$sponsoredPuppy->breeder->kennelName}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                        <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
                                            <x-like-sponsored slug="{{$sponsoredPuppy->slug}}"></x-like-sponsored>
                                            <a href="{{$sponsoredPuppy->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a href="{{$sponsoredPuppy->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a href="{{$sponsoredPuppy->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                                            <a href="#"><i class="fas fa-share-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif
                    <p class="listing-count">Showing <b>{{count($standardPuppies)}}</b> listings</p>
                    <h3 class="listing-type my-3">STANDARD LISTINGS</h3>

                    @if(empty($standardPuppies))
                        <div class="fbd-standard-listing p-3">
                            <div class="fbd-standard-card rounded row p-3">
                                <p class="text-center">No Standard Listings</p>
                            </div>
                        </div>
                    @else
                        @foreach($standardPuppies as $key=>$standardPuppy)

                            <div  class="fbd-sponsured-listings py-3">
                                <div class="fbd-sponsured-card rounded row align-items-stretch p-lg-0 pb-0">
                                    <div class="col-lg-3 p-0 m-auto">
                                        <div class="fbd-sp-listing-img">
                                            @if($standardPuppy->photo1)<img src="{{ asset_file_url($standardPuppy->photo1)}}" width="250" height="250" alt="">@endif
                                            @if($standardPuppy->photo2)<img src="{{ asset_file_url($standardPuppy->photo2)}}" width="250" height="250" alt="">@endif
                                            @if($standardPuppy->photo3)<img src="{{ asset_file_url($standardPuppy->photo3)}}" width="250" height="250" alt="">@endif
                                            @if($standardPuppy->photo4)<img src="{{ asset_file_url($standardPuppy->photo4)}}" width="250" height="250" alt="">@endif
                                            @if($standardPuppy->photo5)<img src="{{ asset_file_url($standardPuppy->photo5)}}" width="250" height="250" alt="">@endif
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pt-2 d-flex flex-column justify-content-between">



                                        <div onclick="singlePuppy('{{$standardPuppy->slug}}')" style="cursor: pointer;" class="fbd-sp-list-title-description">
                                            <h4 class="fbd-sp-list-title d-inline">{{$standardPuppy->title}}</h4>
                                            <p>{{$standardPuppy->description->asString()}}</p>
                                        </div>
                                        <div class="fbd-sp-list-detail row">
                                            <div class="col-xl-6 pl-0">
                                                <i class="fa fa-phone-alt"></i>
                                                <span>{{$standardPuppy->breeder->phone}}</span>
                                            </div>
                                            <div class="col-xl-3 fbd-sp-list-detail-second pl-0">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{date('Y-m-d',$standardPuppy->dob->getTimestamp())}}</span>
                                            </div>
                                            <div class="col-xl-3 pl-0">
                                                <i class="fa fa-venus-mars"></i>
                                                <span>{{$standardPuppy->sex->getValue()}}</span>
                                            </div>
                                            {{--                                        </div>--}}
                                            {{--                                        <div class="fbd-sp-list-kennel row">--}}
                                            <div class="col-xl-6 fbd-sp-list-kennel-second pl-0">
                                                <i class="fa fa-envelope"></i>
                                                <span>{{$standardPuppy->breeder->email->asString()}}</span>
                                            </div>
                                            <div class="col-xl-6 fbd-sp-list-kennel-first pl-0">
                                                <i class="fa fa-igloo"></i>
                                                <span>{{$standardPuppy->breeder->kennelName}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 gf-listing-card-social-icon p-0">
                                        <div class="fbd-sp-list-social d-flex flex-lg-column py-2">
                                            <x-like-standard slug="{{$standardPuppy->slug}}"></x-like-standard>
                                            <a href="{{$standardPuppy->breeder->fbAccountUrl->asString()}}"><i class="fab fa-facebook-f"></i></a>
                                            <a href="{{$standardPuppy->breeder->igAccountUrl->asString()}}"><i class="fab fa-instagram"></i></a>
                                            <a href="{{$standardPuppy->breeder->website->asString()}}"><i class="fas fa-globe"></i></a>
                                            <a href="#"><i class="fas fa-share-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif

                </div>

                <div id="secondary-listing-data" class="fbd-listing-area rounded">
                </div>

            </div>

            {{--            Adds Area--}}
            <div class="gf-adds-area mb-3 col-xl-2">
                @include('components/adds-area')
            </div>
        </div>
    </div>


{{--Testimonials Slider--}}
@include('components.sections.gf-testimonials')


{{--Contact Section--}}
@include('components.sections.gf-contact-form')

    <script type="text/javascript">
        $(document).ready(function (){
            if($('#success').hasClass("show")){
                $('#success').modal('show');
            }
        });

        function closeSuccessModal(){
            $('#success').modal('hide');
        }


        // To uncheck/check child elements when parent element is unchecked/check
        $("#filterBlue").change(function() {
            if(!this.checked) {
                $("#filterABlue2copy").prop('checked',false);
                $("#filterABlue1copy").prop('checked',false);
                $("#filterABlueDd").prop('checked',false);
                $("#filterABlueUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#filterABlue2copy").prop('checked',true);
                $("#filterABlue1copy").prop('checked',true);
                $("#filterABlueDd").prop('checked',true);
                $("#filterABlueUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterChocolate").change(function() {
            if(!this.checked) {
                $("#chocolate2copy").prop('checked',false);
                $("#chocolate1copy").prop('checked',false);
                $("#chocolateDd").prop('checked',false);
                $("#chocolateUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#chocolate2copy").prop('checked',true);
                $("#chocolate1copy").prop('checked',true);
                $("#chocolateDd").prop('checked',true);
                $("#chocolateUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterTestable").change(function() {
            if(!this.checked) {
                $("#filterTestableChocolate2copy").prop('checked',false);
                $("#filterTestableChocolate1copy").prop('checked',false);
                $("#filterTestableChocolateDd").prop('checked',false);
                $("#filterTestableChocolateUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#filterTestableChocolate2copy").prop('checked',true);
                $("#filterTestableChocolate1copy").prop('checked',true);
                $("#filterTestableChocolateDd").prop('checked',true);
                $("#filterTestableChocolateUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterFluffy").change(function() {
            if(!this.checked) {
                $("#filterAfluffy2copy").prop('checked',false);
                $("#filterAfluffy1copy").prop('checked',false);
                $("#filterAfluffyDd").prop('checked',false);
                $("#filterAfluffyUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#filterAfluffy2copy").prop('checked',true);
                $("#filterAfluffy1copy").prop('checked',true);
                $("#filterAfluffyDd").prop('checked',true);
                $("#filterAfluffyUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterIntensity").change(function() {
            if(!this.checked) {
                $("#filterAintensity2copy").prop('checked',false);
                $("#filterAintensity1copy").prop('checked',false);
                $("#filterAintensityDd").prop('checked',false);
                $("#filterAintensityUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#filterAintensity2copy").prop('checked',true);
                $("#filterAintensity1copy").prop('checked',true);
                $("#filterAintensityDd").prop('checked',true);
                $("#filterAintensityUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterPied").change(function() {
            if(!this.checked) {
                $("#filterApied2copy").prop('checked',false);
                $("#filterApied1copy").prop('checked',false);
                $("#filterApiedDd").prop('checked',false);
                $("#filterApiedUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#filterApied2copy").prop('checked',true);
                $("#filterApied1copy").prop('checked',true);
                $("#filterApiedDd").prop('checked',true);
                $("#filterApiedUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterMerle").change(function() {
            if(!this.checked) {
                $("#filterMerleYes").prop('checked',false);
                $("#filterMerleNo").prop('checked',false);
                $("#filterMerleUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#filterMerleYes").prop('checked',true);
                $("#filterMerleNo").prop('checked',true);
                $("#filterMerleUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterBrindle").change(function() {
            if(!this.checked) {
                $("#filterBrindleYes").prop('checked',false);
                $("#filterBrindleNo").prop('checked',false);
                $("#filterBrindleUnknown").prop('checked',false);
            }
            if(this.checked) {
                $("#filterBrindleYes").prop('checked',true);
                $("#filterBrindleNo").prop('checked',true);
                $("#filterBrindleUnknown").prop('checked',true);
            }
            findValue();
        });

        $("#filterAgouti").change(function() {
            if(!this.checked) {
                $("#filterAgoutiAa").prop('checked',false);
                $("#filterAgoutiAya").prop('checked',false);
                $("#filterAgoutiAyat").prop('checked',false);
                $("#filterAgoutiAyay").prop('checked',false);
                $("#filterAgoutiAta").prop('checked',false);
                $("#filterAgoutiAtat").prop('checked',false);
            }
            if(this.checked) {
                $("#filterAgoutiAa").prop('checked',true);
                $("#filterAgoutiAya").prop('checked',true);
                $("#filterAgoutiAyat").prop('checked',true);
                $("#filterAgoutiAyay").prop('checked',true);
                $("#filterAgoutiAta").prop('checked',true);
                $("#filterAgoutiAtat").prop('checked',true);
            }
            findValueForAgoutiEmcir();
        });

        $("#filterEmcir").change(function() {
            if(!this.checked) {
                $("#filterEmcirEmem").prop('checked',false);
                $("#filterEmcirEmE").prop('checked',false);
                $("#filterEmcirEme").prop('checked',false);
                $("#filterEmcirEE").prop('checked',false);
                $("#filterEmcirEe").prop('checked',false);
                $("#filterEmciree").prop('checked',false);
            }
            if(this.checked) {
                $("#filterEmcirEmem").prop('checked',true);
                $("#filterEmcirEmE").prop('checked',true);
                $("#filterEmcirEme").prop('checked',true);
                $("#filterEmcirEE").prop('checked',true);
                $("#filterEmcirEe").prop('checked',true);
                $("#filterEmciree").prop('checked',true);
            }
            findValueForAgoutiEmcir();
        });

        $('#dnaColor').on('change', function () {
            var dnaColor = $(this).val();
            $.ajax({
                type:'POST',
                url: '{{route('searchDNACoat')}}',
                data: {
                    dnaColor:dnaColor,
                },
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data){
                    console.log(data.success);
                    if(data.success == '200'){
                        console.log("DONE");
                        document.getElementById("optional").style.display = "none";
                        $("#coat").html(data.html);
                    }
                },

            });
        });

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
        function previousSearch(color, coat, zip, type){
            console.log(color, coat, zip,type);
            $.ajax({
                type:'POST',
                url: '{{route('findListings')}}',
                data: {
                    type:type,
                    dnaColor:color,
                    dnaCoat:coat,
                    zip:zip,
                    requestType: 'ajax'
                },
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data){
                    console.log(data.success);
                    document.getElementById("primary-listing-data").style.display = "none";
                    $('#secondary-listing-data').html(data.html);
                },
                progress: function(e) {
                    //make sure we can compute the length
                    if(e.lengthComputable) {
                        //calculate the percentage loaded
                        var pct = (e.loaded / e.total) * 100;

                        //log percentage loaded
                        console.log(pct);
                    }
                    //this usually happens when Content-Length isn't set
                    else {
                        console.warn('Content Length not reported!');
                    }
                }
            });
        }
        function cancelRecentSearch(color,coat){
            console.log("Color:" +color, "DNA:" +coat);

            if (color = 'Blue'){
                $("input[name='blue']:checked").each(function(){
                    if (coat == '1copy(D/d)'){
                        $("#filterABlue1copy").prop('checked',false);
                        findValue();
                        return false;
                    }
                    if(coat == '2copies(d/d)'){
                        $("#filterABlue2copy").prop('checked',false);
                        findValue();
                        return false;
                    } if(coat == 'doesnotcarry'){
                        $("#filterABlueDd").prop('checked',false);
                        findValue();
                        return false;
                    }
                    if(coat == 'unknown'){
                        $("#filterABlueUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                    return false;
                });
            }
            if (color = 'Chocolate'){

                $("input[name='chocolate']:checked").each(function(){
                    if (coat == '2copies(co/co)'){
                        $("#chocolate2copy").prop('checked',false);
                        console.log("DONE");
                        findValue();
                        return false;
                    }
                    if(coat == '1copy(Co/co)'){
                        $("#chocolate1copy").prop('checked',false);
                        console.log("NDONE");
                        findValue();
                        return false;
                    }
                    if(coat == 'doesnotcarry'){
                        $("#chocolateDd").prop('checked',false);
                        findValue();
                        return false;
                    }
                    if(coat == 'unknown'){
                        $("#chocolateUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                });
            }
            if (color = 'Testable'){
                $("input[name='testable']:checked").each(function(){
                    if (coat == '2copies(b/b)'){
                        $("#filterTestableChocolate2copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == '1copy(B/b)'){
                        $("#filterTestableChocolate1copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'doesnotcarry'){
                        $("#filterTestableChocolateDd").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'unknown'){
                        $("#filterTestableChocolateUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                });
            }
            if (color = 'Fluffy'){
                $("input[name='fluffy']:checked").each(function(){
                    if (coat == '2copies(l/l)'){
                        $("#filterAfluffy2copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == '1copy(L/l)'){
                        $("#filterAfluffy1copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'doesnotcarry'){
                        $("#filterAfluffyDd").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'unknown'){
                        $("#filterAfluffyUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                });
            }
            if (color = 'Intensity'){
                $("input[name='intensity']:checked").each(function(){
                    if (coat == '2copies(i/i)'){
                        $("#filterAintensity2copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == '1copy(I/i)'){
                        $("#filterAintensity1copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'doesnotcarry'){
                        $("#filterAintensityDd").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'unknown'){
                        $("#filterAintensityUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                });
            }
            if (color = 'Pied'){
                $("input[name='pied']:checked").each(function(){
                    if (coat == '2copies(s/s)'){
                        $("#filterApied2copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == '1copy(s/N)'){
                        $("#filterApied1copy").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'doesnotcarry'){
                        $("#filterApiedDd").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'unknown'){
                        $("#filterApiedUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                });
            }
            if (color = 'Merle'){
                $("input[name='merle']:checked").each(function(){
                    if (coat == 'yes'){
                        $("#filterMerleYes").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'no'){
                        $("#filterMerleNo").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'unknown'){
                        $("#filterMerleUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                });
            }
            if (color = 'Brindle'){
                $("input[name='brindle']:checked").each(function(){
                    if (coat == 'yes'){
                        $("#filterBrindleYes").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'no'){
                        $("#filterBrindleNo").prop('checked',false);
                        findValue();
                        return false;
                    }else if(coat == 'unknown'){
                        $("#filterBrindleUnknown").prop('checked',false);
                        findValue();
                        return false;
                    }
                });
            }


        }
        function arrayRemove(arr, value) {

            return arr.filter(function(geeks){
                return geeks != value;
            });

        }
        function findValueForAgoutiEmcir(){
            var blue = [];
            var chocolate = [];
            var testable = [];
            var fluffy = [];
            var intensity = [];
            var pied = [];
            var merle = [];
            var brindle = [];
            var agouti = [];
            var emcir = [];
            var listingsData = [];

            console.log("checking");
            $("input[name='blue']:checked").each(function(){
                blue.push($(this).val());
            });
            $("input[name='chocolate']:checked").each(function(){
                chocolate.push($(this).val());
            });
            $("input[name='testable']:checked").each(function(){
                testable.push($(this).val());
            });
            $("input[name='fluffy']:checked").each(function(){
                fluffy.push($(this).val());
            });
            $("input[name='intensity']:checked").each(function(){
                intensity.push($(this).val());
            });
            $("input[name='pied']:checked").each(function(){
                pied.push($(this).val());
            });
            $("input[name='merle']:checked").each(function(){
                merle.push($(this).val());
            });
            $("input[name='brindle']:checked").each(function(){
                brindle.push($(this).val());
            });
            $("input[name='emcir']:checked").each(function(){
                emcir.push($(this).val());
            });
            $("input[name='agouti']:checked").each(function(){
                agouti.push($(this).val());
            });
            console.log("Blue are: " + blue.join(", "));
            console.log("Chococlate are: " + chocolate.join(", "));
            console.log("Testablechococlate are: " + testable.join(", "));
            console.log("Fluffy are: " + fluffy.join(", "));
            console.log("Intensity are: " + intensity.join(", "));
            console.log("Pied are: " + pied.join(", "));
            console.log("Merle are: " + merle.join(", "));
            console.log("Brindle are: " + brindle.join(", "));
            console.log("Agouti are: " + agouti.join(", "));
            console.log("EMCIR are: " + emcir.join(", "));

            let distance = $("#distance").val();
            let zip = 75001;
            if($('#zipSection').length != 0){
                this.zip = $('#zipSection').val();
            }else{
                this.zip = $("#zipSectionSecond").val();
            }
            console.log(this.zip);
            console.log(distance);

            var DNAColors_Selected_without_coats = [];

            $("input[name='Parentfilter']:checked").each(function(){
                DNAColors_Selected_without_coats.push($(this).val());
            });

            if(blue.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "blue");
            }
            if(chocolate.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "chocolate");
            }
            if(testable.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "testable");
            }
            if(fluffy.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "fluffy");
            }
            if(intensity.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "intensity");
            }
            if(pied.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "pied");
            }
            if(merle.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "merle");
            }
            if(brindle.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "brindle");
            }
            if(agouti.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "agouti");
            }
            if(emcir.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "emcir");
            }


            $.ajax({
                type:'POST',
                url: '{{route('filterByDNA')}}',
                data: {
                    blue:blue,
                    chocolate:chocolate,
                    testable:testable,
                    fluffy:fluffy,
                    intensity:intensity,
                    pied:pied,
                    merle:merle,
                    brindle:brindle,
                    agouti:agouti,
                    emcir:emcir,
                    parentDNA: DNAColors_Selected_without_coats,
                    zip : this.zip,
                    distance: distance,
                    type : 'puppy'
                },
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                beforeSend: function(){
                    console.log("sTART");
                    $("#loaderModalCenter").modal('show');
                },

                success: function(data){
                    console.log(data.success);
                    if (data.response == 200){
                        closeModal();
                    }
                    document.getElementById("primary-listing-data").style.display = "none";
                    $('#secondary-listing-data').html(data.html);
                    $('#secondary-recent-search').html(data.recentSearch);

                },
            });
        }
        function findValue(){
            var blue = [];
            var chocolate = [];
            var testable = [];
            var fluffy = [];
            var intensity = [];
            var pied = [];
            var merle = [];
            var brindle = [];
            var agouti = [];
            var emcir = [];
            var listingsData = [];

            console.log("checking");
            $("input[name='blue']:checked").each(function(){
                blue.push($(this).val());
            });
            $("input[name='chocolate']:checked").each(function(){
                chocolate.push($(this).val());
            });
            $("input[name='testable']:checked").each(function(){
                testable.push($(this).val());
            });
            $("input[name='fluffy']:checked").each(function(){
                fluffy.push($(this).val());
            });
            $("input[name='intensity']:checked").each(function(){
                intensity.push($(this).val());
            });
            $("input[name='pied']:checked").each(function(){
                pied.push($(this).val());
            });
            $("input[name='merle']:checked").each(function(){
                merle.push($(this).val());
            });
            $("input[name='brindle']:checked").each(function(){
                brindle.push($(this).val());
            });
            $("input[name='emcir']:checked").each(function(){
                emcir.push($(this).val());
            });
            $("input[name='agouti']:checked").each(function(){
                agouti.push($(this).val());
            });
            console.log("Blue are: " + blue.join(", "));
            console.log("Chococlate are: " + chocolate.join(", "));
            console.log("Testablechococlate are: " + testable.join(", "));
            console.log("Fluffy are: " + fluffy.join(", "));
            console.log("Intensity are: " + intensity.join(", "));
            console.log("Pied are: " + pied.join(", "));
            console.log("Merle are: " + merle.join(", "));
            console.log("Brindle are: " + brindle.join(", "));
            console.log("Agouti are: " + agouti.join(", "));
            console.log("EMCIR are: " + emcir.join(", "));

            let distance = $("#distance").val();
            let zip = 75001;
            if($('#zipSection').length != 0){
                this.zip = $('#zipSection').val();
            }else{
                this.zip = $("#zipSectionSecond").val();
            }
            // console.log(this.zip);
            // console.log(distance);

            var DNAColors_Selected_without_coats = [];

            $("input[name='Parentfilter']:checked").each(function(){
                DNAColors_Selected_without_coats.push($(this).val());
            });

            if(blue.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "blue");
            }
            if(chocolate.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "chocolate");
            }
            if(testable.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "testable");
            }
            if(fluffy.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "fluffy");
            }
            if(intensity.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "intensity");
            }
            if(pied.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "pied");
            }
            if(merle.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "merle");
            }
            if(brindle.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "brindle");
            }
            if(agouti.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "agouti");
            }
            if(emcir.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "emcir");
            }

            // console.log(DNAColors_Selected_without_coats);

            $.ajax({
                type:'POST',
                url: '{{route('filterByDNA')}}',
                data: {
                    blue:blue,
                    chocolate:chocolate,
                    testable:testable,
                    fluffy:fluffy,
                    intensity:intensity,
                    pied:pied,
                    merle:merle,
                    brindle:brindle,
                    agouti:agouti,
                    emcir:emcir,
                    parentDNA: DNAColors_Selected_without_coats,
                    zip : this.zip,
                    distance: distance,
                    type : 'puppy'
                },
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                beforeSend: function(){
                    $("#loaderModalCenter").modal('show');
                },

                success: function(data){
                    console.log(data.success);
                    if (data.response == 200){
                        // console.log(data.response);
                        closeModal();


                        if(emcir.length == 0){

                            $("#collapseEmcir").addClass('show');
                            $("#filterEmcir").prop('checked',true);
                            $("#filterEmcirEmem").prop('checked',true);
                            $("#filterEmcirEmE").prop('checked',true);
                            $("#filterEmcirEme").prop('checked',true);
                            $("#filterEmcirEE").prop('checked',true);
                            $("#filterEmcirEe").prop('checked',true);
                            $("#filterEmciree").prop('checked',true);
                        }
                        if(agouti.length == 0){

                            $("#collapseAgouti").addClass('show');
                            $("#filterAgouti").prop('checked',true);
                            $("#filterAgoutiAa").prop('checked',true);
                            $("#filterAgoutiAya").prop('checked',true);
                            $("#filterAgoutiAyat").prop('checked',true);
                            $("#filterAgoutiAyay").prop('checked',true);
                            $("#filterAgoutiAta").prop('checked',true);
                            $("#filterAgoutiAtat").prop('checked',true);
                        }
                    }

                    document.getElementById("primary-listing-data").style.display = "none";
                    $('#secondary-listing-data').html(data.html);
                    $('#secondary-recent-search').html(data.recentSearch);

                },
            });

        }
        function closeModal() {
            $('#loaderModalCenter').on('shown.bs.modal', function(e) {
                $("#loaderModalCenter").modal("hide");
            });
        }
        //Filter by Zip
        function checkZip(value) {
            return (/(^\d{5}$)|(^\d{5}-\d{4}$)/).test(value);
        }
        function searchByZipDistance(){
            // var distance = $('#distance :selected').text();
            var distance = $('#distance').val();
            var zip = $('#zipSection').val();
            if (checkZip(zip)){
                this.zip=zip;
            }else{
                zip2 = $('#zipSectionSecond').val();
                if (checkZip(zip2)){
                    this.zip=zip2;
                }else{
                    alert('Invalid Zip')
                    return;
                }
            }
            console.log(distance);
            console.log(this.zip);

            var blue = [];
            var chocolate = [];
            var testable = [];
            var fluffy = [];
            var intensity = [];
            var pied = [];
            var merle = [];
            var brindle = [];
            var agouti = [];
            var emcir = [];
            var listingsData = [];

            $("input[name='blue']:checked").each(function(){
                blue.push($(this).val());
            });
            $("input[name='chocolate']:checked").each(function(){
                chocolate.push($(this).val());
            });
            $("input[name='testable']:checked").each(function(){
                testable.push($(this).val());
            });
            $("input[name='fluffy']:checked").each(function(){
                fluffy.push($(this).val());
            });
            $("input[name='intensity']:checked").each(function(){
                intensity.push($(this).val());
            });
            $("input[name='pied']:checked").each(function(){
                pied.push($(this).val());
            });
            $("input[name='merle']:checked").each(function(){
                merle.push($(this).val());
            });
            $("input[name='brindle']:checked").each(function(){
                brindle.push($(this).val());
            });
            $("input[name='emcir']:checked").each(function(){
                emcir.push($(this).val());
            });
            $("input[name='agouti']:checked").each(function(){
                agouti.push($(this).val());
            });
            console.log("Blue are: " + blue.join(", "));
            console.log("Chococlate are: " + chocolate.join(", "));
            console.log("Testablechococlate are: " + testable.join(", "));
            console.log("Fluffy are: " + fluffy.join(", "));
            console.log("Intensity are: " + intensity.join(", "));
            console.log("Pied are: " + pied.join(", "));
            console.log("Merle are: " + merle.join(", "));
            console.log("Brindle are: " + brindle.join(", "));
            console.log("Agouti are: " + agouti.join(", "));
            console.log("EMCIR are: " + emcir.join(", "));


            var DNAColors_Selected_without_coats = [];
            $("input[name='Parentfilter']:checked").each(function(){
                DNAColors_Selected_without_coats.push($(this).val());
            });

            if(blue.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "blue");
            }
            if(chocolate.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "chocolate");
            }
            if(testable.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "testable");
            }
            if(fluffy.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "fluffy");
            }
            if(intensity.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "intensity");
            }
            if(pied.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "pied");
            }
            if(merle.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "merle");
            }
            if(brindle.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "brindle");
            }
            if(agouti.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "agouti");
            }
            if(emcir.length != 0){
                DNAColors_Selected_without_coats = arrayRemove(DNAColors_Selected_without_coats, "emcir");
            }


            $.ajax({
                type:'POST',
                url: '{{route('filterByDNA')}}',
                data: {
                    blue:blue,
                    chocolate:chocolate,
                    testable:testable,
                    fluffy:fluffy,
                    intensity:intensity,
                    pied:pied,
                    merle:merle,
                    brindle:brindle,
                    agouti:agouti,
                    emcir:emcir,
                    parentDNA: DNAColors_Selected_without_coats,
                    zip : this.zip,
                    distance: distance,
                    type : 'puppy'
                },
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                beforeSend: function(){
                    $("#loaderModalCenter").modal('show');
                },
                complete: function (){
                    $("#loaderModalCenter").modal('hide');
                },
                success: function(data){
                    console.log(data.success);
                    document.getElementById("primary-listing-data").style.display = "none";
                    $('#secondary-listing-data').html(data.html);
                    $('#secondary-recent-search').html(data.recentSearch);
                }
            });
        }

        function singlePuppy($slug) {
            // console.log($slug);
            window.open("{{\Illuminate\Support\Facades\URL::to('puppy-listing')}}/"+$slug, "_blank");
        }

        function getZip(){
            var inputZip = document.getElementById("zipcode");
            var data;
            fetch('{{\Illuminate\Support\Facades\URL::to('get-address-from-ip')}}')
                .then(data => {
                    address = data.json()
                    address.then(function (res){
                        inputZip.value = res['zipCode'];
                    });
                }).catch(error => { alert('Unknown Location'); });
        }

    </script>
@endsection
