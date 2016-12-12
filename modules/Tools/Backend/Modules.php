<?php
namespace Modules\Tools\Backend;
use Remios\Apps\Admin;
class Modules extends Admin
{
	

	function getIndex($a=""){

		$tables = app("db")->select('SHOW TABLES');
        $folders_loca = glob(base_path("modules/*"));
    	return views("modules-create",["tables" => $tables, "folders_loca" => $folders_loca]);
    }

    function postIndex($a=""){
    	$folder = ucfirst(input("folder"));
    	$name = input("name");
    	$controller = ucfirst(input("controller"));

        /*
        Gender Database
        */
        $table = input("tables");
    	$setpath = base_path("modules/{$folder}");
    	$folders = [
    		"",
    		"Views",
    		"Views/admin",
    		"Backend",
    		"Frontend",
    		"Models",
            "language",
    	];

    	foreach ($folders as $key => $value) {
    		if(!is_dir($setpath."/".$value)){
    			files()->makeDirectory($setpath."/".$value, 0775, true);
    		}
    		
    	}


        $formlist = $this->makeFormList($table,$folder,$controller);
        $viewfile = strtolower($folder)."-".strtolower($controller);
    	$controllers = [
    		$setpath."/Backend/{$controller}.php" => $this->makeModules("backend.txt",
                        ["{folder}","{controller}","{views}","{models}","{editter_maps}","{lang}"],
                        [$folder,$controller,$viewfile,ucfirst($table), $this->FieldEditMaps($table), strtolower($folder.'.'.$controller)]
                    ),
    		$setpath."/Frontend/{$controller}.php" => $this->makeModules("frontend.txt",["{folder}","{controller}","{views}"],[$folder,$controller,$viewfile]),

    		$setpath."/Views/".strtolower($controller).".php" => $this->makeModules("frontend-view.txt",["{folder}","{controller}","{views}"],[$folder,$controller,strtolower($controller)]),
    		
            $setpath."/Views/admin/".$viewfile.".php" => $this->makeModules("backend-view.txt",
                            [   
                                "{folder}",
                                "{controller}",
                                "{views}",
                                "{name}",
                                "{formlistHeader}",
                                "{formlistContent}",
                                "{links}",
                                "{PRIKEY}",
                                "{formsearch}",
                                "{lang}"
                            ],
                            [
                                $folder,
                                $controller,
                                strtolower($controller),
                                $name,
                                $formlist["header"],
                                $formlist["content"],
                                strtolower($folder)."/".strtolower($controller),
                                $formlist["prikey"], 
                                $this->loadSearchForm($table),
                                strtolower($folder.'.'.$controller)
                            ]
                    ),
            
            $setpath."/Views/admin/".$viewfile."-edit.php" => $this->makeModules("backend-edit.txt",
                        ["{folder}","{controller}","{views}","{name}","{formedit}","{lang}","{links}"],
                        [$folder,$controller,strtolower($controller), $name, $this->makeFormEdit($table, $folder, $controller), strtolower($folder.'.'.$controller), strtolower($folder.'/'.$controller)]
                    ),
    		
    		$setpath."/register.php" => $this->makeModules("register.txt",
                        ["{content}","{name}"],
                        [$this->registerMenuAdmin($setpath."/register.php",$folder."/".$controller), $name]
                    ),
            $setpath."/language/".strtolower($controller).".php" => $this->makeModules("language.txt",["{content}","{name}"],[$this->makeLanguage($table, $folder), $name]),
    	];

        /*
        Set Render Models
        */
        if(input("rendermodel") == 1){
            $controllers[$setpath."/Models/".ucfirst($table).".php"] = $this->makeModules("models.txt",
                    ["{folder}","{controller}","{table}","{content}"],
                    [$folder,ucfirst($table),strtolower($table), $this->makeModels($table, input("scopes"), input("setmethod"))]
                );
        }

    	foreach ($controllers as $key => $value) {
    		files()->put($key, $value);
    	}

    	return redirect()->back();
    }


    function makeModules($file="", $search=[], $replace=[]){
    	$data = file_get_contents(__DIR__."/zone/{$file}");
    	$data = str_replace($search, $replace, $data);
    	return $data;
    }
    

