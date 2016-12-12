{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel('<i class="glyphicon glyphicon-th-list"></i> '.lang("posts.content.list",false),false,'<a href="'.admin_url("posts/content/create/".$type, false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Create</a> <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Move Trash</a>');?>
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
<div class="table-responsive">
<table class="table table-hover table-pull">
	<thead>
		<tr>
			<!--ViewHeader-->

            <td data-field="id,number,left"><?php echo lang("posts.content.id");?></td>

            <td data-field="title,input,left"><?php echo lang("posts.content.title");?></td>

            <td data-field="thumbs,input,left"><?php echo lang("posts.content.thumbs");?></td>

            <td data-field="categories_id,number,left"><?php echo lang("posts.content.categories_id");?></td>

            <td data-field="pages_maps,input,left"><?php echo lang("posts.content.pages_maps");?></td>

            <td data-field="users_id,number,left"><?php echo lang("posts.content.users_id");?></td>

            <td data-field="parent_id,number,left"><?php echo lang("posts.content.parent_id");?></td>

            <td data-field="status,number,left"><?php echo lang("posts.content.status");?></td>

            <td data-field="created_at,timestamp,left"><?php echo lang("posts.content.created_at");?></td>

            <td data-field="updated_at,timestamp,left"><?php echo lang("posts.content.updated_at");?></td>
<!--ViewHeader-->
			<td data-fixed="right"></td>
		</tr>
	</thead>
	<tbody>
		<?php 

		foreach ($data as $key => $value) { 

            
        ?>
			
		<tr>
			<!--ViewContent-->

            <td><?php echo $value->id;?></td>

            <td><?php echo $value->title;?></td>

            <td><?php echo $value->thumbs;?></td>

            <td><?php echo $value->categories_id;?></td>

            <td><?php echo $value->pages_maps;?></td>

            <td><?php echo @$value->users()->first_name;?> <?php echo @$value->users()->last_name;?></td>

            <td><?php echo @$value->parent()->title;?></td>

            <td><?php echo $value->status;?></td>

            <td><?php echo $value->created_at();?></td>

            <td><?php echo $value->updated_at;?></td>
<!--ViewContent-->
			<td><?php button(["edit" => ["posts/content/edit/".$value->id], "delete" => ["posts/content/delete/".$value->id]]);?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php pages($data);?>
</div>
<?php _panel_close();?>
<?php formclose();?>

{footer}