{header}
<?php _panel('<i class="glyphicon glyphicon-envelope"></i> Email Templates',false,'<a href="'.admin_url("stores/content/create/data",false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Create</a> <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Move Trash</a>');?>


<div class="search-box">


            <div class="row">
                
                <div class="col-lg-6 col-xs-12">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="<?php echo lang("global.placeholder_search");?>">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> <?php echo lang("global.btn_search");?></button>
                      </span>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-12">
                    <div class="input-group">
                    <select class="form-control selectpicker" name="filter">
                    <!--filter-->
                    
                        <option value="id">id</option>
                        <option value="stores_id">Subject</option>
                        <option value="parent_id">Contents</option>
                        <option value="parent_id">Language</option>
                        <option value="parent_id">Stores</option>
                        
                    <!--filter-->           
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>
                    </div>
                    </div>
                </div>


                <div class="col-lg-2 col-xs-6">
                    <select class="form-control selectpicker" name="type" onchange="window.location.href='<?php admin_url("stores/email/manager");?>/'+this.value;">
                    <option value="main" <?php echo (@$type == "main" ? "selected" : "");?>>Email Systems</option>
                    <option value="newlaster" <?php echo (@$type == "newlaster" ? "selected" : "");?>>Email New Laster</option>
                    <option value="templates" <?php echo (@$type == "templates" ? "selected" : "");?>>Email Templates</option>        
                    </select>
                </div>

                <div class="col-lg-2 col-xs-6">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-sort"></i></button>
                </div>

            </div>

        
<div class="addTags"></div>
</div>
<div class="table-responsive">
<table class="table table-hover table-pull">
	<thead>
		<tr>
			<td>ID</td>
			<td>Subject</td>
			<td>Keyword</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $value) { ?>
			
		<tr>
			<td><?php echo $value->id;?></td>
			<td><?php echo $value->subject;?></td>
			<td><?php echo $value->keyword;?></td>
			<td><?php button(["edit" => ["stores/email/edit/".$value->id], "delete" => ["stores/email/delete/".$value->id]]);?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php pages($data);?>
</div>

<?php _panel_close();?>
{footer}