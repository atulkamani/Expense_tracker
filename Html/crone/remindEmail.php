<?php include("../connect.php");
$emailQuery = "SELECT e.full_name 'clientname',e.email 'clientemail',e.mobile,u.full_name 'username',u.email 'useremail' FROM `email_report` e, user u WHERE e.`remindDate` = '".date('Y-m-d')."' and e.u_id = u.id";
$emailRs = mysql_query($emailQuery) or die(mysql_error());
if(mysql_num_rows($emailRs) > 0)
{
	while($emailRows = mysql_fetch_array($emailRs))
	{
		//sent mail
	$to = $emailRows['useremail'];
	$username= $emailRows['username'];
	
	$clientname = $emailRows['clientname'];
	$clienemail = $emailRows['clientemail'];
	$mobile =$emailRows['mobile'];
	// subject
	$subject = 'Gental Reminder';
	// message
	$message = "
		<body>
		  <p>Hi, $username</p>
		  <p>&nbsp;</p>
		  <p>we sent an E-Mail for give gental reminder on expired the followup date. </p>		  
		  <p>Client Full Name : $clientname</p>
		  <p>Client Email : $clienemail</p>
		  <p>Client Mobile : $mobile</p>
		</body>";
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		$headers .= "From: ".SiteName."<$ADMIN_MAIL>" . "\r\n";
		// Mail it
		mail($to, $subject, $message, $headers);
	}
}
?> 