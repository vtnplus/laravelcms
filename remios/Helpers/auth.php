<?php
function is_guest(){
	return app("auth")->guest();
}

function is_login(){
	return app("auth")->check();
}

function auth(){
	return app("auth");
}

function user(){
	return app("auth")->user();
}

function user_groups($select=""){
	$data = db("Account::Users_roles")->get();
	foreach ($data as $key => $value) {
		echo '<option value="'.$value->id.'" '.($select == $value->id ? "selected" : "").'>'.$value->roles_name.'</option>';
	}
}



function get_users_premisstion(){
	$data = db("Account::Users_roles")->find(user()->roles_id);
	$access = @unserialize($data->roles_access);
	if($access) return $access;
	return [];
}


function check_users_premisstion($url=[]){
	if(user()->is_admin == 1) return true;

	$premisstion = get_users_premisstion();
	$urls = [];

	foreach ($premisstion as $key => $value) {
		$urls = array_merge($value,$urls);
	}

	if(!$url){
		return $urls;
	}


	$aff = [];
	foreach ($url as $key => $value) {
		if(isset($urls[$key])){
			$aff[$key] = $value;
		}
	}

	return $aff;
}