{header}

<?php
$allow = [
	"contents/backups",
	"contents/language",
	"contents/uploads",
	"contents/backups",
	"storage/app",
	"storage/framework/cache",
	"storage/framework/sessions",
	"storage/framework/views",
	"storage/logs",
	"config.php"
];
?>
<div class="container">
	<h1>Check CHMOD Files</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Paths</td>
				<td>Chmod</td>
				<td>Validate</td>
				
			</tr>
		</thead>
		<tbody>
		<?php foreach ($allow as $key => $value) { ?>
			
			<tr>
				<td><?php echo $value;?></td>
				<td>0777</td>
				<td><?php echo (is_writable(base_path($value)) ? "OK" : "Fail");?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<b>Notes</b> : After install. You need set config.php to 0444<br>
	<hr>
	<a href="?validate=database" class="btn btn-primary">Next</a>
</div>
{footer}