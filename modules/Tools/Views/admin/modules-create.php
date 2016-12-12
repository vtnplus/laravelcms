{header}
<?php
$sample_code = '
"leftmenu" => [
	"injoin" => "parent",
	"name" => "{name}",
	"icons"	=> "{icons}",
	"contents" => []
	],
"topmenu" => [
	"injoin" => "parent",
	"name" => "{name}",
	"icons"	=> "{icons}",
	"contents" => []
]';

?>
<?php formopen(["class" => "form-horizontal"]);?>
<div class="row">
	<div class="col-lg-8">
		<?php _panel("Modules Info", true,["close",'up','settings']);?>
			
			
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Modules Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="name" placeholder="Modules Name">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Folder</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="folder" placeholder="Folder Save Data">
			    </div>
			    <div class="col-sm-2">
			      <select type="text" class="form-control" name="folder_local">
			      	<option></option>
			      	<?php foreach ($folders_loca as $key => $value) { ?>
			      		<option value="<?php echo basename($value);?>"><?php echo basename($value);?></option>
			      	<?php } ?>
			      </select>
			    </div>
			  </div>


			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Controller</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="controller" placeholder="Controller">
			    </div>
			  </div>


			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" name="register-left" value="1"> Register Menu Left
			        </label>
			      </div>
			    </div>
			  </div>


			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" name="register-top" value="1"> Register Menu Top
			        </label>
			      </div>
			    </div>
			  </div>

			 

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox"> Remember me
			        </label>
			      </div>
			    </div>
			  </div>

			  <hr>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Start Gender Code</button>
			    </div>
			  </div>
			
		<?php _panel_close();?>
	</div>

	<div class="col-lg-4">
		<?php _panel("Extentions", true,["close",'up','settings']);?>
			<div class="form-group">
			    <div class="col-sm-12">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" value="1" name="rendermodel"> Render Models
			        </label>
			      </div>
			    </div>
			</div>

			<select class="form-control" name="tables">
				<option>Select Database</option>
				<?php foreach ($tables as $key => $value) { 
					$keys = sprintf("Tables_in_%s",config("database.connections.".config("database.default").".database"));
					
					$table = $value->{$keys};
				?>
					<option value="<?php echo $table;?>"><?php echo $table;?></option>
				<?php } ?>
			</select>

			<div class="form-group">
			    <div class="col-sm-12">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" name="scopes" value="1"> Add Scopes
			        </label>
			      </div>
			    </div>
			  </div>

			<div class="form-group">
			    <div class="col-sm-12">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" name="setmethod" value="1"> Set Method
			        </label>
			      </div>
			    </div>
			  </div>

		<?php _panel_close();?>
	</div>

</div>
</form>
{footer}