<?php 
	$file_path = '../picture/life/';
	$file_up = $file_path.basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'],$file_up)){
		echo 'success';	
	}else{
		echo 'fail';	
	}
?>