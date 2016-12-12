<?php
namespace Modules\Media\Backend;
use Remios\Apps\Admin;
class Manager extends Admin
{
	

	function getIndex($a=""){
        

    	return views("manager");
    }

    

}