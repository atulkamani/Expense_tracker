<?php
function maincatcombo_other($tablename,$qry_str,$ddname,$value,$field_name,$default_val)
{
	$sel="select * from ".$tablename." ".$qry_str."";
	$run=mysql_query($sel);
	$tot=mysql_affected_rows();
	if($default_val == "" || $default_val == NULL){ $default_val="--Select--"; } else { $default_val=$default_val; }
	$combo="<select name='".$ddname."' id='".$ddname."'><option value=''>".$default_val."</option>";
	while($get=mysql_fetch_object($run))
	{
		$combo.="<option value='".$get->id."'";
		if($value==$get->id){ $combo.="selected='selected'"; }
		$combo.=">".$get->$field_name."</option>";
	}
	//$combo.="<option value='0'>Other</option>";
	echo	$combo.="</select>";
}
function maincatcombo_other_country($tablename,$qry_str,$ddname,$value,$field_name,$default_val)
{
	$sel="select * from ".$tablename." ".$qry_str."";
	$run=mysql_query($sel);
	$tot=mysql_affected_rows();
	if($default_val == "" || $default_val == NULL){ $default_val="--Select--"; } else { $default_val=$default_val; }
	$combo="<select name='".$ddname."' id='".$ddname."' onchange=\"return view_state('',this.value,'disp_state','".basename($_SERVER['PHP_SELF'])."');\"><option value=''>".$default_val."</option>";
	while($get=mysql_fetch_object($run))
	{
		$combo.="<option value='".$get->id."'";
		if($value==$get->id){ $combo.="selected='selected'"; }
		$combo.=">".$get->$field_name."</option>";
	}
	//$combo.="<option value='0'>Other</option>";
	echo	$combo.="</select>";
}
function maincatcombo_other_state($tablename,$qry_str,$ddname,$value,$field_name,$default_val)
{
	$sel="select * from ".$tablename." ".$qry_str."";
	$run=mysql_query($sel);
	$tot=mysql_affected_rows();
	if($default_val == "" || $default_val == NULL){ $default_val="--Select--"; } else { $default_val=$default_val; }
	$combo="<select name='".$ddname."' id='".$ddname."'><option value=''>".$default_val."</option>";
	while($get=mysql_fetch_object($run))
	{
		$combo.="<option value='".$get->Name."'";
		if($value==$get->Name){ $combo.="selected='selected'"; }
		$combo.=">".$get->$field_name."</option>";
	}
	//$combo.="<option value='0'>Other</option>";
	echo	$combo.="</select>";
}
function GetFullName($UserID)
{
	$sql ="SELECT CONCAT( FName, ' ', LName ) AS FullName FROM user_register WHERE id = '".$UserID."'";
	$valrs=mysql_query($sql);
	if(mysql_num_rows($valrs)>0)
	{
		$rs=mysql_fetch_array($valrs);
		$getValue=$rs[0];
	}	
	else
	{
		$getValue=0;
	}
	return $getValue;
}
function Is_Dup_Add($table,$field,$value)
{
	$q = "select ".$field." from ".$table." where ".$field." = '".$value."'";
	//exit;
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
		return true;
	else
		return false;
}
function Is_Dup_Edit($table,$field,$value,$id)
{
	$q = "select ".$field." from ".$table." where ".$field." = '".$value."' and id != ".$id; 
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
		return true;
	else
		return false;
}
function CheckAppliedJob($UserID,$JobID)
{
	$q = "select user_id,job_id from interest where `user_id` = '".$UserID."' and job_id = '".$JobID."'"; 
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
		return true;
	else
		return false;
}
//check session id in every page
function checkLogin(){
	if((!isset($_SESSION['uid']) || $_SESSION['uid']=="" || $_SESSION['uid']==NULL)){
		header("location:index.php");
	}	
}
//convert date (MySql To US - (YYY-mm-dd To mm-dd-YYY))
function convertUSDate($date){
	$dateArray = explode('-',$date);
	return $dateArray[1].'-'.$dateArray[2].'-'.$dateArray[0];
	
}

?>