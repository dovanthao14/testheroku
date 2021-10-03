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

$input = new Input;
// Nếu đăng nhập
if(is_admin()){
    
    $status = (int)$_POST['status'];
    $id = (int)$_POST['id'];
    //lấy dữ liệu id
    $data = $db->fetch_assoc("SELECT * FROM history_dff where `id` = {$id} LIMIT 1", 1);
    
    if($data['status'] != 0){
        echo json_encode(array('status' => "warning", 'msg' => "Giao dịch đã được xử lý rồi")); exit;}
        
    $db->query("UPDATE history_dff SET `status` = '{$status}' WHERE `id` = '{$id}'");// trang thai
    
    if($status > 1){ 
        $db->query("UPDATE accounts SET `diamon_ff` = `diamon_ff` + '".$data['soluong']."' WHERE `username` = '".$data['username']."'");
    }
    echo json_encode(array('status' => "success", 'msg' => "Đã xử lý giao dịch"));exit;
}
else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
    exit;
}
?>