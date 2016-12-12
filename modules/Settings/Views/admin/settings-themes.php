{header}
<?php _panel(); ?>
<div class="row">
	<div class="col-lg-6">
		<div class="input-group">
		<div class="input-group-btn">
	        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
	        <ul class="dropdown-menu">
	          <li><a href="#">Action</a></li>
	          <li><a href="#">Another action</a></li>
	          <li><a href="#">Something else here</a></li>
	          <li role="separator" class="divider"></li>
	          <li><a href="#">Separated link</a></li>
	        </ul>
	    </div>
	      <input type="text" class="form-control" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Search Modules!</button>
	      </span>
	    </div>
	</div>
	<div class="col-lg-6">
		<div class="input-group">
	      <input type="file" class="form-control" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Uploads Modules!</button>
	      </span>
	    </div>
	</div>

</div>
<?php _panel_close(); ?>

<div class="row">
	<div class="col-lg-6">
		<?php _panel("Local Themes"); ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="thumbnail" style="height: 200px;"></div>
			</div>
			<div class="col-lg-6">
				<h3 style="margin-top: 0;">Default Themes</h3>
				<hr>
				Auth : VTN PLUS Co.,Ltd<br>
				Version : 1.3<br>
				Support : http://vtnplus.com/themes/default<br>
				Develop : VTN PLUS Co.,Ltd<br>
				Buy Ticket : Buy Now<br>
			</div>
		</div>
		<hr>

		<ul class="row">
			<?php foreach ($data as $key => $value) { 
					$basename = basename($value);
			?>
			<li class="col-lg-6">
				<div class="thumbnail" style="height: 200px;"></div>
				<h4><?php echo basename($value);?></h4>
				<a href="<?php echo admin_url("settings/themes/install");?>?target=<?php echo $basename;?>" class="btn btn-xs btn-primary">Install</a>
				<a href="<?php echo admin_url("settings/themes/delete");?>?target=<?php echo $basename;?>" class="btn btn-xs btn-primary">Delete</a>
			</li>
			<?php } ?>
		</ul>
		
		<?php _panel_close("Local Themes"); ?>
	</div>
	<div class="col-lg-6">
		<?php _panel("New Themes"); ?>
		<div class="row">
			<?php foreach ($new_themes as $key => $value) {
				?>
				<div class="col-lg-6">
					<div class="thumbnail" style="height: 200px;"></div>
					<h4><?php echo basename($key);?></h4>
					<a href="<?php echo admin_url("settings/themes/installonline");?>?target=<?php echo $value;?>" class="btn btn-xs btn-primary">Install</a>
					<a href="<?php echo admin_url("settings/themes/download");?>?target=<?php echo $key;?>" class="btn btn-xs btn-primary">Download</a>
				</div>
				<?php
			}?>
		</div>
		<?php _panel_close("New Modules"); ?>
	</div>
</div>


{footer}