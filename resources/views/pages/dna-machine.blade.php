@extends('./layouts.app')
@section('title', 'DNA Machine')
@section('content')

{{--Homepage Banner Section--}}
<div class="wrapper gf-home-banner-wrapper d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="gf-home-banner-text col-md-6">
            <h1>
                <span style="color:#be202e;">The Place to Find</span><br>
                Your Frenchie</h1>
        </div>
        <div class="col-md-6 text-center">
            <img src="/images/home4.png" loading="lazy" alt="">
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="container-fluid">
        <div class="page-content d-lg-flex align-items-start">
            {{--            Adds Area--}}
            <div class="gf-adds-area mb-3 col-xl-2">
                @include('components/adds-area')
            </div>

            <div class="fbd-content-area mb-3 col-xl-8 col-lg-9">

                <div class="dna-machine-image text-center">
                    <img src="images/dna-machine.png" alt="" width="250px">
                </div>

                <h4>DNA Characteristics</h4>

                <div class="fbd-single-listing-dna row mt-5">



                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Blue</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>d/d</td>
                            </tr>
                            <tr>
                                <td>D/d</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Chocolate</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>co/co</td>
                            </tr>
                            <tr>
                                <td>Co/co</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>TestableChocolate</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>b/b</td>
                            </tr>
                            <tr>
                                <td>B/b</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Fluffy</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>l/l</td>
                            </tr>
                            <tr>
                                <td>L/l</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Intensity</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>i/i</td>
                            </tr>
                            <tr>
                                <td>I/i</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Pied</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>s/s</td>
                            </tr>
                            <tr>
                                <td>s/N</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Brindle</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>{{ucfirst('yes')}}</td>
                            </tr>
                            <tr>
                                <td>{{ucfirst('no')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Merle</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>{{ucfirst('yes')}}</td>
                            </tr>
                            <tr>
                                <td>{{ucfirst('no')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>Agouti</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>(a,a)</td>
                            </tr>
                            <tr>
                                <td>(ay,a)</td>
                            </tr>
                            <tr>
                                <td>(ay,at)</td>
                            </tr>
                            <tr>
                                <td>(ay,ay)</td>
                            </tr>
                            <tr>
                                <td>(at,a)</td>
                            </tr>
                            <tr>
                                <td>(at,at)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-3 my-auto pl-5 text-left">
                        <i class="fa fa-dna"></i> &emsp;<span><b>EMcir</b></span>
                    </div>
                    <div class=" col-sm-3">
                        <table class="table text-center">
                            <tbody>
                            <tr>
                                <td>(EM,EM)</td>
                            </tr>
                            <tr>
                                <td>(EM,E)</td>
                            </tr>
                            <tr>
                                <td>(EM,e)</td>
                            </tr>
                            <tr>
                                <td>(E,E)</td>
                            </tr>
                            <tr>
                                <td>(E,e)</td>
                            </tr>
                            <tr>
                                <td>(e,e)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{--            Adds Area--}}
            <div class="gf-adds-area mb-3 col-xl-2">
                <img class="gf-side-add-image rounded" src="/images/ads/gf-foods-ad.gif" alt="">
            </div>
        </div>
    </div>
</div>


{{--Testimonials Slider--}}
@include('components.sections.gf-testimonials')


{{--Contact Section--}}
@include('components.sections.gf-contact-form')

@endsection
