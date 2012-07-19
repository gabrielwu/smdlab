<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站-研究内容</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/research.css" />
<link rel="stylesheet" type="text/css" href="./media/css/project_in_progress.css" />
</head>
<body>
<?php 
    require("./db/conn.php");
	require("./config/project_in_progress.php");
    require("./util/util.php");
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php require("./include/sidebar_research.php");?>
	</div>
	<div id="main">
		<div id="r_area">
		<?php 
			$sql1="select * from project where 1=1 order by pr_date1 desc limit 0, $per";
			$result1=mysql_query("$sql1");
			$count = 0;
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
					$sql2="select m_name from project,project_header where project.pr_id=project_header.pr_id and project.pr_id=$id";
					$result2=mysql_query("$sql2");
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
		<?php }?>
		<?php 
			$sql0="select count(pr_id) as count from project";
			$result0 = mysql_query($sql0);
			$row0 = mysql_fetch_array($result0);
			$paperCount = $row0['count'];
			$num = 1;
            $pageCount = ceil($paperCount / $per);
				?>
				<div id="page">
				    <?php
					    echo "<a class='num_page current_page' >1</a>";
					    if ($pageCount <= $page_nums) {
						    for ($pi = 2; $pi <= $pageCount; $pi++) {
				                echo "<a class='num_page' href='javascript:page($pi)'>$pi</a>";	    
							}
						} else {
						    for ($pi = 2; $pi <= $page_nums; $pi++) {
					            echo "<a class='num_page' href='javascript:page($pi)'>$pi</a>";
							}
							echo "...";
							echo "<a class='num_page' href='javascript:page($pageCount)'>$pageCount</a>";
						}
					?>
				    <a id="pre" class="pre_next pre_next_disable"><em></em>上一页</a>
				    <a id="next" class="pre_next" href="javascript:page(2)"><em></em>下一页</a>
			    </div>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/project_in_progress.js"></script>
</body>
</html>