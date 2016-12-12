<?php
namespace Modules\Account\Frontend;
use Remios\Apps\Main;
class Home extends Main
{
	

	public function getIndex($alt="",$type="", $eff=""){
		
    	return views("home");
    }

}
?>