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
    $name = trim(htmlspecialchars(addslashes($_POST['name'])));
    $email = trim(htmlspecialchars(addslashes($_POST['email'])));
    $phone = trim(htmlspecialchars(addslashes($_POST['phone'])));
    $cash = trim(htmlspecialchars(addslashes($_POST['cash'])));
    $block = trim(htmlspecialchars(addslashes($_POST['block'])));
    $note = trim(htmlspecialchars(addslashes($_POST['note'])));
    $days_block = trim(htmlspecialchars(addslashes($_POST['days_block'])));
    $time_block = $time_now + 86400*$days_block;
    
    //Kiểm tra admin user
    $data = $db->fetch_assoc("SELECT * FROM accounts WHERE username = '$username'", 1);

    if ($block == "0"){$days_block = $time_block = $note = "";}
    
    $sql_info = "UPDATE accounts SET 
        name = '$name',
        email = '$email',
        cash = '$cash',
        phone = '$phone',
        block = '$block',
        time_block = '$time_block',
        days_block = '$days_block',
        note = '$note'
        WHERE `username` ='$username'";
    $db->query($sql_info);
    $db->close();
    
    echo json_encode(array('status' => "success", 'msg' => "Cập nhật dữ liệu cho ".$username." thành công !"));
    
}
else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>