<?php session_start(); //用?><html><head>	<title>增加学生活动</title>	<link rel="stylesheet" type="text/css" href="../css/main.css" />	<link rel="stylesheet" href="../css/jquery-ui-1.8.14.custom.css">	<script src="../js/jquery-1.5.1.min.js"></script>	<script src="../js/jquery-ui-1.8.14.custom.min.js"></script>	<link rel="stylesheet" href="../css/demos.css">	<link rel="stylesheet" href="../css/jquery.ui.datepicker.css">	<script src="../js/jquery.ui.datepicker.js"></script>	<script src="../js/jquery.ui.dialog.js"></script>	<script src="../js/leftbar.js"></script> 		<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>	<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>		<script type="text/javascript"> 	$(function() {	$(".date").datepicker();	$(".date").datepicker( "option", "dateFormat", 'yy-mm-dd' );	});	</script> 	</head><body style="text-align:center"><?php 		if($_SESSION['mark']!="login")	{	echo $_SESSION['mark'];?>	请从<a href="../login.html">登陆界面</a>登陆进入后台！<?php	}	else	{?><div class="wrapper">	<?php include('header.php'); ?>	<hr size="1" style="border:1px #000000 dotted;">	<div class="leftbox">		<?php include('leftbar.php');?>	</div><?php	include("connect.php");	if(isset($_GET['page']))	{		$page=intval($_GET['page']);	}	else	{		$page=1;	}	$pagesize=9;									$sql="select * from acti_pic where ac_no=".$_GET['id'];	$ac_id = $_GET['id'];	//echo $sql;	//mysql_query("set names 'gb2312'");	$result=mysql_query($sql);	$amount=mysql_numrows($result);	if($amount)	{		if($amount<$pagesize)		{			$page_count=1;		}		if($amount%$pagesize)		{			$page_count=(int)($amount/$pagesize)+1;		}		else		{			$page_count=$amount/$pagesize;		}	}	else	{		$page_count=0;	}		$page_string='';	if($page==1)	{		$page_string.='第一页|上一页|';	}	else	{		$page_string.='<a href=javascript:firstpage()>第一页</a>|<a href=javascript:previouspage()>上一页</a>|';	}	if(($page==$page_count)||($page_count==0))	{		$page_string.='下一页|尾页';	}	else	{		$page_string.='<a href=javascript:nextpage()>下一页</a>|<a href=javascript:lastpage()>尾页</a>';	}	if($amount)	{		$sql="select pi_path,pi_intro,pic_id from acti_pic where ac_no= '".$_GET['id']."'  limit ".($page-1)*$pagesize.", $pagesize";		//echo $sql;		mysql_query("set names 'gb2312'");		$result=mysql_query($sql);		while($row=mysql_fetch_row($result))		{			$rowset[]=$row;		}	}	else	{		$rowset=array();	}	//print_r($rowset);	$sql1="select ac_name from activity where ac_id=".$ac_id;	$result1=mysql_query($sql1);	$row1=mysql_fetch_row($result1);			?><script>//翻页ajax	function firstpage(){		result = $.ajax({url:"../view/modify_activity.php?page=1&id="+<?php echo $_GET['id'];?>,async:false});		$("#display").html(result.responseText);	}	function previouspage(){		result = $.ajax({url:"../view/modify_activity.php?page="+<?php echo ($page-1);?>+"&id="+<?php echo $_GET['id'];?>,async:false});		$("#display").html(result.responseText);	}	function nextpage(){		 result = $.ajax({url:"../view/modify_activity.php?page="+<?php echo ($page+1);?>+"&id="+<?php echo $_GET['id'];?>,async:false});		$("#display").html(result.responseText);	}	function lastpage(){		result = $.ajax({url:"../view/modify_activity.php?page="+<?php echo $page_count;?>+"&id="+<?php echo $_GET['id'];?>,async:false});		$("#display").html(result.responseText);	}</script><div class="rightbox"><div id="tab" style="background:#eeeeee;height:740px;text-align:left;"><div id="display"><input type='hidden' name='ac_id' id='ac_id' value="<?php echo $_GET['id'];?>" />	<table width="650px" align="center" >		<tr>			<td colspan="3" align="center"><font size="4"><?php echo $row1[0];?>的照片</font></td>		</tr>		<tr>			<td colspan="3" align="right">&nbsp;</td>		</tr>		<tr>			<?php if($rowset[0][0]){?><td width="200px" align="center"><img id="pic_<?php echo $rowset[0][2];?>" title="<?php echo $rowset[0][1]?>" width="150" height="150" src="<?php if($rowset[0][0]) echo $rowset[0][0];?>"></td><?php }?>			<?php if($rowset[1][0]){?><td width="200px" align="center"><img id="pic_<?php echo $rowset[1][2];?>" title="<?php echo $rowset[1][1]?>" width="150" height="150" src="<?php if($rowset[1][0]) echo $rowset[1][0];?>"></td><?php }?>			<?php if($rowset[2][0]){?><td width="200px" align="center"><img id="pic_<?php echo $rowset[2][2];?>" title="<?php echo $rowset[2][1]?>" width="150" height="150" src="<?php if($rowset[2][0]) echo $rowset[2][0];?>"></td><?php }?>				</tr>		<tr>			<?php if($rowset[0][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[0][2];?>','<?php echo $rowset[0][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[0][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[0][0];?>')">删除</a></td><?php }?>			<?php if($rowset[1][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[1][2];?>','<?php echo $rowset[1][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[1][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[1][0];?>')">删除</a></td><?php }?>			<?php if($rowset[2][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[2][2];?>','<?php echo $rowset[2][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[2][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[2][0];?>')">删除</a></td><?php }?>				</tr>		<tr>			<?php if($rowset[3][0]){?><td width="200px" align="center"><img id="pic_<?php echo $rowset[3][2];?>" title="<?php echo $rowset[3][1]?>" width="150" height="150" src="<?php if($rowset[3][0]) echo $rowset[3][0];?>"></td><?php }?>			<?php if($rowset[4][0]){?><td align="center"><img id="pic_<?php echo $rowset[4][2];?>" title="<?php echo $rowset[4][1]?>" width="150" height="150" src="<?php if($rowset[4][0]) echo $rowset[4][0];?>"></td><?php }?>			<?php if($rowset[5][0]){?><td align="center"><img id="pic_<?php echo $rowset[5][2];?>" title="<?php echo $rowset[5][1]?>" width="150" height="150" src="<?php if($rowset[5][0]) echo $rowset[5][0];?>"></td><?php }?>		</tr>		<tr>			<?php if($rowset[3][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[3][2];?>','<?php echo $rowset[3][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[3][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[3][0];?>')">删除</a></td><?php }?>			<?php if($rowset[4][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[4][2];?>','<?php echo $rowset[4][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[4][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[4][0];?>')">删除</a></td><?php }?>			<?php if($rowset[5][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[5][2];?>','<?php echo $rowset[5][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[5][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[5][0];?>')">删除</a></td><?php }?>				</tr>		<tr>			<?php if($rowset[6][0]){?><td width="200px" align="center"><img id="pic_<?php echo $rowset[6][2];?>" title="<?php echo $rowset[6][1]?>" width="150" height="150" src="<?php if($rowset[6][0]) echo $rowset[6][0];?>"></td><?php }?>			<?php if($rowset[7][0]){?><td align="center"><img id="pic_<?php echo $rowset[7][2];?>" title="<?php echo $rowset[7][1]?>" width="150" height="150" src="<?php if($rowset[7][0]) echo $rowset[7][0];?>"></td><?php }?>			<?php if($rowset[8][0]){?><td align="center"><img id="pic_<?php echo $rowset[8][2];?>" title="<?php echo $rowset[8][1]?>" width="150" height="150" src="<?php if($rowset[8][0]) echo $rowset[8][0];?>"></td><?php }?>		</tr>		<tr>			<?php if($rowset[6][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[6][2];?>','<?php echo $rowset[6][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[6][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[6][0];?>')">删除</a></td><?php }?>			<?php if($rowset[7][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[7][2];?>','<?php echo $rowset[7][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[7][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[7][0];?>')">删除</a></td><?php }?>			<?php if($rowset[8][0]){?><td align="center"><a href="javascript:modifypic('<?php echo $rowset[8][2];?>','<?php echo $rowset[8][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[8][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[8][0];?>')">删除</a></td><?php }?>				</tr>		<tr>			<td colspan="3" align="right"><?php echo '<font size=2><b>'.$page_string.'</b></font>';?></td>		</tr>	</table></div><div id="modify_intro" title="修改说明"></div></div></div><hr size="1" style="border:1px #000000 dotted;">	<?php include('footer.php');?><script>$(function(){    $('#modify_intro').dialog({					autoOpen: false,					width: 300,					buttons: {						"Ok": function() { 						    modify_intro();							$(this).dialog("close"); 						}, 						"Cancel": function() { 							$(this).dialog("close"); 						} 					},		            modal: true				});})function data() {	var id;	var intro;}function activity() {    var ac_id;	var ac_pic_cover_path;}function modify_intro() {    var id = <?php echo $_GET['id'];?>;    var intro = $("#pic_intro").val();	var data1 = new data;	data1['id']=id;	data1['intro'] = intro;		$.ajax({		    type: 'POST',			url: "../model/modify_activity_intro.php",			data: data1,			success: function(res) {			            if (res.indexOf("1") != -1) {						    alert("修改成功!");							$("#pic_"+id).attr("title", intro);						} else {    						alert("修改失败！");						}					}	});}function setcover(ac_pic_cover_path) {    var ac_id = $("#ac_id").val();	var data1 = new activity();	data1['ac_id'] = ac_id;	data1['ac_pic_cover_path'] = ac_pic_cover_path;	$.ajax({		    type: 'POST',			url: "../model/modify_activity_cover.php",			data: data1,			success: function(res) {			            if (res.indexOf("1") != -1) {						    alert("修改成功!");						} else {    						alert("修改失败！");						}					}		});}function modifypic(id,intro) {	$('#modify_intro').dialog('open');	intro = $("#pic_"+id).attr("title");	var html = "<input  type='text' value='"+intro+"' id='pic_intro' />"	html += "<input type='hidden' id='pic_id' value='"+id+"'>"	$('#modify_intro').html(html);}function deletepic(id,path) {    if (confirm("确定删除？")) {		//alert("AAAAAAAAAA");		result = $.ajax({url:"../model/delete_acti_pic.php?id="+id+"&pi_path="+path,async:false});				if(result.responseText==1)			alert("删除成功！");		else			alert("删除失败！"); 		//alert(result.responseText);					actiPiclist(id);	}}</script><?php } ?>