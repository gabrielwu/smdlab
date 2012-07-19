<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站-仪器设备</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/research.css" />
</head>
<body>
<?php 
    require("./db/conn.php");
	require("./config/device.php");
    require("./util/util.php");
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_research.php");?>
	</div>
	<div id="main">
		<div id="r_area">
		<?php 
			$sql1="select * from device limit 0, $per";
			$result1=mysql_query("$sql1");
			$count = 0;
			while ($row1 = mysql_fetch_array($result1)) {
			    $count++;
		?>
			<div class="r_item">
				<div class="r_title shadow_title"><?php echo $row1['d_name']?></div>
				<div class="r_content"><?php echo $row1['d_content']?></div>
			</div>
		<?php 
		    }
		    $sql = "select count(d_id) as count from device";
			$result = mysql_query($sql);
			if ($row = mysql_fetch_array($result)) {
			    if ($row["count"] > $per) {
		?>
		<div id="more" class="more"><a href="javascript:more(<?php echo $count;?>)">更多<em></em></a></div>
		<?php
		        } else {
		?>
		<br/>
        <?php		
				}
			}
		?>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/device.js"></script>
</body>
</html>