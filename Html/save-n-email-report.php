<?php
	include("connect.php");
	checkLogin();
?>
<!doctype html>
<!-- Conditional comment for mobile ie7 http://blogs.msdn.com/b/iemobile/ -->
<!-- Appcache Facts http://appcachefacts.info/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" manifest="default.appcache?v=1"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" manifest="default.appcache?v=1"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <title><?php echo Site_Title ?></title>
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
 <link rel="stylesheet" href="css/jquery.datepick.css">
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/libs/modernizr-custom.js"></script>
  <script src="js/function.js" type="text/javascript"></script>  
</head>

<body>
  <div id="container">
  
    <?php include("header.php");?>
    
    <div id="main" role="main">
        <div class="green_w">
          <div class="green_c">
            <p class="sf1">Fill the details about this contact</p>
          </div>
        </div>
        
        <div class="login_w">
          <form class="login_f save_report_f ss6" action="send-report-email.php" method="post" onSubmit="return saveReport();">
            <input type="hidden" name="deductionText" id="deductionText" value="<?php echo $_POST['deductionText'];?>">
            <input type="hidden" name="SavingAmt" id="SavingAmt" value="<?php echo $_POST['SavingAmt'];?>">

            <input class="corner_all" type="text" value="Full Name" onFocus="if (this.value == 'Full Name') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Full Name';}" id="txtFullName" name="txtFullName" />
            <input class="corner_all" type="text" value="Email Address" onFocus="if (this.value == 'Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Email Address';}" id="txtEmail" name="txtEmail" />
            <input class="corner_all" type="text" value="Mobile Number" onFocus="if (this.value == 'Mobile Number') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Mobile Number';}" id="txtMobile" name="txtMobile"  />
            <textarea class="corner_all" onFocus="if (this.value == 'Notes') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Notes';}" id="txaNote" name="txaNote" >Notes</textarea>
            <div style="padding-top:5px">Followup Date</div>
            <input type="text" class="date-pick corner_all" id="date1" name="date1">
            <center><input type="submit" value="Save & Email" class="img_dc_orange" style="border:none;" /></center>
            <center><input type="button" value="Save & SMS" class="img_dc_orange" style="border:none;" /></center>
            <div class="clear_both"></div>
          </form>
        </div>
    </div>
    
    <footer>

    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>
  <script src="js/firebug.js" type="text/javascript"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script src="js/date.js" type="text/javascript"></script>
  <script src="js/jquery.datepick.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(function()
{
	$('.date-pick')
		.datePicker({createButton:false})
		.bind(
			'focus',
			function(event, message)
			{
				if (message == $.dpConst.DP_INTERNAL_FOCUS) {
					return true;
				}
				var dp = this;
				var $dp = $(this);
				$dp.dpDisplay();
				$('*').bind(
					'focus.datePicker',
					function(event)
					{
						var $focused = $(this);
						if (!$focused.is('.dp-applied')) // don't close the focused date picker if we just opened a new one!
						{
							// if the newly focused element isn't inside the date picker and isn't the original element which triggered
							// the opening of the date picker

							if ($focused.parents('#dp-popup').length == 0 && this != dp && !($.browser.msie && this == document.body)) {
								$('*').unbind('focus.datePicker');
								$dp.dpClose();
							}
						}
					}
				);
				return false;
			}
		).bind(
			'dpClosed',
			function(event, selected)
			{
				$('*').unbind('focus.datePicker');
			}
		);
});
  </script>
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
