<?php
namespace Modules\Pages\Frontend;
use Remios\Apps\Main;
class Home extends Main
{
	
	public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a="", $posts="", $fillter=""){
		
		$layout = "pages";
		$type = "";
		

		
		
		if(is_numeric($a) && intval($a) > 0){
			
			$data = db("Pages::Pages")->language()->stores()->find($a);
			$a = str_replace('.html','',$data->seo_urls).'.html';

		}else{
			

			$data = app("cache")->remember(config("site.language").".".$a,60*24*7, function() use($a){

				$a = str_replace('.html','',$a).'.html';
				return db("Pages::Pages")->language()->stores()->where("seo_urls", $a)->first();

			});
		}
		
		$type = str_replace('.html','',$a); //Set default Type by Pages
		
		$options = @unserialize(@$data->options);
		
		config([
				"register.pages.urls" => str_replace('.html','',$a),
				"register.pages.breadcrumbs.bg" => @$options["breadcrumbs"],
				"register.pages.parent_id" => @$data->id,
				]);
		
		if($data){
			$data->visists = $data->visists + 1;
			$data->save();
			
			register("seo.title",(is_home() ? config("site.sitename") : $data->title));
			
			/*
			Set Pages Layout
			*/

			if($data->display_as && $data->display_as != "pages.php"){
				$reset_layout = str_replace(['.php','.blade.php','.html','.shtml'],'', $data->display_as);
				if(view()->exists("pages.".$reset_layout)){
					$layout = "pages.".$reset_layout;
				}
				config(["register.pages.post_type" => $type, "register.pages.breadcrumbs.link.".$type => $data->title]);

			}else{
				/*
				With Post Type
				*/
				if(view()->exists("pages.".$type)){
					$layout = "pages.".$type;
				}
				config(["register.pages.post_type" => $type, "register.pages.breadcrumbs.link.".$type => $data->title]);
			}

				/*
				Deteact Child Pages
				*/
				$dataChild = app("cache")->remember(config("site.language").".".$posts,60*24*7, function() use($posts){
					return db("Pages::Pages")->language()->stores()->where("seo_urls", $posts)->first();
				});
				

				if($dataChild){
						register("seo.title",$dataChild->title);
						
						config(["register.pages.view" => 1]);
						
						$child_layout = str_replace(['.php','.blade.php','.html','.shtml'],'', $dataChild->display_as);

						if(view()->exists("content.".@$child_layout)){
							$data->contentPosts = view("content.".$child_layout,["data" => $dataChild])->render();
						}else{
							$data->contentPosts = $dataChild->content;
						}

				}else{

					if($posts == "catalog"){
						$dataPost = db("Catalog::Categories")->language()->stores()->where("seo_urls", $fillter)->first();

						register("seo.title",$dataPost->title);
						
						config(["register.pages.view" => 1]);
						
						if(view()->exists("content.catalog-".@$dataPost->type)){
							$data->contentPosts = view("content.catalog-".$dataPost->type,["data" => $dataPost])->render();
						}else{
							$data->contentPosts = do_shortcode('[posts category="'.$dataPost->id.'" type="'.$dataPost->type.'" pages="paged"][/posts]');
						}
					}else{

						/*
						Validate child Pages
						*/


						if(input("pid")){
					
							$dataPost = db("Posts::Posts",$type)->language()->stores()->find(input("pid"));

							if($dataPost->related_id) return redirect(base_url($dataPost->related_id)); // redirect URL

							register("seo.title",$dataPost->title);
							
							config(["register.pages.view" => 1]);
							
							if(view()->exists("content.".@$dataPost->type)){
								$data->contentPosts = view("content.".$dataPost->type,["data" => $dataPost])->render();
							}else{
								$data->contentPosts = $dataPost->content;
								$data->posts = $dataPost;
							}
							

						}else if($a != $posts && $posts){
							//$type = str_replace('.html','',$a).'.html';
							
							$dataPost = db("Posts::Posts", $type)->language()->stores()->where("seo_urls", $posts)->first();

							if($dataPost->related_id) return redirect(base_url($dataPost->related_id)); // redirect URL
							
							register("seo.title",$dataPost->title);
							config(["register.seo.description" => @$dataPost->meta_description,"register.seo.keyword" => @$dataPost->meta_keyword]);
							
							config(["register.pages.view" => 1]);
							
							if(view()->exists("content.".@$dataPost->type)){
								$data->contentPosts = view("content.".$dataPost->type,["data" => $dataPost])->render();
							}else{
								$data->contentPosts = $dataPost->content;
								$data->posts = $dataPost;
							}
							
						}
					}// End if Catalog
				
			}
			


		}else{

			register("seo.title","Pages Not Found");

			return views("errors.404");
		}

		$layoutSet = @$options["layout"];
		$layoutCount = intval(@$layoutSet["left"])  + intval(@$layoutSet["right"]);

		$layoutContents = 12 - $layoutCount;

		$size = [
			"left" => intval(@$layoutSet["left"]),
			"right" => intval(@$layoutSet["right"]),
			"content" => intval($layoutContents),
			"full"	=>	data(@$layoutSet["fullcontent"],"no"),
		];
		return views($layout,["data" => $data, "type" => $type,"size" => $size]);
    }

    
}
?>