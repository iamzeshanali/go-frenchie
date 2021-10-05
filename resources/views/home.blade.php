
@extends('layouts.app')
@section('title', 'Home')
@section('content')

{{--Homepage Banner Section--}}
<div class="wrapper gf-home-banner-wrapper d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="gf-home-banner-text col-md-6">
{{--            <p>We Provide The Best Care</p>--}}
            <h1>
                <span style="color:#be202e;">The #1 Place to <br> Buy or Sell</span><br>
                Your Frenchie</h1>
            <div class="gf-home-banner-detail d-flex align-items-center">
                <div class="">
                        <h4>Search</h4>
{{--                    <h4>Get Best Pets Near You</h4>--}}
{{--                    <p>We offer quick & easy services for dogs of various breeds. The best pets clinic in City, more than 20.000+ customers happy.</p>--}}
                </div>
            </div>
            <div class="gf-home-banner-button">
                <button class="gf-btn-light mr-4" onclick="location.href='{{ route('showStuds') }}'">STUDS</button>
                <button class="gf-btn-dark" onclick="location.href='{{ route('showPuppies') }}'">PUPPIES</button>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <img src="/images/homepage/gf-home-banner-dog.png" loading="lazy" alt="">
        </div>
    </div>
</div>

{{--Featured Frenchies --}}
<div class="wrapper gf-home-featured-frenchies d-flex justify-content-center">
    <div class="container row align-items-center">

        <div class="col-md-3">
            <span>OUR FRIENDS</span>
            <h2>Featured<span style="color:#BE202E"><br>Frenchies</span></h2>
            <p>We take the responsibility of caring for pets very seriously. They are members of your family.</p>
{{--            <a href="#contact-form" class="gf-btn-dark">FIND MORE</a>--}}
        </div>

        <div class="col-md-9">
            <div class="gf-featured-frenchies-slider row">
                <?php
                    $allFeautred = app(\App\Http\Controllers\ListingsController::class)->featuredListings();
//                    dd($allFeautred);
                ?>
                @if(count($allFeautred) > 0)
                    @foreach($allFeautred as $featured)
                            <div class="px-3">
                                <div class="gf-slide">
                                    <a class="gf-frenchie-slide-like">
                                        <i class="fas fa-crown float-right"></i>
                                    </a>
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <img src="{{$featured->photo1 ? asset_file_url($featured->photo1): '/images/notfound/gf-not-found.png'}}" width="150" height="auto" loading="lazy" alt="Featured Frenchie Image">
                                        </div>
                                        <div class="col-md-9 gf-frenchie-slide-details p-0">
                                            <div class="col">
                                                <h4>{{$featured->title}}</h4> <i class="fas fa-venus ml-2" style="font-size:24px; color:#f07e92;"></i>
                                                <p>{{$featured->description->asString()}}</p>
                                            </div>
                                            <div class="row p-0 align-items-center">
                                                <div class="col-xl-6 gf-frenchie-dob">
                                                    <i class="fa fa-calendar-alt"></i>
                                                    <span>{{date('Y-m-d',$featured->dob->getTimestamp())}}</span>
                                                </div>
                                                <div class="col-xl-6 gf-frenchie-kennel">
                                                    <i class="fa fa-igloo"></i>
                                                    <span>{{$featured->breeder->kennelName}}</span>
                                                </div>

                                            </div>
                                            <div class="row p-0 align-items-center">
                                                <div class="col-xl-6 gf-frenchie-mail">
                                                    <i class="fa fa-envelope"></i>
                                                    <span>{{$featured->breeder->email->asString()}}</span>
                                                </div>
                                                <div class="col-xl-6 gf-frenchie-phone">
                                                    <i class="fa fa-phone-alt"></i>
                                                    <span>{{$featured->breeder->phone}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @else
                        <div class="px-3">
                            <div class="gf-slide">
                                <a class="gf-frenchie-slide-like">
                                    <i class="fas fa-crown float-right"></i>
                                </a>
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <img src="/images/homepage/gf-home-contact-image.png" width="150" height="auto" loading="lazy" alt="Featured Frenchie Image">
                                    </div>
                                    <div class="col-md-9 gf-frenchie-slide-details p-0">
                                        <div class="col">
                                            <h4>Ad ut dolores dolore</h4> <i class="fas fa-venus ml-2" style="font-size:24px; color:#f07e92;"></i>
                                            <p>Mauris blandit aliquet elit, lorem ut libero malesuada feugiat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta.</p>
                                        </div>
                                        <div class="row p-0 align-items-center">
                                            <div class="col-xl-6 gf-frenchie-dob">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>1976-08-09</span>
                                            </div>
                                            <div class="col-xl-6 gf-frenchie-kennel">
                                                <i class="fa fa-igloo"></i>
                                                <span>Basia Dickerson</span>
                                            </div>

                                        </div>
                                        <div class="row p-0 align-items-center">
                                            <div class="col-xl-6 gf-frenchie-mail">
                                                <i class="fa fa-envelope"></i>
                                                <span>developer@devtics.com</span>
                                            </div>
                                            <div class="col-xl-6 gf-frenchie-phone">
                                                <i class="fa fa-phone-alt"></i>
                                                <span> +1 (604) 644-9677</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </div>

    </div>
</div>

{{--Categories Section--}}
<div class="wrapper gf-home-blurbs">
    <div class="container">
        <h2>Your pet’s health and well-being, <span style="color:#BE202E"><br>are our top priority.</span></h2>
        <p class="my-3">Click to find your best friend.</p>
    </div>
    <div class="lg-gf-container">
        <div class="services-blurbs row">
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-contact-image.png" height="150" loading="lazy" alt="">
                    <h4>STUDS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{ route('showStuds') }}">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-banner-dog.png" height="150" loading="lazy" alt="">
                    <h4>PUPPIES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{ route('showPuppies') }}">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-second-intro-image.png" height="150" loading="lazy" alt="">
                    <h4>LITTERS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{ route('showLitters') }}">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-blurbs-resources.png" height="150" loading="lazy" alt="">
                    <h4>RESOURCES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{ route('resources') }}">VIEW MORE</a>
                </div>
            </div>
        </div>
    </div>

    <div class="two-column-option container d-none">
        <div class="services-blurbs row">
            <div class="col-xl-6 col-md-6 my-3">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-contact-image.png" height="150" loading="lazy" alt="">
                    <h4>STUDS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{ route('showStuds') }}">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 my-3">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-banner-dog.png" height="150" loading="lazy" alt="">
                    <h4>PUPPIES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{ route('showPuppies') }}">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 my-3">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-second-intro-image.png" height="150" loading="lazy" alt="">
                    <h4>LITTERS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{route('showLitters')}}">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 my-3">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-blurbs-resources.png" height="150" loading="lazy" alt="">
                    <h4>RESOURCES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="{{route('resources')}}">VIEW MORE</a>
                </div>
            </div>
        </div>
    </div>

