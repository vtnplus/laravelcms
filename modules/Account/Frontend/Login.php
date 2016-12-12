<?php
namespace Modules\Account\Frontend;
use Remios\Apps\Main;
class Login extends Main
{
	
	public function __construct()
    {
        
        register("seo.title","Đăng nhập");
        
        if(is_login()){
            $redirect = input("redirect");
            return redirect(($redirect ? $redirect : base_url()))->with("error", "You Are Not Access")->send();
        }
        parent::__construct();
    }

	public function getIndex($alt="",$type="", $eff=""){
		
    	return views("login");
    }

    public function postIndex($alt="",$type="", $eff=""){
    	$redirect = input("redirect");
    	$email = strtolower(input("email"));
    	$password = strtolower(input("password"));
    	if (\Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1],true))
        {
        	return redirect(($redirect ? $redirect : base_url()))->with("success", lang("user.login_success",false));
        }else{
        	return redirect()->back()->with("error", "You Are Not Access");
        }
    	
    }


}
?>