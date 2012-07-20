<?php 
// 修改说明
$id = $_POST['id'];
$intro = $_POST['intro'];
$sql = "update acti_pic set pi_intro='".$intro."' where pic_id='".$id."'";
echo $sql;
require("connect.php");
mysql_query("set names utf8"); 
if (mysql_query($sql)) {
    echo "1";	
} else {		
	echo "0";
}
?>