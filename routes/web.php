<?php
$app->get('/', 'Remios\Apps\Main@getIndex');
$app->get('/sitemap.xml', 'Remios\Apps\Main@getSitemap');
$app->get('/feeds', 'Remios\Apps\Main@getFeeds');
$app->get('/robots.txt', 'Remios\Apps\Main@getRobots');

if(input("pages")){

	$app->get("/",function($first=""){
		$data = db("Pages::Pages")->language()->stores()->find(input("pages"));
		$map = $data->pages_maps;
		$parent = explode('|', $map);
		$parent_id = $parent[0];

	    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), [$data->parent_id,$data->seo_urls]);
	});
}

if(file_exists(base_path("profiles/router.php"))){
	include_once base_path("profiles/router.php");
}

//$app->get('/account/{all}', 'Modules\Account\Frontend\Home@getIndex');