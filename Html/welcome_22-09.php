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
  <script src="js/function.js" type="text/javascript"></script>
</head>

<body>
  <div id="container">
  
    <header>
        <?php include("header.php");?>
        <div class="title_w">
          <h1>TAX SAVINGS ESTIMATOR</h1>
        </div>
    </header>
    <form name="frmCalculation" id="frmCalculation" method="post" onSubmit="return accordianValidation();" action="tax-saving-analysis.php">
    <div id="main" role="main">
        <p class="uni_line ss8 t_green">Ready To See What You Can Be Saving?</p>
        <p class="uni_line ss4">Begin by entering in applicable amounts in the categories below:</p>
        <ul class="aj_play">
          <li>
            <div class="aj_li_c"><div class="aj_d">Home Office Deduction</div><div class="aj_a"></div></div>
            <div class="aj_content">
              <p class="uni_line">Home based deductions are available when any dwelling unit of yours is used on a regular basis for your business. <br><br> Total of any of the following: Rent, Real Estate Taxes, Utilities and Services, Mortgage Interest, Insurance, Casualty Losses:</p>
              <center><span class="ss10"><strong>$</strong></span> <input type="text" class="corner_all ho_deduct" name="txtHomeOffice" id="txtHomeOffice"></center>
            </div>
          </li>
          <li>
            <div class="aj_li_c"><div class="aj_d">Business Vehicle Deduction</div><div class="aj_a"></div></div>
            <div class="aj_content">
              <p class="uni_line">Business Vehicle Deduction - use of any vehicle in the course of operating your home business, may be deductible as a business expense.<br><br> Estimated number of business miles driven yearly:</p>
              <center><span class="ss10"><strong>$</strong></span> <input type="text" class="corner_all ho_deduct" name="txtVehical" id="txtVehical"></center>
            </div>
          </li>
          <li>
            <div class="aj_li_c"><div class="aj_d">Business Travel Deduction</div><div class="aj_a"></div></div>
            <div class="aj_content">
              <p class="uni_line">Business Travel Deduction - travel expenses incurred when business activity requires to stay away from the princial place of business can be deductable.<br><br>Estimated cost of any of the following: Airfare, Hotel, Parking, and other related business travel expenses: </p>
              <center><span class="ss10"><strong>$</strong></span> <input type="text" class="corner_all ho_deduct" name="txtTravel" id="txtTravel"></center>
            </div>
          </li>
          <li>
            <div class="aj_li_c"><div class="aj_d">Meals & Entertain Deduction</div><div class="aj_a"></div></div>
            <div class="aj_content">
              <p class="uni_line">Meals & Entertainment Deduction - expenses incurred for meals and entertainment can be deductible if related or associated with your business.<br><br>Estimated cost of business meals for the year: </p>
              <center><span class="ss10"><strong>$</strong></span> <input type="text" class="corner_all ho_deduct" name="txtMeals" id="txtMeals"></center>
            </div>
          </li>
          <li>
            <div class="aj_li_c"><div class="aj_d">General Office Deduction</div><div class="aj_a"></div></div>
            <div class="aj_content">
              <p class="uni_line">General Office Expense Deduction - general business expenses such as telephone & internet use, supplies and marketing materials may be deductible.<br><br>Estimated annual cost of the following: Telephone & Cell Phone, Internet, Business cards, General Office supplies, Marketing and Advertising.</p>
              <center><span class="ss10"><strong>$</strong></span> <input type="text" class="corner_all ho_deduct" name="txtGen" id="txtGen"></center>
            </div>
          </li>
        </ul>
        <input type="submit" class="img_dc_blue" name="subCalculation" id="subCalculation" value="Calculate Savings" />
        <!--<a href="#" class="img_dc_blue">Calculate Savings</a>-->
    </div>
    </form>
    
    <footer>
        <div class="black_w">
          <ul class="black_c ss0">
            <li><a href="welcome.php" class="bt_calc_c"></a><span class="t_green">Tax Saving Calculator</span></li>
            <li><a href="previous-report.php" class="bg_graph"></a><span>Previous Report</span></li>
            <li><a href="more-resources.php" class="bt_paper"></a><span>More Resources</span></li>
          </ul>
        </div>
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->
  
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  
  <script type="text/javascript">
  $(document).ready(function(){
	  //$('.aj_li_c').click(
		  /*function(){
			  $(this).parent().addClass("aj_play_cur");
			  $(this).next().stop(false,true).slideDown(200);
			  $(this).find(".aj_a").css({"background-position":"0 -43px","width":"20px","height":"15px","margin-right":"1px"})},
		  function(){
		  	  $(this).parent().removeClass("aj_play_cur");
			  $(this).next().stop(false,true).slideUp(200);
			  $(this).find(".aj_a").css({"background-position":"0 -58px","width":"15px","height":"20px","margin-right":"0px"})}*/
	  //);
	  $('.aj_li_c').click(function(){
								  $('.aj_content').hide();
								  $('.aj_li_c').find(".aj_a").css({"background-position":"0 -58px","width":"15px","height":"20px","margin-right":"0px"})
								 $(this).next().stop(false,true).slideDown(1000);
								 $(this).find(".aj_a").css({"background-position":"0 -43px","width":"20px","height":"15px","margin-right":"1px"})  
								   });
  });
  </script>
  
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
