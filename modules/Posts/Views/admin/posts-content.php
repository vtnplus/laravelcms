{header}

<?php _panel('<i class="glyphicon glyphicon-th-list"></i> '.lang("posts.content.list",false),false,'<a href="'.admin_url("posts/content/create/".$type, false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Create</a> <a href="'.admin_url("posts/content/tools/".$type, false).'" class="btn btn-danger"><i class="glyphicon glyphicon-wrench"></i> Tools</a>');?>
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
                    <select class="form-control selectpicker" name="filter">
                    <!--filter-->
                    
                       
                        
                       
                        <option value="title">Title</option>
                       <option value="keyword">Keyword</option>
                        <option value="description">Description</option>
                       
                        <option value="options">Options</option>
                        <option value="categories_id">Categories_id</option>
                        
                        <option value="tags">Tags</option>
                       
                        <option value="status">status</option>
                        <option value="created_at">Created_at</option>
                        <option value="updated_at">Updated_at</option>
                        <option value="display_at">Display_at</option>
                        <option value="expires_at">Expires_at</option>
                        <option value="seo_urls">Seo_urls</option> 
                    <!--filter-->           
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>
                    </div>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <?php if(is_admin()){?>
                    <div class="input-group">
                    <select class="form-control selectpicker" name="filter">
                    
                        <option value="seo_urls">Move Trash</option> 
                        <option value="seo_urls">Change Auth</option> 
                    <!--filter-->           
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>
                    </div>
                    </div>
                    <?php } ?>
                </div>

            </div>

        
<div class="addTags"></div>
</div>
<?php formclose();?>
<div class="table-responsive">
<table class="table table-hover table-pull table-striped" id="checkall">
	<thead>
		<tr>
			<!--ViewHeader-->

            <td data-field="id,number,left" class="text-center"><input type="checkbox" name="" data-checkall="#checkall"></td>

            <td data-field="title,input,left"><?php echo lang("posts.content.title");?></td>

            

            
           

            

            

            <td data-field="status,number,left" width="1%"><?php echo lang("posts.content.status");?></td>

            <td data-field="created_at,timestamp,left"><?php echo lang("posts.content.updated_at");?></td>

            
            <?php
                foreach ($field as $keyField => $valueField) {
                   ?>
                   <td><?php echo lang("posts.content.".$keyField);?></td>
                   <?php
                }
                if(user()->is_admin == 1){
            ?>
            <td data-field="users_id,number,left"><?php echo lang("posts.content.users_id");?></td>
                <?php } ?>
<!--ViewHeader-->
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php 

		foreach ($data as $key => $value) { 

            
        ?>
			
		<tr data-url="<?php admin_url("posts/content/quitedit/".$value->type."/".$value->id);?>" data-quitedit="<?php echo $value->id;?>" data-quitview="<?php echo $value->id;?>">
			<!--ViewContent-->

            <td class="text-center"><input type="checkbox" name="in_action" value="<?php echo $value->id;?>" data-notload></td>

            <td>
                <div class="item-left">
                    <div>
                        <img up-image src="<?php echo getThumbnail($value->thumbs);?>">
                    </div>
                    <div>
                        <span up-title><?php echo $value->title;?></span>
                        <button class="pull-right btn btn-xs btn-warning" data-reset data-href="<?php admin_url("posts/content/reset/".$value->type."/".$value->id);?>"><i class="glyphicon glyphicon-refresh"></i></button>
                        <a class="pull-right btn btn-xs btn-info" href="<?php echo $value->links();?>" target="_bank"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <br>
                        <?php echo $value->getPagesMaps();?>
                    </div>
                </div>
                </td>

            

            

           

            

           

            <td class="text-center"><?php echo $value->SwitchStatus();?></td>

            <td><?php echo $value->updated_at('D m Y h:i:s');?></td>

            
            <?php
                foreach ($field as $keyField => $valueField) {
                    echo '<td>';
                    if(function_exists($value->{$valueField})){
                        echo call_user_func(array($value->{$valueField}));
                    } else if( method_exists($value, $valueField)){
                         echo call_user_func(array($value,$valueField));
                    }else{

                        echo $value->{$valueField};
                    }
                   echo '</td>';
                    
                }
                if(user()->is_admin == 1){
            ?>
            <td><?php echo @$value->users()->first_name;?> <?php echo @$value->users()->last_name;?></td>
                <?php } ?>
<!--ViewContent-->
			<td>
               
                 <?php button_tranlation("posts/content/copy/".$value->type."/".$value->id."/{language}");?>
                <?php button(["edit" => ["posts/content/edit/".$value->type."/".$value->id], "delete" => ["posts/content/delete/".$value->type."/".$value->id]], true, $value->users_id);?>
            </td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php pages($data);?>
</div>
<?php _panel_close();?>


{footer}