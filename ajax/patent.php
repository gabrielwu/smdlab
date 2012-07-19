<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/patent.php");
    require("../db/conn.php");
	require("../util/util.php");
    $index = $_POST["index"];
    $sql1="select * from patent limit $index, $per";
	$result1=mysql_query("$sql1");
	while ($row1 = mysql_fetch_array($result1)) {
?>
	<div class="item">
		<div class="title">
            <?php echo ++$index.". ".$row1['pa_name'];?>
		</div>
		<div class="content">
		    <?php echo $row1['pa_content'];?>
		</div>
	</div>
<?php 
    }
	$sql3="select pa_id from patent limit $index, $per";
	$result3=mysql_query("$sql3");
	if ($row3 = mysql_fetch_array($result3)) {
?>
	<div id="more" class="more"><a href="javascript:more(<?php echo $index;?>)">更多<em></em></a></div>
<?php
    } else {
?>
    <div id="more" class="no_more">已显示全部</div>
<?php
    }
?>