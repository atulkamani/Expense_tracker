<?php
	include("connect.php");
	checkLogin();
	if(isset($_POST['subCalculation'])){
		$home = $_POST['txtHomeOffice'];
		$vehical = $_POST['txtVehical'];
		$travel = $_POST['txtTravel'];
		$enter = $_POST['txtMeals'];
		$gen = $_POST['txtGen'];
	}
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
 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/libs/modernizr-custom.js"></script>
  <script src="js/function.js" type="text/javascript"></script>
</head>

<body onLoad="calcTax('<?php echo $home?>','<?php echo $vehical?>','<?php echo $travel?>','<?php echo $enter?>','<?php echo $gen?>');">
  <div id="container">
    <header>
        <?php include("header.php");?>
        <div class="title_w">
          <h1>TAX SAVINGS ANALYSIS</h1>
        </div>
    </header>
    <form name="frmCountCal" id="frmCountCal" action="save-n-email-report.php" method="post">
    <input type="hidden" name="deductionText" id="deductionText">
    <input type="hidden" name="SavingAmt" id="SavingAmt">
    
    <div id="main" role="main">
        <div class="green_w">
          <div class="green_c">
            <p class="sf1">Your Tax Savings Analysis</p>
          </div>
        </div>
        <p class="uni_line">
          Based on the business expenses you provided, we estimate your total deductions in relation to your home business to be:
        </p>
        </div>
        <p class="tax_sa">
          <span class="ss6"><strong>Estimated Annual Deductions: <span class="t_green" id="deductionValue"></span></span> <br />
          Based on a Tax rate of <span class="t_green">28%*</span> <br />
          <span class="ss6">Your monthly savings could be about</strong></span>
        </p>
        <p class="big_fig t_green">
          <strong><span id="savingAmount"></span></strong>
        </p>
        <input type="submit" name="subSave" id="subSave" class="img_dc_orange" value="Save this report">
        <!--<a href="#" class="img_dc_orange">Save this report</a>!-->
        <a href="welcome.php" class="img_dc_orange">Start over new analysis</a>
        
        <ul class="aj_play">
          <li>
            <div class="aj_li_c"><div class="aj_d ss4">Disclaimer</div><div class="aj_a"></div></div>
            <div class="aj_content">
              <p class="uni_line">Lorem Ipsum</p>
            </div>
          </li>
          <li>
            <div class="aj_li_c"><div class="aj_d ss4">Assumption</div><div class="aj_a"></div></div>
            <div class="aj_content">
              <p class="uni_line">Assumptions: The basis for the deduction calculation is as follows; the Home office deduction is calculated by totaling various household
expenses incurred by operating a business from a residence and multiplying the sum by 20%; the business vehicle deduction is calculated by totaling miles driven for business and multiplying the sum by $.55; the travel deduction is 100% of the actual travel expenses incurred for the home based business; the meals deduction is calculated by multiplying the sum of the yearly cost of business meals and entertainment by 50%; the office supply deduction is 100% of the actual cost of any office supplies used for the home based business.</p>
            </div>
          </li>
        </ul>
    </div>
    </form>
    <footer>

    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>
  
  <script type="text/javascript">
  $(document).ready(function(){
	  $('.aj_li_c').toggle(
		  function(){
			  $(this).parent().addClass("aj_play_cur");
			  $(this).next().stop(false,true).slideDown();
			  $(this).find(".aj_a").css({"background-position":"0 -43px","width":"20px","height":"15px","margin-right":"1px"})},
		  function(){
			  $(this).parent().removeClass("aj_play_cur");
			  $(this).next().stop(false,true).slideUp();
			  $(this).find(".aj_a").css({"background-position":"0 -58px","width":"15px","height":"20px","margin-right":"0px"})}
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
