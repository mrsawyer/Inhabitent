/**
 * search-bar-slide.js
 *
 * Slides open search bar on click
 *
 * Learn more: https://github.com/Automattic/RED Starter Theme/pull/136
 */
(function ($) {
    $('.fa-search').on('click', function(event) {
        event.preventDefault();
        $( ".search-field" ).toggleClass( 'search-field-open');
    })
})(jQuery);
