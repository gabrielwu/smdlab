<?php 
session_start(); 
?>
<html>
<head>
	<title>代码文件</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel="stylesheet" href="../css/jquery-ui-1.8.14.custom.css">
	<script src="../js/jquery-1.5.1.min.js"></script>
	<script src="../js/jquery-ui-1.8.14.custom.min.js"></script>

	<link rel="stylesheet" href="../css/demos.css">
	<link rel="stylesheet" href="../css/jquery.ui.datepicker.css">
	<style>
	#tab {
	    background: #fff;
	}
	#file_path_area a {
	    padding-left: 20px;
	    cursor: pointer;
	}
	#file_path_area {
	    margin-top: 20px;
	}
	#form {
	    width: 70%;
		margin: 0px auto;
		padding-top: 40px;
	}
	#form ul{
	    padding: 0 0 0 20px;
		margin: 0px auto;
	}
	#form ul li{
	    list-style: none;
	}
	.dir1 {
	   background: url(../css/images/dir1.png) 0 0 no-repeat;
	}
	.dir2 {
	   background: url(../css/images/dir2.png) 0 0 no-repeat;
	}
	</style>
	<script src="../js/jquery.ui.datepicker.js"></script>
	<script src="../js/jquery.ui.dialog.js"></script>
	<script src="../js/leftbar.js"></script> 
	
	<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
	
	
	<script type="text/javascript"> 
	$(function() {
	$(".date").datepicker();
	$(".date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
	});
	</script>
</head>
<body style="text-align:center">
<?php 	
	if($_SESSION['mark']!="login") {
	echo $_SESSION['mark'];
?>
	请从<a href="../login.html">登陆界面</a>登陆进入后台！
<?php
	} else {
?>
<div class="wrapper">
	<?php include('header.php'); ?>
	<hr size="1" style="border:1px #000000 dotted;">
	<div class="leftbox">
		<?php include('leftbar.php');?>
	</div>

	<div class="rightbox" style="min-height: 700px">
			<div id="tab" style="min-height:740px;text-align:left;">
			<form id="form" action="../model/add_code_file.php" method="post" enctype="multipart/form-data">
			<input type="file" name="code_file" id="code_file"/>
			<div id="file_path_area">
			    <div>选择文件夹</div>
			    <ul>
				    <?php
                        $root_dir = "../../";
						if (is_dir($root_dir)) { 
						    if ($dh = opendir($root_dir)) { 
							    while (($dir = readdir($dh)) !== false) { 
								    if ($dir!="." && $dir!=".." && !is_file($root_dir.$dir)) { 
									    $dir_id = sha1($root_dir.$dir);
									    ?>
										<li id="<?php echo $dir_id;?>" title="show">
										    <a class="dir1" id="<?php echo $dir_id."_a";?>" onclick="show_hide_dir('<?php echo $root_dir.$dir."','".$dir_id;?>')"><?php echo $dir;?></a>
										</li>
										<?php
									} 
								} 
								closedir($dh); 
							} 
							if ($dh = opendir($root_dir)) { 
							    while (($dir = readdir($dh)) !== false) { 
								    if ($dir!="." && $dir!=".." && is_file($root_dir.$dir)) { 
									    $file_id = sha1($root_dir.$dir);
									    ?>
										<li id="<?php echo $file_id;?>" title="show">
										    <a id="<?php echo $file_id."_a";?>" ><?php echo $dir;?></a>
										</li>
										<?php
									} 
								} 
								closedir($dh); 
							} 
						} 
					?>
				</ul>
				<input type="hidden" id="dir_selected" name="dir_selected"/>
				<input type="submit" name="submit" value="Submit" />
			</div>			
			</form>			
			</div>
	</div>
	<hr size="1" style="border:1px #000000 dotted;">
	<?php include('footer.php');?>
</div>
<script>
function show_hide_dir(path,id) {
	if ($("#"+id).attr("title") == "show") {
	    $("#dir_selected").val(path);
		//$("#file_path_area a").css("background", "transparent");
		$("#file_path_area a").css("background-color", "#fff");
		$("#"+id+"_a").css("background-color", "#D7EBF9");
		$("#"+id+"_a").addClass("dir2");
		var data1 = new dir();
		data1.dir_path = path;
		$.ajax({
				type: 'POST',
				url: "../model/code_file_dir.php",
				data: data1,
				success: function(res) {
					$("#"+id).append(res);
					$("#"+id).attr("title", "hide");
				}
		});
	} else {
	    $("#"+id).attr("title", "show");
		$("#"+id+"_a").removeClass("dir2");
		$("#"+id+"_a").css("background-color", "#fff");
		$("#"+id+" ul").remove();
	}
}
function dir() {
    var dir_path;
}
</script>
<?php } ?>
</body>
</html>