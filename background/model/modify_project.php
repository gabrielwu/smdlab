<?php
	header("Content-Type:text/html;charset=gb2312");

	
	$pactors = explode(",",$_POST['pauthors']);
	
	include("connect.php");
	$sql="update project set pr_name='".$_POST['pname']."',pr_type='".$_POST['type']."',pr_content='".$_POST['content']."',pr_mark='".$_POST['mark']."',pr_date1='".$_POST['date1']."',pr_date1='".$_POST['date1']."', pr_num='".$_POST['pnum']."' where pr_id=".$_POST['pid'];
	mysql_query("set names gb2312"); 
	if(mysql_query($sql))
	{
		$mark=1;
		$sql="delete from project_header where pr_id=".$_POST['pid'];
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


