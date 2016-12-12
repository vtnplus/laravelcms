{header}
<?php
register("javascript",[resources_url("globals/jquery.prices.js")]);
$tags = explode(',', $data->tags);
?>
<?php if($size["full"] != "yes"){ ?>
<div class="container">
<?php } ?>
	<div class="row row-flex">
		<?php if(intval($size["left"]) > 0){ ?>
		<div class="col-xs-12 col-sm-<?php echo intval($size["left"]);?>">
			<?php widgets("left")->make()->send();?>

		</div>
		<?php } ?>
		<div class="col-xs-12 col-sm-<?php echo intval($size["content"]);?>">
			
			<div class="content">

				<?php echo $data->content;?>
				<?php if(config("register.pages.view")){ ?>
				<?php echo $data->contentPosts;?>
				
				<h4 class="customs-title">Hoạt động khác</h4>
				<?php echo do_shortcode('[posts type="'.$type.'" pages="paged" limit=8][/posts]');?>

				<?php }else{ ?>
				
				<?php
				foreach ($tags as $key => $value) {
						?>
						<a href="" class="btn btn-default"><?php echo trim($value);?></a>
						<?php
					}
				?>
				<hr>

				<?php echo do_shortcode('[posts type="'.$type.'" pages="paged"][/posts]');?>
				

				<?php } ?>
			</div>
		</div>
		<?php if(intval($size["right"]) > 0){ ?>
		<div class="col-xs-12 col-sm-<?php echo intval($size["right"]);?>">
			<?php widgets("right")->make()->send();?>

		</div>
		<?php } ?>
	</div>
<?php if($size["full"] != "yes"){ ?>
</div>
<?php } ?>

<style type="text/css">
 .gallery-style{
    position: relative;
    margin-bottom: 15px;
    
}
 .gallery-style .caption{
    position: absolute;
    bottom: 0;
    background-color:rgba(0,0,0,0.5); 
    width: 100%;
    line-height: 30px;
    color: #FFF;
    padding:5px 10px; 
}
.gallery-style .caption a{
    color: #FFF;
}
.gallery-style .image-box{
        max-width: 100%;
        height: auto;

        vertical-align: bottom;
        padding: 10px;
        border-radius: 3px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        margin-bottom: 15px;
        background: #FFF;
       
    }
.gallery-style-2 .image-box{
        max-width: 100%;
        height: auto;

        vertical-align: bottom;
        padding: 10px;
        border-radius: 3px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border:1px solid #ddd;
    height: 150px;
    margin-bottom: 15px;
    position: relative;
    overflow: hidden;
    vertical-align: baseline;
       
    }
  
.gallery-style::before {
    top: 4px;
    z-index: -10;
    -webkit-transform: rotate(4deg);
    -moz-transform: rotate(4deg);
    transform: rotate(4deg);
}
.gallery-style::before, .gallery-style::after {
    content: "";
    border-radius: 3px;
    width: 100%;
    height: 100%;
    position: absolute;
    border: 10px solid #fff;
    left: 0;
    top:0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -webkit-transition: 0.3s all ease-out;
    -moz-transition: 0.3s all ease-out;
    transition: 0.3s all ease-out;
    z-index: -2;
}

</style>
{footer}