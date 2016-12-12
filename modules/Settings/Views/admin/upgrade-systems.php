{header}
<div class="row">
	<div class="col-xs-12">
		<?php _panel("Core Systems",true,'<a href="'.admin_url("settings/upgrade/process/systems",false).'" class="btn btn-primary">Start Update</a>');?>
			<div class="alert alert-danger">
				<b>Note :</b> Backups all modules & database before start upgrade
			</div>
			Validate Version : 1.2<br>
			Update Version :  1.4<br>
			Cache Folder : <?php echo base_path("contents/upgrade");?><br>
			Backup Folder : <?php echo base_path("contents/backups");?>
			
			
		<?php _panel_close();?>
		
	</div>
	<div class="col-xs-12 col-lg-6">
		<?php _panel("Modules Systems",true);?>
			<table class="table table-pull table-hover">
				<thead>
					<td>Module Name</td>
					<td>Validate</td>
					<td>Update</td>
					<td></td>
				</thead>
				<tbody>
					<?php foreach ($systems as $key => $value) { ?>
						
					<tr>
						<td><?php echo ucfirst(basename($value));?></td>
						<td>1.2</td>
						<td>1.75</td>
						<td><a class="btn btn-xs btn-primary">Update</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			
		<?php _panel_close();?>
	</div>
	<div class="col-xs-12 col-lg-6">
		<?php _panel("Upgrade Module", true);?>
		<table class="table table-pull table-hover">
			<thead>
				<td>Module Name</td>
				<td>Validate</td>
				<td>Update</td>
				<td></td>
			</thead>
			<tbody>
				<?php foreach ($modules as $key => $value) { ?>
					
				<tr>
					<td><?php echo ucfirst(basename($value));?></td>
					<td>1.2</td>
					<td>1.75</td>
					<td><a class="btn btn-xs btn-primary">Update</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php _panel_close();?>
	</div>
</div>

{footer}