</div>

{{--Featured Kennel --}}
<div class="wrapper gf-home-featured-kennel d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="col-md-6 text-center">
            <img src="/images/breeder-kennel.png" width="300" height="300" loading="lazy" alt="">
        </div>
        <div class="col-md-6">
            <h2>Featured <span style="color:#BE202E"><br>Kennel</span></h2>
            <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
            <button class="gf-btn-dark">KENNEL PROFILE</button>
        </div>
    </div>
</div>

{{--kennels slider--}}
<div class="wrapper gf-home-kennels-carousel">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <span>OUR STARS</span>
                <h2>Spotlight<span style="color:#BE202E"><br>Breeders</span></h2>
                <p>We take the responsibility of caring for pets very seriously. They are members of your family.</p>
                <a href="{{ route('resources') }}" class="gf-btn-dark">VISIT KENNELS</a>
            </div>
            <div class="col-md-9">
                <div class="gf-kennel-slider row">
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder-kennel-4.png" width="300" height=auto loading="lazy" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder-kennel-2.png" width="300" height=auto loading="lazy" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder-kennel-3.png" width="300" height=auto loading="lazy" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder-kennel.png" width="300" height=auto loading="lazy" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Testimonials Slider--}}
@include('components.sections.gf-testimonials')


{{--CTA/News Letter--}}
<div class="wrapper gf-homepage-adds">
        <div class="container">
            <div class="row px-5 align-items-center">
                <div class="col-md-6 my-4 text-center">
                    <h4>Keep in touch!</h4>
                    <span>Join our mailing list for exclusive discounts.</span>
                    <form class="mt-3" action="#">
                        <input class="d-block mb-3 mx-auto" type="text" placeholder="Email">
                        <button type="submit" name="submit" class="gf-btn-dark">SUBSCRIBE</button>
                    </form>
                </div>
                <div class="col-6 d-none d-md-block text-center">
                    <img src="/images/homepage/gf-subscribe-image.png" width="350" loading="lazy" alt="Image not found">
                </div>
{{--                <div class="col-3 text-center">--}}
{{--                    <a href="">BOOKING NOW</a>--}}
{{--                </div>--}}
            </div>
        </div>
</div>

{{--Featured Resources--}}
<div class="wrapper gf-home-third-quality">
    <div class="lg-gf-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Featured Resources<span style="color:#BE202E"><br>For Frenchie Lovers</span></h2>
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
                <div class="d-flex align-items-center">
                    <button class="gf-btn-dark mr-4" onclick="location.href='{{ route('resources') }}'">VIEW MORE</button>

                </div>
            </div>
            <div class="col-md-6 text-left">
                <img src="images/homepage/featured-resources.png" width="400" loading="lazy" alt="">
            </div>

        </div>
    </div>
</div>

{{--Contact Section--}}
@include('components.sections.gf-contact-form')

@endsection



