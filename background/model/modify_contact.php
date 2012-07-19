<?php
	header("Content-Type:text/html;charset=gb2312");
	//echo $_POST['pid'];
	//echo $_POST['pname'];//项目名
	//echo $_POST['pauthors'];//项目负责人
	//echo $_POST['type'];//项目类型
	//echo $_POST['date1'];//项目开始时间
	//echo $_POST['date2'];//项目结束时间
	//echo $_POST['mark'];//项目完成标记
	//echo $_POST['content'];//项目内容
	
	
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
	<p>更新失败，三秒后自动跳转到后台管理页面！若不跳转请点击<a href="../view/manage.php">这里</a>
	<?php
	}
?>


