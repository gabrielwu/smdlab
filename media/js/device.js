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
	$("#d_li").addClass("current");
	resize_layout();
});
function resize_layout() {
    var height = $("#r_area").height() + 10;
	$("#main").height(height + 30);
	$("#content").height(height + 30);
	$("#sidebar").height(height);
	//alert($("#sidebar").height());
}
function page_model() {
    var index;
}
function more(index) {
    var model = new page_model();
	model.index = index;
    $.ajax({
        url: "./ajax/device.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#more").remove();	
                var html = $("#r_area").html();
                $("#r_area").html(html + result);	
                resize_layout();				
            }
    });
}