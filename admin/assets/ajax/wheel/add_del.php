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
    $type = isset($_POST['type']) && $_POST['type'] == 1 ? 1:0;

    if($type == 0){
        $type = $_POST['type_wheel'] > 0 ? POST('type_wheel'):'';
        $info = $_POST['info_wheel'] ? POST('info_wheel'):'';
        if(!$type || !$info){
            $msg = !$type ? 'Chưa chọn loại tài khoản !':(!$info ? 'Chưa nhập thông tin nick':'Lỗi không xác định !');
            echo json_encode(array('status' => "warning", 'msg' => $msg));die();
        }
        
        $info = explode("\n", $info);
        foreach ($info as $key => $data) {
            $u =explode("|", $data)[0];
            $p =explode("|", $data)[1];
            $db->query("INSERT INTO `wheel` (username,password,type,status) VALUES ('".$u."','".$p."','".$type."','0')");
        }
        echo json_encode(array('status' => "success", 'msg' => "Thêm nick thành công !"));die();

    }elseif($type == 1){
        $id = POST('id') ? POST('id'):'';
        if(!$id){
            echo json_encode(array('status' => "warning", 'msg' => "Tài khoản không hợp lệ"));die();
        }
        $db->query("DELETE FROM `wheel` WHERE id ='".$id."'");
        echo json_encode(array('status' => "success", 'msg' => "Xóa ID #".$id." thành công !"));die();

    }else{
        echo json_encode(array('status' => "warning", 'msg' => "Lỗi không xác định. Thử lại sau"));die();
    }

    
}else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>