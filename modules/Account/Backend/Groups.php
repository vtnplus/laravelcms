<?php
namespace Modules\Account\Backend;
use Remios\Apps\Admin;
class Groups extends Admin
{
	
    public function __construct()
    {
        
        
        if(user()->is_admin != 1){  
            
            return redirect(admin_url("account/profiles",false))->with("error", "You Are Not Access")->send();
            
        }
        parent::__construct();
    }
    
	function getIndex($filler="", $search=""){
		

		$data = db("Account::Users_roles")->get();

    	return views("account-groups",["data" => $data]);
    }

    function getEdit($id="", $search=""){
		$data = db("Account::Users_roles")->find($id);
		$topmenu = get_register_menu("topmenu");
		$arvs = "";
		foreach ($topmenu as $key => $value) {
			foreach ($value["contents"] as $key_top => $value_top) {
				$arvs[$key_top] = $value_top." <small class=\"pull-right\"><i class=\"".$value["icons"]."\"></i> ".$value["name"]."<small>";
			}
			
		}
		$leftmenu = get_register_menu("leftmenu");
		foreach ($leftmenu as $key => $value) {
			foreach ($value["contents"] as $key_top => $value_top) {
				$arvs[$key_top] = $value_top." <small class=\"pull-right\"><i class=\"".$value["icons"]."\"></i> ".$value["name"]."<small>";
			}
		}

    	return views("account-groups-edit",["data" => $data, "admin_access" => $arvs]);
    }
    


    function postEdit($id="", $search=""){
    	$data = db("Account::Users_roles")->find($id);
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
        	$data->roles_name = input("roles_name");
        	$data->roles_access = serialize(input("roles_access"));
        	$data->save();
        	return redirect()->back()->with("success", lang("user.success_update"));
        }
    }



     function getCreate(){
        $id = db("Account::Users_roles")->insertGetId(
            array('created_at' => date("Y-m-d h:i:s"), "roles_name" => "New groups")
        );
        return redirect(strtolower("account/groups/edit/".$id))->with("success", lang("user.success_create"));
    }

    
    function getDelete($id=null){
        $data = db("Account::Users_roles")->find($id);
        if($data){
        	$data->delete();
        	return redirect()->back()->with("success", lang("user.success_delete"));
        }else{
        	return redirect()->back()->with("error", lang("user.error_delete"));
        }
        
    }

}
?>