<?php
namespace Modules\Media\Backend;
use Remios\Apps\Admin;
class Files extends Admin
{
	

	function getIndex($a=""){
        

    	return views("images");
    }

    function getManager($folder="", $search="", $folter=""){
    	$dir = db("Media::Media")->language()->stores()->where("type","images")->where("folder", $folder)->where("isdir",1)->get();
    	$files = db("Media::Media")->language()->stores()->where("type","images")->where("folder", $folder)->where("isdir",0)->orderBy("id","DESC")->rows(60);
    	$reback = false;
    	if($folder){
    		$reback = true;
    	}

    	return views("images-item",["files" => $files, "dir" => $dir, "back" => $reback]);
    }

    function getDelete($id=0,$filter=""){
        $data = db("Media::Media")->language()->stores()->find($id);
        if($data){
            $data->delete();
        }
        return redirect()->back()->with("success", lang("settings.success_delete"));
    }

    function postEdit(){
        $id = input("id");
        $data = db("Media::Media")->language()->stores()->find($id);
        if($data){
            $data->name = input("name");
            $data->alt = input("alt");
            $data->save();
        }
        return redirect(admin_url("media/images/manager",false))->with("success", lang("settings.success_delete"));
    }
    /*
	Conver Sync Folder Data
    */

    function getSync($folder="", $search="", $fillter=""){
        $root_path = base_path("contents/uploads/".getAuth()."/images/thumnails");
        if(!is_dir($root_path)){
            files()->makeDirectory($root_path, 0775, true);
        }

    	$type="images";
    	$path_dir = base_path("contents/uploads/".getAuth()."/sync".($folder ? "/".$folder : ""));
        if(!is_dir($path_dir)) return redirect()->back()->with("success", lang("settings.success_delete"));


        files()->copyDirectory($path_dir,str_replace('sync', 'images', $path_dir));
        //files()->cleanDirectory($path_dir);
    	$dir = [];
    	$fileDir = files()->directories($path_dir);
    	foreach ($fileDir as $key => $value) {
            if(basename($value) != "thumnails"){
        		$read = db("Media::Media")->language()->stores()->where("type",$type)->where("paths", basename($value))->where("isdir",1)->first();
        		if(!$read){
        			db("Media::Media")->insert([
        					"name" => ucfirst(basename($value)),
        					"thumbs" => basename($value),
        					"paths" => basename($value),
        					"language"	=> getLanguage(),
        					"stores_id" => getStores(),
        					"users_id"	=> getAuth(),
        					"type"	=> $type,
        					"isdir"	=> 1,
        					"folder" => $folder
        				]);
        		}
            }
    	}


    	$allow_ext = ["jpg","gif","png"];
    	

    	$files = [];
    	foreach ($allow_ext as $key_ext => $value_ext) {
    		$path_file = $path_dir."/*.".$value_ext;
    		
	    	$file = files()->glob($path_file);
	    	foreach ($file as $key => $value) {
	    		$read = db("Media::Media")->language()->stores()->where("type",$type)->where("paths", basename($value))->where("isdir",0)->first();
                //$filename = files()->extension($value);
                

                
	    		if(!$read){
                    $filename = basename($value);

                    image($value)->resize(100, 100,function ($constraint) {
                                                            $constraint->aspectRatio();
                                                            $constraint->upsize();
                                                        })->resizeCanvas(100, 100)->save($root_path."/".$filename);
                   
                    files()->delete($value);

	    			db("Media::Media")->insert([
	    					"name" => ucfirst(str_replace(['.'.$value_ext,'_','-'],['',' ',' '],basename($value))),
                            "alt" => ucfirst(str_replace(['.'.$value_ext,'_','-'],['',' ',' '],basename($value))),
	    					"paths" => basename($value),
	    					"thumbs" => "thumnails/".basename($value),
	    					"language"	=> getLanguage(),
	    					"stores_id" => getStores(),
	    					"users_id"	=> getAuth(),
	    					"type"	=> $type,
	    					"isdir"	=> 0,
	    					"folder" => $folder
	    				]);
	    		}
	    	}
    	}

    	return redirect(admin_url("media/images/manager",false))->with("success", lang("settings.success_delete"));
    }


    function postUpload($folder="", $filter=""){
        $return = [];
        $allow_ext = ["jpg","gif","png"];
        $path_dir = base_path("contents/uploads/".getAuth()."/images".($folder ? "/".$folder : ""));
        $file = array('image' => input()->file('image'));
          // setting up rules
          $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
          // doing the validation, passing post data, rules and the messages
          $validator = app("validator")->make($file, $rules);
          if ($validator->fails()) {
            $return["error"] = input()->all();
          }else{
            if (input()->file('image')->isValid()) {
                
                $destinationPath = $path_dir; // upload path
                  $extension = input()->file('image')->getClientOriginalExtension(); // getting image extension
                  if(in_array($extension, $allow_ext)){

                        $fileName = input()->file('image')->getClientOriginalName(); // renameing image
                        
                        $read = db("Media::Media")->language()->stores()->where("type","images")->where("paths", basename($fileName))->where("isdir",0)->first();

                        if(!$read){
                            input()->file('image')->move($destinationPath, $fileName);

                            image($destinationPath."/".$fileName)->resize(100, 100,function ($constraint) {
                                                                    $constraint->aspectRatio();
                                                                    $constraint->upsize();
                                                                })->resizeCanvas(100, 100)->save($path_dir."/thumnails/".$fileName);
                           
                            
                            db("Media::Media")->insert([
                                    "name" => ucfirst(str_replace(['.'.$value_ext,'_','-'],['',' ',' '],basename($fileName))),
                                    "alt" => ucfirst(str_replace(['.'.$value_ext,'_','-'],['',' ',' '],basename($fileName))),
                                    "paths" => basename($fileName),
                                    "thumbs" => "thumnails/".basename($fileName),
                                    "language"  => getLanguage(),
                                    "stores_id" => getStores(),
                                    "users_id"  => getAuth(),
                                    "type"  => "images",
                                    "isdir" => 0,
                                    "folder" => $folder
                                ]);
                        }

                        
                        
                  }
                  
            }

          }
        return redirect(admin_url("media/images/manager",false))->with("success", lang("settings.success_delete"));

    }
}