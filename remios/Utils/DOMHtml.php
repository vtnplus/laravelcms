<?php
namespace Remios\Utils;
require 'Adapters'.DIRECTORY_SEPARATOR.'simplehtmldom.php';
use \Remios\Utils\Adapters\simplehtmldom;
class DOMHtml {
	
	/**
	 * @return \simplehtmldom_1_5\simple_html_dom
	 */
	public function file_get_html() {
		return call_user_func_array ( '\Remios\Utils\Adapters\simplehtmldom\file_get_html' , func_get_args() );
	}
	/**
	 * get html dom from string
	 * @return \simplehtmldom_1_5\simple_html_dom
	 */
	public function str_get_html() {
		return call_user_func_array ( '\Remios\Utils\Adapters\simplehtmldom\str_get_html' , func_get_args() );
	}
}
?>