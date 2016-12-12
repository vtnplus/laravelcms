<?php
if(!function_exists("pages")){
    function pages($obj, $append=[]){
        if(method_exists($obj, "render")){
            
            if($append){
                $obj->appends($append);
            }
            echo $obj->render();
        }
    }
}





function db_backups($path="", $table=true, $data=true){
	$db = with(new Remios\Utils\Database\Backups)->saveOutput($path);
}

function db_restore($file=""){
	sql_import_file($file, false);
}


if(!function_exists("sql_import_file")){
	function sql_import_file($files = null, $backup=true){
		$db = with(new Remios\Utils\Database\Backups);
		if($backup) $db->save();
		if (files()->exists($files)) {
            
            $sql_query = fread(fopen($files, 'r'), filesize($files)) or die('problem ' . __FILE__ . __LINE__);
            $sql_query = str_ireplace('{stores_id}', config("site.stores_id"), $sql_query);
            $sql_query = $db->remove_sql_remarks($sql_query);
            $sql_query = $db->remove_comments_from_sql_string($sql_query);
            $sql_query = $db->split_sql_file($sql_query, ';');
            
            foreach ($sql_query as $sql) {
                $sql = trim($sql);

                \DB::statement($sql);

            }
        }
	}
}


if(!function_exists("sql_truncate")){
	function sql_truncate(){
		with(new Remios\Utils\Database\Backups)->truncate();
	}
}

if(!function_exists("sql_query")){
	function sql_query($sql_query = null){
		if(!$sql_query) return false;
		$db = with(new Remios\Utils\Database\Backups);
		
        $sql_query = str_ireplace('{stores_id}', config("sites.stores_id"), $sql_query);
        $sql_query = $db->remove_sql_remarks($sql_query);
        $sql_query = $db->remove_comments_from_sql_string($sql_query);
        $sql_query = $db->split_sql_file($sql_query, ';');
       
        foreach ($sql_query as $sql) {
            $sql = trim($sql);

            \DB::statement($sql);

        }
        
	}
}
