<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/device.php");
    require("../db/conn.php");
	require("../util/util.php");
    $index = $_POST["index"];
    $sql1="select * from device limit $index, $per";
	$result1=mysql_query("$sql1");
	$count = $index;
	while ($row1 = mysql_fetch_array($result1)) {
	    $count++;
?>
	<div class="r_item">
		<div class="r_title shadow_title"><?php echo $row1['d_name']?></div>
		<div class="r_content"><?php echo $row1['d_content']?></div>		
	</div>
<?php 
    }
	$sql3="select d_id from device limit $count, $per";
	$result3=mysql_query("$sql3");
	if ($row3 = mysql_fetch_array($result3)) {
?>
	<div id="more" class="more"><a href="javascript:more(<?php echo $count;?>)">更多<em></em></a></div>
<?php
    } else {
?>
    <div id="more" class="no_more">已显示全部</div>
<?php
    }
?>