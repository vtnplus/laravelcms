<div class="items size-xs text-left">
	<div class="row">
	<?php foreach ($data as $key => $value) { ?>
		<div class="col-xs-12 margin-bottom-30">
			
			<div class="image-box">
				<a href="<?php echo $value->links();?>">
					<img src="<?php echo getThumbnail($value->thumbs);?>">
				</a>
			</div>
			<div class="caption">
				<a href="<?php echo $value->links();?>">
					<b class="items-title"><?php echo $value->title;?></b>
				</a>
				<br>
				<small><?php echo $value->updated_at("d M Y ( h:i )");?></small>
				<br>
				<small><?php echo $value->users()->first_name;?> <?php echo $value->users()->last_name;?></small>
				
				
			</div>

		</div>
	<?php } ?>
	</div>
</div>