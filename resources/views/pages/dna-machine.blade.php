@extends('./layouts.app')
@section('title', 'DNA Machine')
@section('content')

<div class="container-fluid">
    <h2 class="page-title text-center">DNA MACHINE</h2>
    <div class="dna-machine-flex-area d-lg-flex justify-content-center align-items-start my-3">

        @include('components/adds-area')


        <div class="dna-machine-content-area container bg-white rounded p-3 mx-3">
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
        @include('components/adds-area')
    </div>

</div>

@endsection
