<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Menu extends Admin
{
	
    public function __construct()
    {
        register("javascript",[resources_url("globals/jquery.nestable.js")]);
        register("style",[resources_url("globals/jquery.nestable.css")]);
        parent::__construct();

    }
	function getIndex($type="header"){
        return $this->getContainer("header");
    }

    function getContainer($type="header", $filter=""){
       

        return views("settings-menu",["type" => $type]);
    }

    function getManager($type="header",$id=null, $filter=""){
        $data = db("Settings::Navigation")->language("null")->stores()->find($id);
        
    	return views("settings-menu-edit",["data" => $data]);
    }

    function postEdit($id=null,$filter=""){
    	$data = db("Settings::Navigation")->language("null")->stores()->find($id);
        if(!$data){
            return redirect(admin_url(strtolower("Settings/Menu")))->with("error", lang("settings.menu.error_update"));
        }
        $input = [
            //'title' => input("title"),
        ];
        $rules = [
            //'title' => 'required|unique:posts|max:255',
        ];
        $validator = app("validator")->make($input, $rules);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data->name     =   input("name");

			$data->description     =   input("description");

			$data->icons     =   input("icons");

			$data->links     =   input("links");

            $data->hide_text     =   input("hide_text");
            
			$data->targets = input("targets");

            $data->types    =   input("types");

			$data->class     =   input("class");

			$data->animate_class     =   input("animate_class");

			$data->stickers     =  serialize(input("stickers"));

			$data->htmlcode     =   input("htmlcode");

		
            if(input("data_form")){
			 $data->data_form     =   input("data_form");
            }

            $data->save();
            return redirect(admin_url(strtolower("Settings/Menu")))->with("success", lang("settings.menu.success_update"));
        }
    }


    function getCreate($type="header",$filter=""){
        $id = db("Settings::Navigation")->insertGetId(
            array(
                
                'groups' => $type,
                "language"  => getLanguage(),
                "stores_id" => getStores(),
                "name"  =>  (input("name") ? input("name") : "New Menu"),
                "links"  =>  (input("links") ? input("links") : "#"),
                )
        );
        return redirect()->back()->with("success", lang("settings.menu.success_create"));
    }


    function getCopytolanguage($type="header", $tolanguage="", $filter=""){

        $dataRead = db("Settings::Navigation")->language("null")->stores()->where("groups", $type)->get();
        foreach ($dataRead as $key => $value) {
            $value->id = NULL;
            $value->language = $tolanguage;
            $value->name = tranlation($value->name,"",$tolanguage);
            $value->replicate()->save();
        }
       
        return redirect()->back()->with("success", lang("pages.home.success_delete"));
    }

    function getDelete($id=null){
        $data = db("Settings::Navigation")->find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with("success", lang("settings.menu.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("settings.menu.error_delete"));
        }
        
    }


    public function getItems($type="header",$parent_id=0){
        $data = db("Settings::Navigation")->language()->stores()->where("parent_id",$parent_id)->where("groups",$type)->orderBy("sorts","ASC")->orderBy("name","ASC");
        if($data->count() > 0){
            return views("navigation-item",["data" => $data->get()]);
        }
        return "";
    }


    public function postSort(){
        $data = json_decode(input("data"));

        $parent = 0;
        $this->SortMenu($parent,$data,[]);
        echo json_encode("ok");
    }


    private function SortMenu($parent=false,$data=array(),$where=array()){

        $i = 0;
       
        $where = [];
        foreach($data as $k => $a){ 
            $i++;
            $where["id"] = $a->id;
            $array = array("sorts" => $i,"parent_id" => $parent);
            $read = db("Settings::Navigation")->find($a->id);
            $read->sorts = $i;
            $read->parent_id = $parent;
            $read->save();

            if(isset($a->children)){
                $this->SortMenu($a->id,$a->children,$where);
            }
        }
    
    }

    /*
    Sync Menu Form Pages
    */

    function getPages($type="header", $filter=""){
        $this->subPages($type,0,0);
        return redirect()->back()->with("success", "Success Sync Pages");
    }

    function subPages($type, $parent_id, $menu_id){
        $data = db("Pages::Pages")->language()->stores()->where("parent_id",$parent_id)->orderBy("id","asc")->orderBy("orders","ASC")->get();
        foreach ($data as $key => $value) {
            $check = db("Settings::Navigation")->language()->stores()->where("data_form",'Pages::'.$value->id)->first();

            if($check){
                
                $id = $check->id;
                $check->name = $value->title;
                $check->links = $value->links();
                $check->save();
            
            }else{
                $id = db("Settings::Navigation")->insertGetId([
                    "name" => $value->title,
                    "links" => $value->links(),
                    "groups"    => $type,
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "data_form" => "Pages::".$value->id,
                    "parent_id" => $menu_id
                ]);
            }
            
            $count = db("Pages::Pages")->language()->stores()->where("parent_id",$value->id)->count();
            if($count > 0){
                $this->subPages($type, $value->id, $id);
            }
        }
    }

    function getMakelinks($data=""){
        if (!$data) return false;
        @list($c,$i) = explode('::',$data);
        if($c == "Pages"){
            $db = db("Pages::Pages")->find($i);
            echo $db->links(false);
        }
    }
    /*
    Clear Database
    */

    function getClearup($type="header", $filter=""){
        db("Settings::Navigation")->language()->stores()->where("groups",$type)->delete();
        return redirect()->back()->with("success", "Success empty");
    }
    /*
	Show Function API
    */
    function putIndex(){

    }

    function patchIndex(){

    }

    function deleteIndex(){

    }

    function optionsIndex(){

    }
}
?>