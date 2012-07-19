<?php
	//ำร
    $id = $_GET['id'];
	include("connect.php");
	$sql="select pi_path from acade_pic where acade_no=".$id;
	mysql_query("set names 'gb2312'");
	$result=mysql_query($sql);
	while($row=mysql_fetch_row($result))
	{
		$rowset[]=$row;
	}
	if(!empty($rowset)){
		foreach($rowset as $path)
		{
			unlink($path[0]);
		}
	}
	//ษพณýผวยผ
	$sql="delete from academic where a_id=".$id;
	//echo $sql;
	echo mysql_query($sql);
?>