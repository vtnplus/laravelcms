<?php
namespace Modules\Settings\Models;
use Remios\Utils\Database\DBQuery;
class Settings extends DBQuery{
	protected $table = 'settings';
	public $timestamps = false;
	

    
	
    /*
    Scope Stores_id
    */
    public function scopeStores_id($query, $type)
        {
            return $query->where("stores_id", $type);
        }

    
    /*
    Scope Name
    */
    public function scopeName($query, $type)
        {
            return $query->where("name", $type);
        }

    /*
    Scope Data
    */
    public function scopeData($query, $type)
        {
            return $query->where("data", $type);
        }

    /*
    Set Stores_id
    */
    public function setStores_id($query, $type)
        {
            $query->stores_id = $type;
            return $query;
        }

    /*
    Set Language
    */
    public function setLanguage($query, $type)
        {
            $query->language = $type;
            return $query;
        }

    /*
    Set Name
    */
    public function setName($query, $type)
        {
            $query->name = $type;
            return $query;
        }

    /*
    Set Data
    */
    public function setData($query, $type)
        {
            $query->data = $type;
            return $query;
        }
}