<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/project_in_progress.php");
    require("../db/conn.php");
	require("../util/util.php");
    $index = $_POST["index"];
    $sql1="select * from project where 1=1 order by pr_date1 desc limit $index, $per";
	$result1=mysql_query("$sql1");
	$count = $index;
	while ($row1 = mysql_fetch_array($result1)) {
	    $count++;
?>
	<div class="r_item">
		<div class="r_title shadow_title">
		<?php 
		    echo $row1['pr_name'];
			if ($row1['pr_mark'] == 1) {
			    echo "(已结题)";
			}
		?>
		</div>
		<div class="r_content pip_content">
		<?php 
		    $id=$row1['pr_id'];
			if($row1['pr_num']!=null){
    			echo "<div>项目号：".$row1['pr_num']."</div>";
			}
			if($row1['pr_type']!=null){
    			echo "<div>项目来源：".$row1['pr_type']."</div>";
			}
			echo "<div>负责人：";
			$sql2="select m_name from project,project_header where project.pr_id=project_header.pr_id and project.pr_id=$id";				$result2=mysql_query("$sql2");
			while($row2=mysql_fetch_array($result2)) {
   				echo $row2['m_name']."  ";
			}
			echo "</div>";
			$pr_d1 = str_replace("-", ".", substr($row1['pr_date1'], 0, 7));
			$pr_d2 = str_replace("-", ".", substr($row1['pr_date2'], 0, 7));
			echo "<div>起始时间：".$pr_d1."-".$pr_d2."    "."</div>";
		?>
		</div>
	</div>
<?php 
    }
	$sql3="select pr_id from project where 1=1 order by pr_date1 desc limit $count, $per";
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