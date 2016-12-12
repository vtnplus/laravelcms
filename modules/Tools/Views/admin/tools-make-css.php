{header}
<?php formopen();?>
<?php _panel("CSS Tools Mini Builder", true);?>
<div class="row">
	<div class="col-xs-8" style="margin-bottom: 30px;">
		<input type="text" class="form-control" name="">
	</div>
	<div class="col-xs-2" style="margin-bottom: 30px;">
		<select type="text" class="form-control" name="type">
			<option value="brand">Brand</option>
			<option value="size">Size</option>
		</select>
	</div>
	<div class="col-xs-2" style="margin-bottom: 30px;">
		<button type="text" class="btn btn-primary btn-block" name="">Gender</button>
	</div>
	<div class="col-xs-4">
		Zoom
		<textarea type="text" style="height:400px;" class="form-control" name="zoom"><?php echo input("zoom");?></textarea>
	</div>
	<div class="col-xs-8">
		Extract
		<textarea type="text" style="height:400px;" class="form-control" name=""><?php echo @$code;?></textarea>
	</div>
	<div class="col-xs-12">
		<hr>
		Sample
		<div class="row">
			<div class="col-xs-2">
				<!-- Standard button -->
				<button type="button" class="btn btn-default btn-block">Default</button>
			</div>
			<div class="col-xs-2">
				<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
				<button type="button" class="btn btn-primary btn-block">Primary</button>
			</div>
			<div class="col-xs-2">
				<!-- Indicates a successful or positive action -->
				<button type="button" class="btn btn-success btn-block">Success</button>
			</div>
			<div class="col-xs-2">
				<!-- Contextual button for informational alert messages -->
				<button type="button" class="btn btn-info btn-block">Info</button>
			</div>
			<div class="col-xs-2">
				<!-- Indicates caution should be taken with this action -->
				<button type="button" class="btn btn-warning btn-block">Warning</button>
			</div>
			<div class="col-xs-2">
				<!-- Indicates a dangerous or potentially negative action -->
				<button type="button" class="btn btn-danger btn-block">Danger</button>
			</div>
		</div>
		Color Brand
		<div class="row">
			<div class="col-xs-2">
				<!-- Standard button -->
				<input type="text" class="form-control" name="brandColor[default]" value="#FFF">
			</div>
			<div class="col-xs-2">
				<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
				<input type="text" class="form-control" name="brandColor[primary]" value="#337ab7">
			</div>
			<div class="col-xs-2">
				<!-- Indicates a successful or positive action -->
				<input type="text" class="form-control" name="brandColor[success]" value="#5cb85c">
			</div>
			<div class="col-xs-2">
				<!-- Contextual button for informational alert messages -->
				<input type="text" class="form-control" name="brandColor[info]" value="#5bc0de">
			</div>
			<div class="col-xs-2">
				<!-- Indicates caution should be taken with this action -->
				<input type="text" class="form-control" name="brandColor[warning]" value="#f0ad4e">
			</div>
			<div class="col-xs-2">
				<!-- Indicates a dangerous or potentially negative action -->
				<input type="text" class="form-control" name="brandColor[danger]" value="#d9534f">
			</div>
		</div>

	</div>

</div>
<?php _panel_close();?>
<?php formclose();?>
{footer}