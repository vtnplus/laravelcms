<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
define("FRONTEND", true);
use Remios;
/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

require_once __DIR__.'/vendor/autoload.php';

//Dotenv::load(__DIR__.'/../');

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Remios\Application(
    realpath(__DIR__.'/')
);

$app->withFacades();

$app->withEloquent();

$app->singleton(
    "shortcode",
    Remios\Utils\Shortcode::class
);

define("VIEW_PATH", base_path("contents/templates/".config("site.templates","default")."/"));
$app->bootModules("frontend");
/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton("socialite",Laravel\Socialite\Facades\Socialite::class);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

 $app->middleware([

    'Illuminate\Cookie\Middleware\EncryptCookies',
    'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
    'Illuminate\Session\Middleware\StartSession',
    'Illuminate\View\Middleware\ShareErrorsFromSession',
    'Laravel\Lumen\Http\Middleware\VerifyCsrfToken',
    //'Remios\Provider\CORSMiddleware',
    
 ]);

$app->routeMiddleware([
   
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);
$app->register(Laravel\Socialite\SocialiteServiceProvider::class);
$app->register(Ignited\LaravelOmnipay\LumenOmnipayServiceProvider::class);
/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

//$app->group(['namespace' => '\Remios\Apps'], function ($app) {
    require __DIR__.'/routes/web.php';
//});



//$app->setConfig("view.paths.0", $app->basePath("contents/templates/".config("site.templates","default")."/"));



/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/



$app->run($app->make('request'));
