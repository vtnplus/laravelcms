{header}


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
				
				

				<?php }else{ ?>
				
				

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

{footer}