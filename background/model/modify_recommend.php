<?php
	header("Content-Type:text/html;charset=gb2312");
		
	include("connect.php");
	//$sql="insert into recommend (re_name,re_abstract,re_link) values('".$_POST['rename']."','".$_POST['content']."','".$_POST['relink']."' )";
	$sql="update recommend set re_name='".$_POST['rename']."',re_abstract='".$_POST['content']."',re_link='".$_POST['relink']."' where re_id=".$_POST['id'];
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