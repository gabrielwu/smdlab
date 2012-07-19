<?php
   // header("Content-Type:text/html;charset='gb2312'");

	//$_GET['acname'] = urldecode($_GET['acname']);
	if($_POST['cover']!='null')
	{
		$cover='../picture/academic/'.$_POST['cover'];
		$sql="insert into academic(a_name,a_type,a_content,a_date,a_pic_cover_path) values('".$_POST['acname']."','".$_POST['type']."','".$_POST['content']."','".$_POST['date']."','".$cover."')";
	}
	else
	{
		$sql="insert into academic(a_name,a_type,a_content,a_date) values('".$_POST['acname']."','".$_POST['type']."','".$_POST['content']."','".$_POST['date']."')";
	}
	include("connect.php");
	//echo $sql;
	mysql_query("SET NAMES utf8");
	if(mysql_query($sql))
	{
		$info="insert succeed!";
		$sql="select a_id from academic where a_name='".$_POST['acname']."'";
		//echo $sql;
		mysql_query("set names 'utf8'");
		$result=mysql_query($sql);
		
		if($result)
		{
			$row=mysql_fetch_row($result);
			if($_POST['fileNames'])
			{
				foreach($_POST['fileNames'] as $academic_pic)
				{
					$academic_pic='../picture/academic/'.$academic_pic;
					//echo $sql;
					$sql="insert into acade_pic (acade_no,pi_path) values('".$row[0]."','".$academic_pic."')";
					//echo $sql;
					mysql_query("SET NAMES 'utf8'");
					if(mysql_query($sql))
					{
						$info="insert succeed!";
					}
					else
					{
						$info="insert failure!";
					}
				}
			}
		} 
	}
	else
	{
		$info="insert failure!";
	}
	echo $info;
?>