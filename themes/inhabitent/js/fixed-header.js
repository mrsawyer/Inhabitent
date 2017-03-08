/**
 * fixed-header.js
 *
 * Header changes style once scrolled past top
 *
 * 
 */

(function ($) {

    $('.site-header').addClass('custom-site-header');

    $(window).on('scroll',function(){
        var pageHeader = $('.custom-header').height()
        console.log('hello')
        var stop = Math.round($(window).scrollTop());
        if (stop <= pageHeader) {
            $('.site-header').addClass('custom-site-header');
        } else {
            $('.site-header').removeClass('custom-site-header');
        }
    })
})(jQuery);
