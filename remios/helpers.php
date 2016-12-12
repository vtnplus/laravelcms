<?php
use Illuminate\Support\Str;
use Illuminate\Container\Container;
function base_url($paths="", $domain=false, $slasp=false){

	$s = &$_SERVER;
	
	$spath = str_replace($s['DOCUMENT_ROOT'], '', dirname(__DIR__));

    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;

    if($domain){
    	return  $host;
    }

    if($slasp){
    	return $slasp . '://' . $host 	.	($spath ? "/{$spath}" : "")		.	($paths ? "/{$paths}" : "");
    }

    
	return $protocol . '://' . str_replace('//','/',$host 	.	($spath ? "/{$spath}" : "")		.	($paths ? "/{$paths}" : ""));
}

function is_home(){
  $s = &$_SERVER;
  if($s["REQUEST_URI"] == '/' || $s["REQUEST_URI"] == ""){
    return true;
  }
  return false;
}

function is_admin(){
  if(@user()->is_admin == 1){
    return true;
  }
  return false;
}

function device($action=""){
  $device = with(new \Remios\Utils\Adapters\Mobile_Detect);
  if(!$action){
    return $device;
  }else{
    if(method_exists($device, $action)){
      return call_user_method($action, $device);
    }
  }
}

function is_device($validate=""){
  $detect = device();
  $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

  if($validate){
    return ($validate == $deviceType ? true : false);
  }else{
    return $deviceType;
  }
}


function admin_url($paths="", $echo = true){
    $url = base_url("admin/".$paths);
    if(!$echo){
        return $url;
    }
    echo $url;
}

function views($file, $data=[], $params=[]){

    $view = with( new \Remios\Utils\Views);
    return $view->render($file, $data, $params);
    
}

/*
Function systems
*/

function request($name=null){
    if($name){
        return app("request")->input($name);
    }
    return app("request");
}

function input($name=null, $extract=false){

    $input = request($name);
    if($extract && is_array($input)){
        $input = serialize($input);
    }
    return $input;
}


function storage(){
    return app("storage");
}

function files(){
    return app("files");
}




function email(){
    return app("mail");
}

function image($file=""){
  if($file){
    return app("image")->make($file);
  }
  return app("image");
}


function support(){
  return with(new Remios\Support);
}


function db($dbclass="",$settable=false, $connect="mysql"){
    @list($namespaces, $class) = explode('::',$dbclass);
    $namespace = "Modules\\{$namespaces}\\Models\\{$class}";
   
    if(class_exists($namespace)){
        if($namespace == 'Modules\Posts\Models\Posts'){
           $ado = with(new $namespace);
            if(method_exists($ado, "setTable")){
              $ado->setTable($settable);
              
            }
          }else{
            $ado = with(new $namespace);
          }
       
        return $ado;
    }else{
        $tables = strtolower($class);

        if(\Schema::hasTable($tables)){

            ob_start();
            $ado = with(new Remios\Utils\Database\BuilderModels);
            $ado->setTable($tables);
            ob_end_clean();
            return $ado;
        }
    }
    

    return with(new Remios\Utils\Database\DBQuery);
}


function data($text, $default=null){
    
    if($text){
        return (is_serialized($text) ? unserialize($text) : $text);
    }
    return $default;
}


function widgets($key="left"){
  $widgets = with(new Remios\Utils\Widgets);
  if($key){
    $widgets->setPostions($key);
  }
  return $widgets;
}

/*
Set Default Data
*/

function getLanguage(){
    return config("site.language","vn");
}

function getStores(){
   return config("site.stores_id",0);
}

function getThemes($select=""){
  $paths = base_path("contents/templates/*");
  $data = files()->glob($paths);
  foreach ($data as $key => $value) {
    $theme = basename($value);
    if($theme != "default"){
      echo '<option value="'.$theme.'" '.($select == $theme ? "selected" : "").'>'.ucfirst($theme).'</option>';
    }
  }
}

function getAuth(){
  if(is_guest()){
    return 0;
  }
  return @user()->id;
}

function getUserIP(){
  if (isset($_SERVER["REMOTE_ADDR"])) {
        return $_SERVER["REMOTE_ADDR"];
    } else {
        return '127.0.0.1';
    }
}

function getThumbnail($src=""){
  if(!$src){
    return resources_url_views("images/no-image.png");
  }else{
    return uploads_url($src);
  }
}

function uploads_url($src){
  return $src;
}

function uploads_path($paths=""){
  $authId = getAuth();
  $path = base_path("contents/uploads/".$authId.($paths ? "/".$paths : ""));
  return $path;
}


/*
Languge Extract
*/


