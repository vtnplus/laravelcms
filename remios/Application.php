<?php 
namespace Remios;


use Laravel\Lumen\Application as BaseApplication;
use FastRoute\Dispatcher;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ClassLoader;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class Application extends BaseApplication
{
    /**
     * Get the current HTTP path info.
     *
     * @return string
     */
    public $configPath = "";
    public $moduleActive = [];
    public $widgets = [];
    public function __construct($basePath = null)
    {
        //parent::__construct($basePath);
        date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

        $this->basePath = $basePath;
        static::setInstance($this);
        $this->loadConfig();
        

        $this->instance('app', $this);
        $this->instance('path', $this->path());
        $this->loadHelper(__DIR__."/Helpers");
        $this->loadConfigurationProfiles();
        $this->registerContainerAliases();
        $this->registerDatabaseBindingsConfig();
        $this->registerErrorHandling();
    }

    

    protected function registerViewBindings()
    {
        $this->singleton('view', function ($app) {
            return $this->loadComponent('view', 'Remios\Provider\ViewServiceProvider');
        });
    }

    public function getPathInfo()
    {
        $query = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

        return '/'.ltrim(
            str_replace(
                '?'.$query,
                '',
                str_replace(
                    rtrim(
                        str_replace(
                            last(explode('/', $_SERVER['PHP_SELF'])),
                            '',
                            $_SERVER['SCRIPT_NAME']
                        ),
                    '/'),
                    '',
                    $_SERVER['REQUEST_URI']
                )
            ),
        '/');
    }


    protected function getLanguagePath()
    {
        if (is_dir($appPath = $this->basePath('contents/language'))) {
            return $appPath;
        } else {
            return __DIR__.'/../lang';
        }
    }

    /*
    Boot Connect Database
    */
    protected function registerDatabaseBindingsConfig()
    {
        if(file_exists($this->basePath("config.php"))){
            $mysql = require_once $this->basePath("config.php");
           $this->make('config')->set("database.connections.mysql",$mysql);
           
        }
    }


    

    /**
    * Loadding Profiles by domain
    * Support Muti Domain Name
    * @param  \Illuminate\Container\Container $container
    * Return void
    */

    protected function loadConfigurationProfiles(){
        $domain = base_url("",true);
        $config = [];
        /*
        Loadding default config Systems
        */
        $file = $this->basePath('profiles/default.php');

        if(is_file($file) && file_exists($file)){

            $this->make("config")->set("site",array_merge($config,require($file)));
            $config = config("site");
        }

        /*
        Loadding default config Stores edit by root admin
        */
        $file = $this->basePath('profiles/config.php');

        if(is_file($file) && file_exists($file)){

            $this->make("config")->set("site",array_merge($config,require($file)));
            $config = config("site");
        }

        
        /*
        Loadding Profiles Domain Settings
        Defiend MUTI_SITE = true on index.php
        */
        if(defined("MUTI_SITE")){
            $file = $this->basePath('profiles/'.$domain.'/config/system.php');
           
            if(is_file($file)  && file_exists($file)){
               
                $this->make("config")->set("site",array_merge($config,require($file)));
            }

            if($this->make("config")->get("site.templates")){
                $this->make("config")->set("view.paths.0",str_replace('{template_name}',$this->make("config")->get("site.templates"),$this->app["config"]->get("view.paths.0")));
            }else{
                $this->make("config")->set("view.paths.0",str_replace('{template_name}','default',$this->make("config")->get("view.paths.0")));
            }
        }
       
       
       return $this;

    }
    /*
    Load Modules
    */

    public function bootModules($modules_as="frontend", $prefix=null, $loadWidget=false)
    {
       $s = &$_SERVER;

        $uri = $s['REQUEST_URI'];
        
        $segments = explode('?', $uri, 2);

        $url = $segments[0];

        if(substr($url, 0, 1) == '/'){
            $url = substr($url, 1, strlen($url));
        }

        if($modules_as == "" || $modules_as == "frontend"){

            @list($module,$controller,$action) = explode('/', $url);

            $namezone = 'Modules\\%s\\'.ucfirst($modules_as).'\\%s';

        }else{
            @list($prefix,$module,$controller,$action) = explode('/', $url);

             $namezone = 'Modules\\%s\\'.ucfirst($modules_as).'\\%s';

        }
        
        
        $check_active = $this->basePath("modules/".ucfirst($module)."/active.txt");
        $check_systems = $this->basePath("modules/".ucfirst($module)."/system.txt");

        if(file_exists($check_active) || file_exists($check_systems)){
            $namespance = sprintf($namezone,    ucfirst($module),   ucfirst(($controller && !$this->files->extension($controller) ? $controller : "home")));
           
            /*
            Default namespance when namespance exit
            */

            if(!class_exists($namespance)){
                $namespance = sprintf($namezone,    ucfirst($module),   ucfirst("home"));
            }

            if(class_exists($namespance)){

               //$this->group(['prefix' => $prefix], function ($app) use($module, $namespance, $prefix) {
                    $this->routescontroller($module, $namespance, $prefix);
                //});

                
                $this->loadHelper($this->basePath("modules/".ucfirst($module)."/Helpers"));
               
               

                $path = $this->basePath("modules/".ucfirst($module)."/Views".($prefix ? "/".$prefix : ""));
                
                if($path){
                    $this->make('view')->addLocation($path);
                }
               
            }
        }


        /*
        Check Load Helper Themes Active
        */

        if($modules_as != "frontend"){
            $function_themes = config("view.paths.0")."/functions.php";
            if (file_exists($function_themes) && empty($GLOBALS['__composer_autoload_files'][md5($function_themes)])) {
                require $function_themes; 
                $GLOBALS['__composer_autoload_files'][md5($function_themes)] = true;
            }

            $client_func = base_path("contents/templates/".config("site.templates")."/functions.php");
             if (file_exists($client_func) && empty($GLOBALS['__composer_autoload_files'][md5($client_func)])) {
                require $client_func; 
                $GLOBALS['__composer_autoload_files'][md5($client_func)] = true;
            }

        }else{
            $function_themes = VIEW_PATH."/functions.php";

            if (file_exists($function_themes) && empty($GLOBALS['__composer_autoload_files'][md5($function_themes)])) {
                require $function_themes; 
                $GLOBALS['__composer_autoload_files'][md5($function_themes)] = true;
            }
        }
        
        /*
        Check Modules Active
        */
        if($loadWidget){
            $this->loadWidgets(base_path("contents/templates/".config("site.templates")."/Widgets"));
        }
        $allow = dirname(__DIR__)."/modules/*";
        $files = glob($allow);
        foreach ($files as $key => $value) {
            $check_active = $this->basePath("modules/".ucfirst(basename($value))."/active.txt");
            $check_systems = $this->basePath("modules/".ucfirst(basename($value))."/system.txt");
            if(file_exists($check_active) || file_exists($check_systems)){
                $this->moduleActive[] = $this->basePath("modules/".ucfirst(basename($value)));
                
                $this->loadHelper($this->basePath("modules/".ucfirst(basename($value)))."/Helpers");
                if($loadWidget){
                    $this->loadWidgets($this->basePath("modules/".ucfirst(basename($value))."/Widgets"));
                }
            }
        }
        return $this;
        
    }


    

    

    public function routescontroller($router, $controllers, $prefix=null, $only=["GET", "POST"]){
        
        $s = &$_SERVER;
        $uri = $s['REQUEST_URI'];
        if($prefix){
            $uri = str_replace($prefix."/", "", $uri);
        }
        if(substr($uri, 0, 1) == '/'){
            $uri = substr($uri, 1, strlen($uri));
        }

        $uri = explode('/', $uri);
        
        foreach ($only as $key => $value) {

            /*
            Index Router
            */
            if($uri[0] == $router && count($uri) == 1){
                $this->addRoute($value, $router,function() use($controllers, $value){
                  
                    $a = new $controllers;
                    
                    $action = strtolower($value).ucfirst("index");
                    
                    if(method_exists($a, $action)){
                        
                        return call_user_func_array(array($a,$action), []);
                    }
                   
                });
            }else{

                /*
                Where Extract Routes
                */
               $this->addRoute($value, $router.'/{first:.+}',function($first) use($controllers, $value){
                   
                    @list($controller,$action, $params) = explode('/', $first, 3);
                   
                    $a = new $controllers;
                    

                    $actions = strtolower($value).ucfirst(($action && !app("files")->extension($action) && !app("files")->extension($controller) ? $action : "index"));
                    
                    if(app("files")->extension($action) || app("files")->extension($controller)){
                        $params = $first;

                    }
                   
                    /*
                    Default Action when action exit
                    */
                    if(!method_exists($a, $actions)){
                        $actions = "getIndex";
                        
                        $params = str_replace(basename(str_replace('\\','/',strtolower($controllers)))."/",'',$first);
                    }

                    
                    if(!$action && !$params){
                        $params = $controller;
                    }

                    if(method_exists($a, $actions)){
                         
                        $rf = new \ReflectionMethod ( $controllers, $actions );
                        
                        $nums_agrs = $rf->getNumberOfParameters ();
                        
                        return call_user_func_array(array($a,$actions), app()->extractParams($params, $nums_agrs));
                    }
                   
                });
            }
        }
        

       
    }



    public function registerModules(){
        //$allow = dirname(__DIR__)."/modules/*/register.php";
        //$files = glob($allow);
        //dd(config("register.router"));
        foreach ($this->moduleActive as $key => $value) {
            
            if(file_exists($value."/register.php")){
                $require = require($value."/register.php");

                foreach ($require as $keyrequire => $valuerequire) {

                    if(!isset($valuerequire["sort"]) || !$valuerequire["sort"]){
                        $valuerequire["sort"] = substr(str_slug($valuerequire["name"]),0,1);
                    }

                    $get = config("register.menu.".$keyrequire.".".$valuerequire["sort"].".contents");
                    if(!$get){
                        $get = [];
                    }

                    $valuerequire["contents"] = array_merge($valuerequire["contents"], $get);

                    $this->make('config')->set("register.menu.".$keyrequire.".".$valuerequire["sort"], $valuerequire);
                }
            }
        }
        
        /*
        Mose Solutions Register
        */
        $solutions = with(new Support);

        if($solutions->valiedate()){

            $solution = $solutions->register(config("site.solution"));

            if($solution && is_array($solution)){

                foreach ($solution as $keyrequire => $valuerequire) {

                    if(!isset($valuerequire["sort"]) || !$valuerequire["sort"]){
                        $valuerequire["sort"] = substr(str_slug($valuerequire["name"]),0,1);
                    }

                    $get = config("register.menu.".$keyrequire.".".$valuerequire["sort"].".contents");
                    if(!$get){
                        $get = [];
                    }

                    $valuerequire["contents"] = array_merge($valuerequire["contents"], $get);

                    $this->make('config')->set("register.menu.".$keyrequire.".".$valuerequire["sort"], $valuerequire);
                }
            }
        }

        return $this;
    }

    /*
    Load Helper
    */
    public function loadHelper($dir=""){
        if(!$dir) return false;
        if(is_dir($dir)){
            $allow = $dir."/*.php";
            $files = glob($allow);
            foreach ($files as $key => $value) {
                $define = md5($value);
                if (empty($GLOBALS['__composer_autoload_files'][$define])) {
                    require $value; 
                    $GLOBALS['__composer_autoload_files'][$define] = true;
                }

            }
        }
    }

    public function loadWidgets($dir=""){
        if(!$dir) return false;
        if(is_dir($dir)){
            $allow = $dir."/*.php";
            $files = glob($allow);

            foreach ($files as $key => $value) {
                $define = md5($value);
                if (empty($this->widgets[$define])) {
                    $this->widgets[$define] = $value; 
                    
                }

            }
        }
    }

    public function extractParams($uri, $nums_agrs){
        if(!$uri) return [];

        $arvs = []; 
        $ex = [];
         $arvs = explode('/', $uri);
        if($nums_agrs > 1){
           
            for ($i=0; $i < ($nums_agrs - 1); $i++) { 
                $ex[$i] = (isset($arvs[$i]) ? $arvs[$i] : null);
            }
            $ex[($nums_agrs - 1)] = str_replace(implode($ex, "/")."/",'',$uri);
        }else{
            $ex[0] = $uri;
        }

        return $ex;
    }



    /*
    get Widgets All Platform
    */

    public function getWidgets(){
        $return = [];
        foreach ($this->widgets as $key => $value) {
            $namespance = str_replace([base_path("modules"),base_path("contents/templates"),'.php','/'], ['Modules','Themes','','\\'], $value);
            $namespance = str_replace('Themes\default', 'Themes\_default', $namespance);
            if(class_exists($namespance) && method_exists($namespance, "register")){
                $paths = str_replace(base_path().'/','',$value);
                $ado = [];
                $ado = with(new $namespance)->register();
                $ado["paths"] = $paths;
                $return[$namespance] = $ado;
            }
        }
        return $return;
    }
    /*
    Load Config
    */
    public function loadConfig(){
        $path = $this->getConfigurationPath();
        $arv = glob($path."/*.php");
        foreach ($arv as $key => $value) {
            $name = str_replace('.php','', basename($value));
            $path = $this->getConfigurationPath($name);
            
            if ($path) {
                $this->make('config')->set($name, require $path);
            }
        }
    }

    public function setConfig($key, $value=""){
        $this->make('config')->set($key, $value);
    }

  

    public function configure($name)
    {
        if (isset($this->loadedConfigurations[$name])) {
            return;
        }

        $this->loadedConfigurations[$name] = true;
       
    }

    public function getConfigurationPath($name = null)
    {


        if (! $name) {

            $appConfigDir = $this->basePath('config').'/';

            if (file_exists($appConfigDir)) {
                return $appConfigDir;
            } elseif (file_exists($path = __DIR__.'/../config/')) {
                return $path;
            }elseif(file_exists($path = BASE_PATH)) {
                return $path;
            }
        } else {
            
            $appConfigPath = $this->basePath('config').'/'.$name.'.php';

            if (file_exists($appConfigPath)) {
                return $appConfigPath;
            } elseif (file_exists($path = __DIR__.'/../config/'.$name.'.php')) {
                return $path;
            }elseif (file_exists($path = BASE_PATH.'/config/'.$name.'.php')) {
                return $path;
            }

        }
    }

    public function dispatch($request = null)
    {
        if ($request) {
            $this->instance('Illuminate\Http\Request', $request);
            $this->ranServiceBinders['registerRequestBindings'] = true;

            $method = $request->getMethod();
            $pathInfo = $request->getPathInfo();
        } else {
            $method = $this->getMethod();
            $pathInfo = $this->getPathInfo();
        }

        try {
            return $this->sendThroughPipeline($this->middleware, function () use ($method, $pathInfo) {

                if (isset($this->routes[$method.$pathInfo])) {

                    return $this->handleFoundRoute([true, $this->routes[$method.$pathInfo]['action'], []]);
                }

                return $this->handleDispatcherResponse(

                    $this->createDispatcher()->dispatch($method, $pathInfo)
                );
            });
        } catch (Exception $e) {
            return $this->sendExceptionToHandler($e);
        } catch (Throwable $e) {
            return $this->sendExceptionToHandler($e);
        }
    }

}
?>