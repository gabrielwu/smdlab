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
	//��ҳajax
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
		case e1: $title='��һ';break;
		case e2: $title='�ж�';break;
		case e3: $title='����';break;
		case d1: $title='��һ';break;
		case d2: $title='����';break;
		case d3: $title='����';break;
		case d4: $title='��ʿ��';break;
		case c: $title='��ʦ';break;
		case b: $title='������';break;
		case a: $title='����';break;			
		}
	//print_r($member);
?>	
	<tr><td width="100px" height="50" align="center"><?php echo $member[1]; ?></td><td width="80px"><?php echo $title; ?></td><td width="180px"><?php echo $member[3]; ?></td><td width="140px"><?php echo $member[4]; ?></td><td width="120px"></td></tr>
	<tr><td></td><td></td><td></td><td></td><td><a href="modify_member.php?id=<?php echo $member[0]; ?>">�޸���ϸ��Ϣ</a>|<a href="javascript:deletemember('<?php echo $member[0]?>')">ɾ��</a></td></tr>
<?php
	}
?>
	<tr>
		<td colspan="5" align="right"><?php echo '<font size=2><b>'.$page_string.'</b></font>';?></td>
	</tr>
</table>
</div>
<script>
//��ʾ��ϸ��Ϣ���޸���Ϣajax
function deletemember(id){
    if (confirm("ȷ��ɾ����")) {
		result = $.ajax({url:"../model/delete_member.php?id="+id,async:false});
		if(result.responseText==1)
			alert("ɾ���ɹ���");
		else
			alert("ɾ��ʧ�ܣ�"); 
		//alert(result.responseText);			
		memberlist();
	}
}
</script>

