<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Language extends Admin
{
	
    public function __construct()
    {
        
        
        if(user()->is_admin != 1){  
            
            return redirect(admin_url("account/profiles",false))->with("error", "You Are Not Access")->send();
            
        }
        parent::__construct();
    }
	
    function getIndex($id="", $filter=""){
        $read = [];
        if($id){
            $read = db("Settings::Languages")->find($id);
        }
        
        $language = db("Settings::Languages")->get();
        
        $new_themes = json_decode(file_get_contents(config("server.themes") ? config("server.themes") : "http://vtnplus.com/themes.php"));

		return views("settings-language",["data" => $language, "read" => $read, "new_themes" => $new_themes]);

    }


    function postSavedata(){
        $id = input("id");
        $data = db("Settings::Languages")->find($id);

        if($data){
            $data->name = input("name");
            $data->folder = strtolower(input("folder"));
            $data->country_code = input("country_code");
            $data->language_code = input("language_code");
            $data->save();
        }else{
            db("Settings::Languages")->insert(["name" => input("name"), "folder" => input("folder"), "country_code" => input("country_code"), "language_code" => input("language_code")]);
        }
       
        return redirect(admin_url("settings/language", false))->with("success", lang("settings.success_install"));
    
    }



    function getMake(){
        $id = input("target");
        $data = db("Settings::Languages")->find($id);
        $path = base_path("contents/language/".$data->folder);
        $path_default = base_path("contents/language/".config("site.language","vn"));
        if(!is_dir($path)){
            files()->makeDirectory($path, 0775, true);
            files()->copyDirectory($path_default, $path);
        }
        
        return redirect(admin_url("settings/language", false))->with("success", lang("settings.success_install"));
    }


    function getDelete($id="", $filter=""){
        $data = db("Settings::Languages")->find($id);

        if($data->folder != "vn" && $data->folder == config("site.language")){
            $path_dir = base_path("contents/language/".$data->folder);
            
            db("Posts::Posts")->where("language",$data->language_code)->delete();
            db("Pages::Pages")->where("language",$data->language_code)->delete();
            db("Settings::Widgets")->where("language",$data->language_code)->delete();
            db("Settings::Navigation")->where("language",$data->language_code)->delete();
            db("Catalog::Categories")->where("language",$data->language_code)->delete();

            

            files()->deleteDirectory($path_dir, false);
        }
        if($data->folder != "vn" && $data->folder == config("site.language")){
            $data->delete();
        }
        return redirect(admin_url("settings/language", false))->with("success", lang("settings.success_uninstall"));
    }

    function getStatus(){
        $id = input("target");
        $data = db("Settings::Languages")->find($id);
        $data->status = input("status");
        $data->save();
        return redirect(admin_url("settings/language", false))->with("success", lang("settings.success_install"));
    }


    function getDefault(){
        $themes = input("target");
        
        $read = db("Settings::Settings")->language()->where("name", "language")->first();
        if($read){
            $read->data = $themes;
            $read->save();
        }else{
            db("Settings::Settings")->insert(["name" => "language", "data" => $themes, "stores_id" => getStores(), "language" => getLanguage()]);
        }

        with(new Home)->makeConfig();

        return redirect()->back()->with("success", lang("settings.success_install"));
    }

    function getTranlaytext(){
        $text = input("text");
        $to = input("to");
        $form = input("form");
        return ucfirst(tranlation($text,$form,$to));
    }

    function getTranlaytion(){
        $id = input("target");
        $data = db("Settings::Languages")->find($id);
        $path = base_path("contents/language/".$data->folder);
        $roler_files = glob($path."/*.php");
        $files_data = [];
        if(input("files")){
            $files_data = require_once $path."/".input("files");
        }

        return views("settings-language-tranlattion",["data" => $roler_files,"folder" => $data->folder, "files" => $files_data, "tranlayto" => $data->language_code]);
    }
    function postTranlaytion(){
        $path = base_path("contents/language/".input("paths"));
        $data[] = "";
        $data[] = '<?php';
        $data[] = 'return[';
        $r = input("trans");
        foreach ($r as $key => $value) {
            $data[] = '"'.$key.'" => "'.$value.'",';
        }
        $data[] = '];';
        $data[] = '?>';
        files()->put($path, implode($data, "\n"));
        return redirect(admin_url("settings/language/tranlaytion?target=".input("target"),false))->with("success", lang("settings.success_install"));
    }
}