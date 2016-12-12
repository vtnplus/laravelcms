{header}

<div class="container">

	<h1 class="customs-title">Config Database</h1>
	<hr>
	<?php if(!file_exists(__DIR__."/database.sql")){
		?>
		<div class="alert alert-danger"><b>Error</b> : Files database.sql not exists in <?php echo __DIR__;?></div>
		<?php }else{ ?>
		<?php formopen(["class" => "form-horizontal"]);?>
		<input type="hidden" name="validate" value="<?php echo input("validate");?>">
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">MySQL Server</label>
		    <div class="col-sm-10">
		      <select class="form-control" name="database[driver]">
		      	<option value="mysql">Mysql</option>
		      </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">MySQL Server</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="database[host]" value="<?php echo data(config("database.connections.mysql.host"),"127.0.0.1");?>" placeholder="Database Server">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Database Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="database[database]" value="<?php echo data(config("database.connections.mysql.database"),"");?>" placeholder="Database Name">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Database User</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="database[username]" value="<?php echo data(config("database.connections.mysql.username"),"");?>" placeholder="Database Username">
		    </div>
		  </div>


		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Database Password</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="database[password]" value="<?php echo data(config("database.connections.mysql.password"),"");?>" placeholder="Database Password">
		    </div>
		  </div>


		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Database Port</label>
		    <div class="col-sm-5">
		      <input type="number" class="form-control" name="database[port]" value="<?php echo data(config("database.connections.mysql.port"),"");?>" placeholder="Database Port">
		    </div>
		    <div class="col-sm-5">
		      <input type="text" class="form-control" name="database[prefix]" value="<?php echo data(config("database.connections.mysql.prefix"),"");?>" placeholder="Database Prefix">
		    </div>
		  </div>
		  

		  <hr>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Admin Email</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" name="admin_email" value="<?php echo data("admin@".str_replace(['http://www.','http://'],'',base_url()));?>" placeholder="Email Admin">
		    </div>
		  </div>



		   <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Admin Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" name="admin_password" placeholder="Password Admin">
		    </div>
		  </div>

		  


		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox" name="install_demo" value="1"> Install Sample Database
		        </label>
		      </div>
		    </div>
		  </div>

		 <hr>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-primary">Start Install</button>
		    </div>
		  </div>
		</form>
	<?php } ?>
</div>
{footer}