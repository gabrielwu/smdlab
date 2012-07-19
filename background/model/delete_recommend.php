<?php
	//ำร
    $id = $_GET['id'];
	include("connect.php");
	
	//ษพณýผวยผ
	$sql="delete from recommend where re_id=$id";
	echo mysql_query($sql);
?>