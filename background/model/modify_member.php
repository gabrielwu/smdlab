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
			//ɾ���ɵ�ͷ�񣬻����µ�ͼ��
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
				$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_photopath='$name',m_detail='$detail' where m_id='$id'";
				//$sql="update member set m_cname='������AAAAAAA' where m_id=".$id;
				//echo $sql;
				mysql_query("set names gb2312"); 
				if(mysql_query($sql))
				{
					$info=$info.' �������ݿ�ɹ���';
				}
				echo $info;
				
			}
			//////////////////////////////////////////////////////////////////////////////////////////
		}
		else
		{
			//ԭ��û��ͷ���ϴ��µ�ͷ��
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
				$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_photopath='$name',m_detail='$detail' where m_id='$id'";
				//echo $sql;
				mysql_query("set names gb2312"); 
				if(mysql_query($sql))
				{
					$info=$info.' �������ݿ�ɹ���';
				}
				echo $info;
			}
		}
	}
	else
	{
		if($_POST['del_img']!=null)
		{
			//ɾ��ԭ�е�ͷ�񣬲��ϴ��µ�ͷ��
			unlink($_POST['del_img']);
			include("connect.php");
			$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_photopath='',m_detail='$detail' where m_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
			if(mysql_query($sql))
			{
				$info='ɾ��ͷ��, �������ݿ�ɹ���';
			}
			echo $info;
		}
		else
		{
			//������ͷ��
			include("connect.php");
			$sql="update member set m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_detail='$detail' where m_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
			if(mysql_query($sql))
			{
				$info='ɾ��ͷ��, �������ݿ�ɹ���';
			}
			echo $info;
			
		}
	}
    echo "<meta http-equiv='refresh' content='1;url=../view/modify_member.php?id=$id'>";
    echo "<p>1����Զ���ת����̨����ҳ�棡������ת����<a href='../view/modify_member.php?id=$id'>����</a>";
?>