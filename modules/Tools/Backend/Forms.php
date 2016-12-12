<?php
namespace Modules\Tools\Backend;
use Remios\Apps\Admin;
class Forms extends Admin
{
	

	function getIndex($module="",$controllder="", $filter=""){
		$tables = app("db")->select('SHOW TABLES');
        $folders_loca = glob(base_path("modules/*"));
        $rsfech = [];
        $module_local = [];$rfech = null;
        if($module){
        	$module_local = glob(base_path("modules/{$module}/Backend/*.php"));
        }
        if($controllder){
        	$file = base_path("modules/{$module}/Views/admin/".strtolower($module)."-".strtolower($controllder));
        	$fechData = file_get_contents($file);
        	$fechData = explode('<!--ViewHeader-->', $fechData);
        	
        	$rfech = $fechData[1];
        	preg_match_all("/<td data-field=\"(.*)\">(.*)<\/td>/",$rfech,$out, PREG_SET_ORDER);
        	$rsfech = [];
        	
        	
        		foreach ($out as $key => $value) {
	        		
	        		@list($id,$format,$align) = explode(",", $value[1]);
	        		$align = (!$align ? "left" : $align);

	        		$rsfech[$id] = [$format,$align];
        		}
        	
        }
    	return views("forms-modules",["tables" => $tables, "folders_loca" => $folders_loca, "module_local" => $module_local,"select_f" => $module, "select_c" => $controllder, "rfech" => $rsfech]);
    }


    function postIndex($module="",$controllder="", $filter=""){
    	$field = input("field");
    	$format = input("format");
    	$align = input("align");
    	$header = []; $list = [];
    	$header[] 	= '<!--ViewHeader-->';
    	$list[]		= '<!--ViewContent-->';
        


    	foreach ($field as $key => $value) {
            $lang = strtolower($module).'.'.str_replace('.php','',strtolower($controllder)).'.'.$value;
    		 $header[] = '
            <td data-field="'.$value.','.$format[$key].','.strtolower($align[$key]).'"><?php echo lang("'.$lang.'");?></td>';
            $list[] = '
            <td'.(strtolower($align[$key]) != "left" ? ' class="text-'.strtolower($align[$key]).'"' : "").'><?php echo $value->'.$value.';?></td>';
    	}
    	$header[] = '<!--ViewHeader-->';
    	$list[]		= '<!--ViewContent-->';


    	$file = base_path("modules/{$module}/Views/admin/".strtolower($module)."-".strtolower($controllder));
    	$fechData = file_get_contents($file);
    	$fechData = explode('<!--ViewHeader-->', $fechData);
        $fechData[1] = implode($header, "\n");

        $fechData = implode($fechData,"");
        $fechData = explode('<!--ViewContent-->', $fechData);
        $fechData[1] = implode($list, "\n");

        files()->put($file, implode($fechData,""));
        
    }



    function getEditcontrol($module="",$controllder="", $filter=""){
    	$folders_loca = glob(base_path("modules/*"));
        $module_local = [];$rfech = null;
        if($module){
        	$module_local = glob(base_path("modules/{$module}/Backend/*.php"));
        }
        if($controllder){
        	$file = base_path("modules/{$module}/Views/admin/".strtolower($module)."-".strtolower($controllder));
        	$file = str_replace('.php', '-edit.php', $file);
        	$fechData = file_get_contents($file);
        	$fechData = explode('<!--ViewHeader-->', $fechData);
        	
        	$rfech = $fechData[1];
        	preg_match_all("/<div class=\"form-group\" data-field=\"(.*)\">/",$rfech,$out, PREG_SET_ORDER);
        	
        	$rsfech = [];
        	
        	
        		foreach ($out as $key => $value) {
	        		
	        		@list($id,$format,$requice,$helper,$editer) = explode(",", $value[1]);
	        		
	        		$rsfech[$id] = [$format,$requice,$helper,$editer];
        		}
        	
        }
        
    	return views("forms-modules-edit",["folders_loca" => $folders_loca, "module_local" => $module_local,"select_f" => $module, "select_c" => $controllder, "rfech" => $rsfech]);
    }


