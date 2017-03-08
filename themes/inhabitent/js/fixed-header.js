/**
 * fixed-header.js
 *
 * header changes once scrolled past top
 *
 * Learn more: https://github.com/Automattic/RED Starter Theme/pull/136
 */

(function ($) {

    console.log('WHAT')
    $('.site-header').addClass('custom-site-header');

    $(window).on('scroll',function(){
        var pageHeader = $('.custom-header').height()
        console.log('hello')

        // we round here to reduce a little workload
        var stop = Math.round($(window).scrollTop());
        if (stop <= pageHeader) {
            $('.site-header').addClass('custom-site-header');
        } else {
            $('.site-header').removeClass('custom-site-header');
        }
    })

})(jQuery);
