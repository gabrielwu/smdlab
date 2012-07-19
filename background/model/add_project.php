<?php
	header("Content-Type:text/html;charset=gb2312");
	// echo $_POST['pid'];
	// echo $_POST['pname'];//项目名
	// echo $_POST['pauthors'];//项目负责人
	// echo $_POST['type'];//项目类型
	// echo $_POST['date1'];//项目开始时间
	// echo $_POST['date2'];//项目结束时间
	// echo $_POST['mark'];//项目完成标记
	// echo $_POST['content'];//项目内容
	
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
	<p>添加失败，三秒后自动跳转到后台管理页面！若不跳转请点击<a href="../view/manage.php">这里</a>
	<?php
	}
?>


