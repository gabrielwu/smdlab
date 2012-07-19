$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#photos_li").addClass("current_head_nav");
	
	$("#sidebar_nav_1").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	$("#sidebar_nav_2").accordion({
			autoHeight: false,
			navigation: true,
			active: false,
			collapsible: true
	});
	$("#sidebar_nav_3").accordion({
			autoHeight: false,
			navigation: true,
			active: false,
			collapsible: true
	});
	$("#sidebar_nav_4").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	$("#sidebar_nav_1 h3").unbind("click");
	$("#sidebar_nav_4 h3").unbind("click");
});
$(document).ready(function() {
	$("a[rel=example_group]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'titlePosition' 	: 'over',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
		    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
	    }
    });
});