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
    $data = $db->fetch_assoc("SELECT * FROM history_card where `id` = {$id} LIMIT 1", 1);
    $username = $data['username'];
    $cash_nhan = $data['cash_nhan'];
    $amount = $data['count_card'];
    $name = $data['name'];
    if($data['status'] != 0){
        echo json_encode(array('status' => "warning", 'msg' => "Giao dịch đã được xử lý rồi")); exit;}
        
    if($status != "1"){
        $cash_nhan = 0;
        $amount = 0;
        $notice = $status == 2 ? 'Thẻ sai hoặc đã sử dụng !' : ($status == 3 ? 'Khai báo sai mệnh giá !' : ($status == 4 ? 'Bảo trì, vui lòng nạp lại sau !':''));
    }else{
        $notice = 'Nạp thẻ thành công !';
    }
    $db->query("UPDATE accounts SET `cash` = `cash` + '{$cash_nhan}' WHERE `username` = '{$username}'");
    $db->query("UPDATE history_card SET `status` = '{$status}',`cash_nhan` = '{$cash_nhan}', `notice` = '{$notice}', `date` = '{$date_now}' WHERE `id` = '{$id}'");// trang thai
    
    //top nạp thẻ
    if($amount > 0){
        if($db->fetch_row("SELECT COUNT(*) FROM `top_recharge` WHERE username = '{$username}'") > 0){
            $db->query("UPDATE `top_recharge` SET `cash` = `cash` + '{$amount}' WHERE `username` = '{$username}'");}else{
            $db->query("INSERT INTO `top_recharge` (username,name,cash) VALUES ('$username','$name','$amount')");}
    }

    echo json_encode(array('status' => "success", 'msg' => "Đã xử lý giao dịch"));exit;
}
else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
    exit;
}
?>