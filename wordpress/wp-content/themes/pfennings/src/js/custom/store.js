(function($) {
    $.fn.showStores = function( options ) {
        // Establish our default settings
        var settings = $.extend({
            container    : $(this),
			page         : 1,
			loader    	 : $(this)
        }, options);
		settings.loader.empty().loaderShow();
		$.ajax({
			type: 'POST',
			dataType : "json",
			url: ajaxurl,
			data:{
				action: 'load_stores' 
			},
			beforeSend: function() {
				settings.loader.loaderShow();
			},
			success: function(response) {
				settings.loader.loaderHide();
				//settings.container.append(response);
				 if(response.type=='success') {
					//settings.container.append(response.result);
					$.each( response.result, function( i, item ) {
						var html="<div class='results_wrapper'>";
							html+="<div class='location_name''>"+item.title+"</div>";
							if(item.address) {
								html+="<div class='slp_result_address''>"+item.address+"</div>";
							}
							if(item.citystatezip) {
								html+="<div class='slp_result_address''>"+item.citystatezip+"</div>";
							}
							if(item.country) {
								html+="<div class='slp_result_address''>"+item.country+"</div>";
							}
							if(item.phone) {
								html+="<div class='slp_result_contact''>"+item.phone+"</div>";
							}
							if(item.fax) {
								html+="<div class='slp_result_contact''>"+item.fax+"</div>";
							}
							if(item.website) {
								html+="<div id='slp_result_contact''><a class='' href='"+item.website+"'>Website</a></div>";
							}
							if(item.email) {
								html+="<div id='slp_result_contact''><a id='slp_marker_email' href='mailto:"+item.email+"'>Email</a></div>";
							}
							if(item.directions) {
								html+="<div id='slp_result_contact''><a class='' href='"+item.directions+"'>Directions</a></div>";
							}
							html+="</div>";
						settings.container.append(html);
					});
				} else if(response=='empty') {
					// settings.loader.html("<h6>No records found.</h6>");
				}
			}
		});	
    },
	$.fn.loaderShow = function() {
		$(this).addClass('loader');
	},
	$.fn.loaderHide = function() {
		$(this).removeClass('loader');
	}
}(jQuery));
jQuery(document).ready(function($) {
	var window_height=$(window).height();
	$(".store-map").height(window_height);
	$("#searchForm").appendTo('.search-form');
	$('.stores').showStores();	
	var map, zoom_level=8;
	function initialize() {
		$('#map').addClass('loader');
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			dataType:'json',
			data:{
				action: 'get_map_settings' 
			},
			success: function(response) {
				zoom_level=response.zoom_level;
				var country=response.google_map_country;
				var home_icon=response.icon;
				var marker_icon=response.icon2;
				var map_type=response.map_type;
				var mapOptions = {};
				map = new google.maps.Map(document.getElementById('map'), mapOptions);
				var geocoder = new google.maps.Geocoder(); 
				geocoder.geocode({
						address : country, 
						region: 'no' 
					},
					function(results, status) {
						if (status.toLowerCase() == 'ok') {
							// Get center
							$('#map').removeClass('loader');
							var coords = new google.maps.LatLng(
								results[0]['geometry']['location'].lat(),
								results[0]['geometry']['location'].lng()
							);
							
							map.setCenter(coords);
							map.setZoom(Number(zoom_level));
							// Set marker also
							marker = new google.maps.Marker({
								position: coords, 
								map: map, 
								title: country,
								icon: home_icon,
							});
		 
						}
					}
				);
			}
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
});