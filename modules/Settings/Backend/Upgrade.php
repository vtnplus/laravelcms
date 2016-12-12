<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Upgrade extends Admin
{
    public $_server = "http://laravelcms.net/upgrade.php";
	public function __construct()
    {
        
        
        if(user()->is_admin != 1 || user()->id != 1){  
            
            return redirect(admin_url("account/profiles",false))->with("error", "You Are Not Access")->send();
            
        }
        parent::__construct();
    }

	function getIndex($a=""){
        $modules = [];
        $systems = [];
        $list = glob(base_path("modules/*"));
        foreach ($list as $key => $value) {
            if(!file_exists($value."/system.txt")){
                $modules[] = $value;
            }else{
                $systems[] = $value;
            }
        }

    	return views("upgrade-systems",["modules" => $modules, "systems" => $systems]);
    }


    function getProcess($module="", $filter=""){
        $path_save = base_path("contents/upgrade/{$module}.zip");
        $server_path = $this->_server."?module=".$module;
        files()->put($path_save, file_get_contents($server_path));

        return redirect()->back()->with("success", "Updage success")->send();
    }
}