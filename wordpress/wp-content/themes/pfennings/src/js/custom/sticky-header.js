function getCurrentScroll() {
	return window.pageYOffset || document.documentElement.scrollTop;
}
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
jQuery(function(){
 var stickHeader = 70;
	if( !isMobile.any()) { 		
		jQuery(window).scroll(function() {
			var scroll = getCurrentScroll();
			if ( scroll >= stickHeader ) {
			   jQuery('section[role="banner"] header').addClass('sticky');
			}
			else {
				jQuery('section[role="banner"] header').removeClass('sticky');
			}
		});
	}
});