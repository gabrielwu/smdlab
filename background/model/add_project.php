<?php
	header("Content-Type:text/html;charset=gb2312");
	// echo $_POST['pid'];
	// echo $_POST['pname'];//��Ŀ��
	// echo $_POST['pauthors'];//��Ŀ������
	// echo $_POST['type'];//��Ŀ����
	// echo $_POST['date1'];//��Ŀ��ʼʱ��
	// echo $_POST['date2'];//��Ŀ����ʱ��
	// echo $_POST['mark'];//��Ŀ��ɱ��
	// echo $_POST['content'];//��Ŀ����
	
	$pactors = explode(",",$_POST['pauthors']);
	
	include("connect.php");
	$sql="insert into project (pr_id,pr_name,pr_type,pr_content,pr_mark,pr_date1,pr_date2, pr_num) values('".$_POST['pid']."','".$_POST['pname']."','".$_POST['type']."','".$_POST['content']."','".$_POST['mark']."','".$_POST['date1']."','".$_POST['date2']."','".$_POST['pnum']."')";
	mysql_query("set names gb2312"); 
	if(mysql_query($sql))
	{
		$mark=1;
		foreach($pactors as $pactor)
		{
			$sql="insert into project_header (pr_id,m_name) values('".$_POST['pid']."','".$pactor."')";
			mysql_query("set names 'gb2312'");
			if(mysql_query($sql))
			{
				$mark=1;
			}
			else
			{
				$mark=0;
			}
		}
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
	<meta http-equiv="refresh" content="0;url=../view/add_project.php">
	<?php
	}
	else
	{
	?>
	<meta http-equiv="refresh" content="3;url=../view/add_project.php">
	<p>���ʧ�ܣ�������Զ���ת����̨����ҳ�棡������ת����<a href="../view/manage.php">����</a>
	<?php
	}
?>


