﻿<ul><?php    $root_dir = $_POST["dir_path"];	$root_dir .= "/";	if (is_dir($root_dir)) {     	if ($dh = opendir($root_dir)) {     		while (($dir = readdir($dh)) !== false) { 			    if ($dir!="." && $dir!=".." && !is_file($root_dir.$dir)) { 					$dir_id = sha1($root_dir.$dir);				?>					<li id="<?php echo $dir_id;?>" title="show">					    <a class="dir1" id="<?php echo $dir_id."_a";?>" onclick="show_hide_dir('<?php echo $root_dir.$dir."','".$dir_id;?>')"><?php echo $dir;?></a>					</li>				<?php				} 			} 			closedir($dh); 		} 		if ($dh = opendir($root_dir)) { 			while (($dir = readdir($dh)) !== false) { 				if ($dir!="." && $dir!=".." && is_file($root_dir.$dir)) { 					$file_id = sha1($root_dir.$dir);				?>					<li id="<?php echo $file_id;?>" title="show">						<a id="<?php echo $file_id."_a";?>" ><?php echo $dir;?></a>					</li>				<?php				} 		    } 			closedir($dh); 		} 	} ?></ul>