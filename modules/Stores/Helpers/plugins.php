<?php
function getPlugins($key=""){
	$data = db("Stores::Plugins")->language("null")->stores()->auth("null")->where("display",$key)->orderBy("sorts","ASC")->get();
	$html = [];
	foreach ($data as $key => $value) {
		$html[] = $value->render();
	}

	return implode($html, "\n");
}