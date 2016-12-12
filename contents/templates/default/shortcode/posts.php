<?php
if(session("content.view_type") == "gird"){
	$width = "col-xs-12 col-lg-4";
	$align = "";
}else{
	$width = "col-xs-12";
	$align = "text-left";
}
?>
<div class="row">
<?php foreach ($data as $key => $value) { ?>
	<div class="<?php echo $width;?> margin-bottom-30">
		<div class="image-box">
			<a href="<?php echo $value->links();?>" title="<?php echo $value->title;?>">
			<?php echo $value->thumbs();?>
			</a>
		</div>
		<div class="caption">
			
			<?php if(session("content.view_type") != "gird") { ?>
			<h3 class="items-title customs-title">
				<a href="<?php echo $value->links();?>">
					<?php echo $value->title;?>
				</a>			
			</h3>
			<ul class="row" style="margin-bottom: 30px;">
				<li class="col-xs-4 color-danger">
					Đánh giá<br>
					<div class="iconbox-link">
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					</div>
				</li>
				<li class="col-xs-4">
					<div class="iconbox size-xs text-left color-warning hover-default">
			          <a class="iconbox-link" href="#first">
			            <div class="iconbox-icon"><i class="glyphicon glyphicon-user"></i></div>
			          </a>
			          <div class="iconbox-text">Người đăng <br><b><?php echo $value->users()->first_name;?> <?php echo $value->users()->last_name;?></b>
			          </div>
			        </div>
				</li>
				<li class="col-xs-4">
					<div class="iconbox size-xs text-left color-primary hover-default">
			          <a class="iconbox-link" href="#first">
			            <div class="iconbox-icon"><i class="fa fa-comments"></i></div>
			          </a>
			          <div class="iconbox-text">Bình luận <br><b>2,450</b>
			          </div>
			        </div>
				</li>
			</ul>
			<p><?php echo $value->description;?></p>
			<a class="btn btn-info btn-readmore" href="<?php echo base_url("pages/".config("register.pages.urls")).($value->seo_urls ? "/".$value->seo_urls : '?pid='.$value->id);?>">Read More..</a>

			<?php }else{
				?>
				<br>
				<h4 class="items-title customs-title">
					<a href="<?php echo $value->links();?>">
						<?php echo $value->title;?>
					</a>			
				</h4>
				Người đăng : <b><?php echo $value->users()->first_name;?> <?php echo $value->users()->last_name;?></b><br>
				<small><?php echo $value->updated_at('D, d M Y h:i A');?></small>
			<?php	} ?>
			
		</div>
	</div>
<?php } ?>
</div>
