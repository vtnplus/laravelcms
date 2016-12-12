<div swipe="left"></div>
<div swipe="right"></div>
<?php alert(@$errors);?>
<header>
<div class="topbar hidden-xs">
  <div class="container">
    <div class="row">
     
      <div class="col-xs-12 col-lg-2">
        <i class="glyphicon glyphicon-earphone"></i> Hotline : <?php echo config("site.hotline");?>
      </div>
      <div class="col-xs-12 col-lg-3">
        <i class="glyphicon glyphicon-envelope"></i> <?php echo config("site.email");?>
      </div>
      <div class="col-xs-12 col-lg-7 text-right">

       <div class="btn-group hover">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo lang("global.language");?> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <?php echo getLanguages("dropdown",base_url('?setLanguage={language}'));?>
          </ul>
        </div>

       <?php if(is_guest()){ ?>
        <div class="btn-group hover">
        <button type="button" data-toggle="modal" data-target="#RegisterModal" class="btn btn-default">Đăng ký</button>
        </div>
         <div class="btn-group hover">
        <button type="button" data-toggle="modal" data-target="#LoginModal" class="btn btn-primary">Đăng nhập</button>
        </div>
        <?php 
        if(view()->exists("popup-register")){
          echo view("popup-register",["id" => "RegisterModal"])->render();
        }
        ?>
        <?php 
        if(view()->exists("popup-login")){
          echo view("popup-login",["id" => "LoginModal"])->render();
        }
        ?>
        


        
      <?php }else{ ?>
        <div class="btn-group hover">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hi! <?php echo user()->first_name;?> <?php echo user()->last_name;?> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php admin_url("");?>"><i class="fa fa-pie-chart" aria-hidden="true"></i> <?php echo lang("user.cpanel");?></a></li>
            <li><a href="<?php admin_url("account/profiles");?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo lang("user.profiles");?></a></li>
            <li><a href="#"><i class="fa fa-history" aria-hidden="true"></i> <?php echo lang("user.history");?></a></li>
            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo lang("user.email");?></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url("account/logout");?>"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
          </ul>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>



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
 <?php
if(!is_home()){
  
  breadcrumbs();
}
?>