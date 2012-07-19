<?php   
	//用
	header("Content-Type:text/html;charset=gb2312");
	$link=@mysql_connect("localhost","root","root") or die("Could not connect to mysql server!") ;
	mysql_select_db("lab",$link);
	$mark=mysql_query("update admin set ad_account='".$_GET['account']."' where ad_id=1");
	mysql_close($link);
	if($mark)
		echo "修改账号成功，新账号为：".$_GET['account']."。请记住！";
	else
		echo "修改账号失败！";
 ?>