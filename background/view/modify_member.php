<?php 
session_start(); 
//用
?>
<html>
<head>
	<title>修改成员</title>
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
			<?php 
				//echo $_GET['id'];
				include("connect.php");
				$sql="select m_cname,m_ename,m_permit,m_title,m_mark,m_email,m_tel,m_addr,m_photopath,m_detail from member where m_id=".$_GET['id'];
				//echo $sql;
				mysql_query("set names 'gb2312'");
				$result=mysql_query($sql);
				$row=mysql_fetch_row($result);
			?>
			<form action="../model/modify_member.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" border="0">
			    <tr><td><input type="submit" onclick="return check();" value="保存修改"/></td></tr>
				<tr>
					<td rowspan="8" width="200px" align="center"><img width="150px" height="150px" src="<?php echo $row[8];?>" alt="无图片"/></td>
					<td  width="100px" align="center">中文名：</td>
					<td width="300px"><input id="cname" name="cname" type="text" value="<?php echo $row[0];?>"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">英文名：</td>
					<td ><input id="ename" name="ename" type="text" value="<?php echo $row[1];?>"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">职称：</td>
					<td >
						<select name="title">
							<option value="e1" <?php if($row[3]=='e1') echo 'selected="selected"';?>>研一</option>
							<option value="e2" <?php if($row[3]=='e2') echo 'selected="selected"';?>>研二</option>
							<option value="e3" <?php if($row[3]=='e3') echo 'selected="selected"';?>>研三</option>
							<option value="d1" <?php if($row[3]=='d1') echo 'selected="selected"';?>>博一</option>
							<option value="d2" <?php if($row[3]=='d2') echo 'selected="selected"';?>>博二</option>
							<option value="d3" <?php if($row[3]=='d3') echo 'selected="selected"';?>>博三</option>
							<option value="d4" <?php if($row[3]=='d4') echo 'selected="selected"';?>>博士后</option>
							<option value="c1"  <?php if($row[3]=='c1') echo 'selected="selected"';?>>讲师</option>
							<option value="b1"  <?php if($row[3]=='b1') echo 'selected="selected"';?>>副教授</option>
							<option value="a"  <?php if($row[3]=='a') echo 'selected="selected"';?>>教授</option>
						</select>
					</td>
				</tr>
				<tr>
					<td  align="center">状态：</td>
					<td >
						<select name="mark">
							<option value="1" <?php if($row[4]=='1') echo 'selected="selected"';?>>在职（在读）</option>
							<option value="0" <?php if($row[4]=='0') echo 'selected="selected"';?>>离职（毕业）</option>
						</select>
					</td>
				</tr>
				<tr>
					<td  align="center">权限：</td>
					<td >
						<select name="permit">
							<option value="1" <?php if($row[2]=='1') echo 'selected="selected"';?>>查看、发表组内新闻</option>
							<option value="0" <?php if($row[2]=='0') echo 'selected="selected"';?>>查看组内新闻</option>
						</select>
					</td>
				</tr>
				<tr>
					<td " align="center">电子邮件：</td>
					<td ><input name="email" type="text" value="<?php echo $row[5];?>"/></td>
				</tr>
				<tr>
					<td  align="center">电话：</td>
					<td ><input name="tel" type="text" value="<?php echo $row[6];?>"/></td>
				</tr>
				<tr>
					<td  align="center" >办公室：</td>
					<td ><input name="office" type="text" value="<?php echo $row[7];?>"/></td>
				</tr>
				<tr>
					<td align="center">删除原头像:<input name="del_img" type="checkbox" value="<?php echo $row[7];?>" ></td>
					<td  colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上传（替换）头像：<input name="img" type="file"/></td>
				</tr>
				<tr>
					<td colspan="3">详细信息(不可为空)：</td>
				</tr>
				<tr>
					<td colspan="3">
					<textarea id="editor1" name="details" style="width:650px;height:400px;"><?php echo $row[9];?></textarea>
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
					<td ></td>
					<td ><input type="submit" onclick="return check();" value="保存修改"/></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" ><input name="id" type="text" style= "visibility:hidden" value="<?php echo $_GET['id'];?>"/></td>
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