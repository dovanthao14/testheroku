<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
 
// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');

// Nếu đăng nhập
if(is_admin()){   

    $type = POST('type');
    $content = htmlentities(strip_tags($_POST['content']), ENT_QUOTES, 'UTF-8');

    if(empty($type) || empty($content)){
             echo json_encode(array('status' => "warning", 'msg' => "Vui lòng nhập đủ thông tin !"));exit();}
    $db->query("UPDATE `descr_game` SET `content` = '{$content}' WHERE `type` ='$type'");
    $db->close();
    echo json_encode(array('status' => "success", 'msg' => "Cập nhật thành công !"));exit();
    
}else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>