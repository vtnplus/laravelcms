<?php
namespace Modules\Stores\Frontend;
use Remios\Apps\Main;
class Sendmail extends Main
{
	
	public function __construct()
    {
        parent::__construct();
    }

	function getIndex($a=""){
		$data = input("text");
		if(!$data){
			return redirect()->back()->with("error", lang("global.sendmail_error"));
		}
		$content = [];

		foreach ($data as $key => $value) {
			
			if($key == "content"){
				$content[] = $value;
			}else{
				$content[] = ucfirst($key)." : ".$value;
			}
			
		}
		$contents = [];
		$contents["subject"] = $data["subject"];
		$contents["content"] = implode($content, "<br />");
		$contents["form"] = $data["email"];

		$this->sender("", config("site.email"), $contents);

		return redirect()->back()->with("success", sprintf(lang("global.sendmail_success"), '<b>'.config("site.sitename").'</b>'));
    }

    
    function sender($keyword=null, $to=[], $extract=[]){
    	$config = array_merge(config("mail"),[
                "driver" => "smtp",
                "host" => config("site.smtp_server","127.0.0.1"),
                "port" => config("site.smtp_port","25"),
                "from" => [
                    "address" => (@$extract["form"] ? $extract["form"] : config("site.email","noreply@".base_url("",true))),
                    "name" => config("site.sitename","LARAVELCMS.NET")
                  ],
                "encryption" => config("site.smtp_encryption"),
                "username" => config("site.smtp_username"),
                "password" => config("site.smtp_password")
              ]);
	    config(["mail" => $config]);
	    
	    $data = [];

	    $layout = "mails.default";

	    if($keyword){

	        $read = db("Stores::Mail_template")->language()->where("keyword", $keyword)->first();

	        if($read){
	            
	            $content = $read->content;

	            foreach ($extract as $key => $value) {
	                $content = str_replace('{'.$key.'}', $value, $content);
	            }

	            $data["content"] = $content;
	            $data["subject"] = $read->subject;

	            if($read->layout){

	              $layout = "mails.".str_replace(['.php','.blade'], '', $data->layout);

	            }
	        }
	    }else{

	        $data = $extract;

	    }

	    $data["content"] = $this->replaceWith($data["content"]);

	    \Mail::send($layout,$data, function($message) use($data, $to){
	        
	        if(is_array($to)){
	            $message->to($to["to"],ucfirst($to["to"]));

	            if(isset($to["cc"])){
	                $message->bbc($to["cc"],ucfirst($to["cc"]));
	            }

	            if(isset($to["bbc"])){
	                $message->bbc($to["bbc"],ucfirst($to["bbc"]));
	            }

	        }else{
	            $message->to($to,ucfirst($to));
	        }
	        
	        $message->subject((@$data["subject"] ? $data["subject"] : config("site.sitename","LELAVELCMS.NET")));
	    });
    }


    function replaceWith($text){
    	$data = config("site");
    	foreach ($data as $key => $value) {
    		if(!is_array($value)){
    		$text = str_replace('{'.$key.'}', $value, $text);
			}
    	}
    	return $text;
    }
}
?>