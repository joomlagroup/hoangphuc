
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

    $('.list_project').slick({
        dots: false,
        prevArrow: $('.prev_project_slider'),
        nextArrow: $('.next_project_slider'),
        slidesToShow: 1
    });

    // scrollUp
    var scrollButton = $('#top');

    $(window).scroll(function(){
        $(this).scrollTop() >= 1000 ? scrollButton.show() : scrollButton.hide();
        // console.log($(this).scrollTop());
    });

    // Click on scrollUp button
    scrollButton.click(function(){
        // console.log("click");
        $('html,body').animate({scrollTop:0},600);

    });







    //end code
})

