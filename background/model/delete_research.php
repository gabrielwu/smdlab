<?php
	//��
    $id = $_GET['id'];
	include("connect.php");
	//ɾ��ͼƬ
	$sql="select r_pic_path from research where r_id=".$id;
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result); 
	if($row[0])
	{
		unlink($row[0]);
	}
	//ɾ����¼
	$sql="delete from research where r_id=$id";
	echo mysql_query($sql);
?>