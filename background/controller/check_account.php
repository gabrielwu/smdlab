<?php
//ำร
header("Content-Type:text/html;charset=utf-8");
include('connect.php');
$account=$_POST['account'];
$password=$_POST['password'];
$sql=mysql_query("select * from admin where ad_account='".$account."' and ad_password='".$password."'");
$info=mysql_fetch_array($sql);
mysql_close($link);
if($info)
{
	session_start();
	$_SESSION['mark']="login";//ตวยฝฑ๊ผว
	echo "view/manage.php";
}
else
{
	echo "fail";
}
?>