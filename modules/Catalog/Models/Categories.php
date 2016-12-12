<?php
namespace Modules\Catalog\Models;
use Remios\Utils\Database\DBQuery;
class Categories extends DBQuery{
	protected $table = 'categories';
	public $timestamps = false;
	
	public function links(){
        if(config("register.router.".$this->type)){
            return base_url(config("register.router.".$this->type)."/catalog").($this->seo_urls ? "/".$this->seo_urls : '?pid='.$this->id);
        }else if(config("register.pages.urls") == $this->type){
            return base_url("pages/".config("register.pages.urls")."/catalog").($this->seo_urls ? "/".$this->seo_urls : '?pid='.$this->id);
        }else{
            return base_url("catalog").($this->seo_urls ? "/".$this->seo_urls : '?pid='.$this->id);
        }
        
    }

    
	public function users()
    {
        //return $this->hasOne('Modules\Account\Models\Users','id','users_id');
        return \Modules\Account\Models\Users::find($this->users_id);
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
}