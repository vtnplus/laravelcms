<?php _panel("Prices");?>
<ul >
	<li class="col-xs-6">
		<input type="text" class="form-control" name="prices" value="<?php echo $data->prices;?>">
	</li>
	<li class="col-xs-6">
		<input type="text" class="form-control" name="prices_off" value="<?php echo $data->prices_off;?>">
	</li>
</ul>
<?php _panel_close();?>