<?php 

	if($_POST['cover']!='null')
	{
		$cover='../picture/academic/'.$_POST['cover'];
		$sql="update academic set a_name='".$_POST['acname']."', a_type='".$_POST['type']."', a_content='".$_POST['content']."', a_date='".$_POST['date']."', a_pic_cover_path='".$cover."' where a_id=".$_POST['id'];
	}
	else
	{
		$sql="update academic set a_name='".$_POST['acname']."', a_type='".$_POST['type']."', a_content='".$_POST['content']."', a_date='".$_POST['date']."'  where a_id=".$_POST['id'];
	}
	//echo $sql;
	include("connect.php");
	mysql_query("SET NAMES utf8");
	if(mysql_query($sql))
	{
		$info="modify succeed!";
		if($_POST['fileNames'])
		{
			foreach($_POST['fileNames'] as $academic_pic)
			{
				$academic_pic='../picture/academic/'.$academic_pic;
				//echo $sql;
				$sql="insert into acade_pic (acade_no,pi_path) values('".$_POST['id']."','".$academic_pic."')";
				//echo $sql;
				mysql_query("SET NAMES 'utf8'");
				if(mysql_query($sql))
				{
					$info="modify succeed!";
				}
				else
				{
					$info="modify failure!";
				}
			}
		}
	}
	else
	{
		$info="modify failure!";
	}
	echo $info;

?>