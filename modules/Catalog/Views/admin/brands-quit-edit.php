<div style="overflow-x: hidden;">
<?php formopen(["action" => admin_url("catalog/brands/edit/".$data->type."/".$data->id, false)]);?>
<ul class="row">
	<li class="col-xs-12 col-sm-3">
		<input type="text" class="form-control" value="<?php echo @$data->title;?>" name="title">
	</li>

	

	<li class="col-xs-12 col-sm-3">
		<div class="input-group"><input type="text" class="form-control" id="inputThumbs" up-data="image" up-format="src" name="thumbs" value="<?php echo data($data->thumbs,null);?>" placeholder="<?php echo lang("posts.content.thumbs_placeholder");?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbs" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-picture"></i></button></span></div>
	</li>
	<li class="col-xs-12 col-sm-3">
		<input type="text" class="form-control" value="<?php echo @$data->seo_urls;?>" name="seo_urls">
	</li>
	<li class="col-xs-12 col-sm-3">
		<input type="text" data-role="tagsinput" class="form-control" value="<?php echo @$data->tags;?>" name="tags">
	</li>
</ul>

<hr>
<button class="btn btn-primary btn-save-quit" type="button" data-save-quit>Update</button> <button class="btn btn-info" type="button" onclick='$("#hookEdit").remove();'>Close</button>
<?php formclose();?>

<script type="text/javascript">
	$(function(){
		$('[data-role="tagsinput"]').tagsinput();
	})
</script>
</div>