$(window).load(function() {
	$('.flexslider').flexslider({
		controlNav: false
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

