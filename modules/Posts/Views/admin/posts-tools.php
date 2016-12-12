{header}
<?php _panel("Tools Manager",true);?>
<a href="<?php echo admin_url('posts/content/tools/'.$type.'?query=regenimage');?>" class="btn btn-default">Regen Images</a>
<a href="<?php echo admin_url('posts/content/tools/'.$type.'?query=fixkeyworks');?>" class="btn btn-default">Fix Tags Keyword</a>
<a href="<?php echo admin_url('posts/content/tools/'.$type.'?query=import');?>" class="btn btn-info">Import</a>
<a href="<?php echo admin_url('posts/content/tools/'.$type.'?query=export');?>" class="btn btn-primary">Export</a>
<?php _panel_close();?>

<?php _panel("Tools Options",true);?>
<ul class="row">
	<li class="col-xs-12 col-sm-5">
		<input type="text" class="form-control" name="find">
	</li>
	<li class="col-xs-12 col-sm-5">
		<input type="text" class="form-control" name="replace">
	</li>
	<li class="col-xs-12 col-sm-2">
		<a onClick="window.location.href='<?php echo admin_url('posts/content/tools/'.$type.'?query=replace');?>&find='+$('input[name=find]').val()+'&replace='+$('input[name=replace]').val()" class="btn btn-default">Replace Text</a>
	</li>
</ul>
<?php _panel_close();?>
{footer}