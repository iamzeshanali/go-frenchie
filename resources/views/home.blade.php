
@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="home-banner-wrapper d-flex justify-content-center">
    <div class="home-banner-form row py-5 text-center align-content-center">
        <form method="POST" action="{{route('findListings')}}" class="col-md-4 requires-validation">
            @csrf
            <input type="hidden" name="type" value="all">
            <h2>Find Your Partner</h2>
            <div class="mb-3">
                <select class="form-control form-select dna-a" name="dnaColor" id="dnaColor" aria-label="Default select example">
                    <option selected disabled>Choose Color</option>
                    <option value="Blue">Blue </option>
                    <option value="Chocolate">Chocolate </option>
                    <option value="Testable_Chocolate">Testable Chocolate </option>
                    <option value="Fluffy">Fluffy </option>
                    <option value="Intensity">Intensity </option>
                    <option value="Pied">Pied </option>
                    <option value="Merle">Merle </option>
                    <option value="Brindle">Brindle </option>
                </select>
                <div class="invalid-feedback">Please select a Color!</div>
            </div>

            <div class="mb-3">
                <div id="coat">
                </div>
                <div id="optional">
                    <!-- Default COAT Characteristics-->
                    <select class="form-control form-select" id="dnaCoatOptional" name="dnaCoatOptional" aria-label="Default select example">
                        <option selected disabled>Choose DNA Color</option>
                    </select>
                    <div class="invalid-feedback">Please select a Color!</div>
                </div>
            </div>
            <div class="mb-3">
                <div class="locatin-group-btn input-group">
                    <input type="zip" class="form-control" name="zip" id="zipcode" aria-describedby="zipHelp" placeholder="Zip Code">
                    <span class="input-group-btn">
                        <button class="btn btn-default" onClick="getZip()" type="button"><i class="far fa-compass"></i></button>
                    </span>
                </div>
            </div>

            <div class="form-button">
                <button id="submit" type="submit" class="btn btn-block btn-primary btn-fbd">Search</button>
            </div>
        </form>
    </div>
</div>
<div class="home-banner-divider"></div>
<div class="home-intro-wrapper mt-5">
    <div class="home-intro container py-5 text-center">
        <h2>Welcome To The French Bull Dog</h2>
        <p>At French Bull Dog, we serve pets of every type, age, and phase of life because we truly love animals. We show it with every belly rub, long walk, scratch behind the ear, and treat we give. We’d love to be your trusted sidekick for a healthy and happy pet because we know we can deliver trusted, quality care and a professional, stress-free experience for you.</p>
    </div>
</div>

<div class="home-blurbs-wrapper">
    <div class="home-blurbs py-5">
        <div class="row justify-content-center">
            <div class="col-md-5 block m-3 rounded">

                <a class="text-center p-3 text-white d-flex" href="">
                    <div class="m-auto">
                        <h3>FIND STUD</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <button class="btn btn-primary btn-fbd mt-3">Explore More&ensp;<i class="fas fa-angle-right"></i></button>
                    </div>
                </a>
                <div class="text-center px-5 py-3">
                    <img class="mb-5" src="/images/home1.png" alt="">
                </div>
                <div class="home-blurb-name text-center">
                    <h4>FIND A STUD</h4>
                </div>

            </div>
            <div class="col-md-5 block m-3 rounded">
                <a class="text-center p-3 text-white d-flex" href="">
                    <div class="m-auto">
                        <h3>FIND PUPPY</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <button class="btn btn-primary btn-fbd mt-3">Explore More&ensp;<i class="fas fa-angle-right"></i></button>
                    </div>
                </a>
                <div class="text-center px-5 py-3">
                    <img class="mb-5" src="/images/home2.png" alt="">
                </div>
                <div class="home-blurb-name text-center">
                    <h4>FIND A PUPPY</h4>
                </div>
            </div>
            <div class="col-md-5 block m-3 rounded">
                <a class="text-center p-3 text-white d-flex" href="">
                    <div class="m-auto">
                        <h3>LITTERS ANNOUNCEMENT</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <button class="btn btn-primary btn-fbd mt-3">Explore More&ensp;<i class="fas fa-angle-right"></i></button>
                    </div>
                </a>
                <div class="text-center px-5 py-3">
                    <img class="mb-5" src="/images/home3.png" alt="">
                </div>
                <div class="home-blurb-name text-center">
                    <h4>LITTERS ANNOUNCEMENT</h4>
                </div>
            </div>
            <div class="col-md-5 block m-3 rounded">
                <a class="text-center p-3 text-white d-flex" href="">
                    <div class="m-auto">
                        <h3>DNA MACHINE</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <button class="btn btn-primary btn-fbd mt-3">Explore More&ensp;<i class="fas fa-angle-right"></i></button>
                    </div>
                </a>
                <div class="text-center px-5 py-3">
                    <img class="mb-5" src="/images/home4.png" alt="">
                </div>
                <div class="home-blurb-name text-center">
                    <h4>DNA MACHINE</h4>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="home-advertisement p-4 ">
    <div class="row rounded justify-content-center p-3">
        <div class="col-md-10 fbd-home-ads-slider">
{{--            <img src="{{asset('images/ads.png')}}" alt="">--}}
{{--            <img src="{{asset('images/ads1.png')}}" alt="">--}}
        </div>

    </div>

</div>

<div class="container my-5 home-sp-kennels">
    <div class="row justify-content-center">
        <h2>OUR TRUSTED KENNELS</h2>
    </div>
    <div class="row mx-auto my-5">
        <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                <div class="carousel-item active">
                    <div class="col-lg-4 col-md-6">
                        <a href="#">
                            <img class="img-fluid" src="https://source.unsplash.com/300x300/?dog,kennel">
                            <hr>
                            <span>KENNEL NAME</span>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-4 col-md-6">
                        <a href="#">
                            <img class="img-fluid" src="https://source.unsplash.com/300x300/?kennel">
                            <hr>
                            <span>KENNEL NAME</span>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-4 col-md-6">
                        <a href="#">
                            <img class="img-fluid" src="https://source.unsplash.com/300x300/?dogs,kennel">
                            <hr>
                            <span>KENNEL NAME</span>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-lg-4 col-md-6">
                        <a href="#">
                            <img class="img-fluid" src="https://source.unsplash.com/300x300/?dog">
                            <hr>
                            <span>KENNEL NAME</span>
                        </a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev bg-dark w-auto" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next bg-dark w-auto" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <a href="#" class="btn btn-primary btn-lg btn-fbd">View All Kennel</a>
    </div>
</div>

<div class="home-contact-wrapper">
    <div class="home-contact container py-5 text-center">
        <h2>BECOME A KENNEL BREEDER!</h2>
        <p>Think The French Bull Dog could be a good fit for your furry friend? <br> Call us at (+33) 755-5775 or fill out our online registration form to get started! </p>
        <a href="/selecttype"><i class="fas fa-arrow-right"></i></a>

    </div>
</div>
@endsection
<script type="text/javascript" defer>

    function getZip(){
        var inputZip = document.getElementById("zipcode");
        var data;
        fetch('http://frenchbulldog.test/get-address-from-ip')
            .then(data => {
                address = data.json()
                address.then(function (res){
                    inputZip.value = res['zipCode'];
                });
            }).catch(error => { alert('Unknown Location'); });
    }


    window.onload = function (){
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
    }
</script>

