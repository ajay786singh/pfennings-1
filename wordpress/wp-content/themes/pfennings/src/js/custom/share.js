jQuery(document).ready(function($) {
	var social_div=$("#share");
	if ( social_div.length){
		$('#twitter').sharrre({
			share: {
				twitter: true
			},
			urlCurl: share_function_url,
			enableHover: false,
			enableTracking: true,
			buttons: {  twitter: { via: 'pfennings' } },
			click: function(api, options){
				api.simulateClick();
				api.openPopup('twitter');
			}
		});
		$('#googleplus').sharrre({
			share: {
				googlePlus: true
			},
			urlCurl: share_function_url,
			enableHover: false,
			enableTracking: true,
			buttons: {  },
			click: function(api, options){
				api.simulateClick();
				api.openPopup('googlePlus');
			}
		});
		$('#facebook').sharrre({
			share: {
				facebook: true
			},
			urlCurl: share_function_url,
			enableHover: false,
			enableTracking: true,
			click: function(api, options){
				api.simulateClick();
				api.openPopup('facebook');
			}
		});
		$('#linkedin').sharrre({
			share: {
				linkedin: true
			},
			urlCurl: share_function_url,
			enableHover: false,
			enableTracking: true,
			buttons: {  },
			click: function(api, options){
				api.simulateClick();
				api.openPopup('linkedin');
			}
		});
		$('#pinterest').sharrre({
			share: {
				pinterest: true
			},
			urlCurl: share_function_url,
			enableHover: false,
			enableTracking: true,
			buttons: {  
				pinterest: { media: share_image, description: '' } },
				click: function(api, options){
				api.simulateClick();
				api.openPopup('pinterest');
			}
		});
	}	
});