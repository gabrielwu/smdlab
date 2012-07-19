<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站-研究成果</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/publications.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_publications.php");?>
	</div>
	<div id="main">
	    <div id="area">
		    <div class="area2" id="area_detail">
			<?php 
			    $paperid=$_GET['pid'];
				$sql1="select * from paper where p_id='$paperid'";
				$result1 = mysql_query("$sql1");
				$row1 = mysql_fetch_array($result1);
			?>
				<h4><?php echo $row1['p_name']?></h4>
				<table id="paper_info_table">
					<tr valign="top">
						<td rowspan="5" class="photo_td" width="35%">
							<img src="<?php echo "../background".substr($row1['p_coverpath'],2)?>" />
						</td>
						<td width="15%" class="cn_td">作者:</td>
						<td width="50%">
						<?php 
							$sql2="select m_name ,m_no from paper,paper_member where paper.p_id=paper_member.p_no and p_id='$paperid'";
							$result2=mysql_query("$sql2");
							while ($row2 = mysql_fetch_array($result2)) {
								echo $row2['m_name']." ".",";
							}
						?>
						</td>
					</tr>
					<tr valign="top">
						<td class="cn_td">期刊:</td>
						<td><?php echo $row1['p_journal']?></td>
					</tr>
					<tr valign="top">
						<td class="cn_td">卷号:</td>
						<td><?php echo $row1['p_journal_no']?></td>
					</tr>
					<tr valign="top">
						<td class="cn_td">出版日期:</td>
						<td><?php echo $row1['p_date']?></td>
					</tr>
					<tr>
					    <td id="link_td" colspan="2">
						    <a href="<?php echo $row1['p_sci_link']?>">期刊链接</a> | <a href="<?php echo $row1['p_link']?>">下载</a>
						</td>
					</tr>
				</table>
				<div id="paper_abstract">
					<h5>摘要Abstract</h5>
					<div><?php echo $row1['p_abstract']?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/publications.js"></script>
</body>
</html>
