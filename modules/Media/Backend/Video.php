<?php
namespace Modules\Media\Backend;
use Remios\Apps\Admin;
class Video extends Admin
{
	

	function getIndex($a=""){
        

    	return views("video");
    }

    function getManager($folder="", $search="", $folter=""){
    	$dir = db("Media::Media")->language()->stores()->where("type","video")->where("folder", $folder)->where("isdir",1)->get();
    	$files = db("Media::Media")->language()->stores()->where("type","video")->where("folder", $folder)->where("isdir",0)->rows(20);
    	$reback = false;
    	if($folder){
    		$reback = true;
    	}

    	return views("video-item",["files" => $files, "dir" => $dir, "back" => $reback]);
    }

    function getInfo(){
        $url = input("url");
        $youtube = "http://www.youtube.com/oembed?url=". $url ."&format=json";

         $curl = curl_init($youtube);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         $return = curl_exec($curl);
         curl_close($curl);
         $extract = json_decode($return);
         $extract->id = $this->getYoutubeid($url);
        
         return json_encode($extract);
    }

    function getYoutubeid($source=""){
       
    $pattern = '/^(?:(?:(?:https?:)?\/\/)?(?:www.)?(?:youtu(?:be.com|.be))\/(?:watch\?v\=|v\/|embed\/)?([\w\-]+))/is';
    $matches = array();
    preg_match($pattern, $source, $matches);
    if (isset($matches[1])) return $matches[1];
    return false;
    }


    function videoType($url) {
        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        }  elseif (strpos($url, 'ytimg') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        } else {
            return 'unknown';
        }
    }

    function postEdit($folder="", $filter=""){
        $id = input("id");
        $code = input("code");
        $name = input("name");
        $url_thumbs = input("url_thumbs");

        $input = [
            'code' => $code
        ];

        $rules = [
            'code' => 'required|max:255',
        ];
        $messages = [
                "code.required"  => "Số Video code chưa nhập",
                "code.unique"    =>  "Số Video code ".input("code")." đã được dùng",
            ];

        $validator = app("validator")->make($input, $rules, $messages);
        if (!$validator->fails()) {

            $data = db("Media::Media")->language()->stores()->where("code",$code)->first();

            $path_dir = base_path("contents/uploads/".getAuth()."/video".($folder ? "/".$folder : ""));

            $thumbs = $code.".".files()->extension($url_thumbs);
            $file_thumbs = $path_dir."/".$thumbs;

           
            if($this->videoType($url_thumbs) == "youtube" || $this->videoType($url_thumbs) == "vimeo"){

                if(!file_exists($file_thumbs) && $url_thumbs){
                    files()->put($file_thumbs, file_get_contents($url_thumbs));
                    image($file_thumbs)->resize(100, 100,function ($constraint) {
                                                                $constraint->aspectRatio();
                                                                $constraint->upsize();
                                                            })->resizeCanvas(100, 100)->save($path_dir."/thumnails/".basename($file_thumbs));
                }
            }

            if($data){
                $data->name = $name;
                $data->alt = input("alt");
                $data->thumbs = "thumnails/".$thumbs;
                $data->paths = $thumbs;
                $data->save();
            }else{
                
                
                db("Media::Media")->insert([
                    "code"  => $code,
                    "type" => "video",
                    "classname" => "youtube",
                    "name" => $name,
                    "thumbs" => "thumnails/".$thumbs,
                    "paths" => $thumbs,
                    "stores_id" => getStores(),
                    "users_id"  =>  getAuth(),
                    "language"  =>  getLanguage(),
                ]);
            }
        }
        return redirect(admin_url("media/video/manager",false))->with("success", lang("settings.success_delete"));
    }


    function postUpload($folder="", $filter=""){
        $allow_ext = ["jpg","gif","png"];
        $path_dir = base_path("contents/uploads/".getAuth()."/video".($folder ? "/".$folder : ""));
        $file = array('image' => input()->file('image'));
          // setting up rules
        $rules = array('image' => 'required',); 
        $validator = app("validator")->make($file, $rules);
        if ($validator->fails()) {
            $return["error"] = input()->all();
        }else{
            if (input()->file('image')->isValid()) {
                
                $destinationPath = $path_dir; // upload path
                  $extension = input()->file('image')->getClientOriginalExtension(); // getting image extension
                  if(in_array($extension, $allow_ext)){

                        $fileName = input("video_id").".".$extension; // renameing image
                        
                        input()->file('image')->move($destinationPath, $fileName);
                        image($destinationPath."/".$fileName)->resize(100, 100,function ($constraint) {
                                                                $constraint->aspectRatio();
                                                                $constraint->upsize();
                                                            })->resizeCanvas(100, 100)->save($path_dir."/thumnails/".$fileName);
                  }
                  
            }

        }
        return redirect(admin_url("media/video/manager",false))->with("success", lang("settings.success_delete"));
    }
}