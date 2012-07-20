<?php
    //header("Content-Type:text/html;charset='gb2312'");

	//$_GET['acname'] = urldecode($_GET['acname']);
	$cover='../picture/life/'.$_GET['cover'];
	include("connect.php");
	$acname = $_GET['acname'];
	$content = $_GET['content'];
	$date = $_GET['date'];
	$ac_id = $_GET['ac_id'];
	
	$sql="update activity set ac_name='$acname',ac_content='$content',ac_date='$date',ac_pic_cover_path='$cover' where ac_id='$ac_id'";
	echo $sql;
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