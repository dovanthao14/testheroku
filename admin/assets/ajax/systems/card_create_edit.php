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
    
    
    $type = POST('type') != '' ? (int)POST('type') : '';
    $id = POST('id')  != '' ? (int)POST('id') : '';
    $name = POST('name') != '' ? POST('name') : '';
    $ck = POST('ck') != '' ? (int)(100-POST('ck')) : '';
    $auto = POST('auto') != '' ? (int)POST('auto') : '';
    $status = POST('status') != '' ? (int)POST('status') : '';
    
    
    
    if($type == 1):
            $check_id =  $db->fetch_row("SELECT COUNT(*) FROM `card` WHERE `id` = '{$id}' OR `name` = '{$name}'");
            if($check_id > 0){
                echo json_encode(array('status' => "warning", 'msg' => "ID thẻ hoặc loại thẻ đã tồn tại !"));exit;}
            $db->query("INSERT INTO `card` (id,auto,name,ck,status) VALUES ('$id','$auto','$name','$ck','$status')");//thêm thẻ
            echo json_encode(array('status' => "success", 'link' => '/admin/card', 'msg' => "Thêm thẻ $name - #$id thành công !"));exit;
    elseif($type == 2):
            $check_id =  $db->fetch_row("SELECT COUNT(*) FROM `card` WHERE `id` = '{$id}'");
            if($check_id != 1){
                echo json_encode(array('status' => "warning", 'msg' => "Không tìm thấy ID thẻ !"));exit;}
            $db->query("UPDATE `card` SET `status` = '{$status}',`ck` = '{$ck}', `name` = '{$name}', `auto` = '{$auto}' WHERE `id` = '{$id}'");//cập nhật
            echo json_encode(array('status' => "success", 'link' => '/admin/card', 'msg' => "Cập nhận thẻ $name - #$id thành công !"));exit;
    elseif($type == 3):
        if(($id > 0) && ($name == '') && ($ck == '') && ($auto == '') && ($status == '')):
            $check_id =  $db->fetch_row("SELECT COUNT(*) FROM `card` WHERE `id` = '{$id}'");
            if($check_id != 1){
                echo json_encode(array('status' => "warning", 'msg' => "Không tìm thấy ID thẻ !"));exit;}
            $db->query("DELETE FROM `card` WHERE id ='{$id}'");//xóa id
            echo json_encode(array('status' => "success", 'msg' => "Xóa ID thẻ #$id thành công !"));exit;
        else:
            echo json_encode(array('status' => "warning", 'msg' => "Có lỗi. Vui lòng thử lại sau !"));exit;
        endif;
    else:
        echo json_encode(array('status' => "warning", 'msg' => "Lỗi không xác đinh !"));exit;
    endif;

}else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));exit;}
?>