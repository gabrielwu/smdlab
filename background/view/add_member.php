<?php 
session_start(); 
//��
?>
<html>
<head>
	<title>���ӳ�Ա</title>
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
	���<a href="../login.html">��½����</a>��½�����̨��
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
					<td width="80px" align="center">��������</td>
					<td width="520px"><input id="cname" name="cname" type="text"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td width="80px" align="center">Ӣ������</td>
					<td width="520px"><input id="ename" name="ename" type="text"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td width="80px" align="center">ְ�ƣ�</td>
					<td width="520px">
						<select name="title">
							<option value="e1">��һ</option>
							<option value="e2">�ж�</option>
							<option value="e3">����</option>
							<option value="d1">��һ</option>
							<option value="d2">����</option>
							<option value="d3">����</option>
							<option value="d4">��ʿ��</option>
							<option value="c">��ʦ</option>
							<option value="b">������</option>
							<option value="a">����</option>
						</select>
					</td>
				<tr>
				<tr>
					<td width="80px" align="center">״̬��</td>
					<td width="520px">
						<select name="mark">
							<option value="1">��ְ���ڶ���</option>
							<option value="0">��ְ����ҵ��</option>
						</select>
					</td>
				<tr>
				<tr>
					<td width="80px" align="center">Ȩ�ޣ�</td>
					<td width="520px">
						<select name="permit">
							<option value="1">�鿴��������������</option>
							<option value="0">�鿴��������</option>
						</select>
					</td>
				<tr>
				<tr>
					<td width="80px" align="center">�����ʼ���</td>
					<td width="520px"><input name="email" type="text"/></td>
				<tr>
				<tr>
					<td width="80px" align="center">�绰��</td>
					<td width="520px"><input name="tel" type="text"/></td>
				<tr>
				<tr>
					<td width="80px" align="center">�칫�ң�</td>
					<td width="520px"><input name="office" type="text"/></td>
				<tr>
				<tr>
					<td colspan="2">��ϸ��Ϣ(����Ϊ��)��</td>
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
					    <input type="button" value="����ɾ��" onclick="showContent()">
						<div id="attachment_manage" title="����ɾ��"></div>
					</td>
				</tr>
				<tr>
					<td align="center">�ϴ�ͷ��</td>
					<td><input name="img" type="file"/></td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="����³�Ա"/></td>
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
		alert("�������գ�");
		return false;
	}
	if(document.getElementById('ename').value=="")
	{
		alert("Ӣ�����գ�");
		return false;
	}
	return true;
}
</script>

</body>
</html>