<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
// Require database  
require_once '../core/init.php';  

if(!is_admin()){load_url("/");}
if(is_admin()){
    $widget = !empty(GET("widget")) ? GET("widget") : '';
    $patch = !empty(GET("patch")) ? GET("patch") : '';
    if (empty($widget)) {
        $widget = "main";
        $active = "main";
    }else{
        if($widget == "topup" || $widget == "buy"){
        $active = "main";
        }else{
        $active = $widget;            
        }
    }

require_once("widget/header.php");
if(!empty($widget) && empty($patch)){
    if (file_exists("widget/".$widget.".php")) {
        require_once("widget/".$widget.".php");
    } elseif (file_exists("widget/".$widget."/product.php")) {
        require_once("widget/".$widget."/product.php");
    } else {
        require_once("widget/main.php");
    }
}elseif(!empty($widget) && !empty($patch)){
    if (file_exists("widget/".$widget."/".$patch.".php")){
        require_once("widget/".$widget."/".$patch.".php");
    } elseif (file_exists("widget/".$widget.".php")) {
        require_once("widget/".$widget.".php");
    } elseif (file_exists("widget/".$widget."/product.php")) {
        require_once("widget/".$widget."/product.php");
    } else {
        require_once("widget/main.php");
    }
}else{
    require_once("widget/main.php");
}


// Require footer
require_once 'widget/footer.php';
}else{
    include 'login/index.php';
}
?>