    function makeModels($table, $scopes=false, $setMethod=false){
       
        $tables = app("db")->select('SHOW COLUMNS FROM '.$table);
        $scope = [];


        if($scopes){
        foreach ($tables as $key => $value) {
            if($value->Key != "PRI" && $value->Field != "language" && $value->Field != "stores" && $value->Field != "auth" && $value->Field != "users" && $value->Field != "status"){
    $scope[] = '
    /*
    Scope '.ucfirst($value->Field).'
    */
    public function scope'.ucfirst($value->Field).'($query, $type)
        {
            return $query->where("'.$value->Field.'", $type);
        }';
            }
        }
        }

        if($setMethod){
        foreach ($tables as $key => $value) {
            if($value->Key != "PRI"){
    $scope[] = '
    /*
    Set '.ucfirst($value->Field).'
    */
    public function set'.ucfirst($value->Field).'($query, $type)
        {
            $query->'.$value->Field.' = $type;
            return $query;
        }';
            }
        }
        }


        return implode($scope, "\n");
        
    }


    function makeFormEdit($table,$module="", $controllder=""){
       
        $tables = app("db")->select('SHOW COLUMNS FROM '.$table);
        $scope = [];

        foreach ($tables as $key => $value) {
            $lang = strtolower($module).'.'.str_replace('.php','',strtolower($controllder)).'.'.strtolower($value->Field);
            if($value->Key != "PRI"){
                $format = $this->valiedateFormat($value->Type);
    $scope[] = '
    <!--'.ucfirst($value->Field).' -->
    <div class="form-group" data-field="'.$value->Field.','.$format.',requice">
        <label for="input'.ucfirst($value->Field).'" class="col-sm-2 control-label"><?php echo lang("'.$lang.'");?></label>
        <div class="col-sm-10">';

        

        if($format == "input"){
            if($value->Field == "email"){
                $scope[] = '        <div class="input-group"><input type="email" class="form-control" id="input'.ucfirst($value->Field).'" name="'.$value->Field.'" value="<?php echo data($data->'.$value->Field.');?>" placeholder="Enter '.$value->Field.'"><span class="input-group-btn"><button class="btn btn-default" type="button">Kiểm tra!</button></span></div>';
            }elseif($value->Field == "thumbnail" || $value->Field == "thumbs" || $value->Field == "image" || $value->Field == "images" || $value->Field == "img"){
                $scope[] = '        <div class="input-group"><input type="email" class="form-control" id="input'.ucfirst($value->Field).'" name="'.$value->Field.'" value="<?php echo data($data->'.$value->Field.');?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Select Image!</button></span></div>';
            }elseif($value->Field == "password"){
                $scope[] = '        <div class="input-group"><input type="password" class="form-control" id="input'.ucfirst($value->Field).'" name="'.$value->Field.'" value="<?php echo data($data->'.$value->Field.');?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><span class="input-group-btn"><button class="btn btn-default" type="button">Random!</button></span></div>';
            }else{
                $scope[] = '        <input type="text" class="form-control" id="input'.ucfirst($value->Field).'" name="'.$value->Field.'" value="<?php echo data($data->'.$value->Field.');?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>">';
            }
            
        }elseif($format == "text"){
            $scope[] = '        <textarea style="height:300px;" class="form-control" id="input'.ucfirst($value->Field).'" name="'.$value->Field.'"  placeholder="<?php echo lang("'.$lang.'_placeholder");?>"><?php echo data($data->'.$value->Field.');?></textarea>';
        }elseif ($format == "number" || $format == "float") {
            $scope[] = '        <input type="number" class="form-control" id="input'.ucfirst($value->Field).'" name="'.$value->Field.'" value="<?php echo data($data->'.$value->Field.');?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>">';
        }elseif ($format == "timestamp") {
            $scope[] = '        <input type="timestamp" class="form-control" id="input'.ucfirst($value->Field).'" name="'.$value->Field.'" value="<?php echo data($data->'.$value->Field.');?>" placeholder="<?php echo lang("'.$lang.'_placeholder");?>">';
        }


    
    $scope[] = '    </div>
    </div>
   ';
            }
        }
         $scope[] = '';
        return implode($scope, "\n");
        
    }


    function makeFormList($table,$module="", $controllder=""){
       
        $tables = app("db")->select('SHOW COLUMNS FROM '.$table);
        $header = []; $list = [];$prikey = "id";

        foreach ($tables as $key => $value) {
             $lang = strtolower($module).'.'.str_replace('.php','',strtolower($controllder)).'.'.strtolower($value->Field);
             $format = $this->valiedateFormat($value->Type);
            if($format != "text"){
            $header[] = '
            <td data-field="'.$value->Field.','.$format.'"><?php echo lang("'.$lang.'");?></td>';
            $list[] = '
            <td><?php echo data($value->'.$value->Field.');?></td>';
            }
            if($value->Key == "PRI"){
                $prikey = $value->Field;
            }
            
        }
        
        return ["header" => implode($header, "\n"), "content" => implode($list, "\n"), "prikey" => $prikey];
        
    }