    function postEditcontrol($module="",$controllder="", $filter=""){
    	$field = input("field");
    	$requice = input("requice");
    	$format = input("format");
    	$helper = input("helper");
    	$editer = input("editer");

    	$html = [];
    	$html[] = '<!--ViewHeader-->';
    	foreach ($field as $key => $value) {
    		if($value == "email"){
    			$format[$value] = "email";
    		}
    		if($value == "password"){
    			$format[$value] = "password";
    		}
    		if($value == "thumbs" || $value == "thumnail" || $value == "thumnails"){
    			$format[$value] = "img";
    		}

    		if($value == "seo_urls"){
    			$format[$value] = "render";
    		}

    		if($value == "groups_access" || $value == "groups"){
    			$format[$value] = "select";
    		}


    		if($value == "sorts" || $value == "views" || $value == "stores_id" || $value == "users_id" || $value == "parent_id" || $value == "status"){
    			$format[$value] = "number";
    		}

    		
    		
            $lang = strtolower($module).'.'.str_replace('.php','',strtolower($controllder)).'.'.$value;

    		$html[] = '
    		<!--'.ucfirst($value).' -->
		    <div class="form-group" data-field="'.$value.',input,'.(@$requice[$value] ? 1 : 0).','.(@$helper[$value] ? 1 : 0).','.(@$editer[$value] ? 1 : 0).'">
		        <label for="input'.ucfirst($value).'" class="col-sm-2 control-label"><?php echo lang("'.$lang.'");?></label>
		        <div class="col-sm-10">';
		    switch($format[$value]){
		    	case "input":
		    	case "text" :
		    	$html[] = '<input type="text" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>">';
		    	break;
		    	

		    	case "number" :
		    	$html[] = '<input type="number" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>">';
		    	break;

		    	case "textarea":
		    	$html[] = '<textarea style="height:300px;"'.(@$editer[$value] == 1 ? ' data-editer="tinymce"' : "").' type="text" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><?php echo data($data->'.$value.',null);?></textarea>';
		    	break;

		    	case "radio":
		    	case "checkbox":
		    	$html[] = '<input type="'.$format[$value].'" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>"> <?php echo lang("'.$lang.'_placeholder");?>';
		    	break;


		    	case "image":
		    	case "images":
		    	case "img":
		    	$html[] = '<div class="input-group"><input type="text" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Select Image!</button></span></div>';
		    	break;


		    	case "render":
		    	$html[] = '<div class="input-group"><input type="text" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Render!</button></span></div>';
		    	break;


		    	case "email":
		    	$html[] = '<div class="input-group"><input type="email" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Validate!</button></span></div>';
		    	break;


		    	case "password":
		    	$html[] = '<div class="input-group"><input type="password" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Random!</button></span></div>';
		    	break;


		    	case "select":
		    	$html[] = '<select class="form-control selectpicker" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").'>
		    				<option value="<?php echo data($data->'.$value.',null);?>"><?php echo data($data->'.$value.',null);?></option>
		    			</select>';
		    	break;

		    	default:
		    		$html[] = '<input type="text" class="form-control" id="input'.ucfirst($value).'" name="'.$value.'"'.(@$requice[$value] == 1 ? " requiced" : "").' value="<?php echo data($data->'.$value.',null);?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>">';
		    	break;
		    }
		    


		    if(@$helper[strtolower($value)] == 1){
		    	$html[] = '<span class="help-block"><?php echo lang("'.$lang.'_help");?></span>';
		    }
		    $html[] = '
		    	</div>
		    </div>
    		';
    	}
    	$html[] = '<!--ViewHeader-->';

    	if($controllder){
        	$file = base_path("modules/{$module}/Views/admin/".strtolower($module)."-".strtolower($controllder));
        	$file = str_replace('.php', '-edit.php', $file);
        	$fechData = file_get_contents($file);
        	$fechData = explode('<!--ViewHeader-->', $fechData);
        	$fechData[1] = implode($html, "\n");
        	
        	files()->put($file, implode($fechData,""));
        }

    	
    }





    /*
    Cutoms Posts Form
    */

    function getPosts(){
        return views("posts-control");
    }
}