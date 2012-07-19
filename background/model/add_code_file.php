<?php
    $dir_path = $_POST["dir_selected"];
	if ($_FILES["code_file"]["error"] > 0) {
		echo "Return Code: " . $_FILES["code_file"]["error"] . "<br />";
	} else {
		echo "Upload: " . $_FILES["code_file"]["name"] . "<br />";
		echo "Type: " . $_FILES["code_file"]["type"] . "<br />";
		echo "Size: " . ($_FILES["code_file"]["size"] / 1024) . " Kb<br />";
		echo "Temp file: " . $_FILES["code_file"]["tmp_name"] . "<br />";
		$file_path = "$dir_path/" . $_FILES["code_file"]["name"];
		echo $file_path;
		if (file_exists($file_path)) {
		    echo $_FILES["code_file"]["name"] . " already exists. ";
			unlink($file_path);
		} 
		    move_uploaded_file($_FILES["code_file"]["tmp_name"],
		    "$dir_path/" . $_FILES["code_file"]["name"]);
		    echo "Stored in: " . "$dir_path/" . $_FILES["code_file"]["name"];
		
	}
?>