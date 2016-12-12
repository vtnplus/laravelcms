<?php
namespace Modules\Stores\Widgets;
class Tagcloud{


	public function register(){
		return [
				"name" => "Tag's Cloud",
				"icons"	=>	"",
				"auth"	=> "",
				"source"	=> ""
			];
	}


	public function main($data = []){
		$ex = explode(',',@$data["html"]);
		$tag = [];
		$keyword = explode(',',config("site.keyword"));
		$ex = array_merge($ex, $keyword);


		$keyword = explode(',',config("register.seo.title.0"));
		$ex = array_merge($ex, $keyword);
		$tags = ['h1','h2','h3','h4','h5','h6','h7','p','div','strong'];
		foreach ($ex as $key => $value) {
			$rand = $tags[array_rand($tags,1)];
			if($value){
				$tag[] = '<'.$rand.' title="'.trim($value).'" class="tags-cloud"><a  href="'.(@$data["findurl"] ? base_url($data["findurl"]) : "?tags=").''.trim($value).'">'.trim($value).'</a></'.$rand.'>';
			}
		}
		
		return implode($tag, " ");
	}


	public function admin($data = []){

		echo '<input type="text" class="form-control" name="content[findurl]" value="'.@$data['findurl'].'"><br><textarea class="form-control" style="height:300px; margin-bottom:10px;" name="content[html]">'.@$data['html'].'</textarea><label class="checkbox-inline"><input type="checkbox" name="content[autoline]" value="1"> Auto Line</label> <label class="checkbox-inline"><input type="checkbox" name="content[shortcode]" value="1"> Allow Shortcode</label>';
	}
}