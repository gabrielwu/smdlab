<?php 
	//��
	header("Content-Type:text/html;charset=gb2312");
	$login_mark=$_GET[login_mark];
	if($login_mark=='account')
	{//�޸��˺�
?>
	<table align="center" height="200px">
	<tr><td width="600px"><font size="3"><b>���˺�:</b></font>(<font color="red">*</font>10λ�������ֺ���ĸ���)<p></td></tr>
	<tr><td><input type="text" id="account"></input></td></tr>
	<tr><td><input type="button" class="modify_account" onclick="check" value="����޸��˺�"></input></td></tr>
	<tr><td id="state"  width="600px"></td></tr>
	</table>
<?php	
	}
	else
	{//�޸�����
?>	
	<table align="center" height="300px">
	<tr><td width="600px"><font size="3"><b>������:</b></font>(<font color="red">*</font>10λ�������ֺ���ĸ���)<p></td></tr>
	<tr><td><input type="password" id="password1"></input></td></tr>
	<tr><td width="600px"><font size="3"><b>�ظ�:</b></font><p></td></tr>
	<tr><td><input type="password" id="password2"></input></td></tr>
	<tr><td><input type="button"class="modify_password"  onclick="check" value="����޸�����"></input></td></tr>
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
			info="�˺�Ϊ�գ�";
		}
		if(re.test(document.getElementById('account').value)==false){
			info=info+"Ϊ��ֹע�룬�˺�ֻ��������ĸ�����֣�";
		}
		if(document.getElementById('account').value.length>10)
		{
			 info=info+" �˺�λ�����ܴ���10";
		}
		 //alert(info);
		 if(info=="")
		 {
			//����ʽû�����⣬�ύ��������,ajax�޸����ݿ�
			result = $.ajax({url:"../controller/modify_login_controller.php",async:false,data:"&modify_login_mark="+"account"+"&account="+document.getElementById('account').value}); 
			info=result.responseText;
		 }
		 
		 
		 $("#state").html("State��"+info);
		});
		
		$(".modify_password").click(function(){
		 var info="";
		 var   re=/^[A-Za-z0-9]*$/;
		if(document.getElementById('password1').value=="")
		{
			info="��һ������Ϊ�գ�";
		}
		if(re.test(document.getElementById('password1').value)==false){
			info=info+"Ϊ��ֹע�룬��һ������ֻ��������ĸ�����֣�";
		}
		if(document.getElementById('password1').value.length>10)
		{
			 info=info+" ��һ������λ�����ܴ���10";
		}
		if(document.getElementById('password2').value=="")
		{
			info=info+" �ڶ�������Ϊ�գ�";
		}
		if(re.test(document.getElementById('password2').value)==false){
			info=info+"Ϊ��ֹע�룬�ڶ�������ֻ��������ĸ�����֣�";
		}
		if(document.getElementById('password2').value.length>10)
		{
			 info=info+" �ڶ�������λ�����ܴ���10";
		}
		if(document.getElementById('password1').value!=document.getElementById('password2').value)
		{
			info=info+" �����������벻һ�£�";
		}
		
		
		 //alert(info);
		 if(info=="")
		 {
			//����ʽû�����⣬�ύ��������,ajax�޸����ݿ�
			result = $.ajax({url:"../controller/modify_login_controller.php",async:false,data:"&modify_login_mark="+"password"+"&password="+document.getElementById('password1').value}); 
			info=result.responseText;
		 }
		 
		 
		 $("#state").html("State��"+info);
		});
	});
</script>



