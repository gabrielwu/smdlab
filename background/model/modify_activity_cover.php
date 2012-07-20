<?php 
// 修改说明
$ac_id = $_POST['ac_id'];
$ac_pic_cover_path = $_POST['ac_pic_cover_path'];
$sql = "update activity set ac_pic_cover_path='".$ac_pic_cover_path."' where ac_id='".$ac_id."'";
echo $sql;
require("connect.php");
mysql_query("set names gb2312"); 
if (mysql_query($sql)) {
    //echo "1";	
} else {		
//	echo "0";
}
?>