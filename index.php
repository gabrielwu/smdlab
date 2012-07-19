<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站首页</title>
<?php require("./include/media/css.php");?>
<?php 
require("./db/conn.php");
require("./util/util.php");
require("./config/index_paper_page.php");
?>
<link rel="stylesheet" type="text/css" href="./media/css/index.css" />
</head>
<body>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_index.php");?>
	</div>
	<div id="main">
	    <div id="news_area">
		    <h5>新闻列表</h5>
			<a href="academic.php"><img class="more_img" src="./media/css/images/more.gif"/></a>
			<div id="news_items">
			    <table id="news_table">
				<?php 
				    $result2 = mysql_query("SELECT * FROM `academic` ORDER BY a_date desc, a_type");
					$j=0;
					while($row2 = mysql_fetch_array($result2) and $j<5){
				?>
				    <tr>
					    <td width="20%">
						    <?php  if($row2['a_type']=='a'){ ?>
							    <a class="news_type_a" href="academic.php?a_type=a"><?php echo "[论文发表]";?></a>
						    <?php } else if($row2['a_type']=='b') {?>
							    <a class="news_type_a" href="academic.php?a_type=b"><?php echo "[学生新闻]";?></a>
						    <?php } else if($row2['a_type']=='c'){ ?>
							    <a class="news_type_a" href="academic.php?a_type=c"><?php echo "[会议新闻]";?></a>
						    <?php } else { ?>
							    <a class="news_type_a" href="academic.php?ntype=d"><?php echo "[其他新闻]";?></a>
						    <?php } ?>
						</td>
						<td width="60%">
						    <a href="academic_detail.php?nid=<?php echo $row2['a_id']?>" title="<?php echo $row2['a_name']?>">
						        <?php 
								    echo GBsubstr($row2['a_name'], 0, 42);
								?>
							</a>
						</td>
						<td><?php echo $row2['a_date']?></td>
					</tr>
				<?php $j++ ;} ?>
				</table>
			</div>
		</div>
		<div class="slide">
		    <div id="simplegallery1"></div>
			<div id="newsmessage"></div>
			<div class="clear-float"></div>
		</div>
		<div id="paper_area">
		    <h5>最新论文</h5>
			<a href="publications.php"><img class="more_img" src="./media/css/images/more.gif"/></a>
			<div id="paper_items">
			    <table id="paper_table">
				<?php 
				    $sql3="select * from paper order by p_date desc";
					//mysql_query("set names 'utf8'");
					$result3 = mysql_query("$sql3");
					$k=0;
					$currenttime=getdate();
					$currentyear=$currenttime[year];
					$nextyear=$currentyear+1;
					$nextyear_newyearsdate=$nextyear."-01-01";
					$sql0="select count(p_id) as count from paper";
					$result0 = mysql_query("$sql0");
					$row0 = mysql_fetch_array($result0);
					$paperCount=$row0['count'];
					$num = $paperCount;
                    $pageCount = ceil($paperCount / $per);
					while($row3 = mysql_fetch_array($result3) and $k < $per){
					    $k++;
				?>
				    <tr>
					    <td width="22%" align="left">
							<a href="paper_detail.php?pid=<?php echo $row3['p_id']?> "target=_blank>
							    <img alt="Latest Papers" src="<?php echo "./background".substr($row3['p_coverpath'],2) ?>" width=120 height=160>
							</a>
						</td>
						<td width="">
							<table>
							    <tr>
								    <td colspan="2">
								        <a href="paper_detail.php?pid=<?php echo $row3['p_id']?>" title="<?php echo $row3['p_name'];?>" target="_blank"> 
									    <?php				
										    echo $num--.".".$row3['p_name'];
									    ?>
								        </a>
								    </td>
								</tr>
								<tr>
								    <td width="16%">作者：</td>
									<td>
								    <?php 
									    $paperid=$row3['p_id'];
										$sql4="select m_name from paper,paper_member where paper.p_id=paper_member.p_no and p_id='$paperid'";
										$result4=mysql_query("$sql4");
										$m_names = "";
										while($row4 = mysql_fetch_array($result4)){
											$m_names .= $row4['m_name'].",";
										}
										$m_names_length = strlen($m_names);
										$m_names = substr($m_names, 0, $m_names_length - 1);
										echo $m_names;
									?>
								    </td>
								</tr>
								<tr>
								    <td>期刊：</td><td><?php echo $row3['p_journal']?></td>
								</tr>
								<tr>
								    <td>卷号：</td><td><?php echo $row3['p_journal_no']?></td>
								</tr>
								<tr>
								    <td>出版日期：</td><td><?php echo $row3['p_date']?></td>
								</tr>
							</table>
						</td>
					</tr>
				<?php } ?>
				</table>
				<div id="paper_page">
				    <?php
					    echo "<a class='num_page current_page' >1</a>";
					    if ($pageCount <= $page_nums) {
						    for ($pi = 2; $pi <= $pageCount; $pi++) {
				                echo "<a class='num_page' href='javascript:paper_page($pi)'>$pi</a>";	    
							}
						} else {
						    for ($pi = 2; $pi <= $page_nums; $pi++) {
					            echo "<a class='num_page' href='javascript:paper_page($pi)'>$pi</a>";
							}
							echo "...";
							echo "<a class='num_page' href='javascript:paper_page($pageCount)'>$pageCount</a>";
						}
					?>
				    <a id="pre" class="pre_next pre_next_disable"><em></em>上一页</a>
				    <a id="next" class="pre_next" href="javascript:paper_page(2)"><em></em>下一页</a>
			    </div>
			</div>
		</div>
	</div> 
