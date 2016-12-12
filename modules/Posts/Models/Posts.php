<?php
namespace Modules\Posts\Models;
use Remios\Utils\Database\DBQuery;
class Posts extends DBQuery{
	//protected $table = 'posts';
    protected static $_table;
	public $timestamps = false;
	
    public $post_maps_id = [];
    public $post_maps_url = [];

    function __construct()
    {
        parent::__construct();
       
    }
    public static function boot()
    {
        parent::boot();
    }

    
    public function setTable($table)
    {
        if($table && \Schema::hasTable($table)){
           static::$_table = strtolower($table);
        }else{
            static::$_table = "posts";
        }
        
    }

    public function getTable()
    {
        return static::$_table;
    }

    


    public function links(){
        if(config("register.router.".$this->type)){
            return base_url(config("register.router.".$this->type)).($this->seo_urls ? "/".$this->seo_urls : '?pid='.$this->id);
        }else if(config("register.pages.urls") == $this->type){
            return base_url("pages/".config("register.pages.urls")).($this->seo_urls ? "/".$this->seo_urls : '?pid='.$this->id);
        }else{
            return base_url("posts").($this->seo_urls ? "/".$this->seo_urls : '?pid='.$this->id);
        }
        
    }


    public function prices($text="Liên hệ"){
        if($this->prices == 0) return $text;
        if($this->prices > $this->prices_off && $this->prices_off > 0){
            return number_format($this->prices_off)."<i>".number_format($this->prices)."</i> đ";
        }else{
            return number_format($this->prices)." đ";
        }
    }

    public function pricesCall($text="Liên hệ"){
        
        if($this->prices > $this->prices_off){
            return $this->prices_off;
        }else{
            return $this->prices;
        }
    }



    public function SwitchStatus(){
        return '<label class="checkbox-inline"><input type="checkbox" value=""></label>';
    }



    public function getPagesMaps(){
    

        $pageid = explode('|',$this->pages_maps);

        $data = db("Catalog::Categories")->whereIn("id",$pageid)->rows();
        $html = [];
        $html[] = '<ul class="maps-pages">';
        foreach ($data as $key => $value) {
            $html[] = '<li><a href="'.$value->links().'" title="'.$value->title.'">'.$value->title.'</a></li>'.((count($pageid) - 1) > $key ? "<li style='font-size:12px;padding-right:15px;padding-left:15px;'> &rang; </li>" : "");
            
        }
        $html[] = '</ul>';

        
        /*
        $htmlPages = '';
        if($type){
            $data = db("Pages")->where("allow_post_type",$type)->first();
            if($data){  
                $htmlPages = '<li><a href="'.base_url($data->seo_urls).'" title="'.$data->title.'">'.$data->title.'</a></li>';
            }
        }
        $html = array_merge([$htmlPages],$html);
        */
        return implode($html, "\n");
    }

    public function pages_maps($parent=""){
        $this->make_maps($parent);
        return implode($this->post_maps_id, "|");
    }

    public function make_maps($parent=0){
       $parent = ($parent  ? $parent : $this->categories_id);
        if(intval($parent) == 0) return false;
        $opt = [];
        if(intval($parent) > 0){
            //===== Error data 

            $data = db("Catalog::Categories")->find($parent);
           
            if(isset($data->id)){
                if($data->parent_id > 0){
                    $this->make_maps($data->parent_id);
                }

                $this->post_maps_url[] = str_slug($data->title);
                $this->post_maps_id[] = $data->id;
            }
        }
    }
    /*
    public function scopeSupport($query, $type){
        
        $query->leftJoin($type, function($join) use ($type) {
          $join->on('id', '=', $type.'_id');
        });
        
        return $query;
    }
    */


    public function thumbs($target="medium",$singer=true,$append=[], $return=false){
        $arv = [];
        if($this->thumbs){
            $arv[] = ["title" => $this->title, "src" => $this->thumbs];
        }
        $gallery = @unserialize($this->gallery);
        
        if(!isset($gallery["url"])) $gallery["url"] = [];

        if(is_array($gallery)){
            foreach ($gallery["url"] as $key => $value) {
                $arv[] = ["title" => @$gallery["title"][$key], "src" => @$value];
            }
        }
        $append = (!is_array($append) ? [] : $append);
        $arv = array_merge($arv, $append);

        if(!$arv) return false;
        
        $files = files();
        
        if($singer){
            $value = $arv[0];

            $value["src"] = str_replace(basename($value["src"]),"resize/".basename($value["src"]), $value["src"]);

                $ex = ".".files()->extension(basename($value["src"]));
                $src = str_replace($ex,"-".$target.$ex,$value["src"]);

                if(!$files->exists(base_path($src))){
                    $src = str_replace('resize/','',$value["src"]);
                }

                $small = str_replace($ex,"-small".$ex,$value["src"]);
                 if(!$files->exists(base_path($small))){
                    $small = str_replace('resize/','',$value["src"]);
                }

                $medium = str_replace($ex,"-medium".$ex,$value["src"]);
                
                if(!$files->exists(base_path($medium))){
                    $medium = str_replace('resize/','',$value["src"]);
                }
                return '<img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="'.base_url($src).'" data-src-small="'.base_url($small).'" data-src-medium="'.base_url($medium).'" alt="'.$value["title"].'" style="max-width:100%;">';
        }
        if($return){
            return $arv;
        }else{
            $html = [];
            
            $html[] = '<ul class="row-gallery owl-carousel owl-theme">';
            foreach ($arv as $key => $value) {
                
                $value["src"] = str_replace(basename($value["src"]),"resize/".basename($value["src"]), $value["src"]);

                $ex = ".".files()->extension(basename($value["src"]));
                $src = str_replace($ex,"-".$target.$ex,$value["src"]);
                if(!$files->exists(base_path($src))){
                    $src = str_replace('resize/','',$value["src"]);
                }

                $small = str_replace($ex,"-small".$ex,$value["src"]);
                 if(!$files->exists(base_path($small))){
                    $small = str_replace('resize/','',$value["src"]);
                }

                $medium = str_replace($ex,"-medium".$ex,$value["src"]);
                
                if(!$files->exists(base_path($medium))){
                    $medium = str_replace('resize/','',$value["src"]);
                }

               $html[] = '<li><img class="'.($key == 0 ? "b-lazy" : "owl-lazy").'" src="'.($key == 0 ? "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" : base_url($src)).'" data-src="'.base_url($src).'" data-src-small="'.base_url($small).'" data-src-medium="'.base_url($medium).'" alt="'.$value["title"].'"></li>';

            }

            $html[] = '</ul>';
            return implode($html,"\n");
        }
    }



