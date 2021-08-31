
@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="wrapper gf-home-banner-wrapper d-flex justify-content-center">
    <div class="container row align-items-center">
        <div class="gf-home-banner-text col-md-6">
            <p>We Provide The Best Care</p>
            <h2>
                <span style="color:#be202e;">For Your </span><br>
                Best Friend</h2>
            <div class="gf-home-banner-detail d-flex">
                <div>
                    <img src="/images/homepage/gf-home-banner-paws.png" width="150" alt="">
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
            <h2>Every Pet Is <span style="color:#BE202F"><br>Treated With Love</span></h2>
            <p>Your pet’s health and well-being are our top priority.. We are fully committed to the health and hygiene of your furry best friends. We offer free estimates and consultations to help your pet look and feel their best!</p>
            <button class="gf-btn-dark">BOOK NOW</button>
        </div>
    </div>
</div>

<div class="wrapper gf-home-third-quality d-flex justify-content-center">
    <div class="container row align-items-center">
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
        <div class="col-md-6 text-center">
            <img src="images/homepage/gf-home-third-quality-image.png" width="500" alt="">
        </div>

    </div>

</div>

@endsection


