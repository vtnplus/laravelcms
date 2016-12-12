<?php
/*
$display = (session("content.view_type") == "gird" || !session("content.view_type") ? "gird" : "list");
if($display == "gird"){
	$width = "col-xs-12 col-sm-3";
	$align = "";
}else{
	$width = "col-xs-12";
	$align = "text-left";
}
*/
$display = "gird";
$width = "col-xs-12 col-sm-3";
?>
<div class="row">
<?php foreach ($data as $key => $value) { ?>
	<div class="<?php echo $width;?> margin-bottom-30">
		<?php $value->robins();?>
			
			<?php if($display  == "gird") { ?>
			<div class="item-box">
				<div class="image-box text-center">
					<a href="<?php echo $value->links();?>" title="<?php echo $value->title;?>" title="<?php echo $value->title;?>"><?php echo $value->thumbs("small");?></a>
				</div>
				<div class="caption">
					
					<div class="text-title">
						<a class="text-title" href="<?php echo $value->links();?>" title="<?php echo $value->title;?>"><?php echo $value->title(15);?></a>
					</div>
					<div class="iconbox-link">
						<?php echo $value->ratings();?>
					</div>
					<p>
						<?php echo lang("global.postby");?> : <b><?php echo $value->users()->first_name;?> <?php echo $value->users()->last_name;?></b><br>
						<small><?php echo $value->updated_at('D, d M Y h:i A');?></small>
					</p>
				</div>
			</div>
			<?php }else{ ?>
			<div class="item-list-left">
				<div class="image-box text-center">
					<a href="<?php echo $value->links();?>" title="<?php echo $value->title;?>" title="<?php echo $value->title;?>">
					<?php echo $value->thumbs("small");?>
					</a>
				</div>
				<div class="caption">

					<h5 class="items-title customs-title">
						<div class="text-title">
						<a  href="<?php echo $value->links();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a>	
						</div>		
					</h5>
					<p>
						<?php echo $value->ratings();?> | <small><?php echo $value->updated_at('D, d M Y h:i A');?></small> | <?php echo lang("global.postby");?> : <b><?php echo $value->users()->first_name;?> <?php echo $value->users()->last_name;?></b>
					</p>
					
					<p><?php echo $value->description;?></p>
					<a class="btn btn-info btn-readmore" href="<?php echo $value->links();?>" title="<?php echo $value->title;?>"><?php echo lang("button.readmore");?></a>
						
				</div>
			</div>
			<?php	} ?>
		</div>
		
<?php } ?>
</div>

<?php if($pages){
	echo '<hr>';
	pages($data);
}
?>
