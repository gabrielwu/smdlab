<?php
	//ำร
    $id = $_GET['id'];
	include("connect.php");
	$sql="select pi_path from acti_pic where ac_no=".$id;
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
	$sql="delete from activity where ac_id=".$id;
	//echo $sql;
	echo mysql_query($sql);
?>