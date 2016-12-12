<?php
namespace Modules\Tools\Backend;
use Remios\Apps\Admin;
class Css extends Admin
{
	function getIndex($module="",$controllder="", $filter=""){
	}

	function getMake($module="",$controllder="", $filter=""){
		return views("tools-make-css");
	}

	function postMake($module="",$controllder="", $filter=""){
		$brandColor = input("brandColor");
		$code = [];
		$zoom = input("zoom");
		$type = input("type");

		if($type == "brand"){
			foreach ($brandColor as $key => $value) {
				$code[] = str_replace(['{style}','{value}'], [$key,$value], $zoom);
			}

			$code = implode($code, "\n");
		}else if($type == "size"){
			$brandColor = ["lg","md","sm","xs"];
			foreach ($brandColor as $key => $value) {
				$code[] = str_replace(['{style}','{value}'], [$value], $zoom);
			}

			$code = implode($code, "\n");
		}
		return views("tools-make-css",["code" => $code]);
	}

}