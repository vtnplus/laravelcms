<?php
namespace Modules\Stores\Backend;
use Remios\Apps\Admin;
class Tinymce extends Admin
{
	
    public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
        dd("Index Disable");
    }

    function getTemplates(){
    	$data = db("Stores::Templates")->language()->stores()->get();
    	return views("stores-tinymce",["data" => $data]);
    }
}