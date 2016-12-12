{header}
<?php
$panel_register = config("register.panel.".$data->type);
?>
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
                <?php 
                $contents = config("register.contents.".$data->type.".edit");
                
                if(view()->exists($contents)){
                    echo view($contents, ["data" => $data]);
                }else if( view()->exists("admin.posts.".$data->type."-content")){
                    echo view("admin.posts.".$data->type."-content", ["data" => $data]);
                }else{
                ?>
<textarea style="height:600px;" data-editer="tinymce<?php echo config("site.page_editter");?>" type="text" class="form-control" id="inputContent" name="content" placeholder="<?php echo lang("posts.content.content_placeholder");?>"><?php echo data($data->content,null);?></textarea>
                <?php } ?>
                </div>
            </div>
        <?php _panel_close();?>

        <?php 
        if(view()->exists("admin.posts.".$data->type)){
            echo view("admin.posts.".$data->type, ["data" => $data]);
        }
        ?>


        <?php if(view()->exists("admin.seo-panel")){
            echo view("admin.seo-panel",["data" => $data])->render();
        }
        ?>

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
                
                <div class="col-sm-12 text-center">

                    <div data-media href="<?php admin_url("media/images?ajax=true&amp;target=inputThumbs&preview=ThumbsPreview");?>">
                        <img id="ThumbsPreview" src="<?php echo data($data->thumbs,resources_url_views("images/no-image.png"));?>">
                    </div>

<div class="input-group hide"><input type="text" class="form-control" id="inputThumbs" name="thumbs" value="<?php echo data($data->thumbs,null);?>" placeholder="<?php echo lang("posts.content.thumbs_placeholder");?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbs" class="btn btn-primary" type="button">Select Image!</button></span></div>

                </div>
            </div>

            <?php
            if(config("register.panel.".$data->type.".thumbs") == "gallery" && view()->exists("admin.gallery-panel")){
                ?>
                <div class="col-sm-12">
                <?php
                    echo view("admin.gallery-panel",["data" => $data, 'setGallerySize' => "col-xs-6 col-sm-3"])->render();
                ?>
                </div>
                <?php
                
            }
            ?>
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
            <?php
            ob_start();
            getCatalog($data->type,$data->categories_id,["parent_id" => 0]);
            $catalog = ob_get_contents();
            ob_end_clean();
            if($catalog){
            ?>
    		<!--Categories_id -->
		    <div class="form-group" data-field="categories_id,input,0,0,0">
		        <label for="inputCategories_id" class="col-sm-2 control-label"><?php echo lang("posts.content.categories_id");?></label>
		        <div class="col-sm-10">
                        <select class="form-control selectpicker" id="inputCategories_id" name="categories_id">
		    				<option value="">Not Select</option>
                            <?php echo $catalog;?>
		    			</select>

		    	</div>
		    </div>
            <?php } ?>

            <?php 
            
            if(is_array($panel_register)){
                foreach ($panel_register as $key => $value) {
                    if($key != "thumbs"){
                        if(function_exists($value)){
                            call_user_func($value, $data);
                        }else{
                        ?>
                        <!--Group_id -->
                            <div class="form-group" data-field="group_id,input,0,0,0">
                                <label for="inputGroup_id" class="col-sm-2 control-label"><?php echo $value;?></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="<?php echo $key;?>" value="<?php echo $data->{$key};?>">

                                </div>
                            </div>
                        <?php
                        }
                    }
                }
            }
            ?>
    		

    		<!--Groups_access -->
		    <div class="form-group" data-field="groups_access,input,0,0,0">
		        <label for="inputGroups_access" class="col-sm-2 control-label"><?php echo lang("posts.content.groups_access");?></label>
		        <div class="col-sm-10">
<select class="form-control selectpicker" id="inputGroups_access" name="groups_access">
		    				<option value="">Not Select</option>
                            <?php user_groups($data->groups_access);?>
		    			</select>

		    	</div>
		    </div>
    		
    		
            <!--Tags -->
            <div class="form-group" data-field="tags,input,0,0,0">
                <label for="inputTags" class="col-sm-2 control-label"><?php echo lang("posts.content.tags");?></label>
                <div class="col-sm-10">
<input type="text" class="form-control" id="inputTags" data-role="tagsinput" name="tags" value="<?php echo data($data->tags,null);?>" placeholder="<?php echo lang("posts.content.tags_placeholder");?>">

                </div>
            </div>

    <!--ViewHeader-->
        <?php _panel_close();?>

        

    </div>
</div>

<?php formclose();?>
{footer}