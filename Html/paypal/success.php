<?php 
if($_REQUEST['ACK'] == "success")
{ 
header("Location : urlencode('https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout-mobile&useraction=commit&token=EC-2MN27600WR358725L')");
}
?>