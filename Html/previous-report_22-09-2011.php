<?php
	include("connect.php");
	checkLogin();
	include("Pager/Pager.php");
	/* First we need to get the total rows in the table */
	$result=mysql_query("SELECT count(*) AS total FROM email_report where u_id = $_SESSION[uid]");
	$row = mysql_fetch_array($result);
	/* Total number of rows in the logs table */
	$totalItems = $row['total'];
	/* Set some options for the Pager */
	$pager_options = array(
		'mode'       => 'Sliding',   // Sliding or Jumping mode. See below.
		'perPage'    => 5,   // Total rows to show per page
		'delta'      => 4,   // See below
		//'nextImg'    => '<img src="img/next.png" style="margin-top:10px;"/>',
		//'prevImg'    => '<img src="img/prev.png" style="margin-top:10px;"/>',
		'totalItems' => $totalItems,
	);
	/* Initialize the Pager class with the above options */
	$pager = Pager::factory($pager_options);
	list($from, $to) = $pager->getOffsetByPageId();
	$from = $from - 1;
	$perPage = $pager_options['perPage'];
	//get client report
	$getReqQ = mysql_query("select * from email_report where u_id = $_SESSION[uid] order by id DESC LIMIT $from , $perPage");
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
  <script src="js/function1.js"></script>
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
        <div class="search_w">
          <div class="search_c">
            <div class="anti_s"></div>
            <div class="sb_w"><input type="text" class="search_box" onKeyUp="getPreReport(this.value);" /></div>
          </div>
        </div>
        <p class="uni_line ss8 t_green">View Previous Reports and Follow Up</p>
        <p class="uni_line ss4">Select a report below or the search function and click "View Detail".</p>
        <?php if(mysql_num_rows($getReqQ)>=1){ ?>
        <ul class="aj_play">
        <?php
			while($data = mysql_fetch_array($getReqQ)){
		?>
          <li>
            <div class="aj_li_c aj_li_m">
              <div class="aj_d"><?php echo $data['full_name']?><p class="ss4"><?php echo convertUSDate($data['date']);?> </p></div><div class="aj_a_m"></div>
            </div>
            <div class="aj_content">
              <p class="uni_line">
                Mobile: <a href="tel:<?php echo $data['mobile']?>;"><?php echo $data['mobile']?></a><br /><br />
                Email: <a href="mailto:<?php echo $data['email']?>;"><?php echo $data['email']?></a><br /><br />
                <?php echo $data['notes']?>
              </p>
              <a href="tax-saving-analysis-edit.php?id=<?php echo $data['id']?>" class="img_dc_orange">View Details</a>
            </div>
          </li>
      <?php
			}
	  ?>
        </ul>
     <?php }else{?>
        <div align="center"><strong>No previous record found</strong></div>
    <?php }?>    
    </div>
    <div id="pager" class="pager" align="center">
    <?php
	/* Display the links */
	echo $pager->links;
?>
    </div>
    <footer>
        <div class="black_w">
          <ul class="black_c ss0">
            <li><a href="welcome.php" class="bt_calc"></a><span>Tax Saving Calculator</span></li>
            <li><a href="previous-report.php" class="bg_graph_c"></a><span class="t_green">Previous Report</span></li>
            <li><a href="more-resources.php" class="bt_paper"></a><span>More Resources</span></li>
          </ul>
        </div>
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
			  $(this).find(".aj_a_m").css({"background-position":"0 -43px","width":"20px","height":"15px","margin-right":"1px"})},
		  function(){
		  	  $(this).parent().removeClass("aj_play_cur");
			  $(this).next().stop(false,true).slideUp();
			  $(this).find(".aj_a_m").css({"background-position":"0 -58px","width":"15px","height":"20px","margin-right":"0px"})}
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
