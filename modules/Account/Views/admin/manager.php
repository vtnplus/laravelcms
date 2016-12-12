{header}
<?php _panel("Account Manager",true,["html" => button(["account/access/create" => "Create Account"],false)]);?>
<table class="table table-hover table-pull">
	<thead>
		<tr>
			<td width="5%">ID</td>
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
			<td>
				<div class="item-left">
					<div>
	                    <img src="<?php echo getThumbnail($value->thumbs);?>">
	                </div>
	                <div>
					<b><?php echo $value->first_name;?> <?php echo $value->last_name;?></b><br>
					<?php echo $value->email;?>
					</div>
				</div>
				
			</td>
			<td><?php echo $value->status;?></td>
			<td><?php echo $value->created_at;?></td>

			<td>
			<?php if(user()->is_admin == 1){ ?>
				<a href="<?php admin_url("account/access/loginas/".$value->id);?>" class="btn btn-xs btn-info">Login As</a>
			<?php } ?>
			<?php button(["block" => ["account/access/block/".$value->id],"edit" => ["account/access/edit/".$value->id], "delete" => ["account/access/delete/".$value->id]]);?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php pages($data);?>
<?php _panel_close();?>
{footer}