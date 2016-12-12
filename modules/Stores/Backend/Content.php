<?php
namespace Modules\Stores\Backend;
use Remios\Apps\Admin;
class Content extends Admin
{
	
    public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
        dd("Index Disable");
    }

    function getTemplates(){
    	$data = db("Stores::Templates")->language()->stores()->get();
    	return views("stores-templates",["data" => $data]);
    }

    function getCreate(){
        $id = db("Stores::Templates")->insertGetId([
            "title" => "New Document",
            "language"  => getLanguage(),
            "stores_id" => getStores(),
            "users_id"  => getAuth(),

            ]);
        return redirect("stores/content/edit/".$id)->with("success", lang("pages.home.success_create"));
    }
}