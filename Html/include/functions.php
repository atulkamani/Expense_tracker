<?php
//Usefull Paging And other Class
//Created By Paras Pitroda
//Sakshi Infoway Pvt. Ltd.
//Email: parasitinfo@yahoo.com   or @ gmail,rediff,sify

class get_pageing{
var $record_per_page=10;
var	$pages=5;
var $tbl,$file_names,$order,$query;

///////// GET THE VALUE OF START VARIABLE////////////////CREATED BY PARAS PITRODA
	function start()
	{
		if($_GET["start"])
			return	$start=$_GET["start"];
		else
			return	$start=0;
	}
//////////////  END OF START FUNCTION///////////////////CREATED BY PARAS PITRODA	

//////////////  GET THE CURRENT FILE NAME ///////////////////CREATED BY PARAS PITRODA
	function file_names()
	{
		$pt=explode("/",$_SERVER['SCRIPT_FILENAME']);
		$totpt=count($pt);
		return $this->file_names=$pt[$totpt-1];
	}
//////////////  END OF FILE_NAME FUNCTION///////////////////CREATED BY PARAS PITRODA	

//////////////  DISPLAY THE NUMERIC PAGING WITHOUT RECORD DETAIL///////////////////CREATED BY PARAS PITRODA
	function number_pageing_nodetail($query,$record_per_page='',$pages='')
	{
			return $this->number_pageing($query,$record_per_page,$pages,"N");
	}
	
	function number_pageing_bottom_nodetail($query,$record_per_page='',$pages='')
	{
			return $this->number_pageing($query,$record_per_page,$pages,"N","Y");
	}
	
	function number_pageing_bottom($query,$record_per_page='',$pages='')
	{
			return $this->number_pageing($query,$record_per_page,$pages,"","Y");
	}

//////////////  END OF NUMERIC PAGING FUNCTION ///////////////////CREATED BY PARAS PITRODA	

	function runquery($query)
	{
		return	mysql_query($query);
	}
	
