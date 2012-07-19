<?php 
header("Content-Type:text/html;charset=gb2312");
//用
?>
<script src="../js/jquery-1.7.1.min.js"></script>
<script src="../js/jquery-ui-1.8.18.custom.min.js"></script>

<?php
	include("connect.php");
	if(isset($_GET['page']))
	{
		$page=intval($_GET['page']);
	}
	else
	{
		$page=1;
	}
	$pagesize=9;
	$sql="select * from member";
	$result=mysql_query($sql);
	$amount=mysql_numrows($result);
	if($amount)
	{
		if($amount<$pagesize)
		{
			$page_count=1;
		}
		if($amount%$pagesize)
		{
			$page_count=(int)($amount/$pagesize)+1;
		}
		else
		{
			$page_count=$amount/$pagesize;
		}
	}
	else
	{
		$page_count=0;
	}
	$page_string='';
	if($page==1)
	{
		$page_string.='第一页|上一页|';
	}
	else
	{
		$page_string.='<a href=javascript:firstpage()>第一页</a>|<a href=javascript:previouspage()>上一页</a>|';
	}
	if(($page==$page_count)||($page_count==0))
	{
		$page_string.='下一页|尾页';
	}
	else
	{
		$page_string.='<a href=javascript:nextpage()>下一页</a>|<a href=javascript:lastpage()>尾页</a>';
	}
	if($amount)
	{
		$sql="select m_id,m_cname,m_title ,m_addr,m_tel from member order by m_id asc limit ".($page-1)*$pagesize.", $pagesize";
		mysql_query("set names 'gb2312'");
		$result=mysql_query($sql);
		while($row=mysql_fetch_row($result))
		{
			$rowset[]=$row;
		}
	}
	else
	{
		$rowset=array();
	}
?>
<script>
	//翻页ajax
	function firstpage(){
		result = $.ajax({url:"../view/member_list.php?page=1",async:false});
		$("#display").html(result.responseText);
		
	}
	function previouspage(){
		result = $.ajax({url:"../view/member_list.php?page="+<?php echo ($page-1);?>,async:false});
		$("#display").html(result.responseText);
	}
	function nextpage(){
		 result = $.ajax({url:"../view/member_list.php?page="+<?php echo ($page+1);?>,async:false});
		$("#display").html(result.responseText);
	}
	function lastpage(){
		result = $.ajax({url:"../view/member_list.php?page="+<?php echo $page_count;?>,async:false});
		$("#display").html(result.responseText);
	}
</script>
<div id="display">
<table>
<?php 
	

	foreach($rowset as $member)
	{
		switch($member[2])
		{
		case e1: $title='研一';break;
		case e2: $title='研二';break;
		case e3: $title='研三';break;
		case d1: $title='博一';break;
		case d2: $title='博二';break;
		case d3: $title='博三';break;
		case d4: $title='博士后';break;
		case c: $title='讲师';break;
		case b: $title='副教授';break;
		case a: $title='教授';break;			
		}
	//print_r($member);
?>	
	<tr><td width="100px" height="50" align="center"><?php echo $member[1]; ?></td><td width="80px"><?php echo $title; ?></td><td width="180px"><?php echo $member[3]; ?></td><td width="140px"><?php echo $member[4]; ?></td><td width="120px"></td></tr>
	<tr><td></td><td></td><td></td><td></td><td><a href="modify_member.php?id=<?php echo $member[0]; ?>">修改详细信息</a>|<a href="javascript:deletemember('<?php echo $member[0]?>')">删除</a></td></tr>
<?php
	}
?>
	<tr>
		<td colspan="5" align="right"><?php echo '<font size=2><b>'.$page_string.'</b></font>';?></td>
	</tr>
</table>
</div>
<script>
//显示详细信息、修改信息ajax
function deletemember(id){
    if (confirm("确定删除？")) {
		result = $.ajax({url:"../model/delete_member.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 
		//alert(result.responseText);			
		memberlist();
	}
}
</script>

