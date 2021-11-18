/* Template Name: Zorial - Responsive Bootstrap 4 Landing Page Template
    Author: Themesdesign
    Version: 1.0.0
    Created: Jan 2020
    File Description: Main js file*/

// STICKY
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".sticky").addClass("nav-sticky");
    } else {
        $(".sticky").removeClass("nav-sticky");
    }
});

// SmoothLink
$('.nav-item a, .mouse-down a').on('click', function (event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - 0
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
});

// light/dark mode button
$("#mode").on('click', function(event){
    var currentMode = $(event.currentTarget).attr('mode');
    if(currentMode == "light") {
        $("#app-css").attr('href', 'css/style-dark.css');
        $("#mode").attr('mode', 'dark');
    } else {
        $("#app-css").attr('href', 'css/style.css');
        $("#mode").attr('mode', 'light');
    }
});


//Scrollspy
$(".navbar-nav").scrollspy({
    offset: 70
});

function initScrollspy() {
    $("#navbarCollapse").scrollspy({
        offset: 20
    });
}

// STICKY BUTTON
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".nav-btn").addClass("active");
    } else {
        $(".nav-btn").removeClass("active");
    }
});



// owl carousel

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    autoplay:true,
    autoplay:3000,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});