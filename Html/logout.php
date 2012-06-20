<?php
	include("connect.php");
	$res = session_destroy();
	if($res == 1){
		header("location:index.php");
	}
	
	
?>