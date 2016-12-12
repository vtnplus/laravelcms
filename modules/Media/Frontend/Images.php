<?php
namespace Modules\Media\Frontend;
use Remios\Apps\Main;
class Images extends Main
{
	

	public function getData($src="", $filter=""){
		
    	return readfile(base_path("contents/uploads/".getAuth()."/images/".$src));
    }

    public function getVideo($src="", $filter=""){
		
    	return readfile(base_path("contents/uploads/".getAuth()."/video/".$src));
    }

}
?>