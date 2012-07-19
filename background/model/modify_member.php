<?php
	header("Content-Type:text/html;charset=gb2312");
		// echo $_POST['cname'];
	// echo $_POST['ename'];
	// echo $_POST['title'];
	// echo $_POST['mark'];
	// echo $_POST['permit'];
	// echo $_POST['email'];
	// echo $_POST['tel'];
	// echo $_POST['office'];
	// echo $_POST['del_img'];
	// echo $_POST['details'];
	//echo $_POST['id'];
	$id=$_POST['id'];
	$cname=$_POST['cname'];
	$ename=$_POST['ename'];
	$permit=$_POST['permit'];
	$title=$_POST['title'];
	$mark=$_POST['mark'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$addr=$_POST['office'];
	$detail=$_POST['details'];
	
	if(is_uploaded_file($_FILES['img']['tmp_name']))
	{
		if($_POST['del_img']!=null)
		{
			//删除旧的头像，换成新的图像。
			unlink($_POST['del_img']);
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
			$destination_folder='../picture/people/';
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
				include("connect.php");
				$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_photopath='$name',m_detail='$detail' where m_id='$id'";
				//$sql="update member set m_cname='王家琦AAAAAAA' where m_id=".$id;
				//echo $sql;
				mysql_query("set names gb2312"); 
				if(mysql_query($sql))
				{
					$info=$info.' 更新数据库成功！';
				}
				echo $info;
				
			}
			//////////////////////////////////////////////////////////////////////////////////////////
		}
		else
		{
			//原来没有头像，上传新的头像
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
			$destination_folder='../picture/people/';
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
				include("connect.php");
				$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_photopath='$name',m_detail='$detail' where m_id='$id'";
				//echo $sql;
				mysql_query("set names gb2312"); 
				if(mysql_query($sql))
				{
					$info=$info.' 更新数据库成功！';
				}
				echo $info;
			}
		}
	}
	else
	{
		if($_POST['del_img']!=null)
		{
			//删除原有的头像，不上传新的头像
			unlink($_POST['del_img']);
			include("connect.php");
			$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_photopath='',m_detail='$detail' where m_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
			if(mysql_query($sql))
			{
				$info='删除头像, 更新数据库成功！';
			}
			echo $info;
		}
		else
		{
			//不处理头像
			include("connect.php");
			$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_detail='$detail' where m_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
			if(mysql_query($sql))
			{
				$info='删除头像, 更新数据库成功！';
			}
			echo $info;
			
		}
	}
    echo "<meta http-equiv='refresh' content='1;url=../view/modify_member.php?id=$id'>";
    echo "<p>1秒后自动跳转到后台管理页面！若不跳转请点击<a href='../view/modify_member.php?id=$id'>这里</a>";
?>