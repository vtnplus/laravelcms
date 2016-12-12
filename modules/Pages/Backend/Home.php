<?php
namespace Modules\Pages\Backend;
use Remios\Apps\Admin;
class Home extends Admin
{
	
    public function __construct()
    {
       
        parent::__construct();
    }
	function getIndex($a=""){
        $data = db("Pages::Pages")->language()->stores()->auth()->where("parent_id",0)->orderBy("orders","ASC")->rows(20);

		return views("pages-manager",["data" => $data]);
    }

    function getSubpages($parent_id="", $padding="30"){
        $data = db("Pages::Pages")->language()->stores()->auth()->where("parent_id",$parent_id)->orderBy("orders","ASC")->rows(20);
        return views("pages-items",["data" => $data, "inum" => $padding]);
    }

    function getEdit($id=null, $filter=""){
        $data = db("Pages::Pages")->find($id);
    	return views("pages-edit",["data" => $data]);
    }

    function postEdit($id=null,$filter=""){

    	$data = db("Pages::Pages")->language()->stores()->auth()->find($id);
        if(!$data){
            return redirect(admin_url(strtolower("Pages/Home")))->with("error", lang("pages.home.error_update"));
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
            $old_router = str_replace(['.php','.html'], '', $data->seo_urls);

			if(input("parent_id")) $data->parent_id     =   input("parent_id");

			if(input("type")) $data->type     =   input("type");

			if(input("status")) $data->status     =   input("status");

			$data->title     =   input("title");

			if(input("thumbs")) $data->thumbs     =   input("thumbs");

			if(input("description")) $data->description     =   input("description");

			if(input("content")) $data->content     =   $data->getContent(input("content",true));

			if(input("options")) $data->options     =   input("options",true);

			if(input("parent_id")) $data->pages_maps     =   $data->pages_maps(input("parent_id"));

			if(input("display_as")) $data->display_as     =   input("display_as");

			if(input("redirect_to")) $data->redirect_to     =   input("redirect_to");

			if(input("tags")) $data->tags     =   input("tags");

			if(input("visists")) $data->visists     =   input("visists");

			if(input("orders")) $data->orders     =   input("orders");

			if(input("seo_urls")) $data->seo_urls     =   input("seo_urls") ? input("seo_urls") : str_slug(input("title")).".html";

			if(input("meta_title")) $data->meta_title     =   input("meta_title");

			if(input("meta_keyword")) $data->meta_keyword     =   input("meta_keyword");

			if(input("meta_descritpion")) $data->meta_descritpion     =   input("meta_descritpion");

			$data->updated_at     =   date("Y-m-d h:i:s");

			$data->expires_at     =   input("expires_at");
            $data->as_router     =   input("as_router");

            app("cache")->put($data->language.".".$data->seo_urls,$data,60*24*7);
            $data->save();

            if(input("as_router") == "1"){
                $router = str_replace(['.php','.html'], '', $data->seo_urls);
                if($data->seo_urls != input("seo_urls") || !config('register.router.'.$router)){
                    /*
                    Change All post to new router
                    */
                    db("Posts::Posts",$old_router)->where("type",$old_router)->update(["type" => $router]);
                    /*
                    Make Home Router
                    */
                    with(new \Modules\Settings\Backend\Home)->makeCacheRouter();
                }
            }


            return redirect(admin_url("pages/home",false))->with("success", lang("pages.home.success_update"));
        }
    }



    function getQuitedit($id,$language="", $fillter=""){
        $data = db("Pages::Pages")->language()->stores()->auth()->find($id);
      
        return views("pages-quit-edit",["data" => $data]);
    }


    function getCopy($id,$language="", $fillter=""){
        
        $data = db("Pages::Pages")->language()->stores()->auth()->find($id);
        if($data && $language){
            $data->id = NULL;
            $data->language = $language;

            if(config("site.tranlaytion_posts") == "yes"){
                $data->title = tranlation($data->title,"",$language);
                $data->content = tranlation($data->content,"",$language);
            }
            
            $data->replicate()->save();
        }
        return redirect()->back()->with("success", lang("pages.home.success_delete"));
    }

    function getCreate(){
        $id = db("Pages::Pages")->insertGetId(
            array(
                'language' => getLanguage(),
                'stores_id' => getStores(),
                'users_id'  => getAuth(),
                'title'     =>  'New Pages',
                'created_at' => date("Y-m-d h:i:s")
                )
        );
        return redirect(strtolower("Pages/Home/edit/".$id))->with("success", lang("pages.home.success_create"));
    }

    function getDelete($id=null){
        $data = db("Pages::Pages")->find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with("success", lang("pages.home.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("pages.home.error_delete"));
        }
        
    }


    function postOptions($file=""){
        if(!$file) return "";
        
        $path = base_path("contents/templates/".config("templates")."/pages/options/".$file);

        if(!file_exists($path)){
            $path = resources_path("views/pages/options/".$file);
        }
       
        if(file_exists($path) && view()->exists("pages.options.".str_replace('.php','', $file))){
            return view("pages.options.".str_replace('.php','', $file));
        }

        return "";
        

    }

    function getQsearch(){
        $data = db("Pages::Pages")->language()->stores()->auth()->select("id","title as name","seo_urls")->get()->toArray();
        return response()->json($data);
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