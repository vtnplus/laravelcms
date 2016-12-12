{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel('<i class="glyphicon glyphicon-cog"></i> '.lang("settings.title",false),true,'
        <a class="btn btn-info" href="'.admin_url("stores/settings/sampledata",false).'"><i class="glyphicon glyphicon-repeat"></i> Sample Database</a>
		<a class="btn btn-danger" href="'.admin_url("stores/settings/resetdata",false).'"><i class="glyphicon glyphicon-refresh"></i> Reset Database</a>
		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  '.lang("global.save",false).'</button>
		');?>
<!--ViewHeader-->

    <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.sitename");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputGender" name="config[sitename]" value="<?php echo data(@$data->sitename);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
    </div>
    </div>

     <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.description");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputGender" name="config[description]" value="<?php echo data(@$data->description);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
    </div>
    </div>


     <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.keyword");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputGender" name="config[keyword]" value="<?php echo data(@$data->keyword);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
    </div>
    </div>


    <div class="form-group" data-field="thumbs,input,0,0,0">
                <label for="inputThumbs" class="col-sm-2 control-label"><?php echo lang("settings.logo");?></label>
                <div class="col-sm-5">
<div class="input-group"><input type="text" class="form-control" id="inputLogo" name="config[logo]" value="<?php echo data(@$data->logo,null);?>" ><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputLogo" class="btn btn-primary" type="button">Select Image!</button></span></div>

                </div>

                <div class="col-sm-5">
<div class="input-group"><input type="text" class="form-control" id="inputIcons" name="config[icons]" value="<?php echo data(@$data->icons,null);?>" ><span class="input-group-btn"><button data-media="" href="<?php admin_url("media/images");?>?ajax=true&target=inputIcons" class="btn btn-primary" type="button">Select Image!</button></span></div>

                </div>

            </div>

    <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.google_analytic");?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputGender" name="config[google_analytic]" value="<?php echo data(@$data->google_analytic);?>">
        </div>
    </div>

    <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.google_api");?></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputGender" name="config[google_api]" value="<?php echo data(@$data->google_api);?>">
        </div>
        <div class="col-sm-5">
            <label class="checkbox-inline"><input type="checkbox"  name="config[tranlaytion_posts]" value="yes" <?php echo (data(@$data->tranlaytion_posts) == "yes" ? "checked" : ""); ?>> Auto Tranlation Contents</label>
        </div>
    </div>


    <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"></label>
        <div class="col-sm-3">

            <select type="text" class="form-control selectpicker" id="inputGender" name="config[language]" value="<?php echo data(@$data->language);?>">
                <option value="<?php echo data(@$data->language,"vn");?>">Default</option>
                <?php echo getLanguages(@$data->language,"{language}");?>
            </select>
            <span class="help-block"><?php echo lang("settings.language_default");?></span>
        </div>

        <div class="col-sm-3">

            <select type="text" class="form-control selectpicker" id="inputGender" name="config[templates]">
                <option value="<?php echo data(@$data->templates,"default");?>">Default</option>
                <?php echo getThemes(@$data->templates);?>
            </select>
            <span class="help-block"><?php echo lang("settings.templates_default");?></span>
        </div>

        <div class="col-sm-2">

            <select type="text" class="form-control selectpicker" id="inputGender" name="config[templates_admin]" value="<?php echo data(@$data->templates_admin);?>">
                <option value="default">Default</option>
            </select>
            <?php echo lang("settings.templates_admin");?>
        </div>

        <div class="col-sm-2">

            <select type="text" class="form-control selectpicker"  name="config[comments_by]">
                <option value="" <?php echo data(@$data->comments_by == "" ? "selected" : "");?>>None</option>
                <option value="facebook" <?php echo data(@$data->comments_by == "facebook" ? "selected" : "");?>>Facebook</option>
                <option value="google" <?php echo data(@$data->comments_by == "google" ? "selected" : "");?>>Google</option>
                <option value="onweb" <?php echo data(@$data->comments_by == "onweb" ? "selected" : "");?>>On Web</option>
                
            </select>
            <?php echo lang("settings.comment_by");?>
        </div>

    </div>

    
    

    <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"></label>
        <div class="col-sm-3">

            <select type="text" class="form-control selectpicker" id="inputGender" name="config[page_default]">
                <option value="">Default</option>
                <?php echo pages_options(data(@$data->page_default),["parent_id" => 0], true,0,"","seo_urls");?>
            </select>
            <span class="help-block"><?php echo lang("settings.page_default");?></span>
        </div>

        <div class="col-sm-3">

            <select type="text" class="form-control selectpicker" id="inputGender" name="config[popup_id]">
                <option value="">Default</option>
                <?php echo pages_options(data(@$data->popup_id),["parent_id" => 0], true,0,"","seo_urls");?>
            </select>
            <span class="help-block"><?php echo lang("settings.popup_id");?></span>
        </div>


        <div class="col-sm-4">

            <select type="text" class="form-control selectpicker" id="inputGender" name="config[page_editter]">
                <option value="">Default</option>
                <option value="-inline" <?php echo (data(@$data->page_editter) == '-inline' ? "selected" : "");?>>Inline Edit</option>
            </select>
            <span class="help-block"><?php echo lang("settings.page_editter");?></span>
        </div>

        

    </div>
   <!--ViewHeader-->



<hr>
<div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Social Profiles</label>
        <div class="col-sm-10">


        <ul class="row forms">
            <li class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
                <div class="row">
                    <div class="col-xs-1">
                        <button type="button" class="btn btn-addsocial btn-block btn-primary">+</button>
                        
                    </div>
                    <div class="col-xs-2">
                    <?php
                            $amz = [
                                "android" => "Android",
                                "apple" => "Apple",
                                "behance" => "Behance",
                                "bitcoin" => "Bitcoin",
                                "buysellads" => "Buysellads",
                                "codepen" => "Codepen",
                                "css3" => "Css3",
                                "delicious" => "Delicious",
                                "deviantart" => "Deviantart",
                                "digg" => "Digg",
                                "dribbble" => "Dribbble",
                                "dropbox" => "Dropbox",
                                "drupal" => "Drupal",
                                "email-1" => "Email-1",
                                "email-2" => "Email-2",
                                "facebook" => "Facebook",
                                "flickr" => "Flickr",
                                "foursquare" => "Foursquare",
                                "git" => "Git",
                                "github" => "Github",
                                "google" => "Google",
                                "google-plus" => "Google-plus",
                                "html5" => "Html5",
                                "instagram" => "Instagram",
                                "joomla" => "Joomla",
                                "jsfiddle" => "Jsfiddle",
                                "lastfm" => "Lastfm",
                                "linkedin" => "Linkedin",
                                "linux" => "Linux",
                                "maxcdn" => "Maxcdn",
                                "medium" => "Medium",
                                "pagelines" => "Pagelines",
                                "paypal" => "Paypal",
                                "pinterest" => "Pinterest",
                                "reddit" => "Reddit",
                                "rss" => "Rss",
                                "share" => "Share",
                                "skype" => "Skype",
                                "slideshare" => "Slideshare",
                                "soundcloud" => "Soundcloud",
                                "spotify" => "Spotify",
                                "stack-exchange" => "Stack-exchange",
                                "stack-overflow" => "Stack-overflow",
                                "stumbleupon" => "Stumbleupon",
                                "trello" => "Trello",
                                "tumblr" => "Tumblr",
                                "twitter" => "Twitter",
                                "vimeo" => "Vimeo",
                                "vine" => "Vine",
                                "vk" => "Vk",
                                "whatsapp" => "Whatsapp",
                                "windows" => "Windows",
                                "wordpress" => "Wordpress",
                                "xing" => "Xing",
                                "yahoo" => "Yahoo",
                                "yelp" => "Yelp",
                                "youtube" => "Youtube",
                                "youtube-play" => "Youtube-play"
                                ];
                            
                            ?>
                        <select class="form-control type">
                            <?php foreach ($amz as $key => $value) {
                                    ?>
                                    <option value="<?php echo $key;?>" data-icon="fa fa-<?php echo $key;?>"><?php echo $value;?></option>
                                    <?php
                                }
                            ?>
                            
                        </select>
                    </div>
                    <div class="col-xs-9 urls">
                        <input type="text" class="form-control" name="config[social][private]" placeholder="Socical URL">
                    </div>
                </div>
            </li>
            
            <?php
            $options = config("site.social");

                $social = (is_array($options) ? $options : []);
                foreach ($social as $key => $value) {
                    if($key && $key != "private"){
                    ?>
                    <li class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-xs-1">
                                <button type="button" class="btn btn-removesocial btn-block btn-info">-</button>
                            </div>
                            <div class="col-xs-2">
                                <a class="btn azm-social btn-block azm-r-square  azm-<?php echo $key;?>"><i class="fa fa-<?php echo $key;?>"></i> <?php echo ucfirst($key);?></a>
                                
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="config[social][<?php echo $key;?>]" class="form-control" value="<?php echo $value;?>" placeholder="<?php echo ucfirst($key);?> Socical URL">
                            </div>
                        </div>
                    </li>
                    <?php
                    }   
                }
            ?>
        </ul>
    </div>
    </div>
<hr>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          
          <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo lang("global.save");?></button>
        </div>
    </div>
<?php _panel_close();?>
<?php formclose();?>   


<script type="text/html" id="htmlZone">
<li class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
    <div class="row">
        <div class="col-xs-1">
            <button type="button" class="btn btn-removesocial btn-block btn-info">-</button>
        </div>
        <div class="col-xs-2">
            <a class="btn azm-social btn-block azm-r-square azm- azm-{type}"><i class="fa fa-{type}"></i> {type}</a>
        </div>
        <div class="col-xs-9">
            <input type="text" name="config[social][{type}]" class="form-control" value="{urls}" placeholder="{type} Socical URL">
        </div>
    </div>
</li>
</script>

<script type="text/javascript">
    
    jQuery(document).ready(function(){
    $(".btn-addsocial").on("click",function(){
        var htmlClone = $(this).parent().parent().parent();
        var htmlZone = $("#htmlZone").html();

        var type = htmlClone.find("select.type").val();
        var urls = htmlClone.find(".urls input").val();

        htmlZone = htmlZone.replace(/{type}/g,type).replace('{urls}',urls);

        htmlClone.parent().append(htmlZone);
        $(".btn-removesocial").on("click",function(){
            var htmlClone = $(this).parent().parent().parent();
            htmlClone.remove();

        });

    });

    $(".btn-removesocial").on("click",function(){
        var htmlClone = $(this).parent().parent().parent();
        htmlClone.remove();

    });



    $(".btn-addsocial-controller").on("click",function(){
        var htmlClone = $(this).parent().parent().parent();
        var htmlZone = $("#htmlZone").html();

        var type = htmlClone.find("select.type").val();
        var client_secret = htmlClone.find(".client_secret input").val();
        var client_id = htmlClone.find(".client_id input").val();

        htmlZone = htmlZone.replace(/{type}/g,type).replace('{client_secret}',client_secret).replace('{client_id}',client_id);

        htmlClone.parent().append(htmlZone);

    });

    $(".btn-removesocial-controller").on("click",function(){
        var htmlClone = $(this).parent().parent().parent();
        htmlClone.remove();

    });


});
</script>
{footer}