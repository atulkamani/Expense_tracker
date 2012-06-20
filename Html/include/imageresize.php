<?php
	//Common function to be utilised every where
	/* *************************************************** */
	//MOST USEFUL COMMON FUNCTIONS

	
		
		function saveThumb($filename,$width,$height){
			$dire 	=	dirname($filename);
			//print $dire;
			$fname 	= 	substr($filename,strlen($dire)+1);		
			//print $fname;
			$thumb	=	$dire."/thumb/".$fname;
			//print $thumb;
			
			//createthumb($filename,$thumb,$width,$height);
		}
		
		
		function createthumb($name,$filename,$new_w,$new_h){
			$system=explode(".",$name);
			$count = count($system);
			if($count>0){
				$ext = strtolower($system[$count-1]);
			}else{
				$ext = "";
			}
			$src_img = "";			
			
			if (preg_match("/jpg|jpeg/",$system[1])){
				$src_img=imagecreatefromjpeg($name);				
			}else if (preg_match("/png/",$system[1])){
				$src_img=imagecreatefrompng($name);				
			}else if (preg_match("/gif/",$system[1])){
				$src_img=imagecreatefromgif($name);				
			}else if (preg_match("/bmp/",$system[1])){
				$src_img=imagecreatefromwbmp($name);				
			}else if($ext=="jpg" || $ext=="jpeg"){
				$src_img=imagecreatefromjpeg($name);
			}else if($ext=="gif"){
				$src_img=imagecreatefromgif($name);
			}else if($ext=="png"){
				$src_img=imagecreatefrompng($name);
			}else if($ext=="bmp"){
				$src_img=imagecreatefromwbmp($name);
			}else{
				$src_img=imagecreatefromjpeg($name);
			}			
					
			$old_x=imageSX($src_img);
			$old_y=imageSY($src_img);
			/*if ($old_x > $old_y) {
				$thumb_w=$new_w;
				$thumb_h=$old_y*($new_h/$old_x);
			}
			if ($old_x < $old_y) {
				$thumb_w=$old_x*($new_w/$old_y);
				$thumb_h=$new_h;
			}
			if ($old_x == $old_y) {
				$thumb_w=$new_w;
				$thumb_h=$new_h;
			}*/
			
			if($old_x < $new_w && $old_y < $new_h)
			{
				$thumb_w=$old_x;
				$thumb_h=$old_y;	
			}
			else if($old_x<$new_w)
			{
				$thumb_w=$old_x;
				$thumb_h=$new_h;
			}
			else if($old_y < $new_h)
			{
				$thumb_w=$new_w;
				$thumb_h=$old_y;
			}
			else
			{
				$thumb_w=$new_w;
				$thumb_h=$new_h;
			}
			
			$dst_img=imagecreatetruecolor($thumb_w,$thumb_h);
			imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
			
			if (preg_match("/png/",$system[1])){
				imagepng($dst_img,$filename); 
			/*}else if (preg_match("/gif/",$system[1])){
				imagegif($dst_img,$filename);
			//}else if (preg_match("/bmp/",$system[1])){
			//	image2wbmp($dst_img,$filename);
			*/
			}else {
				imagejpeg($dst_img,$filename,100); 
			}
			imagedestroy($dst_img); 
			imagedestroy($src_img); 
		}
	
	
	
?>