
jQuery.noConflict();
jQuery(document).ready(function($){
    'use strict';

    $(window).scroll(function () {
        if ($(window).width() >= 0) {
            if ($(this).scrollTop() > 40) {
                $('header').addClass("sticky");
            }
            else {
                $('header').removeClass("sticky");
            }
        }
        else {
            $('header').removeClass("sticky");
        }

    });

    //start code
    $(".close_menu").click(function(){
        $(".navbar-collapse").removeClass("show");
    })

    $('.slideHome').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        dots: false
    });

    $(".slideHome").on("beforeChange", function (){

        $('.animatedParent ').removeClass('animated');
        $('.animatedParent ').hide();

    })

    $(".slideHome").on("afterChange", function (){
        $('.animatedParent ').addClass('animated');
        $('.animatedParent ').show('fast');
    })

    var slidesToShow_videos = 4;

    var window_width = $( document ).width();

    if(window_width<768) {
        var slidesToShow_videos = 2;
    }

    $('.video-content').slick({
        dots: false,
        prevArrow: $('.prev_video_slider'),
        nextArrow: $('.next_video_slider'),
        slidesToShow: slidesToShow_videos
    });




    //end code
})

