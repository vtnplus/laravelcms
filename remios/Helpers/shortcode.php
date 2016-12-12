<?php
/*
Shortcode Function
*/
if(!function_exists("add_shortcode")){
    function add_shortcode($key,$function,$cmd=''){
      
        app("shortcode")->add($key,$function,$cmd);
    }
}



if(!function_exists("do_shortcode")){
    function do_shortcode($contents){
       $destop = false;
        if(config("sites.mobiles_as") == "destop"){
          $destop = true;
        }

        if(config("sites.tablets_as") == "destop"){
          $destop = true;
        }

        if($destop){
          $contents = str_replace(['col-md-','col-lg-','col-sm-'],'col-xs-',$contents);
        }
        
        return app("shortcode")->run($contents);
    }
}

if(!function_exists("shortcode_atts")){
    function shortcode_atts($pairs, $atts){
        return app("shortcode")->shortcode_atts($pairs, $atts);
    }
}


function bs_attribute_map($str, $att = null) {
  $res = array();
  $return = array();
  $reg = app("shortcode")->get_shortcode_regex();
  preg_match_all('~'.$reg.'~',$str, $matches);
  foreach($matches[2] as $key => $name) {
    $parsed = app("shortcode")->shortcode_parse_atts($matches[3][$key]);
    $parsed = is_array($parsed) ? $parsed : array();
    $res[$name] = $parsed;
    $return[] = $res;
  }
  return $return;
}


?>