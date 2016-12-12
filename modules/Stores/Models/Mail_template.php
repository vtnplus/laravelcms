<?php
namespace Modules\Stores\Models;
use Remios\Utils\Database\DBQuery;
class Mail_template extends DBQuery{
	protected $table = 'mail_template';
	public $timestamps = false;
	
	
    /*
    Scope Type
    */
    public function scopeType($query, $type)
        {
            return $query->where("type", $type);
        }

    
    
}