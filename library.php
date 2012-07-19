<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站-资源共享</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/library.css" />
<link rel="stylesheet" type="text/css" href="./media/third_party/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<?php require("./config/library.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_library.php");?>
	</div>
	<div id="main">
	    <div id="area">
		<?php 
			$result = mysql_query("select * from recommend limit 0, $per");
			$index = 0;
			while($row = mysql_fetch_array($result)){
			$index++;
		?>
		    <div class="item">
			    <h3 class="shadow_title"><?php echo $row['re_name'];?></h3>
			    <div class="item_content">
				    <?php echo $row['re_abstract'];?>
				    <a href="<?php echo $row['re_link'];?>"  target="_blank">查看</a> 
				</div>
			</div>
		<?php 
		    }
			$sql1 = "select count(re_id) as count from recommend";
			$result1 = mysql_query($sql1);
			if ($row1 = mysql_fetch_array($result1)) {
			    if ($row1["count"] > $per) {
		?>
		<div id="more" class="more"><a href="javascript:more(<?php echo $index;?>)">更多<em></em></a></div>
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
<script type="text/javascript" src="./media/js/library.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
</body>
</html>
