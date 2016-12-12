<?php
namespace Modules\Account\Frontend;
use Remios\Apps\Main;
class Register extends Main
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
        
    	return views("register");
    }

    function postIndex($alt="",$type="", $eff=""){
        $input = [
            'email' => input("email"),
            'password' => input("password"),
        ];
        $rules = [
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|max:255|min:8',
        ];
        $messages = [
                "email.required"  => "Email chưa nhập",
                "email.unique"    =>  "Email ".input("email")." đã được dùng",
                "email.email"     =>  "Email không đúng định dạng",
                "password.required"  => "Mật khẩu không thể bỏ trống",
                "password.min"   =>  "Mật khẩu tối thiểu phải 8 ký tự",
                "password.max"   =>  "Mật khẩu không vượt quá 250 ký tự"
            ];
        $validator = app("validator")->make($input, $rules, $messages);
        if ($validator->fails()) {

            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

            if(!config("users_register_action")){

                db("Account:Users")->insert([
                    "email" => strtolower(input("email")),
                    "password" => \Hash::make(strtolower(input("password"))),
                    "is_active" => 1,
                    "language"  =>  getLanguage(),
                ]);

            }else if(config("users_register_action") == "captcha"){

                if(session("captcha") == input("captcha")){
                    db("Account:Users")->insert([
                        "email" => strtolower(input("email")),
                        "password" => \Hash::make(strtolower(input("password"))),
                        "is_active" => 1,
                        "language"  =>  getLanguage(),
                    ]);
                }

            }else if(config("users_register_action") == "email"){
                
                sendmail("validate_email",input("email"));
                return redirect(base_url("account/register/validate"))->with("error","Active Code");
            }


            if(config("users_register_welcome") == "yes"){
                sendmail("welcome",input("email"));
            }
            //Send Mail welcome

        }
    }

    function getOffline(){
        register("seo.title","Offline Register");
        return views("register-offline");
    }

    function getValidate($code="", $filter=""){
        register("seo.title","Validate Acive Code");
        return views("register-validate");
    }
}
?>