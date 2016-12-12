<?php
namespace Modules\Pages\Widgets;
class Pages{


	public function register(){
		return [
				"name" => "Pages Menu",
				"icons"	=>	"",
				"auth"	=> "",
				"source"	=> ""
			];
	}


	public function main($data = []){
		
		$parent = (@$data["parent"] == "auto" ? config("register.pages.parent_id",0) : @$data["parent"]);
		$limit = (!@$data["limit"] || @$data["limit"] == "" ? 5 : $data["limit"]);

		return do_shortcode('[pages  parent="'.$parent.'"][/pages]');
	}


	public function admin($data = []){

		echo '
		<ul class="row">
			<li class="col-xs-12">
				Type
				<select name="content[parent]" class="form-control selectpicker">
					<option value="auto">Auto Detect</option>
					';
				pages_options(@$data["parent"],["parent_id" => 0],true);
		echo '		</select>
			</li>
			<li class="col-xs-6">
				Sort By
				<select name="content[sort_by]" class="form-control selectpicker">
					<option value="id" '.(@$data["sort_by"] == "id" ? "selected" : "").'>New</option>
					<option value="created_at" '.(@$data["sort_by"] == "created_at" ? "selected" : "").'>Create Date</option>
					<option value="updated_at" '.(@$data["sort_by"] == "id" ? "selected" : "").'>Update Date</option>
					<option value="title" '.(@$data["sort_by"] == "updated_at" ? "selected" : "").'>Name</option>
					<option value="ratings" '.(@$data["sort_by"] == "ratings" ? "selected" : "").'>Ratings</option>
				</select>
			</li>
			<li class="col-xs-6">
				Sort Order
				<select name="content[order_by]" class="form-control selectpicker">
					<option value="desc" '.(@$data["order_by"] == "desc" ? "selected" : "").'>DESC</option>
					<option value="asc" '.(@$data["order_by"] == "asc" ? "selected" : "").'>ASC</option>
				</select>
			</li>


			<li class="col-xs-6">
				Limit
				<input class="form-control" name="content[limit]" value="'.data(@$data["tags"],10).'"/>
			</li>
			<li class="col-xs-6">
				Layout
				<select name="content[size]" class="form-control selectpicker">
					<option value="size-xs" '.(@$data["size"] == "size-xs" ? "selected" : "").'>XS</option>
					<option value="size-sm" '.(@$data["size"] == "size-sm" ? "selected" : "").'>SM</option>
					<option value="size-md" '.(@$data["size"] == "size-md" ? "selected" : "").'>MD</option>
					<option value="size-lg" '.(@$data["size"] == "size-lg" ? "selected" : "").'>LG</option>
				</select>
			</li>

			<li class="col-xs-12">
				Tag\'s
				<input class="form-control" name="content[tags]" value="'.@$data["tags"].'" />
					
			</li>

		</ul>
		';
	}
}