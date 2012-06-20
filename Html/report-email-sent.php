<?php
	include("connect.php");
	checkLogin();
	//insert into table;
	$fullName = addslashes($_SESSION['contactDetails']['txtFullName']);
	$email = addslashes($_SESSION['contactDetails']['txtEmail']);
	$mobile =$_SESSION['contactDetails']['txtMobile'];
	$notes = addslashes($_SESSION['contactDetails']['txaNote']);
	$remindDate = addslashes($_SESSION['contactDetails']['date1']);
	$mailCont = addslashes(trim($_POST['txaMailCont']));

	$deductionText = $_SESSION['contactDetails']['deductionText'];
	$savingAmt = $_SESSION['contactDetails']['SavingAmt'];
	$date = date('Y-m-d');
	$user_id = $_SESSION['uid'];
	$mailQ = mysql_query("insert into email_report (u_id,full_name,email,mobile,notes,mail_content,deduction,saving_amt,date,remindDate) Values
	 ($user_id,'$fullName','$email','$mobile','$notes','$mailCont',$deductionText,$savingAmt,'$date','$remindDate')") or die(mysql_error());
	//sent mail
	$to = $email;
	$name= $fullName;
	$phone =$mobile;
	// subject
	$subject = 'TAX SAVINGS ANALYSIS';
	// message
	$message = "
		<body>
		  <p>Hi,</p>
		  <table>
			<tr>
			  <td>&nbsp;</td>
              <td>".trim(stripcslashes($mailCont))."</td>
			</tr>
			<tr>
			  <td><strong>Estimated Annual Deductions :</strong></td>
              <td>$.".$deductionText."</td>
			</tr>
			<tr>
			  <td>Based on a Tax rate of</td>
              <td>28%</td>
			</tr>
            <tr>
			  <td><strong>Your monthly savings could be about</strong></td>
              <td>$.".$savingAmt."</td>
			</tr>
		  </table>
		</body>";
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		$headers .= "From: ".SiteName."<$ADMIN_MAIL>" . "\r\n";
		// Mail it
		mail($to, $subject, $message, $headers);
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
</head>

<body>
  <div id="container">
  
    <?php include("header.php");?>
    <div id="main" role="main">
        <div class="green_w">
          <div class="green_c">
            <p class="sf1"></p>
          </div>
        </div>
        <div align="center" class="green_bg">Your mail has been sent successfully.</div>
        <div class="gray_box corner_all">
          <p><?php $contain = (explode(',',$_POST['txaMailCont'],2));
		  echo $contain[0].",<br/>".$contain[1];
		 // echo $_POST['txaMailCont']; 
		  ?></p>
        </div>
        <a href="welcome.php" class="img_dc_orange">Return to Estimator</a>
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
