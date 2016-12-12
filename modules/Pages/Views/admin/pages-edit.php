{header}
<?php
$options = @unserialize(@$data->options);
?>

<?php formopen(["class" => "form-vertically"]);?>
<?php _panel('<i class="glyphicon glyphicon-pencil"></i> '.lang("pages.home.edit",false) ." <small> Trang ".data($data->title,null)."</small>",false,'
		<a class="btn btn-default" href="'.admin_url("pages/home",false).'"><i class="glyphicon glyphicon-ok-sign"></i> '.lang("global.cancel",false).'</a> 
		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  '.lang("global.save",false).'</button>
		');?>
<?php _panel_close();?>
<div class="row">
	<div class="col-lg-8">
		<?php _panel();?>
		<!--Title -->
		    <div class="form-group" data-field="title,input,0,0,0">
		        <label for="inputTitle" class="col-sm-2 control-label"><?php echo lang("pages.home.title");?></label>
		        <div class="col-sm-10">
		        <div class="input-group">
<input type="text" class="form-control" id="inputTitle" name="title" value="<?php echo data($data->title,null);?>" placeholder="<?php echo lang("pages.home.title_placeholder");?>">
				<span class="input-group-btn"><button class="btn btn-primary" type="button" onClick="$('#description').toggleClass('hide');">Description!</button></span></div>
		    	</div>
		    </div>
		<!--Description -->
		    <div class="form-group <?php echo (data($data->description,null) ? "" : "hide");?>" id="description" data-field="description,input,0,0,0">
		        <label for="inputDescription" class="col-sm-2 control-label"><?php echo lang("pages.home.description");?></label>
		        <div class="col-sm-10">
<textarea style="height:100px;" type="text" class="form-control" id="inputDescription" name="description" placeholder="<?php echo lang("pages.home.description_placeholder");?>"><?php echo data($data->description,null);?></textarea>

		    	</div>
		    </div>
		
		    <div class="form-group" data-field="content,input,0,0,1">
		        
		        <div class="col-sm-12">
<textarea style="height:650px;" data-editer="tinymce<?php echo config("site.page_editter");?>" type="text" class="form-control" id="inputContent" name="content" placeholder="<?php echo lang("pages.home.content_placeholder");?>"><?php echo data($data->content,null);?></textarea>

		    	</div>

		        
		    </div>
		<?php _panel_close();?>


		<?php if(view()->exists("admin.seo-panel")){
			echo view("admin.seo-panel",["data" => $data])->render();
		}
		?>

		<?php _panel();?>
	    <div class="form-group">
		    <div class="col-sm-12">
		      <a class="btn btn-default" href="<?php admin_url("pages/home");?>"><i class="glyphicon glyphicon-ok-sign"></i> <?php echo lang("global.cancel");?></a> 
		      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo lang("global.save");?></button>
		    </div>
	    </div>
		<?php _panel_close();?>
	</div>







	<div class="col-lg-4">
		<?php _panel("<i class='glyphicon glyphicon-picture'></i> Hình ảnh & Trạng thái",true);?>
			<!--Thumbs -->
		    <div class="form-group" data-field="thumbs,input,0,0,0">
		        <label for="inputThumbs" class="col-sm-2 control-label"><?php echo lang("pages.home.thumbs");?></label>
		        <div class="col-sm-10">
<div class="input-group"><input type="text" class="form-control" id="inputThumbs" name="thumbs" value="<?php echo data($data->thumbs,null);?>" placeholder="<?php echo lang("pages.home.thumbs_placeholder");?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Select Image!</button></span></div>

		    	</div>
		    </div>
    		

    		<!--breadcrumbs -->
		    <div class="form-group" data-field="thumbs,input,0,0,0">
		        <label for="inputThumbs" class="col-sm-2 control-label"><?php echo lang("pages.home.breadcrumbs");?></label>
		        <div class="col-sm-10">
<div class="input-group"><input type="text" class="form-control" id="inputbreadcrumbs" name="options[breadcrumbs]" value="<?php echo data(@$options["breadcrumbs"],null);?>" ><span class="input-group-btn"><button class="btn btn-primary" type="button">Select Image!</button></span></div>

		    	</div>
		    </div>

		    
    		<!--Parent_id -->
		    <div class="form-group" data-field="parent_id,input,0,0,0">
		        <label for="inputParent_id" class="col-sm-2 control-label"><?php echo lang("pages.home.parent_id");?></label>
		        <div class="col-sm-10">
					<select  class="form-control selectpicker" id="inputParent_id" name="parent_id" value="<?php echo data($data->parent_id,null);?>">
						<optgroup label="Trang chính">
							<option value="0">Trang chính</option>
						</optgroup>
						<optgroup label="Trong trang">
						<?php pages_options( $data->parent_id , ["parent_id" => 0], true, $data->id);?>
						</optgroup>
					</select>

		    	</div>
		    </div>
    		

    		<!--Status -->
		    <div class="form-group" data-field="status,input,0,0,0">
		        <label for="inputStatus" class="col-sm-2 control-label"><?php echo lang("pages.home.status");?></label>
		        <div class="col-sm-10">
					<div class="row">
						<div class="col-xs-6">
							<select class="form-control selectpicker" id="inputStatus" name="status" value="<?php echo data($data->status,null);?>">
								<option value="1">Public</option>
								<option value="0">Private</option>
							</select>
						</div>
						<div class="col-xs-6">
							<input type="text" class="form-control" id="inputOrders" name="orders" value="<?php echo data($data->orders,null);?>">
						</div>
					</div>
					

		    	</div>
		    </div>
    		

    		
    		

    		
		<?php _panel_close();?>
		<?php _panel("<i class='glyphicon glyphicon-cog'></i> Tùy chọn nâng cao",true);?>
		<!--sViewHeader-->

    		
    		

    		<!--Redirect_to -->
		    <div class="form-group" data-field="redirect_to,input,0,0,0">
		        <label for="inputRedirect_to" class="col-sm-2 control-label"><?php echo lang("pages.home.redirect_to");?></label>
		        <div class="col-sm-10">
<input type="text" class="form-control" id="inputRedirect_to" name="redirect_to" value="<?php echo data($data->redirect_to,null);?>" placeholder="<?php echo lang("pages.home.redirect_to_placeholder");?>">

		    	</div>
		    </div>
    		

    		<!--Tags -->
		    <div class="form-group" data-field="tags,input,0,0,0">
		        <label for="inputTags" class="col-sm-2 control-label"><?php echo lang("pages.home.tags");?></label>
		        <div class="col-sm-10">
<input type="text" class="form-control" id="inputTags" name="tags" value="<?php echo data($data->tags,null);?>" placeholder="<?php echo lang("pages.home.tags_placeholder");?>">

		    	</div>
		    </div>
    		
		    <!--Display_as -->
		    <div class="form-group" data-field="display_as,input,0,0,0">
		        <label for="inputDisplay_as" class="col-sm-2 control-label"><?php echo lang("pages.home.layout");?></label>
		        <div class="col-sm-10">
						<label class="checkbox-inline"><input type="checkbox" name="options[layout][left]" value="3" <?php echo (data(@$options["layout"]["left"],null) == 3 ? "checked" : "");?>> Left Slidebar</label>
						<label class="checkbox-inline"><input type="checkbox" name="options[layout][right]" value="3" <?php echo (data(@$options["layout"]["right"],null) == 3 ? "checked" : "");?>> Right Slidebar</label>
						<label class="checkbox-inline"><input type="checkbox" name="options[layout][fullcontent]" value="yes" <?php echo (data(@$options["layout"]["fullcontent"],null) == "yes" ? "checked" : "");?>> Full Content</label>
		    	</div>
		    </div>
    		
    		<!--Display_as -->
		    <div class="form-group" data-field="display_as,input,0,0,0">
		        <label for="inputDisplay_as" class="col-sm-2 control-label"><?php echo lang("pages.home.display_as");?></label>
		        <div class="col-sm-10">
						<select class="form-control selectpicker" id="inputDisplay_as" name="display_as">
		    				<option value="pages.php">Default</option>
		    				<?php fetch_fontend_layout($data->display_as);?>
		    			</select>

		    	</div>
		    </div>

		    <div class="display_options"></div>
    		<!--Post_category_allow -->
		    <div class="form-group">
		    	<div class="col-sm-12">
		    		<label class="checkbox-inline"><input type="checkbox" name="as_router" value="1" <?php echo ($data->as_router == 1 ? "checked" : "");?>>As Router</label>
		    	</div>
		    </div>
		    <div>
		    	<div>
			    	<div class="col-sm-4">
			    		<label class="checkbox-inline"><input type="checkbox" name="as_register" value="1" <?php echo ($data->as_register == 1 ? "checked" : "");?>>On Menu</label>
			    	</div>
			    	<div class="col-sm-4">
			    		<label class="checkbox-inline"><input type="checkbox" name="as_register" value="1" <?php echo ($data->as_register == 1 ? "checked" : "");?>>Allow Catalog</label>
			    	</div>
			    	<div class="col-sm-4">
			    		<input type="text" class="form-control" name="as_register" value="<?php echo ($data->as_register == 1 ? "checked" : "");?>" placeholder="Class">
			    	</div>
		    	</div>
		    </div>
 
    		

    		
<!--sViewHeader-->
		<?php _panel_close();?>
	</div>
</div>    		



<?php formclose();?>
<script type="text/javascript">
	$(function(){
		$('[name="display_as"]').on("change", function(){
			optionsDisplay(this.value);
		});
	});
	optionsDisplay("<?php echo $data->display_as;?>");


	function optionsDisplay(files){
		if(files){
		<?php 
		jquery()->setUrl(admin_url("pages/home/options/",false), 'files')
				->setMethod("post")
				->getHtml(".display_options")
				->setSuccess('')
				->ajax("post");
		?>
		}

	}
</script>
{footer}