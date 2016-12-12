<?php
namespace Modules\Account\Backend;
use Remios\Apps\Admin;
class Home extends Admin
{
	

	function getIndex($a=""){
		dd("Conbo");
    	return views("home");
    }
}
?>