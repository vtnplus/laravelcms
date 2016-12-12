<?php
function pages_shortcode($atts = [], $content=""){
			extract( shortcode_atts( array(
		      "type"    => "blogs",
		      "layout"	=> "",
		      "xclass"  => "col-sm-5c col-xs-12 margin-bottom-30",
		      "pclass"	=>	"row",
		      "limit"	=>	"20",
		      "order"	=>	"id,desc",
		      "search"	=>	"",
		      "tags"	=>	false,
		      "parent"	=> 0,
		      
		    ), $atts ) );
			
			

		    $data = db("Pages::Pages")->language()->stores()->where("parent_id",$parent)->get();
		    $html = [];
		    $html[] = '<ul class="list-group">';
		    foreach ($data as $key => $value) {
		    	 $html[] = '<li class="list-group-item"><a href="'.$value->links(true).'">'.$value->title.'</a></li>';
		    }
		     $html[] = '</ul>';
		     return implode($html,"\n");

}

add_shortcode("pages","pages_shortcode");

function getPagesRouter($select=""){
	$thml = [];
	
	foreach (config("register.router") as $key => $value) {
		$thml[] =  '<option value="'.$key.'" '.($key == $select ? "selected" : "").'>'.$value.'</option>';
	}

	return implode($thml, "\n");


}