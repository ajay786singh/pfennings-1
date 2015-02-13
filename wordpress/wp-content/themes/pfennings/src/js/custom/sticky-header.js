jQuery(function(){
 var stickHeader = 70;
  jQuery(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= stickHeader ) {
           jQuery('section[role="banner"] header').addClass('sticky');
        }
        else {
            jQuery('section[role="banner"] header').removeClass('sticky');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});