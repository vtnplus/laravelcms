<?php
namespace Modules\Pages\Models;
use Remios\Utils\Database\DBQuery;
class Pages extends DBQuery{
	protected $table = 'pages';
	public $timestamps = false;
	public $post_maps_id = [];
    public $post_maps_url = [];

    public function links($full=true,$guiid=true){
        if(!$guiid) return base_url("?pages=".$this->id);
        $type = str_replace([".php",".html"],'', $this->seo_urls);
        if($this->parent_id > 0){
            $data = $this->language()->stores()->find($this->parent_id);
            $type = str_replace([".php",".html"],'', $data->seo_urls);

            if(config("register.router.".$type)){
                $url = $type."/".$this->seo_urls;
            }else{
                $url = "pages/".$this->seo_urls;
            }

        }else{
            if(config("register.router.".$type)){
                $url = $type;
            }else{
                $url = "pages/".$this->seo_urls;
            }
        }
        if($full){
            return base_url($url);
        }else{
            return $url;
        }
        
    }

	public function pages_maps($parent=""){
        $this->mapsPages($parent);
        return implode($this->post_maps_id, "|");
    }


    function mapsPages($parent=false){
        
        $parent = ($parent ? $parent : $this->parent_id);
        if(intval($parent) == 0) return false;
        $opt = [];
        if(intval($parent) > 0){
            $data = $this->find($parent);
            if(isset($data->id)){
                if($data->parent_id > 0){
                    $this->mapsPages($data->parent_id);
                }
                $this->post_maps_url[] = str_slug($data->title);
                $this->post_maps_id[] = $data->id;
            }
        }
        
    }


    public function updated_at($format=null){
        
        if(!$format) $format = config("site.time_short_format","d-m-Y");
        $mytime =  \Carbon\Carbon::parse((intval($this->updated_at) > 0 ? $this->updated_at : $this->created_at));
        $mytime->setTimezone(config("site.timezone"));
        return $mytime->format($format);
    }

    public function scopeParent($query, $type)
        {
            return $query->where("parent_id", $type);
        }

    /*
    Scope Type
    */
    public function scopeType($query, $type)
        {
            return $query->where("type", $type);
        }

    
    
}