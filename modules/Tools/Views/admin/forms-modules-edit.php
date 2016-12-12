{header}

<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel();?>
<div class="row">
	<div class="col-lg-2">
		<select class="form-control" onchange="window.location.href='<?php echo admin_url("tools/forms/index");?>/' + this.value;">
			<option>Select</option>
			<?php foreach ($folders_loca as $key => $value) { ?>
				<option value="<?php echo basename($value);?>" <?php echo ($select_f == basename($value) ? "selected" : "");?>><?php echo basename($value);?></option>
			<?php } ?>
		</select>
	</div>
	<div class="col-lg-2">
		<select class="form-control" onchange="window.location.href='<?php echo admin_url("tools/forms/index/".$select_f);?>/' + this.value;">
			<option>Select</option>
			<?php foreach ($module_local as $key => $value) { ?>
				<option value="<?php echo basename($value);?>" <?php echo ($select_c == basename($value) ? "selected" : "");?>><?php echo basename($value);?></option>
			<?php } ?>
		</select>
	</div>
	
	<div class="col-lg-8">
		<select class="form-control"></select>
	</div>

</div>
<?php _panel_close();?>


<?php _panel("List Panel Design",true,'<input type="checkbox" value="form-vertically" name="formformat"> Form Vertically <a href="'.str_replace('editcontrol','index',app("request")->url()).'" class="btn btn-primary">Edit Controller</a>');?>
	<div id="sortable">
	<?php
		foreach ($rfech as $key => $value) {
			?>
			<div class="form-group" data-field="language,input,requice">
		        <label for="inputLanguage" class="col-sm-2 control-label"><?php echo ucfirst($key);?></label>
		        
			    <div class="col-sm-2">
			    	<input type="hidden" name="field[]" value="<?php echo $key;?>">
			        <select type="text" class="form-control" id="inputLanguage" name="format[<?php echo $key;?>]">
			        	<option value="">None</option>
			        	<option value="label">Label</option>
			        	<option value="text">Text</option>
			        	<option value="textarea">Textarea</option>
			        	<option value="number">Number</option>
			        	<option value="date">Date</option>
			        	<option value="icons">Icons</option>
			        	<option value="email">Email</option>
			        	<option value="password">Password</option>
			        	<option value="images">Images</option>
			        	<option value="video">Video</option>
			        	<option value="select">Select</option>
			        	<option value="checkbox">Checkbox</option>
			        	<option value="radio">Radio</option>
			        </select>
			    </div>
			    <div class="col-sm-7">
			    	<label class="checkbox-inline"><input type="checkbox" name="requice[<?php echo $key;?>]" value="1"> Requice</label>
			    	<label class="checkbox-inline"><input type="checkbox" name="editer[<?php echo $key;?>]" value="1"> Editer</label>
			    	<label class="checkbox-inline"><input type="checkbox" name="helper[<?php echo $key;?>]" value="1"> Helper</label>
			    </div>
			    <div class="col-sm-1">
			    	<button class="btn btn-primary" onclick="$(this).parent().parent().remove();">Remove</button>
			    </div>
		    </div>
			<?php
		}
	?>
	</div>

<?php _panel_close();?>

<?php _panel();?>

	<button class='btn btn-primary' type="submit">Save</button>
<?php _panel_close();?>
<?php formclose();?>

  <script>
  $( function() {
    $( "#sortable" ).sortable({items: "div.form-group"});
    
  } );
  </script>

{footer}