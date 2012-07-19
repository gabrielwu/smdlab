<?php
	header("Content-Type:text/html;charset=gb2312");
	$id = $_GET['id'];
	$lname = $_GET['lname'];
	$lmark = $_GET['lmark'];
	$website = $_GET['website'];
	include("connect.php");
	
	//ธüะยผวยผ
	$sql="update link set l_name='".$lname."',l_mark='".$lmark."',l_content='".$website."' where l_id=".$id;
	mysql_query("set names gb2312"); 
	echo mysql_query($sql);
	//echo $sql;
?>