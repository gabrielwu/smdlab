<?php
	header("Content-Type:text/html;charset=gb2312");
	
	$id=$_POST['pid'];
	$pname=$_POST['pname'];
	$authors=$_POST['pauthors'];
	$journal=$_POST['journal'];
	$journal_no=$_POST['journal_no'];
	$date=$_POST['date'];
	$plink=$_POST['plink'];
	$dlink=$_POST['dlink'];
	$abstract=$_POST['details'];
	
	
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
						$info='�ϴ�ͼƬ̫�󣡲����ϴ���';
					}
					if(!in_array($type,$uptypes))
					{
						$info=$info.' �ϴ�ͼƬ���Ͳ���'.$type.'�����ϴ�';
					}
					$type=trim(substr($type,6,12));
					if($info=='')
					{
						echo $destination_folder.$name.'.'.$type;
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
				$sql="update paper set p_name='$pname',p_abstract='$abstract',p_journal='$journal',p_journal_no='$journal_no',p_date='$date',p_sci_link='$plink',p_link='$dlink',p_coverpath='$name' where p_id='$id'";
				mysql_query("set names gb2312"); 
				if(mysql_query($sql))
				{
					$mark=1;
					include("connect.php");
					$sql="delete  from paper_member where p_no=".$id;
					mysql_query($sql);
					$array = explode(",",$authors);
					foreach($array as $aauthor)
					{
						$aauthor=trim($aauthor);
						$sql1="select m_id from member where m_cname='".$aauthor."' or m_ename='".$aauthor."'";
						$result=mysql_query($sql1);
						$row=mysql_fetch_row($result);
						if($row[0])
						{
							$sql="insert into paper_member (p_no,m_name,m_no) values('".$_POST['pid']."','".$aauthor."','".$row[0]."')";
						}
						else
						{
							$sql="insert into paper_member (p_no,m_name) values('".$_POST['pid']."','".$aauthor."')";
						}
						mysql_query("set names gb2312"); 
						//$sql="insert into paper_member(p_no,m_name) values('".$id."','".$aauthor."')";
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
				else
				{
					$mark=0;
				}
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
						$info='�ϴ�ͼƬ̫�󣡲����ϴ���';
					}
					if(!in_array($type,$uptypes))
					{
						$info=$info.' �ϴ�ͼƬ���Ͳ���'.$type.'�����ϴ�';
					}
					$type=trim(substr($type,6,12));
					if($info=='')
					{
						echo $destination_folder.$name.'.'.$type;
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
				$sql="update paper set p_name='$pname',p_abstract='$abstract',p_journal='$journal',p_journal_no='$journal_no',p_date='$date',p_sci_link='$plink',p_link='$dlink',p_coverpath='$name' where p_id='$id'";
				//echo $sql;
				mysql_query("set names gb2312"); 
				if(mysql_query($sql))
				{
					$mark=1;
					include("connect.php");
					$sql="delete  from paper_member where p_no=".$id;
					mysql_query($sql);
					$array = explode(",",$authors);
					foreach($array as $aauthor)
					{
						$aauthor=trim($aauthor);
						$sql1="select m_id from member where m_cname='".$aauthor."' or m_ename='".$aauthor."'";
						$result=mysql_query($sql1);
						$row=mysql_fetch_row($result);
						if($row[0])
						{
							$sql="insert into paper_member (p_no,m_name,m_no) values('".$_POST['pid']."','".$aauthor."','".$row[0]."')";
						}
						else
						{
							$sql="insert into paper_member (p_no,m_name) values('".$_POST['pid']."','".$aauthor."')";
						}
						mysql_query("set names gb2312"); 
						//$sql="insert into paper_member(p_no,m_name) values('".$id."','".$aauthor."')";
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
			//ɾ��ԭ�е�ͷ�񣬲��ϴ��µ�ͷ��
			unlink($_POST['del_img']);
			include("connect.php");
			$sql="update paper set p_name='$pname',p_abstract='$abstract',p_journal='$journal',p_journal_no='$journal_no',p_date='$date',p_sci_link='$plink',p_link='$dlink',p_coverpath='' where p_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
			if(mysql_query($sql))
			{
				$mark=1;
					include("connect.php");
					$sql="delete  from paper_member where p_no=".$id;
					mysql_query($sql);
					$array = explode(",",$authors);
					foreach($array as $aauthor)
					{
						$aauthor=trim($aauthor);
						$sql1="select m_id from member where m_cname='".$aauthor."' or m_ename='".$aauthor."'";
						$result=mysql_query($sql1);
						$row=mysql_fetch_row($result);
						if($row[0])
						{
							$sql="insert into paper_member (p_no,m_name,m_no) values('".$_POST['pid']."','".$aauthor."','".$row[0]."')";
						}
						else
						{
							$sql="insert into paper_member (p_no,m_name) values('".$_POST['pid']."','".$aauthor."')";
						}
						mysql_query("set names gb2312"); 
						//$sql="insert into paper_member(p_no,m_name) values('".$id."','".$aauthor."')";
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
			else
			{
				$mark=0;
			}
		}
		else
		{
			//������ͷ��
			include("connect.php");
			$sql="update paper set p_name='$pname',p_abstract='$abstract',p_journal='$journal',p_journal_no='$journal_no',p_date='$date',p_sci_link='$plink',p_link='$dlink' where p_id='$id'";
			//echo $sql;
			mysql_query("set names gb2312"); 
			if(mysql_query($sql))
			{
				$mark=1;
					include("connect.php");
					$sql="delete  from paper_member where p_no=".$id;
					mysql_query($sql);
					$array = explode(",",$authors);
					foreach($array as $aauthor)
					{
						$aauthor=trim($aauthor);
						$sql1="select m_id from member where m_cname='".$aauthor."' or m_ename='".$aauthor."'";
						$result=mysql_query($sql1);
						$row=mysql_fetch_row($result);
						if($row[0])
						{
							$sql="insert into paper_member (p_no,m_name,m_no) values('".$_POST['pid']."','".$aauthor."','".$row[0]."')";
						}
						else
						{
							$sql="insert into paper_member (p_no,m_name) values('".$_POST['pid']."','".$aauthor."')";
						}
						mysql_query("set names gb2312"); 
						//$sql="insert into paper_member(p_no,m_name) values('".$id."','".$aauthor."')";
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
	<p>���´���������Զ���ת����̨����ҳ�棡������ת����<a href="../view/manage.php">����</a>
	<?php
	}

?>