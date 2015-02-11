jQuery(document).ready(function($) {
	$("#down-link").click(function(){	
		var target = $('section[role="main"]');
		if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		}
		return false;	
	});
});