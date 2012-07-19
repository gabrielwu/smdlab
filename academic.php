<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站学生活动</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/academic.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<?php require("./config/academic.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_academic.php");?>
	</div>
	<div id="main">
	    <div id="area">
		<?php
		    $a_type = "0";
			$a_typeCondition =  "";
			if (isset($_GET['a_type'])) {
    			$a_type = $_GET['a_type'];
				$a_typeCondition = "and a_type='$a_type' ";
			}
			switch ($a_type) {
			    case "0":
				    $title = "最近新闻";
					break;
				case "a":
				    $title = "论文发表";
					break;
				case "b":
				    $title = "学生新闻";
					break;
				case "c":
				    $title = "会议新闻";
					break;
				case "d":
				    $title = "其他新闻";
					break;
				default:
				    $title = "最近新闻";
					break;
			}
		?>
		<input type="hidden" id="a_type" value="<?php echo $a_type;?>" />
		    <h3><?php echo $title;?></h3>
			<div id="news_items">
			    <table id="news_table">
				<?php 
				    $sql2 = "SELECT * FROM `academic` where 1=1 ". $a_typeCondition. "ORDER BY a_date desc, a_type limit 0, $per";
				    $result2 = mysql_query($sql2);
					while($row2 = mysql_fetch_array($result2)){
				?>
				    <tr>
					    <td width="12%">
						    <?php  if($row2['a_type']=='a'){ ?>
							    <a class="news_type_a" href="academic.php?a_type=a"><?php echo "[论文发表]";?></a>
						    <?php } else if($row2['a_type']=='b') {?>
							    <a class="news_type_a" href="academic.php?a_type=b"><?php echo "[学生新闻]";?></a>
						    <?php } else if($row2['a_type']=='c'){ ?>
							    <a class="news_type_a" href="academic.php?a_type=c"><?php echo "[会议新闻]";?></a>
						    <?php } else { ?>
							    <a class="news_type_a" href="academic.php?a_type=d"><?php echo "[其他新闻]";?></a>
						    <?php } ?>
						</td>
						<td width="73%">
						    <a href="academic_detail.php?nid=<?php echo $row2['a_id']?>" title="<?php echo $row2['a_name']?>">
						        <?php 
								    echo GBsubstr($row2['a_name'], 0, 80);
								?>
							</a>
						</td>
						<td><?php echo $row2['a_date']?></td>
					</tr>
				<?php $j++ ;} ?>
				</table>
				<?php 
					$sql0="select count(a_id) as count from academic where 1=1 ". $a_typeCondition;
					$result0 = mysql_query($sql0);
					$row0 = mysql_fetch_array($result0);
					$totalCount = $row0['count'];
					$num = 1;
                    $pageCount = ceil($totalCount / $per);
				?>
			</div>
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
				<?php 
				    if ($pageCount >= 2) {
				?>
				<a id="next" class="pre_next" href="javascript:page(2)"><em></em>下一页</a>
				<?php
					} else {
				?>
				<a id="next" class="pre_next pre_next_disable" ><em></em>下一页</a>
				<?php
					}
				?>
			    
		    </div>
		</div>

				
			
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/academic.js"></script>
<script type="text/javascript">
$(function(){
    $("#a_li_<?php echo $a_type;?>").addClass("current");
});
</script>
</body>
</html>
