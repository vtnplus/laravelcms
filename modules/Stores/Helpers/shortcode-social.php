<?php
function social($atts = [], $content=""){
		extract( shortcode_atts( array(
	      "size"    => "",
	      "shadow"	=> false,
	      "circle"	=> false,
	      "class"	=>	"",
	    ), $atts ) );
	$size = ($size ? "azm-size-".$size : null);
	$options = config("site.social");
	
	if($shadow == "true"){
		$class .= "azm-long-shadow ";
	}
	if($circle == "true"){
		$class .= "azm-circle ";
	}

    $social = (is_array($options) ? $options : []);
    $code = [];
    foreach ($social as $key => $value) {
        if($key && $key != "private"){
        	$code[] = '<a href="'.$value.'" class="btn btn-social azm-social '.$size.' '.$class.' azm-r-square azm-'.$key.'"><i class="fa fa-'.$key.'"></i> '.($size == "" ? $key : "").'</a>';
        }   
    }
    return implode($code,"\n");
}
add_shortcode("social","social");