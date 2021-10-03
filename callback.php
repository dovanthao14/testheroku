<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║ 
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
/*
//lưu log
$file = fopen("luauytin.txt",'a+') or die("lỗi");
$info= "status: ".$_POST['status']." | request_id:  ".$_POST['request_id']." | time: ".date('d-m-Y H:i:s')."\n________________________________________________";
fwrite($file,"".$info." \r\n\n");
fclose($file);
*/
$partner_id   = $settings['merchant_id']; //do bên API cap
$partner_key  = $settings['merchant_key'];; //do bên API cap
	
	if(isset($_POST)) {
		if(isset($_POST['callback_sign'])) {

			$callback_sign = md5($partner_key.$_POST['code'].$_POST['serial']);
			if($_POST['callback_sign'] == $callback_sign) { //Xác thực API, tránh kẻ lạ gửi dữ liệu ảo.

				if(isset($_POST['status']) && $_POST['status'] != 99) {

###############################################################################################################################################################
$sql = "SELECT * FROM `history_card` WHERE `status` = '0' AND `request_id` = '".POST('trans_id')."' LIMIT 1";
if($db->fetch_row($sql)){
$luauytin = $db->fetch_assoc($sql,1);
        if(POST('status') == 1){
            //lấy dữ liệu
            $id = $luauytin['id'];
            $iduser = $luauytin['username'];
            $cash_nhan = $luauytin['cash_nhan'];
            $notice = POST('message') ? POST('message'):'';
            //cập nhật data
            $db->query("UPDATE `history_card` SET `status` = '1',`notice` = '{$notice}' WHERE `status` = '0' AND `id` = '{$id}' LIMIT 1");
            $db->query("UPDATE `accounts` SET `cash` = `cash` + '{$cash_nhan}' WHERE `username` = '{$iduser}'");
            
        }elseif(POST('status') != 99){
            $db->query("UPDATE `history_card` SET `status` = '2', `notice` = '".POST('message')."', `cash_nhan` = '0' WHERE `status` = '0' AND `id` = '".$luauytin['id']."' LIMIT 1");
        }
}
################################################################################################################################################################

				}
			}
		}
	}
	
        
?>