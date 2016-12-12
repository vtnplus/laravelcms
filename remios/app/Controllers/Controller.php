<?php
namespace Remios\Apps;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


abstract class Controller extends BaseController
{
   
    function getError($type="404"){
    	$data = \Route::getCurrentRoute()->getActionName();
    	return view("404",["action" => $data]);
    }

    function getIndex(){
    	echo "Welcome to Remios";
    }

    public function missingMethod($parameters = array()){
    	dd("Function get".ucfirst($parameters[0])." not exitis in class ".get_class($this));
    }
}
?>