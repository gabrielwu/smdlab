<?php
	//ำร
    $id = $_GET['id'];
	include("connect.php");
	
	//ษพณýผวยผ
	$sql="delete from link where l_id=$id";
	echo mysql_query($sql);
?>