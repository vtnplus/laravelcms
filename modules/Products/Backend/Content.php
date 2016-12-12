<?php
namespace Modules\Products\Backend;
use Remios\Apps\Admin;
class Content extends Admin
{
	
    public function __construct()
    {
        parent::__construct();
    }
	function getIndex($type="blogs", $fillter="", $search=""){
        
		return $this->getManager($type, $fillter, $search);
    }

    function postIndex($a=""){
    }


    function getManager($type="blogs", $fillter="", $search=""){

        $data = db("Products::Products")->language()->stores()->type($type)->rows();
        return views("posts-content",["data" => $data, "type" => $type]);
    }


    function getEdit($id=null, $filter=""){
        $data = db("Products::Products")->find($id);
    	return views("posts-content-edit",["data" => $data]);
    }

    function postEdit($id=null,$filter=""){
    	$data = db("Products::Products")->find($id);
        if(!$data){
            return redirect(admin_url(strtolower("Products/Content")))->with("error", lang("posts.content.error_update"));
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
            $data->keyword     =   input("keyword");


			$data->title     =   input("title");

			$data->thumbs     =   input("thumbs");

			$data->description     =   input("description");

			$data->content     =   input("content");

			$data->options     =   input("options");

			$data->categories_id     =   input("categories_id");

			$data->pages_maps     =   input("pages_maps");

			$data->group_id     =   input("group_id");

			$data->groups_access     =   input("groups_access");

			$data->parent_id     =   input("parent_id");

			$data->tags     =   input("tags");

			$data->related_id     =   input("related_id");

			$data->status     =   input("status");

			$data->updated_at     =   input("updated_at");

			$data->display_at     =   input("display_at");

			$data->expires_at     =   input("expires_at");

			$data->seo_urls     =   input("seo_urls");
            $data->save();
            return redirect(admin_url(strtolower("Products/Content/manager/".$data->type),false))->with("success", lang("posts.content.success_update"));
        }
    }


    function getCreate($type="blogs", $fillter="", $search=""){
        $id = db("Products::Products")->insertGetId(
            array(
                'language' => getLanguage(),
                'stores_id' => getStores(),
                'users_id'  => getAuth(),
                'type'  => $type,
                'title'     =>  'New Document',
                'created_at' => date("Y-m-d h:i:s")
                )
        );
        return redirect(strtolower("Products/Content/edit/".$id))->with("success", lang("posts.content.success_create"));
    }

    function getDelete($id=null){
        $data = db("Products::Products")->find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with("success", lang("posts.content.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("posts.content.error_delete"));
        }
        
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