    public function makeThumnail($input="", $first=false){
        $inputs = $input;
        if($first){
            $gallery = @unserialize($this->gallery);
        
            if(!isset($gallery["url"])) $gallery["url"] = [];
            if(isset($gallery["url"][0])) return $gallery["url"][0];
        }
        
        if(!$input) return false;
        $type = $this->type;
        
        $size = config("site.thumbs.".$type,"100x80");
        
        if(is_array($size)){
            if(isset($size["medium"])){
                @list($wi,$hi) = explode("x",$size["medium"]);
                $size = ceil($wi/2)."x".ceil($hi/2);
            }

            if(isset($size["large"])){
                @list($wi,$hi) = explode("x",$size["large"]);
                $size = ceil($wi/3)."x".ceil($hi/3);
            }

            if(isset($size["small"])){
               
                $size = $size["small"];
            }

        }

       
        if(is_serialized($input))
        {
            $input = @unserialize($input);
            $input = $input["url"];
        }
        if(!is_array($input)){

            $this->createThumnails($input, $size);
        }else{
            

            foreach ($input as $key => $value) {
                
                $this->createThumnails($value, $size);
            }
        }

        return $inputs;

    }


    public function createThumnails($files="", $size=""){
        $file_source = realpath(base_path($files));
        $path_folder = str_replace(basename($file_source), "resize", $file_source);
        if(!$file_source) return false;
        if(!files()->isDirectory($path_folder)){
            files()->makeDirectory($path_folder, 0777, true, true);
        }
        @list($wi,$hi) = explode("x",$size);
        if(is_string($size)){
            $size = [
                    "small" => $wi."x".$hi,
                    "medium" => ($wi*2)."x".($hi*2),
                    "large" => ($wi*3)."x".($hi*3),
                ];
        

            foreach ($size as $key => $value) {
                $path_cache = str_replace(".".files()->extension($file_source),"-".$key.".".files()->extension($file_source),$file_source);
                $path_cache = str_replace(basename($path_cache), "resize/".basename($path_cache), $path_cache);
                @list($w,$h) = explode("x",$value);
               
                image($file_source)->resize($w, $h,function ($constraint) {
                                                                  $constraint->aspectRatio();
                                                                  $constraint->upsize();
                                                              })->resizeCanvas($w, $h)->save($path_cache);
                
            }
        }
        //dd($path_folder);
    }


    public function ratings($class="glyphicon glyphicon-star"){
        if(!isset($this->ratings)) return;

        $this->ratings = (@$this->ratings ? $this->ratings : 5);
        $rate = ceil($this->ratings);
        $html = [];
        for ($i=1; $i <= $rate ; $i++) { 
            $html[] = '<i class="'.$class.'"></i>';
        }
        return implode($html, "\n");
    }

    /*
    Render Robins Events
    */

    public function robins(){
        if(!isset($this->robins)) return;
        $robins = explode(';',$this->robins);
        $html = [];
        
        foreach ($robins as $key => $value) {
            $html[] = '<div class="robins robins-'.$key.'"></div>';
        }
        return implode($html, "\n");
    }
    /*
    Subtitle Text Title
    */

    public function title($limit=""){
        if(!$limit){
            return $this->title;
        }else{
            $arv = explode(" ", $this->title, $limit);
            return implode($arv, " ");
        }
    }

    /*
    Render Keyword
    */

    public function keyword(){
        if(strlen($this->keyword) != 32){
            return $this->keyword;
        }else{
            return 'N/A';
        }
    }

    /*
    Set Up SEO
    */

    public function meta_keyword($render=false){
        if(!isset($this->meta_keyword)) return;
        $meta_keyword = (!$this->meta_keyword ? strip_tags(($this->description ? $this->description : $this->content)) : $this->meta_keyword);
        $keyword = (input("meta_keyword") && input("meta_keyword") != "auto" && !$render ? input("meta_keyword") : $meta_keyword);
        return str_slug(character_limiter($keyword, 200),' ');
    }


     public function meta_description($render=false){
        if(!isset($this->meta_description)) return;
        $meta_keyword = (!$this->meta_description ? strip_tags(($this->description ? $this->description : $this->content)) : $this->meta_description);
        $keyword = (input("meta_description") && input("meta_description") != "auto"  && !$render ? input("meta_description") : $meta_keyword);
        return character_limiter($keyword, 200);
    }

    /*
    Auth Info
    Post contents
    */
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


    public function comments(){
        return views("comments",["url" => $this->links()]);
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