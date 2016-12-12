<?php if(request()->ajax() || input("ajax")){ ?>
{header_meta}
<style type="text/css">
	body{
		background: transparent;
	}
</style>
<?php }else{ ?>
{header}

<?php } ?>

<div class="row">
	<div class="col-sm-8">
	<?php formopen(["target" => "files_manager","enctype" => "multipart/form-data","id" => "fileupload", "action" => admin_url("media/images/upload",false)]);?>
		<?php _panel('<div class="row">
				<div class="col-sm-7">
					<div class="input-group">
				      <input type="text" class="form-control" placeholder="Search files...">
				      <span class="input-group-btn">
				        <button class="btn btn-info" type="button">Search!</button>
				      </span>
				    </div><!-- /input-group -->
				</div>
				<div class="col-sm-5">

					<div id="btnCreateFolderLabel">
					<div class="input-group">
				      <input type="text" class="form-control" id="foldername" placeholder="Create Folder...">
				      <span class="input-group-btn">
				        <button class="btn btn-default btnCreateFolder" type="button"><i class="glyphicon glyphicon-ok-sign"></i></button>
				      </span>
				    </div><!-- /input-group -->
				    </div>
				</div>
			</div>
			
			',false,'<label class="btn btn-default btn-file">
        Browse <input type="file" name="image" data-input-upload-singer="fileupload" style="display: none;">
    </label>
    <a href="'.admin_url("media/images/sync",false).'" id="syncfolder" class="btn btn-info" target="files_manager">Sync Database</a>');?>
			
		<?php _panel_close();?>
	<?php formclose();?>
	<?php _panel();?>
			<div class="pages_manager"></div>
			<iframe name="files_manager" id="files_manager" src="<?php admin_url("media/images/manager");?>" style="height: 600px; border: 0; width: 100%;border:1px solid #ddd; padding: 15px;"></iframe>
		<?php _panel_close();?>
	</div>
	<div class="col-sm-4">
		

		<?php _panel("Tools",true);?>
			<?php formopen(["target" => "files_manager","action" => admin_url("media/images/edit",false)]);?>
			<div id="ToolsImagesPreview">
				<img src="<?php echo resources_url_views("images/no-image.png");?>" style="width:100%; max-width:100%;">
			</div>
			<div id="ToolsImagesPreviewText">
				<input type="hidden" name="id">
				<input type="hidden" name="url">
				Name
				<input type="text" class="form-control" name="name">
				Alt
				<input type="text" class="form-control" name="alt">

				Rewrite URL
				<input type="text" class="form-control" name="seo_urls">

				Paths URL
				<input type="text" class="form-control" name="paths">

				<button class="btn btn-primary" type="submit">Save</button>
				<?php if(request()->ajax() || input("ajax")){ ?>
				<button class="btn btn-primary btn-insert" type="button" target="<?php echo input("target");?>">Insert</button>
				<?php } ?>
			</div>
			<?php formclose();?>
		<?php _panel_close();?>

		

	</div>
</div>

<script type="text/javascript">
	$(function(){
		$("[data-input-upload-singer]").on("change", function(){
			var id = $(this).attr("data-input-upload-singer");
			$("#"+id).submit();
		});
		$(".btnCreateFolder").on("click", function(){
			if($("#foldername").val()){
				$("#files_manager").attr("src","<?php admin_url("media/images/createfolder/");?>" + $("#foldername").val());
			}else{
				alert("Enter Folder Name");
				$("#foldername").focus();
			}
		});



		$(".btn-insert").on("click", function(){
			var id = $(this).attr("target");
			var urls = $("#ToolsImagesPreview img").attr("src").replace("http://www."+location.host,'').replace("https://www."+location.host,'').replace("https://"+location.host,'').replace("http://"+location.host,'');

			var title = $("#ToolsImagesPreviewText input[name=alt]").val();
			
			if(id == "gallery"){
				var zthums = parent.$("[data-gallery=<?php echo input("data");?>]");
				var idCount = zthums.find("[data-media]").length;
				var html = '<li class="<?php echo input("size");?> text-center" id="news_'+idCount+'"><a onClick="$(this).parent().remove();" style="position: absolute; right:20px; font-size: 16px; z-index: 999; top:5px;"><i class="glyphicon glyphicon-remove-sign"></i></a><div data-media href="<?php admin_url("media/images?ajax=true&amp;target=gallery&data=zthumbs&singer=news_");?>'+idCount+'" class="thumbnails items"><img src="'+urls+'"></div><input class="url" name="gallery[url][]" value="'+urls+'" type="hidden"> <input class="title" name="gallery[title][]" value="'+title+'" type="hidden"></li>';
				<?php if(input("singer")){
					?>
					parent.$("[data-gallery=<?php echo input("data");?>] #<?php echo input("singer");?> input.url").val(urls);
					parent.$("[data-gallery=<?php echo input("data");?>] #<?php echo input("singer");?> input.title").val(urls);
					parent.$("[data-gallery=<?php echo input("data");?>] #<?php echo input("singer");?> img").attr("src",urls);
					<?php
				}else{
					?>
					zthums.find("li:last-child").before(html);
					parent.$("[data-media]").fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe'
					});
					zthums.find("li div.thumbnails.items").css({"line-height" : zthums.find("li:last-child a").height()+"px"});
					<?php
				}
				?>
				
			}else{
				if(id != "tinymce"){
					//parent.$("#"+id).val($("#ToolsImagesPreviewText input[name=url]").val());
					parent.$("#"+id).val(urls);
				}
				<?php if(input("preview")){ ?>
					parent.$("#<?php echo input("preview");?>").attr("src",urls);
				<?php } ?>
			}
			parent.$.fancybox.close();
		});
		
	});
</script>
<?php if(request()->ajax() || input("ajax")){ ?>
{footer_meta}
<?php }else{ ?>
{footer}
<?php } ?>
