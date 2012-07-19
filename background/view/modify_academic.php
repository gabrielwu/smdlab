<?php 
header("Content-Type:text/html;charset=gb2312");
//ÓÃ
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
				
	$sql="select * from acade_pic where acade_no=".$_GET['id'];
	//echo $sql;
	//mysql_query("set names 'gb2312'");
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
		$page_string.='µÚÒ»Ò³|ÉÏÒ»Ò³|';
	}
	else
	{
		$page_string.='<a href=javascript:firstpage()>µÚÒ»Ò³</a>|<a href=javascript:previouspage()>ÉÏÒ»Ò³</a>|';
	}
	if(($page==$page_count)||($page_count==0))
	{
		$page_string.='ÏÂÒ»Ò³|Î²Ò³';
	}
	else
	{
		$page_string.='<a href=javascript:nextpage()>ÏÂÒ»Ò³</a>|<a href=javascript:lastpage()>Î²Ò³</a>';
	}
	if($amount)
	{
		$sql="select pi_path from acade_pic where acade_no= '".$_GET['id']."'  limit ".($page-1)*$pagesize.", $pagesize";
		//echo $sql;
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
	//print_r($rowset);
	$sql1="select a_name from academic where a_id=".$_GET['id'];
	mysql_query("set names 'gb2312'");
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_row($result1);
			
?>
<script>
//·­Ò³ajax
	function firstpage(){
		result = $.ajax({url:"../view/modify_academic.php?page=1&id="+<?php echo $_GET['id'];?>,async:false});
		$("#display").html(result.responseText);
	}
	function previouspage(){
		result = $.ajax({url:"../view/modify_academic.php?page="+<?php echo ($page-1);?>+"&id="+<?php echo $_GET['id'];?>,async:false});
		$("#display").html(result.responseText);
	}
	function nextpage(){
		 result = $.ajax({url:"../view/modify_academic.php?page="+<?php echo ($page+1);?>+"&id="+<?php echo $_GET['id'];?>,async:false});
		$("#display").html(result.responseText);
	}
	function lastpage(){
		result = $.ajax({url:"../view/modify_academic.php?page="+<?php echo $page_count;?>+"&id="+<?php echo $_GET['id'];?>,async:false});
		$("#display").html(result.responseText);
	}
</script>
<div id="display">
	<table width="650px" align="center" >
		<tr>
			<td colspan="3" align="center"><font size="4"><?php echo $row1[0];?>&nbsp;ÕÕÆ¬</font></td>
		</tr>
		<tr>
			<td colspan="3" align="right">&nbsp;</td>
		</tr>
		<tr>
			<?php if($rowset[0][0]){?><td width="200px" align="center"><img width="150" height="150" src="<?php if($rowset[0][0]) echo $rowset[0][0];?>"></td><?php }?>
			<?php if($rowset[1][0]){?><td width="200px" align="center"><img width="150" height="150" src="<?php if($rowset[1][0]) echo $rowset[1][0];?>"></td><?php }?>
			<?php if($rowset[2][0]){?><td width="200px" align="center"><img width="150" height="150" src="<?php if($rowset[2][0]) echo $rowset[2][0];?>"></td><?php }?>		
		</tr>
		<tr>
			<?php if($rowset[0][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[0][0];?>')">É¾³ý</a></td><?php }?>
			<?php if($rowset[1][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[1][0];?>')">É¾³ý</a></td><?php }?>
			<?php if($rowset[2][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[2][0];?>')">É¾³ý</a></td><?php }?>		
		</tr>
		<tr>
			<?php if($rowset[3][0]){?><td width="200px" align="center"><img width="150" height="150" src="<?php if($rowset[3][0]) echo $rowset[3][0];?>"></td><?php }?>
			<?php if($rowset[4][0]){?><td align="center"><img width="150" height="150" src="<?php if($rowset[4][0]) echo $rowset[4][0];?>"></td><?php }?>
			<?php if($rowset[5][0]){?><td align="center"><img width="150" height="150" src="<?php if($rowset[5][0]) echo $rowset[5][0];?>"></td><?php }?>
		</tr>
		<tr>
			<?php if($rowset[3][0]){?><td align="center" ><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[3][0];?>')">É¾³ý</a></td><?php }?>
			<?php if($rowset[4][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[4][0];?>')">É¾³ý</a></td><?php }?>
			<?php if($rowset[5][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[5][0];?>')">É¾³ý</a></td><?php }?>		
		</tr>
		<tr>
			<?php if($rowset[6][0]){?><td width="200px" align="center"><img width="150" height="150" src="<?php if($rowset[6][0]) echo $rowset[6][0];?>"></td><?php }?>
			<?php if($rowset[7][0]){?><td align="center"><img width="150" height="150" src="<?php if($rowset[7][0]) echo $rowset[7][0];?>"></td><?php }?>
			<?php if($rowset[8][0]){?><td align="center"><img width="150" height="150" src="<?php if($rowset[8][0]) echo $rowset[8][0];?>"></td><?php }?>
		</tr>
		<tr>
			<?php if($rowset[6][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[6][0];?>')">É¾³ý</a></td><?php }?>
			<?php if($rowset[7][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[7][0];?>')">É¾³ý</a></td><?php }?>
			<?php if($rowset[8][0]){?><td align="center"><a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[8][0];?>')">É¾³ý</a></td><?php }?>		
		</tr>
		<tr>
			<td colspan="3" align="right"><?php echo '<font size=2><b>'.$page_string.'</b></font>';?></td>
		</tr>
	</table>
</div>
<script>
function deletepic(id,path) {
    if (confirm("È·¶¨É¾³ý£¿")) {
		//alert("AAAAAAAAAA");
		result = $.ajax({url:"../model/delete_acade_pic.php?id="+id+"&pi_path="+path,async:false});
		
		if(result.responseText==1)
			alert("É¾³ý³É¹¦£¡");
		else
			alert("É¾³ýÊ§°Ü£¡"); 
		//alert(result.responseText);			
		acadePiclist(id);
	}
}
</script>