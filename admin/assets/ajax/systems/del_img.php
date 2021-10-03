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
    
    $url = trim(htmlspecialchars(addslashes($_POST['url'])));
    
    if($url){
        $url_del = "$root$url";
        unlink("$url_del");
        echo json_encode(array('status' => "success", 'msg' => "Xóa ảnh thành công !"));exit();
    }else{
    echo json_encode(array('status' => "warning", 'msg' => "Lỗi không xác định !"));exit();}
    
}else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>