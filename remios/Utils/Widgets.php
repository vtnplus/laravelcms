<?php
namespace Remios\Utils;
use Illuminate\Support\Facades\View;
class Widgets{

	public $layout = true;
	public $setLayout = false;
	public $output = "";
	public $postion = "widgets-left";

	function setPostions($key){
		$this->postion = "widgets-".$key;
	}


	function template($panel=false, $title=false){
		if($panel){
		$html = '
			<div class="{class}">
				<div class="panel panel-default">';
				if($title){
		$html .= '<div class="panel-heading">
				    <h3 class="panel-title"><i class="icons fa {icons}"></i> {title}</h3>
				  </div>';
				}
		$html .= '<div class="panel-body">
				    {content}
				  </div>
				</div>
			</div>
		';
		}else{
			$html = '<div class="{class}">';
			if($title){
				$html .= '<h3 class="panel-title"><i class="icons fa {icons}"></i> {title}</h3>';
			}
			$html .= '{content}';
			$html .= '</div>';
		}
		return $html;
	}


	

	

	function make($ado=""){
		
		if($ado == "customs"){
			$this->output = $this->makeCustoms();
		}else{
			$this->output = $this->makeDefault();
		}

		
		return $this;
	}


	function makeCustoms(){
		$html = [];
		$data = db("Settings::Widgets")->stores()->language("null")->where("targets", $this->postion)->orderBy("sorts","ASC")->get();
		$html[] = '<div class="row '.$this->postion.'">';
		foreach ($data as $key => $value) {
			if(method_exists($value->namespace, "main")){

				

				$options = @unserialize(@$value->content);

				$template = $this->template(@$options["__panel"],@$options["__title"]);

				ob_start();
				echo with(new $value->namespace)->main($options);
				$info = ob_get_contents();
   				ob_end_clean();
				
   				$optionsRows = @implode(@$options["sizeRows"]," ");
   				$class = strtolower(basename(str_replace('\\', '/', $value->namespace)));

				$template = str_replace(['{class}','{icons}','{title}','{content}'],[(@$optionsRows ? @$optionsRows : "col-lg-3")." ".$class, $value->icons, $value->title, @$info],$template);

				$html[] = $template;
			}
		}
		$html[] = '</div>';
		return implode($html, "\n");
	}


	function makeDefault(){
		$html = [];
		$html[] = '<div class="slidebar '.$this->postion.'">';
		$data = db("Settings::Widgets")->stores()->language("null")->where("targets", $this->postion)->orderBy("sorts","ASC")->get();

		foreach ($data as $key => $value) {
			if(method_exists($value->namespace, "main")){
				$options = @unserialize(@$value->content);

				$template = $this->template(@$options["__panel"],@$options["__title"]);

				ob_start();
				echo with(new $value->namespace)->main($options);
				$info = ob_get_contents();
   				ob_end_clean();

				$class = strtolower(basename(str_replace('\\', '/', $value->namespace)));

				$template = str_replace(['{class}','{icons}','{title}','{content}'],["widgets widgets-".$class,$value->icons, $value->title, @$info],$template);

				$html[] = $template;
			}
		}
		$html[] = '</div>';
		return implode($html, "\n");
	}


	function getData(){

	}


	function send(){
		echo $this->output;
	}

	function render(){
		return $this->output;
	}

}
