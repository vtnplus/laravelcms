{header}
<?php _panel(); ?>
<div class="row">
	<div class="col-lg-6">
		<div class="input-group">
		<div class="input-group-btn">
	        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
	        <ul class="dropdown-menu">
	          <li><a href="#">Action</a></li>
	          <li><a href="#">Another action</a></li>
	          <li><a href="#">Something else here</a></li>
	          <li role="separator" class="divider"></li>
	          <li><a href="#">Separated link</a></li>
	        </ul>
	    </div>
	      <input type="text" class="form-control" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Search Modules!</button>
	      </span>
	    </div>
	</div>
	<div class="col-lg-6">
		<div class="input-group">
	      <input type="file" class="form-control" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Uploads Modules!</button>
	      </span>
	    </div>
	</div>

</div>
<?php _panel_close(); ?>

<div class="row">
	<div class="col-lg-6">
		<?php _panel(); ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="thumbnail" style="height: 200px;"></div>
			</div>
			<div class="col-lg-6">
				<h3 style="margin-top: 0;">Default Language</h3>
				<hr>
				Auth : VTN PLUS Co.,Ltd<br>
				Version : 1.3<br>
				Support : http://vtnplus.com/themes/default<br>
				Develop : VTN PLUS Co.,Ltd<br>
				Buy Ticket : Buy Now
				<hr>
				<a href="<?php echo admin_url("settings/themes/installonline");?>?target=" class="btn btn-xs btn-warning">Tranlaytion</a>
				
				
			</div>
		</div>
		<hr>

		<table class="table table-hovered table-bordered">
			<thead>
				<tr>
					<th width="5%">
						ID
					</th>
					<th>
						Name
					</th>
					
					<th width="15%"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $value) {  ?>
				<tr>
					<td><?php echo $value->id;?></td>
					<td><?php echo $value->name;?></td>
					
					<td style="white-space: nowrap;">
					<a href="<?php echo admin_url("settings/language/default");?>?target=<?php echo $value->folder;?>" class="btn btn-xs btn-default">Default</a>
					<a href="<?php echo admin_url("settings/language/make");?>?target=<?php echo $value->id;?>" class="btn btn-xs btn-danger">Make</a>
					<a href="<?php echo admin_url("settings/language/tranlaytion");?>?target=<?php echo $value->id;?>" class="btn btn-xs btn-warning">Tranlaytion</a>
					<?php if($value->status == 1){ ?>
					<a href="<?php echo admin_url("settings/language/status");?>?target=<?php echo $value->id;?>&status=0" class="btn btn-xs btn-success">Online</a>
					<?php }else{ ?>
					<a href="<?php echo admin_url("settings/language/status");?>?target=<?php echo $value->id;?>&status=1" class="btn btn-xs btn-default">Offline</a>
					<?php } ?>
					
					<?php button(["edit" => ["settings/language/".$value->id], "delete" => ["settings/language/delete/".$value->id]]);?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<hr>

		
		
		<?php _panel_close("Local Themes"); ?>
		<?php _panel("Thêm & Sửa ngôn ngữ"); ?>
		
		<?php formopen(["class" => "form-horizontal","action" => admin_url("settings/language/savedata",false)]);?>
			<input type="hidden" name="id" value="<?php echo @$read->id;?>">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-4 control-label">Tên ngôn ngữ</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="inputEmail3" value="<?php echo @$read->name;?>" placeholder="Language Name" name="name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Quốc gia</label>
		    <div class="col-sm-8">
		      <select  class="form-control" name="country_code" id="inputPassword3">
		      	<?php country(@$read->country_code ? $read->country_code : config("site.language"));?>
		      </select>
		    </div>
		  </div>
		  

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Folder</label>
		    <div class="col-sm-8">
		     <input type="text" class="form-control"  value="<?php echo data(@$read->folder,"vn");?>" placeholder="Folder Local" name="folder">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Code Language</label>
		    <div class="col-sm-8">
		     <input type="text" class="form-control"  value="<?php echo @$read->language_code;?>" placeholder="Language Code" name="language_code">
		    </div>
		  </div>

		  

		  

		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-8">
		      <button type="submit" class="btn btn-default">Save</button>
		    </div>
		  </div>
		</form>
		<?php _panel_close("Local Themes"); ?>
	</div>
	<div class="col-lg-6">
		<?php _panel("Bảng dịch khác"); ?>
		<div class="row">
			<?php foreach ($new_themes as $key => $value) {
				?>
				<div class="col-lg-6">
					<div class="thumbnail" style="height: 200px;"></div>
					<h4><?php echo basename($key);?></h4>
					<a href="<?php echo admin_url("settings/themes/installonline");?>?target=<?php echo $value;?>" class="btn btn-xs btn-primary">Install</a>
					<a href="<?php echo admin_url("settings/themes/download");?>?target=<?php echo $key;?>" class="btn btn-xs btn-primary">Download</a>
				</div>
				<?php
			}?>
		</div>
		<?php _panel_close("New Modules"); ?>
	</div>
</div>


{footer}