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
	$sql="select * from link";
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
		$sql="select l_id,l_name,l_mark, l_content from link order by l_id asc limit ".($page-1)*$pagesize.", $pagesize";
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
		result = $.ajax({url:"../view/link_list.php?page=1",async:false});
		$("#display").html(result.responseText);
		
	}
	function previouspage(){
		result = $.ajax({url:"../view/link_list.php?page="+<?php echo ($page-1);?>,async:false});
		$("#display").html(result.responseText);
	}
	function nextpage(){
		 result = $.ajax({url:"../view/link_list.php?page="+<?php echo ($page+1);?>,async:false});
		$("#display").html(result.responseText);
	}
	function lastpage(){
		result = $.ajax({url:"../view/link_list.php?page="+<?php echo $page_count;?>,async:false});
		$("#display").html(result.responseText);
	}
</script>
<div id="display">
<table>
<?php 
	

	foreach($rowset as $linka)
	{
		
	//print_r($member);

?>	
	<tr>
		<td width="500px"  ><input id="<?php echo $linka[0];?>lname" type="text" value="<?php echo $linka[1]; ?>" size="50"/></td>
		<td width="100px">
			<select id="<?php echo $linka[0];?>lmark" name="mark">
				<option value="0" <?php if($linka[2]=='0') echo 'selected="selected"';?>>学术期刊连接</option>
				<option value="1" <?php if($linka[2]=='1') echo 'selected="selected"';?>>常用链接</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<input id="<?php echo $linka[0];?>website" type="text" value="<?php echo $linka[3];?>" size="50"/>
		</td>
		<td>
		<a href="javascript:modifylink('<?php echo $linka[0];?>')">修改</a>|<a href="javascript:deletelink('<?php echo $linka[0];?>')">删除</a>
		</td>
	</tr>
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
function deletelink(id){
    if (confirm("确定删除？")) {
		result = $.ajax({url:"../model/delete_link.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 
		//alert(result.responseText);			
		linklist();
	}
}
	function modifylink(id)
	{
		var lname = document.getElementById(id+'lname').value;
		var lmark = document.getElementById(id+'lmark').value;
		var website = document.getElementById(id+'website').value;
		result = $.ajax({url:"../model/modify_link.php?id="+id+"&lname="+lname+"&lmark="+lmark+"&website="+website,async:false});
		if(result.responseText==1)
			alert("修改成功！");
		else
			alert("修改失败！"); 
		// alert(result.responseText);			
		linklist();
	}
</script>

