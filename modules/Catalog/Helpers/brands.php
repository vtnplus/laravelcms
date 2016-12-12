<?php
function getBrands($type="blogs", $selefted="", $where = [], $span=""){
	$where = array_merge(["type" => $type], $where);
	$data = db("Catalog::Brands")->stores()->language()->where($where)->get();
	foreach ($data as $key => $value) {
		echo '<option value="'.$value->id.'" '.($value->id == $selefted ? "selected" : "").'>'.$span.$value->title.'</option>';
		$count = db("Catalog::Brands")->stores()->language()->where(["parent_id" => $value->id])->count();
		if($count > 0){
			getBrands($value->type, $selefted, ["parent_id" => $value->id],$span."- ");
		}
	}
}