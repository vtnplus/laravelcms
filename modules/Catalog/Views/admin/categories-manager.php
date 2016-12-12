{header}

<?php

	$button = '<button class="btn btn-primary" name="news" value="1">Thêm mới</button>';	
if(@$data->id > 0){
	$button .= ' <button class="btn btn-info" name="update" value="1">Cập nhập</button>';
}

$options = @unserialize($data->options);
?>
<div class="row">
	<div class="col-lg-6">
		
			<?php formopen(["class" => "form-vertically"]);?>
			<?php _panel("Contents", true, $button);?>
				<!--Title -->
	            <div class="form-group" data-field="title,input,1,0,0">
	                <label for="inputTitle" class="col-sm-2 control-label"><?php echo lang("posts.content.title");?></label>
	                <div class="col-sm-10">

	                

	                <div class="input-group">
				      <span class="input-group-btn">
				      	<input type="hidden" name="icons" value="<?php echo @$data->icons;?>">
				        <button class="btn btn-default" role="iconpicker"  data-icon="<?php echo @$data->icons;?>" type="button"><i class="glyphicon glyphicon-repeat"></i></button>
				      </span>
				      <input type="text" class="form-control" id="inputTitle" name="title" value="<?php echo data(@$data->title,null);?>">
				    </div><!-- /input-group -->
	                </div>
	            </div>


	           	<!--Title -->
	            <div class="form-group" data-field="title,input,1,0,0">
	                
	                <div class="col-sm-12">
		                <ul class="row">
		                	
		                	<li class="col-xs-4">Background Color <input type="text" class="form-control" id="inputTitle" name="options[bgcolor]" value="<?php echo data(@$options["bgcolor"],null);?>"></li>
		                	<li class="col-xs-4"><?php echo lang("posts.content.pin");?><input type="text" class="form-control"  name="pin" value="<?php echo data(@$data->pin,null);?>"></li>
		                	<li class="col-xs-4">As Router 
		                		<div class="input-group">
							      <span class="input-group-addon">
							        <input type="checkbox" name="asrouter" value="1" aria-label="..." <?php echo (data(@$options["asrouter"]) == 1 ? "checked" : "");?>>
							      </span>
							      <input type="text" class="form-control" aria-label="..." placeholder="Router Prefix">
							    </div><!-- /input-group -->
							</li>
		                </ul>
	                
	                </div>
	            </div>
	        

	           
	            <!--Content -->
            <div class="form-group" data-field="content,input,0,0,1">
                
                <div class="col-sm-12">
					<textarea style="height:300px;" data-editer="tinymce-mini" type="text" class="form-control" id="inputContent" name="content" placeholder="<?php echo lang("posts.content.content_placeholder");?>"><?php echo data(@$data->content,null);?></textarea>

                </div>
            </div>

            <?php _panel_close();?>

           	<?php if($data && view()->exists("admin.seo-panel")){
	            echo view("admin.seo-panel",["data" => $data])->render();
	        }
	        ?>
			<?php formclose();?>
		
	</div>
	<div class="col-lg-6">
		<?php _panel("List Category",true);?>
		<div class="dd" id="sortcategory">
            <?php echo with(new Modules\Catalog\Backend\Content)->getItems($type,0);?>
        </div>
		<?php _panel_close();?>
	</div>
</div>



<script type="text/javascript">
$(function(){

   
    $('#sortcategory').nestable({
            group: 1,
        }).on('change', function(e){
                var list   = e.length ? e : $(e.target);
                var data = window.JSON.stringify(list.nestable('serialize'));
                
                jQuery.ajax({
                     type : "post",
                     dataType : "json",
                     url : "<?php echo admin_url("catalog/content/sort");?>",
                     data : {data:data},
                     success: function(e){
                        
                     }
                });
        });
});
</script>

{footer}