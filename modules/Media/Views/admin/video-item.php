{header_meta}
<style type="text/css">
	body{
		background: transparent;
	}
</style>
<div class="row">
	<?php if($back){ ?>
		<div class="col-lg-1 col-sm-2 col-xs-3">
			<a href="<?php admin_url("media/images/manager");?>" data-folder="" class="thumbnail syncfolder" style="height: 100px;">
				<h1 class="text-center"><i class="glyphicon glyphicon-option-horizontal"></i></h1>
			</a>
			Back
		</div>
	<?php } ?>
	<?php foreach ($dir as $key => $value) { ?>
		<div class="col-lg-1 col-sm-2 col-xs-3">
			<a href="<?php admin_url("media/images/manager/".$value->paths);?>" data-folder="<?php echo $value->paths;?>" class="thumbnail syncfolder" style="height: 100px;">
				<h1 class="text-center"><i class="glyphicon glyphicon-folder-open "></i></h1>
			</a>
			<p style="white-space: nowrap; overflow: hidden; "><?php echo ucfirst($value->name);?></p>
		</div>
	<?php } ?>


	<!-- File List -->
	<?php foreach ($files as $key => $value) { ?>
		<div class="col-lg-1 col-sm-2 col-xs-3">
			<a  class="thumbnail files" data-id="<?php echo $value->id;?>" data-url="<?php echo base_url();?>/media/images/video/<?php echo ($value->folder ? $value->folder."/" : "").$value->paths;?>" data-name="<?php echo $value->name;?>" data-thumbs="<?php echo $value->thumbs;?>" data-code="<?php echo $value->code;?>" style="height: 100px;" data-id="<?php echo $value->id;?>">
				<img src="<?php echo base_url("contents/uploads/".getAuth()."/video/".($value->folder ? $value->folder."/" : "").$value->thumbs);?>" style="max-width:100%; max-height: 100%;">
			</a>
			<p style="white-space: nowrap;overflow: hidden;"><?php echo basename($value->name);?></p>
		</div>
	<?php } ?>
</div>

<div class="pages_manager">
<?php pages($files);?>
</div>
<script type="text/javascript">
	$(function(){
		parent.$(".pages_manager").html($(".pages_manager").html());
		parent.$(".pages_manager a").attr("target","files_manager");
		$(".pages_manager").remove();
	});
	$(".thumbnail.files").on("click", function(){
		parent.$("#ToolsImagesPreview img").attr("src",$(this).attr("data-url"));

		parent.$("#ToolsImagesPreviewText input[name=name]").val($(this).attr("data-name"));
		parent.$("#ToolsImagesPreviewText input[name=code]").val($(this).attr("data-code"));
		parent.$("#ToolsImagesPreviewText input[name=id]").val($(this).attr("data-id"));
		parent.$("#ToolsImagesPreviewText input[name=url]").val($(this).attr("data-url"));
		parent.$("#ToolsImagesPreviewText input[name=url_thumbs]").val($(this).attr("data-thumbs"));
		

	});
	$(".syncfolder").on("click",function(){
		parent.$("a#syncfolder").attr("href",'<?php admin_url("media/images/sync");?>' + ($(this).attr("data-folder") ? "/"+ $(this).attr("data-folder") : ""));
	})
</script>
{footer_meta}