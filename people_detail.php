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
		    <div class="area2" id="area_detail">
			    <h4>详细资料</h4>
				<?php
					$peopleid=$_GET['id'];
					$result = mysql_query("select * from member where m_id='$peopleid'");
					$row = mysql_fetch_array($result);
				?>
				<table id="people_info">
					<tr valign="top">
					    <td rowspan="5" class="photo_td" width="40%">
						    <img alt="View Detail" src="<?php echo "../background".substr($row['m_photopath'],2);?>"></img> 
						</td>
					    <td width="20%">姓名:</td>
						<td width="40%"><?php echo $row['m_cname']?></td>
					</tr>
					<tr valign="top">
					    <td>职称:</td>
						<td><?php echo $row['m_title1']?></td>
					</tr>
					<tr valign="top">
					    <td>电子邮件:</td>
						<td><?php echo $row['m_email']?></td>
					</tr>
					<tr valign="top">
					    <td>电话:</td>
						<td><?php echo $row['m_tel']?></td>
					</tr>
					<tr valign="top">
					    <td>地址:</td>
						<td><?php echo $row['m_addr']?></td>
					</tr>
				</table>
				<h4>个人简历</h4>
			    <div id="people_brief"><?php echo $row['m_detail']; ?></div>
		    </div>
        </div>			
    </div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/people.js"></script>
</body>
</html>
