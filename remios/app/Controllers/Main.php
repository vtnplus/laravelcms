<?php
namespace Remios\Apps;
class Main extends \Remios\Apps\Controller
{
	public function __construct()
    {
    	//register("style",[resources_url("css/animate.css")]);
    	if(input("setView")){
    		session()->set("content.view_type",input("setView"));
    		return redirect()->back()->send();
    	}

    	if(input("setLanguage")){
    		session()->set("content.language",input("setLanguage"));
    		return redirect()->back()->send();
    	}

    	if(input("setTemplate")){
    		session()->set("content.template",input("setTemplate"));
    		return redirect()->back()->send();
    	}

        if(session()->get("content.language")){
          config()->set("site.language",session()->get("content.language"));
        }

        register("javascript",[
                                    resources_url("globals/jquery.blazy.min.js")
                                   
                            ]);

    }

	function getIndex(){
		if(config("site.page_default")){
			return with(new \Modules\Pages\Frontend\Home)->getIndex(config("site.page_default"));
		}
        if(!view()->exists("home")){
            dd("Welcome LARAVELCMS.NET HOME PAGES");
        }
    	return views("home");
    }


    function getSitemap(){
        $sm_file = base_path('/sitemap.xml');

        $skip = false;
        if (is_file($sm_file)) {
            $filelastmodified = filemtime($sm_file);

            if (($filelastmodified - time()) > 3 * 3600) {
                $skip = 1;
            }
        }

        if ($skip == false) {
        $str = [];
        $str[] = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
       

        $pages = db("Pages::Pages")->language()->stores()->rows(20);
        foreach ($pages as $key => $value) {
           
            $lmod = date('Y-m-d').'T'.date('H:i:s');
            /*
            if (isset($this->pages['lastmod'][$i]) and $this->pages['lastmod'][$i] != false) {
                $lmod = date('Y-m-d', strtotime($this->pages['lastmod'][$i])).'T'.date('H:i:s', strtotime($this->pages['lastmod'][$i]));
            }
            */

            $str[] = '
            <url>
                <loc>'.$value->links().'</loc>
                <lastmod>'.$lmod.'+00:00</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
            ';
        }

        $pages = db("Catalog::Categories")->language()->stores()->rows(20);
        foreach ($pages as $key => $value) {
           
            $lmod = date('Y-m-d').'T'.date('H:i:s');
            /*
            if (isset($this->pages['lastmod'][$i]) and $this->pages['lastmod'][$i] != false) {
                $lmod = date('Y-m-d', strtotime($this->pages['lastmod'][$i])).'T'.date('H:i:s', strtotime($this->pages['lastmod'][$i]));
            }
            */

            $str[] = '
            <url>
                <loc>'.base_url(str_replace(base_url()."/","",$value->links())).'</loc>
                <lastmod>'.$lmod.'+00:00</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
            ';
        }


        $pages = db("Posts::Posts")->language()->stores()->rows(20);
        foreach ($pages as $key => $value) {
           
            $lmod = date('Y-m-d').'T'.date('H:i:s');
            /*
            if (isset($this->pages['lastmod'][$i]) and $this->pages['lastmod'][$i] != false) {
                $lmod = date('Y-m-d', strtotime($this->pages['lastmod'][$i])).'T'.date('H:i:s', strtotime($this->pages['lastmod'][$i]));
            }
            */

            $str[] = '
            <url>
                <loc>'.base_url(str_replace(base_url()."/","",$value->links())).'</loc>
                <lastmod>'.$lmod.'+00:00</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
            ';
        }


        $str[] = '</urlset>';
           

           files()->put($sm_file,implode($str, "\n"));
        }
        $map = $sm_file;
        $fp = fopen($map, 'r');

        // send the right headers
        header('Content-Type: text/xml');
        header('Content-Length: ' . filesize($map));

        // dump the file and stop the script
        fpassthru($fp);

        exit;
    }


    function getFeeds(){
        header('Content-Type: application/rss+xml; charset=UTF-8');

       

        $site_title = config('site.sitename');
        $site_desc = config('site.description');
        $rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
        $rssfeed .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">' . "\n";
        $rssfeed .= '<channel>' . "\n";
        $rssfeed .= '<atom:link href="' . base_url('/feeds') . '" rel="self" type="application/rss+xml" />' . "\n";
        $rssfeed .= '<title>' . $site_title . '</title>' . "\n";
        $rssfeed .= '<link>' . base_url() . '</link>' . "\n";
        $rssfeed .= '<description>' . $site_desc . '</description>' . "\n";
        
        $pages = db("Pages::Pages")->language()->stores()->rows(20);
        foreach ($pages as $key => $value) {
            
            $description = character_limiter(strip_tags(($value->description ? $value->description : $value->content)), 500);
            $rssfeed .= '<item>' . "\n";
            $rssfeed .= '<title>' . $value->title . '</title>' . "\n";
            $rssfeed .= '<description><![CDATA[' . $description . '  ]]></description>' . "\n";
            $rssfeed .= '<link>'.$value->links().'</link>' . "\n";
            $rssfeed .= '<pubDate>' . date('D, d M Y H:i:s O', strtotime($value->created_at)) . '</pubDate>' . "\n";
            $rssfeed .= '<guid>'.$value->links(true,false).'</guid>' . "\n";
            $rssfeed .= '</item>' . "\n";
        }


        $rssfeed .= '</channel>' . "\n";
        $rssfeed .= '</rss>';

       

        echo $rssfeed;
        $this->ping();
    }


    function getRobots(){
        header('Content-Type: text/plain');
        $robots = config('site.robots');

        if ($robots == false) {
            $robots = "User-agent: *\nAllow: /" . "\n";
            $path = files()->glob(base_path("/*"));
            foreach ($path as $key => $value) {
                if(is_dir($value)){
                    $robots .= 'Disallow: /'.basename($value).'/' . "\n";
                }else{
                    if(basename($value) != 'sitemap.xml'){
                    $robots .= 'Disallow: /'.basename($value) . "\n";
                    }
                }
            }
            
            
        }
       
        echo $robots;
        exit;
    }


    function ping(){

    }
}
?>