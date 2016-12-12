<?php 
if(view()->exists("admin.gallery-panel")){
    echo view("admin.gallery-panel",["data" => $data])->render();
}
?>