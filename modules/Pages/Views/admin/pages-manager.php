{header}

<?php _panel('<i class="glyphicon glyphicon-th-list"></i> '.lang("pages.home.list",false),false,'<a href="'.admin_url("pages/home/create",false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Create</a> <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Move Trash</a>');?>
<div class="search-box">
<?php formopen(["class" => "form-horizontal"]);?>

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
                    
                        <option value="id">id</option>
                        <option value="stores_id">stores_id</option>
                        <option value="parent_id">parent_id</option>
                        <option value="type">type</option>
                        <option value="status">status</option>
                        <option value="title">title</option>
                        <option value="thumbs">thumbs</option>
                        <option value="description">description</option>
                        <option value="content">content</option>
                        <option value="options">options</option>
                        <option value="language">language</option>
                        <option value="pages_maps">pages_maps</option>
                        <option value="display_as">display_as</option>
                        <option value="redirect_to">redirect_to</option>
                        <option value="tags">tags</option>
                        <option value="visists">visists</option>
                        <option value="orders">orders</option>
                        <option value="seo_urls">seo_urls</option>
                        <option value="meta_title">meta_title</option>
                        <option value="meta_keyword">meta_keyword</option>
                        <option value="meta_descritpion">meta_descritpion</option>
                        <option value="created_at">created_at</option>
                        <option value="updated_at">updated_at</option>
                        <option value="expires_at">expires_at</option>
                        <option value="users_id">users_id</option> 
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
<?php formclose();?>
</div>
<div class="table-responsive">
<table class="table table-hover table-pull table-bordered table-striped">
	<thead>
		<tr>
			<!--ViewHeader-->

            <td data-field="id,number,center"><?php echo lang("pages.home.id");?></td>

            <td data-field="title,input,left"><?php echo lang("pages.home.title");?></td>

            

            <td data-field="display_as,input,left"><?php echo lang("pages.home.display_as");?></td>

            <td data-field="visists,number,center"><?php echo lang("pages.home.visists");?></td>

            <td data-field="updated_at,input,left"><?php echo lang("pages.home.updated_at");?></td>
<!--ViewHeader-->
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php 

		foreach ($data as $key => $value) { ?>
			
		<tr data-url="<?php admin_url("pages/home/quitedit/".$value->id);?>" data-quitedit="<?php echo $value->id;?>" data-quitview="<?php echo $value->id;?>">
			<!--ViewContent-->

            <td class="text-center"><?php echo $value->id;?></td>

            <td style="position: relative;">
                <div class="item-left">
                    <div class="img-circle">
                        <img src="<?php echo getThumbnail($value->thumbs);?>" class="img-circle">
                    </div>
                    <div >
                        <b up-title><i class="glyphicon glyphicon-align-justify"></i> <?php echo $value->title;?></b><br>
                        
                         <a style="position: absolute; bottom: 15px;" href="<?php echo $value->links();?>" target="_bank"><?php echo $value->links();?></a>
                    </div>
                </div>

            </td>

            

           

            <td><?php echo data($value->display_as,"Default");?></td>

            <td class="text-center"><?php echo $value->visists;?></td>

            <td><?php echo $value->updated_at();?></td>
<!--ViewContent-->
			<td>
                
                <?php button_tranlation("pages/home/copy/".$value->id."/{language}");?>
                <?php button(["edit" => ["pages/home/edit/".$value->id], "delete" => ["pages/home/delete/".$value->id]]);?>
                
            </td>
		</tr>
        <?php echo with(new \Modules\Pages\Backend\Home)->getSubpages($value->id);?>
		<?php } ?>
	</tbody>
</table>
<?php pages($data);?>
</div>
<?php _panel_close();?>

<style type="text/css">
    
</style>
{footer}