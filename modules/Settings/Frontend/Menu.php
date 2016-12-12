<?php
namespace Modules\Settings\Backend;
use Remios\Apps\Admin;
class Menu extends Admin
{
	
	public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
		return views("settings-menu");
    }

    
}
?>