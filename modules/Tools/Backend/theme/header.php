<div swipe="left"></div>
<div swipe="right"></div>
<?php alert(@$errors);?>
<header>
	<nav  class="navbar navbar-default navbar-menu">
	  <div class="container">
	  <div style="position: relative;">
	    <div class="navbar-style">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button data-swipe-left type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url(config("site.logo"));?>"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div data-left-menu class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right navbar-menu">
	        <?php nav_menu("header");?>
	        
	      </ul>
	      
	      
	    </div><!-- /.navbar-collapse -->
	    </div>
	    </div>
	  </div><!-- /.container-fluid -->
	</nav>
</header>


<div class="home-slider">
      <?php echo do_shortcode('[slider id="sliderhome"'.(!is_home() ? ' height=160' : "").'][/slider]');?>
</div>
<div class="main-contents">
<?php
if(!is_home()){
  breadcrumbs();
}
?>