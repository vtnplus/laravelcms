<?php if(request()->ajax()){ ?>
{header_meta}
<?php }else{ ?>
{header}
<?php } ?>

<?php _panel();?>
<div class="row">
	<div class="col-lg-8">

		<div class="input-group">
	      <input type="text" class="form-control" id="videoURL" placeholder="Youtube or Vimeo URL ...">
	      <span class="input-group-btn">
	        <button class="btn btn-primary" id="getInfo" type="button">Get Info!</button>
	      </span>
	    </div>
	</div>
	<div class="col-lg-4">
		
		<div class="input-group">
	      <input type="file" class="form-control" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Uploads!</button>
	      </span>
	    </div>
	</div>
</div>
<?php _panel_close();?>

<div class="row">
	<div class="col-lg-8">
		<?php _panel("Video Data");?>
			<div class="row">
				<div class="col-lg-8">
					<div class="input-group">
				      <input type="text" class="form-control" placeholder="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-info" type="button">Search!</button>
				      </span>
				    </div><!-- /input-group -->
				</div>
				<div class="col-lg-4">
					<div class="input-group">
				      <input type="text" class="form-control" placeholder="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button">Create Folder!</button>
				      </span>
				    </div><!-- /input-group -->
				</div>
			</div>
			<div id="info"></div>
			<div class="pages_manager"></div>
			<iframe name="files_manager" id="files_manager" src="<?php admin_url("media/video/manager");?>" style="height: 600px; border: 0; width: 100%;border:1px solid #ddd; padding: 15px;"></iframe>
		<?php _panel_close();?>
	</div>
	<div class="col-lg-4">
		<?php _panel("Tools");?>
			

			<div style="border:1px solid #ddd; min-height: 350px;" id="ToolsImagesPreview">
				<img src="">
			</div>
			<hr>
			<?php formopen(["target" => "files_manager","enctype" => "multipart/form-data","id" => "fileupload", "action" => admin_url("media/video/upload",false)]);?>
			<input type="hidden" name="video_id">
			<label class="btn btn-info btn-file btn-block">
		        Upload Thumnails <input type="file" name="image" data-input-upload-singer="fileupload" style="display: none;">
		    </label>
		    <?php formclose();?>

		    <?php formopen(["target" => "files_manager","id" => "ToolsImagesPreviewText", "action" => admin_url("media/video/edit",false)]);?>
			
			<input type="hidden" name="id">
			<input type="hidden" name="url">
			<input type="hidden" name="url_thumbs" id="url_thumbs">

			Name
			<input type="text" class="form-control" id="video_name" name="name">
			Code
			<input type="text" class="form-control" id="video_id" readonly="" name="code">
			Server
			<select class="form-control" name="classname">
				<option value="youtube">Youtube</option>
				<option class="vimeo">Vimeo</option>
			</select>
			<button class="btn btn-primary">Save</button>
			<?php formclose();?>
		<?php _panel_close();?>
	</div>
</div>



<script type="text/javascript">
	$("[data-input-upload-singer]").on("change", function(){
		var id = $(this).attr("data-input-upload-singer");

		if($("#video_id").val()){
			$("input[name=video_id]").val($("#video_id").val());
			$("#"+id).submit();
		}else{
			alert("Chưa có ID của Video");
		}
	});

	$("#getInfo").on("click", function(){
		var url = $("#videoURL").val();
		$.ajax({
		   url: '<?php admin_url("media/video/info?url=");?>'+url,
		   data: {
		      format: 'json'
		   },
		   error: function() {
		      $('#info').html('<p>An error has occurred</p>');
		   },
		   dataType: 'json',
		   success: function(data) {
		      $("#ToolsImagesPreview img").attr("src",data.thumbnail_url);
		      $("#video_name").val(data.title);
		      $("#video_id").val(data.id);
		      $("#url_thumbs").val(data.thumbnail_url);
		   },
		   type: 'GET'
		});
	});
</script>
<?php if(request()->ajax()){ ?>
{footer_meta}
<?php }else{ ?>
{footer}
<?php } ?>
