@extends('./layouts.app')
@section('title', 'Breeder Resources')
@section('content')

{{--Featured Resources--}}
<div class="wrapper gf-home-third-quality">
    <div class="lg-gf-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Best Resources<span style="color:#BE202E"><br>For Frenchie Lovers</span></h2>
                <p>Our puppies and other very active dogs have plenty of space to run and romp, and comfy blankets. We offer quick & easy services for both dogs and cat of various breeds. No matter their size or age, we can provide positive grooming experience.</p>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">
                        <span class="ml-2">CANINE GENETICS</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">
                        <span class="ml-2">CANINE NUTRITION</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">
                        <span class="ml-2">VACCINATION</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-left">
                <img src="images/homepage/featured-resources.png" width="400" loading="lazy" alt="">
            </div>
        </div>
    </div>
</div>


<div class="">
    <div class="container-fluid">
        <div class="resources-flex-area d-lg-flex justify-content-center">

{{--            @include('components/adds-area')--}}
            <?php
                $allBreeders = app('App\Http\Controllers\BreederController')->getAllBreeders();
//                dd($allBreeders);
                ?>

            <div class="container">
                <div class="resources-cards row mx-1">
                    @if(isset($allBreeders))
                        @foreach($allBreeders as $bs)
                            <div onclick="singleBreeder({{$bs->getId()}})" style="cursor: pointer;" class="col-xl-4 col-md-6 py-3">
                                <div class="breeder-resource-card rounded p-3">
                                    <div class="gf-resource-card-image text-center">
                                        <img src="{{$bs->logo ? asset_file_url($bs->logo): '/images/notfound/gf-not-found.png'}}" alt="kennel logo" height="200" width=auto>
                                    </div>
                                    <div class="resource-card-details my-3 d-flex flex-column align-items-center">
                                        <h5><a title="Breeder">{{$bs->username}}</a></h5>
                                        <a title="kennel"><i class="fa fa-igloo"></i> &nbsp;{{$bs->kennelName}}</a>
                                        <span title="location"><i class="fas fa-map-marker-alt"></i> &nbsp;{{$bs->city}}</span>
                                    </div>
                                    <div class="resource-card-contact d-flex justify-content-around py-2">
                                        <a href="tel:{{$bs->phone}}" title="call"><i class="fas fa-phone-alt"></i></a>
                                        <a href="mailto:{{$bs->email->asString()}}" title="Email"><i class="far fa-envelope"></i></a>
                                        <a href="{{$bs->website->asString() ?? '#'}}"><i class="fas fa-globe" title="Website"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
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
            <h2 class="text-center mb-4">Our Amazing <span style="color:#BE202E"><br>Testimonials</span></h2>

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
<script type="text/javascript">
    function singleBreeder($id) {
        // console.log($slug);
        window.location = "{{\Illuminate\Support\Facades\URL::to('show-kennel')}}/"+$id;
    }
</script>
