<?php 
session_start(); 
//��
?>
<html>
<head>
	<title>�޸ĳ�Ա</title>
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
			    <tr><td><input type="submit" onclick="return check();" value="�����޸�"/></td></tr>
				<tr>
					<td rowspan="8" width="200px" align="center"><img width="150px" height="150px" src="<?php echo $row[8];?>" alt="��ͼƬ"/></td>
					<td  width="100px" align="center">��������</td>
					<td width="300px"><input id="cname" name="cname" type="text" value="<?php echo $row[0];?>"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">Ӣ������</td>
					<td ><input id="ename" name="ename" type="text" value="<?php echo $row[1];?>"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">ְ�ƣ�</td>
					<td >
						<select name="title">
							<option value="e1" <?php if($row[3]=='e1') echo 'selected="selected"';?>>��һ</option>
							<option value="e2" <?php if($row[3]=='e2') echo 'selected="selected"';?>>�ж�</option>
							<option value="e3" <?php if($row[3]=='e3') echo 'selected="selected"';?>>����</option>
							<option value="d1" <?php if($row[3]=='d1') echo 'selected="selected"';?>>��һ</option>
							<option value="d2" <?php if($row[3]=='d2') echo 'selected="selected"';?>>����</option>
							<option value="d3" <?php if($row[3]=='d3') echo 'selected="selected"';?>>����</option>
							<option value="d4" <?php if($row[3]=='d4') echo 'selected="selected"';?>>��ʿ��</option>
							<option value="c1"  <?php if($row[3]=='c1') echo 'selected="selected"';?>>��ʦ</option>
							<option value="b1"  <?php if($row[3]=='b1') echo 'selected="selected"';?>>������</option>
							<option value="a"  <?php if($row[3]=='a') echo 'selected="selected"';?>>����</option>
						</select>
					</td>
				</tr>
				<tr>
					<td  align="center">״̬��</td>
					<td >
						<select name="mark">
							<option value="1" <?php if($row[4]=='1') echo 'selected="selected"';?>>��ְ���ڶ���</option>
							<option value="0" <?php if($row[4]=='0') echo 'selected="selected"';?>>��ְ����ҵ��</option>
						</select>
					</td>
				</tr>
				<tr>
					<td  align="center">Ȩ�ޣ�</td>
					<td >
						<select name="permit">
							<option value="1" <?php if($row[2]=='1') echo 'selected="selected"';?>>�鿴��������������</option>
							<option value="0" <?php if($row[2]=='0') echo 'selected="selected"';?>>�鿴��������</option>
						</select>
					</td>
				</tr>
				<tr>
					<td " align="center">�����ʼ���</td>
					<td ><input name="email" type="text" value="<?php echo $row[5];?>"/></td>
				</tr>
				<tr>
					<td  align="center">�绰��</td>
					<td ><input name="tel" type="text" value="<?php echo $row[6];?>"/></td>
				</tr>
				<tr>
					<td  align="center" >�칫�ң�</td>
					<td ><input name="office" type="text" value="<?php echo $row[7];?>"/></td>
				</tr>
				<tr>
					<td align="center">ɾ��ԭͷ��:<input name="del_img" type="checkbox" value="<?php echo $row[7];?>" ></td>
					<td  colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ϴ����滻��ͷ��<input name="img" type="file"/></td>
				</tr>
				<tr>
					<td colspan="3">��ϸ��Ϣ(����Ϊ��)��</td>
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
					    <input type="button" value="����ɾ��" onclick="showContent()">
						<div id="attachment_manage" title="����ɾ��"></div>
					</td>
				</tr>
				<tr>
					<td ></td>
					<td ><input type="submit" onclick="return check();" value="�����޸�"/></td>
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