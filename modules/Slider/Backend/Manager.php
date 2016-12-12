<?php
namespace Modules\Slider\Backend;
use Remios\Apps\Admin;
class Manager extends Admin
{
	
    public function __construct()
    {
        $urls = str_replace(base_path(),base_url(),realpath(__DIR__."/../Views/assets"));
        register("javascript",[
                                    resources_url("jquery/jquery-ui.js"),
                                    resources_url("bootstrap/js/bootstrap-contextmenu.js"),
                                    
                            ]);
        register("style",[$urls."/css/default.css",$urls."/css/masterslider.css",$urls."/css/masterslider.main.css",$urls."/css/text.css"]);
        parent::__construct();
    }
	function getIndex($a=""){
        $data = db("Posts::Posts")->language()->stores()->type("slider")->where("parent_id",0)->rows(20);

		return views("slider-manager",["data" => $data]);
    }

    function postIndex($a=""){
    }

    function getEdit($id=null, $filter=""){
        $data = db("Posts::Posts")->language()->stores()->find($id);
        $layer = db("Posts::Posts")->language()->stores()->type("slider")->where("parent_id", $id)->rows(20);
        $cssClass = $this->parseCSS();
        $code = [];
       foreach ($cssClass as $key => $value) {
          if(strpos($key, ':') == false && strpos($key, '-moz') == false && strpos($key, '@') == false && strpos($key, '-webkit') == false && strpos($key, ' ') == false){
            $code[$key] = $value;
          }
       }
    	return views("slider-manager-edit",["data" => $data, "layer" => $layer,"css" => $code]);
    }

    function parseCSS(){
        $file = str_replace(base_path(),base_url(),realpath(__DIR__."/../Views/assets/css/text.css"));
        $css = file_get_contents($file);
        preg_match_all( '/(?ims)([a-z0-9\s\#_\-@,]+)\{([^\}]*)\}/', $css, $arr);
        $result = array();
        foreach ($arr[0] as $i => $x){
            $selector = trim($arr[1][$i]);
            $rules = explode(';', trim($arr[2][$i]));
            $rules_arr = array();
            foreach ($rules as $strRule){
                if (!empty($strRule)){
                    $rule = explode(":", $strRule);
                    $rules_arr[trim($rule[0])] = trim($rule[1]);
                }
            }

            $selectors = explode(',', trim($selector));
            foreach ($selectors as $strSel){
                $result[$strSel] = $rules_arr;
            }
        }
        return $result;
    }
    function postEdit($id=null,$filter=""){
    	$data = db("Posts::Posts")->find($id);
        if(!$data){
            return redirect(admin_url(strtolower("Slider/Manager")))->with("error", lang("slider.manager.error_update"));
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
            $data->content =  @serialize(input("slider"));
            $data->keyword = input("keyword");
            $data->save();


            
            $layer = input("layer_id");
            $thumbs = input("thumbs");
            $content = input("content");
            if(is_array($layer)){
                foreach ($layer as $key => $value) {
                    $dataLayer = db("Posts::Posts")->find($value);
                    $dataLayer->thumbs     =   $thumbs[$key];
                    $dataLayer->content     =   @serialize(@$content[$key]);
                    $dataLayer->save();
                }
            }
            
            
            return redirect()->back()->with("success", lang("slider.manager.success_update"));
        }
    }


    function getCreate(){
        $id = db("Posts::Posts")->insertGetId(
            array(
                'created_at' => date("Y-m-d h:i:s"),
                'type'  => "slider",
                "title" =>  "New Slider",
                "users_id"  => getAuth(),
                "language"  =>  getLanguage(),
                "stores_id" =>  getStores(),
                "status"    => 1
                )
        );
        return redirect(strtolower("Slider/Manager/edit/".$id))->with("success", lang("slider.manager.success_create"));
    }


    function getCreatelayer($id, $filter=""){
        db("Posts::Posts")->insertGetId(
            array(
                'created_at' => date("Y-m-d h:i:s"),
                'type'  => "slider",
                "title" =>  "New Layer",
                "users_id"  => getAuth(),
                "language"  =>  getLanguage(),
                "stores_id" =>  getStores(),
                "status"    => 1,
                "parent_id" => $id,
                )
        );
        return redirect(strtolower("Slider/Manager/edit/".$id))->with("success", lang("slider.manager.success_create"));
    }

    function getDeletelayer($id=null){

        $data = db("Posts::Posts")->language()->stores()->type("slider")->find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with("success", lang("slider.manager.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("slider.manager.error_delete"));
        }
        
    }

     function getDelete($id=null){
       
        $data = db("Posts::Posts")->language()->stores()->type("slider")->find($id);
        if($data){
            $data->delete();
            db("Posts::Posts")->language()->stores()->type("slider")->where("parent_id", $id)->delete();
            return redirect()->back()->with("success", lang("slider.manager.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("slider.manager.error_delete"));
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