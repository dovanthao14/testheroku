<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
 
// Require database & thông tin chung
require_once 'core/init.php';
 
// Xoá session
$session->destroy();
new Redirect($_DOMAIN); // Trở về trang index
 
?>