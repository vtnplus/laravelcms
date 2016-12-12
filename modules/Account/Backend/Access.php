<?php
namespace Modules\Account\Backend;
use Remios\Apps\Admin;
use Modules\Account\Models\Users as dbUser;
class Access extends Admin
{
	
	public function __construct()
    {
    	
    	
    	if(user()->is_admin != 1){	
    		
    		return redirect(admin_url("account/profiles",false))->with("error", "You Are Not Access")->send();
    		
    	}
    	parent::__construct();
    }

	function getManager($filler="", $search=""){
		
		if($filler == "saff"){
			$filler = 1;
		}elseif($filler == "user"){
			$filler = 0;
		}else{
			$filler = NULL;
		}

		$data = db("Account::Users")->where("is_admin",$filler)->rows(20);

    	return views("manager",["data" => $data]);
    }


    function getLoginas($id="", $filter=""){
    	if(user()->is_admin == 1){
    		\Auth::loginUsingId($id, true);
    	}
    	return redirect(admin_url("", false))->with("success", lang("user.success_update"));
    }

    function getEdit($id="", $search=""){
		$data = db("Account::Users")->find($id);
    	return views("edit",["data" => $data]);
    }


    function postEdit($id="", $search=""){
		$data = db("Account::Users")->find($id);
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


        	$auth = user();

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
			

			$data->remember_token     =   input("remember_token");

			if(input("is_active")) $data->is_active     =   input("is_active");

			if($auth->is_admin == 1){

				if(input("is_admin")) $data->is_admin     =   input("is_admin");
			}

			if(input("is_public")) $data->is_public     =   input("is_public");

			if(input("is_banned")) $data->is_banned     =   input("is_banned");

			$data->api_key     =   (input("api_key") ? input("api_key") : \Hash::make($data->email.$data->password.time()));

			$data->subscr_id     =   input("subscr_id");

			if(input("roles_id")) $data->roles_id     =   input("roles_id");

			$data->edited_by     =   $auth->id;

			
			$data->options     =  @serialize(input("options"));
			$data->street_address     =   input("street_address");

			$data->city     =   input("city");

			$data->country     =   input("country");

			$data->state     =   input("state");

			$data->zipcode     =   input("zipcode");

			$data->phone     =   input("phone");

			$data->website_url     =   input("website_url");

			$data->profiles_url     =   input("profiles_url");

            $data->save();
            
            return redirect()->back()->with("success", lang("user.success_update"));
        }
    }




    function getCreate(){
        $id = db("Account::Users")->insertGetId(
            array('created_at' => date("Y-m-d h:i:s"), "is_admin" => "0")
        );
        return redirect(admin_url("account/access/edit/".$id,false))->with("success", lang("user.success_create"));
    }

    function getDelete($id=null){
        $data = db("Account::Users")->find($id);
        if($data){
        	$data->delete();
        	return redirect()->back()->with("success", lang("user.success_delete"));
        }else{
        	return redirect()->back()->with("error", lang("user.error_delete"));
        }
        
    }


}
?>