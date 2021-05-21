(function($){
	"use strict"; 
	
	// Header Area start
	  $(window).on('scroll',function() {    
	   var scroll = $(window).scrollTop();
	   if (scroll < 245) {
	    $(".header-sticky").removeClass("sticky");
	   }else{
	    $(".header-sticky").addClass("sticky");
	   }
	  }); 
	  

	if ( $('body').hasClass('logged-in') ) {
		var top_offset = $('.header-area').height() + 32;
	} else {
		var top_offset = $('.header-area').height() - 28;
	}

	$('.primary-nav-one-page nav').onePageNav({
	     scrollOffset: top_offset,
		 scrollSpeed: 750,
		 easing: 'swing',
		 currentClass: 'active',
	});

	$('body').scrollspy({target: ".primary-nav-wrap nav"});
	$(".primary-nav-one-page nav ul li:first-child").addClass("active"); 

	$('.primary-nav-wrap > nav > ul > li').slice(-2).addClass('last-elements');
	
    // Mobile Menu
    $('.primary-nav-wrap nav').meanmenu({
        meanScreenWidth: mobile_menu_data.menu_width,
        meanMenuContainer: '.mobile-menu',
        meanMenuClose: '<i class="fa fa-times"></i>',
        meanMenuOpen: '<i class="fa fa-bars"></i>',
        meanRevealPosition: 'right',
        meanMenuCloseSize: '25px',
    });

	// scrollUp
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
		

	
})(jQuery);