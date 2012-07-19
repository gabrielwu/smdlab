<div id="sidebar_nav_p1" class="sidebar_nav">
	<h3><a href="#">期刊论文</a></h3>
	<div>
	    <ul>
		<?php 
    		$currenttime=getdate();
			$currentyear=$currenttime[year];
			$years = $currentyear;
		?>
		    <li id="li_paper-1"><a href="publications.php">最新论文</a></li>
    		<li id="li_paper<?php echo $years;?>"><a href="publications.php?year=<?php echo $years;?>"><?php echo $years;?>年的论文</a></li>
			<li id="li_paper<?php echo --$years;?>"><a href="publications.php?year=<?php echo $years;?>"><?php echo $years;?>年的论文</a></li>
			<li id="li_paper<?php echo --$years;?>"><a href="publications.php?year=<?php echo $years;?>"><?php echo $years;?>年的论文</a></li>
			<li id="li_paper<?php echo --$years;?>"><a href="publications.php?year=<?php echo $years;?>"><?php echo $years;?>年的论文</a></li>
			<li id="li_paper<?php echo --$years;?>"><a href="publications.php?year=<?php echo $years;?>"><?php echo $years;?>年的论文</a></li>
			<li id="li_paper<?php echo --$years;?>"><a href="publications.php?year=<?php echo $years;?>"><?php echo $years;?>年之前的论文</a></li>
		</ul>
	</div>
</div>
<div id="sidebar_nav_p2" class="sidebar_nav">
	<h3><a href="#">专利及相关知识产权</a></h3>
	<div>
		<ul>
			<li id="li_patent"><a href="patent.php">专利</a></li>
		</ul>
	</div>
</div>
<div id="back_to_top">
    <a href="#header" onclick="" >TOP</a>
</div>