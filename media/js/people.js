$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#people_li").addClass("current_head_nav");
	
	/*
	$("#sidebar_nav_p1").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	*/
	resize_layout();
});
function page_model() {
    var index;
}
function resize_layout() {
    var height = $("#area").height() + 10;
	$("#main").height(height + 30);
	$("#content").height(height + 30);
	$("#sidebar").height(height);
	//alert($("#sidebar").height());
}
function more(index) {
    var model = new page_model();
	model.index = index;
    $.ajax({
        url: "./ajax/research.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#more").remove();	
                var html = $("#area").html();
                $("#area").html(html + result);	
                resize_layout();				
            }
    });
}