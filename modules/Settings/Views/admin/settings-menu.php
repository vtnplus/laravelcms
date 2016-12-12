{header}

<?php _panel('<i class="glyphicon glyphicon-th-list"></i> '.lang("settings.menu.list",false),false,'
  <a href="'.admin_url("settings/menu/sample/".$type, false).'" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> Sample</a>
  <a href="'.admin_url("settings/menu/pages/".$type, false).'" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> As Pages</a>
  <a href="'.admin_url("settings/menu/catalog/".$type, false).'" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> As Category</a>
<a href="'.admin_url("settings/menu/create/".$type,false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Create</a> 
');?>

<div class="search-box">


            <div class="row">
                
                <div class="col-lg-4 col-xs-12">
                    
                      <input type="text"  ajax-url="<?php admin_url("pages/home/qsearch");?>" class="form-control typeahead NameMenuItem" placeholder="Menu Name">
                      
                </div>

                <div class="col-lg-4 col-xs-12">
                    <div class="input-group">
                      <input type="text"  class="form-control LinksMenuItem" placeholder="Menu Links">
                      <span class="input-group-btn">
                        <button type="button" onclick="window.location.href='<?php admin_url("settings/menu/create/".$type);?>?name='+$('.NameMenuItem').val()+'&links='+$('.LinksMenuItem').val();" class="btn btn-info" type="button"><i class="glyphicon glyphicon-plus-sign"></i> <?php echo lang("global.add");?></button>
                      </span>
                     
                    </div>
                </div>

                <div class="col-lg-2 col-xs-8">
                     <div class="input-group">
                        <select class="form-control" onchange="window.location.href='<?php admin_url("settings/menu/container");?>/' + this.value;">
                          <option value="topvar" <?php echo ($type == "topvar" ? "selected" : "");?>>Top Header</option>
                          <option value="header" <?php echo ($type == "header" ? "selected" : "");?>>Header</option>
                          <option value="customs" <?php echo ($type == "customs" ? "selected" : "");?>>Customs</option>      
                        </select>
                     <div class="input-group-btn">
                          <a href="<?php admin_url("settings/menu/clearup/".$type);?>" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Empty</a>
                      </div>
                    </div>
                    
                </div>

                <div class="col-lg-2 col-xs-4">
                    <div class="input-group">
                      <select class="form-control copytolanguage">
                        <option value="">Copy to Language</option>
                        <?php echo getLanguages("option",'Copy To {language}');?>
                      </select>
                      <div class="input-group-btn">
                          <button class="btn btn-primary btn-copymenu"><i class="glyphicon glyphicon-plus-sign"></i></button>
                      </div>
                    </div>
                </div>

            </div>

        
<div class="addTags"></div>
</div>

<div class="row">
    <div class="col-lg-9">
        <div class="dd" id="sortcategory">
            <?php echo with(new Modules\Settings\Backend\Menu)->getItems($type);?>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<?php _panel_close();?>

<iframe src="" id="savewidgets" name="savewidgets" style="border: 0; width: 1px; height: 1px; position: absolute; z-index: -1;"></iframe>

<script type="text/javascript">
$(function(){
    $(".btn-copymenu").on("click", function(){
        var toLtr = $(".copytolanguage").val();
        if(!toLtr){
          alert("Select Language");
        }else{
          window.location.href="<?php admin_url("settings/menu/copytolanguage/{$type}/");?>" + toLtr;
        }
    });

    $("[data-ajax]").on("click", function(){
        var url = $(this).attr("data-ajax");
        
        var $target = $("[data-id="+$(this).attr("target-id")+"]");
        if($target.find("> #controllerMenuEditAllow").text()){
            return false;
        }
        $("#controllerMenuEditAllow").remove();
        jQuery.ajax({
             type : "get",
            
             url : url,
             
             success: function(e){
                var html = '<div id="controllerMenuEditAllow" style="display:block;">'+e+'</div>';
                //$(this).parent().css({"height":"auto"});
                $target.append(html);
                $('#controllerMenuEditAllow [role="iconpicker"]').iconpicker({
                    "iconset" : "fontawesome",
                    "rows" : "5",
                    "cols" : "6"
                  });
                  $('#controllerMenuEditAllow [role="iconpicker"]').on('change', function(e) { 
                    $(this).parent().find("input[name=icons]").val(e.icon);
                      console.log(e.icon);
                  });
             }
        });
        
    });

    $('#sortcategory').nestable({
            group: 1,
        }).on('change', function(e){
                var list   = e.length ? e : $(e.target);
                if($.isEmptyObject(list.nestable('serialize'))){
                  console.log(list.nestable('serialize'));
                }
                var data = window.JSON.stringify(list.nestable('serialize'));
                
                jQuery.ajax({
                     type : "post",
                     dataType : "json",
                     url : "<?php echo admin_url("settings/menu/sort");?>",
                     data : {data:data},
                     success: function(e){
                        
                     }
                });
        });
});
</script>

{footer}