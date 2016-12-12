{header}
<?php formopen(["class" => "form-vertically"]);?>
<div class="row">
	<div class="col-lg-8">
		<?php _panel();?>
		<!--Title -->
            <div class="form-group" data-field="title,input,1,0,0">
                <label for="inputTitle" class="col-sm-2 control-label"><?php echo lang("stores.email.subject");?></label>
                <div class="col-sm-10">

                <input type="text" class="form-control" id="inputTitle" name="subject" value="<?php echo data($data->subject,null);?>">


                </div>
            </div>
            

          

            <!--Content -->
            <div class="form-group" data-field="content,input,0,0,1">
                
                <div class="col-sm-12">
<textarea style="height:600px;" data-editer="tinymce" type="text" class="form-control" id="inputContent" name="content" placeholder="<?php echo lang("posts.content.content_placeholder");?>"><?php echo data($data->content,null);?></textarea>

                </div>
            </div>

		<?php _panel_close();?>
	</div>
	<div class="col-lg-4">
		<?php _panel("Options",true,'<a class="btn btn-default" href="'.admin_url("stores/email/manager/".$data->type,false).'"><i class="glyphicon glyphicon-remove-sign"></i> '.lang("global.cancel",false).'</a> 
		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  '.lang("global.save",false).'</button>');?>


            <div class="form-group" data-field="title,input,1,0,0">
                <label for="inputTitle" class="col-sm-2 control-label"><?php echo lang("stores.email.keyword");?></label>
                <div class="col-sm-10">

                <input type="text" class="form-control" id="inputTitle" name="keyword" value="<?php echo data($data->keyword,null);?>">


                </div>
            </div>

            <div class="form-group" data-field="title,input,1,0,0">
                <label for="inputTitle" class="col-sm-2 control-label"><?php echo lang("stores.email.layout");?></label>
                <div class="col-sm-10">

                <select type="text" class="form-control selectpicker" name="layout">
                    <optgroup label="Default">
                        <option value="">Default</option>
                    </optgroup>
                    <optgroup label="Customs Layout">
                        <?php fetch_files_layout(base_path("contents/resources/views/mails/*.php"),data($data->layout,null));?>
                    </optgroup>
                </select>


                </div>
            </div>
           


		<?php _panel_close();?>
	</div>
</div>
<?php formclose();?>
{footer}