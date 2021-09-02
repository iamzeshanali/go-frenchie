// Login Form Show Password
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

$(document).ready(function() {

    // Listing card Images Slider
    // $('.fbd-sp-listing-img').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     fade: true,
    //     arrows: true,
    //     focusOnSelect: true,
    //     asNavFor: '.fbd-sp-listing-thumbs'
    // });
    // $('.fbd-sp-listing-thumbs').slick({
    //     slidesToShow: 5,
    //     slidesToScroll: 1,
    //     asNavFor: '.fbd-sp-listing-img',
    //     focusOnSelect: true,
    //     arrows: false
    // });

    // Listing Card Liked Icon
    // $(".fbd-liked-icon").click(function() {
    //     $(".fbd-liked-icon").toggleClass("liked");
    // });


    // Add Listing Form Browse Images
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".image_one");
        file.trigger("click");
    });
    $('.image_one').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#main_image").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-image").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $(document).on("click", ".browse2", function() {
        var file = $(this).parents().find(".image_two");
        file.trigger("click");
    });
    $('.image_two').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#image_two").val(fileName);

    });

    $(document).on("click", ".browse3", function() {
        var file = $(this).parents().find(".image_three");
        file.trigger("click");
    });
    $('.image_three').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#image_three").val(fileName);

    });

    $(document).on("click", ".browse4", function() {
        var file = $(this).parents().find(".image_four");
        file.trigger("click");
    });
    $('.image_four').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#image_four").val(fileName);

    });

    $(document).on("click", ".browse5", function() {
        var file = $(this).parents().find(".image_five");
        file.trigger("click");
    });
    $('.image_five').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#image_five").val(fileName);

    });

    // Breader Dashboard content

    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
        if (this.checked) {
            checkbox.each(function() {
                this.checked = true;
            });
        } else {
            checkbox.each(function() {
                this.checked = false;
            });
        }
    });
    checkbox.click(function() {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});

// Home page Start ////////////////////////////////////

// Home page Slider for Ads

$('.fbd-home-ads-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 3000,
});


// Home page Slider for Kennel Start
$('#myCarousel').carousel({
    interval: 2000
})

$('.carousel .carousel-item').each(function() {
    var minPerSlide = 4;
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});
// Home page Slider for Kennel End

// Home page End ////////////////////////////////////
// To uncheck child elements when parent element is unchecked

// GF Redesign JS
// Homepage testimonials slider
$('.gf-home-testimonial-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
});
