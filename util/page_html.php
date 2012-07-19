<?php
header('Content-Type:text/html;charset=utf-8');
    $result0 = mysql_query("$sql0");
	$row0 = mysql_fetch_array($result0);
	$totalCount = $row0['count'];
	
    $request_page = $_POST["request_page"];
	$start = ($request_page - 1) * $per;
	$request_page_pre = $request_page - 1;
	$request_page_next = $request_page + 1;
	$pageCount = ceil($totalCount / $per);
	
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