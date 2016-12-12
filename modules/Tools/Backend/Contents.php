<?php
namespace Modules\Tools\Backend;
use Remios\Apps\Admin;
class Contents extends Admin
{
	

	function getIndex($a=""){

		return views("tools-clonce-contents");
    }

    function postBuilder(){
    	$dir_cache = __DIR__."/clone_cache/cache.php";
    	$items = input("items");
    	$items = (is_array($items) ? $items : []);
    	$code = [];
    	$code[] = '<?php';
		$code[] = '$urls="'.input("urls").'";';
		$code[] = '$projectname="'.str_slug(input("projectname")).'";';
		$code[] = '$posttype="'.str_slug(input("posttype")).'";';
		$code[] = '$set_html_code= \''.input("code").'\';';
		$code[] = '$type="'.input("type").'";';
		
		$code[] = '$items = [';
		foreach ($items as $key => $value) {
			if($key){
				$code[] = '"'.$key.'" => "'.$value.'",';
			}
		}

		$code[] = '];';

		
		$customs = input("customs");
			if(is_array($customs)){
			$code[] = '$customs = [';
			foreach ($customs["name"] as $key => $value) {
				if($value){
					$code[] = '"'.$value.'" => "'.$customs["class"][$key].'",';
				}
			}
			$code[] = '];';

		}


		$pages = input("pages");
		$code[] = '$pages = [';
		foreach ($pages as $key => $value) {
			$code[] = '"'.$key.'" => "'.$value.'",';
		}
		$code[] = '];';


		$code[] = '?>';

    	if(input("test")){

    		files()->put($dir_cache,implode($code,"\n"));
    	}

    	$projectname = str_slug(input("projectname"));

    	if(input("type") == "list"){
    		$this->renderList();
    	}else if(input("type") == "catalog"){
    		$this->renderCatalog();
    	}else if(input("type") == "brands"){
    		$this->renderBrands();
    	}else{

	    	
	    	if(@$projectname){

		    	if(!files()->isDirectory(__DIR__."/clone/".$projectname)){
		            files()->makeDirectory(__DIR__."/clone/".$projectname, 0777, true, true);
		        }

		        files()->copy(__DIR__."/clone_cache/cache-list.php",__DIR__."/clone/".$projectname."/list.php");
		        files()->copy(__DIR__."/clone_cache/cache.php",__DIR__."/clone/".$projectname."/config.php");

		        if(input("catalog") == 1 && files()->exits(__DIR__."/clone_cache/catalog.php")){
		        	files()->copy(__DIR__."/clone_cache/catalog.php",__DIR__."/clone/".$projectname."/catalog.php");
		        }

		        if(input("brands") == 1 && files()->exits(__DIR__."/clone_cache/brands.php")){
		        	files()->copy(__DIR__."/clone_cache/brands.php",__DIR__."/clone/".$projectname."/brands.php");
		        }
	    	}
    	}

    	return redirect()->back();
    }


    function getExtract(){
    	$project = files()->glob(__DIR__."/clone/*");
    	$data = [];
    	if(input("project")){
    		$data = require_once __DIR__."/clone/".input("project")."/list.php";
    	}
    	return views("tools-clonce-contents-extract",["project" => $project,"data" => $data]);
    }


    function postExtract(){
    	$project = input("project");
    	$url = input("url");
    	$this->renderContent($project, $url,input("title"));
    }


    function renderList(){
    	include_once __DIR__."/clone_cache/cache.php";
    	$path_map = __DIR__."/clone_cache/cache-list.php";

    	$dom = with(new \Remios\Utils\DOMHtml);

    	$item = [];
		$urls_query = [];
		if(@$pages["pages_end"]){
			for ($i= $pages["pages_start"]; $i <= $pages["pages_end"]; $i++) { 
				$urls_query[] = $pages["pages_urls"].$i;
			}
		}else{
			$urls_query[] = $urls;
		}

		foreach ($urls_query as $keyQuery => $valueQuery) {
			$data = $dom->file_get_html($valueQuery)->find(@$items["start_class"],0)->find(@$items["start_items"]);

			foreach ($data as $key => $value) {
				$item[] = [
					"title" => $value->find(@$items["title_class"],0)->plaintext,
					"urls"	=>	@$items["fixurls_info"].str_replace('./','',$value->find(@$items["urls_info"],0)->href)
				];
			}
		}

		files()->put($path_map,'<?php return '."\n".var_export($item,true)."\n".'?>');
    }


