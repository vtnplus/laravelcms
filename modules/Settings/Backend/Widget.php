<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Widget extends Admin
{
	public function __construct()
    {
    	
    	
    	if(user()->is_admin != 1){	
    		
    		return redirect(admin_url("account/profiles",false))->with("error", "You Are Not Access")->send();
    		
    	}
    	parent::__construct();
    }
	function getIndex(){
		return $this->getManager();
	}

	function getManager($target="", $filter=""){
		$data = app()->getWidgets();
		$target = explode('|', $target);
		return views("widget-manager",["data" => $data, "target" => $target, "object" => $this]);
	}

	function getInstall(){
		$target = input("target");
		$namespace = input("name");
		if(class_exists($namespace) && method_exists($namespace, "register")){
			$info = with(new $namespace)->register();
			$target = explode('|', $target);
			foreach ($target as $key => $value) {
				$sorts = db("Settings::Widgets")->stores()->language("null")->where("targets","widgets-".$value)->count() + 1;
				if(trim($value)){
					db("Settings::Widgets")->insert([
						"language" => getLanguage(),
						"stores_id"	=> getStores(),
						"namespace"	=> $namespace,
						"title"	=> $info["name"],
						"icons"	=> $info["icons"],
						"targets" => "widgets-".$value,
						"sorts"	=> $sorts
					]);
				}
			}
			return redirect(admin_url("settings/widget/manager/".input("target"),false))->with("success", lang("pages.home.success_insert"));
			
		}

	}

	function getDelete($id=0, $fillter=""){
		db("Settings::Widgets")->find($id)->delete();

		return redirect()->back()->with("success", lang("pages.home.success_delete"));
	}


	function postSorts(){
		$item = input("item");
		foreach ($item as $key => $value) {
			$data = db("Settings::Widgets")->stores()->language("null")->find($value);
			if($data){
				$data->sorts = ($key + 1);
				$data->save();
			}
		}
	}

	function postEdit(){
		$id = input("id");
		$data = db("Settings::Widgets")->stores()->language("null")->find($id);
		if($data){
			$data->title = input("title");
			$data->icons = input("icons");
			$data->language = input("language");
			$data->content = serialize(input("content"));
			$data->save();
		}
	}
	function getWindgetInslidebar($key){
		$data = db("Settings::Widgets")->stores()->language("null")->where("targets", "widgets-".$key)->orderBy("sorts","ASC")->get();
		return $data;
	}
}