@extends('./layouts.app')

@section('content')


<div class="mt-5 container bg-white rounded p-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-4">
            <div class="breeder-profile-image text-center">
                <img src="images/profile.png" alt="Breeder Profile Image" width="200px">
            </div>
        </div>
        <div class="breeder-profile-info col-md-8 d-flex flex-column">
            <h4 title="Kennel Name"><i class="fa fa-igloo"></i>Black Rock Cannie</h4>
            <a href="#"><i class="fas fa-map-marker-alt"></i>&nbsp;27 RUE PASTEUR, 14390 CABOURG, FRANCE </a>
            <a href="#"><i class="fas fa-globe" title="Website"></i> www.blackrock.com</a>
            <span><i class="fas fa-ticket-alt"></i>RX-580</span>
        </div>
    </div>

    <div class="breeder-profile-name mb-3">
        <h4 title="Breeder Name">Bella Max Breeder</h4>
    </div>

    <div class="row breeder-profile-contact mb-5">
        <div class="col-md-4">
            <a href="tel:+3333378901" title="call"><i class="fas fa-phone-alt"></i>+33 215 23214</a> <br>
            <a href="mailto:someone@example.com" title="Email"><i class="far fa-envelope"></i>text@frenchbulldogs.com</a>
        </div>
        <div class="col-md-4">
            <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i> /blackrok</a> <br>
            <a href="#" title="Instagram"><i class="fab fa-instagram"></i> /rockkennie</a>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-3 text-center">
            <img src="images/kennel-logo.png" alt="Kennel Logo" title="Kennel Logo" width="100px">
        </div>
        <div class="col-md-9 text-justify">
            <p class="breeder-profile-about">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
            </p>
        </div>
    </div>

</div>

<div class="text-center my-3">
    <h2>Breeder Resources</h2>
</div>

<div class="container mb-5">
    <div class="breeder-profile-resources">
        <div class="row breeder-resources-cards">
            <div class="col-md-4 breeder-resources-card bg-white p-4 rounded">
                <div class="text-center mb-3">
                    <img src="images/resource-bag.png" alt="Product Image" width="100px">
                </div>
                <div class="product-card-info">
                    <h5>Woof Puppy Food</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <a href="#"><i class="fas fa-link"></i> &nbsp; ww.w.blackrock.com</a>
                    <div class="price float-right"><span>$320.00</span></div>
                </div>
            </div>

        </div>

    </div>
</div>


<!-- <div class="container breeder-profile-area rounded p-3 mb-3">
    <div class="row">
        <div class="col-md-3 text-center">
            <img src="images/breeder.png" alt="User image not found" width="250px" height="250px">
        </div>
        <div class="col-md-9 mt-4">
            <div class="row mb-2">
                <div class="breeder-profile-title col-sm-4">Black Rock Cannie</div>
                <div class="breeder-profile-location col-sm-8"><a href=""><i class="fas fa-map-marker-alt"></i> &nbsp; Salbris</a></div>
            </div>
            <div class="row mb-3">
                <div class="breeder-profile-phone col-sm-4"><a href=""><i class="fas fa-phone-alt"></i> &nbsp; +33 213 12548</a></div>
                <div class="breeder-profile-email col-sm-8"><a href=""><i class="far fa-envelope"></i> &nbsp; text@frenchbulldog.com</a></div>
            </div>
            <div class="breeder-profile-description">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="row breeder-profile-social">
        <div class="col-md-4">
            <a href=""><i class="fab fa-facebook-f"></i> &nbsp; blackRockCannie</a>
        </div>
        <div class="col-md-4">
            <a href=""><i class="fab fa-instagram"></i> &nbsp; blackRockCannie</a>
        </div>
        <div class="col-md-4">
            <a href=""><i class="fas fa-globe"></i> &nbsp; www.blackrock.com </a>
        </div>
    </div>
</div> -->

@endsection