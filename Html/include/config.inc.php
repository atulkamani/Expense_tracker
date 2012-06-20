<?php
define(Site_Title,"Welcome to The Expense Tracker");

define(SiteName,"ExpenseTracker.com");

$SITEURL="http://webplanex.com/expense/";
//$SITEURL="http://atul/expense_tracker/";


define(Root,$_SERVER['DOCUMENT_ROOT']);

define(Server,$_SERVER['HTTP_HOST']);

define(Admin_Folder,"siteadmin");

define(File_Path,$_SERVER['PHP_SELF']);

$allfolder=explode("/",File_Path);
for($i=0;$i<count($allfolder)-1;$i++)
{
	if($allfolder[$i]!=Admin_Folder)
		$folder.=$allfolder[$i]."/";
}

define(Folder,$folder);

define(File_Name,$allfolder[count($allfolder)-1]);

define(Root_Path,Root.Folder);

$download_path = Root.'/'; // local path

define(Admin_Root_Path,Root.Folder.Admin_Folder."/");

define(Server_Path,"http://".Server.Folder);

define(Image_Path,Server_Path."images");

define(Admin_Server_Path,Server_Path.Admin_Folder."/");

define('WEBSITEURL', Server_Path);

if(substr(Server,0,4)=="atul")
{
	$DBSERVER = "localhost";
	$DATABASENAME = "expense_tracker";
	$USERNAME = "root";
	$PASSWORD = "";
}
else
{
	$DBSERVER = "localhost";
	$DATABASENAME = "webplan1_glen";
	$USERNAME = "webplan1";
	$PASSWORD = "New&~PlaNex3";
}
$ADMIN_MAIL="noreply@expensetracker.com";
?>
