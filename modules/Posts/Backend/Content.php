<?php
namespace Modules\Posts\Backend;
use Remios\Apps\Admin;
class Content extends Admin
{
	
    public function __construct()
    {
        view()->addLocation(base_path("contents/templates/".config("site.templates")."/admin"));
        parent::__construct();

    }
	function getIndex($type="blogs", $fillter="", $search=""){
        
		return $this->getManager($type, $fillter, $search);
    }

    function postIndex($a=""){
    }


    function getManager($type="blogs", $fillter="", $search=""){
        
       

        $data = db("Posts::Posts",$type)->language()->stores()->auth()->type($type)->orderBy("updated_at","DESC");

        $data = support()->beforeList($data,$type)->rows(20,"paged");
        
        $field = support()->field($type);

        return views("posts-content",["data" => $data, "type" => $type, "field" => $field]);
    }

    function getCopy($type="blogs",$id,$language="", $fillter=""){
       
        $data = db("Posts::Posts",$type)->language()->stores()->auth();
        $data = support()->beforeCopy($data,$type)->find($id);
        if($data && $language){
            
            $data->id = NULL;

            if(config("site.tranlaytion_posts") == "yes"){
                
                $data->title = tranlation($data->title,"",$language);

                $data->content = tranlation($data->content,"",$language);
            }

            $data->language = $language;

            $data->replicate()->save();
        }
        
        
        return redirect()->back()->with("success", lang("pages.home.success_delete"));
    }


    function getEdit($type="blogs",$id=null, $filter=""){
       
        $data = db("Posts::Posts",$type);
       $data = support()->beforeEdit($data, $type)->find($id);
    	return views("posts-content-edit",["data" => $data]);
    }

    function getQuitedit($type="blogs",$id=null, $filter=""){
       
        $data = db("Posts::Posts",$type);
       $data = support()->beforeEdit($data, $type)->find($id);
        return views("posts-quit-edit",["data" => $data]);
    }

    function postEdit($type="blogs",$id=null,$filter=""){
       
    	$data = db("Posts::Posts",$type)->find($id);
        if(!$data){
            return redirect(admin_url("posts/content",false))->with("error", lang("posts.content.error_update"));
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
            if(input("keyword")) $data->keyword     =   input("keyword");


			if(input("title")) $data->title     =   input("title");

			if(input("thumbs"))  $data->thumbs     =   $data->makeThumnail(input("thumbs"), true);

            if(input("gallery")) $data->gallery     =   $data->makeThumnail(input("gallery",true));

			if(input("description")) $data->description     =   input("description",true);

			if(input("content")) $data->content     =   $data->getContent(input("content",true));

			if(input("options")) $data->options     =   input("options",true);

			if(input("categories_id")) $data->categories_id     =   input("categories_id");

			if(input("categories_id")) $data->pages_maps     =   $data->pages_maps(input("categories_id"));

			if(input("group_id")) $data->group_id     =   input("group_id");

			if(input("groups_access")) $data->groups_access     =   input("groups_access");

			if(input("parent_id")) $data->parent_id     =   input("parent_id");

			if(input("tags")) $data->tags     =   input("tags");

			if(input("related_id")) $data->related_id     =   input("related_id");

			if(input("status")) $data->status     =   input("status");
            
            if(input("meta_keyword")) $data->meta_keyword     =   $data->meta_keyword();
            
            if(input("meta_descritpion")) $data->meta_description     =   $data->meta_description();
            

			$data->updated_at     =   input("updated_at");

			if(input("display_at")) $data->display_at     =   input("display_at");

			$data->expires_at     =   input("expires_at");

          


			if(input("seo_urls")) $data->seo_urls     =   input("seo_urls") ? input("seo_urls") : str_slug(input("title")).".html";
            $data = support()->beforeSave($data);

            $data->save();
            
            return redirect(admin_url("posts/content/manager/".$data->type,false))->with("success", lang("posts.content.success_update"));
        }
    }


    function getCreate($type="blogs", $fillter="", $search=""){
        $arv = array(
                'language' => getLanguage(),
                'stores_id' => getStores(),
                'users_id'  => getAuth(),
                'type'  => $type,
                'title'     =>  'New Document',
                'created_at' => date("Y-m-d h:i:s"),
                'status'    => 0
                );
        $data = support()->beforeCreate($arv);
        $id = db("Posts::Posts",$type)->insertGetId(
            $data
        );
       
        return redirect(admin_url("posts/content/edit/".$type."/".$id, false))->with("success", lang("posts.content.success_create"));
    }


    function getReset($type,$id,$filter=""){
        $data = db("Posts::Posts",$type)->find($id);
        $data->updated_at     =   date("Y-m-d h:i:s");
        $data->save();
       
        return redirect()->back()->with("success", lang("posts.content.success_create"));
    }
    function getDelete($type="blogs", $id=null){
        
        $data = db("Posts::Posts",$type)->find($id);

        if($data){
            $data = support()->beforeDelete($data);
            $data->delete();
            return redirect()->back()->with("success", lang("posts.content.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("posts.content.error_delete"));
        }
        
    }


    function getTools($type="blogs", $id=null){
        if(input("query") == "regenimage"){
            ini_set('max_execution_time', 300);
            $this->regenImages($type);
             return redirect()->back()->with("success", lang("posts.content.success_delete"));
        }

        if(input("query") == "replace"){
            $data = db("Posts::Posts",$type)->get();
            $find = explode(';', input("find"));
            $replace = explode(';', input("replace"));
            foreach ($data as $key => $value) {
                $value->content = str_replace($find, $replace, $value->content);
                $value->description = str_replace($find, $replace, $value->description);
                if(isset($value->meta_keyword)) $value->meta_keyword = str_replace($find, $replace, $value->meta_keyword);
                if(isset($value->meta_description)) $value->meta_description = str_replace($find, $replace, $value->meta_description);
                $value->save();
            }
             return redirect()->back()->with("success", lang("posts.content.success_delete"));
        }
        if(input("query") == "fixkeyworks"){
            $data = db("Posts::Posts",$type)->get();
            foreach ($data as $key => $value) {
                $value->meta_keyword     =   $value->meta_keyword(true);
                $value->meta_description     =   $value->meta_description(true);
                $value->save();
            }
            return redirect()->back()->with("success", "Fix Keyword Success");
        }

        
        return views("posts-tools",["type" => $type]);
    }

    function regenImages($type="blogs"){
        $data = db("Posts::Posts",$type)->language()->stores()->auth()->get();
        foreach ($data as $key => $value) {
            $value->makeThumnail($value->thumbs);
            $value->makeThumnail($value->gallery);
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