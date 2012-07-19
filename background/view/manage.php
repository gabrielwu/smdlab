<?php
 session_start(); 
 //用
 ?>
<html>
<head>
	<title>管理员界面</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel="stylesheet" href="../css/jquery-ui-1.8.18.custom.css">
	<script src="../js/jquery-1.7.1.min.js"></script>
	<script src="../js/jquery-ui-1.8.18.custom.min.js"></script>
	<link rel="stylesheet" href="../css/demos.css">
	<script src="../js/leftbar.js"></script>
 	
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
			<div id="tab" style="background:#eeeeee;height:740px;text-align:left">
			</div>
	</div>
	<hr size="1" style="border:1px #000000 dotted;">
	<?php include('footer.php');?>
</div>
<?php 
	}
?>
</body>
</html>
