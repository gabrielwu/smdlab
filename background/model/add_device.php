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
				$info='�ϴ�ͼƬ̫�󣡲����ϴ���';
			}
			if(!in_array($type,$uptypes))
			{
				$info=$info.' �ϴ�ͼƬ���Ͳ���'.$type.'�����ϴ�';
			}
			$type=trim(substr($type,6,12));
			if($info=='')
			{
				//echo $destination_folder.$name.'.'.$type;
				if(move_uploaded_file($_FILES['img']['tmp_name'],$destination_folder.$name.'.'.$type))
				{
					$info='�ϴ�ͼƬ�ɹ���';
					$name=$destination_folder.$name.'.'.$type;
				}
				else
				{
					$name=null;
				}
			}
		}
		include("connect.php");
		//��ʼ����000000
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
		<p>����ʧ�ܣ�������Զ���ת����̨����ҳ�棡������ת����<a href="../view/manage.php">����</a>
		<?php
		}
	}
?>