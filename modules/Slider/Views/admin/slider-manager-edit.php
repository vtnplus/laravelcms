{header}
<?php
$slider = @unserialize(@$data->content);
?>
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel('<i class="glyphicon glyphicon-pencil"></i> '.lang("slider.manager.edit",false),true,'
		<a class="btn btn-default" href="'.admin_url("slider/manager",false).'"><i class="glyphicon glyphicon-remove-sign"></i> '.lang("global.cancel",false).'</a> 
		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  '.lang("global.save",false).'</button>
		');?>

 

<div>
        <ul class="row">
            <li class="col-xs-1">
                Width
                <input type="text" class="form-control slider_width" name="slider[width]" value="<?php echo data(@$slider["width"],1024);?>">
            </li>
             <li class="col-xs-1">
                Height
                <input type="text" class="form-control slider_height" name="slider[height]" value="<?php echo data(@$slider["height"],350);?>">
            </li>

            <li class="col-xs-2">
                Keyword
                <input type="text" class="form-control slider_height" name="keyword" value="<?php echo data($data->keyword, $data->id);?>">
            </li>

            <li class="col-xs-2">
                Skin
                <select type="text" class="form-control slider_height selectpicker" name="slider[skin]">
                    <option value="ms-skin-default" <?php echo (data(@$slider["skin"]) == "ms-skin-default" ? "selected" : "");?>>Default</option>
                    <option value="ms-skin-light-2" <?php echo (data(@$slider["skin"]) == "ms-skin-light-2" ? "selected" : "");?>>Light 2 </option>
                    <option value="ms-skin-light-3" <?php echo (data(@$slider["skin"]) == "ms-skin-light-3" ? "selected" : "");?>>Light 3 </option>

                    <option value="ms-skin-light-4" <?php echo (data(@$slider["skin"]) == "ms-skin-light-4" ? "selected" : "");?>>Light 4 </option>
                    <option value="ms-skin-light-5" <?php echo (data(@$slider["skin"]) == "ms-skin-light-5" ? "selected" : "");?>>Light 5 </option>
                    <option value="ms-skin-light-6" <?php echo (data(@$slider["skin"]) == "ms-skin-light-6" ? "selected" : "");?>>Light 6 </option>


                    <option value="ms-skin-light-6 ms-skin-round" <?php echo (data(@$slider["skin"]) == "ms-skin-light-6 ms-skin-round" ? "selected" : "");?>>Light 6 Round</option>
                    <option value="ms-skin-contrast" <?php echo (data(@$slider["skin"]) == "ms-skin-contrast" ? "selected" : "");?>>Contrast</option>
                    <option value="ms-skin-black-1" <?php echo (data(@$slider["skin"]) == "ms-skin-black-1" ? "selected" : "");?>>Black 1</option>

                    <option value="ms-skin-black-2" <?php echo (data(@$slider["skin"]) == "ms-skin-black-2" ? "selected" : "");?>>Black 2</option>
                    <option value="ms-skin-black-2 ms-skin-round" <?php echo (data(@$slider["skin"]) == "ms-skin-black-2 ms-skin-round" ? "selected" : "");?>>Black 2 Round</option>
                    <option value="ms-skin-metro" <?php echo (data(@$slider["skin"]) == "ms-skin-metro" ? "selected" : "");?>>Metro</option>
                </select>
            </li>

            <li class="col-xs-2">
                Srceen
                <select type="text" class="form-control slider_srceen selectpicker" name="slider[srceen]">
                    <option value="customs" <?php echo (data(@$slider["srceen"]) == "customs" ? "selected" : "");?>>Customs</option>
                    <option value="fullwith" <?php echo (data(@$slider["srceen"]) == "fullwith" ? "selected" : "");?>>Full With</option>
                    <option value="fullsrceen" <?php echo (data(@$slider["srceen"]) == "fullsrceen" ? "selected" : "");?>>Full Srceen</option>

                    
                </select>
                <input type="hidden" class="set_offset" value="" name="slider[set_offset]">
            </li>

            

            <li class="col-xs-2">
                Transition
                <select type="text" class="form-control slider_srceen selectpicker" name="slider[transition]">
               
                    <option value="basic" <?php echo (data(@$slider["transition"]) == "basic" ? "selected" : "");?>>Normal</option>
                    <option value="fadeBasic" <?php echo (data(@$slider["transition"]) == "fadeBasic" ? "selected" : "");?>>Normal and Fade</option>
                    <option value="wave" <?php echo (data(@$slider["transition"]) == "wave" ? "selected" : "");?>>Wave</option>
                    <option value="fadeWave" <?php echo (data(@$slider["transition"]) == "fadeWave" ? "selected" : "");?>>Wave and Fade</option>
                    <option value="flow" <?php echo (data(@$slider["transition"]) == "flow" ? "selected" : "");?>>Flow</option>
                    <option value="stack" <?php echo (data(@$slider["transition"]) == "stack" ? "selected" : "");?>>Stack</option>
                    <option value="fadeFlow" <?php echo (data(@$slider["transition"]) == "fadeFlow" ? "selected" : "");?>>Flow and Fade</option>
                    <option value="mask" <?php echo (data(@$slider["transition"]) == "mask" ? "selected" : "");?>>Mask</option>
                    <option value="parallaxMask" <?php echo (data(@$slider["transition"]) == "parallaxMask" ? "selected" : "");?>>Parallax Mask</option>
                    <option value="box" <?php echo (data(@$slider["transition"]) == "box" ? "selected" : "");?>>Box</option>
                    <option value="fade" <?php echo (data(@$slider["transition"]) == "fade" ? "selected" : "");?>>Fade</option>
                    <option value="scale" <?php echo (data(@$slider["transition"]) == "scale" ? "selected" : "");?>>Scale</option>
                    <option value="focus" <?php echo (data(@$slider["transition"]) == "focus" ? "selected" : "");?>>Focus</option>
                    <option value="partialWave" <?php echo (data(@$slider["transition"]) == "partialWave" ? "selected" : "");?>>Partial View Wave</option>
               

                    

                    
                </select>
                
            </li>

            <li class="col-xs-2">
                Data By
                <select type="text" class="form-control slider_srceen selectpicker" name="slider[dataset]">
                    <option value="customs" <?php echo (data(@$slider["dataset"]) == "customs" ? "selected" : "");?>>Customs</option>
                    <option value="posts" <?php echo (data(@$slider["dataset"]) == "posts" ? "selected" : "");?>>Posts</option>
                    <option value="pages" <?php echo (data(@$slider["dataset"]) == "pages" ? "selected" : "");?>>Pages</option>
                    

                    
                </select>
                
            </li>

            <li class="col-xs-2">
                <br>
                <label class="checkbox-inline"><input type="checkbox" name="slider[autoplay]" value="true" <?php echo (data(@$slider["autoplay"]) == "true" ? "checked" : "");?>> Auto Play</label>
            </li>

            <li class="col-xs-2">
                Parallax
                <select type="text" class="form-control slider_srceen selectpicker" name="slider[parallax]">
                    <option value="swipe" <?php echo (data(@$slider["parallax"]) == "swipe" ? "selected" : "");?>>Swipe</option>
                    <option value="mouse" <?php echo (data(@$slider["parallax"]) == "mouse" ? "selected" : "");?>>Mouse</option>
                    <option value="mouse:x-only" <?php echo (data(@$slider["parallax"]) == "mouse:x-only" ? "selected" : "");?>>mouse X</option>
                    <option value="mouse:y-only" <?php echo (data(@$slider["parallax"]) == "mouse:y-only" ? "selected" : "");?>>mouse Y</option>
                    <option value="off" <?php echo (data(@$slider["parallax"]) == "off" ? "selected" : "");?>>Off</option>
                    
                    
                </select>
                
            </li>

            <li class="col-xs-2">
                Parallax
                <select type="text" class="form-control slider_srceen selectpicker" name="slider[parallax]">
                    <option value="swipe" <?php echo (data(@$slider["parallax"]) == "swipe" ? "selected" : "");?>>Swipe</option>
                    <option value="mouse" <?php echo (data(@$slider["parallax"]) == "mouse" ? "selected" : "");?>>Mouse</option>
                    <option value="mouse:x-only" <?php echo (data(@$slider["parallax"]) == "mouse:x-only" ? "selected" : "");?>>mouse X</option>
                    <option value="mouse:y-only" <?php echo (data(@$slider["parallax"]) == "mouse:y-only" ? "selected" : "");?>>mouse Y</option>
                    <option value="off" <?php echo (data(@$slider["parallax"]) == "off" ? "selected" : "");?>>Off</option>
                    
                </select>
                
            </li>

            


        </ul>
</div>

<?php _panel_close();?>


<?php _panel("Slider",true,'<a class="btn btn-info" href="'.admin_url("slider/manager/createlayer/".$data->id,false).'">Add Layer</a>');?>
<!-- Tab panes -->
  

        <div><!-- Start Layer -->

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <?php foreach ($layer as $key => $value) { ?>
                <li role="presentation" class="<?php echo ($key == 0 ? "active" : "");?>"><a data-target="#layer_<?php echo $value->id;?>" aria-controls="layer_<?php echo $value->id;?>" role="tab" data-toggle="tab"><?php echo $value->title;?> <?php echo $value->id;?> <i data-id="<?php echo $value->id;?>" class="glyphicon glyphicon-minus-sign layer_remove"></i></a></li>
            <?php } ?>
            
          </ul>

          <!-- Tab panes -->
          <div class="tab-content" style="margin-top: 30px;">
            <?php foreach ($layer as $key => $value) { 
                $dataItems = @unserialize(@$value->content);
            ?>
            <input type="hidden" name="layer_id[]" value="<?php echo $value->id;?>">
            <div role="tabpanel" class="tab-pane <?php echo ($key == 0 ? "active" : "");?>" id="layer_<?php echo $value->id;?>">

                <div class="row">
                    <div class="col-xs-3">
                        <div class="input-group"><input type="text" class="form-control" id="inputThumbs<?php echo $value->id;?>" name="thumbs[]" value="<?php echo data($value->thumbs,null);?>" placeholder="<?php echo lang("posts.content.thumbs_placeholder");?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbs<?php echo $value->id;?>" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-picture"></i></button></span></div>
                    </div>

                    <div class="col-xs-3">
                        <div class="input-group"><input type="text" class="form-control" id="inputThumbsVideo" name="content[<?php echo $key;?>][video_bg]" value="<?php echo data(@$dataItems["video_bg"],null);?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbsVideo" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-facetime-video"></i></button></span></div>
                    </div>

                    <div class="col-xs-3">
                        <select class="form-control selectpicker"></select>
                    </div>


                    <div class="col-xs-3">
                        <div class="input-group"><input type="text" class="form-control" id="inputThumbsNails" name="content[<?php echo $key;?>][thumnails]" value="<?php echo data($data->thumbs,null);?>" placeholder="<?php echo lang("posts.content.thumbs_placeholder");?>"><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputThumbsNails" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-picture"></i></button></span></div>
                    </div>

                </div>
                

                <hr>
                <div>
                <?php
                

                if(!isset($dataItems["text"]) || !is_array($dataItems["text"])) $dataItems["text"] = [];
                ?>
                <div class="master-slider">
                <div class="preview" id="preview" style="background-image: url('<?php echo base_url($value->thumbs);?>');">
                    
                    <?php foreach ($dataItems["text"] as $keyItem => $valueItem) { ?>
                        <div class="<?php echo $dataItems["class"][$keyItem];?> items" style="<?php echo $dataItems["styles"][$keyItem];?>; overflow: hidden; ">
                            <a class="glyphicon glyphicon-remove-sign items-remove"></a>
                            <input type="hidden" class="text" name="content[<?php echo $key;?>][text][]" value="<?php echo $valueItem;?>">
                            <input type="hidden" class="left" name="content[<?php echo $key;?>][left][]" value="<?php echo @$dataItems["left"][$keyItem];?>"> 
                            <input type="hidden" name="content[<?php echo $key;?>][top][]" class="top" value="<?php echo @$dataItems["top"][$keyItem];?>">
                            <input type="hidden" name="content[<?php echo $key;?>][class][]" class="class" value="<?php echo @$dataItems["class"][$keyItem];?>">
                            <input type="hidden" name="content[<?php echo $key;?>][eff][]" class="eff" value="<?php echo @$dataItems["eff"][$keyItem];?>">
                            <input type="hidden" name="content[<?php echo $key;?>][styles][]" class="styles" value="<?php echo @$dataItems["styles"][$keyItem];?>">
                            <span contenteditable="true"><?php echo $valueItem;?></span>
                            </div>
                    <?php } ?>
                </div>
                </div>
                <select class="form-group selectpicker" id="addtype">
                    <option value="text">Text</option>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>

                <button class="btn btn-info btn-add" data-id="<?php echo $key;?>" type="button">Add</button>
                </div>
                </div>
            <?php } ?>
          </div><!-- End Layer -->

     
<hr>
    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <a class="btn btn-default" href="<?php admin_url("slider/manager");?>"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo lang("global.cancel");?></a> 
	      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo lang("global.save");?></button>
	    </div>
    </div>


<?php _panel_close();?>
<?php formclose();?>


    <div id="context-menu">
         <ul class="dropdown-menu" role="menu">
            <li class="dropdown-submenu">
                <a>Styles</a>
                  <ul class="dropdown-menu" role="menu" style="max-height: 250px; overflow-y: auto;">
                    <?php foreach ($css as $key => $value) { ?>
                         <li><a tabindex="-1"><?php echo $key;?></a></li>
                    <?php } ?>
                    
                  </ul>
            </li>
            <li class="dropdown-submenu">
                <a>Font Size</a>
                  <ul class="dropdown-menu" role="menu" style="max-height: 250px; overflow-y: auto;">
                    <?php foreach ($css as $key => $value) { ?>
                         <li><a tabindex="-1"><?php echo $key;?></a></li>
                    <?php } ?>
                    
                  </ul>
            </li>

            <li class="dropdown-submenu">
                <a>Padding</a>
                  <ul class="dropdown-menu" role="menu" style="max-height: 250px; overflow-y: auto;">
                    <?php foreach ($css as $key => $value) { ?>
                         <li><a tabindex="-1"><?php echo $key;?></a></li>
                    <?php } ?>
                    
                  </ul>
            </li>

        </ul>
    </div>


<style type="text/css">
    .controllers .navbar-nav li{
      
    }

</style>
<nav class="navbar navbar-default navbar-fixed-bottom controllers">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tools</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a title=" Font Size"><div class="fontslider"></div></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Color <span class="caret"></span></a>
          <div class="dropdown-menu" style="padding:5px;">
           <div class="fontcolorpicker"></div>
           
          </div>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Class <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BgColor <span class="caret"></span></a>
          <div class="dropdown-menu" style="padding:5px; ">
           <div class="bgcolorpicker"></div>
           <div class="clearfix"></div>
          </div>
        </li>

         <li class="active"><a href="#" title=" Font Size">
            <div class="paddingsliderleft"></div>
            
            </a>
        </li>
        <li class="active"><a href="#" title=" Font Size">
            
            <div class="paddingslidertop"></div>
            </a>
        </li>
        
        <li class="active"><a href="#" title=" Font Size">
            
            <div class="borderradius"></div>
            </a>
        </li>

        <li class="active"><a href="#" title=" Font Size">
            
            <div class="widthslider"></div>
            </a>
        </li>

         <li class="active"><a href="#" title=" Font Size">
            
            <div class="heightslider"></div>
            </a>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eff <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>


      </ul>


      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script type="text/javascript">

function controllerChange(obj){
     $('.bgcolorpicker').colorpicker({ color: obj.css("background-color"), container: $('.bgcolorpicker').parent(), inline: true, format: 'rgba' }).on('changeColor', function(e) { 
            var color = e.color.toRGB();
        
            obj.css("background-color","rgba("+color.r+","+color.g+","+color.b+","+color.a+")");
            obj.find(".styles").val(obj.attr("style"));
    });
    $('.fontcolorpicker').colorpicker({ color: obj.css("color"), container: $('.fontcolorpicker').parent(), inline: true,format: 'rgba' }).on('changeColor', function(e) { 
             var color = e.color.toRGB();
            obj.css("color","rgba("+color.r+","+color.g+","+color.b+","+color.a+")");
            obj.find(".styles").val(obj.attr("style"));
    });

    $( ".fontslider" ).slider({
        range: "min",
        value: (obj.css("font-size") ? obj.css("font-size").replace("px", "") : 12),
        min: 12,
        max: 72,
        slide: function( event, ui ) {
            //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            obj.css("font-size",ui.value);
            obj.find(".styles").val(obj.attr("style"));
        }
    });

    $( ".paddingsliderleft" ).slider({
        range: "min",
        value: (obj.css("padding-left") ? obj.css("padding-left").replace("px", "") : 0),
        min: 0,
        max: 100,
        slide: function( event, ui ) {
            //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            obj.css("padding",$( ".paddingslidertop" ).slider("value")+"px " + ui.value +"px");
            obj.find(".styles").val(obj.attr("style"));
        }
    });

    $( ".paddingslidertop" ).slider({
        range: "min",
        value: (obj.css("padding-top") ? obj.css("padding-top").replace("px", "") : 0),
        min: 0,
        max: 100,
        slide: function( event, ui ) {
            //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            obj.css("padding",ui.value +"px " + $( ".paddingsliderleft" ).slider( "value" ) + "px ");
            obj.find(".styles").val(obj.attr("style"));
        }
    });


    $( ".borderradius" ).slider({
        range: "min",
        value: (obj.css("borderBottomLeftRadius") ? obj.css("borderBottomLeftRadius").replace("px", "") : 0),
        min: 0,
        max: 100,
        slide: function( event, ui ) {
            //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            obj.css("borderRadius",ui.value +"px");

            obj.find(".styles").val(obj.attr("style"));
        }
    });


    $( ".widthslider" ).slider({
        range: "min",
        value: (obj.css("width") ? obj.css("width").replace("px", "") : 0),
        min: 10,
        max: 800,
        slide: function( event, ui ) {
            //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            obj.css("width",ui.value +"px");

            obj.find(".styles").val(obj.attr("style"));
        }
    });


     $( ".heightslider" ).slider({
        range: "min",
        value: (obj.css("height") ? obj.css("height").replace("px", "") : 0),
        min: 10,
        max: 800,
        slide: function( event, ui ) {
            //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            obj.css("height",ui.value +"px");

            obj.find(".styles").val(obj.attr("style"));
        }
    });



    



}


    $(function(){
       
         $(".controllers").hide();
        
        $(".preview").on("click",function(){
            $(".controllers").hide();
        });
        
        $(".layer_remove").on("click", function(){
            window.location.href="<?php admin_url("slider/manager/deletelayer/");?>" + $(this).attr("data-id");
        });
        $(".items-remove").on("click",function(){
            $(this).parent().remove();
        });

        $(".slider_height").on("input", function(){
            var window_width = $(window).width();
            var clt_width = $(".tab-pane.active .preview").width();
            var reh = ((clt_width * this.value) / window_width);
            console.log(reh);
            $(".tab-pane.active .preview").height(reh);
        });

        $(".slider_width").on("input", function(){
            var width = this.value == "100%" || this.value == "auto" ? "1170" : this.value;
            //$(".tab-pane.active .preview").width(width);
        });

        $(".slider_srceen").on("change", function(){
            if(this.value == "fullwith"){
                $(".set_offset").val($(".tab-pane.active .preview").offset().left);
            }
        });

        controlItems();

        $(".btn-add").on("click",function(){
            var addtype = $("#addtype").val();
            var id = $(this).attr("data-id");
            var html = "";

            if(addtype == "image"){
                html = '<img src="" />';
            }else if(addtype == "video"){
                 html = '<video></div>';
            }else{
                 html = '<p>Text</p>';
            }
            htmls = '<div class="items"  style="left:0px; top:100px;"><a class="glyphicon glyphicon-remove-sign items-remove"></a><input type="hidden" class="text" name="content['+id+'][text][]" value="Text"><input type="hidden" class="left" name="content['+id+'][left][]" value="0"> <input type="hidden" name="content['+id+'][top][]" class="top" value="100"><input type="hidden" name="content['+id+'][class][]" class="class" value=""><input type="hidden" name="content['+id+'][eff][]" class="eff" value="easeOutQuint"><input type="hidden" name="content['+id+'][styles][]" class="styles" value=""><span contenteditable="true">'+html+'</span></div>';

            $(this).parent().find("#preview").append(htmls);
            controlItems();
        });
    });

    function controlItems(){
        var classRemove = '<?php echo implode(array_keys($css)," ");?>';
        var onEdit = $(".items").contextmenu({
                  target : "#context-menu",
                  onItem: function(context, e) {
                   
                    $(context).removeClass(classRemove);
                    $(context).addClass($(e.target).text());
                    $(context).find("input.class").val( $(context).attr("class"));
                    return;
                  }
                });

        $( ".items" ).draggable({
            containment: $(this).parent().find('.preview'),
            stop : function( event, ui ) {

                var currentPos = ui.helper.position();
                $(this).find(".left").val(parseInt(currentPos.left));
                $(this).find(".top").val(parseInt(currentPos.top));
                
            
            }
        }).bind('click', function(){
            var tjis = $(this).attr("class").split(" ");
            $.each(tjis, function(i,v){
                $(".menuClass").append('<li><a href="#">'+v+'</a></li>');
            });
            controllerChange($(this));
            $(".controllers").show();
            $(this).find("span").focus();
            changeText($(this));
            return false;
        });
    }

    function changeText(object){
        object.find("span[contenteditable=true]").on("input", function(){
            $(this).parent().find("input.text").val($(this).text());
        });
    }
</script>

<style type="text/css">
.colorpicker.dropdown-menu{
    border:0px;
    box-shadow: none;
}
.items-remove{
    font-size: 12px;
    float: right;
    color: red;
    width: 20px;
    height: 20px;
}

.dropdown-list li a{
    padding:7px 10px; 
}
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

.layer_remove{
    color: red;
    float: right;
    margin-top: -18px;
    margin-right: -24px;
    z-index: 99;
}
    .preview{
        position: relative;
         visibility: visible;
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center center;
         height: <?php echo data(@$slider["height"],350);?>px; 
    }
    .items{
        position: absolute;
        margin:auto; 

    }

.fontslider, .paddingsliderleft, .paddingslidertop, .borderradius, .widthslider, .heightslider{
    min-width: 120px;
}
.ui-slider {
    position: relative;
    text-align: left;
}
.ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 1.2em;
    height: 1.2em;
    cursor: default;
    -ms-touch-action: none;
    touch-action: none;
    background-color: red;
}
.ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    font-size: .7em;
    display: block;
    border: 0;
    background-position: 0 0;
}

/* support: IE8 - See #6727 */
.ui-slider.ui-state-disabled .ui-slider-handle,
.ui-slider.ui-state-disabled .ui-slider-range {
    filter: inherit;
}

.ui-slider-horizontal {
    height: .8em;
}
.ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -.6em;
}
.ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%;
}
.ui-slider-horizontal .ui-slider-range-min {
    left: 0;
}
.ui-slider-horizontal .ui-slider-range-max {
    right: 0;
}

.ui-slider-vertical {
    width: .8em;
    height: 100px;
}
.ui-slider-vertical .ui-slider-handle {
    left: -.3em;
    margin-left: 0;
    margin-bottom: -.6em;
}
.ui-slider-vertical .ui-slider-range {
    left: 0;
    width: 100%;
}
.ui-slider-vertical .ui-slider-range-min {
    bottom: 0;
}
.ui-slider-vertical .ui-slider-range-max {
    top: 0;
}
.ui-widget{
    border: 1px solid #ddd;
    background-color: #666;
}
</style>


{footer}