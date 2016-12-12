<div class="row">
<?php foreach ($data as $key => $value) { ?>
	<div class="col-xs-12 col-sm-4">
		<div class="gallery-style">
			<div class="image-box">
				<a href="<?php echo $value->links();?>" title="<?php echo $value->title;?>">
				<img src="<?php echo getThumbnail($value->thumbs);?>" style="max-width: 100%;" alt="<?php echo $value->title;?>">
				</a>
			</div>
			<div class="caption">
				<a href="<?php echo $value->links();?>" title="<?php echo $value->title;?>"><i class="glyphicon glyphicon-picture"></i> <?php echo $value->title;?></a>
			</div>
		</div>
	</div>
<?php } ?>
</div>
