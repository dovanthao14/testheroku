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
    $type = $_POST['type'];
    $id = $_POST['id'];
    $file = $_POST['file'];
    
    if($id && $type && $file){
        $url_del = "$root/assets/images/$type/$file";
        unlink("$url_del");
        $db->query("DELETE FROM `{$type}` WHERE id ='{$id}'");
        echo json_encode(array('status' => "success", 'msg' => "Xóa thành công !"));exit();
    }else{
    echo json_encode(array('status' => "warning", 'msg' => "Lỗi không xác định !"));exit();}
    
}else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>