	function table($result,$titles,$fields,$passfield="",$edit,$delete,$parent="")
	{
			if($parent=="")
				$parent="Y";
			
			if($passfield=="")
				$passfield="id";

			$cont="<table width='100%' cellspacing='0' cellpadding='3' border='0' class='borders'><tr>";
			foreach($titles as $K=>$V)
			{
				$cont1.="<td";
				$cont1.=(is_numeric($V))?" width='$V%' align='center'><strong>$K</strong></td>":" align='center'><strong>$V</strong></td>";
			}
			$cont.=$cont1."</tr>";
			$cont.="<tr><td colspan='".count($titles)."'><script language=javascript>
					msg=\"<table border=0 cellpadding=3 cellspacing=1 class='bg1' width='100%'><TR>$cont1</TR></table>\";
					
					</script>
			<script src='topmsg.js'></script>			
			</td></tr>";
			$j=0;
			while($gets=mysql_fetch_object($result))
			{
				$j=1;
				$cont.="<tr onMouseOver=\"this.className='yellowdark3bdr'\" onmouseout=\"this.className=''\">";
				foreach($fields as $K=>$V)
				{
					$cont.="<td align='center'>";
					$tmps=explode(",",$V);
					$newval="";
					foreach($tmps as $val)
					{
						$newval.=$gets->$val." ";
					}
					$cont.=(is_numeric($K))?$newval:"<a href='$K?$passfield=".$gets->$passfield."' onMouseOver=\"smsg('View Detail of ".addslashes($newval)."');return document.prs_return\" onMouseOut=\"nosmsg('Done');return document.prs_return\">".$newval."</a>";
					$cont.="&nbsp;</td>";
				}
				$cont.="<td><INPUT name='button' type='button' onClick=\"";
				$cont.=($parent=="N")?"window":"parent.body";
				$cont.=".location.href='$edit?$passfield=".$gets->$passfield."'\" value='Edit' onMouseOver=\"smsg('Edit This Record -> $newval');return document.prs_return\" onMouseOut=\"nosmsg('Done');return document.prs_return\">&nbsp;&nbsp;<INPUT onClick=\"deleteconfirm('Are you sure you want to delete this Record?.','$delete?$passfield=".$gets->$passfield."');\" type='button' value='Delete' onMouseOver=\"smsg('Delete This Record -> $newval');return document.prs_return\" onMouseOut=\"nosmsg('Done');return document.prs_return\">&nbsp;</td>";
				$cont.="</tr>";
			}
			
			if($j==0)
			{
				$cont.="<tr><td colspan='".(count($fields)+1)."' align='center'><font color='red'><strong>No Record To Display</strong></font></td></tr>";
			}
			echo	$cont.="</table>";
	}
///////////// NUMERIC FUNCTION WITH RECORD DESTAIL//////////////////////////////////////
function number_pageing($query,$record_per_page='',$pages='',$detail='',$bottom='',$simple='')
{
		$this->file_names();
		$this->query=$query;
		
		if($record_per_page>0)
			$this->record_per_page=$record_per_page;
		
		if($pages>0)
			$this->pages=$pages;

		$result=$this->runquery($this->query);
		$totalrows= mysql_affected_rows();										
		
		$start=$this->start();

		//if($start>($totalrows-$record_per_page))	
		//	$start=$totalrows-$record_per_page;
		//if($start<0)
		//	$start=0;
			
		$order=$_GET['order'];
		$this->query.=" limit $start,".$this->record_per_page;  
		
		$result=$this->runquery($this->query);
		$total= mysql_affected_rows();
		
		$total_pages=ceil($totalrows/$this->record_per_page);
		$current_page=($start+$this->record_per_page)/$this->record_per_page;
		$loop_counter=ceil($current_page/$this->pages);
		
		//Remove this comment so it will display the page number as per ur defined gape like 1,2,3,4,5 then 6,7,8,9,10 likewise..
		//$start_loop=($loop_counter*$this->pages-$this->pages)+1;
		//$end_loop=($this->pages*$loop_counter)+1;



		$start_loop=($loop_counter*$this->pages-$this->pages)-2;
		if($start_loop<=0)
			$start_loop=1;
		$end_loop=($this->pages*$loop_counter)+4;
		
		
		if($end_loop>$total_pages)
			$end_loop=$total_pages+1;

		$tmpva="";
		foreach($_GET as $V=>$K)
		{
			if($V!="start" and $V!="msg")
				$tmpva.="&".$V."=".$K;
		}
		
		$this->tbl="<span class='page-navigation link04 lite'>";
		
		
		if($start>0)
		{
			//$this->tbl.="<a href='".$this->file_names."?start=".($start-$this->record_per_page).$tmpva."' class='black'>&laquo;<b>Previous</b></a>&nbsp;&nbsp;"; 
			$this->tbl.="<a href='".$this->file_names."?start=".($start-$this->record_per_page).$tmpva."' class='next bold'>Previous</a>&nbsp;&nbsp;";
		} 

		//$this->tbl.="</strong>&nbsp;</td><td width='70%' align='center' class='orange-link'>&nbsp;";
		if($detail!="N" and $simple !="N")
			$this->tbl.="<strong><font size='-1'>Result ".($start+1)." - ".($start+$total)." of ".$totalrows." Records</font></strong><BR>";
		if($simple!='N')
		{
			for($i=$start_loop;$i<$end_loop;$i++) 
			{
				if($current_page==$i)
				{
					$this->tbl.="<strong class='med'  style='color:#202020;'>".$i."</strong>";
					if(($end_loop-1)==$i){ $this->tbl.=""; } else { $this->tbl.="|"; }
				}
				else
				{ 
					$this->tbl.="<a href='".$this->file_names."?start=".($i-1)*$this->record_per_page.$tmpva."'>".$i."</a>";
					if(($end_loop-1)==$i){ $this->tbl.=""; } else { $this->tbl.="|"; }
				}
			}
		}
		
		//$this->tbl.="&nbsp;</td><td width='15%' align='right'><strong>";
		if($start+$this->record_per_page<$totalrows) 
		{ 
			$this->tbl.="<a href='".$this->file_names."?start=".($start+$this->record_per_page).$tmpva."&t=".$_GET['t']."' class='next bold'>Next</a>"; 
		} 
		//$this->tbl.="&nbsp;&nbsp;</strong>&nbsp;</td></tr></table>";
		
		if($bottom=="Y")
		{
			if($totalrows>0)
				return $result=array($result,$this->tbl);
			else
				return $result=array($result,"");
		}
		else
		{
			if($totalrows>0)
			{
				echo $this->tbl;		
				return $result;
			}
			else
			{
				
				return $result;
			}
		}
	}
///////////// NUMERIC FUNCTION WITH RECORD DESTAIL (#####ADMIN####)//////////////////////////////////////
function number_pageing_admin($query,$record_per_page='',$pages='',$detail='',$bottom='',$simple='')
{
		$this->file_names();
		$this->query=$query;
		
		if($record_per_page>0)
			$this->record_per_page=$record_per_page;
		
		if($pages>0)
			$this->pages=$pages;

		$result=$this->runquery($this->query);
		$totalrows= mysql_affected_rows();										
		
		$start=$this->start();

		//if($start>($totalrows-$record_per_page))	
		//	$start=$totalrows-$record_per_page;
		//if($start<0)
		//	$start=0;
			
		$order=$_GET['order'];
		$this->query.=" limit $start,".$this->record_per_page;  
		
		$result=$this->runquery($this->query);
		$total= mysql_affected_rows();
		
		$total_pages=ceil($totalrows/$this->record_per_page);
		$current_page=($start+$this->record_per_page)/$this->record_per_page;
		$loop_counter=ceil($current_page/$this->pages);
		
		//Remove this comment so it will display the page number as per ur defined gape like 1,2,3,4,5 then 6,7,8,9,10 likewise..
		//$start_loop=($loop_counter*$this->pages-$this->pages)+1;
		//$end_loop=($this->pages*$loop_counter)+1;



		$start_loop=($loop_counter*$this->pages-$this->pages)-2;
		if($start_loop<=0)
			$start_loop=1;
		$end_loop=($this->pages*$loop_counter)+4;
		
		
		
		
		
		if($end_loop>$total_pages)
			$end_loop=$total_pages+1;

		$tmpva="";
		foreach($_GET as $V=>$K)
		{
			if($V!="start" and $V!="msg")
				$tmpva.="&".$V."=".$K;
		}
		
		$this->tbl="<table width='100%' height='100%' border='0' cellpadding='0' cellspacing='0' class='alert_table'><tr><td width='15%' align='left'><strong>&nbsp;&nbsp;";
		
		
		if($start>0)
		{ 
			$this->tbl.="<a href='".$this->file_names."?start=".($start-$this->record_per_page).$tmpva."' class='black' onMouseOver=\"smsg('Previous Page');return document.prs_return\" onMouseOut=\"nosmsg('Done');return document.prs_return\">&lt;&lt;<b>Previous</b></a>&nbsp;&nbsp;"; 
		} 

		$this->tbl.="</strong>&nbsp;</td><td width='70%' align='center' class='orange-link'>&nbsp;";
		if($detail!="N" and $simple !="N")
$this->tbl.="<strong><font size='-1'>Result ".($start+1)." - ".($start+$total)." of ".$totalrows." Records</font></strong><BR>";
		if($simple!='N')
		{
			for($i=$start_loop;$i<$end_loop;$i++) 
			{
				if($current_page==$i)	
				{
					$this->tbl.="<strong>[".$i."]</strong>&nbsp;&nbsp;";	
				}	
				else 
				{ 
					$this->tbl.="<strong><a href='".$this->file_names."?start=".($i-1)*$this->record_per_page.$tmpva."' class='black' onMouseOver=\"smsg('View Page Number $i');return document.prs_return\" onMouseOut=\"nosmsg('Done');return document.prs_return\"><b>".$i."</b></a></strong>&nbsp;&nbsp;"; 
				}
			}
		}
		
		$this->tbl.="&nbsp;</td><td width='15%' align='right'><strong>";
		if($start+$this->record_per_page<$totalrows) 
		{ 
			$this->tbl.="<a href='".$this->file_names."?start=".($start+$this->record_per_page).$tmpva."&t=".$_GET['t']."' class='black' onMouseOver=\"smsg('Next Page');return document.prs_return\" onMouseOut=\"nosmsg('Done');return document.prs_return\"><b>Next</b>&gt;&gt;</a>"; 
		} 
		$this->tbl.="&nbsp;&nbsp;</strong>&nbsp;</td></tr></table>";
		
		if($bottom=="Y")
		{
			if($totalrows>0)
				return $result=array($result,$this->tbl);
			else
				return $result=array($result,"");
		}
		else
		{
			if($totalrows>0)
			{
				echo $this->tbl;		
				return $result;
			}
			else
			{
				
				return $result;
			}
		}
	}	

//////////////  SIMPLE NEXT-PRI PAGING ///////////////////CREATED BY PARAS PITRODA	
	function pageing($query,$record_per_page="",$pages="")
	{
			return $this->number_pageing($query,$record_per_page,$pages,'','','N');
	}
//////////////  END OF SIMPLE PAGING FUNCTION///////////////////CREATED BY PARAS PITRODA	

//////////////  WRITE ALL,A TO Z CHARACTER WITH CURRENT PAGE LINK ///////////////////CREATED BY PARAS PITRODA
	function order($evid='')
	{
		$this->file_names();
		$this->order.="<TR><TD><a class='tahoma12-n' href='$file_names?&evid=".$evid."'>All</a></TD><TD class=lg>|</TD>";
		for($i=65;$i<91;$i++)
		{		
			$this->order.="<TD><a class='tahoma12-n' href='$file_names?order=".chr($i)."&evid=".$evid."'>".chr($i)."</a></TD><TD class=lg>|</TD>";
		}
		return $this->order.="</TR>";
	}
	
