<?php
namespace Modules\Account\Frontend;
use Remios\Apps\Main;
class Social extends Main
{
	
	public function __construct()
    {
        
        register("seo.title","Đăng ký");
        if(config("site.users_can_register") != "yes"){
            if(request()->ajax()){
                dd("You Are Not Access");
            }
            
            
        }
        parent::__construct();
    }

	public function getIndex($alt="",$type="", $eff=""){
        if(config("site.users_can_register") != "yes"){
		    return redirect(base_url("account/register/offline"))->with("error", "You Are Not Access")->send();
            dd("You Are Not Access");
        }
        
    	return views("social");
    }

    public function getToken($alt="",$type="", $eff=""){
        $arv = ['github' => [
            'client_id' => 'your-github-app-id',
            'client_secret' => 'your-github-app-secret',
            'redirect' => 'http://your-callback-url',
        ]];
       
        return app("socialite")->driver($arv['github'])->redirect();
    }

}