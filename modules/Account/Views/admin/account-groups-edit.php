{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel("Account Manager",true,'<button class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i> '.lang("global.save",false).'</button>');?>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo lang("user.roles_name");?></label>
    <div class="col-sm-10">
      	<input type="text" class="form-control" name="roles_name" value="<?php echo $data->roles_name;?>" placeholder="roles_name">
    </div>
</div>



<?php _panel_close();?>


<div class="row">
	<div class="col-lg-6">
		<?php _panel("Admin Access",true);?>
		<table class="table">
			<thead>
				<tr>
					<td>Modules Name</td>
					<td width="1%">Xem</td>
					<td width="1%">Sửa</td>
					<td width="1%">Xóa</td>
					<td width="1%" style="white-space: nowrap;">Báo cáo</td>
				</tr>
				<tr>
					<td></td>
					<td width="1%" class="text-center"><input type="checkbox" data-checkall="#checkall"></td>
					<td width="1%" class="text-center"><input type="checkbox" data-checkall="#checkall"></td>
					<td width="1%" class="text-center"><input type="checkbox" data-checkall="#checkall"></td>
					<td width="1%" class="text-center" style="white-space: nowrap;"><input type="checkbox" data-checkall="#checkall"></td>
				</tr>
			</thead>
			<tbody id="checkall">
				
			
		<?php
			$premisstion = get_user_permission($data->roles_access);

			foreach ($admin_access as $key => $value) {
				?>
				<tr>
					<td><?php echo $value;?></td>
					<td class="text-center"><input name="roles_access[view][<?php echo $key;?>]" <?php echo (@$premisstion["view"][$key] == 1 ? "checked" : "");?> type="checkbox" value="1"></td>
					<td class="text-center"><input name="roles_access[edit][<?php echo $key;?>]" <?php echo (@$premisstion["edit"][$key] == 1 ? "checked" : "");?> type="checkbox" value="1"></td>
					<td class="text-center"><input name="roles_access[delete][<?php echo $key;?>]" <?php echo (@$premisstion["delete"][$key] == 1 ? "checked" : "");?> type="checkbox" value="1"></td>
					<td class="text-center"><input name="roles_access[report][<?php echo $key;?>]" <?php echo (@$premisstion["report"][$key] == 1 ? "checked" : "");?> type="checkbox" value="1"></td>
				</tr>
				<?php
			}
		?>
			</tbody>
		</table>
		<?php _panel_close();?>
	</div>
	<div class="col-lg-6">
		<?php _panel("Auth Access",true,["html" => button(["account/groups/create" => "Create Account"],false)]);?>
		<?php _panel_close();?>
	</div>
</div>

<?php formclose();?>
{footer}