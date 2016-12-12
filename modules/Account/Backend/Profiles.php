<?php
namespace Modules\Account\Backend;
use Remios\Apps\Admin;
class Profiles extends Admin
{
	

	function getIndex($a=""){
		$data = db("Account::Users")->find(getAuth());
    	return views("account-profiles",["data" => $data]);
    }



     function postIndex(){
     	$id = getAuth();
		$data = db("Account::Users")->find($id);
        $input = [
            'email' => input("email"),
            'password' => input("password"),
        ];
        $rules = [
            'email' => 'required|max:255|email',
            'password' => 'max:255|min:8',
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

            $data->gender     =   input("gender");

			$data->first_name     =   input("first_name");

			$data->mid_name     =   input("mid_name");

			$data->last_name     =   input("last_name");

			$data->display_name     =   input("display_name");

			$data->thumbnail     =   input("thumbnail");

			if(input("email")){
				$email = strtolower(input("email"));
				$check = db("Account::Users")->where("email",$email)->where("id","!=",$id)->first();
				if(!$check){
					$data->email     =   $email;
				}
			}
			

			if(input("password")){
				$data->password     =   \Hash::make(strtolower(input("password")));
			}
			


			$data->edited_by     =   $id;

			$data->options     =  @serialize(input("options"));

			$data->street_address     =   input("street_address");

			$data->city     =   input("city");

			$data->country     =   input("country");

			$data->state     =   input("state");

			$data->zipcode     =   input("zipcode");

			$data->phone     =   input("phone");

			$data->user_information     =   input("user_information");

			$data->website_url     =   input("website_url");

			$data->profiles_url     =   input("profiles_url");

            $data->save();
            
            return redirect()->back()->with("success", lang("user.success_update"));
        }
    }

}
?>