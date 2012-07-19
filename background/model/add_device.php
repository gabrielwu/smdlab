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
		//初始密码000000
		$sql="insert into device (d_name,d_content,d_pic_path) values ('".$_POST['rname']."','".$_POST['details']."','".$name."')";
		echo $sql;
		mysql_query("set names gb2312"); 
		if(mysql_query($sql))
		{
		?>
		<meta http-equiv="refresh" content="0;url=../view/manage.php">
		<?php
		}
		else
		{
		unlink($name);
		?>
		<meta http-equiv="refresh" content="3;url=../view/manage.php">
		<p>更新失败，三秒后自动跳转到后台管理页面！若不跳转请点击<a href="../view/manage.php">这里</a>
		<?php
		}
	}
?>