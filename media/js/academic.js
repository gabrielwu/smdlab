$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#academic_li").addClass("current_head_nav");
	$("#a_content img").each(function() {
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
		'titlePosition' 	: 'over',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
		    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
	    }
    });
	for (var i = 0; i < 1000; i++) ; 
	resize_layout();
});
function resize_layout() {
    var height = $("#area").height() + 10;
	var obj = document.getElementById("item");
	if (obj) {
	    height = $("#item").height() + 10;
		$("#area").height(height)
	}
	$("#main").height(height + 30);
	$("#content").height(height + 30);
	$("#sidebar").height(height);
}
function page(request_page) {
    var model = new page_model();
	model.request_page = request_page;
	model.a_type = $("#a_type").val();
	$.ajax({
        url: "./ajax/academic_page.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#news_items").remove();
			    $("#page").remove();
				var html = $("#area").html();
    		    $("#area").html(html + result).fadeIn("500");				
            }
    });
}
function page_model() {
    var request_page;
	var a_type;
}