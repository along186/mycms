<?php if (!defined('LONG_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h2 class="h_a">开发团队</h2>
  <div class="home_info" id="home_devteam">
    <ul>
      <?php foreach ($server_info as $key => $row){?>
        <li> <em><?php echo $key; ?></em> <span><?php echo $row; ?></span> </li>
      <?php }?>
    </ul>
  </div>
</div>

<script>
$("#btn_submit").click(function(){
	$("#tips_success").fadeTo(500,1);
});
</script>
</body>
</html>