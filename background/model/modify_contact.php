<?php
	header("Content-Type:text/html;charset=gb2312");
	//echo $_POST['pid'];
	//echo $_POST['pname'];//��Ŀ��
	//echo $_POST['pauthors'];//��Ŀ������
	//echo $_POST['type'];//��Ŀ����
	//echo $_POST['date1'];//��Ŀ��ʼʱ��
	//echo $_POST['date2'];//��Ŀ����ʱ��
	//echo $_POST['mark'];//��Ŀ��ɱ��
	//echo $_POST['content'];//��Ŀ����
	
	
	include("connect.php");
	
	$sql="update contact set c_address='".$_POST['caddr']."',c_tel='".$_POST['ctel']."',c_fax='".$_POST['cfax']."',c_email='".$_POST['cemail']."'";
	mysql_query("set names gb2312"); 
	if(mysql_query($sql))
	{
		$mark=1;
	}
	else
	{
		$mark=0;
	}
?>
<?php
	if($mark==1)
	{
	?>
	<meta http-equiv="refresh" content="0;url=../view/manage.php">
	<?php
	}
	else
	{
	?>
	<meta http-equiv="refresh" content="3;url=../view/manage.php">
	<p>����ʧ�ܣ�������Զ���ת����̨����ҳ�棡������ת����<a href="../view/manage.php">����</a>
	<?php
	}
?>


