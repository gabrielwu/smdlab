<?php   
	//��
	header("Content-Type:text/html;charset=gb2312");
	$link=@mysql_connect("localhost","root","root") or die("Could not connect to mysql server!") ;
	mysql_select_db("lab",$link);
	$mark=mysql_query("update admin set ad_password='".$_GET['password']."' where ad_id=1");
	mysql_close($link);
	if($mark)
		echo "�޸�����ɹ���������Ϊ��".$_GET['password']."�����ס��";
	else
		echo "�޸�����ʧ�ܣ�";
 ?>