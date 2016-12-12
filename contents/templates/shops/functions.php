<?php
config([
	"site.thumbs.travel" => ["medium" => "420x300"],
	/*
	"register.widgets.right"	=> [
									"travel" => "Travel Widgets",
									
								],
	"register.contents.travel"	=>	[
									"edit" => "travelEdit",
									"view" => ""
								],*/

	"register.panel.products"	=>	[
									"brands" => "brands_options",
									"prices" => "prices_options",
									"thumbs"	=> "gallery",
									"robins"	=> "robins_options",
								]
	]);

function brands_options($data){

	?>
	<div class="form-group" data-field="group_id,input,0,0,0">
        <label for="inputGroup_id" class="col-sm-2 control-label">Brands</label>
        <div class="col-sm-10">
            <select class="form-control selectpicker" type="text">
            	<option value="">Not Select</option>
            	<?php getBrands($data->type);?>
            </select>

        </div>
    </div>
	<?php
}


function robins_options($data){

	?>
	<div class="form-group" data-field="group_id,input,0,0,0">
        <label for="inputGroup_id" class="col-sm-2 control-label">Robins Tags</label>
        <div class="col-sm-10">
        	<label class="checkbox-inline"><input type="checkbox" name="robins[]" value="news"> News</label>
        	<label class="checkbox-inline"><input type="checkbox" name="robins[]" value="sales"> Sale Off</label>
        	<label class="checkbox-inline"><input type="checkbox" name="robins[]" value="events"> Events</label>
        	
            
        </div>
    </div>
	<?php
}


function prices_options($data){
	?>
	<div class="form-group" data-field="group_id,input,0,0,0">
        <label for="inputGroup_id" class="col-sm-2 control-label">Prices</label>
        <div class="col-sm-10">
        	<ul class="row">
        		<li class="col-xs-6"><input type="text" class="form-control" name="prices" value="<?php echo $data->prices;?>"></li>
        		<li class="col-xs-6"><input type="text" class="form-control" data-prices name="prices_off" value="<?php echo $data->prices_off;?>"></li>
        	</ul>
           

        </div>
       
    </div>
	<?php
}
?>