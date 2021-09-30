// Login Form Show Password
function showPassword(password) {
    var x = document.getElementById(password);
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


    // Breeder Registration Form Kennel Logo Browse
    $(document).on("click", ".browse-b-logo", function() {
        var file = $(this).parents().find(".breeder-logo");
        file.trigger("click");
    });
    $('.breeder-logo').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#breeder-logo").val(fileName);

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
// Header JS
const nav = document.querySelector('nav')
window.addEventListener('scroll', fixNav)

function fixNav() {

    if(window.scrollY > nav.offsetHeight + 150) {
        nav.classList.add('active')
    } else {
        nav.classList.remove('active')
    }
}

//Homepage Featured Frenchies Slider
$('.gf-featured-frenchies-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    // autoplay: true,
    // autoplaySpeed: 5000,
    dots: true,
    lazyLoad: 'ondemand',
});

// Homepage testimonials slider
$('.gf-home-testimonial-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
});
$('.gf-kennel-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
]
});

////////Captcha on contact form js
let captchaText = document.querySelector('#captcha');
if (captchaText){
        var ctx = captchaText.getContext("2d");
        // console.log(captchaText);
        var ctx = captchaText.getContext("2d");
        ctx.font = "48px Proxima-Nova";
        ctx.fillStyle = "#BE202E";
        let userText = document.querySelector('#textBox');
        let submitButton = document.querySelector('#submitButton');
        let output = document.querySelector('#output');
        let refreshButton = document.querySelector('#refreshButton');

    // alphaNums contains the characters with which you want to create the CAPTCHA
        let alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        let emptyArr = [];
    // This loop generates a random string of 7 characters using alphaNums
    // Further this string is displayed as a CAPTCHA
        for (let i = 1; i <= 7; i++) {
            emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
        }
        var c = emptyArr.join('');
        ctx.fillText(emptyArr.join(''),captchaText.width/4, captchaText.height/2);

    // This event listener is stimulated whenever the user press the "Enter" button
    // "Correct!" or "Incorrect, please try again" message is
    // displayed after validating the input text with CAPTCHA
        userText.addEventListener('keyup', function(e) {
            // Key Code Value of "Enter" Button is 13
            if (e.keyCode === 13) {
                if (userText.value === c) {
                    output.classList.add("correctCaptcha");
                    output.innerHTML = "Correct!";
                } else {
                    output.classList.add("incorrectCaptcha");
                    output.innerHTML = "Incorrect, please try again";
                    $("btn-submit-contact-us").attr('disabled', true);
                }
            }
        });
    // This event listener is stimulated whenever the user clicks the "Submit" button
    // "Correct!" or "Incorrect, please try again" message is
    // displayed after validating the input text with CAPTCHA
        submitButton.addEventListener('click', function() {
            if (userText.value === c) {
                output.classList.add("correctCaptcha");
                output.classList.remove("incorrectCaptcha");
                output.innerHTML = "Correct!";
                // $('#btn-submit-contact-us').attr('disabled',false);

            } else {
                output.classList.add("incorrectCaptcha");
                output.classList.remove("correctCaptcha");
                output.innerHTML = "Incorrect text, please try again";
            }
        });
    // This event listener is stimulated whenever the user press the "Refresh" button
    // A new random CAPTCHA is generated and displayed after the user clicks the "Refresh" button
        refreshButton.addEventListener('click', function() {
            userText.value = "";
            let refreshArr = [];
            for (let j = 1; j <= 7; j++) {
                refreshArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
            }
            ctx.clearRect(0, 0, captchaText.width, captchaText.height);
            c = refreshArr.join('');
            ctx.fillText(refreshArr.join(''),captchaText.width/4, captchaText.height/2);
            output.innerHTML = "";
        });
}





// // Stick a section js
// $(window).scroll(reOrder)
// $(window).resize(reOrder)
//
// function reOrder() {
//     var mq = window.matchMedia("(min-width: 992px)");
//     if (mq.matches) {
//         $('.gf-adds-area').addClass('gf-custom'); //add customm class if large screen size
//     //     var scroll = $(window).scrollTop(),
//     //         topContent = $('.page-content').position().top - 25, //reference position, stick starting point
//     //         sectionHeight = $('.fbd-content-area').height(), //reference height
//     //         addHeight = $('.gf-side-add-image').height(), //add height
//     //         bottomContent = topContent + sectionHeight - addHeight - 100;
//     //
//     //     if (scroll > topContent && scroll < bottomContent) {
//     //         $('.customm').removeClass('posAbs').addClass('posFix');
//     //     } else if (scroll > bottomContent) {
//     //         $('.customm').removeClass('posFix').addClass('posAbs');
//     //     } else if (scroll < topContent) {
//     //         $('.customm').removeClass('posFix');
//     //     }
//     } else {
//         $('.gf-adds-area').removeClass('gf-custom');
//     }
// }
