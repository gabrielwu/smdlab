﻿$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#library_li").addClass("current_head_nav");
	
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
	fancyboxInit();
	resize_layout();
});
function resize_layout() {
    var height = $("#area").height() + 10;
	$("#main").height(height + 30);
	$("#content").height(height + 30);
	$("#sidebar").height(height);
}
function page_model() {
    var index;
}
function more(index) {
    var model = new page_model();
	model.index = index;
    $.ajax({
        url: "./ajax/library.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#more").remove();	
                var html = $("#area").html();
                $("#area").html(html + result);	
				fancyboxInit();
                resize_layout();				
            }
    });
}

function fancyboxInit() {
	$(".item img").each(function() {
	    $(this).attr("title",'点击查看大图');
	    var ori = $(this).parent().html();
	    var title = $(this).parent().next().text();
		if (title.indexOf("图片") == -1) {
		    title = "";
		} 
		var html = "<a rel='example_group' title='"+title+"' href='"+$(this).attr("src")+"'>";
		html = html + ori;
		html = html + "</a>";
	    $(this).parent().html(html);
	});
	$("a[rel=example_group]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'showNavArrows'     :  false
    });
}