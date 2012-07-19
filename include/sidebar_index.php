<?php 
$result = mysql_query("SELECT * FROM contact where C_id=1");
$row = mysql_fetch_array($result);
?>
<div id="sidebar_nav_1" class="sidebar_nav">
	<h3><a href="#">联系方式</a></h3>
	<div>
		<ul>
		    <li><strong>地址：</strong><?php echo $row[1] ?> </li>
			<li><strong>电话：</strong><?php echo $row[2] ?> </li>
			<li><strong>传真：</strong><?php echo $row[3] ?> </li>
			<li><strong>邮箱：</strong><?php echo $row[4] ?> </li>
		</ul>
	</div>
</div>
<div id="sidebar_nav_4" class="sidebar_nav bold_a">
	<h3><a href="#">常用链接</a></h3>
	<div>
		<ul>
		<?php
		    $result = mysql_query("SELECT * FROM link where l_mark=1");
			while($row = mysql_fetch_array($result)){
		?>
		    <li><a href="<?php echo $row['l_content']?>" target="_blank" ><?php echo $row['l_name']?></a></li>
		<?php
		    }
		?>
		</ul>
	</div>
</div>
<div id="sidebar_nav_2" class="sidebar_nav">
	<h3><a href="#">常用期刊连接</a></h3>
	<div>
	    <ul id="journal_link">
		<?php  
	        $result = mysql_query("SELECT l_name,l_content FROM link where l_mark=0");
			$count = 1;
	        while($row = mysql_fetch_array($result)){
		?>
            <li><a href="<?php echo $row['l_content']?>" target="_blank" ><?php echo $row['l_name']?></a></li>
		<?php 
		    } 
	    ?>
		</ul>
	</div>
</div>
<div id="sidebar_nav_3" class="sidebar_nav bold_a">
	<h3><a href="#">影响因子</a></h3>
	<div>
		<ul>
		    <?php
			    $result7 = mysql_query("SELECT l_name,l_content FROM link where l_mark=3");
				$row7 = mysql_fetch_array($result7);
			?>
			    <li><a href="<?php echo $row7['l_content']?>"><?php echo $row7['l_name']?></a></li>
			<?php
			    $result7 = mysql_query("SELECT l_name,l_content FROM link where l_mark=4");
				$row7 = mysql_fetch_array($result7);
			?>
			    <li><a href="<?php echo $row7['l_content']?>"><?php echo $row7['l_name']?></a></li>
			<?php
			    $result7 = mysql_query("SELECT l_name,l_content FROM link where l_mark=5");
				$row7 = mysql_fetch_array($result7);
			?>
			    <li><a href="<?php echo $row7['l_content']?>"><?php echo $row7['l_name']?></a></li>
	    </ul>
	</div>
</div>