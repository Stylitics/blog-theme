$(window).load(function() {
	$('.flexslider-top').flexslider({
		controlNav: false,
		slideshow: true,
		slideshowSpeed: 3000
	});
	$('.flexslider-bottom').flexslider({
		controlNav: false,
		slideshow: false
	});
});

(function(){

	// subscription form show
	$('#subscr-trigger').bind('click', function(){
		$('.newsletter-widget').slideToggle();
	});

	// search form show
	$('#menu-item-973').bind('click', function(){
		$('.search_input').toggle();
	});
	
})();

