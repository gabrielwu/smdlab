<?php 
session_start(); 
//用
?>
<html>
<head>
	<title>修改研究方向</title>
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
			<?php
				include("connect.php");
				$sql="select r_name,r_pic_path,r_content,r_id from research where r_id=".$_GET['id'];
				mysql_query("set names 'gb2312'");
				$result=mysql_query($sql);
				$row=mysql_fetch_row($result);
				
			
			?>
			<form action="../model/modify_research.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2"><input id="id" name="id" type="text" size="50" value="<?php echo $row[3];?>" style= "visibility:hidden "/></td>
				</tr>
				<tr>
					<td  align="center">研究方向 ：</td>
					<td ><input id="rname" name="rname" type="text" size="50" value="<?php echo $row[0];?>"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td colspan="2">
						<img width="650px" height="150px" src="<?php echo $row[1];?>" alt="无图片"/>
					</td>
				</tr>
				<tr>
					<td align="center">删除原图片:<input name="del_img" type="checkbox" value="<?php echo $row[1];?>" ></td>
					<td  colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上传（替换）图片：<input name="img" type="file"/></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目内容：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="content" style="width:650px;height:400px;" ><?php echo $row[2];?></textarea>
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
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="修改研究方向信息"/></td>
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
	if(document.getElementById('rname').value=="")
	{
		alert("研究方向名空！");
		return false;
	}
	if(document.getElementById('editor1').value=="")
	{
		alert("具体内容空！");
		return false;
	}
	return true;
}
</script>

</body>
</html>