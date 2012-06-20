<?php
	include("connect.php");
	//check login
	if($_REQUEST['task']=='login'){
		$userName = $_REQUEST['txtUName'];
		$password = $_REQUEST['txtPass'];
		//check login
		$checkLogin = mysql_query("select * from user where email = '$userName' and password = '$password' and approve ='Y'");
		if(mysql_num_rows($checkLogin)==1){
			$getUserData = mysql_fetch_array($checkLogin);
			$_SESSION['uid'] = $getUserData['id'];
			echo "success";
		}else{
			echo "fail";
		}
	}
	//edit profile 
	if($_REQUEST['task']=='editProfile'){
		$userName = $_REQUEST['txtUName'];
		$email = $_REQUEST['txtEmail'];
		$mobile = $_REQUEST['txtMobile'];
		$phone = $_REQUEST['txtPhone'];
		$bio = $_REQUEST['txaBio'];
		$note = $_REQUEST['txaNote'];
		//update user profile
		$updateProfile = mysql_query("update user SET full_name = '$userName', email = '$email', mobile = '$mobile', phone = '$phone', bio = '$bio', notes='$note' where id = $_SESSION[uid]");
		echo "success";
	}
	//edit contact 
	if($_REQUEST['task']=='editContact'){
		$userName = $_REQUEST['txtUName'];
		$email = $_REQUEST['txtEmail'];
		$mobile = $_REQUEST['txtMobile'];
		$note = $_REQUEST['txaNote'];
		$id = $_REQUEST['id'];
		$remindDate = $_REQUEST['date1'];
		//update user profile
		$updateProfile = mysql_query("update email_report SET full_name = '$userName', email = '$email', mobile = '$mobile', notes='$note', remindDate='$remindDate' where id = $id");
		echo "success";
	}
	
	
?>