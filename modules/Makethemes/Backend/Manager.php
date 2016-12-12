<?php
namespace Modules\Makethemes\Backend;
use Remios\Apps\Admin;
class Manager extends Admin
{
	
    public function __construct()
    {
        parent::__construct();
    }
	function getIndex($type="blogs", $fillter="", $search=""){
        
		return views("maketheme-manager");
    }
}