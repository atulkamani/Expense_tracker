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
  <script src="js/libs/modernizr-custom.js"></script>
</head>

<body>
  <div id="container">
  
    <header>
        <?php include("header.php");?>
        <div class="title_w">
          <h1>MORE RESOURCES</h1>
        </div>
    </header>
    
    <div id="main" role="main">
        <p class="ss8 uni_line t_green"><strong>The Expense Tracker</strong></p>
        <center><img src="img/photo2.jpg" /></center>
        <p class="ss3 uni_line">Expense Management Software that simplifies business building and management.</p>
        <a href="#" class="img_dc_orange">Visit Site</a>
        
        <p class="ss8 uni_line t_green"><strong>Ignite Your Recruiting</strong></p>
        <center><img src="img/photo3.jpg" /></center>
        <p class="ss3 uni_line">Video driven custom replicate site that explains to your prospects "why" they need a home business and to contact YOU on how they join!</p>
        <a href="#" class="img_dc_orange">Visit Site</a>
        
        <p class="ss8 uni_line t_green"><strong>Ignite Your Finance</strong></p>
        <center><img src="img/photo4.jpg" /></center>
        <p class="ss3 uni_line">It's a Business in a Box, everything you need to manage your Business like a Pro!</p>
        <a href="#" class="img_dc_orange">Visit Site</a>
        
        <p class="ss8 uni_line t_green"><strong>EVA – Electronic Virtual Assistant</strong></p>
        <center><img src="img/photo5.jpg" /></center>
        <p class="ss3 uni_line">Your <span class="t_green">Electronic Virtual Assistant</span> to help you become a more organized professional</p>
        <a href="#" class="img_dc_orange">Visit Site</a>
        
        <p class="ss8 uni_line t_green"><strong>7 Days to Profitability</strong></p>
        <center><img src="img/photo6.jpg" /></center>
        <p class="ss3 uni_line">Your Eric teaches a unique MLM recruiting strategy that will completely change the way you approach talking with people about your business opportunity. Show them how much money they are losing by NOT having a business.  Show them how simple it is to reclaim $300 – $800 per month starting today.</p>
        <a href="#" class="img_dc_orange">Visit Site</a>
    </div>
    
    <footer>
        <div class="black_w">
          <ul class="black_c ss0">
            <li><a href="welcome.php" class="bt_calc"></a><span>Tax Saving Calculator</span></li>
            <li><a href="previous-report.php" class="bg_graph"></a><span>Previous Report</span></li>
            <li><a href="more-resources.php" class="bt_paper_c"></a><span class="t_green">More Resources</span></li>
          </ul>
        </div>
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
