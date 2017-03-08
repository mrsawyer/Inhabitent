/**
 * drop-down-navigation.js
 *
 * Menu becomes drop down for mobile widths
 *
 * 
 */

(function ($) {
    // Create the dropdown base
    $("<select />", {
        "id": "selectMenu"
    }).appendTo(".menu-main-menu-container");

    // Create default option "Go to..."
    $("<option />", {
        "selected": "selected",
        "value"   : "",
        "text"    : "Menu"
    }).appendTo(".menu-main-menu-container select")

    // Populate dropdown with menu items
    $(".menu-main-menu-container a").each(function() {
        var el = $(this);
        $("<option />", {
            "value"   : el.attr("href"),
            "text"    : el.text()
        }).appendTo(".menu-main-menu-container select");
    })

    $("#selectMenu").change(function(event) {
        event.preventDefault();
        window.location = $(this).find("option:selected").val();
    }).selectric();

})(jQuery);
