/**
 *
 *	All the custom js code for theme goes here.
 *
 **/
 
 jQuery(document).ready(function() {
	jQuery('#masthead #search-icon').toggle(function() {
		jQuery('#masthead #searchform').animate({left: '-=200px'}, 200);
		jQuery('#masthead #search-icon').animate({left: '-=200px'}, 200);
	}, function() {
		jQuery('#masthead #searchform').animate({left: '+=200px'}, 200);
		jQuery('#masthead #search-icon').animate({left: '+=200px'}, 200);
	});
 });
 
 jQuery(function(){
	jQuery('.nav-menu').slicknav();
});

jQuery(function() {
	jQuery('#social-share').toggle(function() {
		jQuery('#social-icons').animate({left: '+=70px'}, 200);
		jQuery('#social-share').animate({left: '+=50px'}, 200);
	}, function() {
		jQuery('#social-icons').animate({left: '-=70px'}, 200);
		jQuery('#social-share').animate({left: '-=50px'}, 200);
	});
});