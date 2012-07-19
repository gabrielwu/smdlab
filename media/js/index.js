$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#index_li").addClass("current_head_nav");
	
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
	$("#clicks").html($("#clicks a").html());
	resize_layout();
});
function resize_layout() {
    var height = $("#paper_items").height() + $("#paper_area h5").height() + 50;
	$("#paper_area").height(height);
}
function paper_page(request_page) {
    var model = new paper_page_model();
	model.request_page = request_page;
	$.ajax({
        url: "./ajax/index_paper_page.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#paper_items").css("display", "none");
    		    $("#paper_items").html(result).fadeIn("500");	
				resize_layout();			
            }
    });
}
function paper_page_model() {
    var request_page;
	var current;
}