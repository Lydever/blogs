$(document).ready(function ($) {
    $('#toggle-button').click(function () {
        if ($(window).width() < 971) {
            $('#navbarSupportedContent').css({
                top: '0'
            });
            $('#navbarSupportedContent').css('opacity', '1');
        }
    })


    $('#cls-btn').click(function () {
        if ($(window).width() < 971) {
            $('#navbarSupportedContent').css({
                top: '-700px'
            });
            $('#navbarSupportedContent').css('opacity', '0');
        }
    })
    if (screen.width > 1024) {
        AOS.init({
            easing: 'ease-in-out-sine',
            once: true,
        });
    }
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrolltop').stop().fadeIn();
            $('.top').hide();
        } else {
            $('.scrolltop').stop().fadeOut();
            $('.top').show();
        }
    });

    $(".scroll").click(function () {
        $("html,body").animate({
            scrollTop: $(".top").offset().top
        }, "1000");
        return false
    });
});