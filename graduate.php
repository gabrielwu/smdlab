<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站-人员介绍</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/people.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_people.php");?>
	</div>
	<div id="main">
	    <div id="area">
		    <div class="area2" id="di">
			    <h4 class="shadow_title">已毕业学生</h4>
				<?php
					$result = mysql_query("SELECT * FROM member where m_mark=0");
					$index = 1;
					while ($row = mysql_fetch_array($result)) {
					    if ($index++ % 2 == 1) {
						    $class = "person_area_left";
						} else {
						    $class = "person_area_right";
						}
				?>   
				    <div class="person_area <?php echo $class;?>">
					    <table>
						    <tr>
							    <td>
								    <a class="photo" href="people_detail.php?id=<?php echo $row['m_id']?>">
									    <img src="<?php echo "../background".substr($row['m_photopath'],2) ;?>" alt="View Detail" />
									</a>
								</td>
								<td>
								    <ul>
									    <li>
										    <a href="people_detail.php?id=<?php echo $row['m_id']?>">
											    <?php echo $row['m_cname']?>&nbsp;&nbsp;<?php echo $row['m_ename']?>
											</a>
										</li>
										<li><?php echo $row['m_title1']?></li>
										<li><?php echo $row['m_email']?></li>
										<li><?php echo $row['m_tel']?></li>
										<li><?php echo $row['m_addr']?></li>
									</ul>
								</td>
							</tr>
						</table>
					</div>	
				<?php } ?>
				<div class="clear"></div>
            </div>

        </div>			
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/people.js"></script>
</body>
</html>
