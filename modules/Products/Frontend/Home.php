<?php
namespace Modules\Products\Frontend;
use Remios\Apps\Main;
class Home extends Main
{
	
	public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
		
		return views("products");
    }

    
}
?>