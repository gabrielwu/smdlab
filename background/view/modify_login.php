<?php 
	//用
	header("Content-Type:text/html;charset=gb2312");
	$login_mark=$_GET[login_mark];
	if($login_mark=='account')
	{//修改账号
?>
	<table align="center" height="200px">
	<tr><td width="600px"><font size="3"><b>新账号:</b></font>(<font color="red">*</font>10位以内数字和字母组合)<p></td></tr>
	<tr><td><input type="text" id="account"></input></td></tr>
	<tr><td><input type="button" class="modify_account" onclick="check" value="点击修改账号"></input></td></tr>
	<tr><td id="state"  width="600px"></td></tr>
	</table>
<?php	
	}
	else
	{//修改密码
?>	
	<table align="center" height="300px">
	<tr><td width="600px"><font size="3"><b>新密码:</b></font>(<font color="red">*</font>10位以内数字和字母组合)<p></td></tr>
	<tr><td><input type="password" id="password1"></input></td></tr>
	<tr><td width="600px"><font size="3"><b>重复:</b></font><p></td></tr>
	<tr><td><input type="password" id="password2"></input></td></tr>
	<tr><td><input type="button"class="modify_password"  onclick="check" value="点击修改密码"></input></td></tr>
	<tr><td id="state"  width="600px"></td></tr>
	</table>
	
	
<?php	
	}
?>
<script src="../js/jquery-1.7.1.min.js"></script>
<script src="../js/jquery-ui-1.8.18.custom.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
		$(".modify_account").click(function(){
		//alert(document.getElementById('account').value.length);
		//alert("123");
		//check();
		 var info="";
		 var   re=/^[A-Za-z0-9]*$/;
		if(document.getElementById('account').value=="")
		{
			info="账号为空！";
		}
		if(re.test(document.getElementById('account').value)==false){
			info=info+"为防止注入，账号只能输入字母和数字！";
		}
		if(document.getElementById('account').value.length>10)
		{
			 info=info+" 账号位数不能大于10";
		}
		 //alert(info);
		 if(info=="")
		 {
			//若格式没有问题，提交到控制器,ajax修改数据库
			result = $.ajax({url:"../controller/modify_login_controller.php",async:false,data:"&modify_login_mark="+"account"+"&account="+document.getElementById('account').value}); 
			info=result.responseText;
		 }
		 
		 
		 $("#state").html("State："+info);
		});
		
		$(".modify_password").click(function(){
		 var info="";
		 var   re=/^[A-Za-z0-9]*$/;
		if(document.getElementById('password1').value=="")
		{
			info="第一次密码为空！";
		}
		if(re.test(document.getElementById('password1').value)==false){
			info=info+"为防止注入，第一次密码只能输入字母和数字！";
		}
		if(document.getElementById('password1').value.length>10)
		{
			 info=info+" 第一次密码位数不能大于10";
		}
		if(document.getElementById('password2').value=="")
		{
			info=info+" 第二次密码为空！";
		}
		if(re.test(document.getElementById('password2').value)==false){
			info=info+"为防止注入，第二次密码只能输入字母和数字！";
		}
		if(document.getElementById('password2').value.length>10)
		{
			 info=info+" 第二次密码位数不能大于10";
		}
		if(document.getElementById('password1').value!=document.getElementById('password2').value)
		{
			info=info+" 两次密码输入不一致！";
		}
		
		
		 //alert(info);
		 if(info=="")
		 {
			//若格式没有问题，提交到控制器,ajax修改数据库
			result = $.ajax({url:"../controller/modify_login_controller.php",async:false,data:"&modify_login_mark="+"password"+"&password="+document.getElementById('password1').value}); 
			info=result.responseText;
		 }
		 
		 
		 $("#state").html("State："+info);
		});
	});
</script>



