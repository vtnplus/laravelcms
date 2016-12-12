<?php
namespace Modules\Tools\Backend;
use Remios\Apps\Admin;
class Sync extends Admin
{
	

	function getIndex($a=""){

		$data = db("Media::Media")->where("type","images")->where("isdir","0")->get();
		foreach ($data as $key => $value) {
			db("Posts::Posts")->insert([
				"title" => $value->name,
				"thumbs"	=> "/contents/uploads/1/images/".$value->paths,
				"language"	=>	getLanguage(),
				"users_id"	=>	getAuth(),
				"stores_id"	=> getStores(),
				"type"	=>	config("site.solution"),
				"status"	=>	1,
				"seo_urls"	=> str_slug($value->name).'.html',
			]);
		}
    }
}