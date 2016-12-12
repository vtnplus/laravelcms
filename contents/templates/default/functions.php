<?php

config([
	"site.thumbs.travel" => ["medium" => "420x220"],
	"register.widgets.right"	=> [
									"travel" => "Travel Widgets",
									
								],
	"register.contents.travel"	=>	[
									"edit" => "travelEdit",
									"view" => ""
								],
	"register.panel.travel"	=>	[
									"edit" => "travelEdit",
									"view" => ""
								]
	]);

function beforeSave_travel($obj){
	$obj->deposit = "10";
	if(input("prices")){
		$obj->prices = input("prices");
	}
	if(input("prices_child")){
		$obj->prices_child = input("prices_child");
	}
	if(input("destinations")){
		$obj->destinations = input("destinations");
	}
	if(input("trans")){
		$obj->trans = input("trans");
	}
	if(input("hotel")){
		$obj->hotel = input("hotel");
	}
	if(input("duration")){
		$obj->duration = input("duration");
	}
	if(input("timestart")){
		$obj->timestart = input("timestart");
	}
	if(input("policies")){
		$obj->policies = input("policies");
	}
	if(input("programs")){
		$obj->programs = @serialize(input("programs"));
	}
	return $obj;
}