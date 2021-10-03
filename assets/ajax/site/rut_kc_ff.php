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
if(!$_POST){load_url('/');}
if (!is_client()) {
        echo json_encode(array('status' => "error",'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập !"));exit();}

$id_ingame = $db->real_escape_string(POST('id_ingame'));
$soluong = (int)$db->real_escape_string(POST('soluong'));
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);

switch ($soluong) {
  case 1:
    $soluong = 90;
  break; 
  case 2:
    $soluong = 230;
  break;
  case 3:
    $soluong = 465;
  break;
  case 4:
    $soluong = 950;
  break;
  case 5:
    $soluong = 1900;
  break;
  /*case 6:
    $soluong = 45;
  break;*/
  default:
    echo json_encode(array('status' => "error", 'title' => 'Lỗi', 'msg' => "Vui lòng chọn gói kim cương !"));exit();
  break;
}



    if($settings['status'] == 0){
        echo json_encode(array('status' => "error", 'title' => 'Lỗi', 'msg' => "Trang web của chúng tôi đang tạm dừng giao dịch, quay lại sau !"));exit();}
    if ($accounts['block'] > 0){
        echo json_encode(array('status' => "error", 'title' => 'Lỗi', 'msg' => 'Tài khoản của bạn đã bị khóa. Lý do: '.$accounts['note'].'. Vui lòng liên hệ với Admin !'));exit();}
    if (!$id_ingame) {
        echo json_encode(array('status' => "error", 'title' => 'Lỗi', 'msg' => "ID Ingame không được để trống !"));exit();}
    if ($accounts['diamon_ff'] < $soluong ) {
        echo json_encode(array('status' => "error", 'title' => 'Lỗi', 'msg' => "Số kim cương tích lũy của bạn chưa đủ ".$soluong." !"));exit();}

    //Đủ điều kiện
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` - '{$soluong}' WHERE `username` = '{$iduser}'");//trừ kc tích lũy
        $db->query("INSERT INTO `history_dff` (username,name,id_ingame,soluong,time) VALUES ('$iduser','$name','$id_ingame','$soluong','$date_current')");
            echo json_encode(array('status' => "success", 'title' => 'Chờ xử lý', 'msg' => "Gửi yêu cầu thành công. Vui lòng chờ admin xử lý !"));exit;
?> 