<?php 
session_start(); 
//用
?>
<html>
<head>
	<title>增加链接</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel="stylesheet" href="../css/jquery-ui-1.8.18.custom.css">
	<script src="../js/jquery-1.7.1.min.js"></script>
	<script src="../js/jquery-ui-1.8.18.custom.min.js"></script>
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="../css/demos.css">
	<link rel="stylesheet" href="../css/jquery.ui.datepicker.css">
	<script src="../js/jquery.ui.datepicker.js"></script>
	<script src="../js/leftbar.js"></script> 
	
	<script type="text/javascript"> 
	$(function() {
	$(".date").datepicker();
	$(".date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
	});
	</script>
 	
</head>
<body style="text-align:center">
<?php 
	
	if($_SESSION['mark']!="login")
	{
	echo $_SESSION['mark'];
?>
	请从<a href="../login.html">登陆界面</a>登陆进入后台！
<?php
	}
	else
	{
?>
<div class="wrapper">
	<?php include('header.php'); ?>
	<hr size="1" style="border:1px #000000 dotted;">
	<div class="leftbox">
		<?php include('leftbar.php');?>
	</div>

	<div class="rightbox">
			<div id="tab" style="background:#eeeeee;height:740px;text-align:left;">
			<form action="../model/add_link.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td  align="center">链接名字：</td>
					<td ><input id="lname" name="lname" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">链接地址：</td>
					<td ><input id="website" name="website" type="text" size="50" value="http://"  /><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">链接类型：</td>
					<td >
						<select name="mark">
							<option value="0">学术期刊链接</option>
							<option value="1">常用链接</option>
						</select>
					</td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="添加新链接"/></td>
				</tr>
			</table>
				
			</form>
			
			</div>
	</div>
	<hr size="1" style="border:1px #000000 dotted;">
	<?php include('footer.php');?>
</div>
<?php 
	}
?>

<script type="text/javascript">
function check(){
	if(document.getElementById('lname').value=="")
	{
		alert("链接名空！");
		return false;
	}
	if(document.getElementById('website').value=="")
	{
		alert("链接地址！");
		return false;
	}
	return true;
}
</script>

</body>
</html>