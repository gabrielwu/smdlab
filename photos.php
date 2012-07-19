<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站-课余生活</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/photos.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_photos.php");?>
	</div>
	<div id="main">
	    <div id="area">
			<div class="item">
			    <h3>实验室生活</h3>
				<?php
				    $result = mysql_query("select ac_id,ac_name,ac_pic_cover_path from activity");
					$index = 0;
					while($row = mysql_fetch_array($result)){
					    if (++$index % 2 == 1) {
						    $class = "float_left";
						} else {
						    $class = "float_right";
						}
				?>
				<div class="album <?php echo $class;?>">
				    <a href="activity_album.php?id=<?php echo $row['ac_id'];?>" >
					    <img src="<?php echo "../background".substr($row['ac_pic_cover_path'],2);?>" title="<?php echo $row['ac_name'];?>" />
					</a>
                    <div class="album_title"> <?php echo $row['ac_name'];?></div>
                </div>  
			    <?php }?>
				<div class="clear"></div>
			</div>
		</div>
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/photos.js"></script>
</body>
</html>
