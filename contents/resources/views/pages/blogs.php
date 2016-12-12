{header}

<?php
if(session("content.view_type") == "gird"){
	$width = "col-xs-12 col-lg-4";
	$align = "";

}else{
	$width = "col-xs-12";
	$align = "text-left size-lg";
}
?>

<div class="container">
	<div class="row row-flex">

		<div class="col-xs-9">
			
			<div class="search-box">
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">
					      <input type="text" class="form-control" placeholder="Search for...">
					      <span class="input-group-btn">
					        <button class="btn btn-primary" type="button">Search!</button>
					      </span>
					    </div><!-- /input-group -->
					</div>
					<div class="col-lg-6">
						<select class="selectpicker" name="categories_id">
                        	<option value="">All Category</option>
    						<?php getCatalog($type,input("categories_id"),["parent_id" => 0]);?>
                        </select>
						<div class="pull-right">
							<a class="btn btn-<?php echo (session("content.view_type") == "gird" ? "info" : "default");?>" href="<?php echo base_url('?setView=gird');?>"><i class="glyphicon glyphicon-th-large"></i></a>
							<a class="btn btn-<?php echo (session("content.view_type") == "list" || !session("content.view_type") ? "info" : "default");?>" href="<?php echo base_url('?setView=list');?>"><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="items <?php echo $align;?>">
				<div class="content">
					<?php echo $data->content;?>
					<?php if(config("register.pages.view")){ ?>
					<?php echo $data->contentPosts;?>
					<?php }else{ ?>
					
					<?php echo do_shortcode('[posts type="'.$type.'"][/posts]');?>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="col-xs-3" style="border-left:1px solid #ddd;">
			<?php widgets("right")->make()->send();?>

		</div>

	</div>
</div>
{footer}