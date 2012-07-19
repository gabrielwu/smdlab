$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#research_li").addClass("current_head_nav");
	/*
	$("#sidebar_nav_r1").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	*/
	$("#pip_nav_li").addClass("current");
	resize_layout();
});
function page_model() {
    var request_page;
}
function resize_layout() {
    var height = $("#r_area").height() + 10;
	$("#main").height(height + 30);
	$("#content").height(height + 30);
	$("#sidebar").height(height);
	//alert($("#sidebar").height());
}
function page(request_page) {
    var model = new page_model();
	model.request_page = request_page;
    $.ajax({
        url: "./ajax/project_in_progress_page.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#r_area").css("display", "none");
    		    $("#r_area").html(result).fadeIn("500");		
                resize_layout();				
            }
    });
}