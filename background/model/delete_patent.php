<?php
	//��
    $id = $_GET['id'];
	include("connect.php");
	
	//ɾ����¼
	$sql="delete from patent where pa_id=$id";
	echo mysql_query($sql);
?>