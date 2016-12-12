<div style="overflow-x: hidden;">
<?php formopen(["action" => admin_url("pages/home/edit/".$data->id, false)]);?>
<ul class="row">
	<li class="col-xs-12 col-sm-3">
		
		<div class="input-group">
	      <input type="text" up-data="title" class="form-control" name="title" value="<?php echo $data->title;?>">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button" onClick="$('#description').toggleClass('hide');">Description!</button>
	      </span>
	    </div>
	</li>

	<li class="col-xs-12 col-sm-3">
		<div class="input-group"><input type="text" class="form-control" id="inputThumbs" up-data="image" up-format="src" name="thumbs" value="<?php echo data($data->thumbs,null);?>" placeholder="<?php echo lang("posts.content.thumbs_placeholder");?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbs" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-picture"></i></button></span></div>
	</li>

	<li class="col-xs-12 col-sm-3">
		<input type="text" class="form-control" name="seo_urls" value="<?php echo $data->seo_urls;?>">
	</li>

	
	<li class="col-xs-12 col-sm-3">
		<select class="form-control" name="display_as">
			<option value="pages.php">Default</option>
			<?php fetch_fontend_layout($data->display_as);?>
		</select>
	</li>
	
	<li class="col-xs-12 hide" id="description" style="padding-top:10px;">
		<textarea type="text" class="form-control" name="description" placeholder="Description"><?php echo $data->description;?></textarea>
	</li>

	<li class="col-xs-12 col-sm-3" style="padding-top:10px;">
		SEO Title
		<input type="text" class="form-control" name="meta_title" value="<?php echo $data->meta_title;?>">
	</li>
	<li class="col-xs-12 col-sm-3" style="padding-top:10px;">
		Meta Keyword
		<input type="text" class="form-control" name="meta_keyword" value="<?php echo $data->meta_keyword;?>">
	</li>
	<li class="col-xs-12 col-sm-6" style="padding-top:10px;">
		Meta Description
		<input type="text" class="form-control" name="meta_descritpion" value="<?php echo $data->meta_descritpion;?>">
	</li>

</ul>
<hr>
<button class="btn btn-primary btn-save-quit" type="button" data-save-quit>Update</button> <button class="btn btn-info" type="button" onclick='$("#hookEdit").remove();'>Close</button>
<?php formclose();?>
</div>