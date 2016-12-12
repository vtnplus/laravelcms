<?php
namespace Remios\Utils;

class Jquery{

	public $url = "";
	public $uri = "";
	public $attach = "";
	public $method = "get";
	public $data = [];
	public $dataType = null;
	public $success = "";

	function ajax($type="get"){
		echo '$.ajax({
                    url : "'.$this->url.'" + '.$this->uri.',
                    type : "'.$this->method.'",';

                    if($this->dataType){
        echo '            dateType:"'.$this->dataType.'",';
        			}
        			
        echo '       
        			data : {
                        '.$this->getData().'
                    },
                    ';
                	
        echo '
                    success : function (result){';
                    $this->getSuccess();
                    if($this->attach){
                    	echo '
                    	$("'.$this->attach.'").html(result);
                    	';
                    }
        echo '      
    				}
                });
            ';
                    
	}


	function setSuccess($code=""){
		$this->success = $code;
		return $this;
	}


	function getSuccess(){
		echo $this->success;
	}


	function setUrl($url="", $uri=""){
		$this->uri = $uri;
		$this->url = $url;
		return $this;
	}

	function setMethod($method="get"){
		$this->method = $method;
		return $this;
	}

	function getData(){
		$arv = [];
		if(is_array($this->data)){
			
			$arv[] = '"_token" : "'.csrf_token().'"';
		}else{
			$arv = '_token='.csrf_token().'&'.$this->data;
		}
		if(is_array($this->data)){
			foreach ($this->data as $key => $value) {
				$arv[] = '"'.$key.'" : "'.$value.'"';
			}
			return implode($arv, "\n");
		}else{
			return $arv;
		}
	}

	function getHtml($attach=""){
		$this->attach = $attach;
		return $this;
	}
}
