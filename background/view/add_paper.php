<?php 
session_start(); 
//��
?>
<html>
<head>
	<title>��������</title>
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
			<form action="../model/add_paper.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td width="100px" align="center">���ĺţ�</td>
					<td width="520px"><input id="pid" name="pid" type="text" size="50"/><font color="red">*����Ψһ��ʾ�������ظ�</font></td>
				<tr>
				<tr>
					<td  align="center">�������֣�</td>
					<td ><input id="pname" name="pname" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">�������ߣ�</td>
					<td ><input id="pauthors" name="pauthors" type="text" size="50"/><font color="red">*��������ð�Ƕ��ŷָ�</font></td>
				<tr>
				<tr>
					<td  align="center">�����ڿ���</td>
					<td ><input id="journal" name="journal" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">�ڿ��ţ�ҳ������</td>
					<td ><input id="journal_no" name="journal_no" type="text" size="50"/></td>
				<tr>
				<tr>
					<td  align="center">����ʱ�䣺</td>
					<td ><input id="date" name="date" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">�ڿ����ӣ�</td>
					<td ><input name="link" type="text" size="50" value="http://"/></td>
				<tr>
				<tr>
					<td  align="center">�������ӣ�</td>
					<td ><input name="dlink" type="text" size="50" value="http://"/></td>
				<tr>
				<tr>
					<td colspan="2">����ժҪ��</td>
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
					    <input type="button" value="����ɾ��" onclick="showContent()">
						<div id="attachment_manage" title="����ɾ��"></div>
					</td>
				</tr>
				<tr>
					<td align="center">�ϴ����棺</td>
					<td><input name="img" type="file"/></td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="���������"/></td>
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
		alert("���ĺſգ�");
		return false;
	}
	if(document.getElementById('pname').value=="")
	{
		alert("�������գ�");
		return false;
	}
	if(document.getElementById('pauthors').value=="")
	{
		alert("�������߿գ�");
		return false;
	}
	if(document.getElementById('journal').value=="")
	{
		alert("�ڿ��գ�");
		return false;
	}
	if(document.getElementById('date').value=="")
	{
		alert("����ʱ��գ�");
		return false;
	}
	return true;
}
</script>

</body>
</html>