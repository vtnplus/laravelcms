{header}
<?php formopen();?>
<?php _panel();?>
<div class="row">
	<div class="col-lg-2">
		<select class="form-control" onchange="window.location.href='<?php echo admin_url("tools/forms/index");?>/' + this.value;">
			<option>Select</option>
			
		</select>
	</div>
	<div class="col-lg-2">
		<select class="form-control" onchange="window.location.href='<?php echo admin_url("tools/forms/posts");?>/' + this.value;">
			<option>Select</option>
			<?php foreach (config("register.router") as $key => $value) { ?>
				<option value="<?php echo basename($value);?>"><?php echo basename($value);?></option>
			<?php } ?>
		</select>
	</div>
	
	<div class="col-lg-8">
		<select class="form-control"></select>
	</div>

</div>
<?php _panel_close();?>

<?php _panel("Builder FORM ", true,'
	<button class="btn btn-primary">Add Record</button>
');?>
	
	<table class="table">
		<thead>
			<tr>
				<td class="col-xs-10">Code</td>
				<td>Field</td>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><textarea style="height:60px;" class="form-control"></textarea></td>
				
				<td>
				
				<div class="input-group">
			      <span class="input-group-addon">
			        <input type="checkbox" aria-label="...">
			      </span>
			      <input type="text" class="form-control" aria-label="...">
			    </div><!-- /input-group -->

				</td>
			</tr>
		</tbody>
	</table>
<?php _panel_close();?>
<?php formclose();?>
{footer}