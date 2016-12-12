<?php
namespace Modules\Catalog\Backend;
use Remios\Apps\Admin;
class Brands extends Admin
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
        $data = db("Catalog::Brands")->language()->stores()->auth()->rows(20);
    	return views("brands-manager",["type" => $type,"data" => $data]);
    }

    function getItems($type="blogs", $parent_id=0, $filter=""){
        $data = db("Catalog::Brands")->language()->stores()->auth()->where("parent_id",$parent_id)->where("type",$type)->orderBy("sorts","ASC");
        if($data->count() > 0){
           
            return views("categories-item",["data" => $data->get()]);
        }
        return "";
    }

    function getCreate($type="blogs", $id=0, $filter=""){
         db("Catalog::Brands")->insert([
                    "title" => "New Brands",
                    
                    "type" => $type,
                   
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            return redirect()->back()->with("success", lang("global.success_insert"));
    }

    function postEdit($type="blogs", $id=0, $filter=""){
       $data = db("Catalog::Brands")->language()->stores()->auth()->find($id);
            if($data){
                $data->title = input("title");
                $data->content = input("content");
                $data->options = input("options",true);
                $data->thumbs = input("thumbs");
                $data->tags = input("tags");
                
                $data->seo_urls = $this->makeSEO(input("title"));
                $data->save();
                return redirect()->back()->with("success", lang("global.success_update"));
            }
            return redirect()->back()->with("error", lang("global.error_update"));

        
        
    }
    

    function getQuitedit($type="blogs",$id="", $filter=""){
        $data = db("Catalog::Brands")->language()->stores()->auth()->find($id);
        return views("brands-quit-edit",["data" => $data]);
    }

    function makeSEO($text=""){
        return str_slug($text).'.html';
    }

    function getDelete($id=0, $filter=""){
        $data = db("Catalog::Brands")->find($id);
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
            $dataRead = db("Catalog::Brands")->language()->stores()->find($a->id);
            $dataRead->sorts = $i;
            $dataRead->parent_id = $parent;
            
            $dataRead->save();
        
            if(isset($a->children)){
                $this->SortMenu($a->id,$a->children,$where);
            }
        }
    
    }
}