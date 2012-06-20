<?php
@session_start();
include_once("include/config.inc.php");
include_once("include/functions.php");
include_once("include/utility.php");
include_once("include/imageresize.php");
$db=mysql_connect($DBSERVER, $USERNAME, $PASSWORD) or die(mysql_error());
mysql_select_db($DATABASENAME,$db) or die(mysql_error());
?>