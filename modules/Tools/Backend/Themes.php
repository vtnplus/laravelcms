<?php
namespace Modules\Tools\Backend;
use Remios\Apps\Admin;
class Themes extends Admin
{
	

	function getIndex($module="",$controllder="", $filter=""){
		return views("tools-themes");
	}

	function postIndex(){
		$folder = base_path("contents/templates/".input("folder"));
		if(!files()->isDirectory($folder)){
			files()->makeDirectory($folder, 0777, true, true);
		}

		$default = [
			"header.php" => @file_get_contents(__DIR__."/theme/header.php"),
			"home.php"	=> @file_get_contents(__DIR__."/theme/home.php"),
			"functions.php"	=> @file_get_contents(__DIR__."/theme/functions.php"),
			"footer.php"	=>	@file_get_contents(__DIR__."/theme/footer.php"),
			"styles.css"	=>	@file_get_contents(__DIR__."/theme/styles.css"),
			"customs.css"	=>	@file_get_contents(__DIR__."/theme/customs.css"),
			"customs.js"	=>	@file_get_contents(__DIR__."/theme/customs.js"),
			"info.txt"		=> "Name : ".ucfirst(input("name") ? input("name") : input("folder"))."\nAuth: ".data(user()->first_name." ".user()->last_name,"VTNPLUS Co.,Ltd")."\nWebsite: ".data(user()->website_url,"http://laravelcms.net")."\nEmail: ".data(user()->email,"thietkewebvip@gmail.com")."\nVersion:".config("site.os_version","5.1")."\n",
		];
		/*
		Render Default
		*/
		if(!files()->isDirectory($folder."/images")){
			files()->makeDirectory($folder."/images", 0777, true, true);
		}
		foreach ($default as $key => $value) {
			if(!files()->exists($folder."/".$key)){
				files()->put($folder."/".$key,$value, true, true);
			}
		}
		
		/*
		Render File Develop
		*/
		$files = input("files");
		if(!$files) $files = [];
		foreach ($files as $key => $value) {
			if(!files()->exists($folder."/".$value)){
				$ref = str_replace(basename($value), '', $folder."/".$value);

				if(!files()->isDirectory($ref)){
					files()->makeDirectory($ref, 0777, true, true);
				}

				files()->put($folder."/".$value,"", true, true);
			}
		}
	return redirect()->back();
	}




	function getBootstrap(){
		$path_map = "";
		if(file_exists(base_path("contents/templates/".config("site.templates")."/theme.css.map"))){
			$path_map =  require_once(base_path("contents/templates/".config("site.templates")."/theme.css.map"));
		}
		return views("tools-bootstrap",["data" => $path_map]);
	}
	function postBootstrap(){
		$path = $folder = base_path("contents/templates/".config("site.templates")."/theme.css");
		$path_map =  base_path("contents/templates/".config("site.templates")."/theme.css.map");

		$color = with(new \Remios\Utils\Color);

		$tags = input("tags");
		$class = input("class");
		$gradien = input("gradien");

		$maps = [];
		$maps = $class;
		$maps = array_merge($maps, (is_array($gradien) ? ["gradien" => $gradien] : []), $tags);
		
		$html = [];

		foreach ($tags as $key => $value) {
			$html[] = $key.'{ color:'.$value.';}';
		}

		foreach ($class as $key => $value) {
			
			if(@$gradien[$key] == 1){
				$html[] = '.'.$key.'{'.$color->getCssGradient($value).'; border:0;}';
				$html[] = '.'.$key.':hover{ '.$color->getCssGradientHover($value).';}';
			}else{
				$html[] = '.'.$key.'{ background-color:'.$value.'; border:0;}';
				$html[] = '.'.$key.':hover{ background-color:'.$color->darken($value).';}';
			}

		}

		$brand = input("brand");
		$expath = [];
		foreach ($brand as $key => $value) {
			$html[] = $key.'{ ';
			foreach ($value as $keybrand => $valuebrand) {
				if($keybrand != 'a' && $keybrand != '.panel-title'){
					$html[] = $keybrand.':'.$valuebrand.';';
				}else{
					$expath[] = $key.' '.$keybrand.'{ ';
					$expath[] = 'color:'.$valuebrand.';';
					$expath[] = '}';
				}
			}
			$html[] = '}';
			$html[] = implode($expath,"\n");
		}


		files()->put($path, implode($html,"\n"));
		files()->put($path_map,'<?php return '."\n".var_export($maps,true)."\n".'?>');
		return redirect()->back();
	}
}