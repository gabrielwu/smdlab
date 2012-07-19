<?php
    //header("Content-Type:text/html;charset='gb2312'");

	//$_GET['acname'] = urldecode($_GET['acname']);
	$cover='../picture/life/'.$_GET['cover'];
	include("connect.php");
	$sql="insert into activity(ac_name,ac_content,ac_date,ac_pic_cover_path) values('".$_GET['acname']."','".$_GET['content']."','".$_GET['date']."','".$cover."')";
	//echo $sql;
	mysql_query("SET NAMES utf8");
	if(mysql_query($sql))
	{
		$info="插入成功";
		$sql="select ac_id from activity where ac_name='".$_GET['acname']."'";
		//echo $sql;
		//mysql_query("set names 'gb2312'");
		$result=mysql_query($sql);
		
		if($result)
		{
			$row=mysql_fetch_row($result);
			$index = 0;
			foreach($_GET['fileNames'] as $life_pic)
			{
				$life_pic='../picture/life/'.$life_pic;
				$sql="insert into acti_pic (ac_no,pi_path,pi_intro) values('".$row[0]."','".$life_pic."','".$_GET['picIntros'][$index++]."')";
				//echo $sql;
				mysql_query("SET NAMES utf8");
				if(mysql_query($sql))
				{
					$info="插入成功";
				}
				else
				{
					$info="插入失败";
				}
			}
		} 
	}
	else
	{
		$info="插入失败";
	}
	echo $info;
?>