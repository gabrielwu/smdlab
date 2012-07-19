<?php 
session_start(); 
//用
?>
<html>
<head>
	<title>增加成员</title>
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
			<form action="../model/add_member.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td width="80px" align="center">中文名：</td>
					<td width="520px"><input id="cname" name="cname" type="text"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td width="80px" align="center">英文名：</td>
					<td width="520px"><input id="ename" name="ename" type="text"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td width="80px" align="center">职称：</td>
					<td width="520px">
						<select name="title">
							<option value="e1">研一</option>
							<option value="e2">研二</option>
							<option value="e3">研三</option>
							<option value="d1">博一</option>
							<option value="d2">博二</option>
							<option value="d3">博三</option>
							<option value="d4">博士后</option>
							<option value="c">讲师</option>
							<option value="b">副教授</option>
							<option value="a">教授</option>
						</select>
					</td>
				<tr>
				<tr>
					<td width="80px" align="center">状态：</td>
					<td width="520px">
						<select name="mark">
							<option value="1">在职（在读）</option>
							<option value="0">离职（毕业）</option>
						</select>
					</td>
				<tr>
				<tr>
					<td width="80px" align="center">权限：</td>
					<td width="520px">
						<select name="permit">
							<option value="1">查看、发表组内新闻</option>
							<option value="0">查看组内新闻</option>
						</select>
					</td>
				<tr>
				<tr>
					<td width="80px" align="center">电子邮件：</td>
					<td width="520px"><input name="email" type="text"/></td>
				<tr>
				<tr>
					<td width="80px" align="center">电话：</td>
					<td width="520px"><input name="tel" type="text"/></td>
				<tr>
				<tr>
					<td width="80px" align="center">办公室：</td>
					<td width="520px"><input name="office" type="text"/></td>
				<tr>
				<tr>
					<td colspan="2">详细信息(不可为空)：</td>
				<tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="details" style="width:650px;height:400px;">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
					<script>
						var editor;
						KindEditor.ready(function(K) {
							editor = K.create('#editor1');
						});
					</script>
					</td>
				<tr>
				<tr>
				    <td>
					    <input type="button" value="附件删除" onclick="showContent()">
						<div id="attachment_manage" title="附件删除"></div>
					</td>
				</tr>
				<tr>
					<td align="center">上传头像：</td>
					<td><input name="img" type="file"/></td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="添加新成员"/></td>
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
	if(document.getElementById('cname').value=="")
	{
		alert("中文名空！");
		return false;
	}
	if(document.getElementById('ename').value=="")
	{
		alert("英语名空！");
		return false;
	}
	return true;
}
</script>

</body>
</html>