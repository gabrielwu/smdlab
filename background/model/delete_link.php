<?php
	//��
    $id = $_GET['id'];
	include("connect.php");
	
	//ɾ����¼
	$sql="delete from link where l_id=$id";
	echo mysql_query($sql);
?>