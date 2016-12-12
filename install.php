<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
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
if(file_exists(__DIR__."/config.php")){
    dd("Ready Install. Pls remove file config.php before reinstall");    
}
$app->withFacades();

$app->withEloquent();



$app->singleton(
    "shortcode",
    Remios\Utils\Shortcode::class
);

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
    $app->get('/', function(){
        $window = data(input("validate"),"server");
        return views($window);
    });

    $app->post('/', function(){
        $window = data(input("validate"),"server");
        $database = data(input("database"),[]);
        $driver = $database["driver"];
        $data = config("database.connections.".$driver);
        $database = array_merge($data,$database);

        files()->put(base_path("config.php"),'<?php return '."\n".var_export($database,true)."\n".'?>');
        db_backups(base_path("contents/backups"));


        /*
        Create Database
        */
        db_restore(base_path("contents/resources/views/install/database.sql"));

        /*
        Create User Admin
        */

        $admin = input("admin_email");
        $password = input("admin_password");
        $data = db("Account::Users")->find(1);
        if($data){
            $data->email = $admin;
            $data->password = \Hash::make(strtolower($password));
            $data->is_admin = 1;
            $data->is_active = 1;
            $data->save();
        }else{
            db("Account::Users")->insert([
                "email" => $admin,
                "password" => \Hash::make(strtolower($password)),
                "is_admin"  => "1",
                "id" => 1,
                "first_name"    => "Admin",
                "last_name"     =>  "Root",
                "is_active"     =>  "1"
            ]);
        }

        /*
        Create Language Database
        */

        $data = db("Settings::Languages")->where("language_code","en")->first();
        if($data){
            $data->name = "English";
            $data->country_code = "GB";
            $data->language_code = "en";
            $data->folder = "GB";
            $data->status = 1;
            $data->domain = str_replace(['http://www.','http://'],'', base_url());
            $data->save();
        }else{
            db("Settings::Languages")->insert([
                "name" => "English",
                "country_code" => "GB",
                "language_code"  => "en",
                "folder" => "en",
                "status"    => "1",
                "domain"     =>  str_replace(['http://www.','http://'],'', base_url()),
                
            ]);
        }

        /*
        Create Database Demo
        */
        if(input("install_demo") == 1){
            db_restore(base_path("contents/resources/views/install/database-demo.sql"));
        }
        return redirect("?validate=success");
    });

//});



$app->setConfig("view.paths.0", $app->basePath("contents/resources/views/install/"));



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
