<?php
	header("Content-Type:text/html;charset=gb2312");
	
	$id=$_POST['id'];
	$rname=$_POST['rname'];
	$content=$_POST['content'];
	
	
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
			$destination_folder='../picture/device/';
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
						echo $destination_folder.$name.'.'.$type;
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
				$sql="update device set d_name='$rname',d_content='$content',d_pic_path='$name' where d_id='$id'";
				mysql_query("set names gb2312"); 
				if(mysql_query($sql))
				{
					$mark=1;
				}
				else
				{
					$mark=0;
				}
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
			$destination_folder='../picture/device/';
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
						echo $destination_folder.$name.'.'.$type;
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
				$sql="update device set d_name='$rname',d_content='$content',d_pic_path='$name' where d_id='$id'";
				//echo $sql;
				mysql_query("set names gb2312"); 
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
	}
	else
	{
		if($_POST['del_img']!=null)
		{
			//删除原有的头像，不上传新的头像
			unlink($_POST['del_img']);
			include("connect.php");
			$sql="update device set d_name='$rname',d_content='$content',d_pic_path='' where d_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
			if(mysql_query($sql))
			{
				$mark=1;
			}
			else
			{
				$mark=0;
			}
		}
		else
		{
			//不处理头像
			include("connect.php");
			$sql="update device set d_name='$rname',d_content='$content' where d_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
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
?>
<?php
	if($mark==1)
	{
	?>
	<meta http-equiv="refresh" content="0;url=../view/manage.php">
	<?php
	}
	else
	{
	?>
	<meta http-equiv="refresh" content="3;url=../view/manage.php">
	<p>更新错误，三秒后自动跳转到后台管理页面！若不跳转请点击<a href="../view/manage.php">这里</a>
	<?php
	}

?>