<?php include("connect.php");
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'ipn'){
	$password = rand();
	$uid = base64_decode($_REQUEST['uid']);
	mysql_query("update user set password = '$password', approve='Y' where id=".$uid) or die(mysql_error());
	$selRs = mysql_query("select * from user where approve='Y' and id=".$uid) or die(mysql_error());
	if(mysql_num_rows($selRs) > 0)
	{
		$selRow = mysql_fetch_array($selRs);
		$to = $selRow['email'];
		$subject = "The Expense Tracker";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= "From: $ADMIN_MAIL" . "\r\n";
		$message = '		
		<html>
		<head>
		<title>Success Payment Message</title>
		</head>
		<body>
		<h2 style="color:#0C0;">Congratulations for your success payment</h2>
		<p>You may now begin using the Tax Savings Estimator using below information.</p>
        <p>User name : $selRow[email]<bR />
		Password  : $selRow[password]</p>
		<p>Get Started to click on below link</p>
		<p>Website Link : <a target="_blank" href="'.$SITEURL.'" style="color: rgb(55, 117, 189);">'.$SITEURL.'</a></p>
		<p>&nbsp;</p>
		<p>The Expense Tracker Team,<br /><a target="_blank" href="'.$SITEURL.'" style="color: rgb(55, 117, 189);">'.$SITEURL.'</a></p>
		</body>
		</html>
		';
		mail($to,$subject,$message,$headers);
	}
}
?>
