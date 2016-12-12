{header}

<?php formopen(["class" => "form-vertically"]);?>
<?php _panel('<i class="glyphicon glyphicon-pencil"></i> '.lang("posts.content.edit",false),false,'
		<a class="btn btn-default" href="'.admin_url("posts/content/manager/".$data->type,false).'"><i class="glyphicon glyphicon-remove-sign"></i> '.lang("global.cancel",false).'</a> 
		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  '.lang("global.save",false).'</button>
		');?>
<?php _panel_close();?>
<div class="row">
    <div class="col-lg-8">
        <?php _panel();?>

        

            <!--Title -->
            <div class="form-group" data-field="title,input,1,0,0">
                <label for="inputTitle" class="col-sm-2 control-label"><?php echo lang("posts.content.title");?></label>
                <div class="col-sm-10">

                <div class="input-group">
                    <input type="text" class="form-control" id="inputTitle" name="title" value="<?php echo data($data->title,null);?>" placeholder="<?php echo lang("posts.content.title_placeholder");?>">
                    <span class="input-group-btn"><button class="btn btn-primary" type="button" onClick="$('#description').toggleClass('hide');">Description!</button></span>
                </div>


                </div>
            </div>
            

            <!--Description -->
            <div class="form-group <?php echo (data($data->description,null) ? "" : "hide");?>" id="description" data-field="description,input,0,0,0">
                <label for="inputDescription" class="col-sm-2 control-label"><?php echo lang("posts.content.description");?></label>
                <div class="col-sm-10">
<input type="text" class="form-control" id="inputDescription" name="description" value="<?php echo data($data->description,null);?>" placeholder="<?php echo lang("posts.content.description_placeholder");?>">

                </div>
            </div>
            

            <!--Content -->
            <div class="form-group" data-field="content,input,0,0,1">
                
                <div class="col-sm-12">
<textarea style="height:600px;" data-editer="tinymce" type="text" class="form-control" id="inputContent" name="content" placeholder="<?php echo lang("posts.content.content_placeholder");?>"><?php echo data($data->content,null);?></textarea>

                </div>
            </div>
        <?php _panel_close();?>

        <?php _panel();?>
            <div class="form-group">
                <div class="col-sm-12">
                  <a class="btn btn-default" href="<?php admin_url("posts/content/manager/".$data->type);?>"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo lang("global.cancel");?></a> 
                  <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo lang("global.save");?></button>
                </div>
            </div>
        <?php _panel_close();?>

    </div>
    <div class="col-lg-4">
        <?php _panel("Images",true);?>
        <!--Thumbs -->
            <div class="form-group" data-field="thumbs,input,0,0,0">
                <label for="inputThumbs" class="col-sm-2 control-label"><?php echo lang("posts.content.thumbs");?></label>
                <div class="col-sm-10">
<div class="input-group"><input type="text" class="form-control" id="inputThumbs" name="thumbs" value="<?php echo data($data->thumbs,null);?>" placeholder="<?php echo lang("posts.content.thumbs_placeholder");?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbs" class="btn btn-primary" type="button">Select Image!</button></span></div>

                </div>
            </div>

            <!--Status -->
            <div class="form-group" data-field="status,input,0,0,0">
                <label for="inputStatus" class="col-sm-2 control-label"><?php echo lang("posts.content.status");?></label>
                <div class="col-sm-10">
                    <select class="form-control selectpicker" id="inputStatus" name="status" value="<?php echo data($data->status,null);?>">
                        <option value="1">Public</option>
                        <option value="0">Private</option>
                    </select>

                </div>
            </div>

        <?php _panel_close();?>
        <?php _panel("Options",true);?>
<!--ViewHeader-->

    		<!--Categories_id -->
		    <div class="form-group" data-field="categories_id,input,0,0,0">
		        <label for="inputCategories_id" class="col-sm-2 control-label"><?php echo lang("posts.content.categories_id");?></label>
		        <div class="col-sm-10">
<select class="form-control selectpicker" id="inputCategories_id" name="categories_id">
		    				<option value="<?php echo data($data->categories_id,null);?>"><?php echo data($data->categories_id,null);?></option>
		    			</select>

		    	</div>
		    </div>

    		<!--Group_id -->
		    <div class="form-group" data-field="group_id,input,0,0,0">
		        <label for="inputGroup_id" class="col-sm-2 control-label"><?php echo lang("posts.content.group_id");?></label>
		        <div class="col-sm-10">
<select class="form-control selectpicker" id="inputGroup_id" name="group_id">
		    				<option value="<?php echo data($data->group_id,null);?>"><?php echo data($data->group_id,null);?></option>
		    			</select>

		    	</div>
		    </div>
    		

    		<!--Groups_access -->
		    <div class="form-group" data-field="groups_access,input,0,0,0">
		        <label for="inputGroups_access" class="col-sm-2 control-label"><?php echo lang("posts.content.groups_access");?></label>
		        <div class="col-sm-10">
<select class="form-control selectpicker" id="inputGroups_access" name="groups_access">
		    				<option value="<?php echo data($data->groups_access,null);?>"><?php echo data($data->groups_access,null);?></option>
		    			</select>

		    	</div>
		    </div>
    		
    		
    <!--ViewHeader-->
        <?php _panel_close();?>

        <?php _panel("Seo Options");?>
        <!--Seo_urls -->
            <div class="form-group" data-field="seo_urls,input,0,0,0">
                <label for="inputSeo_urls" class="col-sm-2 control-label"><?php echo lang("posts.content.seo_urls");?></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputSeo_urls" name="seo_urls" value="<?php echo data($data->seo_urls,null);?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Render!</button></span>
                    </div>
                </div>
            </div>

            <!--Tags -->
            <div class="form-group" data-field="tags,input,0,0,0">
                <label for="inputTags" class="col-sm-2 control-label"><?php echo lang("posts.content.tags");?></label>
                <div class="col-sm-10">
<input type="text" class="form-control" id="inputTags" name="tags" value="<?php echo data($data->tags,null);?>" placeholder="<?php echo lang("posts.content.tags_placeholder");?>">

                </div>
            </div>

        <?php _panel_close();?>

    </div>
</div>

<?php formclose();?>
{footer}