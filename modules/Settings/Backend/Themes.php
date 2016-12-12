<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Themes extends Admin
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
        $list = glob(base_path("contents/templates/*"));
        foreach ($list as $key => $value) {
            //if(!file_exists($value."/system.txt")){
                $modules[] = $value;
            //}
        }

        $new_themes = json_decode(file_get_contents(config("server.themes") ? config("server.themes") : "http://vtnplus.com/themes.php"));
		return views("settings-themes",["data" => $modules, "new_themes" => $new_themes]);
    }

    function getInstall(){
        $themes = input("target");
        /*
        Run INstall SQL
        */
        $path_s = base_path("contents/templates/".config("site.templates")."/");
        if(files()->exists($path_s."uninstall.sql")){
            db_restore($path_s."uninstall.sql", false);
        }

        $read = db("Settings::Settings")->language()->where("name", "templates")->first();
        if($read){
            $read->data = $themes;
            $read->save();
        }else{
            db("Settings::Settings")->insert(["name" => "templates", "data" => $themes, "stores_id" => getStores(), "language" => getLanguage()]);
        }

        with(new Home)->makeConfig();

        /*
        Run INstall SQL
        */
        $path_s = base_path("contents/templates/".$themes."/");
        if(files()->exists($path_s."install.sql")){
            db_restore($path_s."install.sql", false);
        }

        return redirect()->back()->with("success", lang("settings.success_install"));
    }

    
}