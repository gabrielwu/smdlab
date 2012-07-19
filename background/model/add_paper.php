<?php
	header("Content-Type:text/html;charset=gb2312");

	
	$uptypes=array(
		'image/jpg',
		'image/png',
		'image/jpeg',
		'image/pjpeg',
		'image/gif',
		'image/bmp',
		'image/x-png'
	);
	$max_file_size=20000000;
	$destination_folder='../picture/cover/';
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$info='';
		$name=null;
		if(is_uploaded_file($_FILES['img']['tmp_name']))
		{
			$upfile=$_FILES['img'];
			$name=time().$FILES['name'];
			$type=$upfile['type'];
			$size=$upfile['size'];
			$tmp_name=$upfile['tmp_name'];
			$error=$upfile['error'];
			
			if($max_file_size<$size)
			{
				$info='上传图片太大！不能上传！';
			}
			if(!in_array($type,$uptypes))
			{
				$info=$info.' 上传图片类型不符'.$type.'不能上传';
			}
			$type=trim(substr($type,6,12));
			if($info=='')
			{
				//echo $destination_folder.$name.'.'.$type;
				if(move_uploaded_file($_FILES['img']['tmp_name'],$destination_folder.$name.'.'.$type))
				{
					$info='上传图片成功！';
					$name=$destination_folder.$name.'.'.$type;
				}
				else
				{
					$name=null;
				}
			}
		}
		$array = explode(",",$_POST['pauthors']);
		include("connect.php");
		if($_POST['link']=='http://')
			$alink=null;
		if($_POST['dlink']=='http://')
			$dlink=null;
		$sql="insert into paper(p_id,p_name,p_abstract,p_journal,p_journal_no,p_date,p_sci_link,p_link,p_coverpath)values('".$_POST['pid']."','".$_POST['pname']."','".$_POST['abstract']."','".$_POST['journal']."','".$_POST['journal_no']."','".$_POST['date']."','".$alink."','".$dlink."','".$name."')";
		echo $sql;
		mysql_query("set names gb2312"); 
		if(mysql_query($sql))
		{
			$mark=1;
			foreach($array as $author)
			{
				$author=trim($author);
				$sql1="select m_id from member where m_cname='".$author."' or m_ename='".$author."'";
				
				//mysql_query("set names 'gb2312'");
				$result=mysql_query($sql1);
				$row=mysql_fetch_row($result);
				if($row[0])
				{
					$sql="insert into paper_member (p_no,m_name,m_no) values('".$_POST['pid']."','".$author."','".$row[0]."')";
				}
				else
				{
					$sql="insert into paper_member (p_no,m_name) values('".$_POST['pid']."','".$author."')";
				}
				if(mysql_query($sql))
				{
					$mark=1;
				}
				else
				{
					$mark=0;
				}
			}
		}
		if($mark==1)
		{
			?>
			<meta http-equiv="refresh" content="0;url=../view/add_paper.php">
			<?php
		}
		else
		{
			if($name)
			{
				unlink($name);
			}
			?>
			<meta http-equiv="refresh" content="3;url=../view/manage.php">
			<p>更新失败，三秒后自动跳转到后台管理页面！若不跳转请点击<a href="../view/manage.php">这里</a>
			<?php
		}
	}
?>