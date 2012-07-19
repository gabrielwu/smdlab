<?php 
session_start(); 
//用
?>
<html>
<head>
	<title>增加推荐资料</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel="stylesheet" href="../css/jquery-ui-1.8.14.custom.css">
	<script src="../js/jquery-1.5.1.min.js"></script>
	<script src="../js/jquery-ui-1.8.14.custom.min.js"></script>

	<link rel="stylesheet" href="../css/demos.css">
	<link rel="stylesheet" href="../css/jquery.ui.datepicker.css">
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
			<form action="../model/add_recommend.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;<td>
				</tr>
				<tr>
					<td width="100px" align="center">资料名字：</td>
					<td width="520px"><input id="rename" name="rename" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;资料摘要（不可为空）：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="content" style="width:650px;height:500px;">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
					<script>
						var editor;
						KindEditor.ready(function(K) {
							editor = K.create('#editor1');
						});
					</script>
					</td>
				</tr>
				<tr>
				    <td>
					    <input type="button" value="附件删除" onclick="showContent()">
						<div id="attachment_manage" title="附件删除"></div>
					</td>
				</tr>
				<tr>
					<td width="100px" align="center">资料链接：</td>
					<td width="520px"><input id="relink" name="relink" type="text" size="50" value="http://"/><font color="red">*</font></td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="添加新推荐资料"/></td>
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

<script type="text/javascript" charset="utf-8" src="../js/attachment.js"></script>
<script type="text/javascript">
function check(){
	if(document.getElementById('rename').value=="")
	{
		alert("资料名字空！");
		return false;
	}
	if(document.getElementById('editor1').value=="")
	{
		alert("资料摘要空！");
		return false;
	}
	if(document.getElementById('relink').value=="")
	{
		alert("资料链接空！");
		return false;
	}
	return true;
}
</script>

</body>
</html>