<?php
if(session("content.view_type") == "gird" || !session("content.view_type")){
	$width = "col-xs-12 col-lg-3 col-xs-6";
	$align = "text-left items";
	$flex = "row-flex";
}else{
	$width = "col-xs-12";
	$align = "text-left items size-sm";
	$flex = "";
}
?>
<div class="<?php echo $align;?>">
<div class="row <?php echo $flex;?>">
<?php foreach ($data as $key => $value) { ?>
	<div class="<?php echo $width;?> margin-bottom-30">
		<div class="image-box" style="min-height: 150px; max-height: 150px; overflow: hidden; border:1px solid #ddd; padding:5px;">
			<a href="<?php echo $value->links();?>" title="<?php echo $value->title;?>">
			<img src="<?php echo getThumbnail($value->thumbs);?>" alt="<?php echo $value->title;?>">
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
				<li class="col-xs-6 color-danger">
					Đánh giá<br>
					<div class="iconbox-link">
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					</div>
				</li>
				
				<li class="col-xs-6">
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
			Giá bán : <b><?php echo $value->prices();?></b><hr>
			<a class="btn btn-info btn-readmore" href="<?php echo $value->links();?>">Chi tiếc..</a>
			<a class="btn btn-info btn-readmore" href="#">Mua hàng..</a>
			<?php }else{
				?>
				<br>
				<h5 class="items-title customs-title">
					<a href="<?php echo $value->links();?>">
						<?php echo $value->title;?>
					</a>			
				</h5>
				<div class="iconbox-link" style="color:#EC5595;">
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					</div>
				Giá bán : <b><?php echo $value->prices();?></b><br>
				<a href="" class="btn btn-xs btn-info">Mua hàng</a>
			<?php	} ?>
			
		</div>
	</div>
<?php } ?>
</div>
</div>
<?php if($pages){
	echo '<hr>';
	pages($data);
}
?>
