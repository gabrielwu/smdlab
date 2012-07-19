<?php
	//ำร
    $id = $_GET['id'];
	include("connect.php");
	
	//ษพณýผวยผ
	$sql="delete from patent where pa_id=$id";
	echo mysql_query($sql);
?>