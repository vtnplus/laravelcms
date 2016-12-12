<?php
namespace Modules\Stores\Backend;
use Remios\Apps\Admin;
use Modules\Settings\Backend\Home as SettiingHome;
class Home extends Admin
{
	var $_server = 'http://laravelcms.net';

	function getIndex($a=""){
        $read = db("Settings::Settings")->language()->stores()->get();
        
        $data = new \stdClass();
        foreach ($read as $key => $value) {
            $data->{$value->name} = is_serialized($value->data) ? unserialize($value->data) : $value->data;
        }

    	return views("stores-settings",["data" => $data]);
    }

    function postIndex(){
    	$data = input("config");
    	foreach ($data as $key => $value) {
    		$read = db("Settings::Settings")->language()->where("name", $key)->first();
    		if($read){
    			$read->data = (is_array($value) ? serialize($value) : $value);
    			$read->save();
    		}else{
    			db("Settings::Settings")->insert(["name" => $key, "data" => (is_array($value) ? serialize($value) : $value), "stores_id" => getStores(), "language" => getLanguage()]);
    		}
    	}

    	with(new SettiingHome)->makeConfig();
    	return redirect()->back()->with("success", lang("settings.success_delete"));
    }

    function getResetdata(){
        if(user()->is_admin == 1){
            $local = with(new \Remios\Utils\Database\Backups);
            $local->truncate("pages");
            $local->truncate("posts");
            $local->truncate("navigation");
            $local->truncate("widgets");
            return redirect()->back()->with("success", lang("settings.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("settings.error_delete"));
        }
    }


    function getSampledata(){
        $this->getResetdata();
        
        $data = file_get_contents($this->_server."/sample/".config("site.solution").".sql");
        files()->put(base_path("contents/backups/sample.sql"), $data);

        return redirect()->back()->with("success", lang("settings.success_delete"));
    }
}
?>