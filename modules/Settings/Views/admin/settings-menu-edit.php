<?php formopen(["class" => "form-horizontal", "action" => admin_url("settings/menu/edit/".$data->id, false), "target" => "savewidgets"]);?>
<?php _panel();?>
<!--ViewHeader-->

    <!--Name -->
    <div class="form-group" data-field="name,input,requice">
        <label for="inputName" class="col-sm-2 control-label"><?php echo lang("settings.menu_name");?></label>
        <div class="col-sm-10">
              <div class="input-group">
                  <span class="input-group-btn">
                    <input type="hidden" name="icons" value="<?php echo $data->icons;?>">
                    <button class="btn btn-default" role="iconpicker"  data-icon="<?php echo $data->icons;?>" type="button"><i class="glyphicon glyphicon-repeat"></i></button>
                  </span>
                  <input type="text" class="form-control" name="name" value="<?php echo $data->name;?>" placeholder="Title...">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" onClick="$('.description').toggleClass('hide');">Description</button>
                  </span>
              </div><!-- /input-group -->

            
        </div>
       
    </div>
   <!--Description -->
    <div class="form-group hide description"  data-field="description,text,requice">
        <label for="inputDescription" class="col-sm-2 control-label"><?php echo lang("settings.menu_description");?></label>
        <div class="col-sm-10">
            <textarea style="height:100px;" class="form-control" id="inputDescription" name="description"  placeholder="<?php echo lang("settings.menu_description_placeholder");?>"><?php echo data($data->description);?></textarea>
        </div>
    </div>
    <!--Links -->
    <div class="form-group" data-field="links,input,requice">
        <label for="inputLinks" class="col-sm-2 control-label"><?php echo lang("settings.menu_links");?></label>
        <div class="col-sm-10">
        <div class="input-group">
            <input type="text" class="form-control" id="inputLinks" name="links" value="<?php echo data($data->links);?>" placeholder="<?php echo lang("settings.menu_links_placeholder");?>">
            <span class="input-group-btn">
              <a class="btn btn-primary" onClick="getMenuLinks('<?php echo $data->data_form;?>');">Render</a>
            </span>
        </div><!-- /input-group -->
    </div>
    </div>

    

    <!--Types -->
    <div class="form-group" data-field="types,input,requice">
        <label for="inputTypes" class="col-sm-2 control-label"><?php echo lang("settings.menu_types");?></label>
        <div class="col-sm-3">
            <select type="text" class="form-control" id="inputTypes" name="types" value="<?php echo data($data->types);?>">
                <option value="static">Static</option>
                <option value="dropdown">Dropdown</option>
                <option value="mega">Mega Dropdown</option>
            </select>
        </div>
        <div class="col-sm-7">
            <label class="radio-inline"><input type="radio" name="targets" value="click" <?php echo (data($data->targets) == "click" ? "checked" : "");?>> <?php echo lang("settings.onclick");?></label>
            <label class="radio-inline"><input type="radio" name="targets" value="hover" <?php echo (data($data->targets) == "hover" ? "checked" : "");?>> <?php echo lang("settings.onhover");?></label>
            <label class="checkbox-inline"><input type="checkbox" name="hide_text" value="1" <?php echo (data($data->hide_text) == 1 ? "checked" : "");?>> <?php echo lang("settings.hide_text");?></label>
        </div>
    </div>
   

    
   

    <!--Class -->
    <div class="form-group" data-field="class,input,requice">
        <label for="inputClass" class="col-sm-2 control-label"><?php echo lang("settings.menu_class");?></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputClass" name="class" value="<?php echo data($data->class);?>" placeholder="Nhập tên class">
        </div>
        <div class="col-sm-5">
            <select type="text" class="form-control" id="inputAnimate_class" name="animate_class" value="<?php echo data($data->animate_class);?>" placeholder="<?php echo lang("settings.menu.animate_class_placeholder");?>">
                <optgroup label="- - - - -">
                  <option value="">None</option>
                 </optgroup>
                <optgroup label="Attention Seekers">
                  <option value="bounce" <?php echo (@$info->animate_class == "bounce" ? "selected" : "");?>>bounce</option>
                  <option value="flash" <?php echo (@$info->animate_class == "flash" ? "selected" : "");?>>flash</option>
                  <option value="pulse" <?php echo (@$info->animate_class == "pulse" ? "selected" : "");?>>pulse</option>
                  <option value="rubberBand" <?php echo (@$info->animate_class == "rubberBand" ? "selected" : "");?>>rubberBand</option>
                  <option value="shake" <?php echo (@$info->animate_class == "shake" ? "selected" : "");?>>shake</option>
                  <option value="swing" <?php echo (@$info->animate_class == "swing" ? "selected" : "");?>>swing</option>
                  <option value="tada" <?php echo (@$info->animate_class == "tada" ? "selected" : "");?>>tada</option>
                  <option value="wobble" <?php echo (@$info->animate_class == "wobble" ? "selected" : "");?>>wobble</option>
                  <option value="jello" <?php echo (@$info->animate_class == "jello" ? "selected" : "");?>>jello</option>
                </optgroup>

                <optgroup label="Bouncing Entrances">
                  <option value="bounceIn" <?php echo (@$info->animate_class == "bounceIn" ? "selected" : "");?>>bounceIn</option>
                  <option value="bounceInDown" <?php echo (@$info->animate_class == "bounceInDown" ? "selected" : "");?>>bounceInDown</option>
                  <option value="bounceInLeft" <?php echo (@$info->animate_class == "bounceInLeft" ? "selected" : "");?>>bounceInLeft</option>
                  <option value="bounceInRight" <?php echo (@$info->animate_class == "bounceInRight" ? "selected" : "");?>>bounceInRight</option>
                  <option value="bounceInUp" <?php echo (@$info->animate_class == "bounceInUp" ? "selected" : "");?>>bounceInUp</option>
                </optgroup>

               

                <optgroup label="Fading Entrances">
                  <option value="fadeIn" <?php echo (@$info->animate_class == "fadeIn" ? "selected" : "");?>>fadeIn</option>
                  <option value="fadeInDown" <?php echo (@$info->animate_class == "fadeInDown" ? "selected" : "");?>>fadeInDown</option>
                  <option value="fadeInDownBig" <?php echo (@$info->animate_class == "fadeInDownBig" ? "selected" : "");?>>fadeInDownBig</option>
                  <option value="fadeInLeft" <?php echo (@$info->animate_class == "fadeInLeft" ? "selected" : "");?>>fadeInLeft</option>
                  <option value="fadeInLeftBig" <?php echo (@$info->animate_class == "fadeInLeftBig" ? "selected" : "");?>>fadeInLeftBig</option>
                  <option value="fadeInRight" <?php echo (@$info->animate_class == "fadeInRight" ? "selected" : "");?>>fadeInRight</option>
                  <option value="fadeInRightBig" <?php echo (@$info->animate_class == "fadeInRightBig" ? "selected" : "");?>>fadeInRightBig</option>
                  <option value="fadeInUp" <?php echo (@$info->animate_class == "fadeInUp" ? "selected" : "");?>>fadeInUp</option>
                  <option value="fadeInUpBig" <?php echo (@$info->animate_class == "fadeInUpBig" ? "selected" : "");?>>fadeInUpBig</option>
                </optgroup>

               

                <optgroup label="Flippers">
                  <option value="flip" <?php echo (@$info->animate_class == "flip" ? "selected" : "");?>>flip</option>
                  <option value="flipInX" <?php echo (@$info->animate_class == "flipInX" ? "selected" : "");?>>flipInX</option>
                  <option value="flipInY" <?php echo (@$info->animate_class == "flipInY" ? "selected" : "");?>>flipInY</option>
                 
                </optgroup>

                <optgroup label="Lightspeed">
                  <option value="lightSpeedIn" <?php echo (@$info->animate_class == "lightSpeedIn" ? "selected" : "");?>>lightSpeedIn</option>
                  
                </optgroup>

                <optgroup label="Rotating Entrances">
                  <option value="rotateIn" <?php echo (@$info->animate_class == "rotateIn" ? "selected" : "");?>>rotateIn</option>
                  <option value="rotateInDownLeft" <?php echo (@$info->animate_class == "rotateInDownLeft" ? "selected" : "");?>>rotateInDownLeft</option>
                  <option value="rotateInDownRight" <?php echo (@$info->animate_class == "rotateInDownRight" ? "selected" : "");?>>rotateInDownRight</option>
                  <option value="rotateInUpLeft" <?php echo (@$info->animate_class == "rotateInUpLeft" ? "selected" : "");?>>rotateInUpLeft</option>
                  <option value="rotateInUpRight" <?php echo (@$info->animate_class == "rotateInUpRight" ? "selected" : "");?>>rotateInUpRight</option>
                </optgroup>

                
                <optgroup label="Sliding Entrances">
                  <option value="slideInUp" <?php echo (@$info->animate_class == "slideInUp" ? "selected" : "");?>>slideInUp</option>
                  <option value="slideInDown" <?php echo (@$info->animate_class == "slideInDown" ? "selected" : "");?>>slideInDown</option>
                  <option value="slideInLeft" <?php echo (@$info->animate_class == "slideInLeft" ? "selected" : "");?>>slideInLeft</option>
                  <option value="slideInRight" <?php echo (@$info->animate_class == "slideInRight" ? "selected" : "");?>>slideInRight</option>

                </optgroup>
                
                
                <optgroup label="Zoom Entrances">
                  <option value="zoomIn" <?php echo (@$info->animate_class == "zoomIn" ? "selected" : "");?>>zoomIn</option>
                  <option value="zoomInDown" <?php echo (@$info->animate_class == "zoomInDown" ? "selected" : "");?>>zoomInDown</option>
                  <option value="zoomInLeft" <?php echo (@$info->animate_class == "zoomInLeft" ? "selected" : "");?>>zoomInLeft</option>
                  <option value="zoomInRight" <?php echo (@$info->animate_class == "zoomInRight" ? "selected" : "");?>>zoomInRight</option>
                  <option value="zoomInUp" <?php echo (@$info->animate_class == "zoomInUp" ? "selected" : "");?>>zoomInUp</option>
                </optgroup>
                
                
                <optgroup label="Specials">
                  <option value="hinge" <?php echo (@$info->animate_class == "hinge" ? "selected" : "");?>>hinge</option>
                  <option value="rollIn" <?php echo (@$info->animate_class == "rollIn" ? "selected" : "");?>>rollIn</option>
                  
                </optgroup>
            </select>
        </div>
    </div>
   

  <?php
  $stickers = @unserialize($data->stickers);
  ?>

    <!--Stickers -->
    <div class="form-group" data-field="stickers,text,requice">
        <label for="inputStickers" class="col-sm-2 control-label"><?php echo lang("settings.menu_stickers");?></label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="stickers[name]" value="<?php echo @$stickers["name"];?>">
            Name
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="inputStickers" name="stickers[align]" >
                <option value="left">Left</option>
                <option value="right">Right</option>
            </select>
            Align
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="inputStickers" name="stickers[class]" value="<?php echo data(@$stickers["class"]);?>">
                <option value="">None</option>
                <option value="default">Default</option>
                <option value="primary">Primary</option>
                <option value="success">Success</option>
                <option value="info">Info</option>
                <option value="warning">Warning</option>
                <option value="danger">Danger</option>
            </select>
            Style
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="stickers[styles]" value="<?php echo data(@$stickers["styles"]);?>">
            CSS
        </div>
    </div>
   

    <!--Htmlcode -->
    <div class="form-group hide" id="htmlcodeDesign" data-field="htmlcode,text,requice">
        
        <div class="col-sm-12">
            <textarea style="height:300px;" class="form-control" id="inputHtmlcode" name="htmlcode"  placeholder="<?php echo lang("settings.menu.htmlcode_placeholder");?>"><?php echo data($data->htmlcode);?></textarea>
        </div>
    </div>
   

   

<!--ViewHeader-->
<hr>
    <div class="form-group">
	    <div class="col-sm-12">
	      <a class="btn btn-default" onClick="$('#controllerMenuEditAllow').remove();"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo lang("button.cancel");?></a> 
	      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo lang("button.save");?></button>
	    </div>
    </div>
<?php _panel_close();?>
<?php formclose();?>
<script type="text/javascript">

function getMenuLinks(id){
  if(!id) return '';
  jQuery.ajax({
             type : "get",
            
             url : "<?php admin_url("settings/menu/makelinks");?>/"+id,
             
             success: function(e){
                $("#inputLinks").val(e);
             }
        });
}
  $(function(){
    $("#inputTypes").on("change", function(){
      if(this.value == "mega"){
        $("#htmlcodeDesign").removeClass("hide");
      }else{
        $("#htmlcodeDesign").addClass("hide");
      }
    });
  });
</script>
