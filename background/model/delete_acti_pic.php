<?php
	//header("Content-Type:text/html;charset=gb2312");
	//ำร
    $id = $_GET['id'];
	$path=$_GET['pi_path'];
	//unlink($path);
	unlink(iconv("utf-8","gbk",$path));
	include("connect.php");
	mysql_query("set names utf8");
	$sql="delete from acti_pic where ac_no='".$id."' and pi_path='".$path."'";
	//echo $sql;
	echo mysql_query($sql);
?>