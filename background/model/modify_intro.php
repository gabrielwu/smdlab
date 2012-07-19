<?php
$intro = $_POST['intro'];
$file_name="../attachments/html/introduction.html";
$file_pointer=fopen($file_name,"w");
fwrite($file_pointer, $intro);
fclose($file_pointer);
print"<script>alert('succeed!');</script>";
?>
<meta http-equiv="refresh" content="0;url=../view/modify_intro.php">