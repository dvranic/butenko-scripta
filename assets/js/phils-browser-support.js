// Add mobileHover class to elements with hover effects - This to support IOS devices
jQuery(document).ready(function($) {
    $('.mobileHover').bind('touchstart', function(e) {
        e.preventDefault();
        $(this).toggleClass('mHover');
        // $('#phils-menu-id').removeClass('mHover2');
    });

    $( "#bg-selector" ).on( "touchstart", function(e) {
        e.preventDefault();
        $('.mobileHover').removeClass('mHover');
        $('body').trigger('click');
    });
});
