<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/library.php");
    require("../db/conn.php");
	require("../util/util.php");
    $index = $_POST["index"];
    $sql1="select * from recommend limit $index, $per";
	$result1=mysql_query("$sql1");
	$count = $index;
	while ($row1 = mysql_fetch_array($result1)) {
	    $count++;
?>
	<div class="item">
		<h3 class="shadow_title"><?php echo $row1['re_name']?></h3>
		<div class="item_content">
		    <?php echo $row1['re_abstract'];?>
		    <a href="<?php echo $row1['re_link'];?>"  target="_blank">查看</a> 
		</div>		
	</div>
<?php 
    }
	$sql3="select re_id from recommend limit $count, $per";
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