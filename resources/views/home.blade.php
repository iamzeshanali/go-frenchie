
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
                <button class="gf-btn-light mr-4">STUDS</button>
                <button class="gf-btn-dark">PUPPIES</button>
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
            <a href="#contact-form" class="gf-btn-dark">FIND MORE</a>
        </div>

        <div class="col-md-9">
            <div class="gf-featured-frenchies-slider row">
                <div class="px-3">
                    <div class="gf-slide">
                        <a href="#" class="gf-frenchie-slide-like">
                            <i class="fas fa-heart float-right"></i>
                        </a>
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="/images/homepage/gf-home-contact-image.png" width="150" height="auto" loading="lazy" alt="Featured Frenchie Image">
                            </div>
                            <div class="col-md-9 gf-frenchie-slide-details p-0">
                                <div class="col">
                                    <h4>Voluptatem Do asper</h4> <i class="fas fa-venus ml-2" style="font-size:24px; color:#f07e92;"></i>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-dob">
                                        <i class="fa fa-calendar-alt"></i>
                                        <span>2018-11-10</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-kennel">
                                        <i class="fa fa-igloo"></i>
                                        <span>Patience Stein</span>
                                    </div>

                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-mail">
                                        <i class="fa fa-envelope"></i>
                                        <span>jigofix@mailinator.com</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-phone">
                                        <i class="fa fa-phone-alt"></i>
                                        <span>+1 (653) 847-8052</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="gf-slide">
                        <a href="#" class="gf-frenchie-slide-like">
                            <i class="fas fa-heart float-right"></i>
                        </a>
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="/images/homepage/gf-home-contact-image.png" width="150" height="auto" loading="lazy" alt="Featured Frenchie Image">
                            </div>
                            <div class="col-md-9 gf-frenchie-slide-details p-0">
                                <div class="col">
                                    <h4>Voluptatem Do asper</h4> <i class="fas fa-mars ml-2" style="font-size:24px;"></i>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-dob">
                                        <i class="fa fa-calendar-alt"></i>
                                        <span>2018-11-10</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-kennel">
                                        <i class="fa fa-igloo"></i>
                                        <span>Patience Stein</span>
                                    </div>

                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-mail">
                                        <i class="fa fa-envelope"></i>
                                        <span>jigofix@mailinator.com</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-phone">
                                        <i class="fa fa-phone-alt"></i>
                                        <span>+1 (653) 847-8052</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="gf-slide">
                        <a href="#" class="gf-frenchie-slide-like">
                            <i class="fas fa-heart float-right"></i>
                        </a>
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="/images/homepage/gf-home-contact-image.png" width="150" height="auto" loading="lazy" alt="Featured Frenchie Image">
                            </div>
                            <div class="col-md-9 gf-frenchie-slide-details p-0">
                                <div class="col">
                                    <h4>Voluptatem Do asper</h4> <i class="fas fa-mars ml-2" style="font-size:24px;"></i>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-dob">
                                        <i class="fa fa-calendar-alt"></i>
                                        <span>2018-11-10</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-kennel">
                                        <i class="fa fa-igloo"></i>
                                        <span>Patience Stein</span>
                                    </div>

                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-mail">
                                        <i class="fa fa-envelope"></i>
                                        <span>jigofix@mailinator.com</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-phone">
                                        <i class="fa fa-phone-alt"></i>
                                        <span>+1 (653) 847-8052</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="gf-slide">
                        <a href="#" class="gf-frenchie-slide-like">
                            <i class="fas fa-heart float-right"></i>
                        </a>
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="/images/homepage/gf-home-contact-image.png" width="150" height="auto" loading="lazy" alt="Featured Frenchie Image">
                            </div>
                            <div class="col-md-9 gf-frenchie-slide-details p-0">
                                <div class="col">
                                    <h4>Voluptatem Do asper</h4> <i class="fas fa-mars ml-2" style="font-size:24px;"></i>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-dob">
                                        <i class="fa fa-calendar-alt"></i>
                                        <span>2018-11-10</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-kennel">
                                        <i class="fa fa-igloo"></i>
                                        <span>Patience Stein</span>
                                    </div>

                                </div>
                                <div class="row p-0 align-items-center">
                                    <div class="col-xl-6 gf-frenchie-mail">
                                        <i class="fa fa-envelope"></i>
                                        <span>jigofix@mailinator.com</span>
                                    </div>
                                    <div class="col-xl-6 gf-frenchie-phone">
                                        <i class="fa fa-phone-alt"></i>
                                        <span>+1 (653) 847-8052</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <div class="lg-gf-container d-none">
        <div class="services-blurbs row">
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-contact-image.png" height="150" loading="lazy" alt="">
                    <h4>STUDS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-banner-dog.png" height="150" loading="lazy" alt="">
                    <h4>PUPPIES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-second-intro-image.png" height="150" loading="lazy" alt="">
                    <h4>LITTERS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-blurbs-resources.png" height="150" loading="lazy" alt="">
                    <h4>RESOURCES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
        </div>
    </div>

    <div class="two-column-option container">
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
            <img src="/images/breeder.png" loading="lazy" alt="">
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
                <a href="#contact-form" class="gf-btn-dark">GET QUOTE</a>
            </div>
            <div class="col-md-9">
                <div class="gf-kennel-slider row">
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder.png" loading="lazy" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder.png" loading="lazy" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder.png" loading="lazy" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder.png" loading="lazy" alt="Breeder Logo Not found">
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
                    <div class="">
                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">
                        <span>PET GROOMING</span>
                    </div>
                    <div class="">
                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">
                        <span>PET HOTEL</span>
                    </div>
                    <div class="">
                        <img src="/images/homepage/gf-pet-paw-sign.png" width="20" alt="">
                        <span>VACCINATION</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="gf-btn-dark mr-4">VIEW MORE</button>
                    <button class="gf-btn-light">BOOK NOW</button>

                </div>
            </div>
            <div class="col-md-6 text-left">
                <img src="images/homepage/featured-resources.png" width="400" loading="lazy" alt="">
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