function lang($key, $default=null, $auto=false){

    if(config("language_data.{$key}")){
        return config("language_data.{$key}");
    }
    $langConfig = config("site.language","vn");

    @list($module, $contoller, $exits) = explode('.', $key, 4);

    $file = base_path("modules/".ucfirst($module)."/language/".strtolower($contoller).".php");
    
    $avalible = base_path("contents/language/".$langConfig."/".strtolower($module)."-".strtolower($contoller).".php");
    
    if(file_exists(base_path("contents/language/".$langConfig."/".strtolower($module).".php"))){
        
        $avalible = base_path("contents/language/".$langConfig."/".strtolower($module).".php");
    }

    if(!file_exists($avalible) && file_exists($file)){
        
        files()->copy($file, $avalible);
    }


    $file = $avalible;
    $define = md5($file);
    
    /*
    Loadding Language
    */
    if (empty($GLOBALS['__composer_autoload_files'][$define])) {

        if($exits == null && file_exists($file)){
            app("config")->set("language_data.{$module}", require $file);
        }elseif(file_exists($file)){
            app("config")->set("language_data.{$module}.{$contoller}", require $file);
        }
        
        $GLOBALS['__composer_autoload_files'][$define] = true;
    }

    /*
    Return Data
    */
    if(config("language_data.{$key}")){
        return config("language_data.{$key}");
    }


    return $key;
}

function load_file($file, $fileIdentifier=""){
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        return require $file;
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
    }
}

function register($key,$value=""){
    if(!is_array($value)){
        $value = [$value];
    }
    $get = config()->get("register.{$key}");
    if(!$get) $get = [];
    config()->set("register.{$key}",array_merge($value,$get));
}

function editer(){
    return with(new Remios\Utils\Tinymce);
}

function jquery(){
    return with(new Remios\Utils\Jquery);
}

/*
Theme Function
*/

function theme_url($paths="", $echo=true){
	$path = basename(config("view.paths.0"));
    $url = base_url(theme_local()."/{$path}".($paths ? "/".$paths : ""));
    if(!$echo){
	   return $url;
    }
    echo $url;
}

function theme_path($paths="", $short=false){

    $path = basename(config("view.paths.0"));
    
    $file = base_path(theme_local()."/{$path}".($paths ? "/".$paths : ""));

    if(app("files")->exists($file)){
        if($short){
            return $paths;
        }else{
            return $file;
        }
        
    }
    return false;
}

function theme_local(){
    $local = app("config")->get("view.local");

    if($local){
        return $local;
    }else{
        return  'contents/templates';
    }
}

function resources_url($paths=""){
	return resources_path("vendor".($paths ? "/".$paths : ""), true);
}

function resources_url_views($paths=""){

  return resources_path("views".($paths ? "/".$paths : ""),true);

}

function resources_path($paths="", $url=false){
  if($url){

    return base_url("contents/resources".($paths ? "/".$paths : ""));

  }else{

    return base_path("contents/resources".($paths ? "/".$paths : ""));

  }
  
}

function _panel($header="", $driver=false,$arv=[]){
    echo '<div class="x_panel">';
    if($header || $arv){
        echo '<div class="header">';
        if($header){
            echo '<h2>'.$header.'</h2>';
        }
        if($arv){
            $arvs = [];
            if(isset($arv["html"])){
                $arvs[] = $arv["html"];
            }else if(is_string($arv)){
                $arvs[] = $arv;
            }
            echo '<div class="pull-right">'.implode($arvs, "\n").'</div>';
        }
        echo '</div>';
    }
    if($driver){
        echo '<hr>';
    }
    echo "<div class=\"content\">";
}
function _panel_close($sample=""){
    echo '</div>';
    echo '</div>';
    if($sample){
        echo '<!--// Close '.$sample.' //-->';
    }
}



function formopen($arv =[]){
    
    if(!isset($arv["action"])){
        $arv["action"] = app('url')->full();
    }

    if(!isset($arv["method"])){
        $arv["method"] = "POST";
    }

    $rs = [];
    foreach ($arv as $key => $value) {
        $rs[] = $key.'="'.$value.'"';
    }

    echo '<form '.implode($rs, " ").'><input type="hidden" name="_token" value="'.csrf_token().'">';
}

function formclose(){
    echo '</form>';
}



/*
Support Layout
*/

