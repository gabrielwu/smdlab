<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/project_in_progress.php");
    require("../db/conn.php");
	require("../util/util.php");
    $request_page = $_POST["request_page"];
	$start = ($request_page - 1) * $per;
	$request_page_pre = $request_page - 1;
	$request_page_next = $request_page + 1;

	$num = $start + 1;
	$sql0="select count(pr_id) as count from project";
	$result0 = mysql_query("$sql0");
	$row0 = mysql_fetch_array($result0);
	$paperCount = $row0['count'];
	$pageCount = ceil($paperCount / $per);

	$page_html = "<div id='page'>";
	
	$req_left_nums = floor($page_nums / 2);
	$req_right_nums = floor($page_nums / 2);
	$left_ori = ($request_page - $req_left_nums);
	$right_ori = ($request_page + $req_right_nums);
	if ($left_ori <= 1) {
	    $left_ori = 1;
		$right_ori = $page_nums;
		if ($pageCount > $page_nums) {
		    for ($i = 1; $i <= $page_nums; $i++) {
			    if ($i != $request_page) {
				    $page_html .= "<a class='num_page' href='javascript:page($i)'>$i</a>";
				} else {
				    $page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
			$page_html .= " ... ";
			$page_html .= "<a class='num_page' href='javascript:page($pageCount)'>$pageCount</a>";
		} else {
		    for ($i = 1; $i <= $pageCount; $i++) {
			    if ($i != $request_page) {
				    $page_html .= "<a class='num_page' href='javascript:page($i)'>$i</a>";
				} else {
				    $page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
		}
	} else if ($right_ori >= $pageCount) {
		$right_ori = $pageCount;
		$left_ori = $pageCount + 1 - $page_nums;
		if ($left_ori > 1) {
		    $page_html .= "<a class='num_page' href='javascript:page(1)'>1</a>";
		    $page_html .= " ... ";
		} else {
		    $left_ori = 1;
		}
		for ($i = $left_ori; $i <= $pageCount; $i++) {
		    if ($i != $request_page) {
			    $page_html .= "<a class='num_page' href='javascript:page($i)'>$i</a>";
			} else {
			    $page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
	} else { // $right_ori < $pageCount && $left_ori > 1
	    $page_html .= "<a class='num_page' href='javascript:page(1)'>1</a>";
		$page_html .= " ... ";
		for ($i = $left_ori; $i <= $right_ori; $i++) {
		    if ($i != $request_page) {
			    $page_html .= "<a class='num_page' href='javascript:page($i)'>$i</a>";
			} else {
			    $page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
		$page_html .= " ... ";
		$page_html .= "<a class='num_page' href='javascript:page($pageCount)'>$pageCount</a>";
	}
	

	
	if ($request_page_pre > 0 && $request_page_next <= $pageCount) { // pre,next
	    $page_html .= "<a id='pre' class='pre_next' href='javascript:page($request_page_pre)'><em></em>上一页</a>";
		$page_html .= "<a id='next' class='pre_next' href='javascript:page($request_page_next)'><em></em>下一页</a>";
	} else if ($request_page_pre <= 0 && $request_page_next <= $pageCount) { // next
	    $page_html .= "<a id='pre' class='pre_next pre_next_disable' >上一页</a>";
		$page_html .= "<a id='next' class='pre_next' href='javascript:page($request_page_next)'><em></em>下一页</a>";
	} else if ($request_page_pre > 0 && $request_page_next > $pageCount) { // pre
	    $page_html .= "<a id='pre' class='pre_next' href='javascript:page($request_page_pre)'><em></em>上一页</a>";
		$page_html .= "<a id='next' class='pre_next pre_next_disable' ><em></em>下一页</a>";
	} else if ($request_page_pre <= 0 && $request_page_next > $pageCount) { // pre
	    $page_html .= "<a id='pre' class='pre_next pre_next_disable'><em></em>上一页</a>";
		$page_html .= "<a id='next' class='pre_next pre_next_disable'><em></em>下一页</a>";
	}
	$page_html .= "</div>";
?>
<?php 
	$sql1="select * from project where 1=1 order by pr_date1 desc limit $start, $per";
	$result1=mysql_query("$sql1");
	while ($row1 = mysql_fetch_array($result1)) {
?>
	<div class="r_item">
		<div class="r_title shadow_title">
		<?php 
		    echo $row1['pr_name'];
			if ($row1['pr_mark'] == 1) {
			    echo "(已结题)";
			}
		?>
		</div>
		<div class="r_content pip_content">
		<?php 
		    $id=$row1['pr_id'];
			if($row1['pr_num']!=null){
    			echo "<div>项目号：".$row1['pr_num']."</div>";
			}
			if($row1['pr_type']!=null){
    			echo "<div>项目来源：".$row1['pr_type']."</div>";
			}
			echo "<div>负责人：";
			$sql2="select m_name from project,project_header where project.pr_id=project_header.pr_id and project.pr_id=$id";
			$result2=mysql_query("$sql2");
			while($row2=mysql_fetch_array($result2)) {
    			echo $row2['m_name']."  ";
			}
			echo "</div>";
			$pr_d1 = str_replace("-", ".", substr($row1['pr_date1'], 0, 7));
			$pr_d2 = str_replace("-", ".", substr($row1['pr_date2'], 0, 7));
			echo "<div>起始时间：".$pr_d1."-".$pr_d2."    "."</div>";
		?>
		</div>
	</div>
<?php }?>
<?php
echo $page_html;
?>