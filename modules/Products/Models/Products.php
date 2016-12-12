<?php
namespace Modules\Products\Models;
use Remios\Utils\Database\DBQuery;
class Products extends DBQuery{
	protected $table = 'products';
	public $timestamps = false;
	
	public function users()
    {
        //return $this->hasOne('Modules\Account\Models\Users','id','users_id');
        return \Modules\Account\Models\Users::find($this->users_id);
    }

    public function parent()
    {
        //return $this->hasOne('Modules\Account\Models\Users','id','users_id');
        return Posts::find($this->parent_id);
    }

    public function created_at($format=null){
        
        if(!$format) $format = config("site.time_short_format","d-m-Y");
        $mytime =  \Carbon\Carbon::parse($this->created_at);
        $mytime->setTimezone(config("site.timezone"));
        return $mytime->format($format);
    }

    public function updated_at($format=null){
        
        if(!$format) $format = config("site.time_short_format","d-m-Y");
        $mytime =  \Carbon\Carbon::parse($this->created_at);
        $mytime->setTimezone(config("site.timezone"));
        return $mytime->format($format);
    }

    public function display_at($format=null){
        
        if(!$format) $format = config("site.time_short_format","d-m-Y");
        $mytime =  \Carbon\Carbon::parse($this->created_at);
        $mytime->setTimezone(config("site.timezone"));
        return $mytime->format($format);
    }

    public function expires_at($format=null){
        
        if(!$format) $format = config("site.time_short_format","d-m-Y");
        $mytime =  \Carbon\Carbon::parse($this->created_at);
        $mytime->setTimezone(config("site.timezone"));
        return $mytime->format($format);
    }

    /*
    Scope Keyword
    */
    public function scopeKeyword($query, $type)
        {
            return $query->where("keyword", $type);
        }

    /*
    Scope Type
    */
    public function scopeType($query, $type)
        {
            return $query->where("type", $type);
        }

    
}