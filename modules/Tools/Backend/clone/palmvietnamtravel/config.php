<?php
$urls="http://www.palmvietnamtravel.com/vietnam-tours.html";
$projectname="palmvietnamtravel";
$posttype="travel";
$type="content";
$items = [
"start_class" => "ul.tourlist",
"start_items" => "li",
"title_class" => ".tour_name",
"urls_info" => ".tour_name a",
"fixurls_info" => "http://www.palmvietnamtravel.com/",
"content_start" => "",
"thumnail_class" => "",
"gallery_class" => ".slider img",
"gallery_fixurl" => "http://www.palmvietnamtravel.com/",
"description_class" => "",
"content_classs" => ".bookmark .bookmark_content",
"content_find" => "Palm Vietnam Travel’s,Palm Vietnam Travel,Palm Vietnam, Palm",
"content_replace" => "{site_name},{site_name},",
];
$customs = [
"des_start" => ".inner_head_dt p;0;text;last=:",
"destinations" => ".inner_head_dt p;1;text;last=:",
"duration" => ".inner_head_dt p;2;text;last=:",
"prices" => ".inner_head_dt [itemprop=lowPrice]",
"policies" => "#panel-2  .bookmark_content;0;html;replace",
];
$pages = [
"pages_urls" => "http://www.palmvietnamtravel.com/vietnam-tours.html/?page=",
"pages_start" => "0",
"pages_end" => "3",
];
?>