<?php
	//��
    $id = $_GET['id'];
	include("connect.php");
	//ɾ��ͼƬ
	$sql="select p_coverpath from paper where p_id=".$id;
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result); 
	if($row[0])
	{
		unlink($row[0]);
	}
	//ɾ����¼
	$sql="delete from paper where p_id=$id";
	echo mysql_query($sql);
?>