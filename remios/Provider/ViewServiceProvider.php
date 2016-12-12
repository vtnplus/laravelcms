<?php
namespace Remios\Provider;
use Illuminate\View\FileViewFinder;
class ViewServiceProvider extends \Illuminate\View\ViewServiceProvider{
	public function registerViewFinder()
    {
        $this->app->bind('view.finder', function ($app) {
        	if(defined("VIEW_PATH")){
                app("config")->set('view.paths.0',VIEW_PATH);
        		//$app['config']['view.paths.0'] = VIEW_PATH;
        	}
            $paths = $app['config']['view.paths'];
            
            
            return new FileViewFinder($app['files'], $paths);
        });
    }
}