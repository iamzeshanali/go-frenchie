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
<div class="wrapper gf-testimonials d-flex justify-content-center">
    <div class="container row align-items-center justify-content-center">
        {{--        <div class="col-md-6 text-center">--}}
        {{--            <img src="/images/homepage/gf-home-banner-dog.png" alt="">--}}
        {{--        </div>--}}
        <div class="col-md-9">
            <h2 class="text-center">Our Amazing <span style="color:#BE202E"><br>Testimonials</span></h2>

            <div class="gf-home-testimonial-slider">
                <div>
                    <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
                    <span>Caroline Bryan</span><br>
                    <span>Very Affordably Priced</span>
                </div>
                <div>
                    <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
                    <span>Caroline Bryan</span><br>
                    <span>Very Affordably Priced</span>
                </div>
                <div>
                    <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
                    <span>Caroline Bryan</span><br>
                    <span>Very Affordably Priced</span>
                </div>
                <div>
                    <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
                    <span>Caroline Bryan</span><br>
                    <span>Very Affordably Priced</span>
                </div>
                <div>
                    <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
                    <span>Caroline Bryan</span><br>
                    <span>Very Affordably Priced</span>
                </div>
            </div>

        </div>
    </div>
</div>


{{--Contact Section--}}
<div id="contact-form" class="wrapper gf-contactform d-flex justify-content-center p-0">
    <div class="container row align-items-center">
        <div class="col-md-6">
            <img src="/images/homepage/gf-home-contact-image.png" width="450" loading="lazy" alt="">
        </div>
        <div class="col-md-6">
            <div class="gf-contactform-area">
                <h4>Contact Us With Any Questions </h4>
                <form action="">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <textarea name="Message" cols="30" rows="5" placeholder="Message"></textarea>
                    <label for="captchaWrap">To continue, please type the characters below:</label>
                    <div id="captchaWrap" class="captchaWrap d-flex align-items-center text-align-center">
                        <canvas id="captcha"></canvas>
                        <button type="button" id="refreshButton" class="captcha-refresh-btn"><i class="fas fa-redo"></i></button>
                        <span id="output" class="ml-2"></span>
                    </div>
                    <div class="mb-2">
                        <input id="textBox" class="captcha-textBox mr-2" type="text" name="text" placeholder="Captcha Text">
                        <button type="button" id="submitButton" class="gf-btn-light">Check</button>
                    </div>
                    <button type="submit" class="gf-btn-dark">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
