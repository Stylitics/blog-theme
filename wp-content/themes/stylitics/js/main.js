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

	// search form show
	$('#menu-item-973').bind('click', function(){
		$('.search_input').toggle();
	});
	
})();

