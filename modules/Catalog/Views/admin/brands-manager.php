{header}

<?php _panel('<i class="glyphicon glyphicon-th-list"></i> '.lang("posts.content.list",false),false,'<a href="'.admin_url("catalog/brands/create/".$type, false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Create</a> <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Move Trash</a>');?>
<?php formopen(["class" => "form-horizontal"]);?>
<div class="search-box">


            <div class="row">
                
                <div class="col-lg-8 col-xs-12">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="<?php echo lang("global.placeholder_search");?>">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> <?php echo lang("global.btn_search");?></button>
                      </span>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-8">
                    <div class="input-group">
                    <select class="form-control" name="filter">
                    <!--filter-->
                    
                        <option value="id">id</option>
                        <option value="keyword">keyword</option>
                        <option value="type">type</option>
                        <option value="title">title</option>
                        <option value="thumbs">thumbs</option>
                        <option value="description">description</option>
                        <option value="content">content</option>
                        <option value="options">options</option>
                        <option value="categories_id">categories_id</option>
                        <option value="pages_maps">pages_maps</option>
                        <option value="group_id">group_id</option>
                        <option value="stores_id">stores_id</option>
                        <option value="language">language</option>
                        <option value="users_id">users_id</option>
                        <option value="groups_access">groups_access</option>
                        <option value="parent_id">parent_id</option>
                        <option value="tags">tags</option>
                        <option value="related_id">related_id</option>
                        <option value="status">status</option>
                        <option value="created_at">created_at</option>
                        <option value="updated_at">updated_at</option>
                        <option value="display_at">display_at</option>
                        <option value="expires_at">expires_at</option>
                        <option value="seo_urls">seo_urls</option> 
                    <!--filter-->           
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>
                    </div>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-sort"></i></button>
                </div>

            </div>

        
<div class="addTags"></div>
</div>
<?php formclose();?>
<div class="table-responsive">
<table class="table table-hover table-pull table-bordered table-striped">
	<thead>
		<tr>
			<!--ViewHeader-->

            <td data-field="id,number,left"><?php echo lang("posts.content.id");?></td>

            <td data-field="title,input,left"><?php echo lang("posts.content.title");?></td>

            

            
           

            <td data-field="users_id,number,left"><?php echo lang("posts.content.users_id");?></td>

            

            <td data-field="status,number,left" width="1%"><?php echo lang("posts.content.status");?></td>

            <td data-field="created_at,timestamp,left"><?php echo lang("posts.content.created_at");?></td>

            
            
<!--ViewHeader-->
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php 

		foreach ($data as $key => $value) { 

            
        ?>
			
		<tr data-url="<?php admin_url("catalog/brands/quitedit/".$value->type."/".$value->id);?>" data-quitedit="<?php echo $value->id;?>" data-quitview="<?php echo $value->id;?>">
			<!--ViewContent-->

            <td><?php echo $value->id;?></td>

            <td>
                <div class="item-left">
                    <div>
                        <img up-image src="<?php echo getThumbnail($value->thumbs);?>">
                    </div>
                    <div>
                        <b up-title><?php echo $value->title;?></b>
                        <a class="pull-right btn btn-xs btn-default" href="<?php echo $value->links();?>" target="_bank"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                        <br>
                        <?php echo $value->pages_maps;?>
                    </div>
                </div>
                </td>

            

            

           

            <td><?php echo @$value->users()->first_name;?> <?php echo @$value->users()->last_name;?></td>

           

            <td class="text-center"><?php echo $value->status;?></td>

            <td><?php echo $value->created_at();?></td>

            
            
<!--ViewContent-->
			<td>
               
                <a class="btn btn-xs btn-warning">Edit</a>
                <?php button(["delete" => ["catalog/brands/delete/".$value->type."/".$value->id]], true, $value->users_id);?>
            </td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php pages($data);?>
</div>
<?php _panel_close();?>


{footer}