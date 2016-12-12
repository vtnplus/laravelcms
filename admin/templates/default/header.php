<nav class="navbar navbar-default navbar-fixed-top no-radius">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-home"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php 
          $topmenu = get_register_menu("topmenu");
          $url = str_replace(base_url().'/admin/','',app("url")->full());
          
         
          
          if(is_array($topmenu)){
          foreach ($topmenu as $key => $value) { 

              if(check_users_premisstion($value["contents"])){
              ?>
                <li class="dropdown<?php echo (in_array($url, array_keys($value["contents"])) ? " active" : "");?>"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon <?php echo ($value["icons"] ? $value["icons"] : "");?>"></i>  <?php echo $value["name"];?> <i class="icon-right glyphicon glyphicon-menu-down"></i></a>
                  <ul class="dropdown-menu">
                  <?php foreach ($value["contents"] as $key_sub => $value_sub) { ?>
                    
                    <li><a href="<?php admin_url($key_sub);?>"><?php echo $value_sub;?></a></li>
                  <?php } ?>
                  </ul>
                </li>
              <?php
              }
            } 
          }
        ?>

        
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search Invoices">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>" target="_bank"><i class="glyphicon glyphicon-new-window"></i> Dashboard</a></li>
        <li class="active">
        
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo lang("global.language");?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php echo getLanguages("dropdown",base_url('?setLanguage={language}'));?>
          </ul>
        
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i><img class="img-thumbnail img-circle" src="<?php echo base_url(data(user()->thumbnail,"/contents/uploads/noavatar.png"));?>" style="width: 20px;"></i> <?php echo lang("global.account");?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo admin_url("account/profiles");?>">Profiles</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url("account/logout");?>"><i class="glyphicon glyphicon-off"></i> <?php echo lang("user.logout");?></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div>
  
  <div class="col-xs-1 col-lg-2" style="padding-left: 0; position: relative;">
    <div class="leftpanel">
      <div class="site_title"><i class="glyphicon glyphicon-barcode"></i> Administrator</div>
      <div class="site_description">
          <div class="item-left">
            <div style="background-color: transparent; border:0;">
              <img  class="img-thumbnail img-circle" src="<?php echo base_url(data(user()->thumbnail,"/contents/uploads/noavatar.png"));?>">
            </div>
            <div style="padding-left: 30px; padding-top: 15px;" class="hidden-sm hidden-xs hidden-md">
              Login : <?php echo user()->first_name;?> <?php echo user()->last_name;?><br>
              Time : 20/3/1998
            </div>
          </div>
      </div>
      <ul class="nav side-menu">
        <li><a href="<?php admin_url("");?>"><i class="icon glyphicon glyphicon-home"></i><span class="text"> <?php echo lang("global.home");?></span></a></li>
        <?php 
        $leftmenu = get_register_menu("leftmenu");

        if(is_array($leftmenu)){
          //dd($leftmenu["n"]["contents"]);
          /*
          if(is_admin()){
            $allR = [];
            foreach (config("register.router") as $key => $value) {
              $allR['posts/content/manager/'.$key] = $value;
            }
            $leftmenu["n"]["contents"] = array_merge($allR,$leftmenu["n"]["contents"]);
          }
          */
          
        foreach ($leftmenu as $key => $value) { 
            $premisstion = check_users_premisstion($value["contents"]);

            if(count($premisstion) > 0){
            ?>
              <li class="dropdown<?php echo (in_array($url, array_keys($value["contents"])) ? " active" : "");?>"><a><i class="icon <?php echo ($value["icons"] ? $value["icons"] : "glyphicon glyphicon-plus-sign");?>"></i>  <span class="text"><?php echo $value["name"];?> <i class="icon-right glyphicon glyphicon-menu-down"></i></span></a>
                <ul class="nav child_menu">
                <?php foreach ($value["contents"] as $key_sub => $value_sub) { 
                  if(isset($premisstion[$key_sub]) || user()->is_admin == 1){
                  ?>
                  
                  <li><a href="<?php admin_url($key_sub);?>"><?php echo $value_sub;?></a></li>
                <?php } 
                  }
                ?>
                </ul>
              </li>
            <?php
            }
          }
        } 
        ?>
        
        <?php if($_SERVER["REMOTE_ADDR"] == '127.0.0.1' || base_url() == 'http://localhost' || user()->email == "thietkewebvip@gmail.com"){ ?>
        <li class="dropdown"><a><i class="icon glyphicon glyphicon-wrench"></i> <span class="text">Tools Project <i class="icon-right glyphicon glyphicon-menu-down"></i></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php admin_url("tools/modules");?>">Create Modules</a></li>
              <li><a href="<?php admin_url("tools/forms");?>">Form Layout</a></li>
              <li><a href="<?php admin_url("tools/css/make");?>">CSS Gender</a></li>
              <li><a href="<?php admin_url("tools/css/sass");?>">SASS Comporse</a></li>
              <li><a href="<?php admin_url("tools/forms/posts");?>">Customs Posts</a></li>
              <li><a href="<?php admin_url("tools/themes");?>">Create Themes</a></li>
              <li><a href="<?php admin_url("tools/themes/bootstrap");?>">Bootstrap Themes</a></li>
              <li><a href="<?php admin_url("tools/contents/builder");?>">Clone Data Contents</a></li>
            </ul>
        </li>
        <?php } ?>
      </ul>

      <div class="footer_panel">
        
        <a data-original-title="Settings" data-toggle="tooltip" data-placement="top" title="">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-original-title="FullScreen" data-toggle="tooltip" data-placement="top" title="">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-original-title="Lock" data-toggle="tooltip" data-placement="top" title="">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-original-title="Logout" data-toggle="tooltip" data-placement="top" title="">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
      </div>
    </div>
    
  </div>

   <div class="col-xs-11 col-lg-10 main-content" style="padding-left: 0;padding-right: 0;">
   <div class="main-container">

   <?php
   $s = &$_SERVER;
    $uri = $s['REQUEST_URI'];
    //$uri = str_replace($prefix."/", "", $uri);
    if(substr($uri, 0, 1) == '/'){
        $uri = substr($uri, 1, strlen($uri));
    }

    $uris = explode('/', $uri,5);
    $uri = [$uris[1],@$uris[2]];
   ?>
    <div class="meger breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <?php foreach ($uri as $key => $value) { 
          if($value){
          ?>
          <li><a href="#"><?php echo ucfirst($value);?></a></li>
        <?php } } ?>
        
        <li class="active"><?php echo (@$uris[3] ? ucfirst(@$uris[3]) : "Data");?></li>
      </ol>
    </div>
<?php alert(@$errors);?>