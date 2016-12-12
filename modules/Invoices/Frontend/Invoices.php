<?php
namespace Modules\Invoices\Frontend;
use Remios\Apps\Main;
class Invoices extends Main
{
	
	public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
		return views("invoices-invoices");
    }

    
}
?>