<?php
	include("connect.php");
	if(isset($_REQUEST['save']) && $_REQUEST['save'] != ''){
		$email = trim($_REQUEST['email']);
		$pass = trim($_REQUEST['pass']);
		$mobile = trim($_REQUEST['mobile']);
		mysql_query("insert into user (email,mobile,approve,date) values('".$email."',".$mobile.",'N','".date('Y-m-d')."')") or die(mysql_error());
		$id = mysql_insert_id();
	}
?>
<!doctype html>
<!-- Conditional comment for mobile ie7 http://blogs.msdn.com/b/iemobile/ -->
<!-- Appcache Facts http://appcachefacts.info/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" manifest="default.appcache?v=1"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" manifest="default.appcache?v=1"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <title>Create Account</title>
  <meta name="description" content="">
  <meta name="author" content="">
  
  <!-- Mobile viewport optimization http://goo.gl/b9SaQ -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Home screen icon  Mathias Bynens http://goo.gl/6nVq0 -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/m/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="img/l/apple-touch-icon.png">
  
  <!--iOS web app, deletable if not needed -->
  <!--<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="apple-touch-startup-image" href="img/l/splash.png">-->
  
  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">
	
	<!-- more tags for your 'head' to consider https://gist.github.com/849231 -->
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css?v=1">
  <link rel="stylesheet" href="css/extra.css?v=1">
 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/libs/modernizr-custom.js"></script>
  <script type="text/javascript" src="js/function1.js"></script>
</head>

<body>
<?php if($id):?>
<form action='select-payment-checkout.php' method='post' id='frmemail' name="frmemail">
  <input type='hidden' name="id" value="<?=$id?>" /> 
  <input type='hidden' name="Amount" id="Amount" value="0.01" />  
</form>
<script type="text/javascript">setTimeout(document.frmemail.submit(),1000);</script>
<?php endif;?>
  <div id="container">
  
    <header>
        <?php include("header.php");?>
        <div class="title_w">
          <h1>TAX SAVINGS ESTIMATOR</h1>
        </div>
    </header>
    
    <div id="main" role="main">
        <p class="uni_line ss6 t_green"><strong>Dinamic tools to assist you in building your business and personal finance to the next level</strong></p>
        <center><img src="img/photo1.jpg" /></center>
        <p class="uni_line ss13">The Expense Tracker is a dynamic platform that advocates and educates people on why and how to start their own home based business. <a href="#" class="t_green"><strong>Sign Up now</strong></a> for just $5 a month.</p>
        <p class="uni_line ss8 t_green"><strong>Member Benefits:</strong></p>
        <ul class="uni_line cre_acct_list">
          <li>Show your friends, family, & co-workers how to give themselves a raise today.</li>
          <li>Demonstrate how much they are losing by not having a home business.</li>
          <li>Ignite their curiosity, solve a problem, & win their trust in less than 5 minutes.</li>
        </ul>
        <div class="green_w not_member">
          <div class="green_c">
            <p class="sf1">Step 1 : Create Account</p>
          </div>
        </div>
        <div class="login_w">
	     <form class="login_f" action="" method="post" name="frmaccount" id="frmaccount">
    	     <input class="corner_all" type="text" name="txtFullName" id="txtFullName" value="Full Name" onFocus="if (this.value == 'Full Name') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Full Name';}"/>
            <span id="nameError"></span>

            <input class="corner_all" type="text" name="email" id="email" value="Email Address" onFocus="if (this.value == 'Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Email Address';}" />
            <span id="emailError"></span>
            <input class="corner_all" type="text" name="mobile" id="mobile" value="Mobile Phone Number" onFocus="if (this.value == 'Mobile Phone Number') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Mobile Phone Number';}" maxlength="10"/>
            <span id="phoneError"></span>
            <center><input type="submit" class="img_dc_orange" value="Next Step" name="save" id="save" onClick="return checkAccount();" style="border:none;" /></center>
          </form>
          <p class="sf1 ss1">Proceed to checkout</p>
        </div>
    </div>
    
    <footer>

    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>
  
  <!-- scripts concatenated and minified via ant build script -->
  <script src="js/mylibs/helper.js"></script>
  <!-- end concatenated and minified scripts-->
  
  <script>
    // iPhone Scale Bug Fix, read this when using http://www.blog.highub.com/mobile-2/a-fix-for-iphone-viewport-scale-bug/
    MBP.scaleFix();
    
    // Media Queries Polyfill https://github.com/shichuan/mobile-html5-boilerplate/wiki/Media-Queries-Polyfill
    yepnope({
      test : Modernizr.mq('(min-width)'),
      nope : ['js/libs/respond.min.js']
    });
  </script>
  
  <!-- Debugger - remove for production -->
  <!-- <script src="https://getfirebug.com/firebug-lite.js"></script> -->
  
  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

</body>
</html>
