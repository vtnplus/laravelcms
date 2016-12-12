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


<?php _panel("List Panel Design",true,'<a href="'.str_replace('index','editcontrol',app("request")->url()).'" class="btn btn-primary">Edit Controller</a>');?>

	<table class="table table-sort" id="sortable">
	<tr>
		<?php 

		foreach ($rfech as $key => $value) { ?>
			
		
			<td >
			<div class="btn btn-sm btn-info btn-block" style="cursor: move; margin-bottom: 15px;" data-toggle="tooltip" data-placement="top" title="On Drap">
				<?php echo $key;?>
				<input type="hidden" name="field[]" value="<?php echo $key;?>">
			</div>

			<select class="form-control" name="format[]">
				<option value="<?php echo $value[0];?>"><?php echo $value[0];?></option>
				<option value="datetime">Datetime</option>
				<option value="text">Text</option>
				<option value="on_off">On/Off</option>
			</select>

			<select class="form-control" name="align[]" style="margin-top:15px;">
				<option class="left" <?php echo (strtolower($value[1]) == "left" ? "selected" : "");?>>Left</option>
				<option class="center" <?php echo (strtolower($value[1]) == "center" ? "selected" : "");?>>Center</option>
				<option class="right" <?php echo (strtolower($value[1]) == "right" ? "selected" : "");?>>Right</option>
			</select>
			<hr>
			<label class="checkbox-inline"> <input type="checkbox" name="search[]" value="<?php echo $key;?>" checked="true">Search</label><br>
			<label class="checkbox-inline"> <input type="checkbox" name="sort[]" value="<?php echo $key;?>">Sort</label>
			<hr>
			<button class="btn btn-danger btn-xs btn-block" onclick="$(this).parent().remove();">Remove</button></td>
		
		<?php } ?>
		</tr>
	</table>
	
<?php _panel_close();?>

<?php _panel();?>

	<button class='btn btn-primary' type="submit">Save</button>
<?php _panel_close();?>
<?php formclose();?>

  <script>
  $( function() {
    $( "#sortable" ).sortable({items: "td"});
    
  } );
  </script>

{footer}