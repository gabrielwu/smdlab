<?php 
header("Content-Type:text/html;charset=gb2312");
//��
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
	$sql="select * from academic";
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
		$page_string.='��һҳ|��һҳ|';
	}
	else
	{
		$page_string.='<a href=javascript:firstpage()>��һҳ</a>|<a href=javascript:previouspage()>��һҳ</a>|';
	}
	if(($page==$page_count)||($page_count==0))
	{
		$page_string.='��һҳ|βҳ';
	}
	else
	{
		$page_string.='<a href=javascript:nextpage()>��һҳ</a>|<a href=javascript:lastpage()>βҳ</a>';
	}
	if($amount)
	{
		$sql="select a_id,a_name,a_date from academic order by a_id asc limit ".($page-1)*$pagesize.", $pagesize";
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
	//��ҳajax
	function firstpage(){
		result = $.ajax({url:"../view/academic_list.php?page=1",async:false});
		$("#display").html(result.responseText);
		
	}
	function previouspage(){
		result = $.ajax({url:"../view/academic_list.php?page="+<?php echo ($page-1);?>,async:false});
		$("#display").html(result.responseText);
	}
	function nextpage(){
		 result = $.ajax({url:"../view/academic_list.php?page="+<?php echo ($page+1);?>,async:false});
		$("#display").html(result.responseText);
	}
	function lastpage(){
		result = $.ajax({url:"../view/academic_list.php?page="+<?php echo $page_count;?>,async:false});
		$("#display").html(result.responseText);
	}
	function acadePiclist(id){
		result = $.ajax({url:"../view/modify_academic.php?id="+id,async:false});
		$("#display").html(result.responseText);
	}
</script>
<div id="display">
<table>
<?php 
	

	foreach($rowset as $activity)
	{
		
?>	
	<tr><td rowspan="2"width="500px" height="70" valign="top" valign="center" ><?php echo $activity[1]; ?></td><td width="100px"><?php echo $activity[2]; ?></td></tr>
	<tr><td><a href="modify_academic2.php?id=<?php echo $activity[0]; ?>">�޸���ϸ��Ϣ</a>|<a href="javascript:acadePiclist('<?php echo $activity[0]; ?>')">ɾ����Ƭ</a>|<a href="javascript:deleteacademic('<?php echo $activity[0]?>')">ɾ��</a></td></tr>
<?php
	}
?>
	<tr>
		<td colspan="2" align="right"><?php echo '<font size=2><b>'.$page_string.'</b></font>';?></td>
	</tr>
</table>
</div>
<script>
	//��ʾ��ϸ��Ϣ���޸���Ϣajax
	function deleteacademic(id){
		result = $.ajax({url:"../model/delete_academic.php?id="+id,async:false});
		if(result.responseText==1)
			alert("ɾ���ɹ���");
		else
			alert("ɾ��ʧ�ܣ�"); 
		// alert(result.responseText);			
		academiclist();
	}
</script>

