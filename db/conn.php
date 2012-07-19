<?php
	//$con = mysql_connect("192.168.1.102","wangkai","root");
	$con = mysql_connect("localhost","root","root");
	//$con = mysql_connect("localhost","smdlab","dianzi6655");
	
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());

	}
	else
	{
		//echo "connection right!";
	}
	
	mysql_select_db("smdlab2", $con);
	//mysql_select_db("smdlab", $con);
    mysql_query("set names 'utf8'");
?>
    
     
	