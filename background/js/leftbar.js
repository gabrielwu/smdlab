	$(function() {
		$( "#accordion" ).accordion({ active: 0 });	
	});
	
	function modifyAccount() {
	    result = $.ajax({url:"modify_login.php",async:false,data:"&login_mark="+"account"});
		$("#tab").html(result.responseText);
	}
	function modifyPassword() {
	    result = $.ajax({url:"modify_login.php",async:false,data:"&login_mark="+"password"});
		$("#tab").html(result.responseText);
	}
	function memberlist() {
	    result = $.ajax({url:"member_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function paperlist() {
	    result = $.ajax({url:"paper_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function projectlist(){
		result = $.ajax({url:"project_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function devicelist(){
		result = $.ajax({url:"device_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function activitylist(){
		result = $.ajax({url:"activity_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function academiclist(){
		result = $.ajax({url:"academic_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function patentlist(){
		result = $.ajax({url:"patent_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function researchlist(){
		result = $.ajax({url:"research_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function linklist(){
		result = $.ajax({url:"link_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function recommendlist(){
		result = $.ajax({url:"recommend_list.php",async:false});
		$("#tab").html(result.responseText);
	}
	function slidelist(){
		result = $.ajax({url:"slide_list.php",async:false});
		$("#tab").html(result.responseText);
	}

	$(document).ready(function(){
		$(".flip").click(function(){
		$(".panel").slideToggle("slow");
		});
	});