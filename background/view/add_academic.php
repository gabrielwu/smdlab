<?php 
session_start(); 
//用
?>
<html>
<head>
	<title>增加学术活动</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel="stylesheet" href="../css/jquery-ui-1.8.14.custom.css">
	<script src="../js/jquery-1.5.1.min.js"></script>
	<script src="../js/jquery-ui-1.8.14.custom.min.js"></script>

	<link rel="stylesheet" href="../css/demos.css">
	<link rel="stylesheet" href="../css/jquery.ui.datepicker.css">
	<script src="../js/jquery.ui.datepicker.js"></script>
	<script src="../js/jquery.ui.dialog.js"></script>
	<script src="../js/leftbar.js"></script> 
	
	<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
	<script type="text/javascript"> 	
	$(function() {
	$(".date").datepicker();
	$(".date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
	});
	</script>
 	
</head>
<body style="text-align:center">
<?php 
	
	if($_SESSION['mark']!="login")
	{
	echo $_SESSION['mark'];
?>
	请从<a href="../login.html">登陆界面</a>登陆进入后台！
<?php
	}
	else
	{
?>
<div class="wrapper">
	<?php include('header.php'); ?>
	<hr size="1" style="border:1px #000000 dotted;">
	<div class="leftbox">
		<?php include('leftbar.php');?>
	</div>

	<div class="rightbox">
			<div id="tab" style="background:#eeeeee;height:740px;text-align:left;">
			<table width="650px" align="center" >
				<tr>
					<td width="100px" align="center">学术活动名：</td>
					<td width="520px"><input id="aname" name="aname" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td width="100px" align="center">活动类型：</td>
					<td width="520px">
						<select id="atype" name="atype">
							<option value="c">会议</option>
							<option value="a">论文</option>
							<option value="b">学生</option>
							<option value="d">其他</option>
						</select>
					
					</td>
				<tr>
				<tr>
					<td  align="center">活动时间：</td>
					<td ><input class="date" id="date" name="date" type="text" size="50"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动内容：</td>
				<tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="content" style="width:650px;height:450px;">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
					<script>
						var editor;
						KindEditor.ready(function(K) {
							editor = K.create('#editor1');
						});
					</script>
					</td>
				</tr>
				<tr>
				    <td>
					    <input type="button" value="附件删除" onclick="showContent()">
						<div id="attachment_manage" title="附件删除"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">上传活动图片（选中单选按钮将被设置为封面）：</td>
				</tr>
				<tr>
					<td colspan="2" border="1">
						<p id="errorRemind"></p>
						<input id="unloadPic" type="button" value="上传图片" />
						<span id="uploadedName"></span>

						<script type="text/javascript" src="../js/ajaxupload.js"></script>
						<script type="text/javascript">
							var fileNames = new Array();
							window.onload = function(){
								
								var oBtn = document.getElementById("unloadPic");
								var oShow = document.getElementById("uploadedName");
								var oRemind = document.getElementById("errorRemind");	
								new AjaxUpload(oBtn,{
									action:"file_upload_academic.php",
									name:"upload",
									onSubmit:function(file,ext){
										//alert(file);
										if(ext && /^(jpg|jpeg|png|gif)$/.test(ext)){
											//ext是后缀名
											oBtn.value = "正在上传…";
											oBtn.disabled = "disabled";
										}else{	
											oRemind.style.color = "#ff3300";
											oRemind.innerHTML = "不支持非图片格式！";
											return false;
										}
									},
									onComplete:function(file,response){
										//alert(file);
										fileNames.push(file);
										 //document.writeln(fileNames.toString()); 
										oBtn.disabled = "";
										oBtn.value = "再上传一张图片";
										oRemind.innerHTML = "";
										var newChild =  document.createElement("em");
										newChild.innerHTML = file+"<input type='radio' value= '" + file + "' id='cover' name='cover'/>";
										oShow.appendChild(newChild);
										//oShow.appendChild(file+"<input type='radio' value= '" + file + "' id='cover' name='cover'/>");
									}
								});
							};
						</script>
					</td>
				</tr>
				<tr><td ></td>
					<td><input type="button" onclick="addac()" value="添加学术活动"/></td>			
				</tr>
			</table>
				
			
			</div>
	</div>
	<hr size="1" style="border:1px #000000 dotted;">
	<?php include('footer.php');?>
</div>
<?php 
	}
?>

<script type="text/javascript" charset="utf-8" src="../js/attachment.js"></script>
<script type="text/javascript">
function check(){
	if(document.getElementById('aname').value=="")
	{
		alert("活动名空！");
		return false;
	}
	if(document.getElementById('atype').value=="")
	{
		alert("活动类型空！");
		return false;
	}
	if(document.getElementById('date').value=="")
	{
		alert("活动时间空！");
		return false;
	}
	return true;
}

function addac()
{
	if(check())
	{
		//result = $.ajax({url:"project_list.php",async:false,data:});
		var acnameV = document.getElementById('aname').value;
		var atypeV = document.getElementById('atype').value;
		var dateV = document.getElementById('date').value;
		 //alert($("#editor1").val());
		//var contentV = $("#editor1").val();
		//var contentV = CKEDITOR.instances.editor1.getData();
		editor.sync();
		var contentV = document.getElementById('editor1').value;
		if($("#cover").length>0)
		{
			var cover = $('input:radio[name="cover"]:checked').val(); 
		}
		else
		{
			var cover = null; 
		}
		
        var data1 = new data;
		data1['fileNames'] = new Array();
		data1['fileNames'] = fileNames;
		data1["acname"] = acnameV;
		data1["type"] = atypeV;
		data1["date"] = dateV;
		data1["content"] = contentV;
		data1["cover"] = cover;
		
		$.ajax({
		    type: 'POST',
			url: "../model/add_academic.php",
			data: data1,
			success: function(res) {
						alert(res);
						 location.reload();
					}
		});
	}
}
function data() {
	var fileNames;
    var acname;
	var type;
	var date;
	var content;
	var cover;
}


</script>

</body>
</html>