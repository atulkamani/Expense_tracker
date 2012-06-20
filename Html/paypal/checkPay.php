<?php
if(isset($_REQUEST['USER']) && $_REQUEST['USER'] != '')
{
	$nvpstr = "&USER=".$_REQUEST['USER']."&PWD=".$_REQUEST['PWD']."&SIGNATURE=".$_REQUEST['SIGNATURE']."&VERSION=".$_REQUEST['VERSION']."&PAYMENTACTION=".$_REQUEST['PAYMENTACTION']."&METHOD=".$_REQUEST['METHOD']."&AMT=".$_REQUEST['AMT']."&DESC=".$_REQUEST['DESC']."&L_BILLINGTYPE0=".$_REQUEST['L_BILLINGTYPE0']."&L_BILLINGAGREEMENTDESCRIPTION0=".$_REQUEST['L_BILLINGAGREEMENTDESCRIPTION0']."&RETURNURL=".$_REQUEST['RETURNURL']."&CANCELURL=".$_REQUEST['CANCELURL'];
	// create a new cURL resource
	$ch = curl_init();
	
	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, "https://api-3t.sandbox.paypal.com/nvp?".$nvpstr);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	//turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpstr);
	// grab URL and pass it to the browser
	//echo "atul";
		//exit;
	$response = curl_exec($ch);
	$resArray = deformatNVP($response);
	$ack = strtoupper($resArray["ACK"]);
	//echo $resArray['ACK'];exit;	
	curl_close($ch);
	if($ack == 'SUCCESS')
	{		
		$tok = str_replace('%2d','-',$resArray['TOKEN']);
?>
	<script type="text/javascript">window.location.href = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout-mobile&useraction=commit&token=<?=$tok?>";</script>		
<?php	}
	// close cURL resource, and free up system resources
	
	
}
function deformatNVP($nvpRes)
{

	$intial=0;
 	$nvpArray = array();


	while(strlen($nvpRes)){
		//postion of Key
		$keypos= strpos($nvpRes,'=');
		//position of value
		$valuepos = strpos($nvpRes,'&') ? strpos($nvpRes,'&'): strlen($nvpRes);

		/*getting the Key and Value values and storing in a Associative Array*/
		$keyval=substr($nvpRes,$intial,$keypos);
		$valval=substr($nvpRes,$keypos+1,$valuepos-$keypos-1);
		//decoding the respose
		$nvpArray[urldecode($keyval)] =urldecode( $valval);
		$nvpRes=substr($nvpRes,$valuepos+1,strlen($nvpRes));
     }
	return $nvpArray;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form method="post" name="frmpaypal" action="">
<input type="hidden" name="USER" value="<?=urlencode('mehul_1309007532_biz_api1.webplanex.com')?>">
<input type="hidden" name="PWD" value="<?=urlencode('1309007572')?>">
<input type="hidden" name="SIGNATURE" value="<?=urlencode('A1s5.xTmZN.dPR4xnn8ptLUC6D8nALFpJwMN8YlXAD.wR0vVpfpHMfmb')?>">
<input type="hidden" name="VERSION" value="<?=urlencode('2.3')?>">
<input type="hidden" name="PAYMENTACTION" value="<?=urlencode('Sale')?>">
<input type="hidden" name="METHOD" value="<?=urlencode('SetExpressCheckout')?>">
<input type="hidden" name="L_BILLINGTYPE0" value="<?=urlencode('RecurringPayments')?>">	
<input type="hidden" name="L_BILLINGAGREEMENTDESCRIPTION0" value="<?=urlencode('The Expense Tracker')?>">
<input type="hidden" name="AMT" value="<?=urlencode('19.95')?>">
<input type="hidden" name="DESC" value="<?=urlencode('The Expense Tracker')?>">
<input type="hidden" name="RETURNURL" value="<?=urlencode('http://webplanex.com/expense/success.php')?>">
<input type="hidden" name="CANCELURL" value="<?=urlencode('http://webplanex.com/expense/cancel.php')?>">
</form>
<script type="text/javascript">
setTimeout(document.frmpaypal.submit(),1000);
</script>
</body>
</html>