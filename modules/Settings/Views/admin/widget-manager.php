{header}

<div class="row row-flex">
	

	<div class="col-lg-4 sorttable">
		<?php _panel("Slide Bar Left",true,'<label class="btn btn-default"><input type="checkbox" class="target" value="left" '.(in_array("left", $target) ? "checked" : "").'> Focus Control</label>');?>
		
			<div class="panel-group panel-flat" id="accordionLeft" role="tablist" aria-multiselectable="true">

			  <?php foreach ($object->getWindgetInslidebar("left") as $key => $value) { 
			  	$options = @unserialize($value->content);
			  	?>
			   <div class="panel panel-default" id="item-<?php echo $value->id;?>">
			  <?php formopen(["target" => "savewidgets", "class" => "savedata", "action" => admin_url("settings/widget/edit", false)]);?>
			  <input type="hidden" name="id" value="<?php echo $value->id;?>">

			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordionLeft" href="#collapseLeft<?php echo $value->id;?>" aria-expanded="true" aria-controls="collapseLeft<?php echo $value->id;?>">
			          <span><?php echo $value->title;?></span>
			          
			        </a>
			       
		          	<a class="btn btn-xs btn-default btn-options pull-right"><i class="glyphicon glyphicon-cog"></i></a>
		          		
			      </h4>
			    </div>
			    <div id="collapseLeft<?php echo $value->id;?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingLeft<?php echo $value->id;?>">
			      <div class="panel-body">
			        <ul class="row hide options_panels" style="margin-bottom: 10px;">
			        	<li class="col-xs-8">
			        		<div class="input-group">
						      <span class="input-group-btn">
						      	<input type="hidden" name="icons" value="<?php echo $value->icons;?>">
						        <button class="btn btn-default" role="iconpicker"  data-icon="<?php echo $value->icons;?>" type="button"><i class="glyphicon glyphicon-repeat"></i></button>
						      </span>
						      <input type="text" class="form-control" name="title" value="<?php echo $value->title;?>" placeholder="Title...">
						    </div><!-- /input-group -->
			        	</li>
			        	<li class="col-xs-4">
			        		<select type="" class="form-control selectpicker" name="language">
			        			<option value="">All</option>
			        			<option value="<?php echo config("site.language");?>" <?php echo $value->language == config("site.language") ? "selected" : "";?>>On <?php echo config("site.language");?></option>
			        		</select>
			        	</li>

			        	<li class="col-xs-12" style="margin-bottom: 10px;"></li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2; height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__panel]" value="1" <?php echo (@$options["__panel"] == 1 ? "checked" : "");?>>Show Panel</label>
			        		
			        	</li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2;height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__title]" value="1"  <?php echo (@$options["__title"] == 1 ? "checked" : "");?>>Show Title</label>
			        		
			        	</li>
			        	<li class="col-xs-12">
			        		Chỉ hiển thị trong trang
			        		<select class="form-control selectpicker" multiple="true" name="content[__access_page][]">
			        			<option value="">Tất cả</option>
			        			<?php pages_options(@$options["__access_page"]);?>
			        		</select>
			        	</li>

			        </ul>
			        <?php
			        if(method_exists($value->namespace, "admin")){
			        	with(new $value->namespace)->admin($options);
			        }
			        ?>
			        <hr>
			        <div>
			        	 <button class="btn btn-sm btn-primary" type="submit">Save</button> <a href="<?php admin_url("settings/widget/delete/".$value->id);?>" class="btn btn-danger pull-right btn-sm">Delete</a>
			        </div>
			      </div>
			    </div>
			    <?php formclose();?>
			  </div>
			  
			  <?php } ?>
			</div>


			
		<?php _panel_close();?>




		<!-- customs Widgets -->


		<?php
		$customs = config("register.widgets.left",[]);
		foreach ($customs as $key => $value) {
			
		?>
		<?php _panel($value,true,'<label class="btn btn-default"><input type="checkbox" class="target" value="'.$key.'" '.(in_array($key, $target) ? "checked" : "").'> Focus Control</label>');?>




		<div class="panel-group panel-flat" id="accordionRight" role="tablist" aria-multiselectable="true">

			  <?php foreach ($object->getWindgetInslidebar($key) as $key => $value) { 
			  	$options = @unserialize($value->content);
			  	?>
			  


			  <div class="panel panel-default" id="item-<?php echo $value->id;?>">
			  <?php formopen(["target" => "savewidgets", "class" => "savedata", "action" => admin_url("settings/widget/edit", false)]);?>
			  <input type="hidden" name="id" value="<?php echo $value->id;?>">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordionRight" href="#collapseRight<?php echo $value->id;?>" aria-expanded="true" aria-controls="collapseRight<?php echo $value->id;?>">
			          <span><?php echo $value->title;?></span>
			          
			        </a>
			        <a class="btn btn-xs btn-default btn-options pull-right"><i class="glyphicon glyphicon-cog"></i></a>
			      </h4>
			    </div>
			    <div id="collapseRight<?php echo $value->id;?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingRight<?php echo $value->id;?>">
			      <div class="panel-body">
			        <ul class="row hide options_panels">
			        	<li class="col-xs-8">
			        		<div class="input-group">
						      <span class="input-group-btn">
						      	<input type="hidden" name="icons" value="<?php echo $value->icons;?>">
						         <button class="btn btn-default" role="iconpicker"  data-icon="<?php echo $value->icons;?>" type="button"><i class="glyphicon glyphicon-repeat"></i></button>
						      </span>
						      <input type="text" class="form-control" name="title" value="<?php echo $value->title;?>" placeholder="Title...">
						    </div><!-- /input-group -->
			        	</li>
			        	<li class="col-xs-4">
			        		<select type="" class="form-control selectpicker" name="language">
			        			<option value="">All</option>
			        			<option value="<?php echo config("site.language");?>" <?php echo $value->language == config("site.language") ? "selected" : "";?>>On <?php echo config("site.language");?></option>
			        		</select>
			        	</li>
			        	<li class="col-xs-12" style="margin-bottom: 10px;"></li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2; height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__panel]" value="1" <?php echo (@$options["__panel"] == 1 ? "checked" : "");?>>Show Panel</label>
			        		
			        	</li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2;height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__title]" value="1"  <?php echo (@$options["__title"] == 1 ? "checked" : "");?>>Show Title</label>
			        		
			        	</li>

			        	<li class="col-xs-12">
			        		Chỉ hiển thị trong trang
			        		<select class="form-control selectpicker" multiple="true" name="content[__access_page][]">
			        			<option value="">Tất cả</option>
			        			<?php pages_options(@$options["__access_page"]);?>
			        		</select>
			        	</li>
			        	
			        </ul>

			         <?php
			        if(method_exists($value->namespace, "admin")){
			        	with(new $value->namespace)->admin($options);
			        }
			        ?>

			        <hr>
			        <div>
			        	 <button class="btn btn-sm btn-primary" type="submit">Save</button> <a href="<?php admin_url("settings/widget/delete/".$value->id);?>" class="btn btn-danger pull-right btn-sm">Delete</a>
			        </div>
			      </div>
			    </div>
			    <?php formclose();?>
			  </div>
			  
			  <?php } ?>

			</div>
			
		<?php _panel_close();?>
		<?php } ?>
		<!-- end customs widgets -->

	</div>




	<div class="col-lg-4 x_shadown">

		<?php _panel("Widget Labrary",true);?>
			<div style="min-height: 400px;">
				<ul class="list-group">
					<?php foreach ($data as $key => $value) { ?>
					<li class="list-group-item">
						<?php echo $value["name"];?>
						<span class="badge installwidgets badge-primary" style=" cursor: pointer;" data-classname='<?php echo $key;?>'>Install</span>
					</li>
					<?php } ?>
				</ul>
			</div>
		<?php _panel_close();?>
	</div>


	<div class="col-lg-4 sorttable">
		<?php _panel("Slide Bar Right",true,'<label class="btn btn-default"><input type="checkbox" class="target" value="right" '.(in_array("right", $target) ? "checked" : "").'> Focus Control</label>');?>




		<div class="panel-group panel-flat" id="accordionRight" role="tablist" aria-multiselectable="true">

			  <?php foreach ($object->getWindgetInslidebar("right") as $key => $value) { 
			  	$options = @unserialize($value->content);
			  	?>
			  


			  <div class="panel panel-default" id="item-<?php echo $value->id;?>">
			  <?php formopen(["target" => "savewidgets", "class" => "savedata", "action" => admin_url("settings/widget/edit", false)]);?>
			  <input type="hidden" name="id" value="<?php echo $value->id;?>">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordionRight" href="#collapseRight<?php echo $value->id;?>" aria-expanded="true" aria-controls="collapseRight<?php echo $value->id;?>">
			          <span><?php echo $value->title;?></span>
			          
			        </a>
			        <a class="btn btn-xs btn-default btn-options pull-right"><i class="glyphicon glyphicon-cog"></i></a>
			      </h4>
			    </div>
			    <div id="collapseRight<?php echo $value->id;?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingRight<?php echo $value->id;?>">
			      <div class="panel-body">
			        <ul class="row hide options_panels">
			        	<li class="col-xs-8">
			        		<div class="input-group">
						      <span class="input-group-btn">
						      	<input type="hidden" name="icons" value="<?php echo $value->icons;?>">
						         <button class="btn btn-default" role="iconpicker"  data-icon="<?php echo $value->icons;?>" type="button"><i class="glyphicon glyphicon-repeat"></i></button>
						      </span>
						      <input type="text" class="form-control" name="title" value="<?php echo $value->title;?>" placeholder="Title...">
						    </div><!-- /input-group -->
			        	</li>
			        	<li class="col-xs-4">
			        		<select type="" class="form-control selectpicker" name="language">
			        			<option value="">All</option>
			        			<option value="<?php echo config("site.language");?>" <?php echo $value->language == config("site.language") ? "selected" : "";?>>On <?php echo config("site.language");?></option>
			        		</select>
			        	</li>
			        	<li class="col-xs-12" style="margin-bottom: 10px;"></li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2; height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__panel]" value="1" <?php echo (@$options["__panel"] == 1 ? "checked" : "");?>>Show Panel</label>
			        		
			        	</li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2;height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__title]" value="1"  <?php echo (@$options["__title"] == 1 ? "checked" : "");?>>Show Title</label>
			        		
			        	</li>

			        	<li class="col-xs-12">
			        		Chỉ hiển thị trong trang
			        		<select class="form-control selectpicker" multiple="true" name="content[__access_page][]">
			        			<option value="">Tất cả</option>
			        			<?php pages_options(@$options["__access_page"]);?>
			        		</select>
			        	</li>
			        	
			        </ul>

			         <?php
			        if(method_exists($value->namespace, "admin")){
			        	with(new $value->namespace)->admin($options);
			        }
			        ?>

			        <hr>
			        <div>
			        	 <button class="btn btn-sm btn-primary" type="submit">Save</button> <a href="<?php admin_url("settings/widget/delete/".$value->id);?>" class="btn btn-danger pull-right btn-sm">Delete</a>
			        </div>
			      </div>
			    </div>
			    <?php formclose();?>
			  </div>
			  
			  <?php } ?>

			</div>
			
		<?php _panel_close();?>


		<!-- customs Widgets -->


		<?php
		$customs = config("register.widgets.right",[]);
		foreach ($customs as $key => $value) {
			
		?>
		<?php _panel($value,true,'<label class="btn btn-default"><input type="checkbox" class="target" value="'.$key.'" '.(in_array($key, $target) ? "checked" : "").'> Focus Control</label>');?>




		<div class="panel-group panel-flat" id="accordionRight" role="tablist" aria-multiselectable="true">

			  <?php foreach ($object->getWindgetInslidebar($key) as $key => $value) { 
			  	$options = @unserialize($value->content);
			  	?>
			  


			  <div class="panel panel-default" id="item-<?php echo $value->id;?>">
			  <?php formopen(["target" => "savewidgets", "class" => "savedata", "action" => admin_url("settings/widget/edit", false)]);?>
			  <input type="hidden" name="id" value="<?php echo $value->id;?>">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordionRight" href="#collapseRight<?php echo $value->id;?>" aria-expanded="true" aria-controls="collapseRight<?php echo $value->id;?>">
			          <span><?php echo $value->title;?></span>
			          
			        </a>
			        <a class="btn btn-xs btn-default btn-options pull-right"><i class="glyphicon glyphicon-cog"></i></a>
			      </h4>
			    </div>
			    <div id="collapseRight<?php echo $value->id;?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingRight<?php echo $value->id;?>">
			      <div class="panel-body">
			        <ul class="row hide options_panels">
			        	<li class="col-xs-8">
			        		<div class="input-group">
						      <span class="input-group-btn">
						      	<input type="hidden" name="icons" value="<?php echo $value->icons;?>">
						         <button class="btn btn-default" role="iconpicker"  data-icon="<?php echo $value->icons;?>" type="button"><i class="glyphicon glyphicon-repeat"></i></button>
						      </span>
						      <input type="text" class="form-control" name="title" value="<?php echo $value->title;?>" placeholder="Title...">
						    </div><!-- /input-group -->
			        	</li>
			        	<li class="col-xs-4">
			        		<select type="" class="form-control selectpicker" name="language">
			        			<option value="">All</option>
			        			<option value="<?php echo config("site.language");?>" <?php echo $value->language == config("site.language") ? "selected" : "";?>>On <?php echo config("site.language");?></option>
			        		</select>
			        	</li>
			        	<li class="col-xs-12" style="margin-bottom: 10px;"></li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2; height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__panel]" value="1" <?php echo (@$options["__panel"] == 1 ? "checked" : "");?>>Show Panel</label>
			        		
			        	</li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2;height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__title]" value="1"  <?php echo (@$options["__title"] == 1 ? "checked" : "");?>>Show Title</label>
			        		
			        	</li>

			        	<li class="col-xs-12">
			        		Chỉ hiển thị trong trang
			        		<select class="form-control selectpicker" multiple="true" name="content[__access_page][]">
			        			<option value="">Tất cả</option>
			        			<?php pages_options(@$options["__access_page"]);?>
			        		</select>
			        	</li>
			        	
			        </ul>

			         <?php
			        if(method_exists($value->namespace, "admin")){
			        	with(new $value->namespace)->admin($options);
			        }
			        ?>

			        <hr>
			        <div>
			        	 <button class="btn btn-sm btn-primary" type="submit">Save</button> <a href="<?php admin_url("settings/widget/delete/".$value->id);?>" class="btn btn-danger pull-right btn-sm">Delete</a>
			        </div>
			      </div>
			    </div>
			    <?php formclose();?>
			  </div>
			  
			  <?php } ?>

			</div>
			
		<?php _panel_close();?>
		<?php } ?>
		<!-- end customs widgets -->
	</div>
