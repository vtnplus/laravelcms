{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel('<i class="glyphicon glyphicon-th-list"></i> '.lang("slider.manager.list",false),true,'<a href="'.admin_url("slider/manager/create", false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> '.lang("global.create").'</a> <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> '.lang("global.movetrash").'</button>');?>

<div class="table-responsive">
<table class="table table-hover table-pull">
	<thead>
		<tr>
			<!--ViewHeader-->
			
            <td data-field="id,number"><?php echo lang("slider.manager.id");?></td>

            <td data-field="keyword,input"><?php echo lang("slider.manager.keyword");?></td>

            <td data-field="title,input"><?php echo lang("slider.manager.title");?></td>

            <td data-field="status,number"><?php echo lang("slider.manager.status");?></td>

            <td data-field="display_at,timestamp"><?php echo lang("slider.manager.display_at");?></td>

            <td data-field="expires_at,timestamp"><?php echo lang("slider.manager.expires_at");?></td>

            
			<!--ViewHeader-->
			<td data-fixed="right"></td>
		</tr>
	</thead>
	<tbody>
		<?php 

		foreach ($data as $key => $value) { ?>
			
		<tr>
			<!--ViewContent-->
			
            <td><?php echo data($value->id);?></td>

            <td>[slider id="<?php echo data($value->keyword, $value->id);?>"][/slider]</td>           

            <td><?php echo data($value->title);?></td>

            <td><?php echo data($value->status);?></td>

            <td><?php echo data($value->display_at);?></td>

            <td><?php echo data($value->expires_at);?></td>

			<!--ViewContent-->
			<td><?php button(["edit" => ["slider/manager/edit/".$value->id], "delete" => ["slider/manager/delete/".$value->id]]);?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php pages($data);?>
</div>
<?php _panel_close();?>
<?php formclose();?>

{footer}