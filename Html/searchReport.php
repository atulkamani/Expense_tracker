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

<?php include("connect.php");
	$getReqQ = mysql_query("select * from email_report where u_id = $_SESSION[uid] and full_name LIKE '".$_REQUEST['searchtext']."%' order by id DESC");
			while($data = mysql_fetch_array($getReqQ)){
		?>
          <li>
            <div class="aj_li_c aj_li_m">
              <div class="aj_d"><?php echo $data['full_name']?><p class="ss4"><?php echo convertUSDate($data['date']);?> </p></div><div class="aj_a_m"></div>
            </div>
            <div class="aj_content">
              <p class="uni_line">
                Mobile: <?php echo $data['mobile']?><br /><br />
                Email: <?php echo $data['email']?><br /><br />
                <?php echo $data['notes']?>
              </p>
              <a href="tax-saving-analysis-edit.php?id=<?php echo $data['id']?>" class="img_dc_orange">View Details</a>
            </div>
          </li>
      <?php
			}
	  ?>