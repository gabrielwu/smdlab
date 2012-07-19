<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微纳传感材料与器件研究组网站研究成果</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/publications.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<?php require("./config/publications.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <div id="sidebar">
	    <?php include("./include/sidebar_publications.php");?>
	</div>
	<div id="main">
	    <div id="area">
		    <h3>
			<?php 
			    if (isset($_GET["year"])) {
    				$year = $_GET["year"];
				} else {
				    $year = -1;
				}
				$nextyear=$currentyear + 1;
				$nextyear_newyearsdate=$nextyear."-01-01";
			    if ($year == -1) {
				    echo "最新论文";
					$sqlC = "select count(p_id) as count from paper where p_date <'$nextyear_newyearsdate'";
					$sql1="select p_id from paper where p_date <'$nextyear_newyearsdate' order by p_date desc limit 0, $per";
				} else if ($year == $currentyear - 5) {
				    $sqlC = "select count(p_id) as count from paper where p_date <= '$year-12-31'";
				    $sql1="select p_id from paper where p_date <= '$year-12-31'  order by p_date desc limit 0, $per";
				    echo $year."年以及之前论文";
				} else {
				    $sqlC = "select count(p_id) as count from paper where p_date like '$year%%'";
				    $sql1="select p_id from paper where p_date like '$year%%'  order by p_date desc limit 0, $per";
				    echo $year."年论文";
				}
			?>
			</h3>
			<?php
    			
				$result1 = mysql_query("$sql1");
				$resultC = mysql_query($sqlC);
				$rowC = mysql_fetch_array($resultC);
				$paperCount = $rowC["count"];
				$num = $paperCount;
				$index = 0;
				while ($row1 = mysql_fetch_array($result1)) {
			?>
			<div class="item">
			    <?php 
				    ++$index;
				    echo $num--. ". ";
   					$paperid=$row1['p_id'];
                    $sql2="select m_name ,m_no from paper,paper_member where paper.p_id=paper_member.p_no and p_id='$paperid'";
                    $result2=mysql_query("$sql2");
                    while ($row2 = mysql_fetch_array($result2)) { 
   						if($row2['m_no']!=null){
				?>
				    <a href="people_detail.php?id=<?php echo $row2['m_no']; ?>">
					    <?php echo $row2['m_name'];?>
					</a>
				<?php
				            echo ", ";
       					} else {
						    echo $row2['m_name']." ".",";
						}
					}
                    $sql3="select p_name,p_journal,p_journal_no,p_link,p_sci_link,p_date from paper where p_id='$paperid'";
                    $result3=mysql_query("$sql3");
                    $row3 = mysql_fetch_array($result3);
				?>
				    <a class="paper_name" href="paper_detail.php?pid=<?php echo $paperid ?>"><?php echo $row3['p_name'];?></a>, 
					<span class="bold"><?php echo $row3['p_journal']; ?></span>
				<?php 
				    if($row3["p_sci_link"]!=null){ 
				?>
                    <a href="<?php echo $row3['p_sci_link']?>" >
                        <?php 
						    if($row3["p_journal_no"]!=null){ 
							    echo $row3["p_journal_no"]; 
						    }
						?>
                    </a>
                <?php 
				    }
				?>
                <?php echo '('.substr($row3['p_date'],0,4).')' ; ?>.
    			<?php if($row3['p_link']!=null){ ?>
    				<a href="<?php echo $row3[p_link]?>">点此下载论文</a>
                <?php }?>
			</div>
			<?php
			    }
				$sql = "select count(p_id) as count from paper ";
				if ($year == -1) {
					$sql .="where p_date <'$nextyear_newyearsdate'";
				} else if ($year == $currentyear - 5) {
				    $sql .="where p_date <= '$year-12-31'";
				} else {
				    $sql .="where p_date like '$year%%'";
				}
			    $result = mysql_query($sql);
			    if ($row = mysql_fetch_array($result)) {
    			    if ($row["count"] > $per) {
			?>
		        <div id="more" class="more"><a href="javascript:more(<?php echo $index.",".$year;?>)">更多<em></em></a></div>
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
<script type="text/javascript" src="./media/js/publications.js"></script>
<script type="text/javascript">
$(function(){
    $("#li_paper<?php echo $year;?>").addClass("current");	
});
</script>
</body>
</html>