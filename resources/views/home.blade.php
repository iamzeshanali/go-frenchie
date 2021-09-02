
@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="wrapper gf-home-banner-wrapper d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="gf-home-banner-text col-md-6">
            <p>We Provide The Best Care</p>
            <h1>
                <span style="color:#be202e;">For Your </span><br>
                Best Friend</h1>
            <div class="gf-home-banner-detail d-flex align-items-center">
                <div>
                    <img src="/images/homepage/gf-home-banner-paws.png" width="450" alt="">
                </div>
                <div class="pl-3">
                    <h4>Get Best Pet Care Services</h4>
                    <p>We offer quick & easy services for both dogs and cat of various breeds. The best pets clinic in City, more than 20.000+ customers happy.</p>
                </div>
            </div>
            <div class="gf-home-banner-button">
                <a class="" href="#">BOOK NOW</a>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <img src="/images/homepage/gf-home-banner-dog.png" alt="">
        </div>
    </div>
</div>

<div class="wrapper gf-home-second-intro d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="col-md-6 text-center">
            <img src="/images/homepage/gf-home-second-intro-image.png" alt="">
        </div>
        <div class="col-md-6">
            <h2>Every Pet Is <span style="color:#BE202E"><br>Treated With Love</span></h2>
            <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
            <button class="gf-btn-dark">BOOK NOW</button>
        </div>
    </div>
</div>

<div class="wrapper gf-home-blurbs">
    <div class="container">
        <h2>Your pet’s health and well-being, <span style="color:#BE202E"><br>are our top priority.</span></h2>
        <p class="my-3">Check our services for your best friend.</p>
    </div>
    <div class="lg-gf-container">
        <div class="services-blurbs row">
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-contact-image.png" height="100" alt="">
                    <h4>STUDS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-banner-dog.png" height="100" alt="">
                    <h4>PUPPIES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-home-second-intro-image.png" height="100" alt="">
                    <h4>LITTERS</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-2">
                <div class="service-blurb">
                    <img src="/images/homepage/gf-adds-image.png" height="100" alt="">
                    <h4>RESOURCES</h4>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed …</p>
                    <a href="#">VIEW MORE</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper gf-testimonials d-flex justify-content-center p-0">
    <div class="container row align-items-center">
        <div class="col-md-6 text-center">
            <img src="/images/homepage/gf-home-banner-dog.png" alt="">
        </div>
        <div class="col-md-6">
            <h2>Our Amazing <span style="color:#BE202E"><br>Testimonials</span></h2>

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
            </div>

        </div>
    </div>
</div>

<div class="wrapper gf-homepage-adds">
        <div class="container">
            <div class="row px-5 align-items-center">
                <div class="col-md-6 my-4">
                    <h4>Get 30% off for the First Time Appointment!</h4>
                    <span>CONTACT US NOW AND MAKE AN APPOINTMENT TODAY</span>
                </div>
                <div class="col-3 d-none d-md-block">
                    <img src="/images/homepage/gf-adds-image.png" alt="Image not found">
                </div>
                <div class="col-3 text-center">
                    <a href="">BOOKING NOW</a>
                </div>
            </div>
        </div>
</div>


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
                            <img src="/images/breeder.png" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder.png" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder.png" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="gf-slide">
                            <img src="/images/breeder.png" alt="Breeder Logo Not found">
                            <h4>Kennel 1</h4>
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="wrapper gf-home-third-quality">
    <div class="lg-gf-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Quality Styling, <span style="color:#BE202E"><br>Clipping &amp; Bathing is Hard to Find…</span></h2>
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
                <img src="images/homepage/gf-home-third-quality-image.png" width="400" alt="">
            </div>

        </div>
    </div>
</div>

<div id="contact-form" class="wrapper gf-contactform d-flex justify-content-center p-0">
    <div class="container row align-items-center">
        <div class="col-md-6">
            <img src="/images/homepage/gf-home-contact-image.png" width="450" alt="">
        </div>
        <div class="col-md-6">
            <div class="gf-contactform-area">
                <p>Get 30% off for the First Time Appointment!</p>
                <h4>Get a quote for Your Best Friend</h4>
                <form action="">
                    <div>
                        <select name="Your Pet" id="">
                            <option value="">Your Pet</option>
                            <option value="">Stud</option>
                            <option value="">Puppy</option>
                            <option value="">Litter</option>
                        </select>
                    </div>
                    <select name="Service" id="">
                        <option value="">Service</option>
                        <option value="">Resources</option>
                        <option value="">DNA Test</option>
                        <option value="">Litters Announcement</option>
                        <option value="">Adds</option>
                    </select>
                    <textarea name="Message" id="" cols="30" rows="5" placeholder="Message"></textarea>
                    <button type="submit" class="gf-btn-dark">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


