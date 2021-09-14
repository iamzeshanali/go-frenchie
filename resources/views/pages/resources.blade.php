@extends('./layouts.app')
@section('title', 'Breeder Resources')
@section('content')

{{--Homepage Banner Section--}}
<div class="wrapper gf-resources-banner-wrapper d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="gf-resources-banner-text col-md-6">
            <h1>
                <span style="color:#be202e;">Featured Resources</span><br>
                For Frenchie Lovers</h1>
        </div>
        <div class="col-md-6 text-center">
            <img src="/images/frenchie-reading-book.png" loading="lazy" width="400" height="271" alt="">
        </div>
    </div>
</div>

{{--Featured Resources--}}
{{--<div class="wrapper gf-resources-featured">--}}
{{--    <div class="lg-gf-container">--}}
{{--        <div class="row align-items-center">--}}
{{--            <div class="col-md-6">--}}
{{--                <h2>Featured Resources<span style="color:#BE202E"><br>For Frenchie Lovers</span></h2>--}}
{{--                <p>Our puppies and other very active dogs have plenty of space to run and romp, and comfy blankets. We offer quick & easy services for both dogs and cat of various breeds. No matter their size or age, we can provide positive grooming experience.</p>--}}
{{--                <div class="d-flex align-items-center justify-content-between mb-3">--}}
{{--                    <div class="">--}}
{{--                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">--}}
{{--                        <span>CANINE GENETICS</span>--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">--}}
{{--                        <span>PET HOTEL</span>--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">--}}
{{--                        <span>VACCINATION</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                    <button class="gf-btn-dark mr-4">VIEW MORE</button>--}}
{{--                    <button class="gf-btn-light">BOOK NOW</button>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 text-left">--}}
{{--                <img src="images/homepage/featured-resources.png" width="400" loading="lazy" alt="">--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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
                            <div class="col-xl-4 col-md-6 py-3">
                                <div onclick="singleBreeder({{$bs->getId()}})" class="breeder-resource-card rounded p-3">
                                    <div class="resource-card-image text-center">
                                        <img src="{{asset_file_url($bs->logo)}}" alt="kennel logo" height="100" width=auto>
                                    </div>
                                    <div class="resource-card-details my-3 d-flex flex-column align-items-center">
                                        <h5><a href="" title="Breeder">{{$bs->username}}</a></h5>
                                        <a href="" title="kennel"><i class="fa fa-igloo"></i> &nbsp;{{$bs->kennelName}}</a>
                                        <span title="location"><i class="fas fa-map-marker-alt"></i> &nbsp;{{$bs->city}}</span>
                                    </div>
                                    <div class="resource-card-contact d-flex justify-content-around py-2">
                                        <a href="{{$bs->phone}}" title="call"><i class="fas fa-phone-alt"></i></a>
                                        <a href="{{$bs->email->asString()}}" title="Email"><i class="far fa-envelope"></i></a>
                                        <a href="{{$bs->website->asString()}}"><i class="fas fa-globe" title="Website"></i></a>
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
                {{--                <p>Get 30% off for the First Time Appointment!</p>--}}
                <h4>Contact Us With Any Questions </h4>
                <form action="">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <textarea name="Message" cols="30" rows="5" placeholder="Message"></textarea>

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
        window.location = "http://frenchbulldog.test/show-kennel/"+$id;
    }
</script>
