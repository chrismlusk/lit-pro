// Hide Header on on scroll down
var didScroll = null;
var lastScrollTop = 0;
var delta = 5;
var navbar = $('.navbar-default');
var navbarHeight = navbar.outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta){
        return;
    }
    
    // If they scrolled down and are past the navbar, add class .nav-hidden.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        navbar.addClass('navbar-hidden');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            navbar.removeClass('navbar-hidden');
        }
    }
    
    lastScrollTop = st;
}

$(document).ready(function(){
    $(window).scroll(function(){
        var st = $(this).scrollTop();
            if (st >= 420){
                navbar.addClass('inverse');
            } else {
                navbar.removeClass('inverse');
            }
    });
});

$(function () {
  $('[data-toggle="popover"]').popover();
});