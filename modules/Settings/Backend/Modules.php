<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Modules extends Admin
{
	
    public function __construct()
    {
        
        
        if(user()->is_admin != 1){  
            
            return redirect(admin_url("account/profiles",false))->with("error", "You Are Not Access")->send();
            
        }
        parent::__construct();
    }
	function getIndex($a=""){
        $modules = [];
        $list = glob(base_path("modules/*"));
        foreach ($list as $key => $value) {
            if(!file_exists($value."/system.txt")){
                $modules[] = $value;
            }
        }
		return views("settings-modules",["data" => $modules]);
    }

    function getInstall(){
        $modules = input("target");
        $path_s = base_path("modules/".$modules."/");
        $path_file = $path_s."active.txt";
        files()->put($path_file,"");
        
        if(files()->exists($path_s."install.sql")){
            db_restore($path_s."install.sql", false);
        }

        return redirect()->back()->with("success", lang("settings.success_install"));
    }

    function getUninstall(){
        $modules = input("target");
        $path_s = base_path("modules/".$modules."/");
        $path_file = $path_s."active.txt";
        files()->delete($path_file,"");

        if(files()->exists($path_s."uninstall.sql")){
            db_restore($path_s."uninstall.sql", false);
        }

        return redirect()->back()->with("success", lang("settings.success_uninstall"));
    }
}