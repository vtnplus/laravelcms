<?php
function getLanguages($type="option", $apps_urls="?language={language}"){
	$data = db("Settings::Languages")->where("status","1")->get();

	$option = [];
	$dropdown = [];
	
	foreach ($data as $key => $value) {
		$icons = base_path("contents/language/".$value->folder."/icon.png");
		$icons_url = base_url("contents/language/".$value->folder."/icon.png");
		$icon = (file_exists($icons) ? '<img alt="'.$value->name.'" src="'.$icons_url.'" style="width:18px;"> ' : "");
		$option[] = '<option value="'.$value->folder.'">'.str_replace('{language}',$value->name,$apps_urls).'</option>';
		$dropdown[] = '<li><a href="'.str_replace('{language}',$value->folder,$apps_urls).'">'.$icon.$value->name.'</a></li>';
	}
	if($type == "dropdown"){
		return implode($dropdown, "\n");
	}else{
		return implode($option, "\n");
	}
}