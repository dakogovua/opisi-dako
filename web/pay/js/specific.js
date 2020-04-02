jQuery(document).ready(function($) {

   // $("#intro").backstretch("pay/images/header-background.jpg");

    $('#intro, #map').css({
        'height': $(window).height() / 3
    });
    //  console.log( '$(window).height()',  $(window).height())
    $(window).on('resize', function () {

        $('#intro, #map').css({'height': $(window).height() / 3});
        $('body').css({'width': $(window).width()})

        $("#intro").backstretch("pay/images/header-background.jpg");
    });
});