</div>

<?php _panel("Slide Bar Footer",true,'<label class="btn btn-default"><input type="checkbox" class="target" value="footer" '.(in_array("footer", $target) ? "checked" : "").'> Focus Control</label>');?>

<ul class="row" id="widgetsSort">
	

<?php foreach ($object->getWindgetInslidebar("footer") as $key => $value) { 
$options = '';
$options = @unserialize($value->content);
$sizeFF = data(@$options["sizeRows"]["lg"],"col-lg-3")." ". data(@$options["sizeRows"]["sm"],"col-sm-3")." ". data(@$options["sizeRows"]["xs"],"col-xs-3");
?>
<li class="<?php echo $sizeFF;?>" id="item-<?php echo $value->id;?>">
<div class="panel-group panel-flat" id="accordion" role="tablist" aria-multiselectable="true">

			  <?php formopen(["target" => "savewidgets", "class" => "savedata", "action" => admin_url("settings/widget/edit", false)]);?>
			    <input type="hidden" name="id" value="<?php echo $value->id;?>">
			  
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			       <span><?php echo $value->title;?></span>
			       <a class="btn btn-xs btn-default btn-options pull-right" role="button"><i class="glyphicon glyphicon-cog"></i></a>
		          		
		          		
			      </h4>
			    </div>
			    <div id="collapse<?php echo $value->id;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $value->id;?>">
			      <div class="panel-body">
			      	
			        <ul class="row options_panels hide" style="margin-bottom: 10px;">

			        	<li class="col-xs-8">
			        		<div class="input-group">
						      <span class="input-group-btn">
						      	<input type="hidden" name="icons" value="<?php echo $value->icons;?>">
						        <button class="btn btn-default" role="iconpicker"  data-icon="<?php echo $value->icons;?>" type="button"><i class="glyphicon glyphicon-repeat"></i></button>
						      </span>
						      <input type="text" class="form-control" name="title" value="<?php echo $value->title;?>" placeholder="Title...">
						    </div><!-- /input-group -->
			        	</li>

			        	<li class="col-xs-4">
			        		<select type="" class="form-control selectpicker" name="language">
			        			<option value="">All</option>
			        			<option value="<?php echo config("site.language");?>" <?php echo $value->language == config("site.language") ? "selected" : "";?>>On <?php echo config("site.language");?></option>
			        		</select>
			        	</li>
			        	<li class="col-xs-12" style="margin-bottom: 10px;"></li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2; height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__panel]" value="1" <?php echo (@$options["__panel"] == 1 ? "checked" : "");?>>Show Panel</label>
			        		
			        	</li>
			        	<li class="col-xs-6" style="background-color: #f2f2f2;height: 30px;">
			        		<label class="checkbox-inline"><input type="checkbox" name="content[__title]" value="1"  <?php echo (@$options["__title"] == 1 ? "checked" : "");?>>Show Title</label>
			        		
			        	</li>

			        	<li class="col-xs-12" style="margin-bottom: 10px;"></li>

			        	<li class="col-xs-4">
			        		Destop
			        		<select type="" class="form-control selectpicker" name="content[sizeRows][lg]">
			        			<?php for ($i=2; $i < 13; $i++) {  ?>
			        				<option value="col-lg-<?php echo $i;?>" <?php echo (data(@$options["sizeRows"]["lg"],"col-lg-3") == "col-lg-".$i ? "selected" : "");?>>col-lg-<?php echo $i;?></option>
			        			<?php } ?>
			        		</select>
			        	</li>


			        	<li class="col-xs-4">
			        		Tablet
			        		<select type="" class="form-control selectpicker" name="content[sizeRows][sm]">
			        			<?php for ($i=2; $i < 13; $i++) {  ?>
			        				<option value="col-sm-<?php echo $i;?>" <?php echo (data(@$options["sizeRows"]["sm"],"col-sm-6") == "col-sm-".$i ? "selected" : "");?>>col-sm-<?php echo $i;?></option>
			        			<?php } ?>
			        		</select>
			        	</li>

			        	<li class="col-xs-4">
			        		Mobile
			        		<select type="" class="form-control selectpicker" name="content[sizeRows][xs]">
			        			<?php for ($i=2; $i < 13; $i++) {  ?>
			        				<option value="col-xs-<?php echo $i;?>" <?php echo (data(@$options["sizeRows"]["xs"],"col-xs-12") == "col-xs-".$i ? "selected" : "");?>>col-xs-<?php echo $i;?></option>
			        			<?php } ?>
			        		</select>
			        	</li>

			        	

			        </ul>
			        <?php
			        if(method_exists($value->namespace, "admin")){
			        	with(new $value->namespace)->admin($options);
			        }
			        ?>
			        <hr>
			        <div>
			        	 <button class="btn btn-sm btn-primary" type="submit">Save</button> <a href="<?php admin_url("settings/widget/delete/".$value->id);?>" class="btn btn-danger pull-right btn-sm">Delete</a>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			 <?php formclose();?>
			</div>
	</li>
 <?php } ?>
 </ul>
