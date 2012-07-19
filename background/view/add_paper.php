<?php 
session_start(); 
//用
?>
<html>
<head>
	<title>增加论文</title>
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
	$("#date").datepicker();
	//$("#date").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
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
			<form action="../model/add_paper.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td width="100px" align="center">论文号：</td>
					<td width="520px"><input id="pid" name="pid" type="text" size="50"/><font color="red">*论文唯一标示，不可重复</font></td>
				<tr>
				<tr>
					<td  align="center">论文名字：</td>
					<td ><input id="pname" name="pname" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">论文作者：</td>
					<td ><input id="pauthors" name="pauthors" type="text" size="50"/><font color="red">*多个作者用半角逗号分隔</font></td>
				<tr>
				<tr>
					<td  align="center">发表期刊：</td>
					<td ><input id="journal" name="journal" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">期刊号（页数）：</td>
					<td ><input id="journal_no" name="journal_no" type="text" size="50"/></td>
				<tr>
				<tr>
					<td  align="center">发表时间：</td>
					<td ><input id="date" name="date" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">期刊连接：</td>
					<td ><input name="link" type="text" size="50" value="http://"/></td>
				<tr>
				<tr>
					<td  align="center">下载链接：</td>
					<td ><input name="dlink" type="text" size="50" value="http://"/></td>
				<tr>
				<tr>
					<td colspan="2">论文摘要：</td>
				<tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="abstract" style="width:650px;height:400px;">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
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
					<td align="center">上传封面：</td>
					<td><input name="img" type="file"/></td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="添加新论文"/></td>
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
	if(document.getElementById('pid').value=="")
	{
		alert("论文号空！");
		return false;
	}
	if(document.getElementById('pname').value=="")
	{
		alert("论文名空！");
		return false;
	}
	if(document.getElementById('pauthors').value=="")
	{
		alert("论文作者空！");
		return false;
	}
	if(document.getElementById('journal').value=="")
	{
		alert("期刊空！");
		return false;
	}
	if(document.getElementById('date').value=="")
	{
		alert("发表时间空！");
		return false;
	}
	return true;
}
</script>

</body>
</html>