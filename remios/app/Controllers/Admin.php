<?php
namespace Remios\Apps;
class Admin extends Controller
{
	public function __construct()
    {
    	
    	
    	if(is_guest()){	
    		if(request()->ajax()){
    			dd("You Are Not Access");
    		}
    		
    		return redirect(base_url("account/login?redirect=".app("url")->full()))->with("error", "You Are Not Access")->send();
    		dd("You Are Not Access");
    	}
        
       if(session()->get("content.language")){
          config()->set("site.language",session()->get("content.language"));
        }

        

        $this->limitPremistion();

    	register("javascript",[
                                    resources_url("globals/jquery.prices.js"),
                                    //resources_url("kendoui/js/kendo.all.min.js"),
                                    resources_url("tinymce/jquery.tinymce.js"),
                                    resources_url("tinymce/tinymce.js"),
                                    resources_url("fancybox/jquery.fancybox.js"),
                                    resources_url("iconpicker/js/iconset/iconset-fontawesome.min.js"),
                                    resources_url("iconpicker/js/bootstrap-iconpicker.min.js"),
                                    resources_url("colorpicker/js/bootstrap-colorpicker.min.js"),
                                    
                                    
                                   
                            ]);
        register("style",[
                            resources_url("fancybox/jquery.fancybox.css"),
                            resources_url("iconpicker/css/bootstrap-iconpicker.min.css"),
                            resources_url("colorpicker/css/bootstrap-colorpicker.min.css"),
                            //resources_url("kendoui/styles/kendo.common.min.css"),
                            //resources_url("kendoui/styles/kendo.default.min.css"),
                            //resources_url("kendoui/styles/kendo.default.mobile.min.css"),
                           
                            
                        ]);
    	
        $listPremisstion = [
            "view" => ["index","manager"],
            "edit"  => ["edit"],
            "delete"    => ["delete"]
        ];
        
    }

	function getIndex(){
        

    	return views("home");
    }

    private function limitPremistion(){
        if(user()->is_admin == "1") return true;
        $url = str_replace([base_url('admin/'),base_url('admin')],"",app("url")->full());
        @list($module, $control, $action) = explode('/', $url,4);

        $make_url = $module."/".$control."/".$action;
        $make_url = ($make_url == '//' ? "" : $make_url);

        
        $premisstion = check_users_premisstion([$url => ""]);
        if(!$premisstion){
            $premisstion = check_users_premisstion([$make_url => ""]);
        }
        
        if(!$make_url && !$premisstion){
            $premisstion = check_users_premisstion();
        }

        if(!$premisstion){
            //dd("Bạn không có quyền trong chuyên mục này");
        }
    }

    
}
?>