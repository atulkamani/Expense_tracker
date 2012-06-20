<?php include("connect.php"); 
if(isset($_REQUEST['email']) && isset($_REQUEST['email']) != '')
{
	$accountRs = mysql_query("select id from user where email='".trim($_REQUEST['email'])."'") or die(mysql_error());
	if(mysql_num_rows($accountRs) > 0)
	{
		echo "false";
	}
	else
	{
		echo "true";
	}
}
?>