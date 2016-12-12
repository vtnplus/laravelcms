<?php
namespace Modules\Invoices\Frontend;
use Remios\Apps\Main;
class Payments extends Main
{
	
	public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
        $items = [];

		$data = db("Invoices::Invoices")->language()->stores()->where("session_id",session()->getId())->first();
		
        return views("payments");
    }


    
}