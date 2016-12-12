<div swipe="left"></div>

<?php alert(@$errors);?>
<header>
	<div class="container">
		<div class="col-xs-4">
			 <a  href="<?php echo base_url();?>"><img style="max-height: 90px;" src="<?php echo base_url(config("site.logo"));?>"></a>
		</div>
		<div class="col-xs-8">
			<div>
				<div class="text-right">
					Hotline : | Help | Account
				</div>
			</div>
			<ul class="row">
				<li class="col-xs-8">
					<div class="search-query">
						<div class="input-group">
					      <input type="text" class="form-control" placeholder="Search for...">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="button">Go!</button>
					      </span>
					    </div>
					</div>
				</li>
				<li class="col-xs-4">
					<a href="<?php echo base_url("invoices/order");?>" class="btn btn-block btn-info">Shopping Cart</a>
				</li>
			</ul>
		</div>
	</div>
	
</header>

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
	      
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div data-left-menu class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-menu">
	        <?php nav_menu("header");?>
	        
	      </ul>
	      
	      
	    </div><!-- /.navbar-collapse -->
	    </div>
	    </div>
	  </div><!-- /.container-fluid -->
	</nav>

<div class="main-contents">

<?php
if(!is_home()){
  breadcrumbs();
}
?>