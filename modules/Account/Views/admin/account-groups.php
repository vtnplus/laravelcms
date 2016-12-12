{header}
<?php _panel("Account Manager",true,["html" => button(["account/groups/create" => "Create Account"],false)]);?>
<table class="table table-hover table-pull">
	<thead>
		<tr>
			<td>Account ID</td>
			<td>Email</td>
			<td>Status</td>
			<td>Create At</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php 

		foreach ($data as $key => $value) { ?>
			
		<tr>
			<td><?php echo $value->id;?></td>
			<td><?php echo $value->roles_name;?></td>
			<td><?php echo $value->status;?></td>
			<td><?php echo $value->created_at;?></td>
			<td><?php button(["edit" => ["account/groups/edit/".$value->id], "delete" => ["account/groups/delete/".$value->id]]);?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php _panel_close();?>
{footer}