<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站专利及相关知识产权</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/publications.css" />
<link rel="stylesheet" type="text/css" href="./media/css/patent.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<?php require("./config/patent.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_publications.php");?>
	</div>
	<div id="main">
	    <div id="area">
			<h3>专利</h3>
			<?php
				$sql1="select * from patent limit 0, $per";
				$result1=mysql_query("$sql1");
				$index = 0;
				while($row1=mysql_fetch_array($result1)){
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
				$sql = "select count(pa_id) as count from patent";
			    $result = mysql_query($sql);
			    if ($row = mysql_fetch_array($result)) {
    			    if ($row["count"] > $per) {
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
<script type="text/javascript" src="./media/js/patent.js"></script>
</body>
</html>
