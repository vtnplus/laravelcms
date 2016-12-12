<?php
namespace Modules\Invoices\Frontend;
use Remios\Apps\Main;
class Order extends Main
{
	
	public function __construct()
    {
        parent::__construct();
    }
	function getIndex($a=""){
        $items = [];

		$data = db("Invoices::Invoices")->language()->stores()->where("session_id",session()->getId())->first();
        
        $error = 'Chưa có mặt hàng được chọn';
        if(isset($data->id)){

		  $items = db("Invoices::Invoices_items")->where("invoices_id", $data->id)->get();
          $error = false;
        }else{
            $this->getCreate("");
        }
		
        return views("invoices",["data" => $data,"items" => $items, "error" => $error]);
    }



    function getRemove($id="",$a=""){
    	db("Invoices::Invoices_items")->where("invoices_id", session("register.invoice_id"))->where("id",$id)->delete();
    	$this->SumInvoice();
    	return redirect()->back()->with("success", lang("invoices.invoices.success_delete"));
    }

    function getUpitems($modules="products", $type = "last", $id=0, $filter=""){
    	$invoice_id = session("register.invoice_id");
		$this->createItems($modules, $id, $invoice_id, ($type == "last" ? 1 : -1));
		$this->SumInvoice();
    	return redirect()->back()->with("success", lang("invoices.invoices.success_delete"));
    }
    function getCreate($modules="products",$id="",$a=""){

    	/*
		Check Invoice In database
    	*/
    	$data = db("Invoices::Invoices")->stores()->where("session_id",session()->getId())->first();
    	$invoice_id = @$data->id;
		if(!$data){
			$invoice_id = db("Invoices::Invoices")->insertGetId(
	            	array('created_at' => date("Y-m-d h:i:s"),
	            	"modules" => $modules,
	            	"language" => getLanguage(),
	            	"users_id"	=> getAuth(),
	            	"created_by"	=> getAuth(),
	            	"stores_id"	=> getStores(),
	            	"name"	=>	date("D m Y h:i"),
	            	"user_ip"	=>	getUserIP(),
	            	"session_id"	=> session()->getId(),
	            )
	        );
	        session(["register.invoice_id" => $id,"register.invoice_session" => session()->getId()]);
		}else{
			session(["register.invoice_id" => $data->id,"register.invoice_session" => session()->getId()]);
		}

		if($modules){
    		$this->createItems($modules, $id, $invoice_id);

    		$this->SumInvoice();
        }
    }


    function createItems($type, $id, $invoice_id, $number=1){
    	$info = db("Posts::Posts", $type)->find($id);

    	if(!$info) return false;
    	/*
		Validate Item In Invoices
    	*/

    	$data = db("Invoices::Invoices_items")->where("modules", $type)->where("invoices_id", $invoice_id)->where("items_id",$info->id)->first();
    	if($data){
    		$data->items_number = $data->items_number + $number;
    		$data->totals = $data->items_number * $info->prices;
    		if($data->items_number == 0 || $data->items_number < 0){
    			$data->delete();
    		}else{
    			$data->save();
    		}
    	}else{
    		db("Invoices::Invoices_items")->insert([
    			"invoices_id"	=> $invoice_id,
    			"modules"	=> $type,
    			"items_id"	=> $info->id,
    			"items_prices"	=> $info->prices,
    			"items_number"	=> (@$number ? $number : 1),
    			"items_name"	=> $info->title,
    			"items_info"	=> $info->links(),
    			"totals"	=> (@$number ? $number : 1) * $info->prices,
    		]);
    	}

    }


    function SumInvoice(){
    	$data = db("Invoices::Invoices")->language()->stores()->where("session_id",session()->getId())->find(session("register.invoice_id"));
        $firstName = db("Invoices::Invoices_items")->where("invoices_id", $data->id)->first();
    	$data->totals = db("Invoices::Invoices_items")->where("invoices_id", $data->id)->sum("totals");
        $data->name = (@$firstName->items_name ? $firstName->items_name : date("d - m - Y h:i:s"));
    	$data->save();
    }
    
}
?>