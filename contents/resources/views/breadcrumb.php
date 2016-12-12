<div class="container">
	<h2><?php echo $title;?></h2>
	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url();?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
	  <?php
	  $links = config("register.pages.breadcrumbs.link");
	  if(is_array($links)){
	  foreach ($links as $key => $value) {
	  	if($value != $title){
	  	?>
	  		 <li><a href="<?php echo base_url($key);?>"><?php echo $value;?></a></li>
	  	<?php
	  	}
	  	}
	  }
	  ?>
	 
	  <li class="active"><?php echo $title;?></li>
	</ol>
</div>