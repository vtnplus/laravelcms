{header}

<?php _panel();?>
<ul class="row">
	<li class="col-xs-4">
		<select class="form-control" onchange="window.location.href='?project='+this.value;">
			<option>Not Select</option>
			<?php foreach ($project as $key => $value) {
				?>
				<option value="<?php echo basename($value);?>" <?php echo (input("project") == basename($value) ? "selected" : "");?>><?php echo basename($value);?></option>
				<?php
			}
			?>
		</select>
	</li>
	<li class="col-xs-2">
	<a href="<?php admin_url("tools/contents/runquery?project=".input("project"));?>" class="btn btn-primary btn-block">Run Query</a>
	
	</li>
	<li class="col-xs-2">
	
	<button type="button" class="btn btn-primary btn-block" onclick="$('.btn-primary.btn-extract').click();">Extract All</button>
	</li>
</ul>
<?php _panel_close();?>

<?php _panel();?>
<table class="table table.bordered">
	<tr>
		<td>Name</td>
		<td>URL</td>
		<td width="2%"></td>
	</tr>

<?php foreach ($data as $key => $value) {
	$files =  str_replace('Views/admin','Backend/clone/'.input("project").'/cache_content_'.md5($value["urls"]).'.php',__DIR__);

	?>
	<tr>
		<td><input class="form-control" type="text" name="title" value="<?php echo $value["title"];?>"></td>
		<td><input class="form-control" type="text" name="urls" value="<?php echo $value["urls"];?>"></td>
		<td><button type="button" href="<?php echo $value["urls"];?>" title="<?php echo $value["title"];?>" class="btn btn-<?php echo(files()->exists($files) ? "success" : "primary");?> btn-extract">Extract</a></td>
	</tr>
	<?php
}
?>
</table>
<?php _panel_close();?>

<script type="text/javascript">
	$(function(){
		$(".btn-extract").on("click", function(){
			var $parent = $(this).parent().parent();
			var url = $(this).attr("href");
			var title = $(this).attr("title");
			$.ajax({
			   type: 'POST',
			   url: '<?php admin_url('tools/contents/extract');?>',
			   data: {
			      url: url,
			      title : title,
			      project : '<?php echo input("project");?>'
			   },
			   error: function() {
			     alert("Error");
			   },
			   
			   success: function(data) {
			      $parent.after('<tr><td colspan="3"><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60% Complete</span></div></div></td></tr>');
			      progressBar($parent);
			   },
			   
			});
			
		});
	});
	function progressBar(obj){
		var $progressBar = obj.find(".progress-bar");
		var $progress = obj.find(".progress");
		setTimeout(function() {
		    $progressBar.css('width', '10%');
		    setTimeout(function() {
		        $progressBar.css('width', '30%');
		        setTimeout(function() {
		            $progressBar.css('width', '100%');
		            setTimeout(function() {
		                $progress.html('Complete');
		            }, 500); // WAIT 5 milliseconds
		        }, 2000); // WAIT 2 seconds
		    }, 1000); // WAIT 1 seconds
		}, 1000); // WAIT 1 second
	}
</script>
{footer}