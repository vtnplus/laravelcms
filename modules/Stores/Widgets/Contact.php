<?php
namespace Modules\Stores\Widgets;
class Contact{


	public function register(){
		return [
				"name" => "Contact",
				"icons"	=>	"",
				"auth"	=> "",
				"source"	=> ""
			];
	}


	public function main($data = []){
		$html = '
			<h4>'.data(@$data["company"],config("site.sitename")).'</h4>
			<ul>
				<li>Address : '.data(@$data["address"],config("site.address")).'</li>
				<li>Phone : '.data(@$data["phone"],config("site.hotline")).'</li>
				<li>Email : '.data(@$data["email"],config("site.email")).'</li>
				<li>Website : '.data(@$data["website"],base_url()).'</li>
			</ul>';
		if(@$data["feactback"] == 1){
		$html .= '	<h4>Send Fectback</h4>
			<ul class="row magic-form">
				<li class="col-xs-6">
					Your Name
					<input class="form-control">
				</li>
				<li class="col-xs-6">
					Your Phone
					<input class="form-control">
				</li>
				
				<li class="col-xs-12">
					
					<textarea class="form-control"></textarea>
				</li>
				<li class="col-xs-12">
					<button class="btn btn-primary">Send Contact</button>
				</li>
			</ul>
		';
		}
		return $html;
	}


	public function admin($data = []){

		echo '
		Company <input class="form-control" name="content[company]" value="'.@$data["company"].'">
		Address <input class="form-control" name="content[address]" value="'.@$data["address"].'">
		Phone <input class="form-control" name="content[phone]" value="'.@$data["phone"].'">
		Email <input class="form-control" name="content[email]" value="'.@$data["email"].'">
		Website <input class="form-control" name="content[website]" value="'.@$data["website"].'">

		Html Code <textarea class="form-control" style="height:100px; margin-bottom:10px;" name="content[html]"></textarea>
		<label class="checkbox-inline"><input type="checkbox" name="content[feactback]" value="1" '.(@$data["feactback"] == 1 ? "checked" : "").'> Show Form Fectback</label>';
	}
}