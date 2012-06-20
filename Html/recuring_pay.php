<?php 
	include("connect.php");
	//$url="https://www.sandbox.paypal.com/cgi-bin/webscr";
	$url="https://www.paypal.com/webscr";	
	//$PAYPAL_EMAIL="mehul@webplanex.com";
	$PAYPAL_EMAIL="jlynch@komandtek.com";
	$cur_value = "USD";
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recuring Payment</title>
<script type="text/javascript">
function redirect() 
{
	document.redirectform.submit();
}
</script>
</head>
<body onload="return redirect();">
<form name="redirectform" action="<?=$url?>" method="post">  
<!-- Identify your business so that you can collect the payments. -->  
<input type="hidden" name="business" value="<?=$PAYPAL_EMAIL?>">  
<!-- Specify a Subscribe button. -->  
<input type="hidden" name="cmd" value="_xclick-subscriptions">  
<!-- Identify the subscription. -->  
<input type="hidden" name="item_name" value="The Expense Tracker">  
<!--<input type="hidden" name="item_number" value="DIG Weekly">-->  
<!-- Set the initial payment. -->  
<input type="hidden" name="currency_code" value="<?=$cur_value?>">  
<!--<input type="hidden" name="a1" value="<?=urlencode($_POST['Amount'])?>">  
<input type="hidden" name="p1" value="1">  
<input type="hidden" name="t1" value="M">  -->
<!-- Set the terms of the recurring payments. -->  
<input type="hidden" name="a3" value="<?=urlencode($_POST['Amount'])?>">  
<input type="hidden" name="p3" value="1">  
<input type="hidden" name="t3" value="M">  
<!-- Limit the number of billing cycles. -->  
<input type="hidden" name="src" value="1">  
<!--<input type="hidden" name="srt" value="6">-->  
<input type="hidden" name="return" value="<?=$SITEURL?>create-account-finish.php">
<input type="hidden" name="cancel_return" value="<?=$SITEURL?>cancel-payment-checkout.php?uid=<?=base64_encode($_POST['id'])?>">
<input type="hidden" name="notify_url" value="<?=$SITEURL?>paymentNotify.php?action=ipn&uid=<?=base64_encode($_POST['id'])?>">
<!-- Display the payment button. -->  
<!--input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" alt="PayPal - The safer, easier way to pay online">  
<img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" -->  
</form> 
