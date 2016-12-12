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
		<?php _panel("Local Modules"); ?>
		<table class="table table-pull">
			<thead>
				<tr>
					<td>Modules</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $value) { 
					$basename = basename($value);
				?>
					
				<tr>
					<td>
						<?php echo basename($value);?>
					</td>
					<td>
						<?php
							if(file_exists($value."/active.txt")){
								?>
								<a href="<?php echo admin_url("settings/modules/uninstall");?>?target=<?php echo $basename;?>" class="btn btn-xs btn-danger">Un Install</a>
						
								<?php
							}else{
								?>
								<a href="<?php echo admin_url("settings/modules/install");?>?target=<?php echo $basename;?>" class="btn btn-xs btn-primary">Install</a>
								<a href="<?php echo admin_url("settings/modules/delete");?>?target=<?php echo $basename;?>" class="btn btn-xs btn-primary">Delete</a>
								<?php
							}
						?>
						
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php _panel_close("Local Modules"); ?>
	</div>
	<div class="col-lg-6">
		<?php _panel("New Modules"); ?>
		<?php _panel_close("New Modules"); ?>
	</div>
</div>
{footer}