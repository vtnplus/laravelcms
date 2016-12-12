<?php
namespace Remios\Utils\Database;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model as Eloquent;
class DBQuery extends Eloquent{

    /*
    Scope Language
    */
    //public $connection = "mysql"; // Set Muti Server Database

    
    public function getContent($content=""){
        if(is_string($content)){
           
           $search = array(
                '/spellcheck=\"(.*?)\"/is',
                '/id=\"mce_(.*?)\"/is',
                '/<p class="nonecontent">(.*?)<\/p>\"/is',
                
                );

           

            $content = preg_replace ($search, "", $content); 
        }
        return $content;
    }


    public function scopeLanguage($query, $type=null, $prefix='=')
    {
        if(!$type){

            return $query->where("language", $prefix, config("site.language"));

        }else if($type == "null"){
            
            $query = $query->where(function($query) use($type){
                 $query->where('language', '=', config("site.language"));
                 $query->orWhere("language","=","");
                
            });
            return $query;

        }else if(is_array($type)){

            $query = $query->where(function($query) use($type){
                 $query->where('language', '=', $type[0]);
                 if($type && is_array($type) && count($type) > 1){

                    foreach ($type as $key => $value) {

                        if($key > 0){
                            $query->orWhere("language","=",$value);
                        }

                    }
                }
            });
            return $query;
        }else{
            return $query->where("language", $prefix, $type);
        }
        
    }

    public function scopeStores($query, $type=null)
    {
        return $query->where("stores_id", (!$type ? 0 : intval($type)));
    }


    /*
    Scope Status
    */
    public function scopeStatus($query, $type=null,$prefix='=')
    {
        
         if(!$type){

            return $query->where("status", $prefix, 1);

        }else if(is_array($type)){

            $query = $query->where(function($query) use($type){
                 $query->where('status', '=', $type[0]);
                 if($type && is_array($type) && count($type) > 1){

                    foreach ($type as $key => $value) {

                        if($key > 0){
                            $query->orWhere("status","=",$value);
                        }

                    }
                }
            });
            return $query;

        }else{

            return $query->where("status", $prefix, $type);

        }

    }


    /*
    Scope Status
    */
    public function scopeAuth($query, $type=null, $prefix='=')
    {
        if(user()->is_admin == 1) return $query;
         if(!$type){

            return $query->where("users_id", $prefix, getAuth());

        }else if($type == "null"){
            
            $query = $query->where(function($query) use($type){
                 $query->where('users_id', '=', user()->id);
                 $query->orWhere("users_id","=","");
                
            });
            return $query;

        }else if(is_array($type)){

            $query = $query->where(function($query) use($type){
                 $query->where('users_id', '=', $type[0]);
                 if($type && is_array($type) && count($type) > 1){

                    foreach ($type as $key => $value) {

                        if($key > 0){
                            $query->orWhere("users_id","=",$value);
                        }

                    }
                }
            });
            return $query;

        }else{

            return $query->where("users_id", $prefix, $type);
            
        }

    }


	public function scopeRows($query,$limit=false,$setPages=false){
        if($limit){
            return $this->scopePages($query, $limit, $setPages);
        }else{
            return $query->get();
        }

        
    }


    public function scopePages($query, $limit=20,$pagename = false){
        if(!$pagename){
            $pagename = "Pages".ucfirst($this->getTable());
        }
        \Illuminate\Pagination\Paginator::currentPageResolver(function() use ($pagename){
        
                    return input($pagename);
        });
    
        $data = $query->paginate($limit)->setPageName($pagename);
        \Illuminate\Pagination\Paginator::currentPageResolver(function(){
                        return 1;
                    });

        return $data;
    }
}
