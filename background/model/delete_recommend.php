<?php
	//��
    $id = $_GET['id'];
	include("connect.php");
	
	//ɾ����¼
	$sql="delete from recommend where re_id=$id";
	echo mysql_query($sql);
?>