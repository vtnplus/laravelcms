<div style="overflow-x: hidden;">
<?php formopen(["action" => admin_url("posts/content/edit/".$data->type."/".$data->id, false)]);?>
<ul class="row">
	<li class="col-xs-12 col-sm-3">
		
		<div class="input-group">
	      <input type="text" up-data="title" class="form-control" name="title" value="<?php echo $data->title;?>">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button" onClick="$('#description').toggleClass('hide');">Desc!</button>
	      </span>
	    </div>
	</li>

	<li class="col-xs-12 col-sm-3">
		<div class="input-group"><input type="text" class="form-control" id="inputThumbs" up-data="image" up-format="src" name="thumbs" value="<?php echo data($data->thumbs,null);?>" placeholder="<?php echo lang("posts.content.thumbs_placeholder");?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbs" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-picture"></i></button></span></div>
	</li>

	<li class="col-xs-12 col-sm-3">
		<input type="text" class="form-control" name="seo_urls" value="<?php echo $data->seo_urls;?>">
	</li>

	<?php
            ob_start();
            getCatalog($data->type,$data->categories_id,["parent_id" => 0]);
            $catalog = ob_get_contents();
            ob_end_clean();
            if($catalog){
            ?>
	<li class="col-xs-12 col-sm-3">
		<select type="text" class="form-control" name="categories_id" value="<?php echo $data->categories_id;?>">
			<option value="">Not Select</option>
            <?php echo $catalog;?>
		</select>
	</li>
	<?php } ?>
	<li class="col-xs-12 hide" id="description" style="padding-top:10px;">
		<textarea type="text" class="form-control" name="description"><?php echo $data->description;?></textarea>
	</li>

	<?php 
    $panel_register = config("register.panel.".$data->type);
    if(is_array($panel_register)){
        foreach ($panel_register as $key => $value) {
            if($key != "thumbs"){
            	?>
            	 <li class="col-xs-12 col-sm-3 form-vertically" style="padding-left: 0; padding-right: 0;">
            	<?php
                if(function_exists($value)){
                    call_user_func($value, $data);
                }else{
                ?>
               
					<input class="form-control" type="text" name="<?php echo $key;?>" value="<?php echo $data->{$key};?>">
				
                
                <?php
                }
                ?>
                </li>
                <?php
            }
        }
    }
    ?>
</ul>
<hr>
<button class="btn btn-primary btn-save-quit" type="button" data-save-quit>Update</button> <button class="btn btn-info" type="button" onclick='$("#hookEdit").remove();'>Close</button>
<?php formclose();?>
</div>
<script type="text/javascript">
	$(function(){
		$('.selectpicker').selectpicker({
		  size: 8,
		  iconBase : "",
		});
		if (typeof $.fn.priceFormat !== 'undefined') {
			$('[name=prices], input.prices, [data-prices]').priceFormat({
				prefix : '',
				centsLimit : 0,
				

			});


			$("form").submit(function(){
				$('[name=prices], input.prices, [data-prices]').each(function(){
					var inputs = $(this).unmask();
					$(this).val(inputs);
				});
				
			});
		}
	});
</script>