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

    $count = count($_POST['username']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    if(empty($username) || empty($password) || empty($type)){
             echo json_encode(array('status' => "warning", 'msg' => "Vui lòng nhập đủ thông tin !"));exit();}

    for ($i=0; $i < $count; $i++) {
        if(empty($username[$i]) || empty($password[$i])){
            $d = $i+1;
             echo json_encode(array('status' => "warning", 'msg' => "Dòng ".$d." chưa nhập đủ thông tin !"));exit();}
    }
    for ($i=0; $i < $count; $i++) {
        $u = $username[$i];
        $p = $password[$i];
        $db->query("INSERT INTO `acc_random` (username,password,type,status) VALUES ('$u','$p','$type','0')");
    }
    echo json_encode(array('status' => "success", 'msg' => "Thêm ".$count." nick random thành công !"));exit();
    
}else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>