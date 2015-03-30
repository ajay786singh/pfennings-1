jQuery(document).ready(function($) {
	var window_height=$(window).height();
	$(".store-map").height(window_height);
	$("#searchForm").appendTo('.search-form');
	$("#map").appendTo('.store-map');
});