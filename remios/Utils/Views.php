<?php
namespace Remios\Utils;

class Views{
	protected $viewDir = [];
	protected $viewHtml = [];
    protected $meta_header = [];
    protected $meta_footer = [];
    protected $meta_stylesheet = [];
	protected $view = null;

	public function __construct($app = null)
    {
    	$this->view = view();

    }

    
    public function render($file, $data=[], $params=[]){

    	$this->viewHtml = $this->view->make($file, $data, $params)->render();
        if(is_frontend()){
            $this->viewHtml = do_shortcode($this->viewHtml);
        }
    	$this->header();
    	$this->footer();

    	return $this->viewHtml;

    }

    /*
    Create Header
    */

    public function header(){
    	$headHtml = "";

    	if($this->view->exists("header_meta")){
    		$headHtml = $this->view->make("header_meta")->render();

            /*
            Loadding Styles Form Themes
            */
            if(theme_path("styles.css")){

                $this->meta_header[] = $this->stylesheet(theme_url("styles.css",false));
            }
            if(theme_path("customs.js")){

                $this->meta_header[] = $this->script(theme_url("customs.js",false));
            }
            /*
            Render Script register
            */
            if(config("register.javascript") && is_array(config("register.javascript"))){
                foreach (config("register.javascript") as $key => $value) {

                    if(!isset($this->meta_header[md5($value)])){

                        $this->meta_header[md5($value)] = $this->script($value);

                    }
                }
            }

            /*
            Render Style register
            */
            if(config("register.style") && is_array(config("register.style"))){
                foreach (config("register.style") as $key => $value) {

                    if(!isset($this->meta_header[md5($value)])){

                        $this->meta_header[md5($value)] = $this->stylesheet($value);
                         $this->meta_stylesheet[md5($value)] = $this->stylesheet($value);
                        

                    }
                }
            }
           
            $headHtml = str_replace('<!--{{meta_header}}-->', implode($this->meta_header, "\n"), $headHtml);
    	}
        
        $headHtmlContent = "";
        if($this->view->exists("header")){

            $headHtmlContent = $this->view->make("header")->render();

        }

        $search = ["{title}","{description}","{keywords}","{author}","{themes}",'<!--{{meta_tags}}-->'];
        $replace = [$this->makeTitle(),$this->makeDescription(),$this->makeKeyword(),"VTN PLUS Co.,Ltd | contact@thietkewebvip.com",theme_url("",false),config("site.header_tags")];

        $headHtml = str_replace($search, $replace, $headHtml);

    	$this->viewHtml = str_replace(['{header}','{header_meta}'], [$headHtml.$headHtmlContent, $headHtml], $this->viewHtml);
    }


    /*
    Make Title
    */

    function makeTitle(){
        $title = config("register.seo.title.0");

        if($title){
            return $title;
        }
        return config("site.sitename");
    }


    function makeDescription(){
        
        $description = (config("register.seo.description") ? config("register.seo.description") : config("site.description"));
        return character_limiter($description,200,'');
    }


    function makeKeyword(){
       
        $keyword = (config("register.seo.keyword") ? config("register.seo.keyword") : config("site.keyword"));
        return character_limiter($keyword,200,'');
    }

    /*
    Create Footer
    */
    public function footer(){
    	$footerHtml = "";
        $footerHtmlContent = "";
        $footerJs = [];
        $footerCss = [];
    	if($this->view->exists("footer")){
    		$footerHtmlContent = $this->view->make("footer");
    	}
        if($this->view->exists("footer_meta")){
            $footerHtml .= $this->view->make("footer_meta");
        }

        /*
        Render Script register
        */
        if(config("register.javascript") && is_array(config("register.javascript"))){
            foreach (config("register.javascript") as $key => $value) {
                if(!isset($this->meta_header[md5($value)])){
                    $footerJs[] = $this->script($value);
                }
            }
        }


        /*
        Render Style register
        */
        if(config("register.style") && is_array(config("register.style"))){
            foreach (config("register.style") as $key => $value) {
                if(!isset($this->meta_stylesheet[md5($value)])){
                    $footerCss[] = $this->stylesheet($value);
                }
            }
        }
        $footerJs = implode($footerJs, "\n");
        $footerCss = implode($footerCss, "\n");
        
    	$this->viewHtml = str_replace(['{footer}','{footer_meta}','<!--{{append_css}}-->','<!--{{append_js}}-->'], [$footerHtmlContent.$footerHtml,$footerHtml,$footerCss,$footerJs], $this->viewHtml);
    }

    /*
    Render Styles URL
    */

    public function stylesheet($url="", $arv=[]){
        $arvs = [];
        foreach ($arv as $key => $value) {
            $arvs[] = $key.'="'.$value.'"';
        }
        return '<link rel="stylesheet" type="text/css" href="'.$url.'" '.implode($arvs," ").'>';
    }

    /*
    Render Script URL
    */
    public function script($url="", $arv=[]){
        $arvs = [];
        foreach ($arv as $key => $value) {
            $arvs[] = $key.'="'.$value.'"';
        }
        return '<script type="text/javascript" src="'.$url.'" '.implode($arvs," ").'></script>';
    }

   
}