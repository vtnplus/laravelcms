<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Home extends Admin
{
	public function __construct()
    {
        
        
        if(user()->is_admin != 1){  
            
            return redirect(admin_url("account/profiles",false))->with("error", "You Are Not Access")->send();
            
        }
        parent::__construct();
    }

	function getIndex($a=""){
        $read = db("Settings::Settings")->language()->stores()->get();
        
        $data = new \stdClass();
        foreach ($read as $key => $value) {
            $data->{$value->name} = is_serialized($value->data) ? unserialize($value->data) : $value->data;
        }

    	return views("settings",["data" => $data]);
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

    	$this->makeConfig();
    	return redirect()->back()->with("success", lang("settings.success_delete"));
    }

    public function makeConfig(){
    	$read = db("Settings::Settings")->get();
    	$data = [];
    	foreach ($read as $key => $value) {
    		$data[$value->name] = is_serialized($value->data) ? unserialize($value->data) : $value->data;
    	}
    	
    	files()->put(base_path("profiles/config.php"),'<?php return '."\n".var_export($data,true)."\n".'?>');
        //$this->makeCacheRouter();
    }

    public function makeCacheRouter(){
        

        $data = db("Pages::Pages")->stores()->language()->where("as_router",1)->groupBy("seo_urls")->get();

        $code = [];
        $code[] = '<?php ';
        foreach ($data as $key => $value) {
            $router = str_replace(['.php','.html'], '', $value->seo_urls);
            $code[] = '
                config(["register.router.'.$router.'" => "'.$router.'"]);
                $app->get("'.$router.'/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("'.$router.'.html/".$first, $nums_agrs));
                });

                $app->get("'.$router.'",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["'.$router.'.html"]);
                });

            ';
        }

        files()->put(base_path("profiles/router.php"),implode($code, "\n"));
    }
}
?>