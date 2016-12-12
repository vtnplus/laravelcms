<?php
if(!function_exists("posts_shortcode")){
	function posts_shortcode($atts = [], $content=""){
			extract( shortcode_atts( array(
		      "type"    => "blogs",
		      "layout"	=> "",
		      "format"	=> false,
		      "active"  => false,
		      "xclass"  => "col-sm-5c col-xs-12 margin-bottom-30",
		      "pclass"	=>	"row",
		      "limit"	=>	"20",
		      "order"	=>	"updated_at,desc",
		      "search"	=>	"",
		      "tags"	=>	false,
		      "category"	=>	false,
		      "url"		=> "{type}/{seo_urls}",
		      "pages"	=>	false,
		      "maps"	=> false,
		      "related"	=> false,

		      "attr" => "data-fixheight",
		      "random"	=> false,
		      "userid" => false,
		    ), $atts ) );
			
			

		    $data = db("Posts::Posts",$type)->language()->stores()->where("status",1)->type($type);
		    
		    if($category){
		    	$data = $data->where("categories_id",$category);
		    }
		    
		    if($maps){
	   		
		   		$data = $data->where("pages_maps",'like', "%".$maps."%");
		   	}
		   	
		   	if($search){
		   		
		   		$data = $data->where("title",'like', "%".$search."%");
		   	}

		   	if($tags){
		   		
		   		$data = $data->where("tags",'like', "%".$tags."%");
		   	}


	   		if(intval($userid) > 0){
	   		
		   		$data = $data->where("users_id",'=', $userid);
		   	}

		   	if($related){
		   		
		   		$data = $data->whereIn("id",explode(',',$related));
		   	}
	   	
		    list($order_k, $order_v) = explode(',', $order);

		    if($random){
		    	$data = $data->orderByRaw("RAND()");
		    }else{
		    	$data = $data->orderBy(trim($order_k),trim($order_v));
		    }
		    
		    $data = $data->rows($limit,$pages);

		    if(!$layout){
			    if(view()->exists("shortcode.{$type}")){
			    	$layout = "shortcode.{$type}";
			    }else{
			    	if(!view()->exists($layout)){
			    		$layout = "shortcode.posts";
			    	}
			    }
			}
		    

			

		    return view($layout,[
		    	"data" => $data,
		    	"xclass"	=> $xclass,
		    	"pclass"	=> $pclass, 
		    	"pages" => $pages
		    	])->render();

	}
	add_shortcode("posts","posts_shortcode");
}

function getPostType($select=""){
	$thml = [];
	
	$data = db("Posts::Posts")->language()->stores()->groupBy("type")->get();
	foreach ($data as $key => $value) {
		$thml[] =  '<option value="'.$value->type.'" '.($value->type == $select ? "selected" : "").'>'.$value->type.'</option>';
	}

	return implode($thml, "\n");
}



