{header}

<?php _panel();?>

<?php if(!$files){ ?>
<table class="table table-pull">
	<thead>
		<tr>
			<td>File</td>
			<td>Size</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $value) { ?>
			
		<tr>
			<td><?php echo basename($value);?></td>
			<td><?php echo filesize($value);?></td>
			<td><a class="btn btn-sm btn-primary" href="?target=<?php echo input("target");?>&files=<?php echo basename($value);?>">Show Data</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php }else{ ?>

<?php formopen();?>
<button type="submit" class="btn btn-primary" type="submit">Save Data</button>
<input type="hidden" name="paths" value="<?php echo $folder."/".input("files");?>">
<input type="hidden" name="target" value="<?php echo input("target");?>">
<table class="table table-pull">
	<thead>
		<tr>
			<td width="20%">Keyword</td>
			<td>Contents</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($files as $key => $value) { ?>
			
		<tr>
			<td><?php echo basename($key);?></td>
			<?php if(input("tranlayall")){ ?>
			<td class="textTranlay"><input name="trans[<?php echo $key;?>]" value="<?php echo ucfirst(tranlation($value,"",$tranlayto));?>" class="form-control" ></td>
			<?php }else{ ?>
			<td class="textTranlay"><input name="trans[<?php echo $key;?>]" value="<?php echo $value;?>" class="form-control" ></td>
			<?php } ?>
			<td><a class="btn btn-sm btn-tranlaytion btn-primary">Dịch</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php formclose();?>
<?php } ?>
<?php _panel_close();?>

<script type="text/javascript">
	$(function(){
		$(".btn-tranlaytion").on("click",function(){
			var $this = $(this);
			$.ajax({
			   url: '<?php echo admin_url("settings/language/tranlaytext",false);?>?text='+$this.parent().parent().find(".textTranlay input").val()+"&to=<?php echo $tranlayto;?>",
			   
			   
			   success: function(data) {
			      $this.parent().parent().find(".textTranlay input").val(data);
			   },
			   type: 'GET'
			});
		});
	});
</script>
{footer}