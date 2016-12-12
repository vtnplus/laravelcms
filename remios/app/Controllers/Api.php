<?php
namespace Remios\Apps;
class Api extends Controller
{
	
	public function __construct()
    {
    	if(\Auth::guest()){
    			return \Auth::basic();
    	}
    }
	function getIndex(){
		return response()->make([
		    'name' => 'Abigail',
		    'state' => 'CA'
		]);
	}
}
?>