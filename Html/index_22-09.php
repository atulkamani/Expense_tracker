<?php include_once("connect.php"); 
//print_r($_SESSION);
if(isset($_SESSION['uid'])){
	echo "<script type='text/javascript'>window.location.href='welcome.php';</script>";
}
?>
<!doctype html>
<!-- Conditional comment for mobile ie7 http://blogs.msdn.com/b/iemobile/ -->
<!-- Appcache Facts http://appcachefacts.info/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" manifest="default.appcache?v=1"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!-->
<html class="no-js" manifest="default.appcache?v=1">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title><?php echo Site_Title?></title>
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

<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
<script type="text/javascript" src="js/libs/modernizr-custom.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
</head>

<body>
<div id="container">
  <header>
    <?php include("header.php");?>
    <div class="title_w">
      <h1>TAX SAVINGS ESTIMATOR</h1>
    </div>
  </header>
  <div id="main" role="main">
    <p class="title_top ss4">Introducing <span class="t_green"><strong>THE EXPENSE TRACKER'S</strong></span> Tax Savings Calculator</p>
    <div class="green_w">
      <div class="green_c ss3">
        <p class="gc_desc">A powerful tool to help you realize your full earning potential and make the most of every dollar earned.</p>
        <div class="logo_s"></div>
        <div class="clear_both"></div>
      </div>
      <a href="video-demo.php" class="learn_more"></a> </div>
    <div class="green_w member_login">
      <div class="green_c"> <a href="javascript:void(0);" class="sf1" style="">Member Login
        <div href="#" class="memlog_circ"></div>
        </a>
        <div class="clear_both"></div>
      </div>
    </div>
    <div class="login_w">
      <form class="login_f" name="frmLogin" id="frmLogin" method="post">
        <input class="corner_all" type="text" value="Your Username" onFocus="if (this.value == 'Your Username') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Username';}" name="txtUserName" id="txtUserName" />
        <input class="corner_all" type="password" name="txtPassword" id="txtPassword" />
        <div style="text-align:center; margin:10px 0;">
          <div class="login_error" id="errID" style="display:none;">Error: Username or Password</div>
        </div>
        <div class="login_ch">
          <input type="checkbox" />
          <span class="ss1">Remember Me</span></div>
          <img src="img/btn-login.png" class="login" onClick="checkLogin();">
        <!--<input type="image" class="login" src="img/btn-login.png" onClick="javascript :alert('hi');" />!-->
        <div class="clear_both"></div>
      </form>
      <p class="forgot_pass"><strong>Forgot your password?....</strong> <a href="forgot-password.php" class="t_green">Recover it here</a></p>
    </div>
    <div class="green_w not_member">
      <div class="green_c"> <a href="create-account.php" class="sf1">Not a Member?</a> </div>
    </div>
    <a href="video-demo.php" class="img_dc_orange">Watch Demo</a>
    <p class="sf1 ss1">Learn more about this powerfull tool</p>
    <p class="or"><strong>Or</strong></p>
    <a href="create-account.php" class="img_dc_orange">Create Account</a>
    <p class="sf1 ss1">Sign up for just $5 per month!</p>
  </div>
  <footer> </footer>
</div>
<!--! end of #container --> 

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
