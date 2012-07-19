<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站-学术活动</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/academic.css" />
<link rel="stylesheet" type="text/css" href="./media/third_party/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_academic.php");?>
	</div>
	<div id="main">
	    <div id="area">
		    <div class="item" id="item">
			    <?php
				    $a_id = $_GET["nid"];
					$sql = "SELECT * FROM academic where a_id='$a_id'";
					$result = mysql_query($sql);
					$row = mysql_fetch_array($result);
				?>
				<h3>
				    <?php echo $row["a_name"];?><br/>
					<span><?php echo $row['a_date'];?></span>
				</h3>
				<div id="a_content"><?php echo $row["a_content"];?></div>
			</div>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/academic.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
$(function(){
    $("#a_li_<?php echo $row['a_type'];?>").addClass("current");
});
</script>
</body>
</html>
