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
				<?php echo $value->thumbs("medium");?>
			</a>
		</div>
		<div class="caption">
			
			<br>
				<h5 class="items-title customs-title">
					<a href="<?php echo $value->links();?>">
						<?php echo $value->title(5);?>
					</a>			
				</h5>
				<div class="iconbox-link" style="color:#EC5595;">
					<?php echo $value->ratings();?>	
				</div>
				<b class="prices"><?php echo $value->prices();?></b><br>
				<a class="btn btn-xs btn-info" addShops="<?php echo $value->type;?>/<?php echo $value->id;?>">Mua hàng</a>
			
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
