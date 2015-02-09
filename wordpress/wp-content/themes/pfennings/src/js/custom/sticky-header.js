jQuery(document).ready(function($) {
	var $header = $('section[role="banner"] header');
	var $sticky="sticky";
	var $position="100";
	$(window).on("scroll", function() {
		var fromTop = $("body").scrollTop();		
		if( fromTop > $position && !$header.hasClass($sticky) ) {
			$header.addClass($sticky);
		   } else if ( fromTop <= $position ) {
			$header.removeClass($sticky);
		}
	});
});