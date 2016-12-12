<?php
function time_zone($select = ""){
	
	$timezone = timezone_list();
	foreach ($timezone as $key => $value) {
		echo '<option value="'.$key.'" '.($select == $key ? "selected" : "").'>'.$value.'</option>';
	}

}

/*
Run View Templates
*/

function timezone(){
	$mytime = \Carbon\Carbon::now();
    $mytime->setTimezone(config("sites.timezone"));
    return $mytime->toDateTimeString();
       
}

function getTime($date, $format=false){
	if(!$format) $format = config("sites.time_short_format","d-m-Y");
	$mytime =  \Carbon\Carbon::parse($date);
    $mytime->setTimezone(config("sites.timezone"));
    return $mytime->format($format);
}


function timezone_list() {
    static $timezones = null;

    if ($timezones === null) {
        $timezones = [];
        $offsets = [];
        $now = new DateTime();

        foreach (DateTimeZone::listIdentifiers() as $timezone) {
            $now->setTimezone(new DateTimeZone($timezone));
            $offsets[] = $offset = $now->getOffset();
            $timezones[$timezone] = '(' . format_GMT_offset($offset) . ') ' . format_timezone_name($timezone);
        }

        array_multisort($offsets, $timezones);
    }

    return $timezones;
}

function format_GMT_offset($offset) {
    $hours = intval($offset / 3600);
    $minutes = abs(intval($offset % 3600 / 60));
    return 'GMT' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');
}

function format_timezone_name($name) {
    $name = str_replace('/', ', ', $name);
    $name = str_replace('_', ' ', $name);
    $name = str_replace('St ', 'St. ', $name);
    return $name;
}