	function MakeCombo($query,$value="",$fill_value,$comboname,$selected="")
	{
		if($value=="")
			$value=$fill_value;
		$run=$this->runquery($query);
		$totlist=mysql_affected_rows();
		$Combo="<select name='$comboname'>";
		$Combo.="<option value=''>-----Select-----</option>";
		for($i=0;$i<$totlist;$i++)
		{
			$get=mysql_fetch_object($run);
			$Combo.="<option value='".$get->$value."'";
			if($selected==$get->$value)
			{
				$Combo.="selected='selected'";
			}
			$Combo.=">".$get->$fill_value."</option>";
		}
		$Combo.="</select>";
		echo $Combo;
	}
}

$prs_pageing= new get_pageing;

// get extention of image
function getEXT($str)
{
	$t="";
	$string =$str;
	$tok = strtok($string,".");
 	while($tok) {
 		$t=$tok;
 		$tok = strtok(".");
 	}
 	 return $t;
}
// limit character
function TextPreview($strText,$nChars)
	{
		$npos;
		$str2="";
		if(strlen($strText) > $nChars)
		{
			$str1=substr($strText,0,$nChars);
			$npos=strrpos($str1," ");
			if($npos > 0)
				$str2=substr($str1,0,$npos). " ...";
			else
				$str2=substr($strText,0,$nChars)." ...";
		}
		else
			$str2=substr($strText,0,strlen($strText));
		return $str2;
	} 
	function mdy_to_ymd($str1)
	{
		$str=explode("-",$str1);
		return $str=$str[2]."-".$str[0]."-".$str[1]; 
	}
	function ymd_to_mdy($str1)
	{
		$str=explode("-",$str1);
		return $str=$str[1]."-".$str[2]."-".$str[0]; 
	}
	function ecd($str)
	{
		return addslashes(htmlentities($str, ENT_QUOTES)); 
	}
	
	function dcd($str)
	{
		return stripcslashes(stripslashes($str)); 
	}
	function getValue($tablename,$wherefld,$cmpval,$retfld)
	{
	$sql ="select ". $retfld . " From " . $tablename . " Where " . $wherefld ." = '" . $cmpval ."'";
	$valrs=mysql_query($sql);
	$rs=mysql_fetch_array($valrs);
		if(mysql_num_rows($valrs)>0)
		{
			$getValue=$rs[0];
		}	
		else
		{
			$getValue=0;
		}
		return $getValue;
	}

function generateHash()
{
	$pre_hash=time().rand().$GLOBALS['REMOTE_ADDR'].microtime();

	$session_hash = md5($pre_hash);
       	$hash = substr(md5($session_hash.time()),0,16);

	return $hash;
}
?>