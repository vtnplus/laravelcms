<?php
namespace Modules\Media\Backend;
use Remios\Apps\Admin;
class Uploads extends Admin
{
  

  function getIndex($a=""){
      dd("");
    }
function postAvatar(){
        $root_path = base_path("contents/uploads/".getAuth());
        $return = [];
        $file = array('image' => input()->file('image'));
          // setting up rules
          $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
          // doing the validation, passing post data, rules and the messages
          $validator = app("validator")->make($file, $rules);
          if ($validator->fails()) {
            $return["error"] = input()->all();
          }else{
            if (input()->file('image')->isValid()) {
                $return["upload"] = "ok";
                $destinationPath = $root_path; // upload path
                  $extension = input()->file('image')->getClientOriginalExtension(); // getting image extension
                  $allow_ext = ["jpg","gif","png"];
                  $fileName = 'avatar.'.$extension; // renameing image
                  if(in_array($extension, $allow_ext)){
                    input()->file('image')->move($destinationPath, $fileName);

                    image($root_path."/".$fileName)->resize(100, 100,function ($constraint) {
                                                              $constraint->aspectRatio();
                                                              $constraint->upsize();
                                                          })->resizeCanvas(100, 100)->save($root_path."/".$fileName);

                    $return["sort_url"] = str_replace(base_path(),"",$destinationPath."/".$fileName);
                    $return["full_url"] = str_replace(base_path(),base_url(),$destinationPath."/".$fileName);
                  }else{
                    $return["sort_url"] = "";
                    $return["full_url"] = "";
                  }
            }else{
                $return["validate"] = "ok";
            }

          }
        return json_encode($return);

    }
}