<?php
function GBsubstr($string, $start, $length) {
	if(strlen($string)>$length){
	    $str=null;
		$len=$start+$length;
		$count = $len / 3 * 2; // ������ĸ1����λ������2����λ
		for($i=$start, $c = 0;$i<$len && $c < $count;$i++){
		    if(ord(substr($string,$i,1))>0xa0){
    			$str.=substr($string,$i,3);
				$i = $i + 2;
				$c = $c + 2;
			}else{
			    $str.=substr($string,$i,1);
				$c = $c + 1;
			}
		}
		return $str.'...';
	}else{
    	return $string;
	}
}