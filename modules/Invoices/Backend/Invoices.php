<?php
namespace Modules\Invoices\Backend;
use Remios\Apps\Admin;
class Invoices extends Admin
{
	
    public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
        $data = db("Invoices::Invoices")->rows(20);
		return views("invoices-invoices",["data" => $data]);
    }

    function postIndex($a=""){
    }

    function getEdit($id=null, $filter=""){
        $data = db("Invoices::Invoices")->find($id);
    	return views("invoices-invoices-edit",["data" => $data]);
    }

    function postEdit($id=null,$filter=""){
    	$data = db("Invoices::Invoices")->find($id);
        if(!$data){
            return redirect(admin_url(strtolower("Invoices/Invoices"),false))->with("error", lang("invoices.invoices.error_update"));
        }
        $input = [
            //'title' => input("title"),
        ];
        $rules = [
            //'title' => 'required|unique:posts|max:255',
        ];
        $validator = app("validator")->make($input, $rules);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data->session_id     =   input("session_id");

			$data->language     =   input("language");

			$data->users_id     =   input("users_id");

			$data->stores_id     =   input("stores_id");

			$data->created_at     =   input("created_at");

			$data->updated_at     =   input("updated_at");

			$data->created_by     =   input("created_by");

			$data->name     =   input("name");

			$data->totals     =   input("totals");

			$data->curentcy     =   input("curentcy");

			$data->payment_id     =   input("payment_id");

			$data->ships_id     =   input("ships_id");

			$data->tax_rate_total     =   input("tax_rate_total");

			$data->payment_rate_total     =   input("payment_rate_total");

			$data->ships_rate_total     =   input("ships_rate_total");

			$data->proess_by     =   input("proess_by");

			$data->process_date     =   input("process_date");

			$data->status     =   input("status");
            $data->save();
            return redirect(admin_url(strtolower("Invoices/Invoices"),false))->with("success", lang("invoices.invoices.success_update"));
        }
    }


    function getCreate(){
        $id = db("Invoices::Invoices")->insertGetId(
            array('created_at' => date("Y-m-d h:i:s"))
        );
        return redirect(admin_url(strtolower("Invoices/Invoices/edit/".$id),false))->with("success", lang("invoices.invoices.success_create"));
    }

    function getDelete($id=null){
        $data = db("Invoices::Invoices")->find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with("success", lang("invoices.invoices.success_delete"));
        }else{
            return redirect()->back()->with("error", lang("invoices.invoices.error_delete"));
        }
        
    }

    /*
	Show Function API
    */
    function putIndex(){

    }

    function patchIndex(){

    }

    function deleteIndex(){

    }

    function optionsIndex(){

    }
}
?>