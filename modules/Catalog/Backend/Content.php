<?php
namespace Modules\Catalog\Backend;
use Remios\Apps\Admin;
class Content extends Admin
{
	
    public function __construct()
    {
        register("javascript",[resources_url("globals/jquery.nestable.js")]);
        register("style",[resources_url("globals/jquery.nestable.css")]);
        parent::__construct();
    }
	function getIndex($type="blogs", $fillter="", $search=""){
        
		dd("Index Disable");
    }


    function getManager($type="blogs", $id="", $search=""){
        $data = db("Catalog::Categories")->language()->stores()->auth()->find($id);
    	return views("categories-manager",["type" => $type,"data" => $data]);
    }

    function getItems($type="blogs", $parent_id=0, $filter=""){
        $data = db("Catalog::Categories")->language()->stores()->auth()->where("parent_id",$parent_id)->where("type",$type)->orderBy("sorts","ASC");
        if($data->count() > 0){
           
            return views("categories-item",["data" => $data->get()]);
        }
        return "";
    }


    function postManager($type="blogs", $id=0, $filter=""){
        if(input("update") == 1){
            $data = db("Catalog::Categories")->language()->stores()->auth()->find($id);
            if($data){
                $data->title = input("title");
                $data->content = input("content");
                $data->options = input("options",true);
                $data->icons = input("icons");
                $data->pin = input("pin");
                $data->seo_urls = $this->makeSEO(input("title"));
                $data->save();
                return redirect()->back()->with("success", lang("global.success_update"));
            }
            return redirect()->back()->with("error", lang("global.error_update"));
        }else{

            db("Catalog::Categories")->insert([
                    "title" => input("title"),
                    "content" => input("content"),
                    "type" => $type,
                    "parent_id" => ($id ? $id : "0"),
                    "options" => input("options",true),
                    "icons" => input("icons"),
                    "seo_urls" => $this->makeSEO(input("title")),
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            return redirect()->back()->with("success", lang("global.success_insert"));
        }

        
        
    }
    

    function makeSEO($text=""){
        return str_slug($text).'.html';
    }

    function getDelete($id=0, $filter=""){
        $data = db("Catalog::Categories")->find($id);
            if($data){
                
                $data->delete();
            }

        return redirect()->back()->with("success", lang("global.success_delete"));
        
    }

    function postSort(){
        $data = json_decode(input("data"));

        $parent = 0;
        $this->SortMenu($parent,$data,[]);
        echo json_encode("ok");
    }

    

    function SortMenu($parent=false,$data=array(),$where=array()){

        $i = 0;
       
        $where = [];
        foreach($data as $k => $a){ 
            $i++;
            $where["id"] = $a->id;
            $dataRead = db("Catalog::Categories")->language()->stores()->find($a->id);
            $dataRead->sorts = $i;
            $dataRead->parent_id = $parent;
            
            $dataRead->save();
        
            if(isset($a->children)){
                $this->SortMenu($a->id,$a->children,$where);
            }
        }
    
    }
}