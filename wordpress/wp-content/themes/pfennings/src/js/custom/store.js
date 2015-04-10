(function($) {
    $.fn.showStores = function( options ) {
        // Establish our default settings
        var settings = $.extend({
            container    : $(this),
			page         : 1,
			loader    	 : $(this),
			location     : '',
			distance     : '',
			filter     : '',
        }, options);
		settings.container.empty().loaderShow();
		if(settings.filter=='yes') {
			$('#map').gmap('clear','markers');
		}	
		$('#map').loaderShow();
		$.ajax({
			type: 'POST',
			dataType : "json",
			url: ajaxurl,
			data:{
				action: 'load_stores',
				location: settings.location,
				distance: settings.distance,
			},
			success: function(response) {
				settings.loader.loaderHide();		
				//settings.container.append(response);
				var marker_icon=response.end_icon;
				var home_icon=response.home_icon;
				var zoom_level=response.zoom_level; 
				if(settings.filter=='yes') {
					var geocoder =  new google.maps.Geocoder();
					geocoder.geocode( { 'address': settings.location}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							var center=new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
							$('#map').gmap('option', 'center', center);
							$('#map').gmap('option', 'zoom', Number(zoom_level));
						}
					});
				}
				 if(response.type=='success') {
					$('#map').loaderHide();
					$('#map').gmap().bind('init', function() { 						
						var geocoder =  new google.maps.Geocoder();
						geocoder.geocode( { 'address': response.map_center}, function(results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								var center=new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
								$('#map').gmap('option', 'center', center);
								$('#map').gmap('option', 'zoom', Number(zoom_level));
								$('#map').gmap('addMarker', { 
									'position': center,
									'bounds': false,
									'icon':home_icon
								})
							}
						});
						$.each( response.result, function(i, marker) {
							$('#map').gmap('addMarker', { 
								'position': new google.maps.LatLng(marker.latitude, marker.longitude), 
								'bounds': false,
								'icon':marker_icon
							})
						});
					});
					$.each( response.result, function( i, item ) {
						if(settings.filter=='yes') {
							$('#map').gmap('option', 'zoom', zoom_level);
							$('#map').gmap('addMarker', { 
								'position': new google.maps.LatLng(item.latitude, item.longitude), 
								'bounds': false,
								'icon':marker_icon
							})
						}
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
								html+="<div id='slp_result_contact''><a target='_blank' href='"+item.website+"'>Website</a></div>";
							}
							if(item.email) {
								html+="<div id='slp_result_contact''><a id='slp_marker_email' href='mailto:"+item.email+"'>Email</a></div>";
							}
							if(item.directions) {
								html+="<div id='slp_result_contact''><a target='_blank' href='"+item.directions+"'>Directions</a></div>";
							}
							html+="</div>";
						settings.container.append(html);
					});
				} else {
					$('#map').loaderShow();
					$('#map').gmap('clear','markers');
					settings.container.append("<h6>No store found.</h6>");
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
	$( "#searchForm" ).submit(function( event ) {
		var address=$('#address').val();
		var distance=$('#radiusSelect').val();
		$('.stores').showStores({'location':address,'distance':distance,'filter':'yes'});
		event.preventDefault();
	});
	$('.stores').showStores();
});