</div>
<?php include("./include/footer_index.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/third_party/js/simplegallery.js"></script>
<script type="text/javascript" src="./media/third_party/js/SpryAssets/SpryCollapsiblePanel.js"></script>
<script type="text/javascript" src="./media/js/index.js"></script>
<?php 
$sql5="select a_id,s_path,a_name from academic ,slide where a_id=s_no and s_path is not null";
//mysql_query("set names 'utf8'");
$result5 = mysql_query("$sql5");
$k=0;
while($row5 = mysql_fetch_array($result5)){
    $file_path = $path[$k]="./background".substr($row5['s_path'],2);
    if (is_file($file_path)) {
		$id[$k]=$row5['a_id'];
		$name[$k]=$row5['a_name'];
		$path[$k]="./background".substr($row5['s_path'],2);
		$k++;
    }
}
?>
<script type="text/javascript">
var vacationtext=[
"<?php echo GBsubstr($name[0], 0, 47);?>"
<?php
for ($i = 1; $i < $k; $i++) {
?>
,"<?php echo GBsubstr($name[$i], 0, 47);?>"
<?php
}
?>
]
var vacationtextTitle=[
"<?php echo $name[0];?>"
<?php
for ($i = 1; $i < $k; $i++) {
?>
,"<?php echo $name[$i];?>"
<?php
}
?>
]
var id=[
"<?php echo $id[0];?>"
<?php
for ($i = 1; $i < $k; $i++) {
?>
,"<?php echo $id[$i];?>"
<?php
}
?>
]
var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [250, 180], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	imagearray: [
		["<?php echo $path[0];?>", "academic_detail.php?nid=<?php echo $id[0];?>", "_new", ""]
		<?php
		for ($i = 1; $i < $k; $i++) {
		?>
		,["<?php echo $path[$i];?>", "academic_detail.php?nid=<?php echo $id[$i];?>", "_new", ""]
		<?php
		}
		?>
	],
	autoplay: [true, 2500, 10], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	preloadfirst:false, 
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){
	    var html = "<a href='academic_detail.php?nid="+id[i]+"' target='_blank' title='"+vacationtextTitle[i]+"'>"+vacationtext[i]+"</a>"
		document.getElementById("newsmessage").innerHTML=html;
		 //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2", {contentIsOpen:false});
</script>
</body>
</html>
