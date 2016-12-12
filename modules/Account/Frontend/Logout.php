<?php
namespace Modules\Account\Frontend;
use Remios\Apps\Main;
class Logout extends Main
{
	
	public function __construct()
    {
        
        register("seo.title","Đăng Xuất");

        parent::__construct();
    }

	public function getIndex($alt="",$type="", $eff=""){
		auth()->logout();
    	return views("logout");
    }

}
?>