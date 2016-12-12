<?php
if(!function_exists("shortcode_slider")){

function shortcode_slider($atts = [], $content=""){
		extract( shortcode_atts( array(
	      "id"    => "",
	      "class"	=>	"",
	      "height" => ""
	    ), $atts ) );
	if(!$id) return false;
	

	$urls = str_replace(base_path(),base_url(),realpath(__DIR__."/../Views/assets"));
	register("style",[$urls."/css/default.css",$urls."/css/masterslider.css",$urls."/css/masterslider.main.css",$urls."/css/text.css"]);
	register("javascript",[$urls."/js/masterslider.min.js",
							$urls."/js/masterslider.flickr.min.js",
							$urls."/js/jquery.easing.min.js"
							]);
	if(intval($id) > 0 && is_numeric($id)){
		$slider = db("Posts::Posts")->language()->stores()->type("slider")->find($id);
	}else if(is_string($id)){
		$slider = db("Posts::Posts")->language()->stores()->type("slider")->where("keyword",$id)->first();
	}
	
	if(!$slider) return false;


	$slider_id = "slider_".$slider->id;
	$config = @unserialize(@$slider->content);
	$layer = db("Posts::Posts")->language()->stores()->type("slider")->where("parent_id", $slider->id)->rows(20);

	$template = '<!-- template -->

	<div class="ms-layers-template" id="P_'.$slider_id.'">
				<!-- masterslider -->
				<div class="master-slider '.data(@$config["skin"],"ms-skin-default").'" id="'.$slider_id.'">';

				if(@$config["dataset"] == "posts"){

					$dataPosts = db("Posts::Posts")->language()->stores()->type("blogs")->rows(5);
					foreach ($dataPosts as $key => $value) {
						$template .= '	
								<div class="ms-slide slide-'.($key+1).'" data-delay="7" data-fill-mode="fill">
									
							        <img src="'.$urls.'/css/blank.gif" data-src="'.($value->thumbs ? $value->thumbs : $urls.'/css/blank.gif').'" alt="lorem ipsum dolor sit"/>';
						
						$template .= '
							<div  class="ms-layer  msp-cn-9-10 ms-hover-active" data-offset-x="0" data-offset-y="100" style="background-color:#FFF;padding:40px;width:280px;"   data-effect="t(true,n,n,n,n,n,n,n,1.5,1.5,n,n,n,n,n)" data-delay="1000" data-duration="2000" data-ease="easeOutBack"     data-origin="tl" data-position="normal"  ><img src="/contents/uploads/1/images/canon_eos_5d_1.jpg" style="max-width:100%;"></div>';

						$template .= '
							<div  class="ms-layer  msp-cn-9-10 ms-hover-active" data-offset-x="300" data-offset-y="100" style="background-color:#FFF;"   data-effect="t(true,n,n,n,n,n,n,n,1.5,1.5,n,n,n,n,n)" data-delay="300" data-duration="2000" data-ease="easeOutBack"     data-origin="tl" data-position="normal"  >'.$value->title.'</div>';

						$template .= '
							<div  class="ms-layer " data-offset-x="300" data-offset-y="200" style=""   data-effect="t(true,n,n,n,n,n,n,n,1.5,1.5,n,n,n,n,n)" data-delay="2000" data-duration="1800" data-ease="easeOutBack"     data-origin="tl" data-position="normal"  >'.$value->description.' (Xem thêm...)</div>';
						

						$template .= '			    </div>';
					}


				}else{


					foreach ($layer as $key => $value) {
						$dataItems = @unserialize(@$value->content);

	                
						# code...
					
						$template .= '	
										<div class="ms-slide slide-'.($key+1).'" data-delay="7" data-fill-mode="fill">
											
									    <img src="'.$urls.'/css/blank.gif" data-src="'.$value->thumbs.'" alt="lorem ipsum dolor sit"/>';

						if(trim($dataItems["video_bg"])){
							$template .= '	
										<video data-autopause="false" data-mute="true" data-loop="true" data-fill-mode="fill" >
											<source src="'.base_url($dataItems["video_bg"]).'" type="video/mp4"/>
										</video>
							';				
						}

						if(!isset($dataItems["text"]) || !is_array($dataItems["text"])) $dataItems["text"] = [];
						$time = 100;
						foreach ($dataItems["text"] as $keyItem => $valueItem) { 
							$left = @$dataItems["left"][$keyItem];
							
							$template .= '
								<div  class="ms-layer  '.str_replace(['items','ui-draggable','ui-draggable-handle'],'',@$dataItems["class"][$keyItem]).'" data-offset-x="'.@$left.'" data-offset-y="'.@$dataItems["top"][$keyItem].'" style="'.@$dataItems["styles"][$keyItem].'"   data-effect="t(true,n,n,n,n,n,n,n,1.5,1.5,n,n,n,n,n)" data-delay="'.$time.'" data-duration="2000" data-ease="easeOutQuint"     data-origin="tl" data-position="normal"  >'.$valueItem.'</div>';
							$time = $time+200;
						}
				
						$template .= '			    </div>';
					}

							
				    }
	

	$runWidth =  '"'.data((@$config["width"] == "auto" ? "1140" : intval(@$config["width"])),"1170").'"';
	if(@$config["width"] == "100%"){
		$runWidth = '$("body").width()';
	}
	$runHeight = '"'.data(@$config["height"],"350").'"';
	if($config["srceen"] == "fullsrceen"){
		$runHeight = 'window.innerHeight - 118';
	}
	$template .= '			</div>
				<!-- end of masterslider -->
	</div>
	<script type="text/javascript">   
	  $(document).ready(function(){
	    var slider = new MasterSlider();
	    if($(window).width() > 680){
		    slider.control("arrows",{insertTo:"#'.$slider_id.'", autohide:false, overVideo:true}); 
		    slider.control("bullets" ,{autohide:true, overVideo:true});  
		    slider.control("timebar"    ,{ autohide:false, overVideo:true, align:"top", color:"#FFFFFF"  , width:4 });
		}
		
	    slider.setup("'.$slider_id.'" , {
	      width: '.$runWidth.',
	      height: '.($height ? $height : $runHeight).',
	      fullwidth:true,
	      centerControls:false,
	      speed:18,
	      loop            : false,
	      shuffle         : false,
			preload         : 0,
			heightLimit     : true,
			autoHeight      : false,
			smoothHeight    : true,
	      swipe           : true,
	      mouse           : true,
	      autoplay : '.data(@$config["autoplay"],"false").',
	      dir             : "h",
			parallaxMode    : "'.data(@$config["parallax"],"swipe").'",
			view            : "'.data(@$config["transition"],"basic").'"
	      

	    });
	   	
	});
	  </script>

	<!-- end of template -->

	';
	return $template;
}

add_shortcode("slider","shortcode_slider");
}