<?php
namespace Modules\Stores\Backend;
use Remios\Apps\Admin;
class Email extends Admin
{
	
    public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
        dd("Index Disable");
    }

    function getManager($type="main", $search="", $filter=""){
    	$data = db("Stores::Mail_template")->language()->stores()->type($type)->rows();

    	return views("email-templates",["data" => $data, "type" => $type]);
    }

    function getEdit($id=0, $type="", $filter=""){
    	$data = db("Stores::Mail_template")->language()->stores()->find($id);
    	return views("email-templates-edit",["data" => $data]);
    }


    function postEdit($id=0, $type="", $filter=""){
        $data = db("Stores::Mail_template")->language()->stores()->find($id);
        $input = [
            'subject' => input("subject"),
            'keyword' => input("keyword"),
        ];
        
        if($data->keyword != input("keyword")){
            $rules = [
                'subject' => 'required|max:255',
                'keyword' => 'required|unique:mail_template|max:255',
            ];
        }else{
            $rules = [
                'subject' => 'required|max:255',
                'keyword' => 'required|max:255',
            ];
        }
        $messages = [
                "subject.required"  => "Subject chưa nhập",
                "subject.max"    =>  "Subject không vượt quá 250 ký tự",
                "keyword.required"  => "Từ khóa không thể bỏ trống",
                "keyword.max"   =>  "Từ khóa không vượt quá 250 ký tự",
                "keyword.unique" => "Từ khóa này đã được sử dụng"
            ];
        $validator = app("validator")->make($input, $rules, $messages);
        if ($validator->fails()) {

            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
             
             $data->subject = input("subject");
             $data->keyword = input("keyword");
             $data->content = input("content");
            
             $data->save();
        }

        return redirect("stores/email/manager/".(@$data->type ? $data->type : "main"))->with("success", lang("pages.home.success_create"));
    }

    function getCreate($type="main", $filter=""){
        $id = db("Stores::Mail_template")->insertGetId(
            array(
                'language' => getLanguage(),
                'stores_id' => getStores(),
                'users_id'  => getAuth(),
                'subject'     =>  'New Document',
                'created_at' => date("Y-m-d h:i:s"),
                'type' => $type
                )
        );
        return redirect("stores/email/edit/".$id)->with("success", lang("pages.home.success_create"));
    }


    function getCopy($id,$language="", $fillter=""){
        
        $data = db("Stores::Mail_template")->language()->stores()->auth()->find($id);
        if($data && $language){
            $data->id = NULL;
            $data->language = $language;
            
            if(config("site.tranlaytion_posts") == "yes"){
                $data->subject = tranlation($data->subject,"",$language);
                $data->content = tranlation($data->content,"",$language);
            }
            
            $data->replicate()->save();
        }
        return redirect()->back()->with("success", lang("pages.home.success_delete"));
    }

    function getDelete($id=0,$filter=""){
        $data = db("Stores::Mail_template")->language()->stores()->find($id);
        if($data){
            $data->delete();
        }
        return redirect()->back()->with("success", lang("pages.home.success_create"));
    }


}