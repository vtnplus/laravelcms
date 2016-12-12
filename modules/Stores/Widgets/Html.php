<?php
namespace Modules\Stores\Widgets;
class Html{


	public function register(){
		return [
				"name" => "Html Code",
				"icons"	=>	"",
				"auth"	=> "",
				"source"	=> ""
			];
	}


	public function main($data = []){
		$html = (@$data["autoline"] == 1 ? nl2br(@$data["html"]) : @$data["html"]);
		if(@$data["shortcode"] == 1){
			return do_shortcode($html);
		}
		return $html;
	}


	public function admin($data = []){

		echo '<textarea class="form-control" style="height:300px; margin-bottom:10px;" name="content[html]">'.@$data["html"].'</textarea><label class="checkbox-inline"><input type="checkbox" name="content[autoline]" value="1" '.(@$data["autoline"] == 1 ? "checked" : "").'> Auto Line</label> <label class="checkbox-inline"><input type="checkbox" name="content[shortcode]" value="1" '.(@$data["shortcode"] == 1 ? "checked" : "").'> Allow Shortcode</label>';
	}
}