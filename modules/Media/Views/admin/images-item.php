{header_meta}
<style type="text/css">
	body{
		background: transparent;
	}
</style>
<div class="row">
	<?php if($back){ ?>
		<div class="col-lg-1 col-sm-2 col-xs-3">
			<a href="<?php admin_url("media/images/manager");?>?back=1" data-folder="" class="thumbnail syncfolder" style="height: 100px;">
				<h1 class="text-center"><i class="glyphicon glyphicon-option-horizontal"></i></h1>
			</a>
			Back
		</div>
	<?php } ?>
	<?php foreach ($dir as $key => $value) { ?>
		<div class="col-lg-1 col-sm-2 col-xs-3">
			<a href="<?php admin_url("media/images/delete/".$value->id);?>" style="position: absolute; right:20px; font-size: 16px; z-index: 999; top:5px;"><i class="glyphicon glyphicon-remove-sign"></i></a>

			<a href="<?php admin_url("media/images/manager/".$value->paths);?>" data-folder="<?php echo $value->paths;?>" class="thumbnail syncfolder" style="height: 100px;">
				<h1 class="text-center"><i class="glyphicon glyphicon-folder-open "></i></h1>
			</a>
			<p style="white-space: nowrap; overflow: hidden; "><?php echo ucfirst($value->name);?></p>
		</div>
	<?php } ?>


	<!-- File List -->
	<?php foreach ($files as $key => $value) { ?>
		<div class="col-lg-1 col-sm-2 col-xs-3">
				<a href="<?php admin_url("media/images/delete/".$value->id);?>" style="position: absolute; right:20px; font-size: 16px; z-index: 999; top:5px;"><i class="glyphicon glyphicon-remove-sign"></i></a>

			<a  class="thumbnail files" data-id="<?php echo $value->id;?>" data-url="<?php echo base_url();?>/media/images/data/<?php echo ($value->folder ? $value->folder."/" : "").$value->paths;?>" data-name="<?php echo $value->name;?>" data-alt="<?php echo $value->alt;?>" style="height: 100px;" data-id="<?php echo $value->id;?>">
				<img src="<?php echo base_url("contents/uploads/".getAuth()."/images/".($value->folder ? $value->folder."/" : "").$value->thumbs);?>" style="max-width:100%; max-height: 100%;">
			</a>
			<p style="white-space: nowrap;overflow: hidden;"><?php echo basename($value->name);?></p>
		</div>
	<?php } ?>
</div>

<div class="pages_manager">
<?php pages($files);?>
</div>


<script type="text/javascript">
<?php
if(session("error_alert")){
	?>
		alert("<?php echo session("error_alert");?>");
	<?php
}

if(session("success")){
	?>
		parent.$("body").find("#alert").remove();
		parent.$("body").append('<div id="alert" style="max-height:300px; position: absolute;top:100px; right:15px;z-index:99;" class="alert alert-success"><?php echo session("success");?></div>');
		parent.$("body").find("#alert").fadeOut(1500);
	<?php
}


?>
	$(function(){
		parent.$(".pages_manager").html($(".pages_manager").html());
		parent.$(".pages_manager a").attr("target","files_manager");
		$(".pages_manager").remove();
	});
	$(".thumbnail.files").on("click", function(){
		parent.$("#ToolsImagesPreview img").attr("src",$(this).find("img").attr("src").replace('thumnails/',''));
		parent.$("#ToolsImagesPreviewText input[name=name]").val($(this).attr("data-name"));
		parent.$("#ToolsImagesPreviewText input[name=alt]").val($(this).attr("data-alt"));
		parent.$("#ToolsImagesPreviewText input[name=id]").val($(this).attr("data-id"));
		parent.$("#ToolsImagesPreviewText input[name=url]").val($(this).attr("data-url"));
	});

	$(".thumbnail.files").on("dblclick", function(){
		parent.$(".btn-insert").click();
	});

	$("a.syncfolder").on("click",function(){
		
		parent.$("a#syncfolder").attr("href",'<?php admin_url("media/images/sync");?>' + ($(this).attr("data-folder") ? "/"+ $(this).attr("data-folder") : ""));
	});
	<?php
	if($back){
		?>
		parent.$("#btnCreateFolderLabel").css("visibility","hidden");
		<?php
	}else{
		?>
		parent.$("#btnCreateFolderLabel").css("visibility","visible");
		<?php
	}
	?>
</script>
{footer_meta}