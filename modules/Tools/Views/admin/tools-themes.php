{header}


<?php 
function checkKingEdit($file=""){
	if(!$file) return false;
	$paths = base_path("contents/templates/".input("validate")."/");
	if(files()->exists($paths.$file)){
		return 'color:red;';
	}else{
		return 'color:green;';
	}
}

formopen();?>
<div class="row">
	<div class="col-xs-6">
	<?php _panel("Themes Edit", true);?>
	<select class="form-control" onchange="window.location.href='?validate='+this.value;"><option value="">None</option>
	<?php
		$path = files()->glob(base_path("contents/templates/*"));
		foreach ($path as $key => $value) {
			?>
			<option value="<?php echo basename($value);?>"><?php echo basename($value);?></option>
			<?php
		}
		?>
	</select>
	<?php _panel_close();?>
	<?php _panel("Themes Make", true);?>
	<ul>
		<li>
			Name
			<input type="text" class="form-control" name="">
		</li>
		<li>
			Folder
			<input type="text" class="form-control" name="folder" value="<?php echo input("validate");?>">
		</li>
		<li><button type="submit" class="btn btn-primary">Make</button></li>

	</ul>
	<?php _panel_close();?>
</div>
	<div class="col-xs-6">
		<?php _panel("Pages Develop", true);?>
		<?php
		$path = files()->glob(resources_path("views/pages/*.php"));
		
		?>
		<ul class="row">
			<?php foreach ($path as $key => $value) { 
				$fileName = str_replace(resources_path("views/"),'',$value);
			?>
				
			<li class="col-xs-6" style="<?php echo checkKingEdit($fileName);?>"><label class="checkbox-inline"><input type="checkbox" name="files[]" value="<?php echo $fileName;?>"> <?php echo $fileName;?></label></li>
			<?php } ?>
		</ul>
		<?php _panel_close();?>


		<?php _panel("Pages Options Develop", true);?>
		<?php
		//$path = files()->glob(resources_path("views/pages/*.php"));

		?>
		<ul class="row">
			<?php foreach ($path as $key => $value) { 
				$fileName = str_replace(resources_path("views/pages/"),'options/pages/',$value);
			?>
				
			
			<li class="col-xs-6" style="<?php echo checkKingEdit($fileName);?>; font-weight: bold;"><label class="checkbox-inline"><input type="checkbox" name="files[]" value="<?php echo $fileName;?>"> <?php echo $fileName;?></label></li>
			<?php } ?>
		</ul>
		<?php _panel_close();?>



		<?php _panel("Post Type Contents Develop", true);?>
		<?php
		$path = files()->glob(resources_path("views/admin/posts/*.php"));

		?>
		<ul class="row">
			<?php foreach ($path as $key => $value) { 
				$fileName = str_replace(resources_path("views/"),'',$value);
				?>
				
			<li class="col-xs-6" style="<?php echo checkKingEdit($fileName);?>; font-weight: bold;"><label class="checkbox-inline"><input type="checkbox" name="files[]" value="<?php echo $fileName;?>"><?php echo $fileName;?></label></li>
			<?php } ?>
			<?php foreach (config("register.router") as $key => $value) { 
				$fileName = 'admin/posts/'.basename($value).'-content.php';
				?>
				<li class="col-xs-6" style="<?php echo checkKingEdit($fileName);?>"><label class="checkbox-inline"><input type="checkbox" name="files[]" value="<?php echo $fileName;?>"><?php echo $fileName;?></label></li>
			<?php } ?>
		</ul>
		<?php _panel_close();?>



		<?php _panel("Shortcode Develop", true);?>
		<?php
		$path = files()->glob(resources_path("views/shortcode/*.php"));

		?>
		<ul class="row">
			<?php foreach ($path as $key => $value) { 
$fileName = str_replace(resources_path("views/"),'',$value);
				?>
				
			<li class="col-xs-6" style="<?php echo checkKingEdit($fileName);?>; font-weight: bold;"><label class="checkbox-inline"><input type="checkbox" name="files[]" value="<?php echo $fileName;?>"><?php echo $fileName;?></label></li>
			<?php } ?>
			<?php foreach (config("register.router") as $key => $value) { 
				$fileName = 'shortcode/'.basename($value).'.php';
				
				?>
				<li class="col-xs-6" style="<?php echo checkKingEdit($fileName);?>"><label class="checkbox-inline"><input type="checkbox" name="files[]" value="<?php echo $fileName;?>"><?php echo $fileName;?></label></li>
			<?php } ?>
		</ul>
		<?php _panel_close();?>

	</div>
</div>

<?php formclose();?>
{footer}