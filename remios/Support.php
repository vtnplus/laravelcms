<?php
namespace Remios;
class Support{
	private $solutions = [];
	public function __construct()
    {
    	$this->solutions = $this->solutions();
    }
	public function solutions(){
		$arv = [];
		$arv["travel"] = [
							"leftmenu" => [
		                    
			                    "name" => "Travel Programs",
			                    "icons" =>  "glyphicon glyphicon-globe",
			                    "contents" => [
			                            "posts/content/manager/travel" => "Chương trình tour",
			                            "catalog/content/manager/travel" => "Loại hình tour",
			                            "posts/content/manager/destination" => "Điểm đến",
			                            "posts/content/manager/guied" => "Guied",
			                            "posts/content/manager/car" => "Dịch vụ xe",
			                            "posts/content/manager/hotel" => "Dịch vụ khách sạn",
			                                
			                        ],

			                    "sort"  => "p",
			                    "relaytion" => ["tour"]
		                		]
		                	
                		];

		$arv["hotel"] = [
							"leftmenu" => [
		                    
			                    "name" => "Khách sạn",
			                    "icons" =>  "glyphicon glyphicon-globe",
			                    "contents" => [
			                            "posts/content/manager/hotel" => "Quản lý phòng",
			                            "catalog/content/manager/hotel" => "Phân loại phòng",
			                            
			                                
			                        ],
			                    "sort"  => "p"
		                		]
                		];
		$arv["reast"] = [];

		$arv["products"] = [
							"leftmenu" => [
		                    
			                    "name" => "Bán hàng",
			                    "icons" =>  "glyphicon glyphicon-globe",
			                    "contents" => [
			                            "posts/content/manager/products" => "Danh sách mặt hàng",
			                            "catalog/content/manager/products" => "Phân chuyên mục",
			                            "catalog/brands/manager/products" => "Nhà sản xuất",
			                            "invoices/order/manager/products" => "Đơn hàng",
			                            
			                                
			                        ],
			                    "sort"  => "p",
			                    "relaytion" => ["products"]
		                		]
                		];


		$arv["product"] = [
							"leftmenu" => [
		                    
			                    "name" => "Giới thiệu sản phẩm",
			                    "icons" =>  "glyphicon glyphicon-globe",
			                    "contents" => [
			                            "posts/content/manager/products" => "Danh sách mặt hàng",
			                            "catalog/content/manager/products" => "Phân chuyên mục",
			                            
			                                
			                        ],
			                    "sort"  => "p"
		                		]
                		];


		$arv["company"] = [];
		return $arv;
	}

	public function register($key=""){

		if(!isset($this->solutions[$key]) || !$key) return false;

		$this->valiedate = $key;
		
		return $this->solutions[$key];
	}


	public function field($key=""){
		$arv = [];
		$arv["products"] = [
			"prices" => "prices",
			"keyword" => "keyword",
			
		];
		if(isset($arv[$key])) return $arv[$key];
		return [];
	}


	public function beforeCopy($obj, $type){
		return $obj;
	}

	public function beforeEdit($obj, $type){
		if(function_exists("beforeEdit_".$type)){
			$obj = call_user_func_array("beforeEdit_".$type, ["data" => $obj]);
		}
		return $obj;
	}


	public function beforeCreate($arv){
		
		return $arv;
	}

	public function beforeSave($obj){
		$type = $obj->type;
		if(function_exists("beforeSave_".$type)){
			$obj = call_user_func_array("beforeSave_".$type, ["data" => $obj]);
		}
		return $obj;
	}

	public function beforeList($obj){
		
		return $obj;
	}


	public function beforeDelete($obj){
		
		return $obj;
	}

	public function valiedate(){
		return true;
	}
}