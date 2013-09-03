jQuery(document).ready(function($){

	$('.wptreehouse-badge').hover(function() {
		$(this).find('.wptreehouse-badge-info').stop(true, true).fadeIn(200);
	}, function() {
		$(this).find('.wptreehouse-badge-info').stop(true, true).fadeOut(200);
	});


	$.post(ajaxurl, {

		action: 'wptreehouse_badges_refresh_profile'

	});

});