    function renderCatalog(){
    	$dom = with(new \Remios\Utils\DOMHtml);
    	$dircache = __DIR__."/clone_cache/catalog.php";
    	include_once __DIR__."/clone_cache/cache.php";
    	$code = [];
    	@list($class,$number) = explode(';', @$items["start_class"]);

    	if($set_html_code){
    		$data = $dom->str_get_html($set_html_code);
    	}else{
    		$data = $dom->file_get_html($urls)->find(data($class,"body"),$number);
    	}
    	@list($items,$numberItems,$format) = explode(';', @$items["start_items"]);
    	$atx = (@$data->find($items) ? $data->find($items) : []);

    	$code[] = '<?php';
    	foreach ($atx as $key => $value) {
    		
    		switch ($format) {
					case 'html':
						$format = 'innertext';
						break;
					case 'src':
						$format = 'src';
						break;
					case 'href':
						$format = 'href';
						break;
					default:
						$format = 'plaintext';
						break;
				}

			$title = trim(@$value->{$format});
			$code[] = '
			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","'.md5($title).'");
            if($data){
                $data->title = \''.$title .'\';
                
                $data->seo_urls = str_slug("'.$title.'").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  \''.$title .'\',
                    "keyword"	=> \''.md5($title) .'\',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("'.$title.'").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }';
    	}
    	$code[] = '?>';
    	files()->put($dircache,implode($code,"\n"));
    }




    function renderBrands(){
    	$dom = with(new \Remios\Utils\DOMHtml);
    	$dircache = __DIR__."/clone_cache/brands.php";
    	include_once __DIR__."/clone_cache/cache.php";
    	$code = [];
    	@list($class,$number) = explode(';', @$items["start_class"]);

    	if($set_html_code){
    		$data = $dom->str_get_html($set_html_code);
    	}else{
    		$data = $dom->file_get_html($urls)->find(data($class,"body"),$number);
    	}
    	@list($items,$numberItems,$format) = explode(';', @$items["start_items"]);
    	$atx = (@$data->find($items) ? $data->find($items) : []);

    	$code[] = '<?php';
    	foreach ($atx as $key => $value) {
    		
    		switch ($format) {
					case 'html':
						$format = 'innertext';
						break;
					case 'src':
						$format = 'src';
						break;
					case 'href':
						$format = 'href';
						break;
					default:
						$format = 'plaintext';
						break;
				}

			$title = trim(@$value->{$format});
			$code[] = '
			$data = db("Catalog::Brands")->language()->stores()->auth()->where("keyword","'.md5($title).'");
            if($data){
                $data->title = \''.$title .'\';
                
                $data->seo_urls = str_slug("'.$title.'").".html",
                $data->save();
                
            }else{
            	db("Catalog::Brands")->insert([
                    "title" =>  \''.$title .'\',
                    "keyword"	=> \''.md5($title) .'\',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("'.$title.'").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }';
    	}
    	$code[] = '?>';
    	files()->put($dircache,implode($code,"\n"));
    }

    function renderContent($project, $url,$title=""){
    	include_once __DIR__."/clone/".$project."/config.php";
    	$path_map = __DIR__."/clone/".$project."/list.php";
    	$path_contents = __DIR__."/clone/".$project."/cache_content_".md5($url).".php";

    	$itemList = require_once $path_map;
    	$dom = with(new \Remios\Utils\DOMHtml);

    	$contentUrl = $url;
		$contentFeed = "";

		$zomeSQL = file_get_contents(__DIR__."/clone_cache/cache-sql.txt");
		
		$data = $dom->file_get_html($contentUrl)->find(data(@$items["content_start"],"body"),0);
		
		if(@$items["content_classs"]){
			$contentFeed = $data->find(@$items["content_classs"],0)->innertext;
		}
		
		$gallery = [];
		if(@$items["gallery_class"]){
			@list($gallryID, $attr) = explode(';', @$items["gallery_class"]);
			$galleryFeed = $data->find(@$gallryID);
			//dd($galleryFeed);
			foreach ($galleryFeed as $key => $value) {
				if(@trim($attr)){
					$gallery[$key]["url"] = (@$items["gallery_fixurl"] ? @$items["gallery_fixurl"]."/" : "").$value->getAttribute($attr);
					$gallery[$key]["alt"] = basename($value->getAttribute($attr));
				}else{
					$gallery[$key]["url"] = (@$items["gallery_fixurl"] ? @$items["gallery_fixurl"]."/" : "").$value->src;
					$gallery[$key]["alt"] = basename($value->src);
				}
				
			}
		}

		$getGallery = $this->MakeGallery($gallery);
		$gallerys = serialize($getGallery);
		
		$thumbs = (@$thumnail_class == "" && count($getGallery["url"]) > 0 ? $getGallery["url"][0] : "");

		$customs = (!isset($customs) ? [] : $customs);


		$find = [	
					
					'{title}',
					'{content}',
					'{description}',
					'{gallery}',
					'{thumbs}'
					
				];
		$replace = [	
					$title,
					$this->replaceChater($project,$this->removeLinks($contentFeed)),
					'',
					$gallerys,
					$thumbs
				];
		

		//$find = array_merge($find, $customs_find);
		//$find = array_merge($replace, $customs_replace);


		$build = str_replace($find, $replace, $zomeSQL);

		$customs_find = [];
		$customs_replace = [];
		if(is_array($customs)){
			
			foreach ($customs as $key => $value) {
				@list($a_find, $number,$format,$a_array,$replace) = explode(';', $value);
				$number = ($number ? $number : 0);
				switch ($format) {
					case 'html':
						$format = 'innertext';
						break;
					case 'src':
						$format = 'src';
						break;
					case 'attr':
						$format = 'attr';
					break;
					case 'href':
						$format = 'href';
					break;
					case 'prices':
						$format = 'prices';
					break;
					default:
						$format = 'plaintext';
						break;
				}
				

				$a_array = @explode('=', $a_array);
				if($format == "prices"){
					$values = intval($value ? str_replace(['. ','.','đ'],'',@$data->find($a_find,$number)->plaintext) : "");
				}else if($format == "attr"){
					$values = ($value ? @$data->find($a_find,$number)->{$format} : "");
				}else{
					$values = ($value ? @$data->find($a_find,$number)->{$format} : "");
				}


				if(@$a_array[0] == "last"){
					$values = explode($a_array[1], $values);
					$values = trim($values[count($values) - 1]);
				}

				if(@$a_array[0] == "first"){
					$values = explode($a_array[1], $values);
					$values = trim($values[0]);
				}

				if($replace){
					$values = $this->replaceChater($project,$values);
				}
				$customs_builder[] = '"'.$key.'" => \''.trim($values).'\',';
				$customs_update[] = '$read->'.$key.' = $arvs[\''.trim($key).'\'];';
			}
			
		}
		$updateid = 0;
		$build = str_replace(['{customs}','{customs_update}','{hascode}'], [implode($customs_builder,"\n"),implode($customs_update,"\n"),md5($url)], $build);
		
    	files()->put($path_contents,'<?php '."\n".$build."\n".'?>');

    }

    function removeLinks($str){
		$regex = '/<a (.*)<\/a>/isU';
		preg_match_all($regex,$str,$result);
		foreach($result[0] as $rs)
		{
		    $regex = '/<a (.*)>(.*)<\/a>/isU';
		    $text = preg_replace($regex,'$2',$rs);
		    $str = str_replace($rs,$text,$str);
		}

		$str = $this->clearChatter($str);
		return $str;
	}

	function clearChatter($text){
		$text = str_replace(["'"],'',$text);
		return $text;
	}


	function replaceChater($project, $text){
		include_once __DIR__."/clone/".$project."/config.php";
		$find = explode(';', @$items["content_find"]);
		$replace = explode(';', @$items["content_replace"]);
		$text = str_replace($find, $replace, $text);

		$text = str_replace(["'",'{site_name}','{site_email}','{site_hotline}','{site_url}'], ['\'',config("site.sitename"),config("site.email"),config("site.hotline"),base_url()], $text);
		return $text;
	}

	function MakeGallery($arv = []){
		$folder = "products";
		$arvs = [];
		$path_dir = "/contents/uploads/".getAuth()."/images".($folder ? "/".$folder : "/");

		foreach ($arv as $key => $value) {
			$filename = preg_replace('/([0-9]+)-/is','',basename($value["url"]));
			with(new \Modules\Media\Backend\Images)->saveImages($value,$folder, $filename);
			$arvs["url"][] = $path_dir."/".$filename;
			$arvs["title"][] = $value["alt"];
		}
		
		return $arvs;
	}


	function getRunquery(){
		$project = input("project");
		include_once __DIR__."/clone/".$project."/config.php";
		
		if(files()->exists(__DIR__."/clone/".$project."/catalog.php")){
		     include_once __DIR__."/clone/".$project."/catalog.php";
        }

        if(files()->exists(__DIR__."/clone/".$project."/brands.php")){
		     include_once __DIR__."/clone/".$project."/brands.php";
        }

		$path_contents = files()->glob(__DIR__."/clone/".$project."/cache_content_*.php");
		$type = $posttype;
		foreach ($path_contents as $key => $value) {
			include_once $value;
		}

	}
}