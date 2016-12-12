<?php
namespace Modules\Stores\Widgets;
class GoogleAds{


	public function register(){
		return [
				"name" => "Google Ads",
				"icons"	=>	"",
				"auth"	=> "",
				"source"	=> ""
			];
	}


	public function main($data = []){
		return '
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- 300x250px -->
		<ins class="adsbygoogle" style="display:inline-block;width:100%;height:250px" data-ad-client="ca-pub-4099957745291159" data-ad-slot="1384479382"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>';
	}


	public function admin($data = []){

		echo '<textarea class="form-control" style="height:300px; margin-bottom:10px;" name="content[html]">'.@$data["html"].'</textarea><label class="checkbox-inline"><input type="checkbox" name="content[autoline]" value="1" '.(@$data["autoline"] == 1 ? "checked" : "").'> Auto Line</label> <label class="checkbox-inline"><input type="checkbox" name="content[shortcode]" value="1" '.(@$data["shortcode"] == 1 ? "checked" : "").'> Allow Shortcode</label>';
	}
}

