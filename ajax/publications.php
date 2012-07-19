<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/publications.php");
    require("../db/conn.php");
	require("../util/util.php");
    $index = $_POST["index"];
	$year = $_POST["year"];
	$currenttime=getdate();
	$currentyear=$currenttime[year];
	$nextyear=$currentyear+1;
	$nextyear_newyearsdate=$nextyear."-01-01";
	if ($year == -1) {
	    $sqlC = "select count(p_id) as count from paper where p_date <'$nextyear_newyearsdate'";
    	$sql1="select p_id from paper where p_date <'$nextyear_newyearsdate' order by p_date desc limit $index, $per";
	} else if ($year == $currentyear - 5) {
	    $sqlC = "select count(p_id) as count from paper where p_date <= '$year-12-31'";
	    $sql1="select p_id from paper where p_date <= '$year-12-31'  order by p_date desc limit $index, $per";
	} else {
		$sqlC = "select count(p_id) as count from paper where p_date like '$year%%'";
	    $sql1="select p_id from paper where p_date like '$year%%'  order by p_date desc limit $index, $per";
	}
	$resultC = mysql_query($sqlC);
	$rowC = mysql_fetch_array($resultC);
	$paperCount = $rowC["count"];
	$num = $paperCount - $index;
	$result1 = mysql_query("$sql1");
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
		<a class="paper_name"  href="paper_detail.php?pid=<?php echo $paperid ?>"><?php echo $row3['p_name'];?></a>, 
		<span class="bold"><?php echo $row3['p_journal']; ?></span>
		<?php 
		    if($row3["p_sci_link"]!=null){ 
		?>
            <a href="<?php echo $row3['p_sci_link']?>" style="color: #0066CC;">
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
  		<?php 
		    if($row3['p_link']!=null){ 
		?>
    		<a href="<?php echo $row3[p_link]?>">点此下载论文</a>
        <?php 
		    }
		?>
	</div>
<?php
	}
	if ($year == -1) {
    	$sql4="select p_id from paper where p_date <'$nextyear_newyearsdate' order by p_date desc limit $index, $per";
	} else if ($year == $currentyear - 5) {
	    $sql4="select p_id from paper where p_date <= '$year-12-31'  order by p_date desc limit $index, $per";
	} else {
	    $sql4="select p_id from paper where p_date like '$year%%'  order by p_date desc limit $index, $per";
	}
	$result4=mysql_query("$sql4");
	if ($row4 = mysql_fetch_array($result4)) {
?>
	<div id="more" class="more"><a href="javascript:more(<?php echo $index.",".$year;?>)">更多<em></em></a></div>
<?php
    } else {
?>
    <div id="more" class="no_more">已显示全部</div>
<?php
    }
?>