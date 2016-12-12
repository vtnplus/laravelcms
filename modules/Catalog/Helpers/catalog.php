<?php
function getCatalog($type="blogs", $selefted="", $where = [], $span=""){
	$where = array_merge(["type" => $type], $where);
	$data = db("Catalog::Categories")->stores()->language()->where($where)->get();
	foreach ($data as $key => $value) {
		echo '<option data-icon="glyphicon glyphicon-option-vertical" value="'.$value->id.'" '.($value->id == $selefted ? "selected" : "").'>'.$span.$value->title.'</option>';
		$count = db("Catalog::Categories")->stores()->language()->where(["parent_id" => $value->id])->count();
		if($count > 0){
			getCatalog($value->type, $selefted, ["parent_id" => $value->id],$span."- ");
		}
	}
}

function getCatalog_tree($type="blogs", $where=[], $option=[]){

	$selected = data(@$option["selected"]);
	$class = data(@$option["class"]);
	$xclass = data(@$option["xclass"]);
	$icons = data(@$option["icons"],"");
	$order = data(@$option["order"],"sorts,ASC");

	$where = array_merge(["type" => $type,"status" => 1], $where);

	list($orderBy, $orderType) = explode(",",$order);
	$data = db("Catalog::Categories")->stores()->language()->where($where)->orderBy($orderBy, $orderType)->get();
	echo '<ul class="'.$class.'">';
	foreach ($data as $key => $value) {
		$count = db("Catalog::Categories")->stores()->language()->where(["parent_id" => $value->id])->count();
		$ico = ($count > 0 ? '<span class="pull-right glyphicon glyphicon-menu-right"></span>' : "");
		echo '<li class="'.$xclass.'" value="'.$value->id.'" '.($value->id == $selected ? "selected" : "").'><a href="'.$value->links().'"><i class="'.$icons.'"></i> '.$value->title.$ico.'</a>';

		
		if($count > 0){
			getCatalog_tree($type,["parent_id" => $value->id],["class" => $class, "xclass" => $xclass,"order" => $order]);
		}
		echo '</li>';
	}
	echo '</ul>';
}




function catalog($atts = [], $content=""){
			extract( shortcode_atts( array(
		      "type"    => "blogs",
		      "layout"	=> "",
		      "xclass"  => "col-xs-12 margin-bottom-10",
		      "pclass"	=>	"row",
		      "limit"	=>	"20",
		      "order"	=>	"id,desc",
		      "search"	=>	"",
		      "tags"	=>	false,
		      "parent"	=>	false,
		      "url"		=> "{type}/{seo_urls}",
		      "maps"	=> false,
		      "related"	=> false,
		      "attr" => "data-fixheight",
		      "random"	=> false,
		      "icons"	=> ""
		    ), $atts ) );
		    
		    if($layout == ""){
		    	ob_start();
		    	getCatalog_tree($type,["parent_id" => 0],["class" => "vertical-group vertical","xclass" => "vertical-group-item","icons" => $icons]);
		    	$page = ob_get_contents();
   				ob_end_clean();
   				return $page;
		    }else{
		    	$where = ["type" => $type,"status" => 1];
		    	list($order_k, $order_v) = explode(',', $order);
		    	$data = db("Catalog::Categories")->stores()->language()->where($where)->orderBy(trim($order_k),trim($order_v));
		    	if($parent != null){
		    		$data = $data->where(["parent_id" => $parent]);
		    	}
		    	$data = $data->get();
		    	return view("shortcode.".$layout,["data" => $data,"type" => $type,"pclass" => $pclass,"xclass" => $xclass, "content" => $content])->render();
		    }
}
add_shortcode("catalog","catalog");



function getCatalogType($select=""){
	$thml = [];
	
	$data = db("Catalog::Categories")->language()->stores()->groupBy("type")->get();
	foreach ($data as $key => $value) {
		$thml[] =  '<option value="'.$value->type.'" '.($value->type == $select ? "selected" : "").'>'.$value->type.'</option>';
	}

	return implode($thml, "\n");
}

?>