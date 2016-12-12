<?php 

                config(["register.router.about" => "about"]);
                $app->get("about/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("about.html/".$first, $nums_agrs));
                });

                $app->get("about",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["about.html"]);
                });

            

                config(["register.router.destination" => "destination"]);
                $app->get("destination/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("destination.html/".$first, $nums_agrs));
                });

                $app->get("destination",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["destination.html"]);
                });

            

                config(["register.router.gallery" => "gallery"]);
                $app->get("gallery/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("gallery.html/".$first, $nums_agrs));
                });

                $app->get("gallery",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["gallery.html"]);
                });

            

                config(["register.router.products" => "products"]);
                $app->get("products/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("products.html/".$first, $nums_agrs));
                });

                $app->get("products",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["products.html"]);
                });

            

                config(["register.router.services" => "services"]);
                $app->get("services/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("services.html/".$first, $nums_agrs));
                });

                $app->get("services",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["services.html"]);
                });

            

                config(["register.router.tour-vietnam" => "tour-vietnam"]);
                $app->get("tour-vietnam/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("tour-vietnam.html/".$first, $nums_agrs));
                });

                $app->get("tour-vietnam",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["tour-vietnam.html"]);
                });

            

                config(["register.router.travel" => "travel"]);
                $app->get("travel/{first:.+}",function($first){
                    $rf = new \ReflectionMethod ( "Modules\Pages\Frontend\Home", "getIndex" );
                    
                    $nums_agrs = $rf->getNumberOfParameters ();
                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), app()->extractParams("travel.html/".$first, $nums_agrs));
                });

                $app->get("travel",function($first=""){

                    return call_user_func_array(array(with(new Modules\Pages\Frontend\Home),"getIndex"), ["travel.html"]);
                });

            