    private function makeLanguage($table, $module=""){
         $tables = app("db")->select('SHOW COLUMNS FROM '.$table);
         $language = [];
         foreach ($tables as $key => $value) {
            $language[] = '
/*
Database : '.$table.'
Field : '.$value->Field.'
*/
';
            $language[] = '"'.strtolower($value->Field).'" => "'.str_replace('_',' ',ucfirst($value->Field)).'",';
            $language[] = '"'.strtolower($value->Field).'_placeholder" => "Enter '.str_replace('_',' ',ucfirst($value->Field)).'",';
            $language[] = '"'.strtolower($value->Field).'_help" => "Help '.str_replace('_',' ',ucfirst($value->Field)).'",';
            $language[] = '"'.strtolower($value->Field).'_requice" => "Requice '.str_replace('_',' ',ucfirst($value->Field)).'",';
            $language[] = "";
            $language[] = "";
         }

         return implode($language, "\n");
    }


    /*
    Render Menu Register
    */

    private function registerMenuAdmin($files="",$url=""){
        if(file_exists($files)){
            $read = require($files);
        }else{
            $read = [
                "leftmenu" => [
               
                "name" => "New Modules",
                "icons" =>  "",
                "contents" => []
                ],
                "topmenu" => [
                    
                    "name" => "New Modules",
                    "icons" =>  "",
                    "contents" => []
                ]
            ];
        }
        if(input("register-left") && isset($read["leftmenu"])){
            $read["leftmenu"]["contents"] = array_merge($read["leftmenu"]["contents"],[strtolower($url) => input("name")]);
        }
        if(input("register-top") && isset($read["topmenu"])){
            $read["topmenu"]["contents"] = array_merge($read["topmenu"]["contents"],[strtolower($url) => input("name")]);
        }
        
        if(isset($read["leftmenu"])){
        $html = '"leftmenu" => [
                    
                    "name" => "'.$read["leftmenu"]["name"].'",
                    "icons" =>  "'.$read["leftmenu"]["icons"].'",
                    "contents" => [';
                    foreach ($read["leftmenu"]["contents"] as $key => $value) {
                        $html .= '"'.$key.'" => "'.$value.'",';
                    }
        $html .= '            ],
                    "sort"  => "'.substr(str_slug($read["leftmenu"]["name"]),0,1).'"
                ],';
        }
        if(isset($read["topmenu"])){
        $html .= '        "topmenu" => [
                    
                    "name" => "'.$read["topmenu"]["name"].'",
                    "icons" =>  "'.$read["topmenu"]["icons"].'",
                    "contents" => [';
                    foreach ($read["topmenu"]["contents"] as $key => $value) {
                        $html .= '"'.$key.'" => "'.$value.'",';
                    }
        $html .= '],
                "sort"  => "'.substr(str_slug($read["topmenu"]["name"]),0,1).'"
                ]';
        }
        return $html;
    }




    private function loadSearchForm($table="", $url=""){
        $html = '

            <div class="row">
                
                <div class="col-lg-8 col-xs-12">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="<?php echo lang("global.placeholder_search");?>">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> <?php echo lang("global.btn_search");?></button>
                      </span>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-8">
                    <div class="input-group">
                    <select class="form-control selectpicker" name="filter">
                    <!--filter-->
                    ';
                    $tables = app("db")->select('SHOW COLUMNS FROM '.$table);
                    foreach ($tables as $key => $value) {
                        $html .= '
                        <option value="'.$value->Field.'">'.$value->Field.'</option>';
                    }
         $html .= ' 
                    <!--filter-->           
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>
                    </div>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-sort"></i></button>
                </div>

            </div>

        ';

        return $html;
    }




    private function FieldEditMaps($table, $module=""){
         $tables = app("db")->select('SHOW COLUMNS FROM '.$table);
         $html = [];
         foreach ($tables as $key => $value) {
            if($value->Key != "PRI"){
                $html[] = 'if(input("'.$value->Field.'")) $data->'.$value->Field.'     =   input("'.$value->Field.'");';
            }
         }

         return implode($html, "\n\n\t\t\t");

    }
    private function valiedateFormat($type){
        $rformat = false;
        
        if(strpos($type,"varchar")  !== false){
            $rformat = "input";
        }


        if(strpos($type,"text")  !== false){
            $rformat = "text";
        }

        if(strpos($type,"int") !== false){
            $rformat = "number";
        }
        if(strpos($type,"float") !== false){
            $rformat = "float";
        }
        if(strpos($type,"timestamp") !== false || strpos($type,"datetime") !== false){
            $rformat = "timestamp";
        }
        return $rformat;
    }


}
?>