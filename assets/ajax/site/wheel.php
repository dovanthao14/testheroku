<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║ 
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_GET){load_url('/');die();}
//lấy dữ liệu vòng quay
$sql_setting_wheel =  "SELECT * FROM `setting_wheel`";
if ($db->num_rows($sql_setting_wheel)){
    $setting_wheel = $db->fetch_assoc($sql_setting_wheel, 1);
    $type_wheel = GET('type') == 'ff' ? 0:4;
    $price = $type_wheel == 0 ? $setting_wheel['wheel_price']:$setting_wheel['wheel_price_2'];//giá quay
}else{
    echo json_encode(array('title' => 'Lỗi', 'msg' => "Vòng quay đang bảo trì. Vui lòng thử lại sau !"));die;
}

if (!is_client()) {
    echo json_encode(array('status' => 'LOGIN','title' => 'Lỗi', 'msg' => "Bạn chưa đăng nhập !"));die;}
if($settings['status'] != 1 && !is_admin()){
    echo json_encode(array('title' => 'Lỗi', 'msg' => "Trang web của chúng tôi đang tạm ngừng giao dịch, quay lại sau !"));die;}
if($setting_wheel['status'] != 1 && !is_admin()){
    echo json_encode(array('title' => 'Lỗi', 'msg' => "Vòng quay đang bảo trì. Vui lòng thử lại sau !"));die;}
if ($accounts['block'] > 0){
    echo json_encode(array('title' => 'Lỗi', 'msg' => 'Tài khoản của bạn đã bị khóa. Lý do: '.$accounts['note'].'. Vui lòng liên hệ với Admin !'));die();}
if ($price < 1000){
    echo json_encode(array('title' => 'Lỗi', 'msg' => 'Có lỗi xảy ra. Vui lòng thử lại sau !'));die();}
if ($accounts['cash'] < $price){
    echo json_encode(array('title' => 'Lỗi', 'msg' => 'Bạn cần '.number_format($price).'đ để chơi vòng quay này !'));die();}

//thông tin người dùng
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);
//cập nhật dữ liệu người dùng
$db->query("UPDATE `accounts` SET `cash` = `cash` - '".$price."' WHERE `username` = '".$iduser."'");//trừ tiền
    
//tạo list quà
$gift = array();
if ($type_wheel == 0){
    for ($i=1;$i <= 8; $i++){
        if($setting_wheel[$i] != 0) array_push($gift, $i);
    }
}else{
    for ($i=9;$i <= 16; $i++){
        if($setting_wheel[$i] != 0) array_push($gift, $i);
    }
}

$gift       = $gift[array_rand($gift)];//lấy gói quà
$percent    = $setting_wheel[$gift];//lấy tỷ lệ
$gift       = check_wheel($percent) ? $gift:8+$type_wheel;//check tỉ lệ
$msg        = info_wheel($gift)['msg'];//nội dung phần thưởng
$angles     = info_wheel($gift)['angles'];//góc quay
$hide       = ($gift == 8) ? 1:0;//ẩn lịch sử chúc bạn may mắn
$id_wheel   = 0;

//xử lý nhận acc
if($gift == 1 || $gift == 2 || $gift == 3 || $gift == 5){
    $sql_wheel =  "SELECT id FROM `wheel` WHERE `type` = '".$gift."' AND `status` = '0' AND `iduser` = '' ORDER BY rand() LIMIT 1";
    if ($db->num_rows($sql_wheel)){
        $id_wheel = $db->fetch_assoc($sql_wheel, 1)['id'];
        $db->query("UPDATE `wheel` SET `iduser` = '".$iduser."', `status` = '1' WHERE `id` = '".$id_wheel."'");//cập nhật acc
    }else{
        $db->query("INSERT INTO `wheel` (`iduser`,`type`) VALUES ('".$iduser."','".$gift."')");//tạo order acc
        $id_wheel = $db->insert_id();
    }
}elseif($gift == 4){
    $db->query("UPDATE `accounts` SET `cash` = `cash` + '10000' WHERE `username` = '".$iduser."'");//cộng tiền
}elseif($gift == 7){
    $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '912' WHERE `username` = '".$iduser."'");//cộng kc
}elseif($gift > 8){
    $msg = is_admin() && $gift == 12 ? rand(18,555):$msg;
    $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '".$msg."' WHERE `username` = '".$iduser."'");//cộng kc
    $msg .= ' Kim Cương';
}

//Thêm lịch sử
$db->query("INSERT INTO `history_wheel` (`username`,`name`,`type`,`id_wheel`,`prize`,`hide`,`time`,`date`) 
VALUES ('".$iduser."','".$name."','".$gift."','".$id_wheel."','".$msg."','".$hide."','".$date_current."','".$date_now."')");
//Tạo lịch sử ảo
$gift_demo  = rand(1,16);//lấy gói quà ngẫu nhiên
if ($gift_demo != 8){
    $id_arr     = explode(',', $setting_wheel['id_nohu']);//lấy list id
    $id_demo    = $id_arr[array_rand($id_arr)];//lấy ngẫu nhiên tên 1 người
    $msg_demo   = $gift_demo < 9 ? info_wheel($gift_demo)['msg']:info_wheel($gift_demo)['msg'].' Kim Cương';//nội dung phần thưởng
    
    $db->query("INSERT INTO `history_wheel` (`name`,`type`,`prize`,`time`,`date`) 
    VALUES ('".$id_demo."','".$gift_demo."','".$msg_demo."','".date ("Y-m-d H:i:sa",time()-rand(5,15))."','".$date_now."')");//thêm vào lịch sử
}

echo json_encode(array('status' => 'SUCCESS','msg' => $msg, 'rotate' => $angles));