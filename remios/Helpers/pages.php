<?php
function pages_options($select=0,$where=[], $logic=false, $ingore=0, $span="", $field="id"){
	$data = db("Pages::Pages")->language()->stores()->orderBy("title","ASC");
	if($where){
		$data = $data->where($where)->where("id","!=",$ingore);
	}
	foreach ($data->get() as $key => $value) {
		echo '<option data-icon="glyphicon glyphicon-option-vertical" value="'.$value->{$field}.'" '.($select == $value->{$field} || @in_array($value->{$field}, $select) ? "selected" : "").'>'.$span.$value->title.'</option>';
		if($logic){
			
			$count = db("Pages::Pages")->language()->stores()->where(array_merge($where,["parent_id" => $value->id]))->where("id","!=",$ingore)->count();

			if($count > 0){

				pages_options($select, array_merge($where,["parent_id" => $value->id]), $logic, $ingore,  $span." - ");
			}
		}
	}
}


function getPageType($select=""){
	
}