<?php _panel_close();?>
<iframe src="" id="savewidgets" name="savewidgets" style="border: 0; width: 1px; height: 1px; position: absolute; z-index: -1;"></iframe>
<script type="text/javascript">
	


	$(function(){
		$('#widgetsSort').sortable({
	    	
		    update: function (event, ui) {
		    	var data = $(this).sortable('serialize');
		    	$.ajax({
		            data: data,
		            type: 'POST',
		            url: '<?php echo admin_url("settings/widget/sorts",false);?>'
		        });
		    }
		});
		$('.sorttable .panel-flat').sortable({
	    	axis: 'y',
		    update: function (event, ui) {
		    	var data = $(this).sortable('serialize');
		    	$.ajax({
		            data: data,
		            type: 'POST',
		            url: '<?php echo admin_url("settings/widget/sorts",false);?>'
		        });
		    }
		});
		$("form.savedata").submit(function(){
			$(this).find("h4.panel-title span").html($(this).find('input[name=title]').val());
		});
		$(".btn-options").on("click", function(){
			var parents = $(this).parent().parent().parent().find(".options_panels").toggleClass("hide");
		});

		$(".installwidgets").on("click", function(){
			var target = "";
			$("input.target").each(function(){
				if($(this).prop('checked')){
					target += $(this).val()+"|";
				}
			});
			window.location.href= '<?php echo admin_url("settings/widget/install");?>?name=' + $(this).attr("data-classname") + '&target=' + target;
		});
	});
</script>
<style type="text/css">
	.badge-primary:hover{
		background-color: red;
	}
</style>
{footer}