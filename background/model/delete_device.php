<?php
	//��
    $id = $_GET['id'];
	include("connect.php");
	//ɾ��ͼƬ
	$sql="select d_pic_path from device where d_id=".$id;
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result); 
	if($row[0])
	{
		unlink($row[0]);
	}
	//ɾ����¼
	$sql="delete from device where d_id=$id";
	echo mysql_query($sql);
?>