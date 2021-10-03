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
    
    $w_1 = (int)POST('wheel_1');
    $w_2 = (int)POST('wheel_2');
    $w_3 = (int)POST('wheel_3');
    $w_4 = (int)POST('wheel_4');
    $w_5 = (int)POST('wheel_5');
    $w_6 = (int)POST('wheel_6');
    $w_7 = (int)POST('wheel_7');
    $w_8 = (int)POST('wheel_8');
    $w_9 = (int)POST('wheel_9');
    $w_10 = (int)POST('wheel_10');
    $w_11 = (int)POST('wheel_11');
    $w_12 = (int)POST('wheel_12');
    $w_13 = (int)POST('wheel_13');
    $w_14 = (int)POST('wheel_14');
    $w_15 = (int)POST('wheel_15');
    $w_16 = (int)POST('wheel_16');
    $wheel_price_2 = (int)POST('wheel_price_2');
    $wheel_price = (int)POST('wheel_price');
    $status = (int)POST('status');

    //cập nhật
    $db->query("UPDATE `setting_wheel` SET
        `1` = '".$w_1."',
        `2` = '".$w_2."',
        `3` = '".$w_3."',
        `4` = '".$w_4."',
        `5` = '".$w_5."',
        `6` = '".$w_6."',
        `7` = '".$w_7."',
        `8` = '".$w_8."',
        `9` = '".$w_9."',
        `10` = '".$w_10."',
        `11` = '".$w_11."',
        `12` = '".$w_12."',
        `13` = '".$w_13."',
        `14` = '".$w_14."',
        `15` = '".$w_15."',
        `16` = '".$w_16."',
        `wheel_price` = '".$wheel_price."',
        `wheel_price_2` = '".$wheel_price_2."',
        `status` = '".$status."'
    ");
    echo json_encode(array('status' => "success", 'msg' => "Cập nhật dữ liệu thành công !"));
    
}
else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>