function button($arv=[], $echo=true, $auth_id=0){
    $arvs = [];
    $sampleClass = [
        "edit" => ["btn-primary","glyphicon glyphicon-pencil",lang("global.edit")],
        "delete" => ["btn-danger","glyphicon glyphicon-trash",lang("global.delete")],
        "block" =>  ["btn-danger","glyphicon glyphicon-lock",lang("global.block")],
        "copy"  =>  ["btn-info","glyphicon glyphicon-copy",lang("global.copy")],
        "tools" => [],
        "create" => []
    ];
    foreach ($arv as $key => $value) {
      if(user()->id == $auth_id || user()->is_admin){
        if(is_array($value)){
            $value = array_merge($value,$sampleClass[$key]);

            $arvs[] = sprintf('<a class="btn '.(@$value[1] ? $value[1] : "btn-default").' btn-xs" href="%s"><i class="%s icons"></i> %s</a>',admin_url(@$value[0],false),(@$value[2] ? @$value[2] : @$sampleClass[$key][1]) ,@$value[3]);
        }else{
            $arvs[] = '<a class="btn btn-primary" href="'.admin_url($key,false).'">'.$value.'</a>';
        }
      }
    }
    if($echo){
        echo implode($arvs, "\n");
    }else{
        return implode($arvs, "\n");
    }
    
}

function button_tranlation($url=""){
  $count = db("Stores::Languages")->where("status",1)->where("folder",'!=',config("site.language"))->count();
  if($count > 0){
  echo '<div class="btn-group btn-group-xs">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="glyphicon glyphicon-tags"></i> Copy <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              '.getLanguages("dropdown",admin_url($url, false)).'
            </ul>
          </div>';
        }
}

/*
Get Register
*/

function get_register($key, $sub=""){
    $data = config("register.{$key}");
  
    
    return $data;
}

function get_register_menu($keys, $sub=""){
    $data = get_register("menu.{$keys}");

    return array_sort($data,"sort");
}



function get_user_permission($arv="", $key=""){
    $extract = unserialize($arv);
    return $extract;
}



function is_serialized($data, $strict = true ) {
         // if it isn't a string, it isn't serialized.
         if ( ! is_string( $data ) ) {
                 return false;
         }
         $data = trim( $data );
         if ( 'N;' == $data ) {
                 return true;
         }
         if ( strlen( $data ) < 4 ) {
                 return false;
         }
         if ( ':' !== $data[1] ) {
                 return false;
         }
         if ( $strict ) {
                 $lastc = substr( $data, -1 );
                 if ( ';' !== $lastc && '}' !== $lastc ) {
                         return false;
                 }
         } else {
                 $semicolon = strpos( $data, ';' );
                 $brace     = strpos( $data, '}' );
                 // Either ; or } must exist.
                 if ( false === $semicolon && false === $brace )
                         return false;
                 // But neither must be in the first X characters.
                 if ( false !== $semicolon && $semicolon < 3 )
                         return false;
                 if ( false !== $brace && $brace < 4 )
                         return false;
         }
         $token = $data[0];
         switch ( $token ) {
                 case 's' :
                         if ( $strict ) {
                                 if ( '"' !== substr( $data, -2, 1 ) ) {
                                         return false;
                                 }
                         } elseif ( false === strpos( $data, '"' ) ) {
                                 return false;
                         }
                         // or else fall through
                 case 'a' :
                 case 'O' :
                         return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
                 case 'b' :
                 case 'i' :
                 case 'd' :
                         $end = $strict ? '$' : '';
                         return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
         }
         return false;
}


function sendmail($keyword=null, $to=[], $extract=[]){
    return with(new Modules\Stores\Frontend\Sendmail)->sender($keyword, $to, $extract);
}






function fetch_files_layout($path="", $select=""){
  $file = glob($path);
  foreach ($file as $key => $value) {
    echo '<option value="'.basename($value).'" '.($select == basename($value) ? "selected" : "").'>'.basename($value).'</option>';
  }
}


function fetch_fontend_layout($select=""){
  $files = [];
  $path = base_path("contents/templates/".config("templates")."/pages/*.php");
  $file = glob($path);
  foreach ($file as $key => $value) {
    $files[basename($value)] = basename($value);
  }

  $path = base_path("contents/resources/views/pages/*.php");
  $file = glob($path);
  foreach ($file as $key => $value) {
    $files[basename($value)] = basename($value);
    
  }

  foreach ($files as $key => $value) {
    echo '<option value="'.basename($value).'" '.($select == basename($value) ? "selected" : "").'>'.basename($value).'</option>';
  }

}



function is_frontend(){
  if(defined("FRONTEND")){
    return true;
  }
}


function tranlation($text, $form="", $to=""){
   $apiKey = config("site.google_api");
   if(!$apiKey) return $text;
   $detext = db("Settings::Languages")->where("folder",$to)->first();
   if(@$detext->language_code){
    $to = $detext->language_code;
   }

    $form = (!$form ? config("site.language") : $form);
    if($form == "vn") $form = "vi";
    if($form == $to || !$to){
      return $text;
    }

    
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source='.strtolower($form).'&target='.strtolower($to);

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);                 
    $responseDecoded = json_decode($response, true);
    curl_close($handle);

    
    $textTranlay = @$responseDecoded["data"]["translations"][0]["translatedText"];
   
    return ($textTranlay ? $textTranlay : $text);
}
