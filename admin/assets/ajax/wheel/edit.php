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
    
    $username = trim(htmlspecialchars(addslashes($_POST['username'])));
    $password = trim(htmlspecialchars(addslashes($_POST['password'])));
    $id = trim(htmlspecialchars(addslashes($_POST['id'])));
    
    $sql = "SELECT * FROM `wheel` where `id` = '".$id."' LIMIT 1";

    if ($db->num_rows($sql)){
        $wheel = $db->fetch_assoc($sql, 1);
    }else{
        echo json_encode(array('status' => "warning", 'msg' => "Giao dịch không tồn tại"));exit;
    }
    //check status
    /*if($wheel['status'] != 0){
        echo json_encode(array('status' => "warning", 'msg' => "Giao dịch đã được xử lý rồi")); exit;}*/
    if(!$username || !$password){
        echo json_encode(array('status' => "warning", 'msg' => "Không được để trống thông tin")); exit;}
    //cập nhật
    $db->query("UPDATE `wheel` SET
        `username` = '".$username."',
        `password` = '".$password."',
        `status`   = '1' 
        WHERE `id` = '".$id."'");// 
    
    
    echo json_encode(array('status' => "success", 'msg' => "Cập nhật dữ liệu cho ".$id." thành công !"));
    
}
else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>