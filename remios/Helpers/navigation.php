<?php
function nav_menu($type="header", $append=[]){
    $data = db("Settings::Navigation")->language()->stores()->where("groups",$type)->where("parent_id",0)->orderBy("sorts","ASC")->orderBy("name","ASC")->get();
    $caret = (isset($append["caret"]) ? " ".$append["caret"] : ' <span class="glyphicon glyphicon-menu-down iconcaret"></span>');
    
    $_targets = ""; 
    $icons = "";
    $iconsFa = false;
    if(isset($append["icons"])){
        $icons = '<i class="'.$append["icons"].' icons" aria-hidden="true"></i> ';
    }
    foreach ($data as $key => $value) {
        if(!isset($append["static"])){
            $_targets = nav_targets_tags($value);
        }
        
        /*
        Render Icons
        */
        if($value->icons){
            $iconsFa = '<i class="fa '.$value->icons.' icons" aria-hidden="true"></i> ';
        }else{
            $iconsFa = "";
        }
        $iconsFa = ($icons ? $icons : $iconsFa);

        /*
        Render Class
        */
        $classMenu = "dropdown";
        switch ($value->types) {
            case 'dropdown':
                $classMenu = "dropdown".($value->class ? " ".$value->class : "").($value->targets == "hover" ? " hover" : "");
            break;
            case 'mega':
                $classMenu = "dropdown mega".($value->class ? " ".$value->class : "").($value->targets == "hover" ? " hover" : "");
            break;
            case 'singer':
                $classMenu = $value->class;
            break;
        }

        $stickers = @unserialize(@$value->stickers);
        
        $stickers_html = '';

        if(isset($stickers["name"]) && trim($stickers["name"])){
            
            $stickers_html = '<span class="label label-info stickers'.(@$stickers["class"] ? " ".@$stickers["class"] : "").'"'.(@$stickers["styles"] ? " style=\"".$stickers["styles"].'"' : "").'>'.$stickers["name"].'</span>';
        }

        

        ?>
            <li<?php echo (!isset($append["static"]) ? ' class="'.$classMenu.'"' : "");?>>

                <?php echo $stickers_html;?>
                
                <a <?php echo $_targets;?> href="<?php echo base_url($value->links);?>" title="<?php echo $value->name;?>" alt="<?php echo $value->name;?>">
                    
                    <?php echo $iconsFa;?>
                    
                    <?php 
                    if(intval($value->hide_text) == 0){
                        echo '<span class="text">'.$value->name.'</span>';
                    }
                    
                    ?>
                    
                    <?php echo ($_targets ? $caret : "");?>

                    <?php 
                    if($value->description){
                        echo '<p class="description hidden-xs">'.$value->description.'</p>';
                    }
                    ?>
                </a>
                <?php 
                if(!isset($append["static"])){ 
                    echo sub_nav_menu($value->id, $value->types, $value->animate_class,do_shortcode($value->htmlcode));
                    
                }else{
                    if($value->htmlcode){
                        echo do_shortcode($value->htmlcode);
                    }
                }
                ?>
            </li>
        <?php
    }
}



function sub_nav_menu($parent_id=false, $types="dropdown", $animate_class="", $html=""){
    if(intval($parent_id) == 0) return false;
    $data = db("Settings::Navigation")->where("parent_id",$parent_id);

    
    $html = str_replace('{parent}',$parent_id,$html);
    if($data->count() > 0){
        if($types == "mega"){
            echo '<div class="dropdown-menu'.($animate_class ? " animated ".$animate_class : "").'">
                    <div class="container">
                    <div class="row">
                        <div class="col-xs-4">
                        <ul>
                    ';
        }else if($types == "none"){
            echo '<ul>';
        }else{
            echo '<ul class="dropdown-menu'.($animate_class ? " animated ".$animate_class : "").'">';
        }
        
        foreach ($data->orderBy("sorts","ASC")->orderBy("name","ASC")->get() as $key => $value) {
            $_targets = nav_targets_tags($value);
            echo '<li class="dropdown dropdown-submenu"><a '.$_targets.' href="'.base_url($value->links).'">'.$value->name.'</a>';
            sub_nav_menu($value->id,"dropdown", $value->animate_class);
            echo '</li>';
        }

        if($types == "mega"){
            echo '</ul>';
            echo '</div>
            <div class="col-xs-8">
            '.$html.'
            </div>
            </div></div></div>';
        }else{
            if($html){
                echo '<li class="padding-20">'.$html.'</li>';
            }
            echo '</ul>';

        }
    
    }else{

        if($html){

            echo '
                <div class="dropdown-menu'.($animate_class ? " animated ".$animate_class : "").'">
                    
                        '.$html.'
                    
                </div>
                ';
        }
    }
}


function nav_targets_tags($obj){
    $dataCount = db("Settings::Navigation")->where("parent_id",$obj->id)->count();
    $_targets = "";

    if($dataCount > 0 || $obj->htmlcode){
            $_targets = 'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"';
    }
    return $_targets;
}